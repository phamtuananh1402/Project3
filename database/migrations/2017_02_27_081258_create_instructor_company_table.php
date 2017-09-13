<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructor_company', function (Blueprint $table) {
            $table->increments('id');
            $table->string('instructor_id')->unique();
            $table->string('first_name','25')->nullable();
            $table->string('last_name','25')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number','15')->nullable();
            $table->string('company_id');
            $table->timestamps();

            $table->foreign('company_id')->references('company_id')->on('company')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instructor_company');

    }

}
