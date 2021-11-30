<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => 1,
            'area_name' => '東京',
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 2,
            'area_name' => '大阪',
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 3,
            'area_name' => '福岡',
        ];
        DB::table('areas')->insert($param);
    }
}
