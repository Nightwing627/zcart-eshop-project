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
            $table->string('name')->nullable();
            $table->string('nice_name')->nullable();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->date('dob')->nullable();
            $table->string('sex')->nullable();
            $table->longtext('description')->nullable();
            $table->timestampTz('last_visited_at')->nullable();
            $table->ipAddress('last_visited_from')->nullable();
            $table->boolean('active')->default(1);
            $table->string('verification_token', 100)->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_settings');
        Schema::dropIfExists('users');
    }
}
