<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RecipeController extends BasicController
{
    public function index()
    {
        $this->data['categories'] = Category::all();
        $this->data['recipes'] = Recipe::orderBy('created_at', 'desc')->paginate(3);
        return view('recipes.index', $this->data);
    }

    public function create()
    {
        $this->data['categories'] = Category::all();
        return view('recipes.create', $this->data);
    }

    public function store(Request $request)
    {
        if ($request->ajax())
            $validator = \Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'ingredients' => 'required|string',
                'directions' => 'required|string',
                'image' => 'image'
            ]);

        if ($validator->passes()) {
            try {
                $recipe = new Recipe();
                $recipe->name = $request->get('name');
                $recipe->description = $request->get('description');
                $recipe->ingredients = $request->get('ingredients');
                $recipe->directions = $request->get('directions');
                $image = $request->file('image');
                $recipe->category_id = $request->get('category');
                $recipe->user_id = session()->get('user')->id;

                $imageName = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('/assets/img');
                $image->move($destinationPath, $imageName);
                $recipe->image = $imageName;
                $recipe->save();
                return response()->json('Sucessfully created', 201);
            } catch (\Exception $e) {
                return response()->json($e->getMessage(), 500);
            }
        }
        return response()->json(['errors' => $validator->errors()->all()]);
    }

    public function show($id)
    {
        $this->data['recipe'] = Recipe::withLikes()->find($id);

        return view('recipes.show', $this->data);
    }

    public function edit($id)
    {
        $this->data['categories'] = Category::all();
        $recipe = Recipe::with(['ingredients', 'directions'])->find($id);

        $ingredients = [];
        foreach ($recipe->ingredients as $ingredient) {
            array_push($ingredients, $ingredient->name);
        }
        $this->data['ingredients'] = $ingredients;

        $quantity = [];
        foreach ($recipe->ingredients as $ingredient) {
            array_push($quantity, $ingredient->pivot->quantity);
        }
        $this->data['quantity'] = $quantity;

        $directions = [];
        foreach ($recipe->directions as $direction) {
            array_push($directions, $direction->step);
        }
        $this->data['directions'] = $directions;

        $this->data['recipe'] = $recipe;
        return view('recipes.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            try {
                $recipe = Recipe::find($id);
                $recipe->ingredients()->detach();
                $recipe->directions()->delete();

                if ($request->file('image') !== null) {
                    $validator = \Validator::make($request->all(), [
                        'image' => 'image'
                    ]);
                    if ($validator->passes()) {
                        $image = $request->file('image');
                        $imageName = time() . '_' . $image->getClientOriginalName();
                        $destinationPath = public_path('/assets/img');
                        $image->move($destinationPath, $imageName);
                        $recipe->image = $imageName;
                    } else {
                        $errors = [];
                        array_push($errors, $validator->errors()->all());
                        return response()->json($errors, 422);
                    }
                }
                $recipe->name = $request->get('name');
                $recipe->description = $request->get('description');
                $ingredients = $request->get('ingredients');
                $quantity = $request->get('quantity');
                $directions = $request->get('directions');

                $recipe->category_id = $request->get('category');

                $recipe->save();

                for ($i = 0; $i < count($ingredients); $i++) {
                    $ingredient =Ingredient::firstOrNew(['name' => $ingredients[$i]]);
                    $ingredient->name = trim($ingredients[$i]);
                    $ingredient->save();
                    $recipe->ingredients()->attach($ingredient, ['quantity' => trim($quantity[$i])]);
                }

                for ($i = 0; $i < count($directions); $i++) {
                    $direction =new Direction();
                    $direction->step = $directions[$i];
                    $direction->recipe_id = $recipe->id;
                    $direction->save();
                }
                $recipe->save();
                return response()->json('Sucessfully updated', 204);
            } catch (\Exception $e) {
                return response()->json($e->getMessage(), 500);
            }
        }
    }

    public function destroy($id, Request $request)
    {
        if ($request->ajax()) {
            $recipe = Recipe::find($id);
            $recipe->delete();
            return response()->json('Successfully deleted', 204);
        }
    }

    public function filter(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $search = $request->get('search');
            $recipes = new Recipe();
            if ($id != '') {
                $recipes = $recipes->where('category_id', $id);
            }
            if ($search != '') {
                $recipes = $recipes->where('name', 'like', '%' . $search . '%');
            }

            $recipes = $recipes->orderBy('created_at', 'desc')->paginate(3);

            $this->data['recipes'] = $recipes;

            if (count($recipes) == 0){
                return false;
            } else {
                return view('recipes.includes.recipes', $this->data)->render();
            }
        }
    }
}
