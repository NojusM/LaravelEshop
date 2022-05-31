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

        $items = [
            ['title' => 'BTS'],
            ['title' => 'Komiksų personažai'],
            ['title' => 'Žaidimai'],
            ['title' => 'Funku POP'],
            ['title' => 'K POP'],
            ['title' => 'Plakatai'],
            ['title' => 'Žaidimai'],
            ['title' => 'Marvel'],
            ['title' => 'DC Comics'],
            ['title' => 'Ramenai'],
            ['title' => 'Saldumynai'],
            ['title' => 'Arbata'],
            ['title' => 'Gėrimai'],
            ['title' => 'Pliušiniai']
        ];
        foreach ($items as $item) {
            DB::table('types')->insert($item);
        }
    }
}
