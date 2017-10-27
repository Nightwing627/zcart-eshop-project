<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carriers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->nullable();
            $table->integer('tax_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('is_free')->nullable();
            $table->decimal('flat_shipping_cost', 20, 6)->nullable();
            $table->boolean('handling_cost')->nullable();
            $table->integer('std_delivery_time')->nullable();
            $table->enum('time_unit', ['Days', 'Hours'])->default('Days')->nullable();
            $table->string('tracking_url')->nullable();
            $table->decimal('max_width', 20, 6)->nullable();
            $table->decimal('max_height', 20, 6)->nullable();
            $table->decimal('max_depth', 20, 6)->nullable();
            $table->decimal('max_weight', 20, 6)->nullable();
            $table->boolean('active')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('carrier_inventory', function (Blueprint $table) {
            $table->integer('carrier_id')->unsigned()->index();
            $table->foreign('carrier_id')->references('id')->on('carriers')->onDelete('cascade');
            $table->bigInteger('inventory_id')->unsigned()->index();
            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('cascade');
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
        Schema::drop('carrier_inventory');
        Schema::drop('carriers');
    }
}
