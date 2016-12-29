<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function(Blueprint $table){
          $table->increments('id');
          $table->integer('student_data_id')->unsigned();
          $table->foreign('student_data_id')->references('id')->on('student_data');
          $table->integer('role_id')->unsigned();
          $table->foreign('role_id')->references('id')->on('roles');
          $table->string('cv_name')->nullable();
          $table->string('cover_letter_name')->nullable();
          $table->softDeletes();
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
        Schema::dropIfExists('applications');
    }
}
