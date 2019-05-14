@php
    $kategoris = DB::table("kategoris")->orderBy("nama","ASC")->get();
    $produks = DB::table("produks")->orderBy("created_at","DESC")->get();
@endphp
@extends('layouts.user')

@section('title')
Foodies
@endsection

@push('css-after')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="css/aristyle.css">
@endpush
@push('js-after')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
var owl = $('.produk');
owl.owlCarousel({
    loop:true,
    margin:10,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})

owl.on('mousewheel', '.owl-stage', function (e) {
    if (e.deltaY>0) {
        owl.trigger('next.owl');
    } else {
        owl.trigger('prev.owl');
    }
    e.preventDefault();
});

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
            <div class="col-md-12 col-lg-7">
                <div class="row my-2">
                    <div class="col-md-12">Promo</div>
                </div>
                <div class="promosi owl-carousel owl-theme">
                    <div class="item product pointer">
                        <img src="img/promo.jpg">
                    </div>
                    <div class="item product pointer">
                        <img src="img/promo1.jpg">
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-5 pointer" data-target="#paydies" data-toggle="modal">
                <hr>
                <div class="row my-2">
                    <div class="col-md-12">Paydies</div>
                </div>
                <div class="row my-2">
                    <div class="col-md-12">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">saldo (Rp)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 400,000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-credit-card fa-2x text-primary-300"></i>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row my-2">
                    <div class="col-md-12">About Foodies</div>
                </div>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/fxZAoPAG98Q?rel=0" allowfullscreen></iframe>
                </div>
            </div>
    </div>
    <div class="row my-4">
        <div class="col-md-12">All Category</div>
    </div>
    <div class="row">
        @foreach ($kategoris as $item)
            <div class="p-2 pointer" onclick="view('kat/{{ $item->slug }}')">
                <img class="shadow" width="50px" height="50px" src="img/{{ $item->img }}">
                <span>{{ $item->nama}}</span>
            </div>
        @endforeach
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider">
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
                    <div class="product pointer">
                        <img  onclick="view('{{ $produks[$i]->slug }}')" src="img/{{ $produks[$i]->img }}">
                        <div class="product-text">
                            <h1><b>{{ $produks[$i]->nama}}</b></h1>
                            <div class="product-act">
                                <span class="text-primary">Rp. {{ $produks[$i]->harga}}
                                    <a onclick="addToCart({{ json_encode($produks[$i])}})" class="text-white btn-sm btn btn-primary btn-icon-split float-right">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-shopping-cart"></i>
                                        </span>
                                        <span class="text">tambah</span>
                                    </a>
                                </span>
                                <p>{!! substr($item->detail, 0, 50) !!}</p>
                            </div>
                        </div>
                    </div>
                @endfor
        </div>
    </div>
    <br>
    <br>
    <br>
</section>
@endsection
