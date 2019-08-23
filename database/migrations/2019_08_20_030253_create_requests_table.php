<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('to_stage_id');
            $table->unsignedBigInteger('from_stage_id');
            $table->string('description', 255);
            $table->foreign('from_stage_id')->references('id')->on('core_stages');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to_stage_id')->references('id')->on('core_stages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('core_requests', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['stage_id']);
        });
        Schema::dropIfExists('core_requests');
    }
}
