<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            'name' => 'PayPal',
            'company_name' => 'PayPal Inc.',
            'website' => 'https://www.paypal.com/',
            'help_doc_link' => 'https://www.paypal.com/us/webapps/mpp/express-checkout',
            'description' => 'Add PayPal as a payment method to any checkout with Express Checkout. Express Checkout offers the ease of convenience and security of PayPal, can be set up in minutes and can turn more shoppers into buyers.',
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ]);
        DB::table('payment_methods')->insert([
            'name' => 'Srtip',
            'company_name' => 'Srtip Inc.',
            'website' => 'https://stripe.com/',
            'help_doc_link' => 'https://stripe.com/docs/checkout/tutorial',
            'description' => 'Stripe is the best software platform for running an internet business. We handle billions of dollars every year for forward-thinking businesses around the world.',
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ]);
        DB::table('payment_methods')->insert([
            'name' => 'Bank Wire Transfer',
            'company_name' => 'Pay by bank wire transfer',
            'description' => 'Pay by bank wire transfer,  transfer the invoice amount via wire tranfer to the marchant account and confirm manually. After payment confirmation the goods will be shipped.',
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ]);
        DB::table('payment_methods')->insert([
            'name' => 'COD',
            'company_name' => 'Cash on Delivery',
            'description' => 'Cash on delivery (COD), sometimes called collect on delivery, is the sale of goods by mail order where payment is made on delivery rather than in advance.',
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
		]);
    }
}
