<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
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
            'name' => 'Amin',
          ],
          [
            'name' => 'Sushan',
          ],
          [
            'name' => 'Manish',
          ],
        
          [
            'name' => 'Sujan',
          ],
          
          [
            'name' => 'Mukesh',
          ],
        ];
      
          foreach ($items as $item) {
            $customer =  Customer::create([
              'name' => $item['name'],
              'email' => 'email@example.com',
              'phone' => '986566512',
              'address' => 'New road kathmandu',
            ]);
          }
    }
}
