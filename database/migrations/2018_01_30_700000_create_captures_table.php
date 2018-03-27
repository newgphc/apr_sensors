<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('captures', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sensor_id');
            $table->string('value');
            $table->dateTime('capture_time');
            $table->timestamps();
        });
        Schema::table('captures', function (Blueprint $table){
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
        Schema::table('captures', function (Blueprint $table){
            $table->dropForeign('captures_sensor_id_foreign');
        });
        Schema::dropIfExists('captures');
    }
}
