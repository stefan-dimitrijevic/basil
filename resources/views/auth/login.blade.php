@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/Login-Form-Clean.css') }}">
@endsection

@section('content')
    @if(session('error'))
        <div class="text-center error-message">
            <p>{{ session('error') }}</p>
        </div>
    @endif
    <div class="login-clean">
        <form method="post" action="{{ route('login') }}" style="background: #b9e4c9;">
            @csrf
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-navigate" style="color: #356859;"></i></div>
            <div class="form-group">
                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"
                       placeholder="Email" value="{{ old('email') }}">
                @error('email')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                @if(session('error_credentials'))
                    <small class="form-text text-danger">{{ session('error_credentials') }}</small>
                @endif
            </div>
            <div class="form-group">
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                       placeholder="Password">
                @error('password')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" style="background: #fd5523;">Log In</button>
            </div>
        </form>
    </div>
@endsection
