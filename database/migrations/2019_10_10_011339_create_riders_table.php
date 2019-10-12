<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phonenumber')->unique();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('surname');
            $table->string('status');
            $table->string('nickname');
            $table->string('gender');
            $table->string('martialstatus');
            $table->string('nationality');
            $table->string('stateoforgin');
            $table->string('lga');
            $table->string('placeofbirth');
            $table->string('bvn');
            $table->string('dob');
            $table->longText('address');
            $table->string('profilepic')->default('user.jpg');
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
        Schema::dropIfExists('riders');
    }
}
