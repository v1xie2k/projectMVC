<?php

namespace App\Http\Controllers;

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
        $picture = Storage::disk('public')->files("users");
        // for ($i=0; $i < count($picture); $i++) {
        //     if(pathinfo($picture[$i])["filename"] == getYangLogin()->id){
        //         $picture = pathinfo($picture[$i])["basename"];
        //     }
        // }
        foreach($picture as $val)
        {
            if(pathinfo($val)["filename"] == getYangLogin()->id){
                $picture = pathinfo($val)["basename"];
            }
        }
        return view('client.user.profile',compact('picture'));
        // if($picture){

        // }
        // return view('client.user.profile');
    }
    public function editprofile(Request $request)
    {
        $picture = Storage::disk('public')->files("users");
        // dd(count($picture));
        // dd($picture);
        foreach($picture as $val)
        {
            if(pathinfo($val)["filename"] == getYangLogin()->id){
                $picture = pathinfo($val)["basename"];
            }
        }
        // for ($i=0; $i < count($picture); $i++) {
        //     if(pathinfo($picture[$i])["filename"] == getYangLogin()->id){
        //         $picture = pathinfo($picture[$i])["basename"];
        //     }
        // }
        return view('client.user.editprofile',compact('picture'));
        // return view('client.user.editprofile');
    }
    public function doedit(Request $request)
    {
        $user = Users::find($request->id);
        $validated = $request->validate([
            'name' => 'required|min:4|max:25',
            // 'email' => ['required', 'email', new CheckEmail],
            'photos' => 'mimes:png,jpg,jpeg,webp|max:10000',
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
}
