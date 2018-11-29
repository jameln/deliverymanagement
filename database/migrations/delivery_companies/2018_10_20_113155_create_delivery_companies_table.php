<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_companies', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('ref')->nullable();
            $table->string('company_name')->nullable();
            $table->string('tva')->nullable();
            $table->string('country')->nullable();
            $table->string('county')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('address')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('fax')->nullable();
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->integer('currency_id')->unsigned()->nullable()->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('delivery_companies');
    }
}
