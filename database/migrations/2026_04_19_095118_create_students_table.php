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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim')->unique();
            $table->string('pkm_preference')->nullable();
            
            // Kita pakai JSON biar 48 jawaban bisa masuk ke 1 kolom, rapi banget!
            $table->json('raw_answers')->nullable(); 
            $table->json('dimension_scores')->nullable(); 
            
            $table->integer('total_score')->default(0);
            $table->string('classification')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};