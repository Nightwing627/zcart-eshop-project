<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderColumnToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_sub_groups', function (Blueprint $table) {
            $table->integer('order')->default(100)->nullable()->after('active');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('order')->default(100)->nullable()->after('featured');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('order');
        });
        Schema::table('category_sub_groups', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
}
