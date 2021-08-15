<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view("auth/login");
    }

    public function userlist()
    {
        return view("users.userlist");
    }
}
