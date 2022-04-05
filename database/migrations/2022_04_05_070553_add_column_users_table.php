<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_role')->after('id')->nullable()->comment = '1 = Admin, 2 = Merchant 3 = Users ';
            $table->string('first_name')->after('user_role')->nullable();
            $table->string('last_name')->after('first_name')->nullable();
            $table->string('profile_image')->after('last_name')->nullable();
            $table->string('address')->after('profile_image')->nullable();
            $table->string('city')->after('address')->nullable();
            $table->string('zip_code')->after('city')->nullable();
            $table->string('general_layality')->after('zip_code')->nullable();
            $table->enum('gender', ['1', '2', '0'])->after('general_layality')->default(1)->comment = '1=Male, 2 = Female 0=Special ';
            $table->string('mobile')->after('gender')->nullable();
            $table->dateTime('last_login')->after('remember_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_role')->nullable();
            $table->dropColumn('first_name')->nullable();
            $table->dropColumn('last_name')->nullable();
            $table->dropColumn('profile_image')->nullable();
            $table->dropColumn('address')->nullable();
            $table->dropColumn('city')->nullable();
            $table->dropColumn('zip_code')->nullable();
            $table->dropColumn('general_layality')->nullable();
            $table->dropColumn('gender')->nullable();
            $table->dropColumn('mobile')->nullable();
            $table->dropColumn('last_login')->nullable();
        });
    }
}
