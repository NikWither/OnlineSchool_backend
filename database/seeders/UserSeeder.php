<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Админ',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
                'email_verified_at' => now(),
                'is_admin' => true,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Иван Иванов',
                'email' => 'ivan@example.com',
                'password' => Hash::make('123'),
                'email_verified_at' => now(),
                'is_admin' => false,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Мария Смирнова',
                'email' => 'maria@example.com',
                'password' => Hash::make('123'),
                'email_verified_at' => now(),
                'is_admin' => false,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Петя Петя',
                'email' => 'petya@example.com',
                'password' => Hash::make('123'),
                'email_verified_at' => now(),
                'is_admin' => false,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Антон Антон',
                'email' => 'anton@example.com',
                'password' => Hash::make('123'),
                'email_verified_at' => now(),
                'is_admin' => false,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Валерий Жмышенко',
                'email' => 'valera@example.com',
                'password' => Hash::make('123'),
                'email_verified_at' => now(),
                'is_admin' => false,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
