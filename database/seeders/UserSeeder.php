<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{

    public function run()
    {
        User::factory()->create([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com', 
            'password' => bcrypt('thisisadmin'),
            'status' => 0, // admin  
        ]);
        User::factory()->create([
            'name' => 'Guest', 
            'email' => 'guest@@gmail.com', 
            'password' => bcrypt('saboor123'), 
            'status' => 1, // normal user
        ]);
    }
}
