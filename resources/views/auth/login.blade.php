@extends('layouts.auth')

@section('title')
    Foodies Login
@endsection

@section('content')
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-9">

        <div class="border-0 mt-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Hi Foodies!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('login') }}">
                      @csrf
                    <div class="form-group">
                        <input placeholder="Masukkan Email" id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input placeholder="Masukkan Password" id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" name="remember" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        {{ __('Login') }}
                    </button>
                    <hr>
                    <div class="row">
                      <div class="col-lg-12">
                        <a href="{{ url('/auth/google') }}" class="btn btn-google btn-user btn-block">
                          <i class="fab fa-google fa-fw"></i> Login with Google
                        </a>
                      </div>
                      <div class="col-lg-12">
                        <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook btn-user btn-block">
                          <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
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
                              <a class="small" href="register">Create an Account!</a>
                            </div>
                      </div>
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
