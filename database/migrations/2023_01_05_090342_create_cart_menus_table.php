<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sell_menu_id')->nullable();
            $table->unsignedBigInteger('user_menu_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('qtd');
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
        Schema::dropIfExists('cart_menus');
    }
}
