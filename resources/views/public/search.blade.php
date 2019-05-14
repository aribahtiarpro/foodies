@php
    $kategoris = DB::table("kategoris")->where('nama', 'like', '%'.$search.'%')->orderBy("nama","ASC")->get();
    $produks = DB::table("produks")->where('nama', 'like', '%'.$search.'%')->orderBy("created_at","DESC")->get();
@endphp
@extends('layouts.user')

@section('title')
Foodies
@endsection

@push('css-after')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<style>

.product .product-text{
    padding: 8px 5px;
}

.product h1{
    font-size: 1.1rem
}

</style>
@endpush
@push('js-after')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
function view(slug){
    location.href = "/"+slug
}
</script>
@endpush
@section('content')
<section class="container">
    <div class="row my-4">
        <div class="col-md-12">All Category</div>
    </div>
    <div class="row">
        @foreach ($kategoris as $item)
        <div class=" m-2 pointer" style="border-radius:5%" onclick="view('kat/{{ $item->slug }}')">
            <img class="shadow" width="50px" height="50px" src="/img/{{ $item->img }}">
            <span>{{ $item->nama}}</span>
        </div>
        @endforeach
    </div>
    <div class="row my-4">
        <div class="col-md-12">List Product</div>
    </div>
    <div class="row">
        @foreach ($produks as $item)
        <div class="col-md-12 col-lg-6 pointer pb-2" onclick="view('{{ $item->slug }}')">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <img width="100%" src="/img/{{ $item->img }}">
                </div>
                <div class="col-md-12 col-lg-6 py-4">
                    <h4>{{ $item->nama}}</h4>
                    <span class="text-primary">Rp. {{ $item->harga}}</span>
                    <p>
                        {!! substr($item->detail, 0, 50) !!}
                    </p>
                    <a  onclick="addToCart({{ json_encode($item)}})" href="#" class="btn btn-primary btn-sm float-right btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fa fa-shopping-cart"></i>
                        </span>
                        <span class="text">tambah</span>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    <br>
    <br>
    <br>
</section>
@endsection
