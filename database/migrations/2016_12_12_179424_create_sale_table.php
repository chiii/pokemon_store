<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale', function (Blueprint $table) {
            $table->increments('sale_id');
            $table->integer('pokemon_id')->unsigned();
            $table->integer('pokemon_num')->unsigned();
            $table->integer('buy_user_id')->unsigned();

            $table->foreign('pokemon_id')->references('pokemon_id')->on('pokemon');

            $table->foreign('buy_user_id')->references('buy_user_id')->on('buy_users');
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
