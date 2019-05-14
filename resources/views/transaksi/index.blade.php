@php
    use Illuminate\Support\Facades\DB;
    $kategori = DB::table("kategoris")->get();
    $transaksis = DB::table("transaksis")->get();
@endphp
@extends('layouts.admin')
@section('title')
    Product
@endsection

@push('css-after')
<link  href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@push('js-after')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(function() {
          $('#table').DataTable({
          processing: true,
          serverSide: true,
          "search": {
            "regex": true
          },
          ajax: "{{ url('semua-data-transaksi') }}",
          columns: [
                  { data: 'id', name: 'id' },
                  // { 
                  //   data: function(data){
                  //     return `<img src="/img/${data['img']}" width="100px">`;
                  //   },
                  //   name: 'img'
                  // },
                  // { data: 'nama', name: 'nama' },
                  // { data: 'kategori', name: 'kat_id' },
                  // { data: 'harga', name: 'harga' },
                  // { data: 'stok', name: 'stok' },
                  { data: 'action' }
              ]
      });
    });

    function editproduk(data){
      $("#editproduk").modal("show");
      $("#edit-id").val(data.id);
      $("#edit-nama").val(data.nama);
      $("#edit-harga").val(data.harga);
      $("#edit-stok").val(data.stok);
      $("#edit-detail").val(data.detail);
      $("#edit-sub").val(data.kat_id);
      $("#imgpreview").html(`
        <img src="/img/${data.img}" width="100px">
      `);
      console.log(data);
    }
    function deleteproduk(id){
      $("#delete-id").val(id);
      $("#deleteproduk").modal("show");
    }
</script>
@endpush

@section('content')
    
<div class="container-fluid table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Nama</th>
            <th>Pembayaran</th>
            <th>Pengiriman</th>
            <th>warung</th>
            <th>Produk</th>
            <th>Action</th>
        </tr>
        @foreach ($transaksis as $item)
          <tr>
            <td>
            @php
                $user = DB::table("users")->where("id",$item->user_id)->first();
            @endphp
            {{ $user->name}}
            </td>
            <td>
              {{$item->pembayaran}}
            </td>
            <td>
              {{$item->pengiriman}}
            </td>
            <td>
            @php
                $warung = DB::table("users")->where("id",$item->warung_id)->first();
            @endphp
            {{ $warung->name}}
            </td>
            <td>
              @php
                  $totalbayar = 0;
                  $produks = DB::table("transaksi_details")->where("transaksi_id",$item->id)->get();
              @endphp
                  @foreach ($produks as $i)
                      @php
                          
                          $p = DB::table("produks")->where("id",$i->produk_id)->first();
                          $totalbayar = $totalbayar + $p->harga;
                      @endphp
                    <p>
                      <img src="/img/{{$p->img}}" width="50px">
                    </p>
                    <p>{{$p->nama}}</p>
                    <p>Jumlah : {{$i->qty }}</p>
                    <p>Harga : {{$p->harga }}</p>
                    <p>jml Bayar : {{$p->harga * $i->qty }}</p>
                    <p>Catatan : {{$i->catatan }}</p>
                @endforeach
            </td>
            <td>
              @if($item->status == "berhasil")
              <a class="btn btn-success">Berhasil</a>
              @else 
                <a href="{{ url('status-berhasil')}}">Edit Status</a>
              @endif
            </td>
          </tr>
          
        @endforeach
      
    </thead>
</table>
</div>

@include('product.edit')
{{-- @include('product.delete') --}}
@endsection