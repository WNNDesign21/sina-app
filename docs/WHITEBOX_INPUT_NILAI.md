# White Box Testing - Input Nilai (Grade Input Process)

## 📋 Overview

Dokumen ini berisi panduan lengkap white box testing untuk **proses input nilai** pada aplikasi SINA Secure. Testing mencakup semua komponen yang terlibat dalam flow input nilai dari validasi input hingga penyimpanan data dengan integrity hash.

**Scope:** Proses Input Nilai  
**Testing Period:** [Start Date] - [End Date]  
**Tester:** [Your Name]  
**Version:** 1.0.0

---

## 🎯 Komponen yang Ditest

### 1. **Controller**
- `DashboardController@store` - Method untuk menerima dan memproses input nilai

### 2. **Service**
- `GradeCalculationService` - Service untuk kalkulasi nilai dan grade

### 3. **Model**
- `AcademicRecord` - Model untuk menyimpan data nilai

### 4. **Validation**
- Request validation rules
- Business logic validation

### 5. **Data Integrity**
- Integrity hash generation
- Data immutability

---

## 📊 Test Coverage Target

| Component | Target Coverage | Actual Coverage | Status |
|-----------|----------------|-----------------|--------|
| Controller (store method) | 100% | 0% | ⏳ Pending |
| GradeCalculationService | 100% | 0% | ⏳ Pending |
| Validation Rules | 100% | 0% | ⏳ Pending |
| Integrity Hash | 100% | 0% | ⏳ Pending |
| **Overall** | **100%** | **0%** | **⏳ Pending** |

---

## 🧪 Test Cases

### SECTION 1: Controller Testing

#### TEST-CTRL-INPUT-001: Successful Grade Input
**Priority:** Critical  
**Status:** ⏳ Pending  
**Coverage:** Controller logic, Happy path

**Objective:**  
Memastikan dosen dapat input nilai dengan data yang valid dan nilai tersimpan dengan benar di database.

**Test Code:**
```php
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
            'student_nim' => $student->nim,
            'course_id' => $course->id,
            'p1_cs' => 85.00,
            'p1_pe' => 90.00,
            'p2_cs' => 88.00,
            'p2_pe' => 92.00,
            'final_grade' => 87.00,
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
            'final_grade' => 87.00,
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
```

**Expected Results:**
- ✅ Response redirect ke `/dashboard`
- ✅ Session memiliki pesan `success`
- ✅ Data tersimpan di database dengan benar
- ✅ `grade_letter` dan `grade_point` ter-generate
- ✅ `integrity_hash` ter-generate

**Actual Results:**
[To be filled during testing]

**Status:** ⏳ Pending

---

#### TEST-CTRL-INPUT-002: Validation - Missing Required Fields
**Priority:** High  
**Status:** ⏳ Pending  
**Coverage:** Input validation

**Objective:**  
Memastikan sistem menolak input jika ada field yang required tidak diisi.

**Test Code:**
```php
<?php

namespace Tests\Feature\GradeInput;

use Tests\TestCase;
use App\Models\User;
use App\Models\Lecturer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GradeInputValidationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test: Validation gagal jika field required kosong
     * 
     * @test
     */
    public function validation_fails_when_required_fields_are_missing()
    {
        // Arrange
        $user = User::factory()->create(['role' => 'dosen']);
        Lecturer::factory()->create(['user_id' => $user->id]);

        // Act - Submit dengan data kosong
        $response = $this->actingAs($user)
            ->post('/dashboard/grade', []);

        // Assert
        $response->assertSessionHasErrors([
            'student_nim',
            'course_id',
            'p1_cs',
            'p1_pe',
            'p2_cs',
            'p2_pe',
            'final_grade',
        ]);
        
        // Verify tidak ada data tersimpan
        $this->assertDatabaseCount('academic_records', 0);
    }

    /**
     * Test: Validation gagal jika student_nim kosong
     * 
     * @test
     */
    public function validation_fails_when_student_nim_is_missing()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        Lecturer::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->post('/dashboard/grade', [
                'course_id' => 1,
                'p1_cs' => 85.00,
                'p1_pe' => 90.00,
                'p2_cs' => 88.00,
                'p2_pe' => 92.00,
                'final_grade' => 87.00,
            ]);

        $response->assertSessionHasErrors('student_nim');
    }

    /**
     * Test: Validation gagal jika course_id kosong
     * 
     * @test
     */
    public function validation_fails_when_course_id_is_missing()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        Lecturer::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->post('/dashboard/grade', [
                'student_nim' => '433785520123200185',
                'p1_cs' => 85.00,
                'p1_pe' => 90.00,
                'p2_cs' => 88.00,
                'p2_pe' => 92.00,
                'final_grade' => 87.00,
            ]);

        $response->assertSessionHasErrors('course_id');
    }
}
```

**Expected Results:**
- ✅ Validation errors untuk semua field required
- ✅ Tidak ada data tersimpan di database
- ✅ User tetap di halaman yang sama

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TEST-CTRL-INPUT-003: Validation - Invalid Data Types
**Priority:** High  
**Status:** ⏳ Pending  
**Coverage:** Data type validation

**Objective:**  
Memastikan sistem menolak input dengan tipe data yang salah.

**Test Code:**
```php
<?php

namespace Tests\Feature\GradeInput;

use Tests\TestCase;
use App\Models\User;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GradeInputDataTypeValidationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test: Validation gagal jika nilai bukan numeric
     * 
     * @test
     */
    public function validation_fails_when_grades_are_not_numeric()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        Lecturer::factory()->create(['user_id' => $user->id]);
        $student = Student::factory()->create();
        $course = Course::factory()->create();

        $response = $this->actingAs($user)
            ->post('/dashboard/grade', [
                'student_nim' => $student->nim,
                'course_id' => $course->id,
                'p1_cs' => 'abc',  // Invalid: string
                'p1_pe' => 'xyz',  // Invalid: string
                'p2_cs' => 88.00,
                'p2_pe' => 92.00,
                'final_grade' => 87.00,
            ]);

        $response->assertSessionHasErrors(['p1_cs', 'p1_pe']);
    }

    /**
     * Test: Validation gagal jika nilai di luar range 0-100
     * 
     * @test
     */
    public function validation_fails_when_grades_are_out_of_range()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        Lecturer::factory()->create(['user_id' => $user->id]);
        $student = Student::factory()->create();
        $course = Course::factory()->create();

        // Test nilai > 100
        $response = $this->actingAs($user)
            ->post('/dashboard/grade', [
                'student_nim' => $student->nim,
                'course_id' => $course->id,
                'p1_cs' => 150.00,  // Invalid: > 100
                'p1_pe' => 90.00,
                'p2_cs' => 88.00,
                'p2_pe' => 92.00,
                'final_grade' => 87.00,
            ]);

        $response->assertSessionHasErrors('p1_cs');

        // Test nilai < 0
        $response = $this->actingAs($user)
            ->post('/dashboard/grade', [
                'student_nim' => $student->nim,
                'course_id' => $course->id,
                'p1_cs' => -10.00,  // Invalid: < 0
                'p1_pe' => 90.00,
                'p2_cs' => 88.00,
                'p2_pe' => 92.00,
                'final_grade' => 87.00,
            ]);

        $response->assertSessionHasErrors('p1_cs');
    }

    /**
     * Test: Validation gagal jika student tidak exist
     * 
     * @test
     */
    public function validation_fails_when_student_does_not_exist()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        Lecturer::factory()->create(['user_id' => $user->id]);
        $course = Course::factory()->create();

        $response = $this->actingAs($user)
            ->post('/dashboard/grade', [
                'student_nim' => '999999999999999999',  // Non-existent NIM
                'course_id' => $course->id,
                'p1_cs' => 85.00,
                'p1_pe' => 90.00,
                'p2_cs' => 88.00,
                'p2_pe' => 92.00,
                'final_grade' => 87.00,
            ]);

        $response->assertSessionHasErrors('student_nim');
    }

    /**
     * Test: Validation gagal jika course tidak exist
     * 
     * @test
     */
    public function validation_fails_when_course_does_not_exist()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        Lecturer::factory()->create(['user_id' => $user->id]);
        $student = Student::factory()->create();

        $response = $this->actingAs($user)
            ->post('/dashboard/grade', [
                'student_nim' => $student->nim,
                'course_id' => 99999,  // Non-existent course ID
                'p1_cs' => 85.00,
                'p1_pe' => 90.00,
                'p2_cs' => 88.00,
                'p2_pe' => 92.00,
                'final_grade' => 87.00,
            ]);

        $response->assertSessionHasErrors('course_id');
    }
}
```

**Expected Results:**
- ✅ Validation error untuk nilai non-numeric
- ✅ Validation error untuk nilai di luar range 0-100
- ✅ Validation error untuk student/course yang tidak exist

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TEST-CTRL-INPUT-004: Authorization - Only Dosen Can Input
**Priority:** Critical  
**Status:** ⏳ Pending  
**Coverage:** Authorization

**Objective:**  
Memastikan hanya user dengan role 'dosen' yang dapat input nilai.

**Test Code:**
```php
<?php

namespace Tests\Feature\GradeInput;

use Tests\TestCase;
use App\Models\User;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GradeInputAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test: Mahasiswa tidak dapat input nilai
     * 
     * @test
     */
    public function mahasiswa_cannot_input_grades()
    {
        $user = User::factory()->create(['role' => 'mahasiswa']);
        $student = Student::factory()->create();
        $course = Course::factory()->create();

        $response = $this->actingAs($user)
            ->post('/dashboard/grade', [
                'student_nim' => $student->nim,
                'course_id' => $course->id,
                'p1_cs' => 85.00,
                'p1_pe' => 90.00,
                'p2_cs' => 88.00,
                'p2_pe' => 92.00,
                'final_grade' => 87.00,
            ]);

        // Should redirect or return error
        $response->assertRedirect('/dashboard');
        $response->assertSessionHas('error');
        
        // Verify no data saved
        $this->assertDatabaseCount('academic_records', 0);
    }

    /**
     * Test: Unauthenticated user tidak dapat input nilai
     * 
     * @test
     */
    public function unauthenticated_user_cannot_input_grades()
    {
        $student = Student::factory()->create();
        $course = Course::factory()->create();

        $response = $this->post('/dashboard/grade', [
            'student_nim' => $student->nim,
            'course_id' => $course->id,
            'p1_cs' => 85.00,
            'p1_pe' => 90.00,
            'p2_cs' => 88.00,
            'p2_pe' => 92.00,
            'final_grade' => 87.00,
        ]);

        $response->assertRedirect('/');  // Redirect to login
        $this->assertDatabaseCount('academic_records', 0);
    }
}
```

**Expected Results:**
- ✅ Mahasiswa tidak dapat input nilai
- ✅ Unauthenticated user redirect ke login
- ✅ Tidak ada data tersimpan

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

### SECTION 2: Service Testing (GradeCalculationService)

#### TEST-SVC-INPUT-001: Grade Calculation Formula
**Priority:** Critical  
**Status:** ⏳ Pending  
**Coverage:** Business logic calculation

**Objective:**  
Memastikan formula perhitungan nilai sesuai dengan spesifikasi:
- P1 (30%): CS (15%) + PE (15%)
- P2 (30%): CS (15%) + PE (15%)
- Final (40%)

**Test Code:**
```php
<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\GradeCalculationService;

class GradeCalculationFormulaTest extends TestCase
{
    protected $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new GradeCalculationService();
    }

    /**
     * Test: Formula perhitungan nilai benar
     * 
     * @test
     */
    public function it_calculates_final_grade_correctly_with_standard_values()
    {
        $result = $this->service->calculateGrade(
            p1_cs: 85.00,
            p1_pe: 90.00,
            p2_cs: 88.00,
            p2_pe: 92.00,
            final_grade: 87.00
        );

        // Manual calculation:
        // P1 CS: 85 * 0.15 = 12.75
        // P1 PE: 90 * 0.15 = 13.50
        // P2 CS: 88 * 0.15 = 13.20
        // P2 PE: 92 * 0.15 = 13.80
        // Final: 87 * 0.40 = 34.80
        // Total: 88.05

        $this->assertEquals(88.05, $result['final_grade']);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('final_grade', $result);
        $this->assertArrayHasKey('grade_letter', $result);
        $this->assertArrayHasKey('grade_point', $result);
    }

    /**
     * Test: Perhitungan dengan nilai perfect (100)
     * 
     * @test
     */
    public function it_calculates_correctly_with_perfect_scores()
    {
        $result = $this->service->calculateGrade(
            p1_cs: 100.00,
            p1_pe: 100.00,
            p2_cs: 100.00,
            p2_pe: 100.00,
            final_grade: 100.00
        );

        // Expected: 100 * 0.15 * 4 + 100 * 0.40 = 60 + 40 = 100
        $this->assertEquals(100.00, $result['final_grade']);
        $this->assertEquals('A', $result['grade_letter']);
        $this->assertEquals(4.00, $result['grade_point']);
    }

    /**
     * Test: Perhitungan dengan nilai minimum (0)
     * 
     * @test
     */
    public function it_calculates_correctly_with_minimum_scores()
    {
        $result = $this->service->calculateGrade(
            p1_cs: 0.00,
            p1_pe: 0.00,
            p2_cs: 0.00,
            p2_pe: 0.00,
            final_grade: 0.00
        );

        $this->assertEquals(0.00, $result['final_grade']);
        $this->assertEquals('E', $result['grade_letter']);
        $this->assertEquals(0.00, $result['grade_point']);
    }

    /**
     * Test: Perhitungan dengan nilai desimal
     * 
     * @test
     */
    public function it_handles_decimal_values_correctly()
    {
        $result = $this->service->calculateGrade(
            p1_cs: 85.50,
            p1_pe: 90.25,
            p2_cs: 88.75,
            p2_pe: 92.50,
            final_grade: 87.25
        );

        // Manual calculation:
        // 85.50*0.15 + 90.25*0.15 + 88.75*0.15 + 92.50*0.15 + 87.25*0.40
        // = 12.825 + 13.5375 + 13.3125 + 13.875 + 34.9 = 88.45

        $this->assertEquals(88.45, $result['final_grade']);
    }

    /**
     * Test: Pembulatan nilai
     * 
     * @test
     */
    public function it_rounds_final_grade_to_two_decimal_places()
    {
        $result = $this->service->calculateGrade(
            p1_cs: 85.333,
            p1_pe: 90.666,
            p2_cs: 88.999,
            p2_pe: 92.111,
            final_grade: 87.555
        );

        // Result should be rounded to 2 decimal places
        $this->assertMatchesRegularExpression('/^\d+\.\d{2}$/', (string)$result['final_grade']);
    }
}
```

**Expected Results:**
- ✅ Formula perhitungan sesuai spesifikasi
- ✅ Handle perfect scores (100)
- ✅ Handle minimum scores (0)
- ✅ Handle decimal values
- ✅ Pembulatan 2 desimal

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TEST-SVC-INPUT-002: Grade Letter Conversion
**Priority:** Critical  
**Status:** ⏳ Pending  
**Coverage:** Grade letter mapping

**Objective:**  
Memastikan konversi nilai numerik ke grade letter sesuai ketentuan.

**Test Code:**
```php
<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\GradeCalculationService;

class GradeLetterConversionTest extends TestCase
{
    protected $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new GradeCalculationService();
    }

    /**
     * Test: Grade A (85-100)
     * 
     * @test
     */
    public function it_returns_grade_A_for_scores_85_to_100()
    {
        $this->assertEquals('A', $this->service->getGradeLetter(100.00));
        $this->assertEquals('A', $this->service->getGradeLetter(90.00));
        $this->assertEquals('A', $this->service->getGradeLetter(85.00));
    }

    /**
     * Test: Grade A- (80-84.99)
     * 
     * @test
     */
    public function it_returns_grade_A_minus_for_scores_80_to_84_99()
    {
        $this->assertEquals('A-', $this->service->getGradeLetter(84.99));
        $this->assertEquals('A-', $this->service->getGradeLetter(82.00));
        $this->assertEquals('A-', $this->service->getGradeLetter(80.00));
    }

    /**
     * Test: Grade B+ (75-79.99)
     * 
     * @test
     */
    public function it_returns_grade_B_plus_for_scores_75_to_79_99()
    {
        $this->assertEquals('B+', $this->service->getGradeLetter(79.99));
        $this->assertEquals('B+', $this->service->getGradeLetter(77.00));
        $this->assertEquals('B+', $this->service->getGradeLetter(75.00));
    }

    /**
     * Test: Grade B (70-74.99)
     * 
     * @test
     */
    public function it_returns_grade_B_for_scores_70_to_74_99()
    {
        $this->assertEquals('B', $this->service->getGradeLetter(74.99));
        $this->assertEquals('B', $this->service->getGradeLetter(72.00));
        $this->assertEquals('B', $this->service->getGradeLetter(70.00));
    }

    /**
     * Test: Grade B- (65-69.99)
     * 
     * @test
     */
    public function it_returns_grade_B_minus_for_scores_65_to_69_99()
    {
        $this->assertEquals('B-', $this->service->getGradeLetter(69.99));
        $this->assertEquals('B-', $this->service->getGradeLetter(67.00));
        $this->assertEquals('B-', $this->service->getGradeLetter(65.00));
    }

    /**
     * Test: Grade C+ (60-64.99)
     * 
     * @test
     */
    public function it_returns_grade_C_plus_for_scores_60_to_64_99()
    {
        $this->assertEquals('C+', $this->service->getGradeLetter(64.99));
        $this->assertEquals('C+', $this->service->getGradeLetter(62.00));
        $this->assertEquals('C+', $this->service->getGradeLetter(60.00));
    }

    /**
     * Test: Grade C (55-59.99)
     * 
     * @test
     */
    public function it_returns_grade_C_for_scores_55_to_59_99()
    {
        $this->assertEquals('C', $this->service->getGradeLetter(59.99));
        $this->assertEquals('C', $this->service->getGradeLetter(57.00));
        $this->assertEquals('C', $this->service->getGradeLetter(55.00));
    }

    /**
     * Test: Grade D (50-54.99)
     * 
     * @test
     */
    public function it_returns_grade_D_for_scores_50_to_54_99()
    {
        $this->assertEquals('D', $this->service->getGradeLetter(54.99));
        $this->assertEquals('D', $this->service->getGradeLetter(52.00));
        $this->assertEquals('D', $this->service->getGradeLetter(50.00));
    }

    /**
     * Test: Grade E (0-49.99)
     * 
     * @test
     */
    public function it_returns_grade_E_for_scores_0_to_49_99()
    {
        $this->assertEquals('E', $this->service->getGradeLetter(49.99));
        $this->assertEquals('E', $this->service->getGradeLetter(25.00));
        $this->assertEquals('E', $this->service->getGradeLetter(0.00));
    }

    /**
     * Test: Boundary values
     * 
     * @test
     */
    public function it_handles_boundary_values_correctly()
    {
        // Test exact boundaries
        $this->assertEquals('A', $this->service->getGradeLetter(85.00));
        $this->assertEquals('A-', $this->service->getGradeLetter(84.99));
        $this->assertEquals('A-', $this->service->getGradeLetter(80.00));
        $this->assertEquals('B+', $this->service->getGradeLetter(79.99));
    }
}
```

**Expected Results:**
- ✅ Semua grade letter mapping benar
- ✅ Boundary values handled correctly
- ✅ Tidak ada overlap antar grade

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TEST-SVC-INPUT-003: Grade Point Conversion
**Priority:** High  
**Status:** ⏳ Pending  
**Coverage:** Grade point mapping

**Objective:**  
Memastikan konversi grade letter ke grade point benar.

**Test Code:**
```php
<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\GradeCalculationService;

class GradePointConversionTest extends TestCase
{
    protected $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new GradeCalculationService();
    }

    /**
     * Test: Grade point mapping untuk semua grade letter
     * 
     * @test
     */
    public function it_returns_correct_grade_points_for_all_grade_letters()
    {
        $gradePoints = [
            'A' => 4.00,
            'A-' => 3.75,
            'B+' => 3.50,
            'B' => 3.00,
            'B-' => 2.75,
            'C+' => 2.50,
            'C' => 2.00,
            'D' => 1.00,
            'E' => 0.00,
        ];

        foreach ($gradePoints as $letter => $expectedPoint) {
            $actualPoint = $this->service->getGradePoint($letter);
            $this->assertEquals(
                $expectedPoint,
                $actualPoint,
                "Grade point for {$letter} should be {$expectedPoint}, got {$actualPoint}"
            );
        }
    }

    /**
     * Test: Invalid grade letter
     * 
     * @test
     */
    public function it_returns_zero_for_invalid_grade_letter()
    {
        $this->assertEquals(0.00, $this->service->getGradePoint('X'));
        $this->assertEquals(0.00, $this->service->getGradePoint('F'));
        $this->assertEquals(0.00, $this->service->getGradePoint(''));
    }

    /**
     * Test: Case sensitivity
     * 
     * @test
     */
    public function it_handles_case_sensitivity_correctly()
    {
        // Should handle uppercase
        $this->assertEquals(4.00, $this->service->getGradePoint('A'));
        
        // Should handle lowercase (if applicable)
        // Uncomment if service supports lowercase
        // $this->assertEquals(4.00, $this->service->getGradePoint('a'));
    }
}
```

**Expected Results:**
- ✅ Semua grade point mapping benar
- ✅ Invalid grade letter return 0.00
- ✅ Case sensitivity handled

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

### SECTION 3: Data Integrity Testing

#### TEST-INT-INPUT-001: Integrity Hash Generation
**Priority:** Critical  
**Status:** ⏳ Pending  
**Coverage:** Data integrity

**Objective:**  
Memastikan integrity hash di-generate dengan benar untuk setiap record.

**Test Code:**
```php
<?php

namespace Tests\Feature\GradeInput;

use Tests\TestCase;
use App\Models\User;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Course;
use App\Models\AcademicRecord;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IntegrityHashGenerationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test: Integrity hash ter-generate otomatis
     * 
     * @test
     */
    public function integrity_hash_is_automatically_generated_on_grade_input()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        $lecturer = Lecturer::factory()->create(['user_id' => $user->id]);
        $student = Student::factory()->create();
        $course = Course::factory()->create();

        $this->actingAs($user)->post('/dashboard/grade', [
            'student_nim' => $student->nim,
            'course_id' => $course->id,
            'p1_cs' => 85.00,
            'p1_pe' => 90.00,
            'p2_cs' => 88.00,
            'p2_pe' => 92.00,
            'final_grade' => 87.00,
        ]);

        $record = AcademicRecord::where('student_nim', $student->nim)->first();

        $this->assertNotNull($record->integrity_hash);
        $this->assertIsString($record->integrity_hash);
    }

    /**
     * Test: Integrity hash format SHA-256 (64 characters)
     * 
     * @test
     */
    public function integrity_hash_has_correct_sha256_format()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        $lecturer = Lecturer::factory()->create(['user_id' => $user->id]);
        $student = Student::factory()->create();
        $course = Course::factory()->create();

        $this->actingAs($user)->post('/dashboard/grade', [
            'student_nim' => $student->nim,
            'course_id' => $course->id,
            'p1_cs' => 85.00,
            'p1_pe' => 90.00,
            'p2_cs' => 88.00,
            'p2_pe' => 92.00,
            'final_grade' => 87.00,
        ]);

        $record = AcademicRecord::where('student_nim', $student->nim)->first();

        // SHA-256 hash should be 64 characters long
        $this->assertEquals(64, strlen($record->integrity_hash));
        
        // Should only contain hexadecimal characters
        $this->assertMatchesRegularExpression('/^[a-f0-9]{64}$/', $record->integrity_hash);
    }

    /**
     * Test: Integrity hash unique untuk setiap record
     * 
     * @test
     */
    public function integrity_hash_is_unique_for_each_record()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        $lecturer = Lecturer::factory()->create(['user_id' => $user->id]);
        $student1 = Student::factory()->create();
        $student2 = Student::factory()->create();
        $course = Course::factory()->create();

        // Input nilai untuk student 1
        $this->actingAs($user)->post('/dashboard/grade', [
            'student_nim' => $student1->nim,
            'course_id' => $course->id,
            'p1_cs' => 85.00,
            'p1_pe' => 90.00,
            'p2_cs' => 88.00,
            'p2_pe' => 92.00,
            'final_grade' => 87.00,
        ]);

        // Input nilai untuk student 2 (nilai sama)
        $this->actingAs($user)->post('/dashboard/grade', [
            'student_nim' => $student2->nim,
            'course_id' => $course->id,
            'p1_cs' => 85.00,
            'p1_pe' => 90.00,
            'p2_cs' => 88.00,
            'p2_pe' => 92.00,
            'final_grade' => 87.00,
        ]);

        $record1 = AcademicRecord::where('student_nim', $student1->nim)->first();
        $record2 = AcademicRecord::where('student_nim', $student2->nim)->first();

        // Hash harus berbeda meskipun nilai sama (karena NIM berbeda)
        $this->assertNotEquals($record1->integrity_hash, $record2->integrity_hash);
    }

    /**
     * Test: Integrity hash konsisten untuk data yang sama
     * 
     * @test
     */
    public function integrity_hash_is_consistent_for_same_data()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        $lecturer = Lecturer::factory()->create(['user_id' => $user->id]);
        $student = Student::factory()->create();
        $course = Course::factory()->create();

        $gradeData = [
            'student_nim' => $student->nim,
            'course_id' => $course->id,
            'p1_cs' => 85.00,
            'p1_pe' => 90.00,
            'p2_cs' => 88.00,
            'p2_pe' => 92.00,
            'final_grade' => 87.00,
        ];

        // Input pertama
        $this->actingAs($user)->post('/dashboard/grade', $gradeData);
        $record1 = AcademicRecord::where('student_nim', $student->nim)->first();
        $hash1 = $record1->integrity_hash;

        // Hapus record
        $record1->delete();

        // Input kedua dengan data yang sama
        $this->actingAs($user)->post('/dashboard/grade', $gradeData);
        $record2 = AcademicRecord::where('student_nim', $student->nim)->first();
        $hash2 = $record2->integrity_hash;

        // Hash harus sama untuk data yang sama
        // Note: Ini tergantung apakah timestamp dimasukkan dalam hash
        // Jika timestamp included, hash akan berbeda
        // Adjust assertion sesuai implementasi
        
        // If timestamp NOT included in hash:
        // $this->assertEquals($hash1, $hash2);
        
        // If timestamp IS included in hash:
        // $this->assertNotEquals($hash1, $hash2);
    }
}
```

**Expected Results:**
- ✅ Hash ter-generate otomatis
- ✅ Format SHA-256 (64 hex characters)
- ✅ Hash unique untuk setiap record
- ✅ Hash konsisten untuk data sama (jika tidak ada timestamp)

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TEST-INT-INPUT-002: Data Immutability
**Priority:** Critical  
**Status:** ⏳ Pending  
**Coverage:** Data integrity

**Objective:**  
Memastikan data nilai tidak dapat diubah setelah disimpan (immutable).

**Test Code:**
```php
<?php

namespace Tests\Feature\GradeInput;

use Tests\TestCase;
use App\Models\User;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Course;
use App\Models\AcademicRecord;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DataImmutabilityTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test: Tidak ada endpoint untuk update nilai
     * 
     * @test
     */
    public function there_is_no_endpoint_to_update_existing_grades()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        $lecturer = Lecturer::factory()->create(['user_id' => $user->id]);
        $student = Student::factory()->create();
        $course = Course::factory()->create();

        // Create a record
        $record = AcademicRecord::factory()->create([
            'student_nim' => $student->nim,
            'course_id' => $course->id,
            'lecturer_id' => $lecturer->id,
        ]);

        // Try to update via PUT/PATCH (should not exist)
        $response = $this->actingAs($user)
            ->put("/dashboard/grade/{$record->id}", [
                'p1_cs' => 100.00,
            ]);

        // Should return 404 or 405 (Method Not Allowed)
        $this->assertTrue(
            $response->status() === 404 || $response->status() === 405,
            "Update endpoint should not exist"
        );
    }

    /**
     * Test: Duplicate entry prevention
     * 
     * @test
     */
    public function cannot_input_duplicate_grade_for_same_student_and_course()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        $lecturer = Lecturer::factory()->create(['user_id' => $user->id]);
        $student = Student::factory()->create();
        $course = Course::factory()->create();

        $gradeData = [
            'student_nim' => $student->nim,
            'course_id' => $course->id,
            'p1_cs' => 85.00,
            'p1_pe' => 90.00,
            'p2_cs' => 88.00,
            'p2_pe' => 92.00,
            'final_grade' => 87.00,
        ];

        // First input - should succeed
        $response1 = $this->actingAs($user)
            ->post('/dashboard/grade', $gradeData);
        $response1->assertRedirect('/dashboard');

        // Second input - should fail (duplicate)
        $response2 = $this->actingAs($user)
            ->post('/dashboard/grade', $gradeData);
        
        $response2->assertSessionHasErrors();
        
        // Should only have 1 record
        $this->assertEquals(1, AcademicRecord::where('student_nim', $student->nim)
            ->where('course_id', $course->id)
            ->count());
    }

    /**
     * Test: Integrity hash tidak berubah setelah disimpan
     * 
     * @test
     */
    public function integrity_hash_remains_unchanged_after_save()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        $lecturer = Lecturer::factory()->create(['user_id' => $user->id]);
        $student = Student::factory()->create();
        $course = Course::factory()->create();

        $this->actingAs($user)->post('/dashboard/grade', [
            'student_nim' => $student->nim,
            'course_id' => $course->id,
            'p1_cs' => 85.00,
            'p1_pe' => 90.00,
            'p2_cs' => 88.00,
            'p2_pe' => 92.00,
            'final_grade' => 87.00,
        ]);

        $record = AcademicRecord::where('student_nim', $student->nim)->first();
        $originalHash = $record->integrity_hash;

        // Simulate time passing
        sleep(1);

        // Refresh from database
        $record->refresh();
        
        // Hash should remain the same
        $this->assertEquals($originalHash, $record->integrity_hash);
    }
}
```

**Expected Results:**
- ✅ Tidak ada endpoint untuk update
- ✅ Duplicate entry dicegah
- ✅ Integrity hash tidak berubah

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

### SECTION 4: Integration Testing

#### TEST-INTEG-INPUT-001: Complete Grade Input Flow
**Priority:** Critical  
**Status:** ⏳ Pending  
**Coverage:** End-to-end flow

**Objective:**  
Test complete flow dari login sampai data tersimpan dengan integrity hash.

**Test Code:**
```php
<?php

namespace Tests\Feature\GradeInput;

use Tests\TestCase;
use App\Models\User;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Course;
use App\Models\AcademicRecord;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompleteGradeInputFlowTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test: Complete flow dari login hingga data tersimpan
     * 
     * @test
     */
    public function complete_grade_input_flow_works_end_to_end()
    {
        // 1. Setup - Create all necessary data
        $user = User::factory()->create([
            'username' => '198503152010121002',
            'password' => bcrypt('password'),
            'role' => 'dosen'
        ]);
        
        $lecturer = Lecturer::factory()->create([
            'user_id' => $user->id,
            'name' => 'Taufiq Hidayatullah',
            'nidn' => '0015058501'
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

        // 2. Login
        $loginResponse = $this->post('/login', [
            'username' => '198503152010121002',
            'password' => 'password'
        ]);
        
        $loginResponse->assertRedirect('/dashboard');
        $this->assertAuthenticated();

        // 3. View Dashboard
        $dashboardResponse = $this->get('/dashboard');
        $dashboardResponse->assertStatus(200);
        $dashboardResponse->assertViewIs('dashboard');

        // 4. Input Grades
        $gradeData = [
            'student_nim' => $student->nim,
            'course_id' => $course->id,
            'p1_cs' => 85.00,
            'p1_pe' => 90.00,
            'p2_cs' => 88.00,
            'p2_pe' => 92.00,
            'final_grade' => 87.00,
        ];

        $gradeResponse = $this->post('/dashboard/grade', $gradeData);
        $gradeResponse->assertRedirect('/dashboard');
        $gradeResponse->assertSessionHas('success');

        // 5. Verify Data in Database
        $this->assertDatabaseHas('academic_records', [
            'student_nim' => $student->nim,
            'course_id' => $course->id,
            'lecturer_id' => $lecturer->id,
            'p1_cs' => 85.00,
            'p1_pe' => 90.00,
            'p2_cs' => 88.00,
            'p2_pe' => 92.00,
            'final_grade' => 87.00,
        ]);

        // 6. Verify Calculated Fields
        $record = AcademicRecord::where('student_nim', $student->nim)
            ->where('course_id', $course->id)
            ->first();

        $this->assertNotNull($record);
        $this->assertNotNull($record->grade_letter);
        $this->assertNotNull($record->grade_point);
        $this->assertNotNull($record->integrity_hash);
        $this->assertNotNull($record->student_name);
        
        // Verify grade calculation
        // Expected: (85*0.15) + (90*0.15) + (88*0.15) + (92*0.15) + (87*0.40) = 88.05
        // Grade letter for 88.05 should be 'A'
        $this->assertEquals('A', $record->grade_letter);
        $this->assertEquals(4.00, $record->grade_point);

        // 7. Verify Integrity Hash Format
        $this->assertEquals(64, strlen($record->integrity_hash));
        $this->assertMatchesRegularExpression('/^[a-f0-9]{64}$/', $record->integrity_hash);

        // 8. Verify Timestamps
        $this->assertNotNull($record->created_at);
        $this->assertNotNull($record->updated_at);
    }

    /**
     * Test: Flow dengan multiple students
     * 
     * @test
     */
    public function can_input_grades_for_multiple_students_in_same_course()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        $lecturer = Lecturer::factory()->create(['user_id' => $user->id]);
        $course = Course::factory()->create();
        
        $students = Student::factory()->count(3)->create();

        $this->actingAs($user);

        foreach ($students as $index => $student) {
            $response = $this->post('/dashboard/grade', [
                'student_nim' => $student->nim,
                'course_id' => $course->id,
                'p1_cs' => 80.00 + $index,
                'p1_pe' => 85.00 + $index,
                'p2_cs' => 82.00 + $index,
                'p2_pe' => 87.00 + $index,
                'final_grade' => 83.00 + $index,
            ]);

            $response->assertRedirect('/dashboard');
        }

        // Verify all 3 records created
        $this->assertEquals(3, AcademicRecord::where('course_id', $course->id)->count());
        
        // Verify all have unique integrity hashes
        $hashes = AcademicRecord::where('course_id', $course->id)
            ->pluck('integrity_hash')
            ->toArray();
        
        $this->assertEquals(3, count(array_unique($hashes)));
    }
}
```

**Expected Results:**
- ✅ Complete flow berjalan lancar
- ✅ Semua data tersimpan dengan benar
- ✅ Grade calculation correct
- ✅ Integrity hash generated
- ✅ Multiple students dapat di-input

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

## 📈 Test Execution Guide

### Prerequisites
```bash
# Pastikan dependencies terinstall
composer install

# Setup database testing
cp .env .env.testing
# Edit .env.testing:
# DB_CONNECTION=sqlite
# DB_DATABASE=:memory:
```

### Running Tests

#### Run All Tests
```bash
php artisan test
```

#### Run Specific Test File
```bash
php artisan test tests/Feature/GradeInput/GradeInputSuccessTest.php
```

#### Run Specific Test Method
```bash
php artisan test --filter=dosen_can_successfully_input_grades_with_valid_data
```

#### Run with Coverage
```bash
php artisan test --coverage
```

#### Run with Detailed Output
```bash
php artisan test --verbose
```

---

## 📝 Test Documentation Format

### Untuk Setiap Test yang Dijalankan:

```markdown
## [TEST-ID]: [Test Name]

**Date Executed:** YYYY-MM-DD HH:MM  
**Tester:** [Your Name]  
**Status:** ✅ Pass / ❌ Fail  
**Execution Time:** X.XX seconds

### Test Output:
```
[Paste PHPUnit output here]
```

### Results:
- Total Assertions: X
- Passed: X
- Failed: X
- Errors: X

### Issues Found:
[If any]

### Notes:
[Any observations]
```

---

## 🐛 Bug Report Template

Jika menemukan bug saat testing:

```markdown
### BUG-[ID]: [Bug Title]

**Severity:** Critical / High / Medium / Low  
**Found in Test:** [TEST-ID]  
**Date:** YYYY-MM-DD

**Description:**
[Detailed description]

**Steps to Reproduce:**
1. [Step 1]
2. [Step 2]
3. [Step 3]

**Expected Behavior:**
[What should happen]

**Actual Behavior:**
[What actually happens]

**Test Code:**
```php
[Relevant test code]
```

**Error Message:**
```
[Error output]
```

**Stack Trace:**
```
[Stack trace if available]
```

**Suggested Fix:**
[If you have suggestions]
```

---

## ✅ Test Completion Checklist

### Controller Tests
- [ ] TEST-CTRL-INPUT-001: Successful Grade Input
- [ ] TEST-CTRL-INPUT-002: Validation - Missing Fields
- [ ] TEST-CTRL-INPUT-003: Validation - Invalid Data Types
- [ ] TEST-CTRL-INPUT-004: Authorization

### Service Tests
- [ ] TEST-SVC-INPUT-001: Grade Calculation Formula
- [ ] TEST-SVC-INPUT-002: Grade Letter Conversion
- [ ] TEST-SVC-INPUT-003: Grade Point Conversion

### Data Integrity Tests
- [ ] TEST-INT-INPUT-001: Integrity Hash Generation
- [ ] TEST-INT-INPUT-002: Data Immutability

### Integration Tests
- [ ] TEST-INTEG-INPUT-001: Complete Grade Input Flow

---

## 📊 Final Test Report Template

```markdown
# White Box Testing Report - Input Nilai

## Executive Summary
**Testing Period:** [Start] - [End]  
**Total Tests:** X  
**Passed:** X  
**Failed:** X  
**Coverage:** XX%

## Test Results by Category

### Controller Tests (4 tests)
- Passed: X
- Failed: X
- Coverage: XX%

### Service Tests (3 tests)
- Passed: X
- Failed: X
- Coverage: XX%

### Data Integrity Tests (2 tests)
- Passed: X
- Failed: X
- Coverage: XX%

### Integration Tests (1 test)
- Passed: X
- Failed: X
- Coverage: XX%

## Critical Issues Found
[List critical issues]

## Recommendations
[List recommendations]

## Conclusion
[Overall assessment]

**Sign-off:**
- Tester: [Name]
- Date: [Date]
- Signature: [Signature]
```

---

## 🎯 Success Criteria

Testing dianggap **PASSED** jika:
- ✅ Semua test cases passed (100%)
- ✅ Code coverage ≥ 95% untuk komponen input nilai
- ✅ Tidak ada critical bugs
- ✅ Semua validation berfungsi dengan benar
- ✅ Integrity hash ter-generate dengan benar
- ✅ Data immutability terjaga

---

**Good Luck with Testing! 🧪✨**
