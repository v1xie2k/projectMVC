<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function home(Request $request)
    {
        return view('master.home');
    }
}
