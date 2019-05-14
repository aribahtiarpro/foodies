<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi;
use Auth;
use DataTables;

class TransaksiController extends Controller
{
     /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('transaksi.index');
    }
    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    // public function semuaTransaksi(){
    //     $model = transaksi::join('transaksi_detail', 'carts.produk_id', '=', 'produks.id')
    //     ->select('carts.id','carts.qty','carts.catatan','produks.nama','produks.img','produks.harga','produks.slug')
    //                 ->where("user_id",Auth::user()->id)->get();
    //     if(Auth::user()->role_id == 1){
    //         $produk = $model;
    //     }else{
    //         $produk = $model->where("warung_id", Auth::user()->id);
    //     }
    //     return Datatables::of($produk)
    //         ->addColumn('action', function ($kat) {
    //             $edit = "<a href='#' onclick='editproduk(".$kat.")' class='btn btn-sm btn-primary mr-2'><i class='fa fa-edit'></i> Edit</a>";
    //             // $delete = '<a href="#" onclick="deleteproduk('.$kat->id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>';
    //             return $edit;
    //         })
    //         ->make(true);
    // }
}
