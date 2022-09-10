<?php

use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();
		$seedData = array(
			array(
				'id' => 1,
				'user_role'=>'1',
				'first_name'=>"Admin",
				'last_name'=>"User",
				'profile_image'	=>'profile.png',
				'name' => 'administrator',
				'email' => 'admin@gmail.com',
				'email_verified_at' =>  date("Y-m-d H:i:s"),
				'password' => bcrypt('Qwert@123'),
				'remember_token' => null,
				'created_at' =>  date("Y-m-d H:i:s"),
				'updated_at' =>  date("Y-m-d H:i:s"),
			),
			array(
				'id' => 2,
				'user_role'=>'2',
				'first_name'=>"Marchent",
				'last_name'=>"User",
				'profile_image'	=>'profile.png',
				'name' => 'marchent',
				'email' => 'marchent@gmail.com',
				'email_verified_at' =>  date("Y-m-d H:i:s"),
				'password' => bcrypt('Qwert@123'),
				'remember_token' => null,
				'created_at' =>  date("Y-m-d H:i:s"),
				'updated_at' =>  date("Y-m-d H:i:s"),
			),
		);
		DB::table('users')->insert($seedData);
	}
}
