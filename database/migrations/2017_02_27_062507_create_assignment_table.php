<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->string('intern_management_teacher_id')->nullable();
            $table->string('company_id');
            $table->string('topic_id');
            $table->string('representation_id');
            $table->string('company_confirm');
            $table->string('status');
            $table->timestamps();

//            $table->foreign('student_id')->references('student_id')->on('students');
//
//            $table->foreign('intern_management_teacher_id')
//                ->references('intern_management_teacher_id')
//                ->on('intern_management_teacher');
//
//            $table->foreign('company_id')->references('company_id')->on('company');
//            $table->foreign('topic_id')->references('topic_id')->on('topic');
            //$table->foreign('representation_id')->references('representation_id')->on('topic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignment');
    }
}
