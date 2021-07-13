<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Product::create([
            "name"=>"thirdProduct",
            "price"=>25.2,
            "category"=>"phone",
            "description"=>"good third smartphone",
            "gallery"=>"https://cdn.mos.cms.futurecdn.net/GdcaWSadcCWbt3am8Typ3E.jpg"
        ]);
    }
}
