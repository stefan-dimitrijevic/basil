@extends('layouts.admin')

@section('content')
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">Recipes</h2>
        </div>
    </div>
    <div class="content">
        <div class="row admin-content">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.recipes.create') }}">
                            <button type="button" class="btn btn-primary">Create Recipe</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Likes / Dislikes</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($recipes as $recipe)
                                    <tr class="text-center" id="table-row-{{ $recipe->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img class="table-image" src="{{ asset('assets/img/' . $recipe->image) }}"
                                                 alt="{{ $recipe->name }}"></td>
                                        <td>{{ $recipe->name }}</td>
                                        <td>{{ $recipe->description }}</td>
                                        <td>{{ $recipe->user->name }}</td>
                                        <td>{{ $recipe->category->name }}</td>
                                        <td>{{ $recipe->created_at }}</td>
                                        <td>{{ $recipe->updated_at }}</td>
                                        <td>{{ $recipe->likes }} / {{ $recipe->dislikes }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('admin.recipes.edit', $recipe->id) }}">
                                                <button type="button" rel="tooltip"
                                                        class="btn btn-success btn-sm btn-icon btn-update"
                                                        data-id="{{ $recipe->id }}">
                                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                                </button>
                                            </a>
                                            <button type="button" rel="tooltip"
                                                    class="btn btn-danger btn-sm btn-icon btn-delete-recipe"
                                                    data-id="{{ $recipe->id }}">
                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
