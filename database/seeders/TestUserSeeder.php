<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('test_user')->insert([
            [
                'user_id' => 2,
                'test_id' => 1,
                'status' => 'not_available',
            ],
            [
                'user_id' => 2,
                'test_id' => 2,
                'status' => 'in_progress',
            ],
            [
                'user_id' => 3,
                'test_id' => 1,
                'status' => 'passed',
            ],
            [
                'user_id' => 4,
                'test_id' => 3,
                'status' => 'in_progress',
            ],
            [
                'user_id' => 4,
                'test_id' => 2,
                'status' => 'failed',
            ],
            [
                'user_id' => 4,
                'test_id' => 1,
                'status' => 'passed',
            ],
        ]);
    }
}
