<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200)->unique();
            $table->text('description')->nullable();
            $table->boolean('active')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('category_sub_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_group_id')->unsigned();
            $table->string('name',200)->unique();
            $table->text('description')->nullable();
            $table->boolean('active')->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_group_id')->references('id')->on('category_groups');
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',200)->unique();
            $table->string('slug',200)->unique();
            $table->text('description')->nullable();
            $table->boolean('active')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('category_category_sub_group', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('category_sub_group_id')->unsigned()->index();
            $table->foreign('category_sub_group_id')->references('id')->on('category_sub_groups')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('category_product', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->bigInteger('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::drop('category_product');
        Schema::drop('category_category_sub_group');
        Schema::drop('categories');
        Schema::drop('category_sub_groups');
        Schema::drop('category_groups');
    }
}
