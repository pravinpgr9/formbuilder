<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_opens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // Assuming you have a users table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_opens');
    }
};
