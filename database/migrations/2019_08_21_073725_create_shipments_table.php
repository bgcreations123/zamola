<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id')->unsigned();
            $table->integer('staff_id')->unsigned();
            $table->integer('driver_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('package_id')->unsigned();
            $table->timestamps();

            // $table->foreign('order_id')->references('id')->on('orders');
            // $table->foreign('staff_id')->references('id')->on('users');
            // $table->foreign('driver_id')->references('id')->on('users');
            // $table->foreign('status_id')->references('id')->on('statuses');
            // $table->foreign('package_id')->references('id')->on('packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}
