<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'superAdmin', 
            'email' => 'superAdmin@gmail.com',
            'password' => Hash::make('root1234')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'admin', 
            'email' => 'admin@gmail.com',
            'password' => Hash::make('root1234')
        ]);
        $admin->assignRole('Admin');

        // Creating Product Manager User
        $productManager = User::create([
            'name' => 'user', 
            'email' => 'user@gmail.com',
            'password' => Hash::make('root1234')
        ]);
        $productManager->assignRole('Accreditation Manager');
    }
}