<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->string('icon')->nullable();
            $table->integer('sex')->default(1)->commit('1:男 2:女');
            $table->string('motto')->nullable()->commit('个性签名');
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
//         Schema::drop('user_infos');
    }
}
