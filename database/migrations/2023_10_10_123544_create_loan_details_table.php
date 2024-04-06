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
        Schema::create('loan_details', function (Blueprint $table) {
            $table->id();
            $table->string('ac_no'); 
            $table->string('loan_date'); 
            $table->integer('loan_amount'); 
            $table->integer('due_Amount'); 
            $table->integer('total_dues');
            $table->integer('paid_due'); 
            $table->integer('pend_due'); 
            $table->integer('pend_amount'); 
            $table->integer('default_amount'); 
            $table->integer('hl_Amount'); 
            $table->integer('total_pending'); 
            $table->date('due_start'); 
            $table->date('last_paid');
            $table->date('prom_date');
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
        Schema::dropIfExists('loan_details');
    }
};
