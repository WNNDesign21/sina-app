# Black Box Testing Results

## Overview
Dokumen ini berisi hasil testing black box untuk aplikasi SINA Secure.

**Testing Period:** [Start Date] - [End Date]  
**Tester:** [Your Name]  
**Version:** 1.0.0

---

## Test Summary

| Category | Total Tests | Passed | Failed | Pending |
|----------|-------------|--------|--------|---------|
| Authentication | 0 | 0 | 0 | 0 |
| Dashboard Dosen | 0 | 0 | 0 | 0 |
| Dashboard Mahasiswa | 0 | 0 | 0 | 0 |
| Transcript | 0 | 0 | 0 | 0 |
| UI/UX | 0 | 0 | 0 | 0 |
| Data Integrity | 0 | 0 | 0 | 0 |
| **TOTAL** | **0** | **0** | **0** | **0** |

---

## Test Cases

### 1. Authentication & Authorization

#### TC-AUTH-001: Login Dosen dengan Kredensial Valid
**Date:** YYYY-MM-DD  
**Priority:** High  
**Status:** ⏳ Pending

**Pre-conditions:**
- Database sudah di-seed dengan user dosen
- Server running

**Test Steps:**
1. Buka halaman login (http://127.0.0.1:8000)
2. Input username: `198503152010121002`
3. Input password: `password`
4. Klik tombol "Sign In"

**Expected Result:**
- Redirect ke dashboard dosen
- Menampilkan nama dosen di header
- Sidebar menampilkan menu dosen

**Actual Result:**
[To be filled during testing]

**Screenshots:**
[Attach screenshots]

**Notes:**
[Any additional notes]

---

#### TC-AUTH-002: Login Mahasiswa dengan Kredensial Valid
**Date:** YYYY-MM-DD  
**Priority:** High  
**Status:** ⏳ Pending

**Test Steps:**
1. Buka halaman login
2. Input username: `433785520123200185`
3. Input password: `password`
4. Klik tombol "Sign In"

**Expected Result:**
- Redirect ke dashboard mahasiswa
- Menampilkan nama mahasiswa di header
- Sidebar menampilkan menu mahasiswa

**Actual Result:**
[To be filled]

---

#### TC-AUTH-003: Login dengan Kredensial Invalid
**Date:** YYYY-MM-DD  
**Priority:** High  
**Status:** ⏳ Pending

**Test Steps:**
1. Buka halaman login
2. Input username: `wronguser`
3. Input password: `wrongpass`
4. Klik tombol "Sign In"

**Expected Result:**
- Tetap di halaman login
- Menampilkan error message
- Form tidak ter-reset

**Actual Result:**
[To be filled]

---

### 2. Dashboard Dosen

#### TC-DASH-D-001: View Statistics
**Date:** YYYY-MM-DD  
**Priority:** High  
**Status:** ⏳ Pending

**Test Steps:**
1. Login sebagai dosen
2. View dashboard

**Expected Result:**
- Total Students ditampilkan dengan benar
- Average Grade dihitung dengan benar
- Integrity Score 100%
- Statistics cards responsive

**Actual Result:**
[To be filled]

---

#### TC-DASH-D-002: Grade Distribution Chart
**Date:** YYYY-MM-DD  
**Priority:** Medium  
**Status:** ⏳ Pending

**Test Steps:**
1. Login sebagai dosen
2. View grade distribution chart

**Expected Result:**
- Chart ter-render dengan benar
- Data sesuai dengan database
- Hover tooltip berfungsi
- Animasi smooth

**Actual Result:**
[To be filled]

---

#### TC-DASH-D-003: Input Grades
**Date:** YYYY-MM-DD  
**Priority:** High  
**Status:** ⏳ Pending

**Test Steps:**
1. Login sebagai dosen
2. Klik "Input Grades"
3. Pilih student
4. Pilih course
5. Input semua nilai (P1 CS, P1 PE, P2 CS, P2 PE, Final)
6. Submit

**Expected Result:**
- Form validation berfungsi
- Grade dihitung otomatis
- Integrity hash generated
- Success message ditampilkan
- Data tersimpan di database

**Actual Result:**
[To be filled]

---

### 3. Dashboard Mahasiswa

#### TC-DASH-M-001: View Personal Statistics
**Date:** YYYY-MM-DD  
**Priority:** High  
**Status:** ⏳ Pending

**Test Steps:**
1. Login sebagai mahasiswa
2. View dashboard

**Expected Result:**
- IPS ditampilkan dengan benar
- Total SKS sesuai
- Status akademik sesuai IPS
- Cards responsive

**Actual Result:**
[To be filled]

---

#### TC-DASH-M-002: Course Distribution Donut Chart
**Date:** YYYY-MM-DD  
**Priority:** Medium  
**Status:** ⏳ Pending

**Test Steps:**
1. Login sebagai mahasiswa
2. View course distribution chart

**Expected Result:**
- Donut chart ter-render
- IPS di tengah chart
- Legend di samping kanan
- Warna berbeda untuk tiap course
- SKS dan percentage ditampilkan

**Actual Result:**
[To be filled]

---

### 4. Transcript

#### TC-TRANS-001: View Student Transcript
**Date:** YYYY-MM-DD  
**Priority:** High  
**Status:** ⏳ Pending

**Test Steps:**
1. Login sebagai mahasiswa
2. Klik "Transcript" di sidebar
3. View transcript page

**Expected Result:**
- Semua mata kuliah ditampilkan
- Grade breakdown lengkap
- Integrity hash visible
- Summary statistics benar
- Print button berfungsi

**Actual Result:**
[To be filled]

---

#### TC-TRANS-002: View Lecturer Transcript
**Date:** YYYY-MM-DD  
**Priority:** High  
**Status:** ⏳ Pending

**Test Steps:**
1. Login sebagai dosen
2. Klik "Student Transcripts"
3. View daftar mahasiswa
4. Klik salah satu mahasiswa untuk expand

**Expected Result:**
- Daftar mahasiswa ditampilkan
- Summary (SKS, IPS, Courses) benar
- Expand/collapse berfungsi
- Detail nilai lengkap
- Animasi smooth

**Actual Result:**
[To be filled]

---

### 5. UI/UX

#### TC-UI-001: Theme Switcher - Dark Mode
**Date:** YYYY-MM-DD  
**Priority:** Medium  
**Status:** ⏳ Pending

**Test Steps:**
1. Login (dosen atau mahasiswa)
2. Klik theme switcher
3. Pilih Dark mode

**Expected Result:**
- Background gelap
- Text putih/terang
- Icons berubah ke moon
- Theme tersimpan di localStorage
- Konsisten di semua halaman

**Actual Result:**
[To be filled]

---

#### TC-UI-002: Theme Switcher - Light Mode
**Date:** YYYY-MM-DD  
**Priority:** Medium  
**Status:** ⏳ Pending

**Test Steps:**
1. Klik theme switcher
2. Pilih Light mode

**Expected Result:**
- Background terang
- Text gelap
- Icons berubah ke sun
- Semua text terbaca jelas
- No contrast issues

**Actual Result:**
[To be filled]

---

#### TC-UI-003: Responsive Design - Mobile
**Date:** YYYY-MM-DD  
**Priority:** High  
**Status:** ⏳ Pending

**Test Steps:**
1. Buka aplikasi di mobile browser atau resize window
2. Test semua halaman

**Expected Result:**
- Layout adjust untuk mobile
- Sidebar collapse/hamburger menu
- Charts responsive
- Tables scrollable
- Touch-friendly buttons

**Actual Result:**
[To be filled]

---

### 6. Data Integrity

#### TC-INT-001: Integrity Hash Generation
**Date:** YYYY-MM-DD  
**Priority:** Critical  
**Status:** ⏳ Pending

**Test Steps:**
1. Input nilai baru
2. Check database untuk integrity_hash

**Expected Result:**
- Hash generated otomatis
- Hash unique untuk setiap record
- Hash format SHA-256 (64 characters)

**Actual Result:**
[To be filled]

---

#### TC-INT-002: Immutable Records
**Date:** YYYY-MM-DD  
**Priority:** Critical  
**Status:** ⏳ Pending

**Test Steps:**
1. Coba edit nilai yang sudah ada
2. Check apakah bisa diubah

**Expected Result:**
- Nilai tidak bisa diubah
- No edit button/functionality
- Data integrity maintained

**Actual Result:**
[To be filled]

---

## Bugs Found

### BUG-001: [Bug Title]
**Severity:** Critical / High / Medium / Low  
**Status:** Open / In Progress / Fixed  
**Found Date:** YYYY-MM-DD

**Description:**
[Detailed description]

**Steps to Reproduce:**
1. Step 1
2. Step 2

**Expected vs Actual:**
- Expected: [...]
- Actual: [...]

**Screenshots:**
[Attach]

**Workaround:**
[If any]

---

## Recommendations

1. [Recommendation 1]
2. [Recommendation 2]
3. [Recommendation 3]

---

## Conclusion

[Overall assessment of the application based on black box testing]

**Overall Status:** ✅ Ready for Production / ⚠️ Needs Minor Fixes / ❌ Needs Major Fixes

**Sign-off:**
- Tester: [Name]
- Date: [Date]
- Signature: [Signature]
