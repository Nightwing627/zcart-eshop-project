<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVerificationFieldsToShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->boolean('payment_verified')->nullable()->default(Null)->after('active');
            $table->boolean('id_verified')->nullable()->default(Null)->after('payment_verified');
            $table->boolean('phone_verified')->nullable()->default(Null)->after('id_verified');
            $table->boolean('address_verified')->nullable()->default(Null)->after('phone_verified');
        });

        Schema::table('configs', function (Blueprint $table) {
            $table->boolean('pending_verification')->nullable()->default(Null)->after('maintenance_mode');
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
            $table->dropColumn('pending_verification');
        });

        Schema::table('shops', function (Blueprint $table) {
            $table->dropColumn('payment_verified');
            $table->dropColumn('id_verified');
            $table->dropColumn('phone_verified');
            $table->dropColumn('address_verified');
        });
    }
}