<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_barang extends Controller
{
    public function barangs()
    {
        return view('v_barang');
    }
}
