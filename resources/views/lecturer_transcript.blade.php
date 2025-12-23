<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Transcripts - SINA Secure</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
</head>

<body class="antialiased min-h-screen flex bg-[#030305] text-white overflow-hidden font-outfit selection:bg-indigo-500 selection:text-white">

    <!-- Background Glows -->
    <div class="fixed inset-0 z-[-1] pointer-events-none">
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-indigo-600/5 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-purple-600/5 rounded-full blur-[100px]"></div>
    </div>

    <!-- Sidebar -->
    <aside class="w-80 glass-card m-6 mr-0 flex flex-col hidden md:flex rounded-3xl relative z-10 border-r border-white/5">
        <div class="p-8 pb-4">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-600 to-purple-600 flex items-center justify-center shadow-lg shadow-indigo-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="font-bold text-2xl tracking-tight text-white">SINA</h1>
                    <div class="flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        <p class="text-[10px] text-emerald-400 font-bold tracking-widest uppercase">Lecturer</p>
                    </div>
                </div>
            </div>
            <div class="h-px w-full bg-gradient-to-r from-transparent via-white/10 to-transparent mb-6"></div>
        </div>

        <nav class="flex-1 px-6 space-y-2 flex flex-col">
            <a href="{{ route('dashboard') }}" class="group flex items-center gap-4 p-4 rounded-2xl text-gray-400 hover:bg-white/5 hover:text-white transition-all hover:translate-x-1">
                <div class="p-2 rounded-lg bg-white/5 text-gray-500 group-hover:bg-indigo-500/20 group-hover:text-indigo-400 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                </div>
                <span class="font-medium">Dashboard</span>
            </a>

            <a href="{{ route('dashboard') }}?openModal=true" class="group flex items-center gap-4 p-4 rounded-2xl text-gray-400 hover:bg-white/5 hover:text-white transition-all hover:translate-x-1">
                <div class="p-2 rounded-lg bg-white/5 text-gray-500 group-hover:bg-purple-500/20 group-hover:text-purple-400 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <span class="font-medium">Input Grades</span>
            </a>

            <a href="#" class="group flex items-center gap-4 p-4 rounded-2xl text-gray-400 hover:bg-white/5 hover:text-white transition-all hover:translate-x-1">
                <div class="p-2 rounded-lg bg-white/5 text-gray-500 group-hover:bg-emerald-500/20 group-hover:text-emerald-400 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <span class="font-medium">Audit Log</span>
            </a>

            <a href="{{ route('lecturer.transcript') }}" class="group flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/10 text-white shadow-[0_4px_20px_rgba(0,0,0,0.2)] transition-all hover:scale-[1.02] hover:bg-white/10 hover:border-purple-500/30">
                <div class="p-2 rounded-lg bg-purple-500/20 text-purple-400 group-hover:bg-purple-500 group-hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <span class="font-semibold tracking-wide">Student Transcripts</span>
            </a>

            <form action="{{ route('logout') }}" method="POST" class="mt-auto pt-4 border-t border-white/5">
                @csrf
                <button type="submit" class="w-full group flex items-center gap-4 p-4 rounded-2xl text-gray-400 hover:bg-red-500/10 hover:text-red-400 transition-all hover:translate-x-1">
                    <div class="p-2 rounded-lg bg-white/5 text-gray-500 group-hover:bg-red-500/20 group-hover:text-red-400 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                    </div>
                    <span class="font-medium">Sign Out</span>
                </button>
            </form>
        </nav>

        <div class="p-6">
            <div class="p-5 rounded-2xl bg-gradient-to-br from-purple-900/40 to-pink-900/40 border border-purple-500/20 relative overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                <div class="flex items-center justify-between mb-2">
                    <p class="text-xs text-purple-300 font-bold uppercase tracking-wider">Viewing</p>
                    <span class="flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-purple-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-purple-500"></span>
                    </span>
                </div>
                <p class="text-sm font-bold text-white">Student Records</p>
                <p class="text-[10px] text-gray-400 mt-1">{{ count($studentRecords) }} Students</p>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 h-screen overflow-y-auto relative scrollbar-hide">
        <!-- Header -->
        <header class="flex items-center justify-between mb-10 glass-card p-6 sticky top-0 z-20 rounded-2xl border-b border-white/5">
            <div>
                <h2 class="text-3xl font-bold text-white">Student Transcripts</h2>
                <p class="text-sm text-gray-400 mt-1">View detailed academic records of your students</p>
            </div>
            <div class="flex items-center gap-4">
                <!-- Theme Switcher -->
                <div class="flex items-center gap-2 p-2 rounded-xl glass-card">
                    <button onclick="switchTheme()" id="theme-btn" 
                        class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-white/10 transition-all group">
                        <svg id="theme-icon" class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                        <span id="theme-text" class="text-xs font-semibold text-gray-400 group-hover:text-white transition-colors">Dark</span>
                    </button>
                </div>
            </div>
        </header>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="glass-card p-6 rounded-2xl border border-white/5">
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-2">Total Students</p>
                <p class="text-3xl font-bold text-white">{{ count($studentRecords) }}</p>
            </div>
            <div class="glass-card p-6 rounded-2xl border border-white/5">
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-2">Total Records</p>
                <p class="text-3xl font-bold text-white">{{ array_sum(array_map(fn($s) => count($s['records']), $studentRecords)) }}</p>
            </div>
            <div class="glass-card p-6 rounded-2xl border border-white/5">
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-2">Lecturer</p>
                <p class="text-lg font-bold text-white">{{ $lecturer->name }}</p>
            </div>
        </div>

        <!-- Student List -->
        <div class="glass-card p-8 rounded-3xl border border-white/5">
            <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                <span class="w-2 h-2 rounded-full bg-indigo-500 animate-pulse"></span>
                Students Academic Records
            </h2>

            @if(count($studentRecords) > 0)
                <div class="space-y-4">
                    @foreach($studentRecords as $nim => $studentData)
                        <div class="glass-card rounded-2xl border border-white/5 overflow-hidden transition-all hover:border-indigo-500/30">
                            <!-- Student Header - Clickable -->
                            <button onclick="toggleStudent('{{ $nim }}')" 
                                class="w-full p-6 flex items-center justify-between hover:bg-white/5 transition-all text-left">
                                <div class="flex items-center gap-4 flex-1">
                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center text-lg font-bold">
                                        {{ substr($studentData['name'], 0, 2) }}
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-lg font-bold text-white">{{ $studentData['name'] }}</h3>
                                        <p class="text-sm text-gray-400">NIM: {{ $nim }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-6">
                                    <div class="text-right">
                                        <p class="text-xs text-gray-400 uppercase tracking-wider">Total SKS</p>
                                        <p class="text-2xl font-bold text-white">{{ $studentData['totalSks'] }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-xs text-gray-400 uppercase tracking-wider">IPS</p>
                                        <p class="text-2xl font-bold text-emerald-400">{{ $studentData['ips'] }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-xs text-gray-400 uppercase tracking-wider">Courses</p>
                                        <p class="text-2xl font-bold text-purple-400">{{ count($studentData['records']) }}</p>
                                    </div>
                                    <svg id="icon-{{ $nim }}" class="w-6 h-6 text-gray-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </button>

                            <!-- Student Details - Expandable -->
                            <div id="details-{{ $nim }}" class="hidden border-t border-white/5">
                                <div class="p-6 space-y-4">
                                    @foreach($studentData['records'] as $record)
                                        <div class="glass-card p-5 rounded-xl border border-white/5">
                                            <div class="flex items-start justify-between mb-4">
                                                <div class="flex-1">
                                                    <h4 class="text-lg font-bold text-white mb-1">{{ $record->course->name ?? 'Unknown Course' }}</h4>
                                                    <div class="flex items-center gap-4 text-sm text-gray-400">
                                                        <span>{{ $record->course->code ?? 'N/A' }}</span>
                                                        <span>{{ $record->course->sks ?? 0 }} SKS</span>
                                                        <span>{{ $record->created_at->format('d M Y') }}</span>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <div class="px-4 py-2 rounded-xl bg-gradient-to-br from-indigo-500/20 to-purple-500/20 border border-indigo-500/30">
                                                        <p class="text-xs text-gray-400 uppercase tracking-wider">Grade</p>
                                                        <p class="text-3xl font-bold text-white">{{ $record->grade_letter }}</p>
                                                    </div>
                                                    <p class="text-sm text-gray-400 mt-2">Point: <span class="font-bold text-white">{{ $record->grade_point }}</span></p>
                                                </div>
                                            </div>

                                            <!-- Grade Breakdown -->
                                            <div class="grid grid-cols-5 gap-3">
                                                <div class="p-3 rounded-lg bg-blue-500/10 border border-blue-500/20">
                                                    <p class="text-xs text-blue-400 uppercase tracking-wider mb-1">P1 CS</p>
                                                    <p class="text-xl font-bold text-white">{{ number_format($record->p1_cs, 2) }}</p>
                                                </div>
                                                <div class="p-3 rounded-lg bg-cyan-500/10 border border-cyan-500/20">
                                                    <p class="text-xs text-cyan-400 uppercase tracking-wider mb-1">P1 PE</p>
                                                    <p class="text-xl font-bold text-white">{{ number_format($record->p1_pe, 2) }}</p>
                                                </div>
                                                <div class="p-3 rounded-lg bg-purple-500/10 border border-purple-500/20">
                                                    <p class="text-xs text-purple-400 uppercase tracking-wider mb-1">P2 CS</p>
                                                    <p class="text-xl font-bold text-white">{{ number_format($record->p2_cs, 2) }}</p>
                                                </div>
                                                <div class="p-3 rounded-lg bg-pink-500/10 border border-pink-500/20">
                                                    <p class="text-xs text-pink-400 uppercase tracking-wider mb-1">P2 PE</p>
                                                    <p class="text-xl font-bold text-white">{{ number_format($record->p2_pe, 2) }}</p>
                                                </div>
                                                <div class="p-3 rounded-lg bg-emerald-500/10 border border-emerald-500/20">
                                                    <p class="text-xs text-emerald-400 uppercase tracking-wider mb-1">Final</p>
                                                    <p class="text-xl font-bold text-white">{{ number_format($record->final_grade, 2) }}</p>
                                                </div>
                                            </div>

                                            <!-- Integrity Hash -->
                                            <div class="mt-4 pt-4 border-t border-white/5 flex items-center gap-2 text-xs text-gray-500">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                                </svg>
                                                <span class="font-mono">{{ $record->integrity_hash }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <p class="text-gray-500 text-lg">No student records found.</p>
                </div>
            @endif
        </div>
    </main>

    <script>
        // Toggle student details
        function toggleStudent(nim) {
            const details = document.getElementById('details-' + nim);
            const icon = document.getElementById('icon-' + nim);
            
            if (details.classList.contains('hidden')) {
                details.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
                
                // Animate expansion
                anime({
                    targets: '#details-' + nim,
                    opacity: [0, 1],
                    translateY: [-10, 0],
                    duration: 300,
                    easing: 'easeOutQuad'
                });
            } else {
                details.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
            }
        }

        // Staggered entrance animation
        anime({
            targets: '.glass-card',
            translateY: [20, 0],
            opacity: [0, 1],
            delay: anime.stagger(80),
            easing: 'easeOutExpo',
            duration: 1000
        });

        // Theme Switcher Function
        function switchTheme() {
            const theme = window.themeManager.cycleTheme();
            updateThemeUI(theme);
        }

        function updateThemeUI(theme) {
            const icon = document.getElementById('theme-icon');
            const text = document.getElementById('theme-text');
            
            if (!icon || !text) return;
            
            const icons = {
                dark: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>',
                light: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>',
                auto: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>'
            };
            
            const labels = {
                dark: 'Dark',
                light: 'Light',
                auto: 'Auto'
            };
            
            icon.innerHTML = icons[theme];
            text.textContent = labels[theme];
        }

        // Initialize theme UI on load
        document.addEventListener('DOMContentLoaded', () => {
            if (window.themeManager) {
                const currentTheme = window.themeManager.getCurrentTheme();
                updateThemeUI(currentTheme);
            }
        });

        // Listen for theme changes
        window.addEventListener('themechange', (e) => {
            updateThemeUI(e.detail.theme);
        });
    </script>
</body>

</html>