<?php

use Illuminate\Database\Seeder;
use App\Message;
class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Message::truncate();
      // Message for each chat
      for ($i = 1; $i <= 3; $i++) {
        Message::create([
            'userId' => 1, // admin message
            'chatId' => $i,
            'message' => "Hey, how was the weekend?"
        ]);
        Message::create([
            'userId' => ($i + 1), // user message
            'chatId' => $i,
            'message' => "Hey! Thanks, It was great! Really needed a break from the city."
        ]);
      }
    }
}
