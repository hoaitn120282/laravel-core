<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
        	[
	            'id' => 1,
	            'name' => 'Administrator',
	            'description' => 'This is supper admin',
	            'status' => true
            ]
        ]);
    }
}