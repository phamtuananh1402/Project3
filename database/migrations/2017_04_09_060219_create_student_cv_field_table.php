<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCvFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_cv_field', function (Blueprint $table) {
            $table->increments('id');

            $table->string('field_name');
            $table->foreign('field_name')->references('name')->on('field')->onDelete('cascade');

            $table->integer('student_id')->index();
            $table->foreign('student_id')->references('student_id')->on('student_cv')->onDelete('cascade');
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
        Schema::dropIfExists('student_cv_field');
    }
}
