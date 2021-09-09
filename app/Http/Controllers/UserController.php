<?php

namespace App\Http\Controllers;

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
            'users' => User::with('role')->get(),
        ];

        return view("user.index", $data);
    }

    public function create()
    {
        $data = [
            'roles' => Role::all()
        ];

        return view("user.create", $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:32',
            'role' => 'required|exists:roles,id'
        ]);
        
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role
            ]);

            DB::commit();
    
            return redirect()->back()->with('success', 'New User created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return view("errors.500");
        }
    }

    public function edit(User $user)
    {
        if($user->role->name == User::ADMIN) {
            return redirect()->route('admin.user.index')->with('error', "You can't edit this user!");
        }

        $data = [
            'user' => $user,
            'roles' => Role::all()
        ];

        return view("user.edit", $data);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'role' => 'required|exists:roles,id'
        ]);
        
        DB::beginTransaction();

        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role
            ]);
    
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
