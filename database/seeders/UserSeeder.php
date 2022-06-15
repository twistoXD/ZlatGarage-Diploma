<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            [
                'name' => 'Елена',
                'surname' => 'Макарова',
                'email' => 'makarova.e@mail.ru',
                'password' => Hash::make('3214makarova'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Максим',
                'surname' => 'Алекссев',
                'email' => 'maks.alexeev@yandex.ru',
                'password' => Hash::make('masklxsaos312'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Андрей',
                'surname' => 'Салов',
                'email' => 'salov.andrye@yandex.ru',
                'password' => Hash::make('msalov2'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ярослав',
                'surname' => 'Миниахметов',
                'email' => 'yaroslav.kreas@mail.ru',
                'password' => Hash::make('yarikyarkie2'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Михаил',
                'surname' => 'Кудрин',
                'email' => 'kydrin.michael@yandex.ru',
                'password' => Hash::make('kydrinmichale1213'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Алёна',
                'surname' => 'Бекшанова',
                'email' => 'bekchanova.alenasx132@mail.ru',
                'password' => Hash::make('alenas.bechakonav1234'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
