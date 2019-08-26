<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePurchasedVideo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_purchased_videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('stage_id');
            $table->enum('purchase_status', ['review', 'purchased']);
            $table ->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table ->foreign('stage_id')->references('id')->on('core_stages')->onDelete('cascade');
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
        

        Schema::dropIfExists('core_purchased_videos');
    }
}
