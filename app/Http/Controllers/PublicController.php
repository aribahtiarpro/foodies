<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategori;
use App\produk;

class PublicController extends Controller
{
    public function kategori(Request $req,$slug)
    {
        $kategori = kategori::where("slug",$slug)->get()->first();
        return view('public.kategori',compact("kategori"));
    }
    public function product(Request $req,$slug)
    {
        $produk = produk::where("slug",$slug)->get()->first();
        return view('public.produk',compact("produk"));
    }
    public function username(Request $req, $username)
    {
        return $username;
    }
}
