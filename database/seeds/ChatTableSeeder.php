<?php

use Illuminate\Database\Seeder;
use App\Chat;
class ChatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the users table first
      Chat::truncate();

      $faker = \Faker\Factory::create();

      // Every user has each other in address book
      // Remember, user 0 is admin
      for ($i = 0; $i < 3; $i++) {
        Chat::create([
            'chatName' => $faker->name,
            'chatPicture' => 'bot.jpg',
            'createdBy' => 1 // admin created chat
        ]);
      }
    }
}
