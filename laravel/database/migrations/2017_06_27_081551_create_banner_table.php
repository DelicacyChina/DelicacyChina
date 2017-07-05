<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('banner_title')->comment('banner的标题');
            $table->text('introduces')->nullable()->comment('文章简介');
            $table->string('banner_img')->nullable()->comment('banner图片路径');
            $table->string('face_img')->nullable()->comment('封面图片路径');
            $table->integer('status',0)->default(1)->comment('文章状态');
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
