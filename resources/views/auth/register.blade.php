@extends('layouts.auth')

@section('title')
    Foodies Register
@endsection

@section('content')
<style>

</style>
<div class="container">

    <div class="px-lg-5 mx-lg-5 o-hidden border-0  my-lg-5">
      <div class=" p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Hi Foodies!</h1>
              </div>
              <form class="user" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                      <input placeholder="Nama Lengkap" id="name" type="text" class="form-control  form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="col-sm-6">
                    <input placeholder="Username" id="username" type="text" class="form-control  form-control-user @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                  </div>
                </div>
                <div class="form-group">
                    <input placeholder="Alamat Email" id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror  
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                      <input placeholder="Password" id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror  
                  </div>
                  <div class="col-sm-6">
                      <input placeholder="Ulangi Password" id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                      <input value="2" type="radio" class="input-user @error('role') is-invalid @enderror" name="role" required autocomplete="role">
                      Pembeli
                      @error('role')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror  
                  </div>
                  <div class="col-sm-6">
                      <input value="3" type="radio" class="input-user" name="role" required autocomplete="role">
                    Penjual
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Daftar') }}
                </button>
                <hr>
                <div class="row">
                  <div class="col-lg-6">
                      <a href="{{ url('/auth/google') }}" class="btn btn-google btn-user btn-block">
                          <i class="fab fa-google fa-fw"></i> Register with Google
                        </a>
                  </div>
                  <div class="col-lg-6">
                      <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook btn-user btn-block">
                          <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                        </a>
                  </div>
                </div>
              
              
              </form>
              <hr>
              <div class="row">
                  <div class="col-lg-6">
                      <div class="text-center">
                          @if (Route::has('password.request'))
                            <a class="small"  href="{{ route('password.request') }}">Forgot Password?</a>
                          @endif
                        </div>
                       
                  </div>
                  <div class="col-lg-6">
                      <div class="text-center">
                          <a class="small" href="login">Already have an account? Login!</a>
                        </div>
                  </div>
                </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection