<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);

        DB::table('users')->insert([
            'name' => 'customer',
            'role' => 'customer',
            'email' => 'customer@mail.com',
            'password' => bcrypt('customer123'),
            'gender' => 'male',
            'dateOfBirth' => '2002-01-02',
            'country' => 'indonesia'
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'role' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin123'),
            'gender' => 'male',
            'dateOfBirth' => '2002-01-02',
            'country' => 'indonesia'
        ]);
    }
}
