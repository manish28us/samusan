<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            'name' => 'Testing Product 1',
            'price' => '1100.00',
            'description' => 'This is the demo product for sale.',
        ]);
    }
}
