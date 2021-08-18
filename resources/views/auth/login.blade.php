@extends('layouts.app')
@section('content')
<style>
    .container{
        max-width: 500px;
        background: white;
        margin-top: 8rem;
        padding: 10px;
        border-radius: 10px;
    }
  .btn-link {
        color: black;
        transition: .5s;
       text-decoration: none;
    }
    .btn-link:hover{
        color: red;
    }
</style>
<div class="container" >
       
    <div class="row">
          <div class="col-lg-12">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control 
                                 
                        @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                            placeholder="E-mail" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    
                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control 
                        @error('password') is-invalid @enderror" name="password"
                        placeholder="Password" 
                         required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 ">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row ">
                    <div class="col-md-8 ">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" style="text-decoration: none"href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
          </div>

    </div>
     
   
</div>
@endsection
