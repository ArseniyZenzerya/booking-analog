<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\DB;
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
        Schema::create('occupied_date_in_places', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('objectId')->index()->unsigned();
            $table->foreign('objectId')->references('objectId')->on('data_about_objects');
            $table->unsignedBigInteger('userId')->index()->unsigned()->nullable();;
            $table->foreign('userId')->references('id')->on('users');
            $table->date('firstDay');
            $table->date('lastDay');
            $table->text('preferences')->nullable(true);;
            $table->enum('accepted', ['true', 'false', 'n'])->default('n');
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
        Schema::dropIfExists('occupied_date_in_places');
    }
};
