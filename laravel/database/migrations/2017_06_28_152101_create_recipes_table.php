<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('recipe_name')->comment('菜谱名称');
            $table->string('face')->comment('菜谱封面');
            $table->integer('uid')->default(1);
            $table->string('introduction')->nullable();
            $table->string('nd',30);
            $table->string('kw',30);
            $table->string('gy',30);
            $table->string('hs',30);
            $table->string('cj',30);
            $table->text('tips');
            $table->tinyInteger('status')->default(0)->comment('菜谱状态 0:待审核 1:审核通过 2:审核失败');
            $table->string('comment')->nullable();
            $table->timestamps();
        }) ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        //Schema::drop('recipes');
    }
}
