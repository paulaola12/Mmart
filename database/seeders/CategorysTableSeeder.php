<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorys')->insert([
            'category' => "Mens clothing",
        ],
        [
            'category' => "Womens clothing",
        ],
        [
            'category' => "kids clothing",
        ],
        [
            'category' => "shoes",
        ],
        [
            'category' => "Accesories",
        ],
        [
            'category' => "Bags and Backpacks",
        ],
        [
            'category' => "Jewelry",
        ]);
    }
}
