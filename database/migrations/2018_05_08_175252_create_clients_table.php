<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dni', 9)->unique();
            $table->string('name');
            $table->string('last_name');
            $table->string('city');
            $table->string('address');
            $table->string('postal_code',5);
            $table->string('phone',9);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE clients ADD FULLTEXT full(dni, name, last_name, phone)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}