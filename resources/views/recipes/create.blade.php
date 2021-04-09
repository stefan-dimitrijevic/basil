@extends('layouts.app')

@section('content')
    <div class="recipe-photo">
        <div class="form-container create-edit-container">
            <form id="recipe-form" style="background: #b9e4c9; width: 100%">
                <h2 class="text-center"><strong>Create</strong> recipe.</h2>
                <div class="form-group" id="name-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" id="image-group">
                    <label for="image" style="display: block">Image</label>
                        <input type="file" id="image" name="image">
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
                <div class="form-group" id="description-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="1" name="description"></textarea>
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
                        <tr id="ingredient-row-0">
                            <td>
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control input-ingredient" data-id="0" id="ingredient-0">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control input-quantity" data-id="0" id="quantity-0">
                                </div>
                            </td>
                            <td class="text-right">
                                <button type="button" rel="tooltip"
                                        class="btn btn-danger btn-sm btn-icon btn-remove-ingredient"
                                        id="remove-0" data-id="0">
                                    <i class="fa fa-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <tr><td colspan="3"> <button type="button" class="btn btn-success" id="add-ingredient">Add Ingredient
                                </button></td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-group" id="directions-group">
                    <label for="directions">Directions</label>
                    <table class="table table-borderless back-color">
                        <thead>
                        </thead>
                        <tbody id="content-directions">
                        <tr id="direction-row-0">
                            <td>
                                <div class="form-group mb-0">
                                    <label for="">Step 1: </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-0">
                                    <textarea class="form-control input-direction" data-id="0" id="direction-0" rows="10"></textarea>
                                </div>
                            </td>
                            <td class="text-right">
                                <button type="button" rel="tooltip"
                                        class="btn btn-danger btn-sm btn-icon btn-remove-direction"
                                        id="remove-direction-0" data-id="0">
                                    <i class="fa fa-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <tr><td colspan="3"><button type="button" class="btn btn-success" id="add-direction">Add Step
                                </button></td></tr>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-primary" id="add-recipe" name="add-recipe">Add Recipe</button>
                <div class="card error-card">
                    <div class="card-body">
                        <div class="errors">
                        </div>
                    </div>
                </div>
                <input type="hidden" id="id" value="{{ session()->get('user')->id }}">
            </form>
        </div>
    </div>
@endsection
