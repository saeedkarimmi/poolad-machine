<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_machine_models', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();

            $table->unsignedTinyInteger('machine_series_id');
            $table->foreign('machine_series_id')->references('id')->on('tbl_machine_series');

            $table->unsignedTinyInteger('machine_weight_id');
            $table->foreign('machine_weight_id')->references('id')->on('tbl_machine_weights');

            $table->unsignedTinyInteger('machine_drive_id');
            $table->foreign('machine_drive_id')->references('id')->on('tbl_machine_drives');

            $table->unsignedTinyInteger('machine_type_id');
            $table->foreign('machine_type_id')->references('id')->on('tbl_machine_types');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_machine_models');
    }
}
