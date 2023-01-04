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
        DB::table('categories')->insert([
            'name' => 'elektronik'
        ]);
        DB::table('categories')->insert([
            'name' => 'fashion'
        ]);
        DB::table('categories')->insert([
            'name' => 'gaming'
        ]);
        DB::table('categories')->insert([
            'name' => 'kebutuhan sehari-hari'
        ]);
        DB::table('categories')->insert([
            'name' => 'olahraga'
        ]);
        DB::table('categories')->insert([
            'name' => 'buku'
        ]);
        DB::table('categories')->insert([
            'name' => 'film'
        ]);
        DB::table('categories')->insert([
            'name' => 'musik'
        ]);
    }
}
