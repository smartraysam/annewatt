<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNextkinDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nextkin_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('riderphonenumber')->unique();
            $table->string('phonenumber');
            $table->string('title');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('surname');
            $table->string('relationship');
            $table->longText('address');
            $table->string('stateoforgin');
            $table->string('lga');
            $table->string('gender');
            $table->string('bvn');
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
        Schema::dropIfExists('nextkin_details');
    }
}
