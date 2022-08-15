<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class MonthPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('month_prices')->insert([[
            'user_id' => '1',
            'm_id' => '20224',
            'price' => 6000,
        ]]);
        DB::table('month_prices')->insert([[
            'user_id' => '1',
            'm_id' => '20225',
            'price' => 4600,
        ]]);
        DB::table('month_prices')->insert([[
            'user_id' => '1',
            'm_id' => '20228',
            'price' => 4600,
        ]]);
        DB::table('month_prices')->insert([[
            'user_id' => '1',
            'm_id' => '20229',
            'price' => 4600,
        ]]);

    }
}
