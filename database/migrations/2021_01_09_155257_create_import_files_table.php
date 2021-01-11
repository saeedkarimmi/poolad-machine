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

            $table->string('file_number', 50)->nullable();
            $table->string('order_registration_code', 50)->nullable();
            $table->string('proforma_number', 50)->nullable();
            $table->string('incoterm', 50)->nullable();

            $table->timestamp('order_register_completion_date')->nullable();
            $table->timestamp('order_register_issue_date')->nullable();
            $table->timestamp('order_register_validity_date')->nullable();

            $table->timestamp('currency_allocate_application_date')->nullable();
            $table->timestamp('currency_allocate_issue_date')->nullable();
            $table->timestamp('validity_currency_allotment_date')->nullable();

//            currency_id
//            bank_id


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
