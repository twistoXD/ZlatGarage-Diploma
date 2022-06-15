<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'user_id' => 1,
                'content' => "Приятно удивил меня сервис. Сама я обслуживаю свой Accord у них с тех самых пор как закончилась гарантия. Хотя и вовремя гарантийного срока брал у них в магазине запчасти для ТО так Дешевле!",
                'created_at' => now(),
                'like' => 1,
                'status' => 1
            ],
            [
                'user_id' => 2,
                'content' => "На Мерсе Спринтере поменяли подвесной, рулевые наконечники, сальник полуоси, тормозные колодки задние. Мне очень понравилось, все сделали быстро, качественно. Спасибо.",
                'created_at' => now(),
                'like' => 1,
                'status' => 1
            ],
            [
                'user_id' => 3,
                'content' => "Уютный компактный сервис, очень все понравилось. Cделали быстро и качественно. Если что, еще раз обращаюсь в этот автосервис.",
                'created_at' => now(),
                'like' => 1,
                'status' => 1
            ],
            [
                'user_id' => 4,
                'content' => "Обращался в СТО на неделе. Приезжал за промывкой двигателя. Двигатель промыли. По цене: адекватная, дешевле, чем у других сервисов. Ребята толковые, знают, как делать.",
                'created_at' => now(),
                'like' => 1,
                'status' => 1
            ],
            [
                'user_id' => 5,
                'content' => "Замечательный автосервис. После полной диагностики по акции получила актуальные рекомендации по ремонту. Уютная комната ожидания большой плюс. Рекомендую!",
                'created_at' => now(),
                'like' => 1,
                'status' => 1
            ],


        ]);
    }
}
