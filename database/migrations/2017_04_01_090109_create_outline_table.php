<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outline', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link')->nullAble();

            $table->string('topic_id');
            $table->foreign('topic_id')->references('topic_id')->on('topic')->onDelete('cascade');

            $table->string('instructor_id');
            $table->foreign('instructor_id')->references('instructor_id')->on('instructor_company')->onDelete('cascade');

            $table->integer('student_id');
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
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
        Schema::dropIfExists('outline');
    }
}
