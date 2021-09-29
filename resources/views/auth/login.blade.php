@extends('layouts.auth')

@section('container')

<div class="login-box" style="width:700px;">
  <h6 style="text-align:center;">Ministre de l'Education nationale</h6>
  <h5 style="text-align:center;">Académie de Ziguinchor</h5>
  <h5 style="text-align:center;padding-bottom: 20px;">I.E.F. Bignona 1</h5>
  <hr>
  <div class="login-logo">
    <a href="#" style="color: #b3b6b9;">
      <div><img class="rounded-full mt-6" width="15%" src="{{asset('images/kisarr-bit.png')}}" alt="logoIbou"></div>
      <div style="font-weight:bold;  font-size: 1.4em;">CEM MEDIEGUE</div>
    </a>
    <hr/>
  </div>
  <!-- /.login-logo -->
  <div class="card bg-dark">
    <div class="card-body bg-dark login-card-body">

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
          <input type="text" placeholder="Email ou Téléphone" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus >

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



    </div>
    <!-- /.login-card-body -->
  </div>
</div>





@endsection
