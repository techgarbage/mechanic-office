<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vehicle_registration');
            $table->integer('client_id', false,true);
            $table->integer('model_id', false,true);
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('model_id')->references('id')->on('models')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
