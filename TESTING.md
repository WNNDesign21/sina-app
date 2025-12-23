# Testing Guide - SINA Secure

Panduan untuk melakukan testing pada aplikasi SINA Secure menggunakan branch terpisah.

## 📋 Branch Structure

Repository ini memiliki 3 branch utama:

### 1. `main` - Production Branch
- Branch utama untuk kode production
- Hanya menerima merge dari testing branches setelah semua test passed
- Protected branch (tidak boleh push langsung)

### 2. `testing/blackbox` - Black Box Testing
- Branch untuk melakukan **Black Box Testing**
- Testing dari perspektif user/external
- Fokus pada functionality, UI/UX, dan user experience

### 3. `testing/whitebox` - White Box Testing
- Branch untuk melakukan **White Box Testing**
- Testing internal code structure
- Fokus pada code coverage, logic paths, dan unit tests

---

## 🔄 Workflow Testing

### Untuk Black Box Testing:

```bash
# 1. Switch ke branch blackbox
git checkout testing/blackbox

# 2. Pull latest changes
git pull origin testing/blackbox

# 3. Lakukan testing dan dokumentasi
# - Test semua fitur dari perspektif user
# - Dokumentasikan bugs di BLACKBOX_TESTS.md
# - Screenshot/video jika perlu

# 4. Commit hasil testing
git add .
git commit -m "test: blackbox testing - [feature name]"
git push origin testing/blackbox

# 5. Jika semua test passed, buat Pull Request ke main
```

### Untuk White Box Testing:

```bash
# 1. Switch ke branch whitebox
git checkout testing/whitebox

# 2. Pull latest changes
git pull origin testing/whitebox

# 3. Lakukan testing dan dokumentasi
# - Write unit tests
# - Test code coverage
# - Dokumentasikan di WHITEBOX_TESTS.md

# 4. Commit hasil testing
git add .
git commit -m "test: whitebox testing - [component name]"
git push origin testing/whitebox

# 5. Jika semua test passed, buat Pull Request ke main
```

---

## 🧪 Black Box Testing Checklist

### Authentication & Authorization
- [ ] Login dengan kredensial valid (Dosen)
- [ ] Login dengan kredensial valid (Mahasiswa)
- [ ] Login dengan kredensial invalid
- [ ] Logout functionality
- [ ] Session management
- [ ] Role-based access control

### Dashboard Dosen
- [ ] View statistics (Total Students, Average Grade, Integrity Score)
- [ ] Grade distribution chart rendering
- [ ] Input grades form validation
- [ ] Submit grades successfully
- [ ] View live integrity logs
- [ ] Navigate to Student Transcripts
- [ ] Theme switcher (Dark/Light/Auto)

### Dashboard Mahasiswa
- [ ] View personal statistics (IPS, Total SKS, Status)
- [ ] Course distribution donut chart
- [ ] Chart legend and tooltips
- [ ] View academic history table
- [ ] Navigate to Transcript
- [ ] Theme switcher functionality

### Transcript Features
- [ ] View complete transcript (Mahasiswa)
- [ ] View all students transcripts (Dosen)
- [ ] Expand/collapse student details
- [ ] Grade breakdown display
- [ ] Integrity hash verification
- [ ] Print functionality

### UI/UX
- [ ] Responsive design (Desktop, Tablet, Mobile)
- [ ] Dark mode styling
- [ ] Light mode styling
- [ ] Auto mode (follows system preference)
- [ ] Theme persistence across pages
- [ ] Animations and transitions
- [ ] Loading states
- [ ] Error messages

### Data Integrity
- [ ] Integrity hash generated correctly
- [ ] Cannot modify existing grades
- [ ] Audit trail logging
- [ ] Data validation on input

---

## 🔬 White Box Testing Checklist

### Unit Tests

#### Models
- [ ] `Student` model relationships
- [ ] `Lecturer` model relationships
- [ ] `Course` model relationships
- [ ] `AcademicRecord` model relationships
- [ ] Model validation rules

#### Controllers
- [ ] `DashboardController@index` (Dosen)
- [ ] `DashboardController@index` (Mahasiswa)
- [ ] `DashboardController@store` (Input grades)
- [ ] `DashboardController@transcript` (Mahasiswa)
- [ ] `DashboardController@lecturerTranscript` (Dosen)

#### Services
- [ ] `GradeCalculationService::calculateGrade()`
- [ ] `GradeCalculationService::getGradeLetter()`
- [ ] `GradeCalculationService::getGradePoint()`
- [ ] Integrity hash generation

### Integration Tests
- [ ] Login flow (Dosen)
- [ ] Login flow (Mahasiswa)
- [ ] Grade input flow
- [ ] Transcript generation
- [ ] Theme switching

### Code Coverage
- [ ] Aim for >80% code coverage
- [ ] Test all edge cases
- [ ] Test error handling
- [ ] Test validation rules

### Security Tests
- [ ] SQL Injection prevention
- [ ] XSS prevention
- [ ] CSRF protection
- [ ] Authentication bypass attempts
- [ ] Authorization bypass attempts
- [ ] Session hijacking prevention

---

## 📊 Test Documentation

### Black Box Test Results
Dokumentasikan di: `docs/BLACKBOX_TESTS.md`

Format:
```markdown
## Test Case: [Feature Name]
**Date:** YYYY-MM-DD
**Tester:** [Your Name]
**Status:** ✅ Pass / ❌ Fail

### Test Steps:
1. Step 1
2. Step 2
3. Step 3

### Expected Result:
[What should happen]

### Actual Result:
[What actually happened]

### Screenshots:
[Attach screenshots if needed]

### Notes:
[Any additional notes]
```

### White Box Test Results
Dokumentasikan di: `docs/WHITEBOX_TESTS.md`

Format:
```markdown
## Test: [Component/Function Name]
**Date:** YYYY-MM-DD
**Tester:** [Your Name]
**Coverage:** XX%

### Test Code:
```php
// Your test code here
```

### Results:
- ✅ All assertions passed
- Code coverage: XX%
- Edge cases tested: X/X

### Issues Found:
[List any issues]
```

---

## 🐛 Bug Reporting

Jika menemukan bug, buat issue di GitHub dengan format:

**Title:** `[BUG] Short description`

**Body:**
```markdown
## Bug Description
[Detailed description]

## Steps to Reproduce
1. Step 1
2. Step 2
3. Step 3

## Expected Behavior
[What should happen]

## Actual Behavior
[What actually happens]

## Environment
- Branch: testing/blackbox or testing/whitebox
- Browser: [Chrome/Firefox/Safari]
- OS: [Windows/Mac/Linux]

## Screenshots
[Attach screenshots]

## Additional Context
[Any other relevant information]
```

---

## ✅ Merge Criteria

Sebelum merge ke `main`, pastikan:

### Black Box Testing
- [ ] Semua test cases passed
- [ ] No critical bugs
- [ ] UI/UX acceptable
- [ ] Cross-browser tested
- [ ] Responsive design verified

### White Box Testing
- [ ] All unit tests passed
- [ ] Code coverage >80%
- [ ] No security vulnerabilities
- [ ] Code review completed
- [ ] Documentation updated

---

## 🚀 Running Tests

### PHPUnit (Unit Tests)
```bash
# Run all tests
php artisan test

# Run specific test
php artisan test --filter=TestName

# Run with coverage
php artisan test --coverage
```

### Manual Testing
```bash
# Start development server
php artisan serve

# In another terminal
npm run dev

# Access application
http://127.0.0.1:8000
```

---

## 📝 Notes

- **Jangan merge langsung ke `main`** - Selalu gunakan Pull Request
- **Document semua findings** - Baik bugs maupun improvements
- **Communicate dengan team** - Diskusikan issues yang ditemukan
- **Keep branches updated** - Regularly pull from main

---

## 🤝 Contributing to Tests

1. Fork the repository
2. Create your testing branch (`git checkout -b testing/feature-name`)
3. Write your tests
4. Commit your changes (`git commit -m 'test: add tests for feature'`)
5. Push to the branch (`git push origin testing/feature-name`)
6. Create a Pull Request

---

**Happy Testing! 🧪✨**
