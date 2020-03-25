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
            $table->boolean('worldwide_business_area')->nullable()->after('email')->default(true);
            // $table->text('country_ids')->after('pagination')->nullable();
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
            // $table->dropColumn('country_ids');
            $table->dropColumn('worldwide_business_area');
            $table->dropColumn('can_use_own_catalog_only');
            $table->dropColumn('show_seo_info_to_frontend');
        });
    }
}
