# Black Box Testing - Input Nilai (Grade Input Process)

## 📋 Overview

Dokumen ini berisi panduan lengkap black box testing untuk **proses input nilai** pada aplikasi SINA Secure. Testing dilakukan dari perspektif user (dosen) tanpa melihat internal code, fokus pada functionality, UI/UX, dan user experience.

**Scope:** Proses Input Nilai  
**Testing Period:** [Start Date] - [End Date]  
**Tester:** [Your Name]  
**Version:** 1.0.0

---

## 🎯 Testing Objectives

1. **Functionality**: Memastikan fitur input nilai berfungsi dengan benar
2. **Usability**: Memastikan UI/UX mudah digunakan
3. **Validation**: Memastikan validasi input bekerja dengan baik
4. **Error Handling**: Memastikan error messages jelas dan helpful
5. **Data Integrity**: Memastikan data tersimpan dengan benar

---

## 📊 Test Summary

| Category | Total Tests | Passed | Failed | Pending |
|----------|-------------|--------|--------|---------|
| UI/UX | 0 | 0 | 0 | 8 |
| Functionality | 0 | 0 | 0 | 6 |
| Validation | 0 | 0 | 0 | 8 |
| Error Handling | 0 | 0 | 0 | 4 |
| Data Verification | 0 | 0 | 0 | 4 |
| **TOTAL** | **0** | **0** | **0** | **30** |

---

## 🧪 Test Cases

### SECTION 1: UI/UX Testing

#### TC-UI-INPUT-001: Akses Form Input Nilai
**Priority:** High  
**Status:** ⏳ Pending  
**Category:** UI/UX

**Objective:**  
Memastikan dosen dapat mengakses form input nilai dengan mudah.

**Pre-conditions:**
- User sudah login sebagai dosen
- Browser: Chrome/Firefox/Edge
- Screen resolution: 1920x1080

**Test Steps:**
1. Login ke aplikasi dengan kredensial dosen
   - Username: `198503152010121002`
   - Password: `password`
2. Klik tombol "Dashboard" di sidebar (jika belum di dashboard)
3. Klik tombol "Input Grades" atau icon "+" untuk input nilai

**Expected Results:**
- ✅ Modal/form input nilai muncul
- ✅ Form ter-render dengan lengkap
- ✅ Semua field visible dan accessible
- ✅ Loading time < 1 detik
- ✅ No console errors

**Actual Results:**
[To be filled during testing]

**Screenshots:**
[Attach screenshot of form]

**Status:** ⏳ Pending

**Notes:**
[Any observations]

---

#### TC-UI-INPUT-002: Form Layout dan Design
**Priority:** Medium  
**Status:** ⏳ Pending  
**Category:** UI/UX

**Objective:**  
Memastikan form input nilai memiliki layout yang baik dan user-friendly.

**Test Steps:**
1. Buka form input nilai
2. Periksa layout form
3. Periksa spacing antar elemen
4. Periksa alignment
5. Periksa color scheme

**Expected Results:**
- ✅ Form memiliki title yang jelas
- ✅ Field labels jelas dan deskriptif
- ✅ Input fields memiliki placeholder yang helpful
- ✅ Spacing antar field konsisten
- ✅ Button placement logical (Submit di kanan bawah)
- ✅ Color scheme konsisten dengan aplikasi
- ✅ Form tidak terlalu panjang/pendek
- ✅ Glassmorphism effect applied

**Actual Results:**
[To be filled]

**Screenshots:**
[Attach screenshot]

**Status:** ⏳ Pending

---

#### TC-UI-INPUT-003: Field Labels dan Placeholders
**Priority:** Medium  
**Status:** ⏳ Pending  
**Category:** UI/UX

**Objective:**  
Memastikan semua field memiliki label dan placeholder yang jelas.

**Test Steps:**
1. Buka form input nilai
2. Periksa setiap field

**Expected Results:**

| Field | Label | Placeholder | Required Indicator |
|-------|-------|-------------|-------------------|
| Student | "Student" atau "Mahasiswa" | "Select student..." | ✅ Asterisk (*) |
| Course | "Course" atau "Mata Kuliah" | "Select course..." | ✅ Asterisk (*) |
| P1 CS | "P1 CS (15%)" | "0-100" | ✅ Asterisk (*) |
| P1 PE | "P1 PE (15%)" | "0-100" | ✅ Asterisk (*) |
| P2 CS | "P2 CS (15%)" | "0-100" | ✅ Asterisk (*) |
| P2 PE | "P2 PE (15%)" | "0-100" | ✅ Asterisk (*) |
| Final | "Final Grade (40%)" | "0-100" | ✅ Asterisk (*) |

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TC-UI-INPUT-004: Dropdown/Select Functionality
**Priority:** High  
**Status:** ⏳ Pending  
**Category:** UI/UX

**Objective:**  
Memastikan dropdown untuk student dan course berfungsi dengan baik.

**Test Steps:**
1. Klik dropdown "Student"
2. Periksa daftar mahasiswa
3. Coba search/filter (jika ada)
4. Pilih salah satu mahasiswa
5. Ulangi untuk dropdown "Course"

**Expected Results:**
- ✅ Dropdown terbuka dengan smooth
- ✅ Daftar mahasiswa tampil lengkap
- ✅ Nama mahasiswa + NIM ditampilkan
- ✅ Search/filter berfungsi (jika ada)
- ✅ Selected value ter-highlight
- ✅ Dropdown menutup setelah select
- ✅ Selected value muncul di field
- ✅ Daftar course tampil lengkap
- ✅ Course code + name ditampilkan

**Actual Results:**
[To be filled]

**Screenshots:**
[Attach screenshot of dropdown]

**Status:** ⏳ Pending

---

#### TC-UI-INPUT-005: Input Field Behavior
**Priority:** High  
**Status:** ⏳ Pending  
**Category:** UI/UX

**Objective:**  
Memastikan input field untuk nilai memiliki behavior yang baik.

**Test Steps:**
1. Klik pada field "P1 CS"
2. Coba input berbagai nilai
3. Test keyboard navigation (Tab)
4. Test copy-paste
5. Ulangi untuk semua field nilai

**Expected Results:**
- ✅ Field accept numeric input
- ✅ Field accept decimal (85.5)
- ✅ Field tidak accept huruf
- ✅ Tab navigation berfungsi
- ✅ Copy-paste berfungsi
- ✅ Focus indicator jelas
- ✅ Cursor position correct
- ✅ Auto-format (jika ada)

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TC-UI-INPUT-006: Button States
**Priority:** Medium  
**Status:** ⏳ Pending  
**Category:** UI/UX

**Objective:**  
Memastikan button memiliki visual states yang jelas.

**Test Steps:**
1. Hover mouse di atas button "Submit"
2. Click button
3. Periksa disabled state (jika ada)
4. Periksa loading state (saat submit)

**Expected Results:**
- ✅ Hover effect visible (color change/scale)
- ✅ Active/pressed state visible
- ✅ Disabled state jelas (grayed out)
- ✅ Loading indicator muncul saat submit
- ✅ Button text jelas dan readable
- ✅ Icon (jika ada) aligned dengan text

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TC-UI-INPUT-007: Responsive Design
**Priority:** Medium  
**Status:** ⏳ Pending  
**Category:** UI/UX

**Objective:**  
Memastikan form responsive di berbagai ukuran layar.

**Test Steps:**
1. Buka form di desktop (1920x1080)
2. Resize browser ke tablet size (768x1024)
3. Resize ke mobile size (375x667)
4. Test di actual mobile device (jika ada)

**Expected Results:**

| Screen Size | Layout | Fields | Buttons | Scrolling |
|-------------|--------|--------|---------|-----------|
| Desktop | ✅ 2 columns | ✅ Full width | ✅ Right aligned | ✅ No scroll |
| Tablet | ✅ 1-2 columns | ✅ Adjusted | ✅ Centered | ✅ Minimal scroll |
| Mobile | ✅ 1 column | ✅ Full width | ✅ Full width | ✅ Scrollable |

**Actual Results:**
[To be filled]

**Screenshots:**
[Attach screenshots for each size]

**Status:** ⏳ Pending

---

#### TC-UI-INPUT-008: Accessibility
**Priority:** Low  
**Status:** ⏳ Pending  
**Category:** UI/UX

**Objective:**  
Memastikan form accessible untuk semua user.

**Test Steps:**
1. Test keyboard-only navigation
2. Test dengan screen reader (jika ada)
3. Periksa color contrast
4. Periksa focus indicators

**Expected Results:**
- ✅ Semua field accessible via keyboard
- ✅ Tab order logical
- ✅ Labels readable by screen reader
- ✅ Error messages announced
- ✅ Color contrast ratio ≥ 4.5:1
- ✅ Focus indicators visible

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

### SECTION 2: Functionality Testing

#### TC-FUNC-INPUT-001: Input Nilai Valid - Scenario 1
**Priority:** Critical  
**Status:** ⏳ Pending  
**Category:** Functionality

**Objective:**  
Memastikan dosen dapat input nilai dengan data yang valid.

**Test Data:**
- Student: Wendi Nugraha Nurrahmansyah (433785520123200185)
- Course: Proyek Database dan Backend (IF101)
- P1 CS: 85.00
- P1 PE: 90.00
- P2 CS: 88.00
- P2 PE: 92.00
- Final Grade: 87.00

**Test Steps:**
1. Login sebagai dosen
2. Klik "Input Grades"
3. Pilih student dari dropdown
4. Pilih course dari dropdown
5. Input P1 CS: `85.00`
6. Input P1 PE: `90.00`
7. Input P2 CS: `88.00`
8. Input P2 PE: `92.00`
9. Input Final Grade: `87.00`
10. Klik button "Submit" atau "Save"

**Expected Results:**
- ✅ Form submitted successfully
- ✅ Success message muncul
- ✅ Message: "Grade successfully added" atau similar
- ✅ Form ter-reset atau modal tertutup
- ✅ Redirect ke dashboard
- ✅ Data muncul di dashboard/table

**Actual Results:**
[To be filled]

**Screenshots:**
- [ ] Before submit
- [ ] Success message
- [ ] After submit (dashboard)

**Status:** ⏳ Pending

**Notes:**
Expected calculated grade: (85*0.15) + (90*0.15) + (88*0.15) + (92*0.15) + (87*0.40) = 88.05 → Grade A

---

#### TC-FUNC-INPUT-002: Input Nilai Valid - Scenario 2 (Perfect Score)
**Priority:** High  
**Status:** ⏳ Pending  
**Category:** Functionality

**Objective:**  
Test input dengan nilai perfect (100).

**Test Data:**
- Student: Saffa Alfarisyi (433785520123200186)
- Course: Proyek Database dan Backend (IF101)
- All grades: 100.00

**Test Steps:**
1. Login sebagai dosen
2. Klik "Input Grades"
3. Pilih student
4. Pilih course
5. Input semua nilai dengan `100.00`
6. Submit

**Expected Results:**
- ✅ Form accepted
- ✅ Success message
- ✅ Calculated grade: 100.00
- ✅ Grade letter: A
- ✅ Grade point: 4.00

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TC-FUNC-INPUT-003: Input Nilai Valid - Scenario 3 (Minimum Passing)
**Priority:** High  
**Status:** ⏳ Pending  
**Category:** Functionality

**Objective:**  
Test input dengan nilai minimum passing (D).

**Test Data:**
- Student: [Any student]
- Course: [Any course]
- P1 CS: 50.00
- P1 PE: 50.00
- P2 CS: 50.00
- P2 PE: 50.00
- Final Grade: 50.00

**Test Steps:**
1. Input nilai seperti test data
2. Submit

**Expected Results:**
- ✅ Form accepted
- ✅ Calculated grade: 50.00
- ✅ Grade letter: D
- ✅ Grade point: 1.00

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TC-FUNC-INPUT-004: Input Nilai dengan Decimal
**Priority:** Medium  
**Status:** ⏳ Pending  
**Category:** Functionality

**Objective:**  
Test input dengan nilai desimal.

**Test Data:**
- P1 CS: 85.50
- P1 PE: 90.25
- P2 CS: 88.75
- P2 PE: 92.50
- Final Grade: 87.25

**Test Steps:**
1. Input nilai dengan desimal
2. Submit

**Expected Results:**
- ✅ Decimal values accepted
- ✅ Calculation correct
- ✅ Display dengan 2 decimal places

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TC-FUNC-INPUT-005: Multiple Input dalam Satu Session
**Priority:** High  
**Status:** ⏳ Pending  
**Category:** Functionality

**Objective:**  
Test input nilai untuk multiple students berturut-turut.

**Test Steps:**
1. Input nilai untuk Student 1
2. Submit
3. Buka form lagi
4. Input nilai untuk Student 2
5. Submit
6. Ulangi untuk Student 3

**Expected Results:**
- ✅ Semua input berhasil
- ✅ No data loss
- ✅ Form ter-reset setiap kali
- ✅ No performance degradation

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TC-FUNC-INPUT-006: Cancel/Close Form
**Priority:** Medium  
**Status:** ⏳ Pending  
**Category:** Functionality

**Objective:**  
Test cancel/close form tanpa submit.

**Test Steps:**
1. Buka form input nilai
2. Input beberapa data (jangan submit)
3. Klik button "Cancel" atau "X" (close)
4. Buka form lagi

**Expected Results:**
- ✅ Form tertutup
- ✅ Data tidak tersimpan
- ✅ Form kosong saat dibuka lagi
- ✅ No error messages

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

### SECTION 3: Validation Testing

#### TC-VAL-INPUT-001: Required Field - Student
**Priority:** Critical  
**Status:** ⏳ Pending  
**Category:** Validation

**Objective:**  
Memastikan field "Student" wajib diisi.

**Test Steps:**
1. Buka form input nilai
2. Kosongkan field "Student"
3. Isi semua field lain dengan data valid
4. Klik "Submit"

**Expected Results:**
- ✅ Form tidak ter-submit
- ✅ Error message muncul
- ✅ Message: "Student is required" atau similar
- ✅ Error message dekat dengan field
- ✅ Field ter-highlight (red border)
- ✅ Focus kembali ke field Student

**Actual Results:**
[To be filled]

**Screenshots:**
[Attach screenshot of error]

**Status:** ⏳ Pending

---

#### TC-VAL-INPUT-002: Required Field - Course
**Priority:** Critical  
**Status:** ⏳ Pending  
**Category:** Validation

**Objective:**  
Memastikan field "Course" wajib diisi.

**Test Steps:**
1. Pilih student
2. Kosongkan field "Course"
3. Isi semua nilai
4. Submit

**Expected Results:**
- ✅ Validation error
- ✅ Message: "Course is required"
- ✅ Field highlighted
- ✅ Form tidak ter-submit

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TC-VAL-INPUT-003: Required Field - All Grades
**Priority:** Critical  
**Status:** ⏳ Pending  
**Category:** Validation

**Objective:**  
Memastikan semua field nilai wajib diisi.

**Test Steps:**
1. Pilih student dan course
2. Kosongkan P1 CS
3. Isi field lain
4. Submit
5. Ulangi untuk setiap field nilai

**Expected Results:**

| Field Kosong | Error Message | Highlighted |
|--------------|---------------|-------------|
| P1 CS | ✅ "P1 CS is required" | ✅ Yes |
| P1 PE | ✅ "P1 PE is required" | ✅ Yes |
| P2 CS | ✅ "P2 CS is required" | ✅ Yes |
| P2 PE | ✅ "P2 PE is required" | ✅ Yes |
| Final Grade | ✅ "Final Grade is required" | ✅ Yes |

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TC-VAL-INPUT-004: Invalid Data Type - Alphabetic
**Priority:** High  
**Status:** ⏳ Pending  
**Category:** Validation

**Objective:**  
Memastikan field nilai tidak accept huruf.

**Test Steps:**
1. Pilih student dan course
2. Input "abc" di field P1 CS
3. Input "xyz" di field P1 PE
4. Isi field lain dengan valid
5. Submit

**Expected Results:**
- ✅ Validation error
- ✅ Message: "P1 CS must be a number" atau similar
- ✅ Field tidak accept huruf (atau error saat submit)
- ✅ Form tidak ter-submit

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TC-VAL-INPUT-005: Invalid Data Type - Special Characters
**Priority:** Medium  
**Status:** ⏳ Pending  
**Category:** Validation

**Objective:**  
Test input dengan special characters.

**Test Steps:**
1. Input "@#$%" di field P1 CS
2. Input "!@#" di field P1 PE
3. Submit

**Expected Results:**
- ✅ Validation error atau field tidak accept
- ✅ Clear error message

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TC-VAL-INPUT-006: Out of Range - Above Maximum
**Priority:** Critical  
**Status:** ⏳ Pending  
**Category:** Validation

**Objective:**  
Memastikan nilai tidak bisa > 100.

**Test Steps:**
1. Pilih student dan course
2. Input `150` di field P1 CS
3. Input `200` di field P1 PE
4. Isi field lain dengan valid
5. Submit

**Expected Results:**
- ✅ Validation error
- ✅ Message: "P1 CS must be between 0 and 100" atau similar
- ✅ Field highlighted
- ✅ Form tidak ter-submit

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TC-VAL-INPUT-007: Out of Range - Below Minimum
**Priority:** Critical  
**Status:** ⏳ Pending  
**Category:** Validation

**Objective:**  
Memastikan nilai tidak bisa < 0.

**Test Steps:**
1. Input `-10` di field P1 CS
2. Input `-5` di field P1 PE
3. Submit

**Expected Results:**
- ✅ Validation error
- ✅ Message: "P1 CS must be between 0 and 100"
- ✅ Form tidak ter-submit

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TC-VAL-INPUT-008: Duplicate Entry Prevention
**Priority:** High  
**Status:** ⏳ Pending  
**Category:** Validation

**Objective:**  
Memastikan tidak bisa input nilai duplicate untuk student & course yang sama.

**Test Steps:**
1. Input nilai untuk Student A, Course X
2. Submit (berhasil)
3. Buka form lagi
4. Coba input nilai lagi untuk Student A, Course X yang sama
5. Submit

**Expected Results:**
- ✅ Validation error
- ✅ Message: "Grade already exists for this student and course" atau similar
- ✅ Form tidak ter-submit
- ✅ Suggest untuk view/edit existing grade (jika ada fitur)

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

### SECTION 4: Error Handling Testing

#### TC-ERR-INPUT-001: Network Error Simulation
**Priority:** Medium  
**Status:** ⏳ Pending  
**Category:** Error Handling

**Objective:**  
Test behavior saat terjadi network error.

**Test Steps:**
1. Buka form input nilai
2. Isi semua data dengan valid
3. Disconnect internet/network
4. Klik "Submit"
5. Reconnect internet

**Expected Results:**
- ✅ Error message muncul
- ✅ Message: "Network error. Please check your connection" atau similar
- ✅ Data tidak hilang dari form
- ✅ User bisa retry submit
- ✅ No data corruption

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TC-ERR-INPUT-002: Server Error Simulation
**Priority:** Medium  
**Status:** ⏳ Pending  
**Category:** Error Handling

**Objective:**  
Test behavior saat server error (500).

**Test Steps:**
1. [Requires server-side simulation]
2. Submit form saat server error

**Expected Results:**
- ✅ User-friendly error message
- ✅ Message: "Something went wrong. Please try again later"
- ✅ No technical jargon
- ✅ Data preserved in form

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TC-ERR-INPUT-003: Session Timeout
**Priority:** High  
**Status:** ⏳ Pending  
**Category:** Error Handling

**Objective:**  
Test behavior saat session timeout.

**Test Steps:**
1. Login sebagai dosen
2. Buka form input nilai
3. Tunggu sampai session timeout (atau clear session manually)
4. Isi form
5. Submit

**Expected Results:**
- ✅ Redirect ke login page
- ✅ Message: "Session expired. Please login again"
- ✅ After login, redirect back to dashboard
- ✅ No data loss (jika possible)

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TC-ERR-INPUT-004: Browser Back Button
**Priority:** Low  
**Status:** ⏳ Pending  
**Category:** Error Handling

**Objective:**  
Test behavior saat user klik back button setelah submit.

**Test Steps:**
1. Input nilai dan submit (berhasil)
2. Klik browser back button
3. Observe behavior

**Expected Results:**
- ✅ Tidak kembali ke form dengan data lama
- ✅ Tidak re-submit data
- ✅ Kembali ke dashboard atau show warning

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

### SECTION 5: Data Verification Testing

#### TC-DATA-INPUT-001: Verify Data Saved in Database
**Priority:** Critical  
**Status:** ⏳ Pending  
**Category:** Data Verification

**Objective:**  
Memastikan data tersimpan dengan benar di database.

**Test Steps:**
1. Input nilai dengan data:
   - Student: Wendi (433785520123200185)
   - Course: IF101
   - P1 CS: 85.00
   - P1 PE: 90.00
   - P2 CS: 88.00
   - P2 PE: 92.00
   - Final: 87.00
2. Submit
3. Check di dashboard/table
4. Check di student transcript (jika ada akses)

**Expected Results:**
- ✅ Data muncul di dashboard
- ✅ Student name correct
- ✅ Course name correct
- ✅ All grade values correct
- ✅ Calculated grade correct (88.05)
- ✅ Grade letter correct (A)
- ✅ Grade point correct (4.00)
- ✅ Timestamp recorded

**Actual Results:**
[To be filled]

**Verification Checklist:**
- [ ] Student NIM: 433785520123200185
- [ ] Course Code: IF101
- [ ] P1 CS: 85.00
- [ ] P1 PE: 90.00
- [ ] P2 CS: 88.00
- [ ] P2 PE: 92.00
- [ ] Final Grade: 87.00
- [ ] Calculated: 88.05
- [ ] Grade Letter: A
- [ ] Grade Point: 4.00

**Status:** ⏳ Pending

---

#### TC-DATA-INPUT-002: Verify Grade Calculation
**Priority:** Critical  
**Status:** ⏳ Pending  
**Category:** Data Verification

**Objective:**  
Memastikan perhitungan grade sesuai formula.

**Test Data & Expected Results:**

| Test | P1 CS | P1 PE | P2 CS | P2 PE | Final | Expected Grade | Expected Letter |
|------|-------|-------|-------|-------|-------|----------------|-----------------|
| 1 | 85 | 90 | 88 | 92 | 87 | 88.05 | A |
| 2 | 100 | 100 | 100 | 100 | 100 | 100.00 | A |
| 3 | 50 | 50 | 50 | 50 | 50 | 50.00 | D |
| 4 | 80 | 82 | 84 | 86 | 85 | 83.80 | A- |
| 5 | 70 | 72 | 74 | 76 | 75 | 73.80 | B |

**Test Steps:**
1. Input setiap test case
2. Submit
3. Verify calculated grade
4. Verify grade letter

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

#### TC-DATA-INPUT-003: Verify Integrity Hash
**Priority:** High  
**Status:** ⏳ Pending  
**Category:** Data Verification

**Objective:**  
Memastikan integrity hash ter-generate.

**Test Steps:**
1. Input nilai
2. Submit
3. View data di transcript atau via inspect element
4. Check integrity hash field

**Expected Results:**
- ✅ Integrity hash exists
- ✅ Hash format: 64 hexadecimal characters
- ✅ Hash unique untuk setiap record
- ✅ Hash tidak berubah setelah disimpan

**Actual Results:**
[To be filled]

**Sample Hash:**
```
[Paste integrity hash here]
```

**Status:** ⏳ Pending

---

#### TC-DATA-INPUT-004: Verify Data Immutability
**Priority:** Critical  
**Status:** ⏳ Pending  
**Category:** Data Verification

**Objective:**  
Memastikan data nilai tidak bisa diubah setelah disimpan.

**Test Steps:**
1. Input nilai dan submit
2. Cari data yang baru di-input di dashboard/table
3. Coba cari button/link "Edit" atau "Update"
4. Coba klik pada data (jika clickable)

**Expected Results:**
- ✅ Tidak ada button "Edit" atau "Update"
- ✅ Data read-only
- ✅ Klik data hanya show detail, tidak edit
- ✅ Integrity maintained

**Actual Results:**
[To be filled]

**Status:** ⏳ Pending

---

## 📋 Testing Checklist

### Pre-Testing Setup
- [ ] Browser: Chrome/Firefox/Edge installed
- [ ] Screen resolution: 1920x1080
- [ ] Internet connection: Stable
- [ ] Test accounts ready (dosen credentials)
- [ ] Screenshot tool ready
- [ ] Note-taking tool ready

### During Testing
- [ ] Follow test steps exactly
- [ ] Take screenshots for each test
- [ ] Note any deviations
- [ ] Record actual results
- [ ] Note execution time
- [ ] Check console for errors

### Post-Testing
- [ ] Fill all "Actual Results"
- [ ] Update test status
- [ ] Attach all screenshots
- [ ] Document bugs found
- [ ] Calculate pass/fail rate
- [ ] Write summary report

---

## 🐛 Bug Report Template

Jika menemukan bug, dokumentasikan dengan format berikut:

```markdown
### BUG-BB-[ID]: [Bug Title]

**Severity:** Critical / High / Medium / Low  
**Found in Test:** [TC-ID]  
**Date:** YYYY-MM-DD HH:MM

**Description:**
[Detailed description of the bug]

**Steps to Reproduce:**
1. [Step 1]
2. [Step 2]
3. [Step 3]

**Expected Behavior:**
[What should happen]

**Actual Behavior:**
[What actually happens]

**Screenshots:**
[Attach screenshots]

**Browser:** Chrome/Firefox/Edge  
**OS:** Windows/Mac/Linux  
**Screen Resolution:** 1920x1080

**Impact:**
[How does this affect users?]

**Suggested Priority:**
[Critical/High/Medium/Low]

**Workaround:**
[If any temporary solution exists]
```

---

## 📊 Test Execution Log

### Session 1
**Date:** [YYYY-MM-DD]  
**Time:** [HH:MM - HH:MM]  
**Tester:** [Name]  
**Tests Executed:** [X/30]  
**Passed:** [X]  
**Failed:** [X]  
**Blocked:** [X]

**Notes:**
[Any observations]

---

### Session 2
**Date:** [YYYY-MM-DD]  
**Time:** [HH:MM - HH:MM]  
**Tester:** [Name]  
**Tests Executed:** [X/30]  
**Passed:** [X]  
**Failed:** [X]  
**Blocked:** [X]

**Notes:**
[Any observations]

---

## 📈 Test Metrics

### Coverage
- **Total Test Cases:** 30
- **Executed:** 0
- **Passed:** 0
- **Failed:** 0
- **Blocked:** 0
- **Pass Rate:** 0%

### By Category
| Category | Total | Passed | Failed | Pass Rate |
|----------|-------|--------|--------|-----------|
| UI/UX | 8 | 0 | 0 | 0% |
| Functionality | 6 | 0 | 0 | 0% |
| Validation | 8 | 0 | 0 | 0% |
| Error Handling | 4 | 0 | 0 | 0% |
| Data Verification | 4 | 0 | 0 | 0% |

### By Priority
| Priority | Total | Passed | Failed |
|----------|-------|--------|--------|
| Critical | 10 | 0 | 0 |
| High | 10 | 0 | 0 |
| Medium | 8 | 0 | 0 |
| Low | 2 | 0 | 0 |

---

## 📝 Final Test Report Template

```markdown
# Black Box Testing Report - Input Nilai

## Executive Summary
**Testing Period:** [Start Date] - [End Date]  
**Tester:** [Your Name]  
**Total Tests:** 30  
**Passed:** X  
**Failed:** X  
**Pass Rate:** XX%

## Overall Assessment
[Brief assessment of the feature]

## Test Results Summary

### Passed Tests
[List of passed tests]

### Failed Tests
[List of failed tests with brief description]

### Blocked Tests
[List of blocked tests with reason]

## Critical Issues Found
1. [Issue 1]
2. [Issue 2]

## High Priority Issues
1. [Issue 1]
2. [Issue 2]

## Medium/Low Priority Issues
1. [Issue 1]
2. [Issue 2]

## Recommendations
1. [Recommendation 1]
2. [Recommendation 2]
3. [Recommendation 3]

## Conclusion
[Overall conclusion about the feature quality]

**Status:** ✅ Ready for Production / ⚠️ Needs Fixes / ❌ Not Ready

**Sign-off:**
- Tester: [Name]
- Date: [Date]
- Signature: [Signature]
```

---

## 🎯 Success Criteria

Testing dianggap **PASSED** jika:
- ✅ Pass rate ≥ 95%
- ✅ Tidak ada critical bugs
- ✅ Semua validation berfungsi
- ✅ UI/UX acceptable
- ✅ Data tersimpan dengan benar
- ✅ Error handling adequate

---

## 📚 References

### Test Data
- **Dosen Account:**
  - Username: `198503152010121002`
  - Password: `password`

- **Sample Students:**
  - Wendi Nugraha Nurrahmansyah (433785520123200185)
  - Saffa Alfarisyi (433785520123200186)

- **Sample Course:**
  - Code: IF101
  - Name: Proyek Database dan Backend
  - SKS: 4

### Grade Calculation Formula
```
Final Grade = (P1_CS * 0.15) + (P1_PE * 0.15) + (P2_CS * 0.15) + (P2_PE * 0.15) + (Final * 0.40)
```

### Grade Letter Mapping
- A: 85-100
- A-: 80-84.99
- B+: 75-79.99
- B: 70-74.99
- B-: 65-69.99
- C+: 60-64.99
- C: 55-59.99
- D: 50-54.99
- E: 0-49.99

---

**Happy Testing! 🧪✨**
