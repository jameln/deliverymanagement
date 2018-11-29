<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSenderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sender_items', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('sender_company_id')->unsigned()->nullable()->index();
            $table->string('ref')->nullable();
            $table->string('description', 1000)->nullable();
            $table->string('price')->nullable();
            $table->string('img')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sender_items');
    }
}
