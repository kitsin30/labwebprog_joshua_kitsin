<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'category_id' => 6,
            'name' => 'Hai, Miiko! 34 - Premium (Bonus Cableholder)',
            'genre' => 'buku',
            'description' => 'buku miiko! volume 34',
            'price' => '30000',
            'photo' => '../storage/product/Hai, Miiko! 34 - Premium (Bonus Cableholder).jpeg',
        ]);
    }
}
