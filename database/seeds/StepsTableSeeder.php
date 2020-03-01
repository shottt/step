<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class StepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'title' => 'プログラミング',
            // 'thumbnail' => '',
            'user_id' => '1',
            'category_id' => '1',
            'overview' => '紹介紹介紹介紹介紹介紹介紹介紹介',
            'target_time' => '3か月',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('steps')->insert($param);
        
        $param = [
            'title' => '英語',
            // 'thumbnail' => '',
            'user_id' => '1',
            'category_id' => '2',
            'overview' => '紹介紹介紹介紹介紹介紹介紹介紹介',
            'target_time' => '6か月',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('steps')->insert($param);

        $param = [
            'title' => 'プログラミング',
            // 'thumbnail' => '',
            'user_id' => '2',
            'category_id' => '1',
            'overview' => '紹介紹介紹介紹介紹介紹介紹介紹介',
            'target_time' => '3か月',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('steps')->insert($param);
        
        $param = [
            'title' => '英語',
            // 'thumbnail' => '',
            'user_id' => '2',
            'category_id' => '2',
            'overview' => '紹介紹介紹介紹介紹介紹介紹介紹介',
            'target_time' => '6か月',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('steps')->insert($param);
    }
}
