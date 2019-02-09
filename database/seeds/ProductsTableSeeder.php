<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'title' => 'Asscessory',
                'description' => 'Qui porro blanditiis eligendi nulla laboriosam qui nam dolorum.',
                'price' => 123,
                'img' => '/img/item1.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Americal Black Coffee',
                'description' => 'Quas nihil enim et voluptatem ad.',
                'price' => 321,
                'img' => '/img/item2.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Coffee Colombua',
                'description' => 'Voluptatem vel occaecati.',
                'price' => 222,
                'img' => '/img/item3.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
