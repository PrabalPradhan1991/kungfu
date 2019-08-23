<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('group_id');
            $table->string('name', 150)->nullable();
            $table->string('phone', 150)->nullable();
            $table->date('dob')->nullable();
            $table->string('street_address', 150)->nullable();
            $table->string('suburb', 150)->nullable();
            $table->enum('state', ['NSW', 'QLD', 'VIC', 'TAS', 'NT', 'SA','WA'])->nullable();
            $table->string('post_code', 150)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->timestamps();
        });

        \DB::table('user_details')
            ->insert([
                [
                    'user_id'   =>  1,
                    'group_id'  =>  1
                ],
                [
                    'user_id'   =>  2,
                    'group_id'  =>  3
                ],
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['group_id']);
        });
        Schema::dropIfExists('user_details');
    }
}
