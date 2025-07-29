<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('timetables')->insert([
            [
                'user_id' => 2,
                'lesson_id' => 1,
                'day_of_week' => 2,
                'start_time' => '14:00:00',
                'end_time' => '15:00:00',
            ],

            [
                'user_id' => 2,
                'lesson_id' => 1,
                'day_of_week' => 5,
                'start_time' => '16:00:00',
                'end_time' => '17:00:00',
            ],

            [
                'user_id' => 3,
                'lesson_id' => 1,
                'day_of_week' => 4,
                'start_time' => '14:00:00',
                'end_time' => '15:00:00',
            ],

            [
                'user_id' => 3,
                'lesson_id' => 1,
                'day_of_week' => 7,
                'start_time' => '19:00:00',
                'end_time' => '20:00:00',
            ],

            [
                'user_id' => 4,
                'lesson_id' => 1,
                'day_of_week' => 4,
                'start_time' => '15:30:00',
                'end_time' => '16:30:00',
            ],
        ]);
    }
}
