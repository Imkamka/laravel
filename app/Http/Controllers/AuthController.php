<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('Admin.auth.login');
    }

    public function register()
    {
        return view('Admin.auth.register');
    }
}
