@php
    $kategoris = DB::table("kategoris")->orderBy("nama","ASC")->get();
    $produks = DB::table("produks")->where("kat_id",$kategori->id)->orderBy("created_at","DESC")->get();
    $produkpaginate = App\produk::where("kat_id",$kategori->id)->orderBy("created_at","ASC")->paginate(4);
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
    // loop:true,
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
    
    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="row my-4">
        <div class="col-md-12">New Product</div>
    </div>
    
    <div class="row">
            <div class="owl-carousel owl-theme produk">
                @php
                    if($produks->count() > 6){
                        $nmax = 6;
                    }else{
                        $nmax = $produks->count();
                    }
                @endphp
                @for($i = 0; $i < $nmax; $i++)
                    <div class="product pointer">
                        <img  onclick="view('{{ $produks[$i]->slug }}')" src="/img/{{ $produks[$i]->img }}">
                        <div class="product-text">
                            <h1>{{ $produks[$i]->nama}}</h1>
                            <div class="product-act">
                                <span class="text-primary">Rp. {{ $produks[$i]->harga}}
                                    <a  onclick="addToCart({{ json_encode($item)}})" class="text-white btn btn-sm btn-primary btn-icon-split float-right">
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
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="row my-4">
        <div class="col-md-12">List Product</div>
    </div>
    
    <div class="row">
        @foreach ($produkpaginate as $item)
        <div class="col-md-12 col-lg-6 pointer pb-2" onclick="view('{{ $item->slug }}')">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <img width="100%" src="/img/{{ $item->img }}">
                </div>
                <div class="col-md-12 col-lg-6 pt-4">
                    <h4>{{ $item->nama}}</h4>
                    <span class="text-primary">Rp. {{ $item->harga}}
                    <a  onclick="addToCart({{ json_encode($item)}})" href="#" class="btn btn-primary btn-sm float-right btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fa fa-shopping-cart"></i>
                            </span>
                            <span class="text">tambah</span>
                        </a>
                    </span>
                    <p>
                        {!! substr($item->detail, 0, 70) !!}
                    </p>
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    {{ $produkpaginate->links() }}
    <br>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    <br>
    <br>
</section>
@endsection
