<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('nice_name')->nullable();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->date('dob')->nullable();
            $table->string('sex')->nullable();
            $table->longtext('description')->nullable();
            $table->timestampTz('last_visited_on')->nullable();
            $table->ipAddress('last_visited_from')->nullable();
            $table->boolean('active')->default(1);
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::drop('customers');
    }
}
