<?php

namespace App\Http\Controllers;

use App\Models\KategoriMenu;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function home(Request $request)
    {
        $menus = Menu::get();
        $categories = KategoriMenu::get();
        return view('master.Items.home',compact('menus','categories'));
    }
    public function docreate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric'
        ]);
        $data = $request->all();
        if(Menu::create($data)){
            return redirect()->back()->with('pesan',['tipe'=>1, 'isi'=> 'Berhasil insert']);
        }
        else{
            return redirect()->back()->with('pesan',['tipe'=>0, 'isi'=> 'Gagal insert']);
        }
    }
    public function detail(Request $request)
    {
        $menu = Menu::find($request->id);
        return view('master.Items.detail',compact('menu'));
    }
    public function doedit(Request $request)
    {
        $menu = Menu::find($request->id);
        $validated = $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric'
        ]);
        $data = $request->all();
        if($menu){
            if($menu->update($data)){
                return redirect()->back()->with('pesan',['tipe'=>1, 'isi'=> 'Berhasil update']);
            }
            else{
                return redirect()->back()->with('pesan',['tipe'=>0, 'isi'=> 'Gagal update']);
            }
        }else{
            return redirect()->back()->with('pesan',['tipe'=>0, 'isi'=> 'Gagal update data tidak ditemukan']);
        }
    }
    public function delete(Request $request)
    {
        $menu = Menu::find($request->id);
        if($menu){
            if($menu->delete()){
                return redirect()->back()->with('pesan',['tipe'=>1, 'isi'=> 'Success delete menu']);
            }
            else{
                return redirect()->back()->with('pesan',['tipe'=>0, 'isi'=> 'Failed delete menu']);
            }
        }else{
            return redirect()->back()->with('pesan',['tipe'=>0, 'isi'=> 'Gagal delete data tidak ditemukan']);
        }
    }

}
