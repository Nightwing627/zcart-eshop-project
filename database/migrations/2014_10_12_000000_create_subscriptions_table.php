<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function ($table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            // $table->bigInteger('merchant_id');
            $table->string('name');
            $table->string('stripe_id');
            $table->string('stripe_plan');
            $table->integer('quantity');
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();
        });

        Schema::create('subscription_plans', function ($table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('plan_id')->unique();
            $table->string('best_for')->nullable();
            $table->integer('cost')->default(0);
            $table->integer('transaction_fee')->default(0);
            $table->integer('marketplace_commission')->default(0);
            $table->integer('team_size')->default(1);
            $table->integer('inventory_limit')->nullable();
            $table->boolean('featured')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('subscription_plans');
        Schema::dropIfExists('subscriptions');
    }
}
