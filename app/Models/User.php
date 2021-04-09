<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
