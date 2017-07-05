<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('banner_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('banner_id')->comment('banner的ID');
            $table->string('article_title')->comment('文章标题');
            $table->text('contents')->nullable()->comment('内容');
            $table->string('article_key')->comment('文章关键字');
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
