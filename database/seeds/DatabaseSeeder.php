<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(userTableSeeder::class);
        $this->call(Role::class);
        $this->call(roleUser::class);
        $this->call(CommissionSeeder::class);
    }
}
