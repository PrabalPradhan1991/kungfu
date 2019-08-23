<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('stage_id');
            $table->unsignedInteger('ordering');
            $table->string('title', 150);
            $table->string('video_filename', 150);
            $table->string('mime', 150);
            $table->foreign('stage_id')->references('id')->on('core_stages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('core_videos', function (Blueprint $table) {
            $table->dropForeign(['stage_id']);
        });
        Schema::dropIfExists('core_videos');
    }
}
