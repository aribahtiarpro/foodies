@php
    $kategoris = DB::table("kategoris")->orderBy("nama","ASC")->get();
    $produks = DB::table("produks")->where("kat_id",$kategori->id)->orderBy("created_at","DESC")->get();
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
    <div class="row my-4">
        <div class="col-md-12">All Category</div>
    </div>
    <div class="row">
        @foreach ($kategoris as $item)
            <div class="col-md-6 col-lg-3 p-2 pointer" onclick="view('kat/{{ $item->slug }}')">
                <img src="/img/{{ $item->img }}" width="50px">
                {{ $item->nama}}
            </div>
        @endforeach
    </div>
    <div class="row my-4">
        <div class="col-md-12">New Product</div>
    </div>
    <div class="row">
            <div class="owl-carousel owl-theme produk">
                @php
                    if($produks->count() > 10){
                        $nmax = 10;
                    }else{
                        $nmax = $produks->count();
                    }
                @endphp
                @for($i = 1; $i < $nmax; $i++)
                    <div class="item product pointer" onclick="view('{{ $produks[$i]->slug }}')">
                    <img src="/img/{{ $produks[$i]->img }}">
                        <div class="product-text">
                            <h1>{{ $produks[$i]->nama}}</h1>
                            <span class="text-primary">Rp. {{ $produks[$i]->harga}}</span>
                        </div>
                    </div>
                @endfor
        </div>
    </div>

    <div class="row my-4">
        <div class="col-md-12">List Product</div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @foreach ($produks as $item)
            <div class="row pointer" onclick="view('{{ $item->slug }}')">
                <div class="col-md-4">
                    <img src="/img/{{ $item->img }}" class="img-fluid">
                </div>
                <div class="col-md-8 product-text pt-2">
                    <h4>{{ $item->nama}}</h4>
                    <span class="text-primary">Rp. {{ $item->harga}}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <br>
    <br>
    <br>
</section>
@endsection
