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
        Schema::create('guarantee', function (Blueprint $table) {
            $table->id();
            $table->string('grnt_1_name');
            $table->text('grnt_1_Address1')->nullable();
            $table->text('grnt_1_Address2')->nullable();
            $table->text('grnt_1_Address3')->nullable();
            $table->text('grnt_1_Address4')->nullable();
            $table->string('grnt_1_phone_no')->nullable();
            $table->decimal('grnt_1_lat', 11, 8)->nullable();
            $table->decimal('grnt_1_long', 11, 8)->nullable();
            $table->string('grnt_2_name')->nullable();
            $table->text('grnt_2_Address1')->nullable();
            $table->text('grnt_2_Address2')->nullable();
            $table->text('grnt_2_Address3')->nullable();
            $table->text('grnt_2_Address4')->nullable();
            $table->string('grnt_2_phone_no')->nullable();
            $table->decimal('grnt_2_lat', 11, 8)->nullable();
            $table->decimal('grnt_2_long', 11, 8)->nullable();
            $table->integer('client_id');
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
        Schema::dropIfExists('guarantors');
    }
};
