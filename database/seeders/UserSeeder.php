<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            // 'user_id'=> '100',
            'name' => '佐藤太郎',
            'tel1' => '000',
            'tel2' => '0000',
            'tel3' => '0000',
            'email' => 'test@test.com',
            'rank' => 'gold',
            'plan'=> '20ギガプラン',
            'password' => Hash::make('00000000'),
            'created_at' => '2021/01/01 11:11:11'
        ]]);
    }
}
