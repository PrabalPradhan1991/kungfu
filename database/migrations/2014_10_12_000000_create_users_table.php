<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email', 150)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('is_active', ['yes', 'no'])->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        \DB::table('users')
            ->insert([
                [
                    'name'  =>  'Superadmin',
                    'email' =>  'superadmin@email.com',
                    'password'  =>  bcrypt('password'),
                    'is_active' =>  'yes'
                ],
                [
                    'name'  =>  'User 1',
                    'email' =>  'user1@email.com',
                    'password'  =>  bcrypt('password'),
                    'is_active' =>  'yes'
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
        Schema::dropIfExists('users');
    }
}
