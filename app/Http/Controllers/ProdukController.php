<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produk;
use Auth;
use DataTables;
use App\kategori;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function semuaProduk(){
        $model = produk::query();
        if(Auth::user()->id == 1){
            $produk = $model;
        }else{
            $produk = $model->where("warung_id", Auth::user()->id);
        }
        return Datatables::of($produk)
            ->addColumn('kategori', function ($pro) {
                $dkat = kategori::find($pro->kat_id);
                if($dkat){
                    return  $dkat->nama;
                }else{
                    return "";
                }
            })
            ->addColumn('action', function ($kat) {
                $edit = "<a href='#' onclick='editkategori(".$kat.")' class='btn btn-sm btn-primary mr-2'><i class='fa fa-edit'></i> Edit</a>";
                $delete = '<a href="#" onclick="deletekategori('.$kat->id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>';
                return $edit . $delete;
            })
            ->make(true);
    }
    public function store(Request $req)
    {
        // return $req;
        // 'nama','detail', 'img', 'harga','stok','kat_id','warung_id',
        $this->validate($req,[
            "nama" => "required",
            "detail" => "required",
            "harga" => "required",
            "stok" => "required",
            "kat_id" => "required",
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagename = time().'.'.request()->image->getClientOriginalExtension();
        
        $req->file('image')->move(public_path('img'), $imagename);
        
        $slug = Str::slug($req['nama'], '-');
        $new = new produk;
        $new->nama = $req['nama'];
        $new->slug = $slug;
        $new->img = $imagename;
        $new->harga = $req['harga'];
        $new->stok = $req['stok'];
        $new->kat_id = $req['kat_id'];
        $new->detail = $req['detail'];
        $new->warung_id = Auth::user()->id;
        $new->save();

        return redirect("product");
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('akreditasi::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('akreditasi::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
