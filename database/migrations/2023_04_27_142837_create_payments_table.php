<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_no')->nullable();
            $table->string('session_id')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->text('response')->nullable();
            $table->datetime('order_date')->nullable();
            $table->integer('order_status')->nullable();
            $table->datetime('payment_date')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
