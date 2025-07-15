<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statistics')->insert([
            [
                'user_id' => 2,
                'assignment_id' => 1,
                'status' => 'зачтено',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'assignment_id' => 2,
                'status' => 'в процессе',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'assignment_id' => 3,
                'status' => 'не начали',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'assignment_id' => 1,
                'status' => 'не начали',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                    [
                'user_id' => 3,
                'assignment_id' => 2,
                'status' => 'не начали',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'assignment_id' => 3,
                'status' => 'в процессе',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => 3,
                'assignment_id' => 4,
                'status' => 'зачтено',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
