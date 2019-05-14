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
          ajax: "{{ route('semua-data-kategori') }}",
          columns: [
                  { data: 'id', name: 'id' },
                  { 
                    data: function(data){
                      return `<img src="/img/${data['img']}" width="100px">`;
                    },
                    name: 'img'
                  },
                  { data: 'nama', name: 'nama' },
                  { data: 'subcat', name: 'sub' },
                  { data: 'detail', name: 'detail' },
                  { data: 'action' }
              ]
      });
    });

    function editkategori(data){
      $("#editkategori").modal("show");
      $("#edit-id").val(data.id);
      $("#edit-nama").val(data.nama);
      $("#edit-detail").val(data.detail);
      $("#edit-sub").val(data.sub);
      $("#imgpreview").html(`
        <img src="/img/${data.img}" width="100px">
      `);
      console.log(data);
    }
    function deletekategori(id){
      $("#delete-id").val(id);
      $("#deletekategori").modal("show");
    }

    $("#customFile").change(function(){
        $("#imgpreview").html(`
          <img src="${window.URL.createObjectURL(this.files[0])}" width="100px">
        `)
    })
        // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    </script>
@endpush

@section('content')
    
<div class="container-fluid">
    <table class="table table-bordered" id="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Nama</th>
            <th>Sub</th>
            <th>Detail</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
</div>

@include('kategori.edit')
@include('kategori.delete')
@endsection