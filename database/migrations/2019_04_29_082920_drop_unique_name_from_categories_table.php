<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropUniqueNameFromCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_sub_groups', function (Blueprint $table) {
            $table->dropUnique(['name']);
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->dropUnique(['name']);
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
            // $table->unique('name');
        });
        Schema::table('category_sub_groups', function (Blueprint $table) {
            // $table->unique('name');
        });
    }
}
