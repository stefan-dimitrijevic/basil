@extends('layouts.app')

@section('content')
    <div class="container my-5">
        @if(session()->has('user') && request()->segment(2) == session()->get('user')->id)
            <div class="row">
                <div class="col d-flex align-items-center py-3 justify-content-center"
                     style="border-bottom: 2px solid #b9e4c9 ;">
                    <a href="{{ route('profile.edit') }}" class="mx-5">
                        <button class="btn btn-primary button" type="submit">Edit Profile</button>
                    </a>
                    <a href="{{ route('recipes.create') }}" class="text-center mx-5">
                        <button class="btn btn-primary button" type="submit">Create Recipe</button>
                    </a>
                    @if(session('success'))
                        <p>{{ session('success') }}</p>
                    @endif
                </div>
            </div>
        @endif
        <div class="row min-content-height">
            <div class="col-md-9 mx-auto">

                <h1 class="display-3 text-center my-5" style="color: #fd5523;font-weight: 500;">{{ $user->name }}'s
                    recipes</h1>
                @if(count($recipes) > 0)
                    <div class="table-responsive my-5">
                        <table class="table" style="background-color: #b9e4c9; color: #356859;">
                            <thead>
                            <tr class="text-center" style="border: 3px solid #356859">
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                @if(session()->get('user') && $recipes->first()->user_id == session()->get('user')->id)
                                    <th>Actions</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($recipes as $recipe)
                                <tr class="text-center recipes-table-row" id="table-row-{{ $recipe->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{ route('recipes.show', $recipe->id) }}"><img class="table-image"
                                                                                                src="{{ asset('assets/img/' . $recipe->image) }}"
                                                                                                alt="{{ $recipe->name }}"></a>
                                    </td>
                                    <td><a class="recipe-name"
                                           href="{{ route('recipes.show', $recipe->id) }}">{{ $recipe->name }}</a></td>
                                    <td>{{ $recipe->category->name }}</td>
                                    @if(session()->get('user') && $recipes->first()->user_id == session()->get('user')->id)
                                        <td>
                                            <a href="{{ route('recipes.edit', $recipe->id) }}">
                                                <button type="button" rel="tooltip"
                                                        class="btn btn-success btn-sm btn-icon btn-update"
                                                        data-id="{{ $recipe->id }}">
                                                    <i class="far fa-edit"></i>
                                                </button>
                                            </a>
                                            <button type="button" rel="tooltip"
                                                    class="btn btn-danger btn-sm btn-icon btn-delete-recipe"
                                                    data-id="{{ $recipe->id }}">
                                                <i class="far fa-times-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    {{--                    <h1 class="text-center my-5" style="color: #fd5523;font-weight: 500;">There is no recipes for this--}}
                    {{--                        user</h1>--}}
                    <div class="table-responsive my-5">
                        <table class="table" style="background-color: #b9e4c9; color: #356859;">
                            <thead>
                            <tr class="text-center" style="border: 3px solid #356859">
                                <th>No recipes</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection


