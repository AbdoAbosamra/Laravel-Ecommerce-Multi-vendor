<?php

namespace Database\Seeders;

use App\Models\Product;
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
        $products =[
            ["name"=>"TV" , "description"=>"BestTV" ,"image"=>"game.png" , 'price'=>"1000"],
            ["name"=>"iPhone" , "description"=>"Best iPhone" ,"image"=>"safe.png" , 'price'=>"999"],
            ["name"=>"Chromecast" , "description"=>"Best Chromecast" ,"image"=>"submarine.png" , 'price'=>"30"],
            ["name"=>"Glasses" , "description"=>"Best Glasses" ,"image"=>"game.png" , 'price'=>"100"]
        ];
        Product::insert($products);
    }
}
