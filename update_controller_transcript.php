<?php

// Update lecturer_transcript to add students and courses data

$file = __DIR__ . '/app/Http/Controllers/DashboardController.php';
$content = file_get_contents($file);

// Find and replace the return statement in lecturerTranscript method
$search = "return view('lecturer_transcript', compact('lecturer', 'studentRecords'));";
$replace = "// Get all students and courses for input modal\n        \$students = Student::all();\n        \$courses = Course::all();\n\n        return view('lecturer_transcript', compact('lecturer', 'studentRecords', 'students', 'courses'));";

$content = str_replace($search, $replace, $content);

file_put_contents($file, $content);

echo "✅ Controller updated successfully!\n";
echo "   - Added students and courses to lecturer transcript view\n";
