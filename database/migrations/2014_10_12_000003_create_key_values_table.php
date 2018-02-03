<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeyValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_values', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->nullable();
            $table->text('title')->nullable();
            $table->string('key');
            $table->longtext('value')->nullable();
            $table->longtext('default')->nullable();
            $table->text('help_text')->nullable();
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
        Schema::drop('key_values');
    }
}
