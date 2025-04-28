<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notes')->insert([
            [
                'title' => 'Задание 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Задание 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Задание 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
