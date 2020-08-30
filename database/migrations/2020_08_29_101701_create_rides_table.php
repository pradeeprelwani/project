<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('rides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rider_id');
            $table->unsignedBigInteger('driver_id');
            $table->string('source_lat');
            $table->string('source_long');
            $table->text('source_address');
            $table->string('destination_lat');
            $table->string('destination_long');
            $table->text('destination_address');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->foreign('rider_id')->references('id')->on('riders')->onDelete('cascade');
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('rides');
    }

}
