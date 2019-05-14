
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
<div class="container py-5">
    <div class="row">
            <div class="col-md-12 col-lg-4">
                <h2>
                    Pesanan Anda
                </h2>
                <div id="data-checkout"></div>
                <h5>
                    <div class="text-right pt-2" id="data-checkout-total"></div>
                </h5>
            </div>
    </div>
</div>
@endsection
