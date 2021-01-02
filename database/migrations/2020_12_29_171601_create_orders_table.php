<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_orders', function (Blueprint $table) {
            $table->id();

            $table->string('name', 50);

            $table->unsignedInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('tbl_sellers');

            $table->unsignedInteger('spiral_id');
            $table->foreign('spiral_id')->references('id')->on('tbl_spirals');

            $table->unsignedTinyInteger('payment_method_id');
            $table->foreign('payment_method_id')->references('id')->on('tbl_payment_methods');

            $table->string('description')->nullable();

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
        Schema::dropIfExists('tbl_orders');
    }
}
