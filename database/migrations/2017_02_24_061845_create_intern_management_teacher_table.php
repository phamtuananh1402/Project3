<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternManagementTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('intern_management_teacher', function (Blueprint $table) {

            $table->increments('id');
            $table->string('first_name','20')->nullable();
            $table->string('last_name','20')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('intern_management_teacher_id')->unique();
            $table->string('gender')->nullable();
            $table->string('phone_number','15')->nullable();
            $table->string('email')->unique();
            $table->string('address')->nullable();
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

        Schema::dropIfExists('intern_management_teacher');
    }
}
