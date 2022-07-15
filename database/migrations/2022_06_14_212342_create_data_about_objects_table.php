<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('data_about_objects', function (Blueprint $table) {
            $table->id('objectId');
            $table->unsignedBigInteger('userId')->index()->unsigned();
            $table->foreign('userId')->references('id')->on('user_objs');
            $table->string('objectName');
            $table->string('city');
            $table->enum('card',['true','false'])->default('true');
            $table->integer('price')->default(-1);
            $table->string('address');
            $table->text('description')->nullable(true);
            $table->enum('stars',[1,2,3,4,5,0])->default(0);
            $table->unsignedInteger('countGuest')->default(0);
            $table->enum('conditioning',['true','false'])->default('false');
            $table->enum('heating',['true','false'])->default('false');
            $table->enum('wiFi',['true','false'])->default('false');
            $table->enum('charging',['true','false'])->default('false');
            $table->enum('kitchen',['true','false'])->default('false');
            $table->enum('miniKitchen',['true','false'])->default('false');
            $table->enum('washingMachine',['true','false'])->default('false');
            $table->enum('tv',['true','false'])->default('false');
            $table->enum('pool',['true','false'])->default('false');
            $table->enum('hydromassage',['true','false'])->default('false');
            $table->enum('miniBar',['true','false'])->default('false');
            $table->enum('sauna',['true','false'])->default('false');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_about_objects');
    }
};

