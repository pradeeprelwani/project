<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('riders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('profile_pic');
            $table->string('phone', 20);
            $table->string('birth_day', 2);
            $table->string('birth_month', 2);
            $table->string('birth_year', 4);
            $table->string('gender', 10);
            $table->timestamp('email_verified_at')->nullable();
            $table->text('about_me');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('riders');
    }

}
