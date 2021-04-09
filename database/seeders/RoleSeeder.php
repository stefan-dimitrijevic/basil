<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $roles = ['Administrator', 'Authorized'];

    public function run()
    {
        foreach ($this->roles as $r) {
            $role = new Role();
            $role->role = $r;
            $role->save();
        }
    }
}
