<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruckRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_records', function (Blueprint $table) {
            $table->id();
            $table->string('driver_name');
            $table->string('driver_phone');
            $table->string('company');
            $table->string('owner_name');
            $table->string('owner_email')->unique();
            $table->string('truck_model');
            $table->string('truck_registration');
            $table->string('truck_chassis_number');
            $table->string('engine_number');
            $table->string('mileage');
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
        Schema::dropIfExists('truck_records');
    }
}
