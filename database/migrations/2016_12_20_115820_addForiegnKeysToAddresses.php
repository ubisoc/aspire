<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForiegnKeysToAddresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function($table){
          $table->integer('company_data_id')->unsigned();
          $table->foreign('company_data_id')->references('id')->on('company_data');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function($table){
          $table->dropColumn('company_data_id');
          $table->dropColumn('user_id');
        });
    }
}
