<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $names = ['Recipes', 'Contact', 'About', 'Recipes', 'Users', 'User Activities'];
    private $uris = ['recipes.index', 'contact', 'about-me', 'admin.recipes.index', 'admin.users.index', 'logs'];
    private $icons = ['', '', '', 'files_paper', 'users_single-02', 'ui-1_bell-53'];
    private $roles = [2, 2, 2, 1, 1, 1];
    public function run()
    {
        for ($i = 0; $i < count($this->names); $i++) {
            $menu = new Menu();
            $menu->name = $this->names[$i];
            $menu->uri = $this->uris[$i];
            $menu->icon = $this->icons[$i];
            $menu->role_id = $this->roles[$i];
            $menu->save();
        }
    }
}
