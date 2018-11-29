<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_deposits', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('delivery_company_id')->unsigned()->nullable()->index();
            $table->string('name', 255)->nullable();
            $table->string('country')->nullable();
            $table->string('county')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('address')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('delivery_deposits');
    }
}
