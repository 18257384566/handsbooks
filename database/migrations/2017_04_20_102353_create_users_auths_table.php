<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAuthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 用户角色表（中间表）
        Schema::create('auth_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();     //用户id
            $table->integer('auth_id')->unsigned();     //角色id

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('auth_id')->references('id')->on('auths')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'auth_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
