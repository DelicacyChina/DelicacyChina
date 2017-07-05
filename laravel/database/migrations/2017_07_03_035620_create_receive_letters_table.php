<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiveLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('receive_letters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rid');
            $table->integer('sid')->comment(' 发送者id');
            $table->tinyInteger('guard')->comment('发送者身份');
            $table->string('content');
            $table->tinyInteger('status')->default(0)->comment('0:未读 1:已读');
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
        //
        Schema::drop('receive_letters');
    }
}
