<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role'     => 'admin',
        ]);

        User::create([
            'name'     => 'Manager',
            'email'    => 'manager@gmail.com',
            'password' => Hash::make('123456'),
            'role'     => 'manager',
        ]);

        User::create([
            'name'     => 'Chef',
            'email'    => 'chef@gmail.com',
            'password' => Hash::make('123456'),
            'role'     => 'chef',
        ]);
    }
}