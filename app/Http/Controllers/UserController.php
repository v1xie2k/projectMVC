<?php

namespace App\Http\Controllers;

use App\Models\Dtrans;
use App\Models\Htrans;
use App\Models\Users;
use App\Rules\CheckEmail;
use App\Rules\CheckOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        $pictures = Storage::disk('public')->files("users");
        $picture = "default.jpg";
        foreach($pictures as $val)
        {
            if(pathinfo($val)["filename"] == getYangLogin()->id){
                $picture = pathinfo($val)["basename"];
            }
        }
        return view('client.user.profile',compact('picture'));
    }
    public function editprofile(Request $request)
    {
        $picture = Storage::disk('public')->files("users");
        foreach($picture as $val)
        {
            if(pathinfo($val)["filename"] == getYangLogin()->id){
                $picture = pathinfo($val)["basename"];
            }
        }
        return view('client.user.editprofile',compact('picture'));
        // return view('client.user.editprofile');
    }
    public function doedit(Request $request)
    {
        $user = Users::find($request->id);
        $validated = $request->validate([
            'name' => 'required|min:4|max:25',
            'photos' => 'mimes:jpg,webp|max:10000',
            'alamat' => 'required'
        ]);
        $data = $request->all();
        if($request->photo != null){
            Storage::disk('public')->delete('users/'.$request->pict);
        }
        $namaFile = $request->id.".".$request->file("photo")->getClientOriginalExtension();
        $path = $request->file("photo")->storeAs("users", $namaFile, "public");
        $user->update($data);
        return redirect()->back()->with('pesan',['tipe'=>1, 'isi'=> 'success update profle']);
    }
    public function editpassword(Request $request)
    {
        return view('client.user.editpassword');
    }
    public function doeditpassword(Request $request)
    {
        $user = Users::find($request->id);
        $validated = $request->validate([
            'oldpassword' => ['required',new CheckOldPassword],
            'password' => 'required|confirmed'
        ]);
        $data = $request->all();
        $data["password"] = Hash::make($request->password);
        $user->update($data);
        return redirect()->back()->with('pesan',['tipe'=>1, 'isi'=> 'success change password']);
    }
    public function historyTrans(Request $request)
    {
        $histories = Htrans::where('id_user',getYangLogin()->id)->get();
        // dd($histories);
        return view('client.user.historytrans',compact('histories'));
    }
    public function historyTransDetail(Request $request)
    {
        $details = Dtrans::where('id_htrans', $request->id)->get();
        return view('client.user.detailtrans',compact('details'));
    }
}
