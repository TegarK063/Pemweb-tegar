<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_home extends Controller
{
    public function homes() {
        $data = [
            "nama_pt"=> "Politeknik Subang",
            "alamat"=> "Jln Brigjen Katamso Dangdeur Subang",
        ];
        return view("v_home", $data);
    }
    public function abouts($id) {
        return "Ini Halaman About dengan id : ".$id;
    }
}
