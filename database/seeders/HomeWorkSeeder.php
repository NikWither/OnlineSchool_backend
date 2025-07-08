<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('homeworks')->insert([
            [
                'title' => 'Математика',
                'homework' => 'Решить задачи на дроби с 12 по 18 номер',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Русский язык',
                'homework' => 'Написать изложение на тему «Дружба»',
                'user_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Литература',
                'homework' => 'Прочитать рассказ Бунина «Чистый понедельник»',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Физика',
                'homework' => 'Выучить формулы по теме «Механика»',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Биология',
                'homework' => 'Сделать конспект по теме «Царство грибов»',
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Химия',
                'homework' => 'Написать уравнения реакций кислот с основаниями',
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Английский язык',
                'homework' => 'Выучить слова к 5 уроку + сделать упражнения 3–5',
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'История',
                'homework' => 'Подготовить сообщение о Петре I',
                'user_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Обществознание',
                'homework' => 'Ответить на вопросы по теме «Права человека»',
                'user_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'География',
                'homework' => 'Нарисовать карту климатических поясов мира',
                'user_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Информатика',
                'homework' => 'Сделать презентацию по алгоритмам сортировки',
                'user_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Физика',
                'homework' => 'Решить задачи на закон Архимеда',
                'user_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Русский язык',
                'homework' => 'Подготовить доклад о лексических нормах',
                'user_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Литература',
                'homework' => 'Сравнительный анализ Онегина и Печорина',
                'user_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Математика',
                'homework' => 'Подготовка к контрольной: повторить темы 1–3',
                'user_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
