<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('owner_id')->unsigned();
            $table->text('name')->nullable();
            $table->text('legal_name')->nullable();
            $table->string('email')->unique();
            $table->string('currency')->nullable();
            $table->integer('currency_id')->nullable();
            // $table->integer('total_staff')->default(1)->nullable();
            $table->longtext('description')->nullable();
            $table->boolean('active')->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shops');
    }
}
