<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_cv', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unique();
            $table->string('name')->nullable();
            $table->text('info')->nullable();
            $table->string('other_skills')->nullable();
            $table->string('email')->nullable();
            $table->integer('phone_number')->nullable();
            $table->text('purpose')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            //$table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_cv');
    }
}
