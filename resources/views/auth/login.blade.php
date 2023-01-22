@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/login.css">
<div class="container-fluid ps-md-0">
    <div class="row g-0">
      <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
      <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto">
                <h3 class="login-heading mb-4">Bienvenido</h3>
  
                <!-- Sign In Form -->
                <form method="POST" {{ route('login') }}>
                    @csrf
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" placeholder="name@example.com">
                    <label for="floatingInput">Ingrese Email</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword" autocomplete="current-password" placeholder="Password">
                    <label for="floatingPassword">Contraseña</label>
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
  
 
                  <div class="d-grid">
                    <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Ingresar</button>
                    <div class="text-center">
                        @if (Route::has('password.request'))

                      
                    </div>@endif
                  </div>
                  <div class="d-grid">
                    <a href="/register" class="btn btn-primary btn-lg float-md-righr" role="button" aria-pressed="true">Registrarse</a>
                    <div class="text-center">
                    </div>
                  </div>
  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection