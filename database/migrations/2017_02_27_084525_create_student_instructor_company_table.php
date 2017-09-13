<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentInstructorCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_instructor_company', function (Blueprint $table){
            $table->integer('student_id')->index();
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');

            $table->string('instructor_id')->index();
            $table->foreign('instructor_id')->references('instructor_id')->on('instructor_company')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_instructor_company');
    }
}

