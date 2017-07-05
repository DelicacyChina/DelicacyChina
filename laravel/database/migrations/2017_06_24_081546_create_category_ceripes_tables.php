<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryCeripesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('category_recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('recipe_name',100)->comment('菜谱分类名称');
            $table->integer('recipe_parentId')->default(0)->comment('父级ID');
            $table->tinyInteger('status',0)->default(0)->comment('显示状态');
            $table->string('recipe_path')->default('0,')->commet('路径');

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
