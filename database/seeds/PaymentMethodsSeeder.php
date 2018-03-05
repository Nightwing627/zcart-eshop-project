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
            'name' => 'PayPal Express Checkout',
            'code' => 'paypal-express',
            'type' => 1,
            'company_name' => 'PayPal Inc.',
            'website' => 'https://www.paypal.com/',
            'help_doc_link' => 'https://www.paypal.com/us/webapps/mpp/express-checkout',
            'description' => 'Add PayPal as a payment method to any checkout with Express Checkout. Express Checkout offers the ease of convenience and security of PayPal, can be set up in minutes and can turn more shoppers into buyers. You must have a PayPal business account to activate this payment method. - You must have a PayPal business account.<br/><strong>To activate PayPal Express: </strong><br/>- You must have a PayPal business account to accept payments.<br/>- Create an app to receive REST API credentials for testing and live transactions.',
            'admin_description' => 'Add PayPal as a payment method to any checkout with Express Checkout. Express Checkout offers the ease of convenience and security of PayPal, can be set up in minutes and can turn more shoppers into buyers.',
            'admin_help_doc_link' => 'https://developer.paypal.com/docs/integration/direct/express-checkout/integration-jsv4/',
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ]);
        DB::table('payment_methods')->insert([
            'name' => 'Stripe',
            'code' => 'stripe',
            'type' => 2,
            'company_name' => 'Stripe Inc.',
            'website' => 'https://stripe.com/',
            'help_doc_link' => 'https://stripe.com/docs/checkout/tutorial',
            'description' => 'Stripe is one of the best and safe option to charge credit and debit cards around the world. Stripe has a simple fee structure and no hidden costs. No other gateway or merchant account is required. <br/><strong>By using Stripe: </strong><br/>- You have to connect our platform to your Stripe account. <br/>- You agree to Stripe\'s <a href="https://stripe.com/us/privacy" target="_blank">Terms of Service</a>.',
            'admin_description' => 'Stripe is one of the best and safe option to charge credit and debit cards around the world. To enable Stripe you must have to regiter your platform to use the full Stripe API on behalf of vendors. <a href="https://stripe.com/docs/connect/quickstart" target="_blank">Check their documentation for help.</a><br/><br/><strong>Remember </strong> when you register your platform use this information: <br/>- Name: \'' . get_platform_title() . '\'<br/>- Website URL: \'' . route('homepage') . '\'<br/>- Redirect URL: \'' . route('admin.setting.stripe.redirect') .'\'',
            'admin_help_doc_link' => 'https://stripe.com/docs/connect/quickstart',
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ]);
        DB::table('payment_methods')->insert([
            'name' => 'Bank Wire Transfer',
            'code' => 'wire',
            'type' => 3,
            'company_name' => 'Pay by bank wire transfer',
            'description' => 'Pay by bank wire transfer,  transfer the invoice amount via wire tranfer to the merchant account and confirm manually. After payment confirmation the goods will be shipped.',
            'admin_description' => 'Pay by bank wire transfer,  transfer the invoice amount via wire tranfer to the merchant account and confirm manually. After payment confirmation the goods will be shipped.',
            'admin_help_doc_link' => '',
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ]);
        DB::table('payment_methods')->insert([
            'name' => 'Cash On Delivery',
            'code' => 'cod',
            'type' => 3,
            'company_name' => 'Cash on Delivery',
            'description' => 'Cash on delivery (COD), sometimes called collect on delivery, is the sale of goods by mail order where payment is made on delivery rather than in advance.',
            'admin_description' => 'Cash on delivery (COD), sometimes called collect on delivery, is the sale of goods by mail order where payment is made on delivery rather than in advance.',
            'admin_help_doc_link' => '',
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
		]);
    }
}
