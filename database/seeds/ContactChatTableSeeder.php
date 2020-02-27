<?php

use Illuminate\Database\Seeder;
use App\ContactChat;
class ContactChatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Let's clear the users table first
      ContactChat::truncate();

      // Add chat for every contact with admin
      //This means partecipants ar admin and other user
      for ($i = 1; $i <= 3; $i++) {
        ContactChat::create([
            'chatId' => $i,
            'userId' => 1 //admin
        ]);
        ContactChat::create([
            'chatId' => $i,
            'userId' => ($i+1) //next contact
        ]);
      }
    }
}
