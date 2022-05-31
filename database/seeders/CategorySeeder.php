<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['title' => 'Kolekcinės figūrėlės'],
            ['title' => 'Atributika ir Aksesuarai'],
            ['title' => 'Puodeliai'],
            ['title' => 'Rytų virtuvė']
        ];
        foreach ($items as $item) {
            DB::table('categories')->insert($item);
        }
    }
}
