<?php

use Illuminate\Database\Seeder;

class MineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mines')->truncate();
        DB::table('mines')->insert([
            'name' => 'kamita',
            'age' => 31,
        ]);
    }
}
