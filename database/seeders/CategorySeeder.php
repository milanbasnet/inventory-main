<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
              'title' => 'Salary/Wage',
            ],
            [
                'title' => 'Office',
            ],
            [
                'title' => 'Production',
            ],
            [
                'title' => 'Others',
            ],
          ];
      
          foreach ($items as $item) {
            $product =  Category::create([
              'title' => $item['title'],
            ]);
          }
    }
}
