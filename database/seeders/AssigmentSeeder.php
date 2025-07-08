<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssigmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('assignments')->insert([
            [
                'title' => 'Задание 1',
                'description' => 'Описание 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                    [
                'title' => 'Задание 2',
                'description' => 'Описание 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                    [
                'title' => 'Задание 3',
                'description' => 'Описание 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                    [
                'title' => 'Задание 4',
                'description' => 'Описание 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                    [
                'title' => 'Задание 5',
                'description' => 'Описание 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                    [
                'title' => 'Задание 6',
                'description' => 'Описание 6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                    [
                'title' => 'Задание 7',
                'description' => 'Описание 7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                    [
                'title' => 'Задание 8',
                'description' => 'Описание 8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                    [
                'title' => 'Задание 9',
                'description' => 'Описание 9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                    [
                'title' => 'Задание 10',
                'description' => 'Описание 10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                    [
                'title' => 'Задание 11',
                'description' => 'Описание 11',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                    [
                'title' => 'Задание 12',
                'description' => 'Описание 12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                    [
                'title' => 'Задание 13',
                'description' => 'Описание 13',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                        [
                'title' => 'Задание 14',
                'description' => 'Описание 14',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                [
                'title' => 'Задание 15',
                'description' => 'Описание 15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                [
                'title' => 'Задание 16',
                'description' => 'Описание 16',
                'created_at' => now(),
                'updated_at' => now(),
            ],

                    [
                'title' => 'Задание 17',
                'description' => 'Описание 17',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                            [
                'title' => 'Задание 18',
                'description' => 'Описание 18',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                    [
                'title' => 'Задание 19',
                'description' => 'Описание 19',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                        [
                'title' => 'Задание 20',
                'description' => 'Описание 20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                [
                'title' => 'Задание 21',
                'description' => 'Описание 21',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                [
                'title' => 'Задание 22',
                'description' => 'Описание 22',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Задание 24',
                'description' => 'Описание 24',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Задание 25',
                'description' => 'Описание 25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Задание 26',
                'description' => 'Описание 26',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Задание 27',
                'description' => 'Описание 27',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
