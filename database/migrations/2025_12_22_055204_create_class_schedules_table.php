<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('course_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('lecturer_id')->constrained()->onDelete('cascade');
            $table->string('day'); // Senin, Selasa, etc.
            $table->time('start_time');
            $table->time('end_time');
            $table->string('room');
            $table->string('academic_year')->default('2024/2025');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_schedules');
    }
};
