@extends('layouts.app')

@section('content')
    @if(session('error'))
        <div class="text-center error-message">
            <p>{{ session('error') }}</p>
        </div>
    @endif
    <div class="register-photo">
        <div class="form-container">
            <div class="d-none d-md-table-cell image-holder"></div>
            <form method="post" action="{{ route('register') }}" style="background: #b9e4c9;">
                @csrf
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <div class="form-group">
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                           placeholder="Name" autofocus value="{{ old('name') }}">
                    @error('name')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('email') is-invalid @enderror " type="text" name="email"
                           placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                           placeholder="Password">
                    @error('password')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password_confirmation"
                           placeholder="Password (repeat)"></div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" style="background: #fd5523;">
                        Sign Up
                    </button>
                </div>
                <a class="already" href="{{ route('login.showLoginForm') }}">You already have an account? Login here.</a>
            </form>
        </div>
    </div>
@endsection
