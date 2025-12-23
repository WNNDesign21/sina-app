<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Lecturer;
use App\Models\Course;
use App\Models\ClassSchedule;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Superuser
        User::create([
            'username' => 'admin',
            'password' => Hash::make('password'),
            'role' => 'superuser',
        ]);

        // 2. Data from Image (Course Name => Lecturer Name)
        $data = [
            ['course' => 'Sistem Basis Data 2', 'lecturer' => 'Taufiq Hidayatullah', 'sks' => 3, 'day' => 'Senin', 'start' => '08:00', 'end' => '10:30'],
            ['course' => 'Komputasi Awan', 'lecturer' => 'Wahyudi', 'sks' => 3, 'day' => 'Senin', 'start' => '13:00', 'end' => '15:30'],
            ['course' => 'Testing Sistem dan Implementasi', 'lecturer' => 'Wawan Kusdiawan', 'sks' => 3, 'day' => 'Selasa', 'start' => '08:00', 'end' => '10:30'],
            ['course' => 'Organisasi Komputer', 'lecturer' => 'Willys', 'sks' => 2, 'day' => 'Selasa', 'start' => '13:00', 'end' => '14:40'],
            ['course' => 'Manajemen Proyek', 'lecturer' => 'Supriyadi', 'sks' => 3, 'day' => 'Rabu', 'start' => '08:00', 'end' => '10:30'],
            ['course' => 'Grafika Komputer', 'lecturer' => 'Ahmad Mubarok', 'sks' => 3, 'day' => 'Rabu', 'start' => '13:00', 'end' => '15:30'],
            ['course' => 'Sistem Pakar', 'lecturer' => 'Ayu Nur Indahsari', 'sks' => 3, 'day' => 'Kamis', 'start' => '08:00', 'end' => '10:30'],
            ['course' => 'Proyek Database dan Backend', 'lecturer' => 'Anwar Hilman', 'sks' => 4, 'day' => 'Jumat', 'start' => '08:00', 'end' => '11:20'],
        ];

        foreach ($data as $index => $item) {
            // Create User for Lecturer
            $username = strtolower(explode(' ', $item['lecturer'])[0]) . ($index + 1);
            $user = User::create([
                'username' => $username,
                'password' => Hash::make('password'),
                'role' => 'dosen',
            ]);

            // Create Lecturer Record
            $lecturer = Lecturer::create([
                'user_id' => $user->id,
                'name' => $item['lecturer'],
                'nidn' => '04' . rand(10000000, 99999999),
                'email' => $username . '@horizon.ac.id',
            ]);

            // Create Course Record
            $course = Course::create([
                'code' => 'MK-' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                'name' => $item['course'],
                'sks' => $item['sks'],
                'semester' => 5,
            ]);

            // Create Schedule
            ClassSchedule::create([
                'course_id' => $course->id,
                'lecturer_id' => $lecturer->id,
                'day' => $item['day'],
                'start_time' => $item['start'],
                'end_time' => $item['end'],
                'room' => 'Lab Komputer ' . (($index % 3) + 1),
                'academic_year' => '2024/2025',
            ]);
        }

        // 3. Create Students
        $students = [
            ['name' => 'Adhi Nur Fajar', 'nim' => '4337855201230084'],
            ['name' => 'Christopan Tangguh Santosa', 'nim' => '4337855201230078'],
            ['name' => 'Fajar Nur Farrijal', 'nim' => '4337855201230105'],
            ['name' => 'Salfa Alfarisyi', 'nim' => '4337855201230116'],
            ['name' => 'Wendi Nugraha Nurrahmansyah', 'nim' => '4337855201230085'],
        ];

        foreach ($students as $student) {
            Student::create($student);

            // Create User for Student
            User::create([
                'username' => $student['nim'],
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
            ]);
        }
    }
}
