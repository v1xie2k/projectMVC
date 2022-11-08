<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(Request $request)
    {
        $users = User::get();
        return view('master.user.home',compact('users'));
    }
}
