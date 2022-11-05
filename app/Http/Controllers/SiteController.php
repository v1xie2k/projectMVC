<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function home(Request $request)
    {
        return view('client.home');
    }
    public function login(Request $request)
    {
        return view('site.login');
    }
    public function dologin(Request $request)
    {
        $credential = [
            "email" => $request->email,
            "password" => $request->password,
        ];
        if (Auth::guard('web')->attempt($credential)) {
            $cekRole = Auth::guard('web')->user()->role;
            if($cekRole == "admin"){
                return redirect('admin');
            }else{
                return redirect('home');
            }
        } else {
            return redirect('login')->with('pesan', 'Gagal login browwwwww');
        }
    }
    public function register(Request $request)
    {
        # code...
    }
    public function doregister(Request $request)
    {
        # code...
    }
    public function doLogout(Request $request)
    {
        Auth::guard("web")->logout();
        return redirect('login')->with('pesan', 'Berhasil Logout');
    }
}
