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
          $table->integer('student_id')->unsigned();
          $table->foreign('student_id')->references('id')->on('accounts');
          $table->integer('company_id')->unsigned();
          $table->foreign('company_id')->references('id')->on('accounts');
          $table->string('resume_name');
          $table->string('cover_letter_name');
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
