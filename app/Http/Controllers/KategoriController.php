<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategori;
use DataTables;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('kategori.index');
    }

    public function semuaDataKategori(){
        $model = kategori::query();
        return Datatables::of($model)
            ->addColumn('subcat', function ($kat) {
                $dsub = kategori::find($kat->sub);
                if($dsub){
                    return  $dsub->nama;
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
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $req)
    {
        // return $req;
        $this->validate($req,[
            "nama" => "required",
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagename = time().'.'.request()->image->getClientOriginalExtension();

        $slug = Str::slug($req['nama'], '-');
        
        $req->file('image')->move(public_path('img'), $imagename);

        $new = new kategori;
        $new->nama = $req['nama'];
        $new->slug= $slug;
        $new->img = $imagename;
        $new->sub = $req['sub'];
        $new->detail = $req['detail'];
        $new->save();

        return redirect("kategori");
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
    public function edit(Request $req)
    {
       // return $req;
        $this->validate($req,[
            "id" => "required",
            "nama" => "required",
        ]);

        $new = kategori::find($req['id']);

        if($req->file('image')){
            $this->validate($req,[
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imagename = time().'.'.request()->image->getClientOriginalExtension();

            $req->file('image')->move(public_path('img'), $imagename);

            if (file_exists(public_path('img').'/'.$new->img)) {
                unlink(public_path('img').'/'.$new->img);
            }
            $new->img = $imagename;
        }
        
        $new->nama = $req['nama'];
        $new->sub = $req['sub'];
        $new->detail = $req['detail'];
        $new->save();

        return redirect("kategori");
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
    public function destroy(Request $req)
    {
        $this->validate($req,[
            "id" => "required",
        ]);

        $delete = kategori::find($req['id']);
        $delete->delete();
        return redirect("kategori");
    }
}
