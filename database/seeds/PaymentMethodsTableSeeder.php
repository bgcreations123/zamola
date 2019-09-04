<?php

use Illuminate\Database\Seeder;
use App\Payment_method;

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $methods = [
            ['name' => 'Credit Card Payment'],
            ['name' => 'Online Payment'],
            ['name' => 'Mobile Money'],
            ['name' => 'Cash On Delivery'],
        ];

        Payment_method::insert($methods);
    }
}
