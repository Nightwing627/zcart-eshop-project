<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSeoInCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_groups', function (Blueprint $table) {
            $table->text('meta_title')->nullable()->after('order');
            $table->longtext('meta_description')->nullable()->after('meta_title');
        });
        Schema::table('category_sub_groups', function (Blueprint $table) {
            $table->text('meta_title')->nullable()->after('active');
            $table->longtext('meta_description')->nullable()->after('meta_title');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->text('meta_title')->nullable()->after('order');
            $table->longtext('meta_description')->nullable()->after('meta_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_groups', function (Blueprint $table) {
            $table->dropColumn('meta_description');
            $table->dropColumn('meta_title');
        });
        Schema::table('category_sub_groups', function (Blueprint $table) {
            $table->dropColumn('meta_description');
            $table->dropColumn('meta_title');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('meta_description');
            $table->dropColumn('meta_title');
        });
    }
}
