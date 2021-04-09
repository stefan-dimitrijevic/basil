<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)->withPivot(['quantity']);
    }

    public function directions()
    {
        return $this->hasMany(Direction::class);
    }

//    ----- LIKE/DISLIKE -----
    public function scopeWithLikes($query)
    {
        $query->leftJoinSub(
            'SELECT recipe_id, SUM(liked) likes, SUM(!liked) dislikes FROM likes GROUP BY recipe_id',
            'likes',
            'likes.recipe_id',
            'recipes.id'
        );
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : session()->get('user')->id
        ], [
            'liked' => $liked
        ]);

        session()->put('user', User::find(session()->get('user')->id));
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user->likes->where('recipe_id', $this->id)->where('liked', true)->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes->where('recipe_id', $this->id)->where('liked', false)->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
