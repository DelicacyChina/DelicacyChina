<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('navs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('n_name',30)->unqiue();
            $table->tinyInteger('n_status',false)->default(1)->comment('显示状态 0:不显示 1:显示');
            $table->tinyInteger('n_face',false)->default(1)->comment('精选 0:不精选 1:精选');
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
    }
}
