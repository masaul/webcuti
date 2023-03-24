<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaPimpinanController extends Controller
{
    public function index(){
        return view('pimpinan.dash');
    }
}
