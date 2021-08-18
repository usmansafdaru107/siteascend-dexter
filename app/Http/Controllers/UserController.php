<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::all()
        ];
        return view("user.index", $data);
    }

    public function create()
    {
        $data = [
            'campaigns' => Campaign::all()
        ];

        return view("user.create", $data);
    }

    public function store(Request $request)
    {
        return view("user.create");
    }

    public function edit(User $user)
    {

        $data = [
            'campaigns' => Campaign::all(),
            'user' => $user
        ];

        return view("user.edit", $data);
    }

    public function update(Request $request)
    {
        dd($request);
        // return view("user.create");
    }

    public function destroy(User $user)
    {
        dd($user);
        // return view("user.create");
    }
}
