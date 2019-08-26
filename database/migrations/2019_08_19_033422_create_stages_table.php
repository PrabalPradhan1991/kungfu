<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_stages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('stage_name', 150);
            $table->unsignedInteger('price');
            $table->longText('stage_description')->nullable();
            $table->unsignedInteger('ordering')->nullable();
        });

        \DB::table('core_stages')
            ->insert([
                [
                    'stage_name'    =>  'Stage 1',
                    'stage_description' =>  'This is description of stage 1',
                    'ordering'  =>  1,
                    'price' =>  100
                ],
                [
                    'stage_name'    =>  'Stage 2',
                    'stage_description' =>  'This is description of stage 2',
                    'ordering'  =>  2,
                    'price' =>  100
                ],
                [
                    'stage_name'    =>  'Stage 3',
                    'stage_description' =>  'This is description of stage 3',
                    'ordering'  =>  3,
                    'price' =>  100
                ],
                [
                    'stage_name'    =>  'Stage 4',
                    'stage_description' =>  'This is description of stage 4',
                    'ordering'  =>  4,
                    'price' =>  100
                ],
                [
                    'stage_name'    =>  'Stage 5',
                    'stage_description' =>  'This is description of stage 5',
                    'ordering'  =>  5,
                    'price' =>  100
                ],
                [
                    'stage_name'    =>  'Stage 6',
                    'stage_description' =>  'This is description of stage 6',
                    'ordering'  =>  6,
                    'price' =>  100
                ],
                [
                    'stage_name'    =>  'Stage 7',
                    'stage_description' =>  'This is description of stage 7',
                    'ordering'  =>  7,
                    'price' =>  100
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
        Schema::dropIfExists('core_stages');
    }
}
