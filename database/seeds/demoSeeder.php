<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class demoSeeder extends Seeder
{
    private $tinycount = 5;
    private $count = 15;
    private $longCount = 30;
    private $longLongCount = 50;
    private $veryLongCount = 150;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Role::class, $this->tinycount)->create();

        factory(App\User::class, 1)
            ->create([
                'id' => 2,
                'shop_id' => Null,
                'role_id' => \App\Role::ADMIN,
                'nice_name' => 'Admin',
                'name' => 'Admin User',
                'email' => 'admin@demo.com',
                'password' => bcrypt('123456'),
                'active' => 1,
            ])
            ->each(function($user){
                $user->dashboard()->save(factory(App\Dashboard::class)->make());

                $user->addresses()->save(
                    factory(App\Address::class)->make(['address_title' => $user->name, 'address_type' => 'Primary'])
                );
            });

        factory(App\Merchant::class, 1)
            ->create([
                'id' => 3,
                'shop_id' => 1,
                'role_id' => \App\Role::MERCHANT,
                'nice_name' => 'Merchant',
                'name' => 'Merchant User',
                'email' => 'merchant@demo.com',
                'password' => bcrypt('123456'),
                'active' => 1,
            ])
            ->each(function($merchant){
                $merchant->dashboard()->save(factory(App\Dashboard::class)->make());

                $merchant->addresses()->save(
                    factory(App\Address::class)->make(['address_title' => $merchant->name, 'address_type' => 'Primary'])
                );
            });

        $this->call('ShopsSeeder');

        // Demo customers with real text
        // DB::table('customers')->insert([
        //     [
        //         'id' => 1,
        //         'nice_name' => 'CustomerOne',
        //         'name' => 'Customer One',
        //         'email' => 'customer1@demo.com',
        //         'sex' => 'app.male',
        //         'password' => bcrypt('123456'),
        //         'active' => 1,
        //         'created_at' => Carbon::Now(),
        //         'updated_at' => Carbon::Now(),
        //     ]
        // ]);
        // DB::table('addresses')->insert([
        //     [
        //         'address_type' => 'Primary',
        //         'addressable_type' => 'App\Customer',
        //         'addressable_id' => 1,
        //         'address_title' => 'Customer One',
        //         'state_id' => 1221,
        //         'country_id' => 840,
        //         'created_at' => Carbon::Now(),
        //         'updated_at' => Carbon::Now(),
        //     ],[
        //         'address_type' => 'Shipping',
        //         'addressable_type' => 'App\Customer',
        //         'addressable_id' => 1,
        //         'address_title' => 'Customer One',
        //         'state_id' => 1221,
        //         'country_id' => 840,
        //         'created_at' => Carbon::Now(),
        //         'updated_at' => Carbon::Now(),
        //     ],[
        //         'address_type' => 'Billing',
        //         'addressable_type' => 'App\Customer',
        //         'addressable_id' => 1,
        //         'address_title' => 'Billing Address',
        //         'state_id' => 1221,
        //         'country_id' => 840,
        //         'created_at' => Carbon::Now(),
        //         'updated_at' => Carbon::Now(),
        //     ]
        // ]);

        factory(App\Customer::class, 1)
            ->create([
                'nice_name' => 'CustomerOne',
                'name' => 'Customer One',
                'email' => 'customer1@demo.com',
                'password' => bcrypt('123456'),
                'sex' => 'app.male',
                'active' => 1,
            ])
            ->each(function($customer){
                $customer->addresses()->save(factory(App\Address::class)->make(['address_title' => $customer->name, 'address_type' => 'Primary']));
                $customer->addresses()->save(factory(App\Address::class)->make(['address_type' => 'Billing']));
                $customer->addresses()->save(factory(App\Address::class)->make(['address_type' => 'Shipping']));
            });

        $this->call('CategoriesSeeder');

        factory(App\Manufacturer::class, $this->tinycount)->create();

        factory(App\Supplier::class, $this->tinycount)
            ->create()
            ->each(function($supplier){
                $supplier->addresses()->save(factory(App\Address::class)->make(['address_title' => $supplier->name, 'address_type' => 'Primary']));
            });

        factory(App\Product::class, $this->longCount)->create();

        // factory(App\Shop::class, $this->count)
        //     ->create()
        //     ->each(function($shop){
        //         $shop->addresses()->save(factory(App\Address::class)->make(['address_title' => $shop->name, 'address_type' => 'Primary']));
        //         $shop->config()->save(factory(App\Config::class)->make());
        //         $shop->shippingZones()->save(factory(App\ShippingZone::class)->make());
        //         $shop->shippingZones()->create(
        //             [
        //                 'name' => 'Worldwide',
        //                 'tax_id' => rand(1, 31),
        //                 'country_ids' => [],
        //                 'state_ids' => [],
        //                 'rest_of_the_world' => true,
        //                 'created_at' => Carbon::Now(),
        //                 'updated_at' => Carbon::Now(),
        //             ]
        //         );
        //     });

        $this->call('SlidersSeeder');

        // Demo Categories with real text
        DB::table('category_groups')->insert([
            [
                'name' => 'Home & Garden',
                'description' => 'Cookware, Dining, Bath, Home Decor and more',
                'icon' => 'fa-home',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Electronics',
                'description' => 'Mobile, Computer, Tablet, Camera etc',
                'icon' => 'fa-plug',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Kids and Toy',
                'description' => 'Toys, Footwear etc',
                'icon' => 'fa-gamepad',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Clothing and Shoes',
                'description' => 'Shoes, Clothing, Life style items',
                'icon' => 'fa-tags',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Beauty and Health',
                'description' => 'Cosmetics, Foods and more.',
                'icon' => 'fa-leaf',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Sports',
                'description' => 'Cycle, Tennis, Boxing, Cricket and more.',
                'icon' => 'fa-futbol-o',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Jewelry',
                'description' => 'Necklances, Rings, Pendants and more.',
                'icon' => 'fa-diamond',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Pets',
                'description' => 'Pet foods and supplies.',
                'icon' => 'fa-paw',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Hobbies & DIY',
                'description' => 'Craft Sewing, Supplies and more.',
                'icon' => 'fa-bicycle',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]
        ]);

        DB::table('category_sub_groups')->insert([
            [
                'category_group_id' => 1,
                'name' => 'Mobile & Accessories',
                // 'description' => 'Cell Phones and Accessories',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'category_group_id' => 1,
                'name' => 'Computer & Accessories',
                // 'description' => 'Tablet, Laptop, Desktop and Accessories',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'category_group_id' => 1,
                'name' => 'Home Entertainment',
                // 'description' => 'TVs, Home Theaters etc',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'category_group_id' => 1,
                'name' => 'Photo & Video',
                // 'description' => 'PnS, DSLR, Video Camera and Accessories',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'category_group_id' => 2,
                'name' => 'Indoor',
                // 'description' => 'Puzzle, Keram etc',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'category_group_id' => 2,
                'name' => 'Outdoor',
                // 'description' => 'Cycle, Dron etc',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'category_group_id' => 3,
                'name' => 'Men\'s Fashion',
                // 'description' => 'Lots of fashion products.',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'category_group_id' => 3,
                'name' => 'Women\'s Fashion',
                // 'description' => 'Lots of fashion products.',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'category_group_id' => 4,
                'name' => 'Kitchen',
                // 'description' => 'Kitchen and cooking products.',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'category_group_id' => 4,
                'name' => 'Garden',
                // 'description' => 'Gardening related products.',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]
        ]);

        // factory(App\CategoryGroup::class, $this->count)->create();

        factory(App\CategorySubGroup::class, $this->count)->create();

        factory(App\Category::class, $this->longCount)->create();

        factory(App\AttributeValue::class, $this->longCount)->create();

        factory(App\Warehouse::class, 1)
            ->create()
            ->each(function($warehouse){
                $warehouse->addresses()->save(factory(App\Address::class)->make(['address_title' => $warehouse->name, 'address_type' => 'Primary']));
            });

        factory(App\ShippingRate::class, $this->count)->create();

        factory(App\Tax::class, $this->count)->create();

        factory(App\Carrier::class, $this->count)->create();

        factory(App\Packaging::class, $this->count)->create();

        factory(App\Inventory::class, $this->longCount)->create();

        factory(App\Order::class, $this->count)->create();

        factory(App\Dispute::class, 3)->create();

        factory(App\Blog::class, $this->tinycount)->create();

        factory(App\BlogComment::class, $this->longCount)->create();

        factory(App\Tag::class, $this->longCount)->create();

        // factory(App\GiftCard::class, $this->count)->create();

        factory(App\Coupon::class, $this->longCount)->create();

        factory(App\Message::class, $this->count)->create();

        factory(App\Ticket::class, $this->tinycount)->create();

        factory(App\Reply::class, $this->veryLongCount)->create();

        //PIVOT TABLE SEEDERS

        $customers  = \DB::table('customers')->pluck('id')->toArray();
        $users      = \DB::table('users')->pluck('id')->toArray();
        $products   = \DB::table('products')->pluck('id')->toArray();
        $shops      = \DB::table('shops')->pluck('id')->toArray();
        $warehouses = \DB::table('warehouses')->pluck('id')->toArray();
        $categories = \DB::table('categories')->pluck('id')->toArray();
        $category_sub_groups = \DB::table('category_sub_groups')->pluck('id')->toArray();
        $attributes   = \DB::table('attributes')->pluck('id')->toArray();
        $coupons   = \DB::table('coupons')->pluck('id')->toArray();
        $inventories = \DB::table('inventories')->pluck('id')->toArray();

        // shop_payment_methods
        foreach ($shops as $shop) {
            DB::table('shop_payment_methods')->insert([
                [
                    'shop_id' => $shop,
                    'payment_method_id' => 4,
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ]
            ]);

            DB::table('config_manual_payments')->insert([
                [
                    'shop_id' => $shop,
                    'payment_method_id' => 4,
                    'additional_details' => 'Our man will collect the payment when deliver the item to your doorstep.',
                    'payment_instructions' => 'Payment instructions for COD',
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ]
            ]);
        }

        // attribute_inventory
        foreach ((range(1, $this->longCount)) as $index) {
            $attribute_id = $attributes[array_rand($attributes)];
            $attribute_values = \DB::table('attribute_values')->where('attribute_id', $attribute_id)->pluck('id')->toArray();
            DB::table('attribute_inventory')->insert(
                [
                    'attribute_id' => $attribute_id,
                    'inventory_id' => $inventories[array_rand($inventories)],
                    'attribute_value_id' => $attribute_values[array_rand($attribute_values)],
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ]
            );
        }

        // order_items
        foreach ((range(1, $this->longLongCount)) as $index) {
            $shop_id = $shops[array_rand($shops)];
            $orders = \DB::table('orders')->where('shop_id', $shop_id)->pluck('id')->toArray();
            $inventories = \DB::table('inventories')->where('shop_id', $shop_id)->pluck('id')->toArray();

            if(empty($orders) || empty($inventories)) continue;

            DB::table('order_items')->insert(
                [
                    'order_id' => $orders[array_rand($orders)],
                    'inventory_id' => $inventories[array_rand($inventories)],
                    'item_description' => 'Demo product detail ' . rand(1,9999),
                    'quantity' => rand(1,5),
                    'unit_price' => rand(1,500),
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ]
            );
        }

        // category_category_sub_group
        foreach ((range(1, $this->longLongCount)) as $index) {
            DB::table('category_category_sub_group')->insert(
                [
                    'category_id' => $categories[array_rand($categories)],
                    'category_sub_group_id' => $category_sub_groups[array_rand($category_sub_groups)],
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ]
            );
        }

        // category_product
        foreach ((range(1, $this->longLongCount)) as $index) {
            DB::table('category_product')->insert(
                [
                    'category_id' => $categories[array_rand($categories)],
                    'product_id' => $products[array_rand($products)],
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ]
            );
        }

        // user_warehouse
        // foreach ((range(1, $this->longCount)) as $index) {
        //     DB::table('user_warehouse')->insert(
        //         [
        //             'warehouse_id' => $warehouses[array_rand($warehouses)],
        //             'user_id' => $users[array_rand($users)],
        //             'created_at' => Carbon::Now(),
        //             'updated_at' => Carbon::Now(),
        //         ]
        //     );
        // }

        // foreach ((range(1, 30)) as $index) {
        //     DB::table('taggables')->insert(
        //         [
        //             'tag_id' => rand(1, 20),
        //             'taggable_id' => rand(1, 20),
        //             'taggable_type' => rand(0, 1) == 1 ? 'App\Post' : 'App\Video'
        //         ]
        //     );
        // }

        // coupon_customers
        foreach ((range(1, $this->count)) as $index) {
            DB::table('coupon_customer')->insert(
                [
                    'coupon_id' => $coupons[array_rand($coupons)],
                    'customer_id' => $customers[array_rand($customers)],
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ]
            );
        }

        // Frontend Seeder
        factory(App\Banner::class, 3)->create([
            'columns' => 4,
            'group_id' => 'best_deals'
        ]);
        factory(App\Banner::class, 2)->create([
            'columns' => 6,
            'group_id' => 'place_one'
        ]);
        factory(App\Banner::class)->create([
            'columns' => 12,
            'group_id' => 'place_two'
        ]);
        factory(App\Banner::class, 2)->create([
            'columns' => 6,
            'group_id' => 'place_three'
        ]);
        factory(App\Banner::class, 2)->create([
            'columns' => 12,
            'group_id' => 'sidebar'
        ]);
        factory(App\Banner::class)->create([
            'columns' => 12,
            'group_id' => 'bottom'
        ]);

        factory(App\Wishlist::class, $this->count)->create();
        factory(App\Feedback::class, $this->longCount)->create();

        $this->call('EmailTemplateSeeder');

        // factory(App\Visitor::class, $this->longLongCount)->create();
    }
}
