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
        Schema::create('drivo_users', function (Blueprint $table) {
            $table->id()->primary();
            $table->timestamps();
            $table->string('user_name');
            $table->string('user_email');
            $table->foreignid('distircts_id')->constrained('districts');
            $table->string('user_password');
            $table->integer('user_phone');
            $table->foreignid('user_type_id')->constrained('user_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivo_users');
    }
};
