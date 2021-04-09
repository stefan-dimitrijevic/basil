@extends('layouts.app')

@section('content')
    <div class="container my-5 min-content-height" style="color: #f16a08;">
        @if(session()->has('message'))
            <p class="text-center">{{ session()->get('message') }}</p>
        @endif
        @if(session()->has('success'))
            <p class="text-center success-message">{{ session()->get('success') }}</p>
        @endif
        <h1 class="display-1 text-center my-5" style="color: #356859;font-weight: 500;">BASiL</h1>
        <ul class="nav flex-column justify-content-center align-items-center justify-content-sm-center flex-md-row justify-content-md-center navigation-recipes">
            <li class="nav-item"><a class="nav-link category active active-recipes" data-id="0" href="#">All</a></li>
            @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link category" href="#" data-id="{{ $category->id }}">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
        <div class="row d-flex justify-content-center justify-content-sm-center">
            <div class="col-10 col-md-8 col-lg-6 col-xl-5">
                <form class="my-4">
                    <div class="form-group d-flex align-items-center">
                        <div class="input-group">
                            <input class="form-control form-control-sm search" type="search" name="search" id="search">
                            <div class="input-group-append"></div>
                        </div>
                        <i class="fas fa-search search-icon" style="font-size: 20px;color: #356859;"></i>
                    </div>
                </form>
            </div>
        </div>
        <div id="data">
            @include('recipes.includes.recipes')
        </div>
        <input type="hidden" id="hidden-page" value="1">
        <input type="hidden" id="hidden-category" value="">
    </div>
@endsection
