<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_admin extends Controller
{
    function tampildashboard () {
        return view('admin.v_dashboard');
    }
    function tampilchart () {
        return view('admin.v_chart');
    }
}
