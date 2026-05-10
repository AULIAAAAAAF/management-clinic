<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('antrian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('booking')->onDelete('cascade');
            $table->integer('nomor_antrian');
            $table->enum('status', ['waiting', 'called', 'completed', 'skipped'])->default('waiting');
            $table->time('waktu_panggil')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('antrian');
    }
};