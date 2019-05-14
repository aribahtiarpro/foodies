<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Auth;
use DB;
use App\transaksi;
use App\transaksi_detail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home');
    }
    public function addCart(Request $req){
        $this->validate($req,[
            "produk_id" => "required",
            "qty" => "required",
        ]);
        
        $cek = Cart::where("user_id",Auth::user()->id)->where("produk_id",$req['produk_id'])->get()->first();
        if($cek){
            $new = Cart::find($cek->id);
            $new->user_id = Auth::user()->id;
            $new->produk_id = $req['produk_id'];
            $new->qty = $req['qty'];
            $new->catatan = $req['catatan'];
            $new->save();
            return $new;
        }else{
            $new = new Cart;
            $new->user_id = Auth::user()->id;
            $new->produk_id = $req['produk_id'];
            $new->qty = $req['qty'];
            $new->catatan = $req['catatan'];
            $new->save();
            return $new;
        }
    }
    public function getCart(Request $req){
        $cart = Cart::join('produks', 'carts.produk_id', '=', 'produks.id')
        ->select('carts.id','carts.qty','carts.catatan','produks.nama','produks.img','produks.harga','produks.slug')
                    ->where("user_id",Auth::user()->id)->get();
        return $cart;
        
    }
    public function checkout(Request $req){
        $cart = Cart::where("user_id",Auth::user()->id)->get();
        // 'id','user_id', 'pembayaran', 'pengiriman','biaya_antar',
        // 'id','transaksi_id','produk_id', 'review', 'qty','catatan',
        if(!$cart){
            return redirect("/");
        }
        $this->validate($req,[
            "metode_pembayaran" => "required",
            "metode_pengiriman" => "required",
        ]);

        $transaksi = new transaksi;
        $transaksi->pembayaran = $req['metode_pembayaran'];
        $transaksi->pengiriman = $req['metode_pengiriman'];
        $transaksi->biaya_antar = 0;
        $transaksi->user_id = Auth::user()->id;
        $transaksi->save();

        foreach($cart as $c){
            $transaksi_detail = new transaksi_detail;
            $transaksi_detail->transaksi_id = $transaksi->id;
            $transaksi_detail->produk_id = $c->produk_id;
            $transaksi_detail->review = 5;
            $transaksi_detail->qty = $c->qty;
            $transaksi_detail->catatan = $c->catatan;
            $transaksi_detail->save();
            Cart::find($c->id)->delete();
        }
        return redirect("/");
        
        
    }
    public function deleteCart(Request $req,$id){
        $delete = Cart::find($id);
        $delete->delete();
        return $delete;
    }
}
