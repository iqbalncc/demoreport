@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="login-logo">
      {{-- <a href="#"><b>Kaplan</b>Reporting</a> <br> --}}
      {{-- <img src="{{asset('lte/dist/img/logo.png')}}" alt="Kaplan Logo" class=""> --}}
      
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <center>
        <img src="{{asset('lte/dist/img/logo.png')}}" alt="Kaplan Logo" class="img-responsive mb-2" width="50%">
        </center>

        <p class="login-box-msg mb-3">Sign in to start your session</p>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
          <div class="input-group mb-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="row">
            <div class="col-12">
              <div class="icheck-primary">
                {{-- <input type="checkbox" id="remember"> --}}
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <br>
            <br>
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block" style="background-color: #434689 !important;border-color: #e9ecef;">Sign In</button>
            <a href="{{url('password/reset')}}" style="color:#818181">Forgot password</a>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        <!-- /.social-auth-links -->
  
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  @endsection
