<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsInSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('systems', function (Blueprint $table) {
            $table->boolean('show_seo_info_to_frontend')->nullable()->after('pagination')->default(true);
            $table->boolean('can_use_own_catalog_only')->nullable()->after('vendor_can_view_customer_info')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('systems', function (Blueprint $table) {
            $table->dropColumn('can_use_own_catalog_only');
            $table->dropColumn('show_seo_info_to_frontend');
        });
    }
}
