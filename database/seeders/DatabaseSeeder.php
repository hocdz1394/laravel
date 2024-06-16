<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Color;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // CategoriesSeeder::class,
            ProductSeeder::class,
            DetailProductSeeder::class
        ]);
    }
}