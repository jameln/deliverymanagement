<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSenderDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sender_deliveries', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('delivery_company_id')->unsigned()->nullable()->index();
            $table->integer('sender_company_id')->unsigned()->nullable()->index();
            $table->string('status')->nullable();
            $table->string('note', 1000)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sender_deliveries');
    }
}
