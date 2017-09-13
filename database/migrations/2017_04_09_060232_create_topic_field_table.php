<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_field', function (Blueprint $table) {
            $table->increments('id');

            $table->string('field_name');
            $table->foreign('field_name')->references('name')->on('field')->onDelete('cascade');

            $table->string('topic_id')->index();
            $table->foreign('topic_id')->references('topic_id')->on('topic')->onDelete('cascade');

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
        Schema::dropIfExists('topic_field');
    }
}
