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
<div class="container">
<form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group row">
          

            <div class="col-md-12">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="First name">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
         
            <div class="col-md-12">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Valid E-mail">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">

            <div class="col-md-12">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">

            <div class="col-md-12">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            </div>
        </div>

        <div class="form-group row ">
            <div class="col-md-6 ">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
