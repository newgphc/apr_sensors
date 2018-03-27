<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('places', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('description')->default('')->nullable();
          $table->unsignedInteger('customer_id');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('places', function (Blueprint $table){
          $table->foreign('customer_id')
                    ->references('id')->on('customers')
                    ->onDelete('cascade');
      });
    }
}
