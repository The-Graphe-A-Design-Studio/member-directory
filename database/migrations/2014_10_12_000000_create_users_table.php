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
            $table->id();
            $table->string('IM_no');
            $table->string('name');
            $table->date('dob');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('gender');
            $table->string('photo')->nullable();
            $table->string('club_name');
            $table->string('designation');
            $table->string('occupation');
            $table->string('blood_group');
            $table->string('sponsorer');
            $table->integer('leo');
            $table->string('status');
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
