<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    //login authentication
    public function authentication(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'  => 'required|email',
            'password' => 'required|min:4'
        ]);

        $credientials = $request->only(['email', 'password']);
        if ($validator->passes()) {
            if (!Auth::attempt($credientials)) {
                return back()
                    ->with('error', 'Either email or password incorrect');;
            }
            return redirect()
                ->route('view.dashboard')
                ->with('success', 'You have successfully login');
        }
        return
            back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Invalid Email Address or Password');
    }

    //User logout from the session
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()
            ->route('view.login')
            ->with('success', 'You have logged out from the session');
    }
}
