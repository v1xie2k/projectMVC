<?php

namespace App\Http\Controllers;

use App\Models\Htrans;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MasterReportController extends Controller
{
    public function home(Request $request)
    {
        // $end_date = $request->end_date ?  Carbon::parse($request->end_date) : new Carbon('last day of this month');
        //Carbon::parse('11/21/2022') m/d/y
        if(Session::get('start_date') == null)
        {
            $start_date = new Carbon('first day of this month');
            Session::put('start_date',$start_date);
        }
        if(Session::get('end_date') == null)
        {
            $end_date = new Carbon('last day of this month');
            Session::put('end_date',$end_date);
        }
        $start = Session::get('start_date');
        $end = Session::get('end_date');
        $invoice = Htrans::where('created_at','>=',$start)->where('created_at','<=',$end)->get();
        $total_trans = 0;
        $total_income = 0;
        $total_qty = 0;
        foreach ($invoice as $value) {
            $total_income += $value->total;
            $total_qty += $value->quantity;
            $total_trans++;
        }
        return view('master.Reports.home',compact('start','end','total_trans','total_income','total_qty'));
    }
    public function filterDate(Request $request)
    {
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);
        Session::forget('start_date');
        Session::forget('end_date');
        Session::put('start_date',$start);
        Session::put('end_date',$end);
        return redirect()->back();
    }

}
