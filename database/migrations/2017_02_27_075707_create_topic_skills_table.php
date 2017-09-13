<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('topic_skills', function (Blueprint $table) {
            $table->string('topic_id')->index();
            $table->foreign('topic_id')->references('topic_id')->on('topic')->onDelete('cascade');

            $table->string('skills_name')->index();
            $table->foreign('skills_name')->references('name')->on('skills')->onDelete('cascade');

            $table->string('level_name')->index();
            $table->foreign('level_name')->references('name')->on('level')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topic_skills');
    }
}
