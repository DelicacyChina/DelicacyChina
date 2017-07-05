<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->string('name');
            $table->string('prov',30);
            $table->string('city',30);
            $table->string('area',30);
            $table->string('detail');
            $table->string('phone',11);
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
