<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Categorías principales
        $categories = [
            [
                'name' => 'Electrónica',
                'slug' => 'electronica',
                'description' => 'Productos electrónicos y tecnológicos',
                'subcategories' => [
                    [
                        'name' => 'Smartphones',
                        'slug' => 'smartphones',
                        'description' => 'Teléfonos móviles inteligentes',
                        'products' => [
                            [
                                'title' => 'iPhone 15 Pro',
                                'description' => 'Último modelo de iPhone con características premium',
                                'price' => 999.99,
                                'image' => 'iphone15.jpg',
                                'stock' => 50
                            ],
                            [
                                'title' => 'Samsung Galaxy S23',
                                'description' => 'Flagship de Samsung con cámara avanzada',
                                'price' => 899.99,
                                'image' => 'galaxy-s23.jpg',
                                'stock' => 45
                            ]
                        ]
                    ],
                    [
                        'name' => 'Portátiles',
                        'slug' => 'portatiles',
                        'description' => 'Ordenadores portátiles',
                        'products' => [
                            [
                                'title' => 'MacBook Pro M2',
                                'description' => 'Portátil Apple con chip M2',
                                'price' => 1299.99,
                                'image' => 'macbook-pro.jpg',
                                'stock' => 30
                            ]
                        ]
                    ]
                ]
            ],
            [
                'name' => 'Accesorios',
                'slug' => 'accesorios',
                'description' => 'Accesorios para dispositivos',
                'subcategories' => [
                    [
                        'name' => 'Fundas',
                        'slug' => 'fundas',
                        'description' => 'Fundas protectoras para dispositivos',
                        'products' => [
                            [
                                'title' => 'Funda iPhone 15 Pro',
                                'description' => 'Funda de silicona premium',
                                'price' => 29.99,
                                'image' => 'funda-iphone.jpg',
                                'stock' => 100
                            ]
                        ]
                    ],
                    [
                        'name' => 'Cargadores',
                        'slug' => 'cargadores',
                        'description' => 'Cargadores y cables de alimentación',
                        'products' => [
                            [
                                'title' => 'Cargador USB-C 20W',
                                'description' => 'Cargador rápido compatible',
                                'price' => 19.99,
                                'image' => 'cargador-usb-c.jpg',
                                'stock' => 150
                            ]
                        ]
                    ]
                ]
            ]
        ];

        foreach ($categories as $categoryData) {
            $subcategories = $categoryData['subcategories'];
            unset($categoryData['subcategories']);

            // Insertar categoría
            $categoryId = DB::table('categories')->insertGetId($categoryData);

            // Insertar subcategorías y productos
            foreach ($subcategories as $subcategoryData) {
                $products = $subcategoryData['products'];
                unset($subcategoryData['products']);

                $subcategoryData['category_id'] = $categoryId;
                $subcategoryId = DB::table('subcategories')->insertGetId($subcategoryData);

                // Insertar productos
                foreach ($products as $product) {
                    $product['subcategory_id'] = $subcategoryId;
                    DB::table('products')->insert($product);
                }
            }
        }
    }
}