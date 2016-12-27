<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCVNameAndCoverLetterNameToStudentData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_data', function($table) {
          $table->string('cv_name')->nullable();
          $table->string('cover_letter_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_data', function($table) {
          $table->dropColumn('cv_name');
          $table->dropColumn('cover_letter_name');
        });
    }
}
