<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Users\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
  public function run()
  {
    User::create([
      'name' => env('ADMIN_USER_NAME'),
      'email' => env('ADMIN_USER_EMAIL'),
      'password' => Hash::make(env('ADMIN_USER_PASSWORD')),
    ]);

    User::create([
      'name' => env('TEST_USER_NAME'),
      'email' => env('TEST_USER_NAME'),
      'password' => Hash::make(env('TEST_USER_NAME')),
    ]);
  }
}