<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_agents', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('delivery_company_id')->unsigned()->nullable()->index();
            $table->string('phone')->nullable();
            $table->string('cin')->nullable();
            $table->string('dln')->nullable();
            $table->string('photo')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('delivery_agents');
    }
}
