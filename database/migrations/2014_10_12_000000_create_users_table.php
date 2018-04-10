<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('shop_id')->unsigned()->nullable();
            $table->integer('role_id')->unsigned()->default(3);
            $table->string('name');
            $table->string('nice_name')->nullable();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->date('dob')->nullable();
            $table->string('sex')->nullable();
            $table->longtext('description')->nullable();
            $table->string('stripe_id')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestampTz('last_visited_on')->nullable();
            $table->ipAddress('last_visited_from')->nullable();
            $table->boolean('active')->default(1);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();

            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');;
        });

        Schema::create('user_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('messages_signature')->nullable();
            $table->boolean('new_support_message_notification')->default(true);
            $table->boolean('support_message_assigned_notification')->default(true);
            $table->boolean('support_message_updated_notification')->default(true);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('subscriptions', function ($table) {
            $table->increments('id');
            $table->bigInteger('merchant_id');
            $table->string('name');
            $table->string('stripe_id');
            $table->string('stripe_plan');
            $table->integer('quantity');
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('ends_at')->nullable();
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
        Schema::dropIfExists('subscriptions');
        Schema::dropIfExists('user_settings');
        Schema::dropIfExists('users');
    }
}
