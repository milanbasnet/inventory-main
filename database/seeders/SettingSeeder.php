<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['title'=>'name','value'=>'Inventory'],
            ['title'=>'phone','value'=>'9886344783'],
            ['title'=>'email','value'=>'info@example.com'],
            ['title'=>'address','value'=>'Newroad, Kathmandu'],
            ['title'=>'logo','value'=>'/img/1.png'],
        ];
        
        foreach($items as $item){
            Setting::create([
                'title'=>$item['title'],
                'value'=>$item['value'],
            ]);
        } 
    }
}
