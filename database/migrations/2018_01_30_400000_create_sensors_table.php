<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('place_id');
            $table->string('fisical_sensor_id');
            $table->string('description');
            $table->string('long_description')->nullable();
            $table->boolean('active');
            $table->integer('refresh_interval');
            $table->unsignedInteger('measurement_type_id');
            $table->string('h');
            $table->string('r');
            $table->string('distance');
            //$table->unsignedInteger('user_id');
            $table->timestamps();

        });

        Schema::table('sensors', function (Blueprint $table){
            $table->foreign('place_id')
                      ->references('id')->on('places')
                      ->onDelete('cascade');

            $table->foreign('measurement_type_id')
                      ->references('id')->on('measurement_types')
                      ->onDelete('cascade');

            /*$table->foreign('user_id')
                      ->references('id')->on('users')
                      ->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sensors', function (Blueprint $table){
            $table->dropForeign('sensors_customer_id_foreign');
            $table->dropForeign(['measurement_type_id_foreign']);
            $table->dropForeign('sensors_user_id_foreign');
        });

        Schema::dropIfExists('sensors');
    }
}
