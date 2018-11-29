<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterDeliveryCompaniesTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('delivery_companies', function(Blueprint $table)
        {
            $table->integer('currencies_id')->unsigned()->nullable()->index();
            $table->dropColumn('currency_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delivery_companies', function(Blueprint $table)
        {
            $table->dropColumn('currencies_id');
            $table->integer('currency_id')->unsigned()->nullable()->index();

        });
    }
}
