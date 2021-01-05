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

            $table->string('order_name', 50)->unique();

            $table->unsignedInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('tbl_sellers');

            $table->unsignedTinyInteger('currency_id');
            $table->foreign('currency_id')->references('id')->on('tbl_currencies');

            $table->unsignedTinyInteger('payment_method_id');
            $table->foreign('payment_method_id')->references('id')->on('tbl_payment_methods');

            $table->string('sum');
            $table->string('description')->nullable();

            $table->timestamp('registered_at')->nullable();

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
