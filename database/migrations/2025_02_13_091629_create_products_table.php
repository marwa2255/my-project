<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->primary();
            $table->timestamps();
            $table->integer('store_id')->index();
            $table->string('prod_name');
            $table->float('prod_price');
            $table->integer('prod_type_id')->index();
            $table->string('prod_description');
            $table->integer('stock_quantity');
            $table->string('discount');
            $table->string('prod_pic');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
