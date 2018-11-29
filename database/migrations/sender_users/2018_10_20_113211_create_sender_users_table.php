<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSenderUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sender_users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('sender_company_id')->unsigned()->nullable()->index();
            $table->string('phone')->nullable();
            $table->string('cin')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sender_users');
    }
}
