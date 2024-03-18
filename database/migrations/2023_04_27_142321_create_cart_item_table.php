<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip_address')->nullable();
            $table->string('session_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('quantity')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
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
        Schema::dropIfExists('cart_item');
    }
}
