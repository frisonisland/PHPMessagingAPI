<?php

use Illuminate\Database\Seeder;
use App\AddressBook;

class AddressBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the users table first
      AddressBook::truncate();

      $faker = \Faker\Factory::create();

      // Every user has each other in address book
      // Remember, user 0 is admin
      for ($j = 1; $j <= 6; $j++) {
        for ($i = 1; $i <= 6; $i++) {
          if ($i != $j) {
            AddressBook::create([
                'ownerId' => $j,
                'contactId' => $i,
            ]);
          }
        }
      }
    }
}
