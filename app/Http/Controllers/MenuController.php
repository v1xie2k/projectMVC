<?php

namespace App\Http\Controllers;

use App\Models\KategoriMenu;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;


class MenuController extends Controller
{
    public function home(Request $request)
    {
        // $menus = Menu::get();
        $categories = KategoriMenu::get();
        return view('master.Items.home',compact('categories'));
    }

    public function test(Request $request)
    {
        return view('test');
    }

    public function load()
    {
        $menus = Menu::get();
        return DataTables::of($menus)
            ->addColumn('kategori', function ($data) {
                $load = KategoriMenu::where('id', $data->id_kategori)->pluck('name');
                $hasil = str_replace(array('"','[',']' ), '', $load);
                // return $hasil;
                return "<p>$hasil</p>";
            })
            ->addColumn('btnDelete', function ($data) {
                return "<a href='#' class='btn btn-danger' onclick='return confirm(`Are you sure you want to delete $data->customer_nama and their PICs ?`);'>Delete</a>";
            })
            ->addColumn('btnDetail', function ($data) {
                return "<a class='btn btn-warning detail' option='$data->customer_id'>Detail</a>";
            })

            ->rawColumns(['btnDelete', 'kategori', 'btnDetail'])
            ->make(true);
    }


    public function docreate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg,webp|max:10000',
            'deskripsi' => 'required',
            'harga' => 'required|numeric'
        ]);
        $data = $request->all();
        $id = Menu::create($data);
        if($id){
            $namaFile = $id->id.".".$request->file("photo")->getClientOriginalExtension();
            $path = $request->file("photo")->storeAs("items", $namaFile, "public");
            return redirect()->back()->with('pesan',['tipe'=>1, 'isi'=> 'Berhasil insert']);
        }
        else{
            return redirect()->back()->with('pesan',['tipe'=>0, 'isi'=> 'Gagal insert']);
        }
    }
    public function detail(Request $request)
    {
        $menu = Menu::find($request->id);
        $categories = KategoriMenu::get();
        $pict = Storage::disk('public')->files("items");
        for ($i=0; $i < count($pict); $i++) {
            if(pathinfo($pict[$i])["filename"] == $request->id){
                $picture = pathinfo($pict[$i])["basename"];
            }
        }
        return view('master.Items.detail',compact('menu', 'categories', 'picture'));
    }
    public function doedit(Request $request)
    {
        $menu = Menu::find($request->id);
        $validated = $request->validate([
            'name' => 'required',
            'photo' => 'mimes:png,jpg,jpeg,webp|max:10000',
            'deskripsi' => 'required',
            'harga' => 'required|numeric'
        ]);
        $data = $request->all();
        if($request->photo != null){
            Storage::disk('public')->delete('items/'.$request->pict);
            $namaFile = $request->id.".".$request->file("photo")->getClientOriginalExtension();
            $path = $request->file("photo")->storeAs("items", $namaFile, "public");
        }
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


    public function lprod()
    {
        $menus = Menu::get();
        // dd($menus);
        return DataTables::of($menus)
            ->addColumn('kategori', function ($data) {
                $load = KategoriMenu::where('id', $data->id_kategori)->pluck('name');
                $hasil = str_replace(array('"','[',']' ), '', $load);
                // return $hasil;
                return "<p>$hasil</p>";
            })
            ->addColumn('btnDelete', function ($data) {
                return "<a href='#' class='btn btn-danger' onclick='return confirm(`Are you sure you want to delete $data->customer_nama and their PICs ?`);'>Delete</a>";
            })
            ->addColumn('picture', function ($data) {
                return "<img src='{{asset(`css/gallery/mochi.png`)}}' height=\"50\"/>";
            })

            ->rawColumns(['btnDelete', 'kategori', 'picture'])
            ->make(true);
    }

}
