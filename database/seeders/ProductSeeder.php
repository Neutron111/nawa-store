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
        for ($i=1;$i<=10;$i++){
        DB::table('products')->insert(
            [
                'name'=> 'Product'.$i,
                'slug'=>'slug'.$i,
                'created_at'=>now(),
                
            ]
            );
        }
    }
}
