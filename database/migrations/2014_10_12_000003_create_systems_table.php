<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('state')->nullable();
            $table->integer('state_id')->unsigned()->nullable();
            $table->string('country')->nullable();
            $table->integer('country_id')->unsigned()->nullable();
            $table->string('phone')->nullable();
            $table->boolean('is_multi_vendor')->nullable()->default(true);

            // Mandatory Settings
            $table->enum('date_format', ['YYYY-MM-DD', 'DD-MM-YYYY', 'MM-DD-YYYY'])->default('YYYY-MM-DD');
            $table->enum('date_separate', ['.', '-', '/'])->default('-');
            $table->enum('time_format', ['12h', '24h'])->default('12h');
            $table->enum('time_separate', ['.', ':'])->default(':');
            $table->string('time_zone')->nullable()->default('UTC');
            $table->string('currency_code')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->integer('currency_id')->nullable();
            $table->string('length_unit')->nullable();
            $table->string('weight_unit')->nullable();
            $table->string('valume_unit')->nullable();
            // $table->integer('decimals')->nullable()->default(2);
            $table->enum('decimals', [2, 3, 4, 5, 6])->default(2);
            $table->enum('decimalpoint', [',', '.'])->default('.');
            $table->enum('thousands_separator', [',', '.', ' '])->default(',');
            $table->boolean('show_currency_symbol')->nullable();
            $table->boolean('show_space_after_symbol')->nullable();
            $table->boolean('show_inactive_categories_also_when_create_category')->nullable();

            // Vendot Settings
            // $table->boolean('merchant_can_create_category_group')->nullable();
            // $table->boolean('merchant_can_create_category_sub_group')->nullable();
            // $table->boolean('merchant_can_create_category')->nullable();
            // $table->boolean('merchant_can_create_attribute')->nullable();
            // $table->boolean('merchant_can_create_attribute_value')->nullable();
            // $table->boolean('merchant_can_create_manufacturer')->nullable();
            // $table->boolean('merchant_can_create_product')->nullable();
            // $table->boolean('merchant_can_have_own_user_roles')->nullable();
            // $table->boolean('merchant_can_have_own_carriers')->nullable();
            // $table->boolean('merchant_can_have_own_gift_cards')->nullable();
            // $table->boolean('merchant_can_create_email_template')->nullable();

            // Address
            $table->boolean('address_geocode')->nullable();
            $table->boolean('address_show_country')->nullable();
            $table->boolean('show_address_title')->nullable();
            $table->integer('address_default_country')->nullable();
            $table->integer('address_default_state')->nullable();

            // Genaral Settings
            $table->integer('merchant_logo_max_size_limit_kb')->default(2000);
            $table->integer('coupon_code_size')->default(8);
            $table->integer('gift_card_serial_number_size')->default(13);
            $table->integer('gift_card_pin_size')->default(10);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('systems');
    }
}
