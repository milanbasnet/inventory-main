<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
              'title' => 'Battery',
            ],
            [
              'title' => 'Tyres',
            ],
            [
              'title' => 'Other',
            ],
          ];
      
          foreach ($items as $item) {
            $category =  ProductCategory::create([
              'title' => $item['title'],
            ]);
          }
    }
}
