@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/Leaders.css') }}">
@endsection

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col d-flex align-items-center py-3" style="border-bottom: 2px solid #b9e4c9 ;"><a
                    href="{{ route('recipes.index') }}"><i class="fas fa-arrow-left"
                                                           style="color: #356859;font-size: 24px;"></i></a>
                <h2 class="my-auto px-3" style="color: #356859;font-weight: 600;">BASiL</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 mx-auto">
                <h1 class="display-3 text-center" style="color: #fd5523;font-weight: 500;">{{ $recipe->name }}</h1>
                <h4 class="text-center" style="color: #fd5523;font-weight: 500;"> by <a class="recipe-user"
                                                                                        style="color: #fd5523;font-weight: 500;"
                                                                                        href="{{ route('profile.show', $recipe->user->id) }}">{{ $recipe->user->name }}</a>
                </h4>
                <div
                    style="background: url({{ asset('assets/img/' . $recipe->image) }}) no-repeat;background-size: cover;opacity: 1;">
                    <div class="d-flex justify-content-center align-items-end align-items-md-end div-opis"
                         style="background: rgba(185,228,201,0.72);">
                        <p class="lead text-center align-items-md-end w-75"
                           style="font-family: Lekton, sans-serif;font-weight: 700;color: #356859;border-top: 1px solid rgba(53,104,89,0.85);">
                            <br>{{ $recipe->description }}<br><br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <ul class="nav flex-row justify-content-center align-items-center justify-content-sm-center justify-content-md-center navigation-recipes">
                    <li class="nav-item mx-2"><a class="nav-link active active-recipes" href="#" id="ingredients">Ingredients</a>
                    </li>
                    <li class="nav-item mx-2"><a class="nav-link" href="#" id="directions">Directions</a></li>
                </ul>
            </div>
        </div>
        <div class="row mt-5 ingredients">
            <div
                class="col-sm-10 col-md-8 col-lg-6 d-flex d-xl-flex flex-row justify-content-start m-auto justify-content-xl-center">
                <ul class="list-unstyled leaders" style="width: 100%;">
                    @foreach($recipe->ingredients as $ingredient)
                        <li class="align-items-start"><span class="px-1" style="font-weight: 700;"><i
                                    class="icon-plus mr-2 ikonica"
                                    style="color: #356859;font-weight: 700;"></i>{{ $ingredient->name }}</span><span
                                class="px-1">{{ $ingredient->pivot->quantity }}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row mt-5 steps" style="display: none">
            @foreach($recipe->directions as $direction)
                <div class="col-sm-10 col-md-8 col-lg-6 d-flex d-xl-flex flex-column align-items-center m-auto"
                     style="font-family: Lekton, sans-serif;"><span
                        class="border rounded-circle d-flex d-xl-flex justify-content-center align-items-center korak mb-3"
                        style="font-size: 16px;">{{ strlen($loop->iteration) == 1 ? '0' . $loop->iteration : $loop->iteration }}</span>
                    <p class="text-justify" style="color: #356859;">{{ $direction->step }}</p>
                </div>
            @endforeach
        </div>
        @if(session()->has('user'))
            <div class="row likes">
                <div class="col pt-5" style="text-align: center; border-top: 2px solid #b9e4c9 ;"><span
                        class="like">&nbsp;<a
                            class="{{ $recipe->isLikedBy(session()->get('user')) ? 'liked' : 'like' }}" href="#"
                            id="like" data-id="{{ $recipe->id }}"><i class="fa fa-thumbs-up"
                                                                     style="font-size: 24p;"></i></a>{{ $recipe->likes ?: 0  }}</span><span
                        class="like">&nbsp;<a
                            class="{{ $recipe->isDislikedBy(session()->get('user')) ? 'liked' : 'like' }}" href="#"
                            id="dislike" data-id="{{ $recipe->id }}"><i class="fa fa-thumbs-down"
                                                                        style="font-size: 24p;"></i></a>{{ $recipe->dislikes ?: 0 }}</span>
                </div>
            </div>
        @endif
    </div>
@endsection


