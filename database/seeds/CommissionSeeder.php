<?php

use Illuminate\Database\Seeder;

class CommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commission')->delete();
		$seedData = array(
			array(
				'id' => 1,
				'commission_title'=>'Commission',
				'commission_percentage'=>"3",
				'created_at' =>  date("Y-m-d H:i:s"),
				'updated_at' =>  date("Y-m-d H:i:s"),
			),
            array(
				'id' => 2,
				'commission_title'=>'GST',
				'commission_percentage'=>"15",
				'created_at' =>  date("Y-m-d H:i:s"),
				'updated_at' =>  date("Y-m-d H:i:s"),
			),
		);
		DB::table('commission')->insert($seedData);
    }
}
