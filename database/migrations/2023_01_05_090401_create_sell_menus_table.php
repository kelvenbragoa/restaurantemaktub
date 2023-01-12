<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_menu_id');
            $table->unsignedBigInteger('table_id');
            $table->decimal('total',8,2);
            $table->string('payment');
            $table->string('status');
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
        Schema::dropIfExists('sell_menus');
    }
}
