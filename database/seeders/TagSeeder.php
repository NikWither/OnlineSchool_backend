<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            [
                'title' => 'Excel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Программирование',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Лист бумаги',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
