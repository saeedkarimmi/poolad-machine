<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferFileDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_transfer_file_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('transfer_file_id');
            $table->foreign('transfer_file_id')->on('tbl_transfer_files')->references('id');

            $table->unsignedInteger('container_id');
            $table->foreign('container_id')->on('tbl_containers')->references('id');

            $table->string('unit_price', 50);
            $table->string('count', 10);


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
        Schema::dropIfExists('tbl_transfer_file_details');
    }
}
