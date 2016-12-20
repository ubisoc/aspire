<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_data', function(Blueprint $table) {
          $table->increments('id');
          $table->integer('university_id');
          $table->text('biography');
          $table->integer('account_id')->unsigned();
          $table->foreign('account_id')->references('id')->on('accounts');
          $table->text('location_pref');
          $table->text('job_pref');
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
        Schema::dropIfExists('student_data');
    }
}
