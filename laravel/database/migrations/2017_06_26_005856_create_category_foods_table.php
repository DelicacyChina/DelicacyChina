<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('category_foods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('food_name',100)->comment('食材分类名称');
            $table->integer('food_parentId')->default(0)->comment('父级ID');
            $table->tinyInteger('status',0)->default(0)->comment('显示状态');
            $table->string('food_path')->default('0,')->commet('路径');

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
