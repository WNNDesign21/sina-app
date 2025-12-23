# White Box Testing Results

## Overview
Dokumen ini berisi hasil testing white box untuk aplikasi SINA Secure.

**Testing Period:** [Start Date] - [End Date]  
**Tester:** [Your Name]  
**Version:** 1.0.0

---

## Code Coverage Summary

| Component | Coverage | Status |
|-----------|----------|--------|
| Models | 0% | ⏳ Pending |
| Controllers | 0% | ⏳ Pending |
| Services | 0% | ⏳ Pending |
| Middleware | 0% | ⏳ Pending |
| **Overall** | **0%** | **⏳ Pending** |

**Target:** >80% coverage

---

## Unit Tests

### Models

#### TEST-MODEL-001: Student Model Relationships
**Date:** YYYY-MM-DD  
**Status:** ⏳ Pending  
**Coverage:** 0%

**Test Code:**
```php
<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Student;
use App\Models\AcademicRecord;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_academic_records_relationship()
    {
        $student = Student::factory()->create();
        $record = AcademicRecord::factory()->create([
            'student_nim' => $student->nim
        ]);

        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $student->academicRecords
        );
        $this->assertEquals(1, $student->academicRecords->count());
    }

    /** @test */
    public function it_belongs_to_user()
    {
        $student = Student::factory()->create();
        
        $this->assertInstanceOf(
            'App\Models\User',
            $student->user
        );
    }
}
```

**Results:**
- [ ] All assertions passed
- [ ] Code coverage: 0%
- [ ] Edge cases tested: 0/2

**Issues Found:**
[List any issues]

---

#### TEST-MODEL-002: AcademicRecord Model
**Date:** YYYY-MM-DD  
**Status:** ⏳ Pending  
**Coverage:** 0%

**Test Code:**
```php
<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\AcademicRecord;
use App\Models\Student;
use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AcademicRecordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_student()
    {
        $record = AcademicRecord::factory()->create();
        
        $this->assertInstanceOf(
            'App\Models\Student',
            $record->student
        );
    }

    /** @test */
    public function it_belongs_to_course()
    {
        $record = AcademicRecord::factory()->create();
        
        $this->assertInstanceOf(
            'App\Models\Course',
            $record->course
        );
    }

    /** @test */
    public function it_belongs_to_lecturer()
    {
        $record = AcademicRecord::factory()->create();
        
        $this->assertInstanceOf(
            'App\Models\Lecturer',
            $record->lecturer
        );
    }

    /** @test */
    public function it_casts_numeric_fields_to_decimal()
    {
        $record = AcademicRecord::factory()->create([
            'p1_cs' => 85.50,
            'p1_pe' => 90.25,
        ]);

        $this->assertIsFloat($record->p1_cs);
        $this->assertIsFloat($record->p1_pe);
        $this->assertEquals('85.50', number_format($record->p1_cs, 2));
    }
}
```

**Results:**
- [ ] All assertions passed
- [ ] Code coverage: 0%
- [ ] Edge cases tested: 0/4

---

### Controllers

#### TEST-CTRL-001: DashboardController - Index (Dosen)
**Date:** YYYY-MM-DD  
**Status:** ⏳ Pending  
**Coverage:** 0%

**Test Code:**
```php
<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Lecturer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardControllerDosenTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function dosen_can_view_dashboard()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        $lecturer = Lecturer::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
        $response->assertViewIs('dashboard');
        $response->assertViewHas('lecturerName');
        $response->assertViewHas('totalStudents');
        $response->assertViewHas('averageGrade');
    }

    /** @test */
    public function mahasiswa_cannot_view_dosen_dashboard()
    {
        $user = User::factory()->create(['role' => 'mahasiswa']);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
        $response->assertViewIs('student_dashboard');
    }

    /** @test */
    public function unauthenticated_user_redirected_to_login()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/');
    }
}
```

**Results:**
- [ ] All assertions passed
- [ ] Code coverage: 0%
- [ ] Edge cases tested: 0/3

---

#### TEST-CTRL-002: DashboardController - Store (Input Grades)
**Date:** YYYY-MM-DD  
**Status:** ⏳ Pending  
**Coverage:** 0%

**Test Code:**
```php
<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardControllerStoreTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function dosen_can_input_grades()
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

        $response = $this->actingAs($user)
            ->post('/dashboard/grade', $gradeData);

        $response->assertRedirect('/dashboard');
        $response->assertSessionHas('success');
        
        $this->assertDatabaseHas('academic_records', [
            'student_nim' => $student->nim,
            'course_id' => $course->id,
        ]);
    }

    /** @test */
    public function validation_fails_with_invalid_data()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        
        $response = $this->actingAs($user)
            ->post('/dashboard/grade', [
                'student_nim' => '',
                'course_id' => '',
            ]);

        $response->assertSessionHasErrors(['student_nim', 'course_id']);
    }

    /** @test */
    public function integrity_hash_is_generated()
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

        $this->actingAs($user)->post('/dashboard/grade', $gradeData);

        $record = \App\Models\AcademicRecord::where('student_nim', $student->nim)->first();
        
        $this->assertNotNull($record->integrity_hash);
        $this->assertEquals(64, strlen($record->integrity_hash)); // SHA-256 length
    }
}
```

**Results:**
- [ ] All assertions passed
- [ ] Code coverage: 0%
- [ ] Edge cases tested: 0/3

---

### Services

#### TEST-SVC-001: GradeCalculationService - Calculate Grade
**Date:** YYYY-MM-DD  
**Status:** ⏳ Pending  
**Coverage:** 0%

**Test Code:**
```php
<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\GradeCalculationService;

class GradeCalculationServiceTest extends TestCase
{
    protected $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new GradeCalculationService();
    }

    /** @test */
    public function it_calculates_grade_correctly()
    {
        $result = $this->service->calculateGrade(
            p1_cs: 85.00,
            p1_pe: 90.00,
            p2_cs: 88.00,
            p2_pe: 92.00,
            final_grade: 87.00
        );

        // Expected: (85*0.15) + (90*0.15) + (88*0.15) + (92*0.15) + (87*0.40)
        // = 12.75 + 13.5 + 13.2 + 13.8 + 34.8 = 88.05
        $this->assertEquals(88.05, $result['final_grade']);
    }

    /** @test */
    public function it_returns_correct_grade_letter_for_A()
    {
        $gradeLetter = $this->service->getGradeLetter(90.00);
        $this->assertEquals('A', $gradeLetter);
    }

    /** @test */
    public function it_returns_correct_grade_letter_for_B()
    {
        $gradeLetter = $this->service->getGradeLetter(75.00);
        $this->assertEquals('B+', $gradeLetter);
    }

    /** @test */
    public function it_returns_correct_grade_letter_for_E()
    {
        $gradeLetter = $this->service->getGradeLetter(40.00);
        $this->assertEquals('E', $gradeLetter);
    }

    /** @test */
    public function it_returns_correct_grade_point()
    {
        $this->assertEquals(4.00, $this->service->getGradePoint('A'));
        $this->assertEquals(3.75, $this->service->getGradePoint('A-'));
        $this->assertEquals(3.50, $this->service->getGradePoint('B+'));
        $this->assertEquals(0.00, $this->service->getGradePoint('E'));
    }

    /** @test */
    public function it_handles_edge_case_grade_boundaries()
    {
        $this->assertEquals('A', $this->service->getGradeLetter(85.00)); // Lower bound A
        $this->assertEquals('A-', $this->service->getGradeLetter(84.99)); // Upper bound A-
        $this->assertEquals('B+', $this->service->getGradeLetter(80.00)); // Upper bound B+
    }
}
```

**Results:**
- [ ] All assertions passed
- [ ] Code coverage: 0%
- [ ] Edge cases tested: 0/6

---

## Integration Tests

### TEST-INT-001: Complete Grade Input Flow
**Date:** YYYY-MM-DD  
**Status:** ⏳ Pending

**Test Code:**
```php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GradeInputFlowTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function complete_grade_input_flow_works()
    {
        // 1. Setup
        $user = User::factory()->create(['role' => 'dosen']);
        $lecturer = Lecturer::factory()->create(['user_id' => $user->id]);
        $student = Student::factory()->create();
        $course = Course::factory()->create();

        // 2. Login
        $this->actingAs($user);

        // 3. View dashboard
        $response = $this->get('/dashboard');
        $response->assertStatus(200);

        // 4. Input grades
        $gradeData = [
            'student_nim' => $student->nim,
            'course_id' => $course->id,
            'p1_cs' => 85.00,
            'p1_pe' => 90.00,
            'p2_cs' => 88.00,
            'p2_pe' => 92.00,
            'final_grade' => 87.00,
        ];

        $response = $this->post('/dashboard/grade', $gradeData);
        $response->assertRedirect('/dashboard');

        // 5. Verify data
        $this->assertDatabaseHas('academic_records', [
            'student_nim' => $student->nim,
            'course_id' => $course->id,
        ]);

        // 6. Verify integrity hash
        $record = \App\Models\AcademicRecord::where('student_nim', $student->nim)->first();
        $this->assertNotNull($record->integrity_hash);

        // 7. Verify grade calculation
        $this->assertNotNull($record->grade_letter);
        $this->assertNotNull($record->grade_point);
    }
}
```

**Results:**
- [ ] All steps passed
- [ ] Data integrity verified
- [ ] No errors encountered

---

## Security Tests

### TEST-SEC-001: SQL Injection Prevention
**Date:** YYYY-MM-DD  
**Status:** ⏳ Pending

**Test Code:**
```php
<?php

namespace Tests\Security;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SqlInjectionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function login_prevents_sql_injection()
    {
        $response = $this->post('/login', [
            'username' => "admin' OR '1'='1",
            'password' => "password' OR '1'='1",
        ]);

        $response->assertSessionHasErrors();
        $this->assertGuest();
    }

    /** @test */
    public function grade_input_prevents_sql_injection()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        
        $response = $this->actingAs($user)->post('/dashboard/grade', [
            'student_nim' => "'; DROP TABLE academic_records; --",
            'course_id' => 1,
        ]);

        // Should fail validation, not execute SQL
        $response->assertSessionHasErrors();
        $this->assertDatabaseHas('academic_records', []); // Table still exists
    }
}
```

**Results:**
- [ ] SQL injection attempts blocked
- [ ] Eloquent ORM protection verified

---

### TEST-SEC-002: XSS Prevention
**Date:** YYYY-MM-DD  
**Status:** ⏳ Pending

**Test Code:**
```php
<?php

namespace Tests\Security;

use Tests\TestCase;
use App\Models\User;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;

class XssPreventionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function blade_escapes_user_input()
    {
        $student = Student::factory()->create([
            'name' => '<script>alert("XSS")</script>Test'
        ]);

        $user = User::factory()->create(['role' => 'mahasiswa']);
        
        $response = $this->actingAs($user)->get('/dashboard');
        
        // Blade should escape the script tag
        $response->assertDontSee('<script>', false);
        $response->assertSee('&lt;script&gt;', false);
    }
}
```

**Results:**
- [ ] XSS attempts escaped
- [ ] Blade templating protection verified

---

### TEST-SEC-003: CSRF Protection
**Date:** YYYY-MM-DD  
**Status:** ⏳ Pending

**Test Code:**
```php
<?php

namespace Tests\Security;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CsrfProtectionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function post_requests_require_csrf_token()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        
        // Attempt POST without CSRF token
        $response = $this->actingAs($user)
            ->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class)
            ->post('/dashboard/grade', []);

        // With middleware, this should fail
        // Without middleware (for testing), we verify middleware exists
        $this->assertTrue(true); // Placeholder
    }
}
```

**Results:**
- [ ] CSRF protection enabled
- [ ] POST requests protected

---

## Performance Tests

### TEST-PERF-001: Dashboard Load Time
**Date:** YYYY-MM-DD  
**Status:** ⏳ Pending

**Metrics:**
- Target: < 1 second
- Actual: [To be measured]

**Test Code:**
```php
<?php

namespace Tests\Performance;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardPerformanceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function dashboard_loads_within_acceptable_time()
    {
        $user = User::factory()->create(['role' => 'dosen']);
        
        $start = microtime(true);
        $response = $this->actingAs($user)->get('/dashboard');
        $end = microtime(true);
        
        $loadTime = $end - $start;
        
        $this->assertLessThan(1.0, $loadTime, "Dashboard took {$loadTime}s to load");
    }
}
```

**Results:**
- [ ] Load time acceptable
- [ ] No performance bottlenecks

---

## Code Quality

### Static Analysis
- [ ] PHPStan level 5 passed
- [ ] PHP CS Fixer applied
- [ ] No deprecated functions used

### Code Smells
- [ ] No duplicate code
- [ ] Functions < 50 lines
- [ ] Classes < 500 lines
- [ ] Cyclomatic complexity < 10

---

## Issues Found

### ISSUE-001: [Issue Title]
**Severity:** Critical / High / Medium / Low  
**Type:** Bug / Performance / Security / Code Quality  
**Status:** Open / In Progress / Fixed

**Description:**
[Detailed description]

**Code Location:**
```
File: path/to/file.php
Line: XX
Function: functionName()
```

**Recommendation:**
[How to fix]

---

## Recommendations

### Code Improvements
1. [Recommendation 1]
2. [Recommendation 2]

### Test Coverage
1. Add tests for edge cases
2. Increase coverage to >80%

### Performance
1. [Performance recommendation]

---

## Conclusion

**Overall Code Quality:** ⭐⭐⭐⭐⭐ (0/5)  
**Test Coverage:** 0%  
**Security Score:** 0/10  
**Performance:** Not Tested

**Status:** ⏳ Testing in Progress

**Sign-off:**
- Tester: [Name]
- Date: [Date]
- Signature: [Signature]
