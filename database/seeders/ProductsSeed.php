<?php

namespace Database\Seeders;

use App\Models\Product;
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
                'code' => 'suknelė',
                'description' => 'suknelė mergaitei',
                'image' => '/img/products/product-2.jpg',
                'category_id' => 1,
                'price' => 18,
            ],

            [
                'name' => 'Sijonas',
                'code' => 'sijonas',
                'description' => 'mergaitiškas sijonas',
                'image' => '/img/products/product-3.jpg',
                'category_id' => 1,
                'price' => 10,
            ],

            [
                'name' => 'Komplektukas',
                'code' => 'komplektukas',
                'description' => 'komplektukas mergaitei',
                'image' => '/img/products/product-4.jpg',
                'category_id' => 1,
                'price' => 20,
            ],
            [
                'name' => 'Komplektukas',
                'code' => 'komplektukas',
                'description' => 'komplektukas berniukui',
                'image' => '/img/products/product-5.jpg',
                'category_id' => 2,
                'price' => 18,
            ],
            [
                'name' => 'Kelnės',
                'code' => 'kelnės',
                'description' => 'Kelnės berniukui',
                'image' => '/img/products/product-6.jpg',
                'category_id' => 2,
                'price' => 8,
            ],
            [
                'name' => 'Megstukas',
                'code' => 'megstukas',
                'description' => 'Megstukas berniukui',
                'image' => '/img/products/product-6.jpg',
                'category_id' => 2,
                'price' => 7,
            ],
            [
                'name' => 'Striukė',
                'code' => 'striukė',
                'description' => 'Striukė suaugusiems',
                'image' => '/img/products/product-6.jpg',
                'category_id' => 3,
                'price' => 20,
            ],
            [
                'name' => 'Galvajuostė',
                'code' => 'galvajuostė',
                'description' => 'Galvajuostė suaugusiems',
                'image' => '/img/products/product-6.jpg',
                'category_id' => 3,
                'price' => 8,
            ],

            [
                'name' => 'Riešinės',
                'code' => 'riešinės',
                'description' => 'Riešinės suaugusiems',
                'image' => '/img/products/product-6.jpg',
                'category_id' => 3,
                'price' => 8,
            ],

            [
                'name' => 'Gumutė',
                'code' => 'gumutė',
                'description' => 'gumutė su ausytėm',
                'image' => '/img/products/product-6.jpg',
                'category_id' => 4,
                'price' => 5,
            ],

            [
                'name' => 'Sagtukai',
                'code' => 'sagtukai',
                'description' => 'sagtukai plaukams',
                'image' => '/img/products/product-6.jpg',
                'category_id' => 4,
                'price' => 5,
            ],
            [
                'name' => 'Galvajuostė',
                'code' => 'galvajuostė',
                'description' => 'Galvajuostė su kaspinėliu',
                'image' => '/img/products/product-6.jpg',
                'category_id' => 4,
                'price' => 8,
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate($product);
        }
    }
}
