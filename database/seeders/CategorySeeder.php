<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $categories = ['Appetizers', 'Desserts', 'Cocktails'];
    public function run()
    {
        foreach ($this->categories as $c) {
            $category = new Category();
            $category->name = $c;
            $category->save();
        }
    }
}
