<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->string('mark_instructor')->nullable();
            $table->text('mark_instructor_link')->nullable();
            $table->mediumText('instructor_note')->nullable();
            $table->string('instructor_id')->nullable();
            $table->string('mark_lecturer')->nullable();
            $table->text('lecturer_note')->nullable();
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
        Schema::dropIfExists('mark');
    }
}
