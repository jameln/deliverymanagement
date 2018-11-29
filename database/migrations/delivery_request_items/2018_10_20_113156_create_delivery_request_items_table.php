<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryRequestItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_request_items', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('delivery_request_id')->unsigned()->nullable()->index();
            $table->string('ref')->nullable();
            $table->string('description', 1000)->nullable();
            $table->string('qty')->nullable();
            $table->string('price')->nullable();
            $table->string('total')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('delivery_request_items');
    }
}
