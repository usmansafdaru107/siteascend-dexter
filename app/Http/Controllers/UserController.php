<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\StoreUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    public function index() 
    {
        $data = [
            'users' => User::withCount(['campaigns'])->with('role')->get(),
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

    public function store(StoreUserRequest $request) 
    {

        User::create($request->validated());
        return redirect()->back()->with('success', 'New User created successfully!');

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

    public function update(UpdateUserRequest $request, User $user) 
    {
        $user->update($request->validated());
        return redirect()->route('admin.user.index')->with('success', 'User Updated successfully!');
    }

    public function destroy(User $user) 
    {
        $user->delete();
        return redirect()->back()->with('success', "User deleted successfully!");
    }
}
