<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Faker\Provider\DateTime;

class ProcessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'item' => 'ステップ1',
            'detail' => '内容1',
            'step_id' => '1',
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('processes')->insert($param);

        $param = [
            'item' => 'ステップ2',
            'detail' => '内容2',
            'step_id' => '1',
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('processes')->insert($param);

        $param = [
            'item' => 'ステップ3',
            'detail' => '内容3',
            'step_id' => '1',
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('processes')->insert($param);

        $param = [
            'item' => 'ステップ4',
            'detail' => '内容4',
            'step_id' => '1',
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('processes')->insert($param);

        $param = [
            'item' => 'ステップ5',
            'detail' => '内容5',
            'step_id' => '1',
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('processes')->insert($param);

        $param = [
            'item' => 'ステップ1',
            'detail' => '内容1',
            'step_id' => '2',
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('processes')->insert($param);

        $param = [
            'item' => 'ステップ2',
            'detail' => '内容2',
            'step_id' => '2',
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('processes')->insert($param);

        $param = [
            'item' => 'ステップ3',
            'detail' => '内容3',
            'step_id' => '2',
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('processes')->insert($param);

        $param = [
            'item' => 'ステップ4',
            'detail' => '内容4',
            'step_id' => '2',
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('processes')->insert($param);

        $param = [
            'item' => 'ステップ5',
            'detail' => '内容5',
            'step_id' => '2',
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('processes')->insert($param);
    }
}
