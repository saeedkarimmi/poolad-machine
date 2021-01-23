<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVTransferFilesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE VIEW v_transfer_files AS SELECT
                        tbl_transfer_files.*,
                        tbl_orders.order_name,
                        tbl_currencies.id AS currency_id,
                        tbl_currencies.`name` AS currency_name,
                        tbl_payment_methods.`name` AS payment_method_name,
                        tbl_payment_methods.id AS payment_method_id,
                        tbl_banks.`name` AS bank_name,
                        tbl_banks.id AS bank_id,
                        tbl_sellers.id AS seller_id,
                        tbl_sellers.`name` AS seller_name
                    FROM
                        tbl_transfer_files
                        INNER JOIN tbl_import_files ON tbl_transfer_files.import_file_id = tbl_import_files.id
                        INNER JOIN tbl_orders ON tbl_import_files.order_id = tbl_orders.id
                        INNER JOIN tbl_sellers ON tbl_orders.seller_id = tbl_sellers.id
                        INNER JOIN tbl_currencies ON tbl_import_files.currency_id = tbl_currencies.id
                        AND tbl_orders.currency_id = tbl_currencies.id
                        INNER JOIN tbl_payment_methods ON tbl_orders.payment_method_id = tbl_payment_methods.id
                        INNER JOIN tbl_banks ON tbl_import_files.bank_id = tbl_banks.id"
        );


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS v_transfer_files');
    }
}
