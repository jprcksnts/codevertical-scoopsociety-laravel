<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('user_statuses', function (Blueprint $table) {
            $table->string('user_id', 16)->unique();
            $table->string('status', 4096)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_statuses');
    }
}
