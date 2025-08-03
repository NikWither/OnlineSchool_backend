<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tests')->insert([
            [
                'title' => 'тест 1',
                'file_path' => 'base_path'
            ],
            [
                'title' => 'тест 2',
                'file_path' => 'base_path'
            ],
            [
                'title' => 'тест 3',
                'file_path' => 'base_path'
            ],
            [
                'title' => 'тест 4',
                'file_path' => 'base_path'
            ],
        ]);
    }
}
