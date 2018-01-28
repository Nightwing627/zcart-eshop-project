<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        //Seed the countries
        $this->call('SystemsSeeder');
        $this->call('CountriesSeeder');
        $this->call('StatesSeeder');
        $this->call('TimezonesSeeder');
        $this->call('CurrenciesSeeder');
        $this->call('RolesSeeder');
        $this->call('UsersSeeder');
        $this->call('ShopsSeeder');
        $this->call('ModulesSeeder');
        $this->call('PermissionSeeder');
        $this->call('AttributeSeeder');
        $this->call('GtinSeeder');
        $this->call('PaymentMethodTypesSeeder');
        $this->call('PaymentMethodsSeeder');
        $this->call('EmailTemplateSeeder');
        $this->call('OrderStatusesSeeder');
        $this->call('AddressTypesSeeder');
        $this->call('TicketCategoriesSeeder');
        $this->call('PaymentStatusesSeeder');
        $this->call('DisputeTypesSeeder');
        $this->call('TaxesSeeder');
        $this->call('demoSeeder');
        $this->command->info('Seeding complete!');

        Model::reguard();
    }
}
