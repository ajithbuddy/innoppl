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
        Schema::create('party', function (Blueprint $table) {
            $table->id();
            $table->string('party_1_name');
            $table->text('party_1_address1')->nullable();
            $table->text('party_1_address2')->nullable();
            $table->text('party_1_address3')->nullable();
            $table->text('party_1_address4')->nullable();
            $table->text('party_1_address5')->nullable();
            $table->text('party_1_landmark')->nullable();
            $table->string('party_1_area')->nullable();
            $table->string('party_1_phone_no')->nullable();
            $table->string('party_1_phone_res')->nullable();
            $table->string('party_1_phone_off')->nullable();
            $table->decimal('party_1_lat', 11, 8)->nullable();
            $table->decimal('party_1_long', 11, 8)->nullable();
            $table->string('party_2_name')->nullable();
            $table->text('party_2_address1')->nullable();
            $table->text('party_2_address2')->nullable();
            $table->text('party_2_address3')->nullable();
            $table->text('party_2_address4')->nullable();
            $table->text('party_2_address5')->nullable();
            $table->text('party_2_landmark')->nullable();
            $table->string('party_2_area')->nullable();
            $table->string('party_2_phone_no')->nullable();
            $table->string('party_2_phone_res')->nullable();
            $table->string('party_2_phone_off')->nullable();
            $table->decimal('party_2_lat', 11, 8)->nullable();
            $table->decimal('party_2_long', 11, 8)->nullable();
            $table->string('reg_no')->nullable();
            $table->string('status')->default("Pending");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('party');
    }
};
