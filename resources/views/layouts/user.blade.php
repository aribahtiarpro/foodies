@php
    use Illuminate\Support\Facades\DB;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>@yield("title")</title>

<!-- Custom fonts for this template-->
<link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="/css/sb-admin-2.css" rel="stylesheet">
<style>
*{
    box-sizing: border-box
}
.pointer{
  cursor: pointer;
}
img{
  border-radius: 5%
}
</style>
@stack('css-after')
</head>

<body id="page-top">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('layouts.user.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div style="margin-top:80px" id="data-content">
          @yield('content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
      </div>
    </div>
  </div>
@if(Auth::user())
  <!-- Modal -->
  <div class="modal fade" id="paydies" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Paydies Barcode</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center" id="qrcodepaydies"></div>
          <div class="text-center">{{ '@'.Auth::user()->username }}</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>

   <!-- Modal -->
   <div class="modal fade" id="addtocart-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle">Add To Cart</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

              <div class="col-md-12 pointer pb-2">
                  <div class="row">
                      <div class="col-3">
                          <img id="img-cart" width="100%" src="">
                      </div>
                      <div class="col-9">
                          <h4 id="nama-cart"></h4>
                          <span class="text-primary" id="harga-cart"></span>
                      </div>
                  </div>
              </div>


            <div class="form-group">
              <label>Qty</label>
              <input class="form-control" value="1" type="number" id="add-qty">
            </div>
            <div class="form-group">
              <label>Catatan</label>
              <textarea placeholder="yang Pedes Mas.." class="form-control" id="add-catatan"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            {{-- <button  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
            <button id="addTooo" type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

  <form action="{{ url("checkout")}}" method="POST">
    @csrf 
     <!-- Modal -->
   <div class="modal fade" id="checkout-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle">Checkout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div id="data-checkout"></div>
              <div id="data-checkout-total"></div>
              <div class="form-group">
                <label>Metode Pembayaran</label>
                <select class="form-control" name="metode_pembayaran">
                  <option value="">Pilih Metode Pembayaran</option>
                  <option value="tunai">Bayar Tunai Ditempat</option>
                  <option value="transfer">Transfer Bank</option>
                </select>
              </div>
              <div class="form-group">
                <label>Metode Pengiriman</label>
                <select class="form-control" name="metode_pengiriman">
                  <option value="">Pilih Metode Pengiriman</option>
                  <option value="ambil">Ambil Ditempat</option>
                  <option value="kirim">Kirim Kerumah</option>
                </select>
              </div>
            
          </div>
          <div class="modal-footer">
            {{-- <button  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-primary">Checkout</button>
          </div>
        </div>
      </div>
    </div>


  </form>
  @endif
  <!-- Bootstrap core JavaScript-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin-2.min.js"></script>
  <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/130527/qrcode.js"></script>
  <script>
  $('#qrcodepaydies').qrcode(
    {
      width: '300',
      height: '300',
      text: $("#usernamqrcode").html()
  });
  function searching(search){
    location.href  = "{{ url('search-data')}}/" + search
  }

  $("#form-search").submit(function(event){
    event.preventDefault()
    searching($("#search-data-input").val())
  })
  $("#form-search1").submit(function(event){
    event.preventDefault()
    searching($("#search-data-input1").val())
  })

  function getDataCart(){
    $.get("{{ url('get-cart') }}")
      .done(function(res){
          $("#cart-total-icon").html(res.length)
          var data = ``;
          var totalbayar = 0;
          for (let i = 0; i < res.length; i++) {
            totalbayar = totalbayar + res[i].harga
            data += ` <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <b class="float-left text-danger mr-4" onclick="deleteCart('${res[i].id}')">
                      <i class="fa fa-trash"></i>
                    </b>
                  <img src="/img/${res[i].img}" width="50px">
                
                </div>
                <div onclick="view('${res[i].slug}')" >
                  <div class="col-md-12 text-primary">${res[i].nama}
                  </div>
                  <span class="col-md-12 font-weight-bold">qty(${res[i].qty})</span>
                  <span class="col-md-12 font-weight-bold">Rp ${res[i].harga}</span>
                </div>
              </a>`
          }
          var datacheckout = ``;
          for (let i = 0; i < res.length; i++) {
            datacheckout += ` <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <img onclick="view('${res[i].slug}')" src="/img/${res[i].img}" width="50px">
                
                </div>
                <div  >
                  <div class="col-md-12 text-primary">${res[i].nama}
                  </div>
                  <span class="col-md-12 font-weight-bold">qty(${res[i].qty})</span>
                  <span class="col-md-12 font-weight-bold">Rp ${res[i].harga}</span>
                </div>
              </a>`
          }

          $("#cart-content").html(data);
          $("#data-checkout").html(datacheckout);
          $("#data-checkout-total").html('  Total Bayar : Rp . '+totalbayar);
          console.log(res)
      })
      .fail(function(err){
        console.log(err)
      })
  }

  function proAddToCart(p){
    
    var qty = $("#add-qty").val();
    if(!qty){ qty = 1}

    var catatan = $("#add-catatan").val();
    if(!catatan){ catatan = ""}
    // alert(p.id + qty + catatan)
    $.post("add-cart",
      {
        _token: "{{ csrf_token() }}",
        produk_id: p.id,
        qty: qty,
        catatan: catatan
      })
      .done(function(res){
          getDataCart()
          $("#addtocart-modal").modal("hide")
          $("#add-qty").val(1)
          $("#add-catatan").val("")
      })
      .fail(function(err){
        console.log(err)
      })
  }

  function addToCart(data){
    $("#addtocart-modal").modal("show")

    $("#img-cart").attr("src", "/img/"+data.img);
    $("#nama-cart").html(data.nama);
    $("#harga-cart").html(data.harga);
    $("#addTooo").click(function(){
      proAddToCart(data)
    })
  }

  function deleteCart(id){
    $.get("{{ url('delete-cart') }}/"+id)
      .done(function(res){
          getDataCart()
      });
  }
  getDataCart()
  </script>
  @stack('js-after')
</body>

</html>
