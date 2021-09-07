<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'users' => Role::where('name', 'dgr')->first()->users()->with('role')->get(),
        ];

        return view("user.index", $data);
    }

    public function create()
    {
        $data = [
            'campaigns' => Campaign::all(),
            'roles' => Role::where('name', 'dgr')->get()
        ];

        return view("user.create", $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:32',
            'role' => 'required|exists:roles,id',
            'campaigns' => 'required|array|min:1',
        ]);
        
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role
            ]);

            $user->campaigns()->attach($request->campaigns);
    
            DB::commit();
    
            return redirect()->back()->with('success', 'New User created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return view("errors.500");
        }
    }

    public function edit(User $user)
    {
        if($user->role->name == 'admin') {
            return redirect()->route('admin.user.index')->with('error', "You can't edit this user!");
        }

        $data = [
            'campaigns' => Campaign::all(),
            'user' => $user,
            'roles' => Role::where('name', 'dgr')->get()
        ];

        return view("user.edit", $data);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'role' => 'required|exists:roles,id',
            'campaigns' => 'required|array|min:1',
        ]);
        
        DB::beginTransaction();
        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role
            ]);

            $user->campaigns()->sync($request->campaigns);
    
            DB::commit();
    
            return redirect()->route('admin.user.index')->with('success', 'User Updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return view("errors.500");
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', "User deleted successfully!");
    }
}
