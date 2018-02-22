<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('shop_id')->unsigned()->nullable();
            $table->bigInteger('customer_id')->unsigned();
            $table->integer('shipping_rate_id')->unsigned()->nullable();
            $table->integer('packaging_id')->unsigned()->nullable();
            $table->integer('item_count')->unsigned();
            $table->integer('quantity')->unsigned();

            $table->decimal('total', 20, 6)->nullable();
            $table->decimal('discount', 20, 6)->nullable();
            $table->decimal('shipping', 20, 6)->nullable();
            $table->decimal('packaging', 20, 6)->nullable();
            $table->decimal('handling', 20, 6)->nullable();
            $table->decimal('taxes', 20, 6)->nullable();
            $table->decimal('grand_total', 20, 6)->nullable();

            $table->text('shipping_address')->nullable();
            $table->text('billing_address')->nullable();

            $table->integer('payment_method_id')->unsigned();
            $table->integer('payment_status_id')->unsigned()->nullable();
            $table->text('message_to_customer')->nullable();
            $table->text('admin_note')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('payment_status_id')->references('id')->on('payment_statuses')->onDelete('set null');
        });

        Schema::create('cart_items', function (Blueprint $table) {

            $table->bigInteger('cart_id')->unsigned()->index();
            $table->bigInteger('inventory_id')->unsigned()->index();
            $table->longtext('item_description');
            $table->integer('quantity')->unsigned();
            $table->decimal('unit_price', 20, 6);
            $table->timestamps();

            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cart_items');
        Schema::drop('carts');
    }
}
