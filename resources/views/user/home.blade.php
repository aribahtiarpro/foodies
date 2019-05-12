@extends('layouts.user')

@section('title')
Foodies
@endsection

@push('css-after')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<style>
.product{
    box-shadow: 0px 2px 2px #ccc;
    float: left;
}
.product .product-text{
    padding: 8px 5px;
}
.product img{
    width: 100%;
}
.product h1{
    font-size: 1.1rem
}
.product:hover{
    box-shadow: 0px 4px 2px #ccc;
}
</style>
@endpush
@push('js-after')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
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
    <div class="row">
            <div class="owl-carousel owl-theme">
                <div class="item product" onclick="view('slug')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEQRt3AcyjHB9fay6QZVHr7CZgV50-s-NOONdbpGovO6rCP4i9">
                    <div class="product-text">
                        <h1>Ini Makanan Paling Enak di bulan suci Ramadhan</h1>
                        <span class="text-primary">Rp. 50,000</span>
                    </div>
                </div>
                <div class="item product">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEQRt3AcyjHB9fay6QZVHr7CZgV50-s-NOONdbpGovO6rCP4i9">
                    <div class="product-text">
                        <h1>Ini Makanan Paling Enak di bulan suci Ramadhan</h1>
                        <span class="text-primary">Rp. 50,000</span>
                    </div>
                </div>
                <div class="item product">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEQRt3AcyjHB9fay6QZVHr7CZgV50-s-NOONdbpGovO6rCP4i9">
                    <div class="product-text">
                        <h1>Ini Makanan Paling Enak di bulan suci Ramadhan</h1>
                        <span class="text-primary">Rp. 50,000</span>
                    </div>
                </div>
                <div class="item product">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEQRt3AcyjHB9fay6QZVHr7CZgV50-s-NOONdbpGovO6rCP4i9">
                    <div class="product-text">
                        <h1>Ini Makanan Paling Enak di bulan suci Ramadhan</h1>
                        <span class="text-primary">Rp. 50,000</span>
                    </div>
                </div>
                <div class="item product">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEQRt3AcyjHB9fay6QZVHr7CZgV50-s-NOONdbpGovO6rCP4i9">
                    <div class="product-text">
                        <h1>Ini Makanan Paling Enak di bulan suci Ramadhan</h1>
                        <span class="text-primary">Rp. 50,000</span>
                    </div>
                </div>
        </div>
    </div>
</section>
@endsection
