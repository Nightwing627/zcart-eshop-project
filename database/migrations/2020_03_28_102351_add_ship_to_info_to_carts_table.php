<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShipToInfoToCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->integer('ship_to_country_id')->unsigned()->nullable()->after('ship_to');
            $table->integer('ship_to_state_id')->unsigned()->nullable()->after('ship_to_country_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('ship_to_state_id');
            $table->dropColumn('ship_to_country_id');
        });
    }
}
