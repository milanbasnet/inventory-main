<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factoryUsers = [
            [
              'name' => 'Admin',
              'email' => 'admin@admin.com',
              'password' => Hash::make('asdasdasd'), 
              'role' => 'admin'
            ],
            [
              'name' => 'User',
              'email' => 'user@user.com',
              'password' => Hash::make('asdasdasd'),
              'role' => 'staff'
            ],
          ];
      
          foreach ($factoryUsers as $user) {
            $newUser =  User::create([
              'name' => $user['name'],
              'email' => $user['email'],
              'password' => $user['password'],
            ]);
            $newUser->assignRole($user['role']);
          }
    }
}
