<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlarmUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alarm_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('alarm_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });

        Schema::table('alarm_users', function (Blueprint $table){
            $table->foreign('alarm_id')
                  ->references('id')->on('alarms')
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
        Schema::table('alarm_users', function (Blueprint $table){
            $table->dropForeign('alarm_users_alarm_id_foreign');
            $table->dropForeign('alarms_users_user_id_foreign');
        });
        Schema::dropIfExists('alarm_users');
    }
}
