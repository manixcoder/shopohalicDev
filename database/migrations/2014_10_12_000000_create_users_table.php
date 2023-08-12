<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('user_role')->nullable()->comment = '1 = Admin, 2 = Merchant 3 = Users ';
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('general_layality')->nullable();

            $table->enum('gender',['0', '1','2'])->default(0)->comment = '1=Male, 2 = Female 0=Special';
            $table->enum('status',['0', '1'])->default(0)->comment = '0=Inactive, 1 = Active';
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
             $table->enum('isDelete',['0', '1'])->default(0)->comment = '0=NoDeleted, 1 = Deleted';
            $table->rememberToken();
            $table->timestamps();
            $table->datetime('last_login')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('shipping_superb')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_country')->nullable();
            $table->integer('shipping_pin')->nullable();
            $table->string('pickup_address')->nullable();
            $table->string('pickup_superb')->nullable();
            $table->string('pickup_city')->nullable();
            $table->string('pickup_state')->nullable();
            $table->string('pickup_country')->nullable();
            $table->integer('pickup_pin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
