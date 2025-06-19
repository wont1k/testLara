<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntervalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 0; $i <= 10000; $i++) {
            $start = rand(0, 10000);
            $end = (rand(0, 9) < 2) ? null : $start + rand(1, 1000);
            $data[] = [
                'start' => $start,
                'end' => $end,
            ];
            if($i % 1000 === 0){
                DB::table('intervals')->insert($data);
                $data = [];
            }
        }
        DB::table('intervals')->insert($data);
    }
}
