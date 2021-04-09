@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/Registration-Form-with-Photo.css') }}">
@endsection
@section('content')
    <div class="container my-5" style="color: #f16a08;">
        <h1 class="display-2 text-center my-5" style="color: #356859;font-weight: 500;">Oh no!</h1>
        <div class="row d-flex justify-content-center justify-content-sm-center">
            <div class="col-12 col-md-10 col-lg-8 text-center d-table">
                <p class="lead text-center" style="color: #356859;">We can&#39;t seem to find the page you&#39;re
                    looking for. Please try retyping the address or just head back to our homepage.</p>
                <a href="{{ route('recipes.index') }}" class="btn btn-primary btn-404" type="submit"
                   style="background: #fd5523;">Go back</a>
            </div>
            <div class="col-12 col-md-10 col-lg-8 text-center d-table">
                <img class="img-fluid" src="{{ asset('assets/img/banana.png') }}"/>
            </div>
        </div>
    </div>
@endsection
