<?php
use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'public' => 1,
    ];
});

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'shop_id' => rand(0,1) == 1 ? rand(1, 30) : Null,
        'role_id' => $faker->randomElement(\DB::table('roles')->where('id', '!=', 1)->pluck('id')->toArray()),
    	'nice_name' => $faker->lastName,
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(123456),
        'dob' => $faker->date,
        'sex' => $faker->randomElement(['Male', 'Female']),
        'description' => $faker->text(500),
        'active' => $faker->boolean,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'nice_name' => $faker->lastName,
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(123456),
        'dob' => $faker->date,
        'sex' => $faker->randomElement(['Male', 'Female', 'Other']),
        'description' => $faker->text(500),
        'active' => $faker->boolean,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Shop::class, function (Faker $faker) {
    return [
        'owner_id' => $faker->randomElement(\DB::table('users')->where('role_id', 3)->pluck('id')->toArray()),
        'name' => $faker->unique->company,
        'legal_name' => $faker->unique->company,
        'email' => $faker->email,
        'currency_id' => $faker->randomElement(\DB::table('currencies')->pluck('id')->toArray()),
        'description' => $faker->text(500),
        'active' => $faker->boolean,
    ];
});

$factory->define(App\Setting::class, function (Faker $faker) {
    return [
        'display_name' => $faker->company,
        'support_email' => $faker->email,
        'support_phone' => $faker->phoneNumber,
        'support_phone_toll_free' => $faker->boolean ? $faker->tollFreePhoneNumber : NULL,
        'slug' => $faker->slug,
        'external_url' => $faker->url,
        'time_zone' => $faker->timezone,
        'order_number_prefix' => '#',
        'default_tax_id_for_inventory' => rand(1, 5),
        'default_tax_id_for_order' => rand(1, 5),
        'default_carrier_id' => rand(1, 5),
        'default_packaging_id' => rand(1, 5),
        'flat_shipping_cost' => $faker->randomDigit,
        'order_handling_cost' => $faker->randomDigit,
        'free_shipping_starts' => $faker->randomDigit,
        'maintenance_mode' => $faker->boolean,
    ];
});

$factory->define(App\CategoryGroup::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->text(500),
        'active' => $faker->boolean,
    ];
});

$factory->define(App\CategorySubGroup::class, function (Faker $faker) {
    return [
        'category_group_id' => $faker->randomElement(\DB::table('category_groups')->pluck('id')->toArray()),
        'name' => $faker->company,
        'description' => $faker->text(500),
        'active' => $faker->boolean,
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->unique->company,
        'slug' => $faker->slug,
        'description' => $faker->text(500),
        'active' => $faker->boolean,
    ];
});

$factory->define(App\AttributeValue::class, function (Faker $faker) {
    return [
        'shop_id' => rand(1, 30),
        'value' => $faker->word,
        'color' => $faker->hexcolor,
        'attribute_id' => $faker->randomElement(\DB::table('attributes')->pluck('id')->toArray()),
        'order' => $faker->randomDigit,
    ];
});


$factory->define(App\Manufacturer::class, function (Faker $faker) {
    return [
        'shop_id' => rand(1, 30),
        'name' => $faker->unique->company,
        'email' => $faker->unique->email,
        'url' => $faker->unique->url,
        'phone' => $faker->phoneNumber,
        'country_id' => $faker->randomElement(\DB::table('countries')->pluck('id')->toArray()),
        'description' => $faker->text(500),
        'active' => $faker->boolean,
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'shop_id' => rand(0, 1) ? rand(1, 5) : Null,
        'manufacturer_id' => $faker->randomElement(\DB::table('manufacturers')->pluck('id')->toArray()),
        'brand' => $faker->word,
        'name' => $faker->unique->company,
        'model_number' => $faker->word .' '.$faker->bothify('??###'),
        'mpn' => $faker->randomNumber(),
        'gtin' => $faker->ean13,
        'gtin_type' => $faker->randomElement(\DB::table('gtin_types')->pluck('name')->toArray()),
        'description' => $faker->text(1500),
        'origin_country' => $faker->randomElement(\DB::table('countries')->pluck('id')->toArray()),
        'has_variant' => $faker->boolean,
        'slug' => $faker->slug,
    	'meta_title' => $faker->sentence,
    	'meta_description' => $faker->realText,
    	'sale_count' => $faker->randomDigit,
        'active' => $faker->boolean,
    ];
});

$factory->define(App\Warehouse::class, function (Faker $faker) {
    return [
        'shop_id' => rand(1, 30),
        'incharge' => $faker->randomElement(\DB::table('users')->pluck('id')->toArray()),
        'name' => $faker->company,
        'email' => $faker->email,
        'description' => $faker->text(500),
        'active' => $faker->boolean,
    ];
});

$factory->define(App\Supplier::class, function (Faker $faker) {
    return [
        'shop_id' => rand(1, 30),
        'name' => $faker->company,
        'email' => $faker->email,
        'contact_person' => $faker->name,
        'url' => $faker->url,
        'description' => $faker->text(500),
        'active' => $faker->boolean,
    ];
});

$factory->define(App\Tax::class, function (Faker $faker) {
    $num = $faker->randomFloat($nbMaxDecimals = NULL, $min = 2, $max = 9);
    $country_id = $faker->randomElement(\DB::table('countries')->pluck('id')->toArray());
    $state_id = $faker->randomElement(\DB::table('states')->where('country_id', $country_id)->pluck('id')->toArray());

    return [
        'shop_id' => rand(1, 30),
        'name' => $faker->word . ' ' . round($num, 2) . '%',
        'country_id' => $country_id,
        'state_id' => $state_id,
        'taxrate' => $num,
        'active' => $faker->boolean,
    ];
});

$factory->define(App\Carrier::class, function (Faker $faker) {
    return [
        'shop_id' => rand(1, 30),
        'tax_id' => $faker->randomElement(\DB::table('taxes')->pluck('id')->toArray()),
        'name' => $faker->company,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'std_delivery_time' => rand(1,10),
        'flat_shipping_cost' => rand(5,100),
        'max_width' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 50),
        'max_height' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 100),
        'max_depth' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 40),
        'max_weight' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 20),
        'is_free' => $faker->boolean,
        'handling_cost' => $faker->boolean,
        'tracking_url' => $faker->url.'/@',
        'active' => $faker->boolean,
    ];
});

$factory->define(App\Packaging::class, function (Faker $faker) {
    return [
        'shop_id' => rand(1, 30),
        'name' => $faker->word,
        'cost' => rand(1,20),
        'charge_customer' => 1,
    ];
});

$factory->define(App\Inventory::class, function (Faker $faker) {
    $num = $faker->randomFloat($nbMaxDecimals = NULL, $min = 100, $max = 400);
    return [
        'shop_id' => rand(1, 30),
        'sku' => $faker->word,
        'condition' => 'New',
        'condition_note' => $faker->realText,
        'description' => $faker->text(1500),
        'stock_quantity' => rand(9,99),
        'damaged_quantity' => 0,
        'product_id' => $faker->randomElement(\DB::table('products')->pluck('id')->toArray()),
        'supplier_id' => $faker->randomElement(\DB::table('suppliers')->pluck('id')->toArray()),
        'tax_id' => $faker->randomElement(\DB::table('taxes')->pluck('id')->toArray()),
        'user_id' => $faker->randomElement(\DB::table('users')->pluck('id')->toArray()),
        'purchase_price' => $num,
        'sale_price' => $num+15,
        'available_from' => $faker->date,
        'min_order_quantity' => 1,
        'active' => $faker->boolean,
    ];
});

$factory->define(App\Order::class, function (Faker $faker) {
    $num = $faker->randomFloat($nbMaxDecimals = NULL, $min = 100, $max = 400);
    $num1 = $faker->randomFloat($nbMaxDecimals = NULL, $min = 100, $max = 400);
    $num2 = rand(1,9);
    return [
        'shop_id' => rand(1, 30),
        'order_number' => get_formated_order_number(),
        'customer_id' => $faker->randomElement(\DB::table('customers')->pluck('id')->toArray()),
        'carrier_id' => $faker->randomElement(\DB::table('carriers')->pluck('id')->toArray()),
        'packaging_id' => $faker->randomElement(\DB::table('packagings')->pluck('id')->toArray()),
        'tax_id' => $faker->randomElement(\DB::table('taxes')->pluck('id')->toArray()),
        'item_count' => $num2,
        'quantity' => $num2,
        'total' => $num,
        'shipping' => $num2,
        'grand_total' => $num2 + $num,
        'billing_address' => $faker->address(),
        'shipping_address' => $faker->address(),
        'payment_method_id' => $faker->randomElement(\DB::table('payment_methods')->pluck('id')->toArray()),
        'payment_status_id' => rand(1, 3),
        'order_status_id' => rand(1, 3),
    ];
});

$factory->define(App\Blog::class, function (Faker $faker) {
    return [
    	'title' => $faker->realText,
        'slug' => $faker->slug,
        'excerpt' => $faker->sentence,
        'content' => $faker->paragraph(10),
        'user_id' => $faker->randomElement(\DB::table('users')->pluck('id')->toArray()),
    ];
});

$factory->define(App\BlogComment::class, function (Faker $faker) {
    return [
        'blog_id' => $faker->randomElement(\DB::table('blogs')->pluck('id')->toArray()),
        'content' => $faker->paragraph,
        'user_id' => $faker->randomElement(\DB::table('users')->pluck('id')->toArray()),
        'approved' => $faker->boolean,
    ];
});

$factory->define(App\GiftCard::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->text(1500),
        'value' => rand(9,99),
        'serial_number' => $faker->unique->randomNumber(),
        'pin_code' => $faker->unique->randomNumber(),
        // 'activation_time' => $faker->dateTimeBetween('-2 days', '+2 weeks')->format('Y-m-d H:i:s'),
        // 'expiry_time' => $faker->dateTimeBetween('+3 weeks', '+3 months')->format('Y-m-d H:i:s'),
        'partial_use' => $faker->boolean,
        'exclude_offer_items' => $faker->boolean,
        'exclude_tax_n_shipping' => $faker->boolean,
        'active' => $faker->boolean,
    ];
});

$factory->define(App\Coupon::class, function (Faker $faker) {
    return [
        'shop_id' => rand(1, 30),
        'name' => $faker->word,
        'code' => $faker->unique->randomNumber(),
        'description' => $faker->text(1500),
        'value' => rand(9, 99),
        'type' => $faker->randomElement(['amount', 'percent']),
        'quantity' => rand(1, 100),
        'quantity_per_customer' => rand(1, 5),
        // 'starting_time' => $faker->dateTimeBetween('-2 days', '+2 weeks')->format('Y-m-d H:i:s'),
        // 'ending_time' => $faker->dateTimeBetween('+3 weeks', '+3 months')->format('Y-m-d H:i:s'),
        'partial_use' => $faker->boolean,
        'exclude_offer_items' => $faker->boolean,
        'exclude_tax_n_shipping' => $faker->boolean,
        'active' => $faker->boolean,
    ];
});

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'shop_id' => $faker->randomElement(\DB::table('shops')->pluck('id')->toArray()),
        'customer_id' => $faker->randomElement(\DB::table('customers')->pluck('id')->toArray()),
        'subject' => $faker->sentence,
        'message' => $faker->paragraph,
        'status' => rand(1, 3),
        'label' => rand(1, 5),
    ];
});

$factory->define(App\Ticket::class, function (Faker $faker) {
    return [
        'shop_id' => $faker->randomElement(\DB::table('shops')->pluck('id')->toArray()),
        'user_id' => $faker->randomElement(\DB::table('users')->pluck('id')->toArray()),
        'category_id' => $faker->randomElement(\DB::table('ticket_categories')->pluck('id')->toArray()),
        'subject' => $faker->sentence,
        'message' => $faker->paragraph,
        'status' => rand(1, 6),
        'priority' => rand(1, 4),
    ];
});

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement(\DB::table('users')->pluck('id')->toArray()),
        'reply' => $faker->paragraph,
        'read' => $faker->boolean,
        'repliable_id' => rand(1, 15),
        'repliable_type' => rand(0, 1) == 1 ? 'App\Ticket' : 'App\Message',
    ];
});

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Address::class, function (Faker $faker)
{
    $country_id = $faker->randomElement(\DB::table('countries')->pluck('id')->toArray());
    $state_id = $faker->randomElement(\DB::table('states')->where('country_id', $country_id)->pluck('id')->toArray());

    return [
        'address_title' => $faker->randomElement(['Home Address', 'Office Address', 'Hotel Address', 'Dorm Address']),
        'address_line_1' => $faker->streetAddress,
        'address_line_2' => $faker->streetName,
        'city' => $faker->city,
        'state_id' => $state_id,
        'zip_code' => $faker->postcode,
        'country_id' => $country_id,
        'phone' => $faker->phoneNumber,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
    ];
});

