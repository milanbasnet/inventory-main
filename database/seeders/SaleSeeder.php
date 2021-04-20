<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      return;
        $items = [
            [
              'title' => 'Raw materials',
            ],
            [
              'title' => 'Electricity',
            ],
          ];
      
          foreach ($items as $item) {
            $product =  Sale::create([
              'customer_id' => $item['1'],
              'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nobis mollitia consequuntur, fugit corporis sapiente, incidunt, provident quae nemo eum quidem! Facere qui voluptas molestias voluptatibus ullam recusandae, perferendis repellat!,',
              'unit'=>'2',
              'price'=>'9000',
              'customer_id'=>'1',
              'product_id'=>1,
            ]);
          }
    }
}
