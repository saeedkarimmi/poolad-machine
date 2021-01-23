<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferImportFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_transfer_import_files', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('transfer_file_id');
            $table->foreign('transfer_file_id')->on('tbl_transfer_files')->references('id');

            $table->unsignedBigInteger('import_file_detail_id');
            $table->foreign('import_file_detail_id')->on('tbl_import_file_details')->references('id');

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
        Schema::dropIfExists('tbl_transfer_import_files');
    }
}
