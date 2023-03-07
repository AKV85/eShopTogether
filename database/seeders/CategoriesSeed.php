<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Mergaiciu rūbai',
                'code' => 'mergaiciu rūbai',
                'description' => 'Rūbai mergaitėms',
                'image' => '/img/categories/category-2.jpg',
            ],
            [
                'name' => 'Berniukų rūbai',
                'code' => 'berniukų rūbai',
                'description' => 'Rūbai berniukams',
                'image' => '/img/categories/category-3.jpg',
            ],
            [
                'name' => 'Suaugusių rūbai',
                'code' => 'suaugusių rūbai',
                'description' => 'Rūbai suaugusiems',
                'image' => '/img/categories/category-4.jpg',
            ],
            [
                'name' => 'Aksesuarai',
                'code' => 'aksesuarai',
                'description' => 'Aksesurai vaikams ir suaugusiems',
                'image' => '/img/categories/category-5.jpg',
            ],
        ];
        foreach ($categories as $cat) {

            Category::updateOrCreate(
                [
                    'name' => $cat['name'],
                    'code' => $cat['code'],
                ],
                [
                    'description' => $cat['description'],
                    'image' => $cat['image'],
                ]
            );
        }
    }
}
