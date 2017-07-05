<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('recipe_foods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rid');
            $table->string('food_name');
            $table->string('weight');
            $table->integer('status',false)->comment('状态1主料2辅料');
            $table->timestamps();
        })  ;
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
