<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiderHobbiesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('rider_hobbies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rider_id');
            $table->unsignedBigInteger('hobby_id');
            $table->timestamps();
            $table->foreign('rider_id')->references('id')->on('riders')->onDelete('cascade');
            $table->foreign('hobby_id')->references('id')->on('hobbies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('car_pictures');
    }

}
