<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->string('user_id', 16)->primary();
            $table->integer('school_id');
            $table->string('firstname', 64);
            $table->string('middlename', 32)->nullable();
            $table->string('lastname', 32);
            $table->string('gender', 8)->nullable();
            $table->date('birthdate')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
