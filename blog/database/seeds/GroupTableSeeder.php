<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            ['id' => '1', 'group' => 'user'],
            ['id' => '2', 'group' => 'moder'],
    		['id' => '3', 'group' => 'admin']
        ]);
    }
}
