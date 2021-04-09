@extends('layouts.admin')

@section('content')
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">Edit Recipe</h2>
        </div>
    </div>
    <div class="content">
        <div class="row admin-content">
            <div class="col-sm-7 col-md-5 col-lg-7 col-xl-5 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form id="recipe-form">
                            <div class="form-group" id="name-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$recipe->name}}">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                @if($recipe->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" id="image-group">
                                <label for="image">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image"
                                           value="{{ $recipe->image }}">
                                    <label class="custom-file-label" for="image">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>
                            </div>
                            <div class="form-group" id="description-group">
                                <label for="description">Description</label>
                                <textarea class="form-control"
                                          onclick='this.style.height = "";this.style.height = this.scrollHeight + "px"'
                                          id="description" rows="1"
                                          name="description">{{ $recipe->description }}</textarea>
                            </div>
                            <div class="form-group" id="ingredients-group">
                                <label for="ingredients">Ingredients</label>
                                <table class="table table-borderless back-color">
                                    <thead>
                                    <tr>
                                        <th><label for="">Ingredient</label></th>
                                        <th><label for="">Quantity</label></th>
                                    </tr>
                                    </thead>
                                    <tbody id="content">
                                    @for($i = 0; $i < count($ingredients); $i++)
                                        <tr id="ingredient-row-{{ $i }}">
                                            <td>
                                                <div class="form-group mb-0">
                                                    <input type="text" class="form-control input-ingredient"
                                                           data-id="{{ $i }}"
                                                           id="ingredient-{{ $i }}" value="{{ $ingredients[$i] }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-0">
                                                    <input type="text" class="form-control input-quantity"
                                                           data-id="{{ $i }}"
                                                           id="quantity-{{ $i }}" value="{{ $quantity[$i] }}">
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button type="button" rel="tooltip"
                                                        class="btn btn-danger btn-sm btn-icon btn-remove-ingredient"
                                                        id="remove-{{ $i }}" data-id="{{ $i }}" style="display: inline">
                                                    <i class="now-ui-icons ui-1_simple-remove"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endfor
                                    <tr>
                                        <td colspan="3">
                                            <button type="button" class="btn btn-success" id="add-ingredient">Add
                                                Ingredient
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group" id="directions-group">
                                <label for="directions">Directions</label>
                                <table class="table table-borderless back-color">
                                    <thead>
                                    </thead>
                                    <tbody id="content-directions">
                                    @foreach($directions as $direction)
                                        <tr id="direction-row-{{ $loop->index }}">
                                            <td>
                                                <div class="form-group mb-0">
                                                    <label for="">Step {{ $loop->iteration }}: </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-0">
                                                <textarea class="form-control input-direction"
                                                          data-id="{{ $loop->index }}" id="direction-{{ $loop->index }}"
                                                          rows="10">{{ $direction }}
                                                </textarea>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button type="button" rel="tooltip"
                                                        class="btn btn-danger btn-sm btn-icon btn-remove-direction"
                                                        id="remove-direction-{{ $loop->index }}"
                                                        data-id="{{ $loop->index }}" style="display: inline">
                                                    <i class="now-ui-icons ui-1_simple-remove"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3">
                                            <button type="button" class="btn btn-success" id="add-direction">Add Step
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <input type="hidden" id="id" value="{{ $recipe->id }}">
                            <input type="hidden" id="ingredients" value="{{ json_encode($ingredients) }}">
                            <input type="hidden" id="quantity" value="{{ json_encode($quantity) }}">
                            <input type="hidden" id="directions" value="{{ json_encode($directions) }}">
                            <button type="button" class="btn btn-primary" id="update-recipe" name="update-recipe">Update
                                Recipe
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card error-card">
                    <div class="card-body">
                        <div class="errors">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

