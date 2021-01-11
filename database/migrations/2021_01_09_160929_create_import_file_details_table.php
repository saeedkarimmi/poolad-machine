<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportFileDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_import_file_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('import_file_id');
            $table->foreign('import_file_id')->references('id')->on('tbl_import_files');

            $table->unsignedBigInteger('order_detail_id');
            $table->foreign('order_detail_id')->references('id')->on('tbl_order_details');

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
        Schema::dropIfExists('tbl_import_file_details');
    }
}
