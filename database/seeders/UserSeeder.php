<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create a fixed admin user
        User::factory()->create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('123456'),
            'role_id'=>1,
        ]);

        // Create 5 random members
        User::factory(5)->create([
            'role_id' => 3, // assuming 3 = Member
        ]);
    }
}
