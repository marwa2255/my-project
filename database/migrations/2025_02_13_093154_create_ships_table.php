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
        Schema::create('ships', function (Blueprint $table) {
            $table->id()->primary();
            $table->timestamps();
            $table->string('ship_type');
            $table->date('ship_cdate');
            $table->string ('ship_from');
            $table->string ('ship_to');
            $table->float('ship_cost');
            $table->integer('user_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ships');
    }
};
