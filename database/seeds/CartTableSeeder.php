<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->truncate();
        DB::table('carts')->insert([
            'stock_id' => 1,
            'user_id' => 1,
        ]);
        DB::table('carts')->insert([
            'stock_id' => 2,
            'user_id' => 2,
        ]);
    }
}
