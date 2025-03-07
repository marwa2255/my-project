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
        Schema::create('distircts', function (Blueprint $table) {
            $table->id()->primary();
            $table->timestamps();
            $table->string('dist_name');
            $table->foreignid('gover_id')->constrained('governorates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distircts');
    }
};
