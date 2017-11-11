<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ModulesSeeder extends Seeder
{
    private $modules = [
        // Module name  => Access level //
        'Attribute' => [
            'access' => 'Common',
            'actions' => 'view,add,edit,delete'
        ],

        'Blog' => [
            'access' => 'Platform',
            'actions' => 'view,add,edit,delete'
        ],

        'Carrier' => [
            'access' => 'Common',
            'actions' => 'view,add,edit,delete'
        ],

        'Category' => [
            'access' => 'Platform',
            'actions' => 'view,add,edit,delete'
        ],

        'Coupon' => [
            'access' => 'Common',
            'actions' => 'view,add,edit,delete'
        ],

        'Customer' => [
            'access' => 'Common',
            'actions' => 'view,add,edit,delete'
        ],

        'Email Template' => [
            'access' => 'Platform',
            'actions' => 'view,add,edit,delete'
        ],

        'Gift Card' => [
            'access' => 'Platform',
            'actions' => 'view,add,edit,delete'
        ],

        'Inventory' => [
            'access' => 'Merchant',
            'actions' => 'view,add,edit,delete'
        ],

        'Manufacturer' => [
            'access' => 'Common',
            'actions' => 'view,add,edit,delete'
        ],

        'Module' => [
            'access' => 'Super Admin',
            'actions' => 'view,add,edit,delete'
        ],

        'Order' => [
            'access' => 'Merchant',
            'actions' => 'view,add,delete'
        ],

        'Product' => [
            'access' => 'Common',
            'actions' => 'view,add,edit,delete'
        ],

        'Packaging' => [
            'access' => 'Merchant',
            'actions' => 'view,add,edit,delete'
        ],

        'Payment Method' => [
            'access' => 'Platform',
            'actions' => 'view,add,edit,delete'
        ],

        'Role' => [
            'access' => 'Platform',
            'actions' => 'view,add,edit,delete'
        ],

        'Supplier' => [
            'access' => 'Merchant',
            'actions' => 'view,add,edit,delete'
        ],

        'Shop' => [
            'access' => 'Platform',
            'actions' => 'view,add,edit,delete'
        ],

        'Tax' => [
            'access' => 'Common',
            'actions' => 'view,add,edit,delete'
        ],

        'Warehouse' => [
            'access' => 'Merchant',
            'actions' => 'view,add,edit,delete'
        ],

        'User' => [
            'access' => 'Common',
            'actions' => 'view,add,edit,delete'
        ],

        'Utility' => [
            'access' => 'Platform',
            'actions' => 'view,add,edit,delete'
        ],

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->modules as $name => $attributes)
        {
            DB::table('modules')->insert(
                [
                    'name' => $name,
                    'description' => 'Manage all '.strtolower($name).'.',
                    'access' => $attributes['access'],
                    'actions' => $attributes['actions'],
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ]
            );
        }
    }

}
