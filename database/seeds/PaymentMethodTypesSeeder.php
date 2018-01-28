<?php

use Illuminate\Database\Seeder;

class PaymentMethodTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_method_types')->insert([
            [
                'type' => 'PayPal',
                'description' => 'Offer customers the most convenient payment option. Accept PayPal as an additional payment method using a “Checkout with PayPal” button.',
            ], [
                'type' => 'Accept credit cards',
                'description' => 'Accept credit card payments on checkout. This can be offered with other payment solutions such as PayPal Express Checkout.',
            ], [
                'type' => 'Manual payment',
                'description' => 'Offer customers offline payment options with instructions to pay outside of your online store.',
            ]
        ]);
    }
}
