<?php

namespace Database\Seeders;

use App\Models\Income;
use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
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
              'title' => 'Commission',
            ],
            [
              'title' => 'Bank intrest',
            ],
          ];
        
        foreach ($items as $item) {
            $model =  Income::create([
                'title' => $item['title'],
                'price' =>  20000,
            ]);
        }
    }
}
