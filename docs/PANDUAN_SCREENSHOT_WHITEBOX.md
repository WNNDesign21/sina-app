# Panduan Screenshot & Dokumentasi White Box Testing

## 📋 Overview

Dokumen ini menjelaskan **apa yang harus di-screenshot dan dilampirkan** sebagai bukti untuk white box testing proses input nilai. Berbeda dengan blackbox yang fokus pada UI, whitebox fokus pada **code, test execution, dan coverage**.

---

## 🎯 Apa yang Harus Dilampirkan?

### 1. **Test Code (Source Code)**
### 2. **Test Execution Results (Terminal Output)**
### 3. **Code Coverage Report**
### 4. **Database State (Before & After)**
### 5. **PHPUnit XML Report**
### 6. **IDE/Editor Screenshots**

---

## 📸 Screenshot Guide - Step by Step

### STEP 1: Setup Test Files

#### Screenshot 1.1: File Structure
**Apa yang di-screenshot:**
- File explorer/tree showing test files

**Lokasi:**
```
tests/
├── Feature/
│   └── GradeInput/
│       ├── GradeInputSuccessTest.php
│       ├── GradeInputValidationTest.php
│       ├── GradeInputDataTypeValidationTest.php
│       ├── GradeInputAuthorizationTest.php
│       ├── IntegrityHashGenerationTest.php
│       ├── DataImmutabilityTest.php
│       └── CompleteGradeInputFlowTest.php
└── Unit/
    └── Services/
        ├── GradeCalculationFormulaTest.php
        ├── GradeLetterConversionTest.php
        └── GradePointConversionTest.php
```

**Cara Screenshot:**
1. Buka VS Code / IDE
2. Expand folder `tests/`
3. Screenshot file tree
4. Save as: `01_test_file_structure.png`

**Contoh Caption untuk Laporan:**
```
Gambar 1.1: Struktur File Test
Menunjukkan organisasi file test untuk proses input nilai,
terdiri dari 7 Feature Tests dan 3 Unit Tests.
```

---

#### Screenshot 1.2: Test Code Sample
**Apa yang di-screenshot:**
- Isi salah satu file test (contoh: GradeInputSuccessTest.php)

**Cara Screenshot:**
1. Buka file `GradeInputSuccessTest.php`
2. Screenshot full code atau method utama
3. Pastikan syntax highlighting visible
4. Save as: `02_test_code_sample.png`

**Contoh Caption:**
```
Gambar 1.2: Sample Test Code - GradeInputSuccessTest
Menunjukkan test code untuk skenario input nilai yang berhasil,
menggunakan Arrange-Act-Assert pattern.
```

---

### STEP 2: Running Tests

#### Screenshot 2.1: Run All Tests
**Apa yang di-screenshot:**
- Terminal output saat run `php artisan test`

**Command:**
```bash
php artisan test
```

**Cara Screenshot:**
1. Buka terminal
2. Run command: `php artisan test`
3. Wait for completion
4. Screenshot full output
5. Save as: `03_run_all_tests.png`

**Output yang Diharapkan:**
```
   PASS  Tests\Feature\GradeInput\GradeInputSuccessTest
  ✓ dosen can successfully input grades with valid data

   PASS  Tests\Feature\GradeInput\GradeInputValidationTest
  ✓ validation fails when required fields are missing
  ✓ validation fails when student nim is missing
  ✓ validation fails when course id is missing

   PASS  Tests\Unit\Services\GradeCalculationFormulaTest
  ✓ it calculates final grade correctly with standard values
  ✓ it calculates correctly with perfect scores
  ✓ it calculates correctly with minimum scores

  Tests:  10 passed
  Time:   2.34s
```

**Contoh Caption:**
```
Gambar 2.1: Hasil Eksekusi Semua Test
Menunjukkan bahwa semua 10 test cases berhasil dijalankan
dan passed dalam waktu 2.34 detik.
```

---

#### Screenshot 2.2: Run Specific Test
**Apa yang di-screenshot:**
- Terminal output saat run specific test

**Command:**
```bash
php artisan test --filter=dosen_can_successfully_input_grades_with_valid_data
```

**Cara Screenshot:**
1. Run specific test
2. Screenshot output dengan detail
3. Save as: `04_run_specific_test.png`

**Output yang Diharapkan:**
```
   PASS  Tests\Feature\GradeInput\GradeInputSuccessTest
  ✓ dosen can successfully input grades with valid data

  Tests:  1 passed
  Time:   0.45s
```

**Contoh Caption:**
```
Gambar 2.2: Hasil Test Spesifik - Input Nilai Berhasil
Menunjukkan detail eksekusi test untuk skenario input nilai
yang berhasil, dengan waktu eksekusi 0.45 detik.
```

---

#### Screenshot 2.3: Verbose Output
**Apa yang di-screenshot:**
- Detailed test output dengan `--verbose`

**Command:**
```bash
php artisan test --filter=dosen_can_successfully_input_grades_with_valid_data --verbose
```

**Output yang Diharapkan:**
```
   PASS  Tests\Feature\GradeInput\GradeInputSuccessTest
  ✓ dosen can successfully input grades with valid data
    → Assertions: 8
    → Time: 0.45s
    
    Database Queries: 12
    - SELECT * FROM users WHERE username = ?
    - INSERT INTO academic_records ...
    - SELECT * FROM academic_records WHERE student_nim = ?
```

**Save as:** `05_verbose_output.png`

**Contoh Caption:**
```
Gambar 2.3: Verbose Output Test
Menunjukkan detail eksekusi test termasuk jumlah assertions (8),
waktu eksekusi (0.45s), dan database queries yang dijalankan.
```

---

### STEP 3: Code Coverage

#### Screenshot 3.1: Run Tests with Coverage
**Apa yang di-screenshot:**
- Terminal output dengan coverage summary

**Command:**
```bash
php artisan test --coverage
```

**Output yang Diharapkan:**
```
   PASS  Tests\Feature\GradeInput\GradeInputSuccessTest
  ✓ dosen can successfully input grades with valid data
  
  ...
  
  Tests:  10 passed
  Time:   3.12s

  Code Coverage Report:
  
  App\Http\Controllers\DashboardController
    Methods:  100.0% (1/1)
    Lines:    95.2%  (20/21)
  
  App\Services\GradeCalculationService
    Methods:  100.0% (3/3)
    Lines:    100.0% (45/45)
  
  App\Models\AcademicRecord
    Methods:  100.0% (3/3)
    Lines:    100.0% (12/12)
  
  Total:
    Methods:  100.0% (7/7)
    Lines:    97.4%  (77/79)
```

**Save as:** `06_coverage_summary.png`

**Contoh Caption:**
```
Gambar 3.1: Code Coverage Summary
Menunjukkan coverage untuk komponen input nilai:
- DashboardController: 95.2% line coverage
- GradeCalculationService: 100% line coverage
- AcademicRecord Model: 100% line coverage
Total coverage: 97.4%
```

---

#### Screenshot 3.2: HTML Coverage Report
**Apa yang di-screenshot:**
- HTML coverage report di browser

**Command:**
```bash
php artisan test --coverage-html coverage-report
```

**Cara Screenshot:**
1. Run command untuk generate HTML report
2. Buka `coverage-report/index.html` di browser
3. Screenshot homepage coverage
4. Save as: `07_html_coverage_home.png`

**Tampilan yang Diharapkan:**
- Table dengan list files
- Percentage bars (green untuk high coverage)
- Summary statistics

**Contoh Caption:**
```
Gambar 3.2: HTML Coverage Report - Overview
Menampilkan coverage report dalam format HTML yang lebih
visual, dengan color-coding untuk tingkat coverage.
```

---

#### Screenshot 3.3: Detailed File Coverage
**Apa yang di-screenshot:**
- Coverage detail untuk specific file

**Cara Screenshot:**
1. Di HTML coverage report, klik `DashboardController.php`
2. Screenshot showing line-by-line coverage
3. Save as: `08_file_coverage_detail.png`

**Tampilan yang Diharapkan:**
- Source code dengan highlighting:
  - Green: Covered lines
  - Red: Uncovered lines
  - Gray: Non-executable lines

**Contoh Caption:**
```
Gambar 3.3: Detail Coverage - DashboardController
Menunjukkan line-by-line coverage untuk DashboardController,
dengan highlighting hijau untuk baris yang ter-cover oleh test.
```

---

### STEP 4: Database State

#### Screenshot 4.1: Database Before Test
**Apa yang di-screenshot:**
- Database state sebelum test

**Cara:**
1. Buka database tool (TablePlus, phpMyAdmin, atau DB Browser)
2. Query: `SELECT * FROM academic_records;`
3. Screenshot empty table atau existing data
4. Save as: `09_database_before.png`

**Contoh Caption:**
```
Gambar 4.1: State Database Sebelum Test
Menunjukkan tabel academic_records dalam keadaan kosong
sebelum test dijalankan (menggunakan in-memory SQLite).
```

---

#### Screenshot 4.2: Database After Test
**Apa yang di-screenshot:**
- Database state setelah test

**Cara:**
1. Run test
2. Query database
3. Screenshot data yang ter-insert
4. Save as: `10_database_after.png`

**Data yang Diharapkan:**
```
| id | student_nim | course_id | p1_cs | p1_pe | p2_cs | p2_pe | final_grade | grade_letter | grade_point | integrity_hash |
|----|-------------|-----------|-------|-------|-------|-------|-------------|--------------|-------------|----------------|
| 1  | 433785...   | 1         | 85.00 | 90.00 | 88.00 | 92.00 | 87.00       | A            | 4.00        | a3f5c8d...     |
```

**Contoh Caption:**
```
Gambar 4.2: State Database Setelah Test
Menunjukkan data yang berhasil disimpan setelah test dijalankan,
termasuk grade_letter (A), grade_point (4.00), dan integrity_hash.
```

---

### STEP 5: Assertion Details

#### Screenshot 5.1: Failed Assertion (for demonstration)
**Apa yang di-screenshot:**
- Output saat assertion gagal (untuk demonstrasi)

**Cara:**
1. Temporarily modify test untuk fail
2. Run test
3. Screenshot error output
4. Revert changes
5. Save as: `11_failed_assertion.png`

**Output yang Diharapkan:**
```
   FAIL  Tests\Feature\GradeInput\GradeInputSuccessTest
  ✗ dosen can successfully input grades with valid data
  
  Failed asserting that two strings are equal.
  
  Expected: 'A'
  Actual:   'B+'
  
  at tests/Feature/GradeInput/GradeInputSuccessTest.php:45
```

**Contoh Caption:**
```
Gambar 5.1: Contoh Failed Assertion
Menunjukkan output saat assertion gagal, dengan detail
expected value vs actual value untuk debugging.
(Screenshot ini untuk demonstrasi, actual test passed)
```

---

### STEP 6: PHPUnit Configuration

#### Screenshot 6.1: phpunit.xml
**Apa yang di-screenshot:**
- Isi file `phpunit.xml`

**Cara Screenshot:**
1. Buka file `phpunit.xml`
2. Screenshot configuration
3. Save as: `12_phpunit_config.png`

**Contoh Caption:**
```
Gambar 6.1: PHPUnit Configuration
Menunjukkan konfigurasi PHPUnit termasuk test suites,
coverage settings, dan environment variables.
```

---

### STEP 7: Test Execution Timeline

#### Screenshot 7.1: Test Execution with Timing
**Apa yang di-screenshot:**
- Test execution dengan timing details

**Command:**
```bash
php artisan test --profile
```

**Output yang Diharapkan:**
```
Top 10 slowest tests:
  0.45s  Tests\Feature\GradeInput\GradeInputSuccessTest::dosen_can_successfully_input_grades_with_valid_data
  0.38s  Tests\Feature\GradeInput\CompleteGradeInputFlowTest::complete_grade_input_flow_works_end_to_end
  0.25s  Tests\Feature\GradeInput\IntegrityHashGenerationTest::integrity_hash_is_automatically_generated
  ...
```

**Save as:** `13_test_timing.png`

**Contoh Caption:**
```
Gambar 7.1: Test Execution Timeline
Menunjukkan waktu eksekusi untuk setiap test case,
membantu identify performance bottlenecks.
```

---

## 📊 Checklist Screenshot untuk Laporan

### Wajib (Minimum)
- [ ] `01_test_file_structure.png` - File structure
- [ ] `02_test_code_sample.png` - Sample test code
- [ ] `03_run_all_tests.png` - All tests execution
- [ ] `06_coverage_summary.png` - Coverage summary
- [ ] `10_database_after.png` - Database verification

### Recommended
- [ ] `04_run_specific_test.png` - Specific test detail
- [ ] `05_verbose_output.png` - Verbose output
- [ ] `07_html_coverage_home.png` - HTML coverage overview
- [ ] `08_file_coverage_detail.png` - File coverage detail
- [ ] `13_test_timing.png` - Test timing

### Optional (untuk demonstrasi)
- [ ] `09_database_before.png` - Database before
- [ ] `11_failed_assertion.png` - Failed assertion example
- [ ] `12_phpunit_config.png` - PHPUnit config

---

## 📝 Template Laporan dengan Screenshot

### Format Laporan

```markdown
# Laporan White Box Testing - Input Nilai

## 1. Pendahuluan
[Penjelasan singkat tentang whitebox testing]

## 2. Test Cases yang Diimplementasikan

### 2.1 Controller Tests
**File:** `tests/Feature/GradeInput/GradeInputSuccessTest.php`

**Gambar 2.1.1: Test Code**
![Test Code](screenshots/02_test_code_sample.png)
*Keterangan: Test code untuk skenario input nilai berhasil*

**Test Methods:**
- `dosen_can_successfully_input_grades_with_valid_data()`
- [list other methods]

### 2.2 Service Tests
**File:** `tests/Unit/Services/GradeCalculationFormulaTest.php`

[Similar structure]

## 3. Hasil Eksekusi Test

### 3.1 Eksekusi Semua Test
**Gambar 3.1.1: Test Execution**
![All Tests](screenshots/03_run_all_tests.png)
*Keterangan: Semua 10 test cases berhasil dijalankan*

**Hasil:**
- Total Tests: 10
- Passed: 10
- Failed: 0
- Execution Time: 2.34s

### 3.2 Detail Test Spesifik
**Gambar 3.2.1: Specific Test**
![Specific Test](screenshots/04_run_specific_test.png)
*Keterangan: Detail eksekusi test input nilai berhasil*

## 4. Code Coverage

### 4.1 Coverage Summary
**Gambar 4.1.1: Coverage Summary**
![Coverage](screenshots/06_coverage_summary.png)
*Keterangan: Code coverage untuk komponen input nilai*

**Hasil Coverage:**
- DashboardController: 95.2%
- GradeCalculationService: 100%
- AcademicRecord Model: 100%
- **Total: 97.4%**

### 4.2 HTML Coverage Report
**Gambar 4.2.1: HTML Coverage**
![HTML Coverage](screenshots/07_html_coverage_home.png)
*Keterangan: Visual coverage report*

**Gambar 4.2.2: File Detail Coverage**
![File Coverage](screenshots/08_file_coverage_detail.png)
*Keterangan: Line-by-line coverage untuk DashboardController*

## 5. Verifikasi Database

### 5.1 Database After Test
**Gambar 5.1.1: Database State**
![Database](screenshots/10_database_after.png)
*Keterangan: Data berhasil tersimpan dengan integrity hash*

**Verifikasi:**
- ✅ Student NIM tersimpan
- ✅ Semua nilai tersimpan
- ✅ Grade letter ter-calculate (A)
- ✅ Grade point ter-calculate (4.00)
- ✅ Integrity hash ter-generate

## 6. Kesimpulan

Berdasarkan hasil testing:
- Semua test cases (10/10) passed
- Code coverage mencapai 97.4%
- Semua komponen input nilai berfungsi sesuai spesifikasi
- Data integrity terjaga dengan integrity hash

**Status:** ✅ PASSED
```

---

## 🎯 Tips Screenshot yang Baik

### 1. Resolusi & Clarity
- ✅ Gunakan resolusi tinggi (1920x1080 minimum)
- ✅ Pastikan text readable
- ✅ Jangan crop terlalu ketat
- ✅ Include context (window title, file path)

### 2. Highlighting
- ✅ Highlight important parts (red box/arrow)
- ✅ Use annotations jika perlu
- ✅ Numbering untuk multiple screenshots

### 3. Consistency
- ✅ Same theme/color scheme
- ✅ Same terminal font size
- ✅ Same IDE settings

### 4. File Naming
- ✅ Use descriptive names
- ✅ Use numbering (01, 02, 03...)
- ✅ Include test name in filename

---

## 📁 Folder Structure untuk Screenshots

```
screenshots/
├── 01_setup/
│   ├── 01_test_file_structure.png
│   └── 02_test_code_sample.png
├── 02_execution/
│   ├── 03_run_all_tests.png
│   ├── 04_run_specific_test.png
│   └── 05_verbose_output.png
├── 03_coverage/
│   ├── 06_coverage_summary.png
│   ├── 07_html_coverage_home.png
│   └── 08_file_coverage_detail.png
├── 04_database/
│   ├── 09_database_before.png
│   └── 10_database_after.png
└── 05_misc/
    ├── 11_failed_assertion.png
    ├── 12_phpunit_config.png
    └── 13_test_timing.png
```

---

## 🔧 Tools yang Dibutuhkan

### Screenshot Tools
- **Windows:** Snipping Tool, Greenshot, ShareX
- **Mac:** Cmd+Shift+4
- **Linux:** Flameshot, Spectacle

### Database Tools
- **TablePlus** (Recommended)
- **DB Browser for SQLite**
- **phpMyAdmin** (for MySQL)
- **DBeaver**

### Code Editor
- **VS Code** (Recommended)
- **PHPStorm**
- **Sublime Text**

---

## ✅ Final Checklist

Sebelum submit laporan, pastikan:

### Screenshots
- [ ] Semua screenshot clear dan readable
- [ ] File names descriptive
- [ ] Organized dalam folder
- [ ] Referenced dalam laporan

### Content
- [ ] Test code included
- [ ] Execution results shown
- [ ] Coverage report included
- [ ] Database verification shown
- [ ] All captions written

### Quality
- [ ] No sensitive data exposed
- [ ] Consistent formatting
- [ ] Professional appearance
- [ ] Complete documentation

---

**Dengan panduan ini, Anda memiliki semua yang dibutuhkan untuk mendokumentasikan whitebox testing dengan baik!** 📸✨
