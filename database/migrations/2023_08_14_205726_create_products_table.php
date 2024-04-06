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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("product_name");
            $table->string("unit_type");
            $table->string("product_category");
            $table->text("product_images");
            $table->integer("product_price");
            $table->string("discount_percentage")->nullable();
            $table->integer("discount_amount")->nullable();
            $table->date("discount_start_date")->nullable();
            $table->date("discount_end_date")->nullable();
            $table->integer("tax_percentage")->nullable();
            $table->integer("tax_amount")->nullable();
            $table->string("stock_quantity")->default(0);
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
        Schema::dropIfExists('products');
    }
};
