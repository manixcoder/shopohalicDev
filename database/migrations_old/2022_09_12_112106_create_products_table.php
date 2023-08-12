<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name')->nullable;
            $table->string('product_code')->nullable;
            $table->string('brand')->nullable;
            $table->integer('category')->nullable;
            $table->integer('quantity')->nullable;
            $table->text('description')->nullable;
            $table->string('color')->nullable;
            $table->string('size')->nullable;
            $table->string('image')->nullable;
            $table->float('price', 8, 2)->nullable;
            $table->float('special_price', 8, 2)->nullable;
            $table->enum('status',['0','1'])->default(0)->nullable;
            $table->integer('created_by')->nullable;
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
        Schema::dropIfExists('products');
    }
}
