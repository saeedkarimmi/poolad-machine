<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sellers', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name',50);
            $table->string('phoneNumber', 20)->nullable();
            $table->string('tel', 20)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('address')->nullable();
            $table->string('agent', 50)->nullable();
            $table->string('email',50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sellers');
    }
}
