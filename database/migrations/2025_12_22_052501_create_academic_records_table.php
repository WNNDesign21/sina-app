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
        Schema::create('academic_records', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('student_nim', 20);
            $table->string('student_name', 100);
            $table->uuid('course_id');
            $table->uuid('lecturer_id')->nullable();
            $table->decimal('p1_cs', 5, 2);
            $table->decimal('p1_pe', 5, 2);
            $table->decimal('p2_cs', 5, 2);
            $table->decimal('p2_pe', 5, 2);
            $table->decimal('final_grade', 5, 2);
            $table->char('grade_letter', 2);
            $table->decimal('grade_point', 3, 2);
            $table->string('integrity_hash', 255);
            $table->timestamps();

            // Composite unique constraint: one student can only have one grade per course
            $table->unique(['student_nim', 'course_id'], 'academic_records_student_nim_course_id_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_records');
    }
};
