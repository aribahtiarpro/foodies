@extends('layouts.admin')
@section('title')
    Product
@endsection

@push('css-after')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">

@endpush

@push('js-after')
<script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
<script>

$(document).ready(function() {
        var detail = $('#detail').summernote({
            placeholder: 'Detail Product',
            tabsize: 2,
            height: 100
        });
});

$("#customFile").change(function(){
    $("#imgpreview").html(`
    <img src="${window.URL.createObjectURL(this.files[0])}" width="100px">
    `)
})
</script>
@endpush
@section('content')
<div class="container-fluid">
<form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">       
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter Name">
        </div>
        <div class="row">
            <div class="form-group col-md-12 col-lg-6">
                <label>Image Thumbnail</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div id="imgpreview"></div>
            </div>
            <div class="form-group col-md-12 col-lg-6">
                <label>Category</label>
                <select name="category" class="form-control">
                    <option value="">Select Category</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12 col-lg-6">
                <label>Price</label>
                <input type="integer" class="form-control" placeholder="Enter Price">
            </div>
            <div class="form-group col-md-12 col-lg-6">
                <label>Stok</label>
                <input type="integer" class="form-control" placeholder="Enter Stock">
            </div>
        </div>
        <div class="form-group">
            <label>Detail</label>
            <div id="detail"></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection