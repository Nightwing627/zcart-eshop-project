<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->integer('type');
            $table->string('company_name')->nullable();
            $table->text('website')->nullable();
            $table->text('help_doc_link')->nullable();
            $table->text('terms_conditions_link')->nullable();
            $table->text('description')->nullable();
            $table->text('admin_description')->nullable();
            $table->text('admin_help_doc_link')->nullable();
            $table->boolean('enabled')->default(1);
            $table->timestamps();
        });

        Schema::create('payment_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('payment_method_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->string('label_color')->nullable();
            $table->boolean('send_email_to_customer')->default(0);
            $table->bigInteger('email_template_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('shop_payment_methods', function (Blueprint $table) {
            $table->integer('payment_method_id')->unsigned()->index();
            $table->integer('shop_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shop_payment_methods');
        Schema::drop('payment_statuses');
        Schema::drop('payment_methods');
    }
}
