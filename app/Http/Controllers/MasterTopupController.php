<?php

namespace App\Http\Controllers;

use App\Models\HistoryTopUP;
use Illuminate\Http\Request;

class MasterTopupController extends Controller
{
    public function home(Request $request)
    {
        $topup = HistoryTopUP::get();
        return view('master.topup.home',compact('topup'));
    }
}
