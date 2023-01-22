@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/registro.css">
<div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center">Registrar</h5>
            <form class="form-signin" method="POST" action="{{ route('register') }}">
                @csrf
              <div class="form-floating mb-3">
                <input type="text" id="inputUserame" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Username" required autocomplete="name" autofocus>
                <label for="inputUserame">Nombre y Apellido</label>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-floating mb-3">
                <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email address" required autocomplete="email">
                <label for="inputEmail">Correo Electronico</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              
              <hr>

              <div class="form-floating mb-3">
                <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                <label for="inputPassword">Contraseña</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              
              <div class="form-floating mb-3">
                <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" name="password_confirmation" required autocomplete="new-password">
                <label for="inputConfirmPassword">Confirme contraseña</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registrar</button>

              <hr class="my-4">        
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
