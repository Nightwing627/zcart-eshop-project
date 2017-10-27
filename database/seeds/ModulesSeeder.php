<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ModulesSeeder extends Seeder
{
    private $modules = [
        // Module name  => Access level //
        'Attribute'     => 'Common',
        'Blog'          => 'Platform',
        'Carrier'       => 'Common',
        'Category'      => 'Platform',
        'Coupon'        => 'Common',
        'Customer'      => 'Common',
        'Email Template'=> 'Platform',
        'Gift Card'     => 'Platform',
        'Inventory'     => 'Merchant',
        'Manufacturer'  => 'Common',
        'Module'        => 'Platform',
        'Order'         => 'Merchant',
        'Product'       => 'Common',
        'Packaging'     => 'Merchant',
        'Payment Method'=> 'Platform',
        'Role'          => 'Platform',
        'Supplier'      => 'Merchant',
        'Shop'          => 'Platform',
        'Tax'           => 'Common',
        'Warehouse'     => 'Merchant',
        'User'          => 'Common',
        'Utility'       => 'Platform',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->modules as $madule => $access)
        {
            DB::table('modules')->insert(
                [
                    'name' => $madule,
                    'description' => 'Manage all '.strtolower($madule).'.',
                    'access' => $access,
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ]
            );
        }
    }

}
