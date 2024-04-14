<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Sản phẩm 1',
            'category_id' => 1,
            'image' => 'https://via.placeholder.com/150',
            'price' => 100000,
            'status' => 1,
            'description' => 'Mô tả sản phẩm 1',
        ]);

        Product::create([
            'name' => 'Sản phẩm 2',
            'category_id' => 2,
            'image' => 'https://via.placeholder.com/150',
            'price' => 200000,
            'status' => 0,
            'description' => 'Mô tả sản phẩm 2',
        ]);

        Product::create([
            'name' => 'Sản phẩm 3',
            'category_id' => 1,
            'image' => 'https://via.placeholder.com/150',
            'price' => 200000,
            'status' => 0,
            'description' => 'Mô tả sản phẩm 3',
        ]);

        Product::create([
            'name' => 'Sản phẩm 6',
            'category_id' => 1,
            'image' => 'https://via.placeholder.com/150',
            'price' => 200000,
            'status' => 0,
            'description' => 'Mô tả sản phẩm 3',
        ]);

        Product::create([
            'name' => 'Sản phẩm 4',
            'category_id' => 1,
            'image' => 'https://via.placeholder.com/150',
            'price' => 200000,
            'status' => 0,
            'description' => 'Mô tả sản phẩm 3',
        ]);

        Product::create([
            'name' => 'Sản phẩm 5',
            'category_id' => 1,
            'image' => 'https://via.placeholder.com/150',
            'price' => 200000,
            'status' => 0,
            'description' => 'Mô tả sản phẩm 3',
        ]);
    }
}
