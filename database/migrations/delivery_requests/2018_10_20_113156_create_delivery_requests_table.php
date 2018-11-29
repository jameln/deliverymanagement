<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_requests', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('ref')->nullable();
            $table->integer('sender_company_id')->unsigned()->nullable()->index();
            $table->integer('sender_site_id')->unsigned()->nullable()->index();
            $table->integer('sender_client_id')->unsigned()->nullable()->index();
            $table->integer('sender_client_address_id')->unsigned()->nullable()->index();
            $table->integer('delivery_company_id')->unsigned()->nullable()->index();
            $table->string('pricedelivery_price')->nullable();
            $table->string('total_to_pay')->nullable();
            $table->integer('currency_id')->unsigned()->nullable()->index();
            $table->string('status')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('delivery_requests');
    }
}
