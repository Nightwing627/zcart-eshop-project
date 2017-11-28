<?php

use Illuminate\Database\Seeder;

class MessageTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('message_types')->insert([
            [
                'type' => 'General query',
                'priority' => 'Low'
            ], [
                'type' => 'Customer support',
                'priority' => 'Medium'
            ], [
                'type' => 'Technical support',
                'priority' => 'High'
            ], [
                'type' => 'Webmaster',
                'priority' => 'Critical'
            ]
        ]);
    }
}
