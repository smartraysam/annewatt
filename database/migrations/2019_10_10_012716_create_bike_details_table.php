<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bike_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phonenumber')->unique();
            $table->string('ridername');
            $table->string('bikebrand');
            $table->string('enginenumber');
            $table->string('chasisno');
            $table->string('registrationnum');
            $table->string('receiptnumber');
            $table->string('dateofpurchase');
            $table->string('witnessname');
            $table->string('witnessaddress');
            $table->string('witnessphonenum');
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
        Schema::dropIfExists('bike_details');
    }
}