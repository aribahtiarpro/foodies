@php
    use Illuminate\Support\Facades\DB;
    $kategori = DB::table("kategoris")->get();
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
          ajax: "{{ url('semua-data-produk') }}",
          columns: [
                  { data: 'id', name: 'id' },
                  { 
                    data: function(data){
                      return `<img src="/img/${data['img']}" width="100px">`;
                    },
                    name: 'img'
                  },
                  { data: 'nama', name: 'nama' },
                  { data: 'kategori', name: 'kat_id' },
                  { data: 'harga', name: 'harga' },
                  { data: 'stok', name: 'stok' },
                  { data: 'action' }
              ]
      });
    });

    function edittalent(data){
      $("#edittalent").modal("show");
      $("#edit-id").val(data.id);
      $("#edit-nama").val(data.nama);
      $("#edit-deskripsi").val(data.deskripsi);
      console.log(data);
    }
    function deletetalent(id){
      $("#delete-id").val(id);
      $("#deletetalent").modal("show");
    }
</script>
@endpush

@section('content')
    
<div class="container-fluid table-responsive">
    <table class="table table-bordered" id="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
</div>

@include('product.edit')
@include('product.delete')
@endsection