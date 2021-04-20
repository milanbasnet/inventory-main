<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
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
              'title' => 'Excide battery',
            ],
            [
              'title' => 'Charger',
            ],
            [
              'title' => 'Book',
            ],
              
          ];
      
          foreach ($items as $item) {
            $product =  Product::create([
              'product_category_id'=>1,
              'title' => $item['title'],
              'cost_price'=>'5000',
              'price'=>'5100',
              'qty'=>'100',
              'type'=>'fixed',
              'margin'=>'100',
              'tax_type'=>'included',
              'minimum'=>'10',
              'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. ex.'
            ]);
          }
    }
}
