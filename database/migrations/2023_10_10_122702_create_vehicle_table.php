<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('model');
            $table->string('colour');
            $table->string('mfg_year'); 
            $table->string('chasis');
            $table->string('engine'); 
            $table->string('ins_exp')->nullable(); 
            $table->string('broker')->nullable(); 
            $table->string('dealer')->nullable();
            $table->string('company')->nullable();
            $table->integer('client_id');
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
        Schema::dropIfExists('vehicle');
    }
};
