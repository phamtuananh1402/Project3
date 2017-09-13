<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->text('content_instructor')->nullable();
            $table->string('instructor_id')->nullable();
            $table->text('content_lecturer')->nullable();
            $table->string('lecturer_id')->nullable();
            $table->timestamps();

            $table->foreign('instructor_id')->references('instructor_id')->on('instructor_company')->onDelete('cascade');
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->foreign('lecturer_id')->references('lecturer_id')->on('lecturer')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluation');
    }
}
