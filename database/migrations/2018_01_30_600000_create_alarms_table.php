<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alarms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('sensor_id');
            $table->integer('alarm_type');
            $table->string('value');
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });

        Schema::table('alarms', function (Blueprint $table){
            $table->foreign('sensor_id')
                  ->references('id')->on('sensors')
                  ->onDelete('cascade');
            $table->foreign('user_id')
                  ->references('id')->on('users')
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
        Schema::table('alarms', function (Blueprint $table){
            $table->dropForeign('alarms_sensor_id_foreign');
            $table->dropForeign('alarms_user_id_foreign');
        });
        Schema::dropIfExists('alarms');
    }
}
