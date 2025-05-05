<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'title' => 'Funda para oppo',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, quae.',
            'price' => 100,
            'image' => '4646.webp',
            'badge' => 'TOP 🔝',
            'stock'=> '40',
        ]);

        Product::create([
            'title' => 'Funda para tablet',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, quae.',
            'price' => 200,
            'image' => 'tablet.jpg',
            'badge' => 'HOT 🔥',
            'stock'=> '20'
        ]);

        Product::create([
            'title' => 'Funda para pc',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, quae.',
            'price' => 300,
            'image' => 'laptop.jpg',
            'badge' => '-50% 💸',
            'stock' => 0
        ]);

        Product::create([
            'title' => 'Funda Samsung',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, quae.',
            'price' => 100,
            'image' => 'samsung.jpg',
            'badge' => 'LIMITED',
            'stock' => 12
        ]);

        Product::create([
            'title' => 'Funda iPhone',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, quae.',
            'price' => 200,
            'image' => 'iphone.jpg',
            'badge' => 'LIMITED',
            'stock' => 0
        ]);

        Product::create([
            'title' => 'Funda Xiaomi',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, quae.',
            'price' => 300,
            'image' => 'xiaomi.jpg',
            'badge' => 'LIMITED',
           'stock' => 5
        ]);
    }
}
