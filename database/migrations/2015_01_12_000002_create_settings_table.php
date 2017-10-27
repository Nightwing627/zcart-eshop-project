<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->unique();
            $table->text('display_name')->nullable();
            $table->string('support_email');
            $table->string('support_phone')->nullable();
            $table->string('support_phone_toll_free')->nullable();
            $table->string('slug', 200)->unique();
            $table->string('external_url')->nullable();
            $table->string('time_zone')->nullable();

            $table->string('order_number_prefix')->nullable();
            $table->string('order_number_suffix')->nullable();

            $table->string('default_sender_email_address')->nullable();
            $table->string('default_email_sender_name')->nullable();
            $table->integer('default_tax_id_for_inventory')->unsigned()->nullable();
            $table->integer('default_tax_id_for_order')->unsigned()->nullable();
            $table->integer('default_carrier_id')->unsigned()->nullable();
            $table->integer('default_packaging_id')->unsigned()->nullable();
            $table->integer('default_payment_method_id')->unsigned()->nullable();
            $table->decimal('flat_shipping_cost', 20, 6)->nullable();
            $table->decimal('order_handling_cost', 20, 6)->nullable();
            $table->decimal('free_shipping_starts', 20, 6)->nullable();
            $table->boolean('maintenance_mode')->default(0)->nullable();
            $table->timestamps();

            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}
