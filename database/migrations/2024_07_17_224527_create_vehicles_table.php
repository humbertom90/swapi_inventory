<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model');
            $table->string('manufacturer');
            $table->string('cost_in_credits');
            $table->string('length');
            $table->string('max_atmosphering_speed');
            $table->string('crew');
            $table->string('passengers');
            $table->string('cargo_capacity');
            $table->string('consumables');
            $table->string('vehicle_class')->nullable();
            $table->string('created');
            $table->string('edited');
            $table->string('url');
            $table->integer('count')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
