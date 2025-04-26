<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_contact extends Controller
{
    public function contacts() {
        return view('v_contact');
    }
}
