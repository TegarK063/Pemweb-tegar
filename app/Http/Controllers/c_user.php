<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_user extends Controller
{
    function tampildashboard () {
        return view('user.v_dashboard');
    }
    function halamanuser () {
        return view('user.v_user');
    }
}
