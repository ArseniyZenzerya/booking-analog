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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('comments')->nullable();
            $table->unsignedBigInteger('occupied')->index()->unsigned();
            $table->foreign('occupied')->references('id')->on('occupied_date_in_places');
            $table->enum('personal',[1,2,3,4,5,6,7,8,9,10])->nullable();
            $table->enum('convenient',[1,2,3,4,5,6,7,8,9,10])->nullable();
            $table->enum('clear',[1,2,3,4,5,6,7,8,9,10])->nullable();
            $table->enum('comfortable',[1,2,3,4,5,6,7,8,9,10])->nullable();
            $table->enum('priceQuality',[1,2,3,4,5,6,7,8,9,10])->nullable();
            $table->enum('area',[1,2,3,4,5,6,7,8,9,10])->nullable();
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
        Schema::dropIfExists('comments');
    }
};
