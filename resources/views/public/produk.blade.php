@php
    $kategoris = DB::table("kategoris")->orderBy("nama","ASC")->get();
    $warung = DB::table("users")->where("id",$produk->warung_id)->get()->first();
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
var owl = $('.produk');
owl.owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})


$('.promosi').owlCarousel({
    center: true,
    items:1,
    loop:true,
    margin:10
});
function view(slug){
    location.href = "/"+slug
}
</script>
@endpush
@section('content')
<section class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <img src="/img/{{$produk->img}}" class="img-fluid">
                </div>
                <div class="col-md-12 col-lg-6 product-text pt-2">

                        <div class="row">
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-md-12 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-lg font-weight-bold text-primary text-uppercase mb-2">{{$produk->nama}}</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ $produk->harga}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                    </div>
                    <p>
                        <a href="/{{ '@'.$warung->username }}">
                            <img width="50px" class="img rounded-circle" src="{{ $warung->avatar ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCAaNR8ezyQXK7BjFYLNxLt4jum9Fy-zctQ-UINx5OZlKvJi7g' }}">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{'@'.$warung->name}}</span>
                        </a>
                        <br>
                        Alamat : {{$warung->alamat}}
                    </p>
                    <a href="#" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fa fa-shopping-cart"></i>
                        </span>
                        <span class="text">Pesan Sekarang</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
</section>
@endsection
