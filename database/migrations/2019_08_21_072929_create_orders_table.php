<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->string('tracer');
            $table->integer('shipment_category_id')->unsigned();
            $table->integer('payment_method_id')->unsigned();
            $table->integer('quantity');
            $table->integer('weight');
            $table->text('description');
            $table->integer('length');
            $table->integer('width');
            $table->integer('height');
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('status_id')->references('id')->on('statuses');
            // $table->foreign('shipment_catregory_id')->references('id')->on('shipment_categories');
            // $table->foreign('payment_method_id')->references('id')->on('payment_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
