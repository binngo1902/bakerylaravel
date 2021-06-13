<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BillsProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bill')->constrained('bills')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_product')->constrained('products')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantity');
            $table->double('unit_price');
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
        Schema::dropIfExists('bills_products');
    }
}
