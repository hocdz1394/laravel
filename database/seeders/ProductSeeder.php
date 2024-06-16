<?php

namespace Database\Seeders;

use App\Models\DetailProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy danh sách danh mục, màu sắc, kích thước (đảm bảo đã seed trước)
        $categories = Category::all();

        Product::insert([
            [
                'name' => 'Áo Thun Polo Nam',
                'image' => 'ao_thun_polo.jpg',
                'slug' => 'ao-thun-polo-nam',
                'regular_price' => 299000,
                'sale_price' => 249000,
                'quantity' => 50, // Tổng số lượng tất cả các biến thể
                'gender' => 'male',
                'description' => 'Áo thun polo nam chất liệu cotton cao cấp, thoáng mát, thấm hút mồ hôi tốt.',
                'flash_sale' => 1,
                'features' => 1,
                'id_categories' => $categories->where('name', 'Áo')->first()->id,
            ],
        ]);
    }
}