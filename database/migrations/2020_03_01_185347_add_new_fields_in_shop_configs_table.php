<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsInShopConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('configs', function (Blueprint $table) {
            $table->boolean('show_shop_desc_with_listing')->nullable()->after('pagination');
            $table->boolean('show_refund_policy_with_listing')->nullable()->after('show_shop_desc_with_listing')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configs', function (Blueprint $table) {
            $table->dropColumn('show_shop_desc_with_listing');
            $table->dropColumn('show_refund_policy_with_listing');
        });
    }
}
