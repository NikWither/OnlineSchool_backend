<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('variants')->insert([
            [
                'title' => 'Демонстрационный вариант № 1 2024 год',
                'file_name' => 'variant_1.pdf',
            ],
            [
                'title' => 'Демонстрационный вариант № 1 2025 год',
                'file_name' => 'variant_2.pdf',
            ],
            [
                'title' => 'Досрочный вариант № 1 2025 год',
                'file_name' => 'variant_3.pdf',
            ],
            [
                'title' => 'Досрочный вариант № 2 2025 год',
                'file_name' => 'variant_4.pdf',
            ],
            [
                'title' => 'Проверочный вариант № 1 2024 год',
                'file_name' => 'variant_5.pdf',
            ],

        ]);
    }
}
