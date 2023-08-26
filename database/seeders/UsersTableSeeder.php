<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::create([
            'name' => 'Nahum',
            'email' => 'thenahum1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'cedula' => '12345',
            'address' => 'Bolivia',
            'phone' => '74125896',
            'role' => 'admin',


        ]);
        
        
        User::factory()
        ->count(20)
        ->create();
    }
}
