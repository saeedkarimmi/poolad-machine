<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVOrderView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE VIEW v_order AS SELECT
                        tbl_orders.*,
                        tbl_currencies.`name` AS currency_name,
                        tbl_payment_methods.`name` AS payment_method_name,
                        tbl_sellers.`name` AS seller_name,
                        COUNT( tbl_order_details.id ) AS machine_number
                    FROM
                        tbl_orders
                        INNER JOIN tbl_payment_methods ON tbl_orders.payment_method_id = tbl_payment_methods.id
                        INNER JOIN tbl_currencies ON tbl_orders.currency_id = tbl_currencies.id
                        INNER JOIN tbl_sellers ON tbl_orders.seller_id = tbl_sellers.id
                        LEFT JOIN tbl_order_details ON tbl_orders.id = tbl_order_details.order_id
                    GROUP BY
                        tbl_orders.id"
                            );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS v_order');
    }
}
