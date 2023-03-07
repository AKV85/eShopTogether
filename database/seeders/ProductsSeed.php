<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Suknelė',
                'slug' => 'suknelė',
                'description' => 'suknelė mergaitei',
                'image' => '/img/products/product-2.jpg',
                'category_id' => 1,
                'price' => 18,
            ],

            [
                'name' => 'Sijonas',
                'slug' => 'sijonas',
                'description' => 'mergaitiškas sijonas',
                'image' => '/img/products/product-3.jpg',
                'category_id' => 2,
                'price' => 10,
            ],

            [
                'name' => 'Komplektukas',
                'slug' => 'komplektukas',
                'description' => 'komplektukas mergaitei',
                'image' => '/img/products/product-4.jpg',
                'category_id' => 3,
                'price' => 20,
            ],
            [
                'name' => 'Komplektukas',
                'slug' => 'komplektukas',
                'description' => 'komplektukas berniukui',
                'image' => '/img/products/product-5.jpg',
                'category_id' => 4,
                'price' => 18,
            ],
            [
                'name' => 'Kelnės',
                'slug' => 'kelnės',
                'description' => 'Kelnės berniukui',
                'image' => '/img/products/product-6.jpg',
                'category_id' => 5,
                'price' => 8,
            ],

            [
                'name' => 'Megstukas',
                'slug' => 'megstukas',
                'description' => 'Megstukas berniukui',
                'image' => '/img/products/product-6.jpg',
                'category_id' => 6,
                'price' => 7,
            ],
            [
                'name' => 'Gumutė',
                'slug' => 'gumutė',
                'description' => 'gumutė su ausytėm',
                'image' => '/img/products/product-6.jpg',
                'category_id' => 7,
                'price' => 5,
            ],

            [
                'name' => 'Sagtukai',
                'slug' => 'sagtukai',
                'description' => 'sagtukai plaukams',
                'image' => '/img/products/product-6.jpg',
                'category_id' => 8,
                'price' => 5,
            ],
            [
                'name' => 'Galvajuostė',
                'slug' => 'galvajuostė',
                'description' => 'Galvajuostė su kaspinėliu',
                'image' => '/img/products/product-6.jpg',
                'category_id' => 9,
                'price' => 8,
            ],
            [
                'name' => 'Striukė',
                'slug' => 'striukė',
                'description' => 'Striukė suaugusiems',
                'image' => '/img/products/product-6.jpg',
                'category_id' => 10,
                'price' => 20,
            ],
            [
                'name' => 'Galvajuostė',
                'slug' => 'galvajuostė',
                'description' => 'Galvajuostė suaugusiems',
                'image' => '/img/products/product-6.jpg',
                'category_id' => 11,
                'price' => 8,
            ],

            [
                'name' => 'Riešinės',
                'slug' => 'riešinės',
                'description' => 'Riešinės suaugusiems',
                'image' => '/img/products/product-6.jpg',
                'category_id' => 8,
                'price' => 8,
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate($product);
        }
    }
}
