<?php

namespace Tests\Feature\GradeInput;

use Tests\TestCase;
use App\Models\User;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Course;
use App\Models\AcademicRecord;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GradeInputSuccessTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test: Dosen dapat input nilai dengan data valid
     * 
     * @test
     */
    public function dosen_can_successfully_input_grades_with_valid_data()
    {
        // Arrange - Setup data
        $user = User::factory()->create([
            'username' => '198503152010121002',
            'role' => 'dosen'
        ]);

        $lecturer = Lecturer::factory()->create([
            'user_id' => $user->id,
            'name' => 'Taufiq Hidayatullah'
        ]);

        $student = Student::factory()->create([
            'nim' => '433785520123200185',
            'name' => 'Wendi Nugraha Nurrahmansyah'
        ]);

        $course = Course::factory()->create([
            'code' => 'IF101',
            'name' => 'Proyek Database dan Backend',
            'sks' => 4
        ]);

        $gradeData = [
            'student_id' => $student->id,
            'course_id' => $course->id,
            'p1_cs' => 85.00,
            'p1_pe' => 90.00,
            'p2_cs' => 88.00,
            'p2_pe' => 92.00,
        ];

        // Act - Execute action
        $response = $this->actingAs($user)
            ->post('/dashboard/grade', $gradeData);

        // Assert - Verify results
        $response->assertRedirect('/dashboard');
        $response->assertSessionHas('success');

        // Verify database
        $this->assertDatabaseHas('academic_records', [
            'student_nim' => $student->nim,
            'course_id' => $course->id,
            'lecturer_id' => $lecturer->id,
            'p1_cs' => 85.00,
            'p1_pe' => 90.00,
            'p2_cs' => 88.00,
            'p2_pe' => 92.00,
        ]);

        // Verify grade calculation
        $record = AcademicRecord::where('student_nim', $student->nim)
            ->where('course_id', $course->id)
            ->first();

        $this->assertNotNull($record);
        $this->assertNotNull($record->grade_letter);
        $this->assertNotNull($record->grade_point);
        $this->assertNotNull($record->integrity_hash);
    }
}
