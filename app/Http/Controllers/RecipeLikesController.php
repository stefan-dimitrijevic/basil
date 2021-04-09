<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeLikesController extends Controller
{
    public function store(Request $request, Recipe $recipe)
    {
        if ($request->ajax()) {
            $recipe->like(session()->get('user'));

            $recipe = Recipe::withLikes()->find($recipe->id);
            \Log::channel('user_activities')->info('User ' . session()->get('user')->name . ' (' . session()->get('user')->email . ') liked ' . $recipe->name . ' recipe.');
            return response()->json($recipe);
        }
    }

    public function destroy(Request $request, Recipe $recipe)
    {
        if ($request->ajax()) {
            $recipe->dislike(session()->get('user'));
            $recipe = Recipe::withLikes()->find($recipe->id);
            \Log::channel('user_activities')->info('User ' . session()->get('user')->name . ' (' . session()->get('user')->email . ') disliked ' . $recipe->name . ' recipe.');

            return response()->json($recipe);
        }
    }
}
