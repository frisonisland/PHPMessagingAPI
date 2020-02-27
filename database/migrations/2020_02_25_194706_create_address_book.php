<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_book', function (Blueprint $table) {
            $table->unsignedBigInteger('ownerId');
            $table->unsignedBigInteger('contactId');
            $table->index(['ownerId','contactId']);
            $table->foreign('ownerId')->references('userId')->on('users')->onDelete('cascade');
            $table->foreign('contactId')->references('userId')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_book');
    }
}
