<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('name')->default('');
            $table->string('surname')->default('');
            $table->string('nameForView')->default('');
            $table->bigInteger('phone')->nullable();
            $table->date('wasBorn')->nullable();
            $table->enum('sex',['w','m','n'])->default('n');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        //
    }
};
