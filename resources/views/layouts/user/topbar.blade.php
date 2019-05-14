<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar fixed-top shadow">
    <!-- Sidebar - Brand -->
    <a class="d-flex align-items-center justify-content-center text-primary" href="/">
      <div class="mx-3">
        <img src="/img/logo.png" width="100px">
      </div>
    </a>

    <!-- Topbar Search -->
    <form id="form-search" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
      @csrf
      <div class="input-group">
        <input id="search-data-input" name="search" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit">
            <i class="fas fa-search fa-sm"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
       <!-- Nav Item - Search Dropdown (Visible Only XS) -->
       <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form id="form-search1" class="form-inline mr-auto w-100 navbar-search">
              @csrf
              <div class="input-group">
                <input id="search-data-input1" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
      @if(Auth::user())
      
        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-shopping-cart fa-fw"></i>
              <!-- Counter - Alerts -->
              <span class="badge badge-danger badge-counter" id="cart-total-icon"></span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">
                Cart
              </h6>
             <div id="cart-content">
               
             </div>
             <a data-target="#checkout-modal" data-toggle="modal" href="#" class="btn btn-primary btn-block btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa fa-shopping-cart"></i>
                </span>
                <span class="text">Checkout</span>
            </a>
            </div>
          </li>
      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ '@'.Auth::user()->name }}</span>
          <img class="img-profile rounded-circle" src="{{ Auth::user()->avatar ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCAaNR8ezyQXK7BjFYLNxLt4jum9Fy-zctQ-UINx5OZlKvJi7g' }}">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="/{{ '@'.Auth::user()->username}}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          <a class="dropdown-item" href="#" data-target="#paydies" data-toggle="modal">
            <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
            Paydies
          </a>
          <a class="dropdown-item" href="/warung">
            <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
            Warung Saya
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        </div>
      </li>

      <div id="usernamqrcode" style="display:none">{{ url('@'.Auth::user()->username) }}</div>
      @else 
      <li class="nav-item dropdown no-arrow">
          <a href="/login" class="text-white btn-sm btn btn-primary btn-icon-split float-right">
              <span class="icon text-white-50">
                  <i class="fa fa-play"></i>
              </span>
              <span class="text">Login</span>
          </a>
      </li>
      @endif

    </ul>

  </nav>
  <!-- End of Topbar -->