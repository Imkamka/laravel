<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showHome()
    {
        return view('Admin.dashboard');
    }
}
