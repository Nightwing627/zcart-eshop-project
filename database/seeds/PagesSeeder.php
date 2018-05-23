<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                'id' => 1,
                'author_id' => \App\Role::SUPER_ADMIN,
                'title' => 'About us',
                'slug' => 'about-us',
                'content' => 'About the marketplace here',
                'visibility' => \App\Page::VISIBILITY_PUBLIC,
                'published_at' => Carbon::now(),
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'id' => 2,
                'author_id' => \App\Role::SUPER_ADMIN,
                'title' => 'Contact us',
                'slug' => 'contact-us',
                'content' => 'Contact the marketplace here',
                'visibility' => \App\Page::VISIBILITY_PUBLIC,
                'published_at' => Carbon::now(),
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'id' => 3,
                'author_id' => \App\Role::SUPER_ADMIN,
                'title' => 'Privacy policy',
                'slug' => 'privacy-policy',
                'content' => 'Privacy policy here',
                'visibility' => \App\Page::VISIBILITY_PUBLIC,
                'published_at' => Carbon::now(),
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'id' => 4,
                'author_id' => \App\Role::SUPER_ADMIN,
                'title' => 'Terms and condition for customer',
                'slug' => 'terms-of-use-customer',
                'content' => 'Terms and condition for customer here',
                'visibility' => \App\Page::VISIBILITY_PUBLIC,
                'published_at' => Carbon::now(),
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'id' => 5,
                'author_id' => \App\Role::SUPER_ADMIN,
                'title' => 'Terms and condition for merchant',
                'slug' => 'terms-of-use-merchant',
                'content' => 'Terms and condition for merchant here',
                'visibility' => \App\Page::VISIBILITY_MERCHANT,
                'published_at' => Carbon::now(),
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'id' => 6,
                'author_id' => \App\Role::SUPER_ADMIN,
                'title' => 'Return and refund policy',
                'slug' => 'return-and-refund-policy',
                'content' => 'Return and refund policy',
                'visibility' => \App\Page::VISIBILITY_PUBLIC,
                'published_at' => Carbon::now(),
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]
        ]);
    }
}
