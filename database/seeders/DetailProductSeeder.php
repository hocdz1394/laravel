<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DetailProduct;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;

class DetailProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $products = Product::all();
        DetailProduct::insert([
            [
                'id_product' => $products->where('name', 'Áo Thun Polo Nam')->first()->id,
                'quantity' => 10,
                'price' => 249000,
                'image_thumbnail1' => 'aothun1.png', 
            ],
            [
                'id_product' => $products->where('name', 'Áo Thun Polo Nam')->first()->id,
                'quantity' => 15,
                'price' => 249000,
                'image_thumbnail1' => 'aothun2.png', 
            ],
            [
                'id_product' => $products->where('name', 'Áo Thun Polo Nam')->first()->id,
                'quantity' => 15,
                'price' => 249000,
                'image_thumbnail1' => 'aothun3.png', 
            ],
            [
                'id_product' => $products->where('name', 'Áo Thun Polo Nam')->first()->id,
                'quantity' => 15,
                'price' => 249000,
                'image_thumbnail1' => 'aothun2.png', 
            ],
        ]);
    }
}
