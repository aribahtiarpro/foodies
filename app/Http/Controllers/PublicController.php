<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategori;
use App\produk;
use App\User;

class PublicController extends Controller
{
    public function kategori(Request $req,$slug)
    {
        $kategori = kategori::where("slug",$slug)->get()->first();
        if(!$kategori){
            return view("404");
        }
        return view('public.kategori',compact("kategori"));
    }
    public function product(Request $req,$slug)
    {
        $produk = produk::where("slug",$slug)->get()->first();
        if(!$produk){
            return view("404");
        }
        return view('public.produk',compact("produk"));
    }
    public function username(Request $req, $username)
    {
        $warung = User::where("username",$username)->get()->first();
        $produk = produk::where("warung_id",$warung->id)->orderBy("created_at","DESC")->get()->first();
        return view("public.profile", compact("produk"));
    }
    public function searchData(Request $req,$search){
        return view("public.search", compact("search"));
    }
}
