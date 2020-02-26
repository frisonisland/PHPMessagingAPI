<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_chat', function (Blueprint $table) {
            $table->unsignedBigInteger('chatId');
            $table->unsignedBigInteger('userId');
            $table->timestamps();
            $table->foreign('chatId')->references('chatId')->on('chat');
            $table->foreign('userId')->references('userId')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_chat');
    }
}
