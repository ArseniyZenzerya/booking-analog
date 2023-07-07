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
        Schema::create('photo_for_objects', function (Blueprint $table) {
            $table->id('photoId');
            $table->string('photo');
            $table->unsignedBigInteger('objectId')->index()->unsigned();
            $table->foreign('objectId')->references('objectId')->on('data_about_objects');
            $table->rememberToken();
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
        Schema::dropIfExists('photo_for_objects');
    }
};

