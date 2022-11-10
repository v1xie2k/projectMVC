<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasterUserController extends Controller
{
    public function home(Request $request)
    {
        $users = User::where('name','not like', 'admin%')->orderBy('name','asc')->get();
        return view('master.user.home',compact('users'));
    }

    public function reset(Request $request)
    {
        $users = User::find($request->id);
        $defaultPassword = Hash::make("iloveamazake");
        if($users->update(['password'=>$defaultPassword])){
            return redirect('admin/user')->with('pesan',['tipe'=>1, 'isi'=> 'Berhasil Reset Password']);
        }else{
            return redirect('admin/user')->with('pesan',['tipe'=>0, 'isi'=> 'Gagal Reset Password']);
        }
    }

    public function delete(Request $request)
    {
        $users = User::find($request->id);
       
        if($users->delete()){
            return redirect('admin/user')->with('pesan',['tipe'=>1, 'isi'=> 'Berhasil Hapus User']);
        }else{
            return redirect('admin/user')->with('pesan',['tipe'=>0, 'isi'=> 'Gagal Hapus User']);
        }
    }

    public function search(Request $request)
    {
        $type = $request->search;
        $sort = $request->sort;
        if($sort == "new"){
            $users = User::where('name','not like', 'admin%')->where('name','like','%'.$type.'%')->orderBy('updated_at','desc')->get();
            return view('master.user.home',compact('users'));
        }else if($sort == "old"){
            $users = User::where('name','not like', 'admin%')->where('name','like','%'.$type.'%')->orderBy('updated_at','asc')->get();
            return view('master.user.home',compact('users'));
        }else if($sort == "asc"){
            $users = User::where('name','not like', 'admin%')->where('name','like','%'.$type.'%')->orderBy('name','asc')->get();
            return view('master.user.home',compact('users'));
        }else if($sort == "desc"){
            $users = User::where('name','not like', 'admin%')->where('name','like','%'.$type.'%')->orderBy('name','desc')->get();
            return view('master.user.home',compact('users'));
        }
        
    }

    
}
