<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class PhoneDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phone_data')->insert([[
            'user_id' => '1',
            'm_id' => '20224',
            'm_data' => 6.8,
            'm_max_data' => 20,
        ]]);
        DB::table('phone_data')->insert([[
            'user_id' => '1',
            'm_id' => '20225',
            'm_data' => 18.9,
            'm_max_data' => 20,
        ]]);
        DB::table('phone_data')->insert([[
            'user_id' => '1',
            'm_id' => '20228',
            'm_data' => 6.8,
            'm_max_data' => 20,
        ]]);
        DB::table('phone_data')->insert([[
            'user_id' => '1',
            'm_id' => '20229',
            'm_data' => 18.9,
            'm_max_data' => 20,
        ]]);

    }
}
