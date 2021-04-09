@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/Contact-Form-Clean.css') }}">
@endsection

@section('content')
    <section class="contact-clean">
        <form method="post" action="{{ route('contact.store') }}">
            @csrf
            <h2 class="text-center">Contact us</h2>
            <div class="form-group">
                <input class="form-control @error('subject') is-invalid @enderror" type="text" name="subject"
                       placeholder="Subject">
                @error('subject')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"
                       placeholder="Email">
                @error('email')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <textarea class="form-control @error('message') is-invalid @enderror" name="message"
                          placeholder="Message" rows="14"></textarea>
                @error('message')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group d-flex justify-content-center">
                <button class="btn btn-primary" type="submit">Send</button>
            </div>
        </form>
        @if(session('success'))
            <div class="text-center success-message">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @if(session('error'))
            <div class="text-center error-message">
                <p>{{ session('error') }}</p>
            </div>
        @endif
    </section>
@endsection
