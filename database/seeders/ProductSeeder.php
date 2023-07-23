<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        for ($i=13;$i<=20;$i++){
        DB::table('products')->insert(
            [
                'name'=> 'Product'.$i,
                'slug'=>'slug'.$i,
                'price'=>''.$i,
                'status'=>'draft',

            ]
            );
        }
    }
}
