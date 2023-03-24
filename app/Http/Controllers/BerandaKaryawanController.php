<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaKaryawanController extends Controller
{
    public function index(){
        return view('karyawan.dash');
    }
}
