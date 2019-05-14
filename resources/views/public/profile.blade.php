@php
  if($produk){
    $warung = DB::table("users")->where("id",$produk->warung_id)->get()->first();
    $produks = DB::table("produks")->where("id","!=",$produk->id)->where("warung_id",$produk->warung_id)->orderBy("created_at","DESC")->get();
  }
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

@if($produk)
<section class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <img src="/img/{{$produk->img}}" width="100%">
                </div>
                <div class="col-md-12 col-lg-6 product-text pt-2">
                        <div class="row">
                            <div class="col-md-12 my-2">
                                <div class="card border-left-primary shadow h-100 pt-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg font-weight-bold text-primary text-uppercase mb-2">{{$produk->nama}}</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ $produk->harga}}</div>
                                            
                                        </div>
                                        <div class="col-auto">
                                            <a  onclick="addToCart({{ json_encode($produk)}})" href="#" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </span>
                                                <span class="text">tambah</span>
                                            </a>
                                        </div>
                                        {!! $produk->detail !!}
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <span class="mr-2 pt-4 h3">
                            <img width="50px" src="{{ $warung->avatar ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCAaNR8ezyQXK7BjFYLNxLt4jum9Fy-zctQ-UINx5OZlKvJi7g' }}">
                            <b class="text-primary">{{'@'.$warung->name}}</b>
                            <div class="float-right text-warning h5 pt-3">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                (100)
                            </div>
                        </span>
                        <hr>
                    <div class="row">
                        @foreach ($produks as $item)
                        <div class="col-md-12 pointer pb-2">
                            <div class="row">
                                <div class="col-3">
                                    <img onclick="view('{{ $item->slug }}')" width="100%" src="/img/{{ $item->img }}">
                                </div>
                                <div class="col-9">
                                    <h4>{{ $item->nama}}</h4>
                                    <span class="text-primary">Rp. {{ $item->harga}}</span>
                                    <a  onclick="addToCart({{ json_encode($item)}})" href="#" class="float-right btn btn-primary btn-sm btn-icon-split">
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
                    
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
</section>
@endif
@endsection
