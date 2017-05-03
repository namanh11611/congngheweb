<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderOutput extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_output',function(Blueprint $table){
            $table->increments('id');
            $table->smallInteger('status');
            $table->string('order_address');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('Customers')->onDelete('cascade');
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
        //
    }
}
