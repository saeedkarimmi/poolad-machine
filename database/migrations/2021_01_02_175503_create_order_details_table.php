<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('tbl_orders');

            $table->unsignedInteger('machine_model_id');
            $table->foreign('machine_model_id')->references('id')->on('tbl_machine_models');

            $table->unsignedInteger('system_control_id');
            $table->foreign('system_control_id')->references('id')->on('tbl_system_controls');

            $table->unsignedInteger('spiral_id');
            $table->foreign('spiral_id')->references('id')->on('tbl_spirals');

            $table->string('FOB_price');
            $table->boolean('documented')->default(false);



            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_order_details');
    }
}
