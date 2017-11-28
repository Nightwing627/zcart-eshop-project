<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->enum('priority', ['Low', 'Medium', 'High', 'Critical'])->default('Low');
            $table->unique('type');
        });

        Schema::create('support_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type_id')->unsigned()->nullable();
            $table->enum('priority', ['Low', 'Medium', 'High', 'Critical'])->default('Low');
            $table->string('subject')->nullable();
            $table->string('email');
            $table->longtext('message')->nullable();
            $table->integer('order_id')->unsigned()->nullable();
            $table->integer('shop_id')->unsigned()->nullable();
            $table->integer('customer_id')->unsigned()->nullable();
            $table->boolean('open')->default(1)->nullable();
            $table->timestamps();
        });

        Schema::create('support_replies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('messages_id')->unsigned();
            $table->longtext('reply')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('messages_id')->references('id')->on('support_messages')->onDelete('cascade');;
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('support_replies');
        Schema::dropIfExists('support_messages');
        Schema::dropIfExists('message_types');
    }
}
