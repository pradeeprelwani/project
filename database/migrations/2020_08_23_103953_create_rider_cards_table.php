<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiderCardsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('rider_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rider_id');
            $table->string('card_number', 16);
            $table->string('card_holder');
            $table->string('expiry_month');
            $table->string('expiry_year');
            $table->string('cvv');

            $table->timestamps();
            $table->foreign('rider_id')->references('id')->on('riders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('rider_cards');
    }

}
