<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurement_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('measurement_unit_id');
            $table->timestamps();
        });

        Schema::table('measurement_types', function (Blueprint $table){
            $table->foreign('measurement_unit_id')
            ->references('id')
            ->on('measurement_units')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('measurement_types', function (Blueprint $table){
            $table->dropForeign(['measurement_unit_id']);
        });

        Schema::dropIfExists('measurement_types');
    }
}
