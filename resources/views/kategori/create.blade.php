@php
    use Illuminate\Support\Facades\DB;
    $kategori = DB::table("kategoris")->get();
@endphp
@extends('layouts.admin')

@section('title')
    Product
@endsection

@push('css-after')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
@endpush

@push('js-after')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script>
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
<form  method="POST" action="{{ url('kategori')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
            <label>Name</label>
            <input name="nama" type="text" class="form-control" placeholder="Enter Name">
        </div>
        <div class="row">
            <div class="form-group col-md-12 col-lg-6">
                <label>Image Thumbnail</label>
                <div class="custom-file">
                    <input name="image" type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div id="imgpreview"></div>
            </div>
            <div class="form-group col-md-12 col-lg-6">
                <label>Sub Category</label>
                <select name="sub" name="category" class="js-example-basic-single form-control">
                    <option value="">Select Category</option>
                    @if ($kategori)
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id}}">{{ $item->nama}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Detail</label>
            <textarea name="detail" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection