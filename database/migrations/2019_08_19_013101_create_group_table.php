<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('group_name', 150)->unique();
            $table->string('group_role', 150)->unique();
            $table->string('group_alias', 150);
            $table->unsignedInteger('precedence');
            $table->timestamps();
        });

        \DB::table('groups')
            ->insert([
                ['group_name'   =>  'superadmin', 'group_alias' => 'Superadmin', 'group_role' => 'superadmin', 'precedence' => 0],
                ['group_name'   =>  'admin', 'group_alias' => 'Admin', 'group_role' => 'admin', 'precedence' => 1],
                ['group_name'   =>  'user', 'group_alias' => 'User', 'group_role' => 'user', 'precedence' => 1]
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
