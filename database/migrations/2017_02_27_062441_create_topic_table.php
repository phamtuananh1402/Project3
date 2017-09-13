<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic_id')->unique();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('otherRequire')->nullable();
            $table->string('status')->nullable();
            $table->string('representation_id');

            $table->timestamps();

            //$table->foreign('otherRequire')->references('student_id')->on('students');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topic');

    }
}
