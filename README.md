# SINA - Sistem Integritas Nilai Akademik

![Laravel](https://img.shields.io/badge/Laravel-11.x-red)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue)
![License](https://img.shields.io/badge/License-MIT-green)

**SINA Secure** adalah sistem manajemen nilai akademik yang aman dengan fitur integritas data menggunakan hashing kriptografi. Sistem ini dirancang untuk mencegah manipulasi nilai dan memastikan transparansi dalam pengelolaan data akademik.

## 🌟 Fitur Utama

### 🔐 Keamanan & Integritas
- **Integrity Hash** - Setiap nilai dilindungi dengan hash SHA-256
- **Immutable Records** - Data nilai tidak dapat diubah setelah disimpan
- **Audit Trail** - Log lengkap semua aktivitas
- **Role-based Access** - Akses berbasis peran (Dosen & Mahasiswa)

### 👨‍🏫 Dashboard Dosen
- Input nilai mahasiswa dengan validasi
- Visualisasi distribusi nilai (Chart.js)
- Lihat transcript semua mahasiswa yang diajar
- Real-time statistics

### 👨‍🎓 Dashboard Mahasiswa
- Lihat nilai per mata kuliah
- Course distribution chart (donut chart dengan SKS weighting)
- Transcript lengkap dengan detail breakdown nilai
- IPS calculation

### 🎨 UI/UX
- **Dark Mode, Light Mode & Auto Mode**
- Glassmorphism design
- Smooth animations (Anime.js)
- Responsive layout
- Premium aesthetics

## 📋 Persyaratan Sistem

- PHP >= 8.2
- Composer
- Node.js & NPM
- SQLite (default) atau MySQL/PostgreSQL

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/WNNDesign21/sina-app.git
cd sina-app
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### 3. Environment Setup

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup

```bash
# Run migrations
php artisan migrate

# (Optional) Seed database dengan data dummy
php artisan db:seed
```

### 5. Build Assets

```bash
# Development
npm run dev

# Production
npm run build
```

### 6. Run Application

```bash
# Start Laravel development server
php artisan serve

# In another terminal, run Vite dev server
npm run dev
```

Aplikasi akan berjalan di `http://127.0.0.1:8000`

## 👥 Default Users

Setelah seeding, gunakan kredensial berikut untuk login:

### Dosen
- **Username:** `198503152010121002`
- **Password:** `password`

### Mahasiswa
- **Username:** `433785520123200185`
- **Password:** `password`

## 📁 Struktur Project

```
sina-secure/
├── app/
│   ├── Http/Controllers/
│   │   └── DashboardController.php
│   └── Models/
│       ├── AcademicRecord.php
│       ├── Course.php
│       ├── Lecturer.php
│       └── Student.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── css/
│   │   └── app.css
│   ├── js/
│   │   ├── app.js
│   │   └── theme.js
│   └── views/
│       ├── dashboard.blade.php
│       ├── student_dashboard.blade.php
│       ├── transcript.blade.php
│       ├── lecturer_transcript.blade.php
│       └── welcome.blade.php
└── routes/
    └── web.php
```

## 🔧 Teknologi yang Digunakan

### Backend
- **Laravel 11** - PHP Framework
- **SQLite** - Database (default)
- **Eloquent ORM** - Database abstraction

### Frontend
- **Blade Templates** - Templating engine
- **Tailwind CSS** - Utility-first CSS framework
- **Vite** - Frontend build tool
- **Chart.js** - Data visualization
- **Anime.js** - Animation library

### Security
- **SHA-256 Hashing** - Data integrity
- **Laravel Authentication** - User authentication
- **CSRF Protection** - Cross-site request forgery protection

## 📊 Fitur Detail

### Integrity Hash System
Setiap record nilai akademik dilindungi dengan hash yang dihitung dari:
- NIM Mahasiswa
- Kode Mata Kuliah
- Semua komponen nilai (P1 CS, P1 PE, P2 CS, P2 PE, Final Grade)
- Grade Letter & Grade Point
- Timestamp

Formula:
```php
hash('sha256', $nim . $courseCode . $p1_cs . $p1_pe . $p2_cs . $p2_pe . 
     $finalGrade . $gradeLetter . $gradePoint . $timestamp)
```

### Grade Calculation
- **P1 (30%)**: CS (15%) + PE (15%)
- **P2 (30%)**: CS (15%) + PE (15%)
- **Final (40%)**

Grade Letter berdasarkan Final Grade:
- A: 85-100
- A-: 80-84.99
- B+: 75-79.99
- B: 70-74.99
- B-: 65-69.99
- C+: 60-64.99
- C: 55-59.99
- D: 50-54.99
- E: 0-49.99

## 🎨 Theme System

Aplikasi mendukung 3 mode tema:
- **Dark Mode** - Tema gelap (default)
- **Light Mode** - Tema terang
- **Auto Mode** - Mengikuti preferensi sistem

Pilihan tema tersimpan di localStorage dan konsisten di semua halaman.

## 🔒 Security Best Practices

1. ✅ File `.env` tidak di-commit ke repository
2. ✅ Database credentials di-encrypt
3. ✅ CSRF protection enabled
4. ✅ XSS protection via Blade escaping
5. ✅ SQL injection prevention via Eloquent ORM
6. ✅ Password hashing dengan bcrypt
7. ✅ Integrity hash untuk data akademik

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Developer

Developed with ❤️ by **WNNDesign21**

## 🤝 Contributing

Contributions, issues, and feature requests are welcome!

## 📧 Contact

For any inquiries, please contact through GitHub issues.

---

**⚠️ Disclaimer:** This is an academic project for educational purposes. Use at your own risk in production environments.
