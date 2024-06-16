<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Áo',
                'slug' => 'ao'
            ],
            [
                'name' => 'Quần',
                'slug' => 'quan'
            ],
            [
                'name' => 'Giày',
                'slug' => 'giay'
            ],
            [
                'name' => 'Phụ kiện',
                'slug' => 'phu-kien'
            ]
        ];

        foreach ($categories as $categoy) {
            Category::create($categoy);
        }
    }
}