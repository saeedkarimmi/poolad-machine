<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVImportFilesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE VIEW v_import_files AS SELECT
                        tbl_import_files.*,
                        tbl_sellers.`name`,
                        tbl_orders.order_name
                    FROM
                        tbl_import_files
                        INNER JOIN tbl_orders ON tbl_import_files.order_id = tbl_orders.id
                        INNER JOIN tbl_sellers ON tbl_orders.seller_id = tbl_sellers.id"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS v_import_files');
    }
}
