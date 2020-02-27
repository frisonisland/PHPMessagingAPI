<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Let's clear the users table first
      DB::table('users')->delete();

      $faker = \Faker\Factory::create();

      //everyone has the same password
      $password = Hash::make('mysecretpassword');

      User::create([
          'name' => 'Administrator',
          'email' => 'admin@test.com',
          'password' => $password,
      ]);

      // Four users
      for ($i = 0; $i < 5; $i++) {
          User::create([
              'name' => $faker->name,
              'email' => $faker->email,
              'password' => $password,
              'api_token' => hash('sha256', Str::random(60))
          ]);
      }
    }
}
