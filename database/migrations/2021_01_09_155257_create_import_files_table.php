<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_import_files', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('tbl_orders');

            $table->unsignedTinyInteger('currency_id');
            $table->foreign('currency_id')->references('id')->on('tbl_currencies');

            $table->unsignedTinyInteger('bank_id');
            $table->foreign('bank_id')->references('id')->on('tbl_banks');

            $table->string('file_number', 50)->nullable();
            $table->string('order_registration_code', 50)->nullable();
            $table->string('proforma_number', 50)->nullable();
            $table->string('incoterm', 50)->nullable();

            $table->string('order_register_completion_date', 20)->nullable();
            $table->string('order_register_issue_date', 20)->nullable();
            $table->string('order_register_validity_date', 20)->nullable();

            $table->string('currency_allocate_application_date', 20)->nullable();
            $table->string('currency_allocate_issue_date', 20)->nullable();
            $table->string('validity_currency_allotment_date', 20)->nullable();

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
        Schema::dropIfExists('tbl_import_files');
    }
}
