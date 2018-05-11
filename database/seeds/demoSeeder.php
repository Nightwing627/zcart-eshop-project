<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class demoSeeder extends Seeder
{
    private $tinycount = 5;
    private $count = 15;
    private $longCount = 30;
    private $longLongCount = 50;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Role::class, $this->tinycount)->create();

        factory(App\User::class, $this->longCount)
            ->create()
            ->each(function($user){
                $user->addresses()->save(
                    factory(App\Address::class)->make(['address_title' => $user->name, 'address_type' => 'Primary'])
                );
            });

        factory(App\Merchant::class, $this->longCount)
            ->create()
            ->each(function($merchant){
                $merchant->addresses()->save(
                    factory(App\Address::class)->make(['address_title' => $merchant->name, 'address_type' => 'Primary'])
                );
            });

        // Demo customers with real text
        DB::table('customers')->insert([
            [
                'id' => 1,
                'nice_name' => 'CustomerOne',
                'name' => 'Customer One',
                'email' => 'customer1@demo.com',
                'sex' => 'app.male',
                'password' => bcrypt('123456'),
                'active' => 1,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'id' => 2,
                'nice_name' => 'CustomerTwo',
                'name' => 'Customer Two',
                'email' => 'customer2@demo.com',
                'sex' => 'app.female',
                'password' => bcrypt('123456'),
                'active' => 1,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]
        ]);
        DB::table('addresses')->insert([
            [
                'address_type' => 'Primary',
                'addressable_type' => 'App\Customer',
                'addressable_id' => 1,
                'address_title' => 'Primary Address',
                'state_id' => 1221,
                'country_id' => 840,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'address_type' => 'Primary',
                'addressable_type' => 'App\Customer',
                'addressable_id' => 2,
                'address_title' => 'Primary Address',
                'state_id' => 1221,
                'country_id' => 840,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]
        ]);

        factory(App\Customer::class, $this->longCount)
            ->create()
            ->each(function($customer){
                $customer->addresses()->save(factory(App\Address::class)->make(['address_title' => $customer->name, 'address_type' => 'Primary']));
                $customer->addresses()->save(factory(App\Address::class)->make(['address_type' => 'Billing']));
                $customer->addresses()->save(factory(App\Address::class)->make(['address_type' => 'Shipping']));
            });

        factory(App\Shop::class, $this->longCount)
            ->create()
            ->each(function($shop){
                $shop->addresses()->save(factory(App\Address::class)->make(['address_title' => $shop->name, 'address_type' => 'Primary']));
                $shop->config()->save(factory(App\Config::class)->make());
                $shop->shippingZones()->save(factory(App\ShippingZone::class)->make());
                $shop->shippingZones()->create(
                    [
                        'name' => 'Worldwide',
                        'tax_id' => rand(1, 31),
                        'country_ids' => [],
                        'state_ids' => [],
                        'rest_of_the_world' => true,
                        'created_at' => Carbon::Now(),
                        'updated_at' => Carbon::Now(),
                    ]
                );
            });

        // Demo SubscriptionPlan with real text
        DB::table('subscription_plans')->insert([
            [
                'name' => 'Individual',
                'plan_id' => 'individual',
                'cost' => 9,
                'transaction_fee' => 2.5,
                'marketplace_commission' => 3,
                'team_size' => 1,
                'inventory_limit' => 20,
                'featured' => false,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Business',
                'plan_id' => 'business',
                'cost' => 29,
                'transaction_fee' => 1.9,
                'marketplace_commission' => 2.5,
                'team_size' => 5,
                'inventory_limit' => 200,
                'featured' => true,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Professional',
                'plan_id' => 'professional',
                'cost' => 49,
                'transaction_fee' => 1,
                'marketplace_commission' => 1.5,
                'team_size' => 10,
                'inventory_limit' => 500,
                'featured' => false,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]
        ]);

        // Demo Categories with real text
        DB::table('category_groups')->insert([
            [
                'name' => 'Electronics',
                'description' => 'Mobile, Computer, Tablet, Camera etc',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Kids and Toy',
                'description' => 'Toys, Footwear etc',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Clothing and Shoes',
                'description' => 'Shoes, Clothing, Life style items',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Home & Garden',
                'description' => 'Cookware, Dining, Bath, Home Decor and more',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Beauty and Health',
                'description' => 'Cosmetics, Foods and more.',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Sports',
                'description' => 'Cycle, Tennis, Boxing, Cricket and more.',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]
        ]);

        DB::table('category_sub_groups')->insert([
            [
                'category_group_id' => 1,
                'name' => 'Mobile & Accessories',
                'description' => 'Cell Phones and Accessories',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'category_group_id' => 1,
                'name' => 'Computer & Accessories',
                'description' => 'Tablet, Laptop, Desktop and Accessories',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'category_group_id' => 1,
                'name' => 'Home Entertainment',
                'description' => 'TVs, Home Theaters etc',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'category_group_id' => 1,
                'name' => 'Photo & Video',
                'description' => 'PnS, DSLR, Video Camera and Accessories',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'category_group_id' => 2,
                'name' => 'Indoor',
                'description' => 'Puzzle, Keram etc',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'category_group_id' => 2,
                'name' => 'Outdoor',
                'description' => 'Cycle, Dron etc',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'category_group_id' => 3,
                'name' => 'Men\'s Fashion',
                'description' => 'Lots of fashion products.',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'category_group_id' => 3,
                'name' => 'Women\'s Fashion',
                'description' => 'Lots of fashion products.',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'category_group_id' => 4,
                'name' => 'Kitchen',
                'description' => 'Kitchen and cooking products.',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'category_group_id' => 4,
                'name' => 'Garden',
                'description' => 'Gardening related products.',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]
        ]);

        DB::table('categories')->insert([
            [
                'name' => 'Mobile',
                'slug' => 'mobile',
                'description' => 'Mobile Phones',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Mobile Accessories',
                'slug' => 'mobile-accessories',
                'description' => 'Headphone, Adapter, Casing etc',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Laptop',
                'slug' => 'laptop',
                'description' => 'Laptop',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Desktop',
                'slug' => 'desktop',
                'description' => 'Desktop',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Tablet',
                'slug' => 'tablet',
                'description' => 'Tablet Computer and Accessories',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'TVs',
                'slug' => 'tvs',
                'description' => 'TVs and Accessories',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Home Theater System',
                'slug' => 'home-theater',
                'description' => 'Home Theater Sound System and Accessories',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Point & Shoot Camera',
                'slug' => 'pns-camera',
                'description' => 'PnS Camera and Accessories',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'DSLR',
                'slug' => 'dslr',
                'description' => 'DSLR Camera and Accessories',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'name' => 'Video Camera',
                'slug' => 'video-camera',
                'description' => 'Video Camera and Accessories',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]
        ]);

        factory(App\CategoryGroup::class, $this->count)->create();

        factory(App\CategorySubGroup::class, $this->count)->create();

        factory(App\Category::class, $this->count)->create();

        factory(App\Supplier::class, $this->longCount)
            ->create()
            ->each(function($supplier){
                $supplier->addresses()->save(factory(App\Address::class)->make(['address_title' => $supplier->name, 'address_type' => 'Primary']));
            });

        factory(App\AttributeValue::class, $this->longLongCount)->create();

        factory(App\Manufacturer::class, $this->count)->create();

        factory(App\Product::class, $this->longCount)->create();

        factory(App\Warehouse::class, $this->longCount)
            ->create()
            ->each(function($warehouse){
                $warehouse->addresses()->save(factory(App\Address::class)->make(['address_title' => $warehouse->name, 'address_type' => 'Primary']));
            });

        factory(App\Tax::class, $this->longCount)->create();

        factory(App\Carrier::class, $this->longCount)->create();

        factory(App\Packaging::class, $this->longCount)->create();

        factory(App\Inventory::class, $this->longLongCount)->create();

        factory(App\Order::class, $this->longLongCount)->create();

        factory(App\Blog::class, $this->tinycount)->create();

        factory(App\BlogComment::class, $this->longCount)->create();

        factory(App\Tag::class, $this->longCount)->create();

        factory(App\GiftCard::class, $this->longCount)->create();

        factory(App\Coupon::class, $this->longCount)->create();

        factory(App\Message::class, $this->longCount)->create();

        factory(App\Ticket::class, $this->longCount)->create();

        factory(App\Reply::class, $this->longLongCount)->create();

        factory(App\ShippingRate::class, $this->longLongCount)->create();

        // factory(App\Address::class, $this->longLongCount)->create();

        //PIVOT TABLE SEEDERS

        $users      = \DB::table('users')->pluck('id')->toArray();
        $products   = \DB::table('products')->pluck('id')->toArray();
        $warehouses = \DB::table('warehouses')->pluck('id')->toArray();
        $categories = \DB::table('categories')->pluck('id')->toArray();
        $category_sub_groups = \DB::table('category_sub_groups')->pluck('id')->toArray();
        $attributes   = \DB::table('attributes')->pluck('id')->toArray();

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
        foreach ((range(1, $this->longCount)) as $index) {
            DB::table('user_warehouse')->insert(
                [
                    'warehouse_id' => $warehouses[array_rand($warehouses)],
                    'user_id' => $users[array_rand($users)],
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ]
            );
        }


        // foreach ((range(1, 30)) as $index) {
        //     DB::table('taggables')->insert(
        //         [
        //             'tag_id' => rand(1, 20),
        //             'taggable_id' => rand(1, 20),
        //             'taggable_type' => rand(0, 1) == 1 ? 'App\Post' : 'App\Video'
        //         ]
        //     );
        // }

    }
}
