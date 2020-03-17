<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ChallengesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'step_id' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('challenges')->insert($param);

        $param = [
            'user_id' => '1',
            'step_id' => '4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('challenges')->insert($param);

        $param = [
            'user_id' => '2',
            'step_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('challenges')->insert($param);

        $param = [
            'user_id' => '2',
            'step_id' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('challenges')->insert($param);

        $param = [
            'user_id' => '2',
            'step_id' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('challenges')->insert($param);

        $param = [
            'user_id' => '2',
            'step_id' => '4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('challenges')->insert($param);

        $param = [
            'user_id' => '1',
            'step_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('challenges')->insert($param);

        $param = [
            'user_id' => '1',
            'step_id' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('challenges')->insert($param);
    }
}
