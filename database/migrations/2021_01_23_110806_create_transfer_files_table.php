<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_transfer_files', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('import_file_id');
            $table->foreign('import_file_id')->on('tbl_import_files')->references('id');

            $table->string('shipping_name', 50);
            $table->string('insurance_number', 50);
            $table->string('freight_number', 50);
            $table->string('freight_date', 20);
            $table->string('arrival_notice_date', 20)->nullable();
            $table->string('release_date', 20)->nullable();

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
        Schema::dropIfExists('tbl_transfer_files');
    }
}
