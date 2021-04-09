<?php

namespace App\Http\Middleware;

use App\Models\Recipe;
use Closure;
use Illuminate\Http\Request;

class RedirectIfNotHisRecipe
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = (int)$request->segment(2);
        $recipe = Recipe::find($id);
        if (!$recipe) {
            return redirect()->route('not-found');
        }
        $userId = $recipe->user_id;
        if (!session()->get('user') || session()->get('user')->id != $userId) {
            return redirect()->route('not-found');
        }
        return $next($request);
    }
}
