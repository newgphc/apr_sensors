<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlarmRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alarm_records', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('alarm_id');
            $table->unsignedInteger('sensor_id');
            $table->string('value');
            $table->timestamp('added_on');
        });

        Schema::table('alarm_records', function (Blueprint $table){
            $table->foreign('alarm_id')
                  ->references('id')->on('alarms')
                  ->onDelete('cascade');

            $table->foreign('sensor_id')
                  ->references('id')->on('sensors')
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
        Schema::table('alarm_records', function (Blueprint $table){
            $table->dropForeign('alarm_records_alarm_id_foreign');
            $table->dropForeign('alarm_records_sensor_id_foreign');
        });
        
        Schema::dropIfExists('alarm_records');
    }
}
