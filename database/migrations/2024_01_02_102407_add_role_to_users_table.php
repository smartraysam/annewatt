<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user'); // Change 'user' to the default role you want
            $table->string('lga')->nullable(); // Add this line if you want to add a column for LGA
            $table->string('branch')->nullable(); // Add this line if you want to add a column for LGA
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('lga');  
            $table->dropColumn("branch");
        });
    }
}
