<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            ['name' => 'Волга',
                'mark_id' => 2],
            ['name' => 'Газель Некст Электро',
                'mark_id' => 2],
            ['name' => 'Вепрь Некст',
                'mark_id' => 2],
            ['name' => 'Вектор Некст',
                'mark_id' => 2],
            ['name' => 'Валдай',
                'mark_id' => 2],
            ['name' => 'Садко Некст',
                'mark_id' => 2],
            ['name' => 'Газель Некст ЦМФ',
                'mark_id' => 2],
            ['name' => 'Соболь',
                'mark_id' => 2],
            ['name' => 'Газон Некст',
                'mark_id' => 2],
            ['name' => 'Газель Некст Ситилайн',
                'mark_id' => 2],
            ['name' => 'Газель Некст',
                'mark_id' => 2],
            ['name' => 'Газель Сити',
                'mark_id' => 2],
            ['name' => 'Газель',
                'mark_id' => 2],
        ]);
    }
}
