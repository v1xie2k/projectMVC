<?php

namespace App\Http\Controllers;

use App\Models\KategoriMenu;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{
    public function home(Request $request)
    {
        Session::forget('categoriesPicts');
        $categories = KategoriMenu::all();
        $pict = Storage::disk('public')->files("categories");
        foreach($pict as $val)
        {
            Session::push('categoriesPicts', pathinfo($val)["basename"]);
        }
        $picts = Session::get('categoriesPicts');
        return view('client.menu.listcategory',compact('categories','picts'));
    }
    public function listitems(Request $request)
    {
        Session::forget('picts');
        $category = KategoriMenu::find($request->id);
        $items = Menu::where('id_kategori',$request->id)->orderBy('name','asc')->get();
        $pict = Storage::disk('public')->files("items");
        // for ($i=0; $i < count($pict); $i++) {

        //     $pict = pathinfo($pict[$i])["basename"];

        // }
        // foreach($pict as $val)
        // {
        //     $data = [];
        //     $data['filename'] = pathinfo($val)["basename"];
        //     $data['name'] = explode('.',pathinfo($val)["basename"])[0];
        //     $data['ext'] = '.'.explode('.',pathinfo($val)["basename"])[1];
        //     Session::push('picts', $data);
        // }
        foreach($pict as $val)
        {
            $data = [];
            $data['filename'] = pathinfo($val)["basename"];
            $data['name'] = explode('.',pathinfo($val)["basename"])[0];
            $data['ext'] = '.'.explode('.',pathinfo($val)["basename"])[1];
            Session::push('picts', pathinfo($val)["basename"]);
        }
        $picts = Session::get('picts');
        // dd($picts);
        return view('client.menu.listitems',compact('category','items','picts'));
    }
}
