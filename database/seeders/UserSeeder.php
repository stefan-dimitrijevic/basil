<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@basil.com';
        $user->password = \Hash::make('admin123');
        $user->role_id = 1;
        $user->save();

        $user = new User();
        $user->name = 'Stefan';
        $user->email = 'stefan@gmail.com';
        $user->password = \Hash::make('pass1234');
        $user->role_id = 2;
        $user->save();

        $faker = Factory::create();
        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->name = $faker->firstName . ' ' . $faker->lastName;
            $user->email = $faker->unique()->safeEmail;
            $user->password = \Hash::make('pass1234');
            $user->role_id = 2;
            $user->save();
        }
    }
}
