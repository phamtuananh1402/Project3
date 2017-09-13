<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCvSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_cv_skills', function (Blueprint $table) {
            $table->integer('student_id')->index();
            $table->foreign('student_id')->references('student_id')->on('student_cv')->onDelete('cascade');

            $table->string('skills_name')->index();
            $table->foreign('skills_name')->references('name')->on('skills')->onDelete('cascade');

            $table->string('level_name')->index();
            $table->foreign('level_name')->references('name')->on('level')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_cv_skills');
    }
}
