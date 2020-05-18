<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->default('x');
            $table->string('last_name')->default('y');
            $table->string('email')->unique();
            $table->string('phone_no')->unique();
            $table->integer('district_id');
            $table->integer('division_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('status')->default(0)->comment('0 means normal user');
            $table->string('avatar')->nullable();
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
        Schema::dropIfExists('users');
    }
}
