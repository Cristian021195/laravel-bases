<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Cristian Ismael";
        $user->email = "cristiangramajo015@gmail.com";
        $user->avatar = "default.png";
        $user->password = bcrypt('contra1234');
        $user->save();

        User::factory(10)->create();
    }
}
