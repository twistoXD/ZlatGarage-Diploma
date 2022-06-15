<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarkSeeder extends Seeder
{

    public function run()
    {
        DB::table('marks')->insert([
            ['name' => 'ГАЗ']
        ]);
    }
}
