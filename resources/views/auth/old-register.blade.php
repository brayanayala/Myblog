@extends('layouts.app')

@section('content')
<link rel="stylesheet" href=".css/registro.css">
<div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center">Register</h5>
            <form method="POST" action="{{ route('register') }}>
                @csrf

                
                <div class="form-floating mb-3">
                  <div class="form-floating mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="floatingInputUsername" value="{{ old('name') }}" autocomplete="name" placeholder="myusername" required autofocus>
                <label for="floatingInputUsername">Nombre de Usuario</label>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>

              <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="floatingInputEmail" autocomplete="email" placeholder="name@example.com">
                <label for="floatingInputEmail">Correo Electrónico</label>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>

              <hr>

              <div class="form-floating mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword" autocomplete="new-password" placeholder="Password">
                <label for="floatingPassword">Contraseña</label>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password_confirmation" id="floatingPasswordConfirm" placeholder="Confirm Password" autocomplete="new-password">
                <label for="floatingPasswordConfirm">Confirm Password</label>
              </div>
                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Register</button>
                <a class="d-block text-center mt-2 small" href="#">Have an account? Sign In</a>
                <hr class="my-4">          
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection