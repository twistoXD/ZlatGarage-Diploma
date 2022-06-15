<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('works')->insert([
            [ 'name' => 'С/у защиты двигателя',
                'price' =>  200,
                'category_id' => 1
            ],
            [ 'name' => 'Замена воздушного фильтра',
                'price' => 200,
                'category_id' => 1
            ],
            [ 'name' => 'Замена свечей зажигания за 1шт.',
                'price' => 200,
                'category_id' => 1
            ],
            [ 'name' => 'Замена масла в двигателе (ДВС) + маслянный фильтр',
                'price' => 600,
                'category_id' => 1
            ],
            [ 'name' => 'Замена салонного фильтра',
                'price' => 630,
                'category_id' => 1
            ],
            [ 'name' => 'Замена масла в механической коробке передач (КПП)',
                'price' => 900,
                'category_id' => 1
            ],
            [ 'name' => 'Замена масла в редукторе',
                'price' => 900,
                'category_id' => 1
            ],
            [ 'name' => 'Замена масла в ведущем мосту',
                'price' => 900,
                'category_id' => 1
            ],
            [ 'name' => 'Замена тормозной жидкости с прокачкой',
                'price' => 900,
                'category_id' => 1
            ],
            [ 'name' => 'Замена охлаждающей жидкости, тосола',
                'price' => 900,
                'category_id' => 1
            ],
            [ 'name' => 'Замена антифриза',
                'price' => 900,
                'category_id' => 1
            ],
            [ 'name' => 'Замена жидкости ГУР',
                'price' => 900,
                'category_id' => 1
            ],
            [ 'name' => 'Замена жидкости сцепления с прокачкой',
                'price' => 900,
                'category_id' => 1
            ],
            [ 'name' => 'Замена топливного фильтра - бензин',
                'price' => 900,
                'category_id' => 1
            ],
            [ 'name' => 'С/у коллектора',
                'price' => 1000,
                'category_id' => 1
            ],
            [ 'name' => 'Замена топливного фильтра - дизель',
                'price' => 1100,
                'category_id' => 1
            ],
            [ 'name' => 'Замена масла в автоматической коробке передач (АКПП)',
                'price' => 1500,
                'category_id' => 1
            ],
            [ 'name' => 'Замена масла в механической коробке передач (АКПП) + с/у поддона + замена фильтра',
                'price' => 2500,
                'category_id' => 1
            ],
            [ 'name' => 'Замена топливного фильтра (погружного)',
                'price' => 2500,
                'category_id' => 1
            ],
            [ 'name' => 'Замер компрессии (1-го циллиндра)',
                'price' => 250,
                'category_id' => 1
            ],
            [ 'name' => 'Замена приводного ремня',
                'price' => 450,
                'category_id' => 1
            ],
            [ 'name' => 'Замена сальника',
                'price' =>  500,
                'category_id' => 1
            ],
            [ 'name' => 'С/у шкива',
                'price' => 500,
                'category_id' => 1
            ],
            [ 'name' => 'Замена ролика',
                'price' => 500,
                'category_id' => 1
            ],
            [ 'name' => 'Замена натяжителя',
                'price' => 600,
                'category_id' => 1
            ],
            [ 'name' => 'Замена прокладки клапанной крышки',
                'price' => 900,
                'category_id' => 1
            ],
            [ 'name' => 'Замена помпы (без учета стоимости с/у ГРМ)',
                'price' => 900,
                'category_id' => 1
            ],
            [ 'name' => 'Замена термостата',
                'price' => 900,
                'category_id' => 1
            ],
            [ 'name' => 'С/у маховика',
                'price' => 900,
                'category_id' => 1
            ],
            [ 'name' => 'Чистка клапана холостого хода',
                'price' => 900,
                'category_id' => 1
            ],
            [ 'name' => 'Замена общего приводного ремня',
                'price' => 1500,
                'category_id' => 1
            ],
            [ 'name' => 'Чистка дроссельной заслонки',
                'price' => 1000,
                'category_id' => 1
            ],
            [ 'name' => 'Чистка инжектора',
                'price' => 1800,
                'category_id' => 1
            ],
            [ 'name' => 'Замена прокладки поддона картера',
                'price' => 900,
                'category_id' => 1
            ],
            [ 'name' => 'Регулировка клапанов',
                'price' => 700,
                'category_id' => 1
            ],
            [ 'name' => 'Ремонт ГБЦ без снятия ГБЦ (притирка клапанов + замена прокладок + замена маслосъемных колпачков)',
                'price' => 4000,
                'category_id' => 1
            ],
            [ 'name' => 'Замена прокладки ГБЦ',
                'price' => 5000,
                'category_id' => 1
            ],
            [ 'name' => 'Замена сцепления',
                'price' => 6000,
                'category_id' => 1
            ],
            [ 'name' => 'Подкачка одного колеса',
                'price' => 10,
                'category_id' => 2
            ],
            [ 'name' => 'Грузы (60гр.)',
                'price' => 30,
                'category_id' => 2
            ],
            [ 'name' => 'Обраб. диска герметиком 1 стор.',
                'price' => 50,
                'category_id' => 2
            ],
            [ 'name' => 'Установка вентиля (вкл.вент.)',
                'price' => 50,
                'category_id' => 2
            ],
            [ 'name' => 'Пакеты д/колёс 4 шт.',
                'price' => 100,
                'category_id' => 2
            ],
            [ 'name' => 'Ремонт бескамерного колеса',
                'price' => 250,
                'category_id' => 2
            ],
            [ 'name' => 'Перебортовка колес',
                'price' => 1500,
                'category_id' => 2
            ],
            [ 'name' => 'Мойка двигателя автомобиля',
                'price' => 800,
                'category_id' => 3
            ],
            [ 'name' => 'Мойка мотоцикла',
                'price' => 600,
                'category_id' => 3
            ],
            [ 'name' => 'Протирка стекол изнутри спецсредством',
                'price' => 300,
                'category_id' => 3
            ],
            [ 'name' => 'Чернение шин (4 колеса)',
                'price' => 200,
                'category_id' => 3
            ],
            [ 'name' => 'Чистка багажника пылесосом',
                'price' => 100,
                'category_id' => 3
            ],
            [ 'name' => 'Химчистка багажного отсека',
                'price' => 1500,
                'category_id' => 3
            ],
            [ 'name' => 'Чистка салона пылесосом ',
                'price' => 400,
                'category_id' => 3
            ],
            [ 'name' => 'Комплексная мойка',
                'price' => 800,
                'category_id' => 3
            ],

        ]);
    }
}
