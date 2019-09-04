<?php

use Illuminate\Database\Seeder;
use App\Shipment_category;

class ShipmentCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Accessory (No Battery)'],
            ['name' => 'Accessory (With Battery)'],
            ['name' => 'Audio Visual'],
            ['name' => 'Bags and Luggage'],
            ['name' => 'Books & Collections'],
            ['name' => 'Cameras'],
            ['name' => 'Computers & Laptops'],
            ['name' => 'Documents'],
            ['name' => 'Dry Foods & Supplements'],
            ['name' => 'Earth & Agricultural products'],
            ['name' => 'Fashion'],
            ['name' => 'Gym & Gaming Equipment'],
            ['name' => 'Health & Beauty'],
            ['name' => 'Home Appliances'],
            ['name' => 'Home Decor'],
            ['name' => 'Jewelry'],
            ['name' => 'Mobile Phones & Accessories'],
            ['name' => 'Pet & Accessories'],
            ['name' => 'Sport & Leisure'],
            ['name' => 'Tablets'],
            ['name' => 'Toys'],
            ['name' => 'Watches'],
        ];

        Shipment_category::insert($categories);
    }
}
