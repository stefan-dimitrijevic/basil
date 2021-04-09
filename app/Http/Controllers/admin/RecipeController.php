<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\BasicController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Direction;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class RecipeController extends BasicController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['recipes'] = Recipe::withLikes()->with(['category', 'likes', 'user'])->orderBy('created_at', 'desc')->get();
        return view('admin.recipes.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories'] = Category::all();
        return view('admin.recipes.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax())
            $validator = \Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'image' => 'image'
            ]);

        if ($validator->passes()) {
            try {
                $recipe = new Recipe();
                $recipe->name = $request->get('name');
                $recipe->description = $request->get('description');
                $ingredients = $request->get('ingredients');
                $quantity = $request->get('quantity');
                $directions = $request->get('directions');

                $image = $request->file('image');
                $recipe->category_id = $request->get('category');
                $recipe->user_id = session()->get('user')->id;

                $imageName = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('/assets/img');
                $image->move($destinationPath, $imageName);
                $recipe->image = $imageName;

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

                return response()->json('Sucessfully created', 201);
            } catch (\Exception $e) {
                return response()->json($e->getMessage(), 500);
            }
        }
        return response()->json(['errors' => $validator->errors()->all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
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
        return view('admin.recipes.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id, Request $request)
    {
        if ($request->ajax()) {
            $recipe = Recipe::find($id);
            $recipe->delete();
            return response()->json('Successfully deleted', 204);
        }
    }
}
