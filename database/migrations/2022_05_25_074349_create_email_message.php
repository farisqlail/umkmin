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
        Schema::create('email_message', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('to_email');
            $table->string('from_email');
            $table->string('phone');
            $table->string('email');
            $table->date('date');
            $table->time('time1');
            $table->time('time2');
            $table->string('subject');
            $table->text('desc');
            $table->string('status');
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
        Schema::dropIfExists('email_message');
    }
};
