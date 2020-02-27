<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AddressBookTableSeeder::class);
        $this->call(ChatTableSeeder::class);
        $this->call(ContactChatTableSeeder::class);
        $this->call(MessageTableSeeder::class);

    }
}
