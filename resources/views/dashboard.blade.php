<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - SINA Secure</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body
    class="antialiased min-h-screen flex bg-[#030305] text-white overflow-hidden font-outfit selection:bg-indigo-500 selection:text-white">

    <!-- Background Glows -->
    <div class="fixed inset-0 z-[-1] pointer-events-none">
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-indigo-600/5 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-purple-600/5 rounded-full blur-[100px]"></div>
    </div>

    <!-- Sidebar -->
    <aside
        class="w-80 glass-card m-6 mr-0 flex flex-col hidden md:flex rounded-3xl relative z-10 border-r border-white/5">
        <div class="p-8 pb-4">
            <div class="flex items-center gap-4 mb-8">
                <div
                    class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-600 to-purple-600 flex items-center justify-center shadow-lg shadow-indigo-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h1 class="font-bold text-2xl tracking-tight text-white">SINA</h1>
                    <div class="flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        <p class="text-[10px] text-emerald-400 font-bold tracking-widest uppercase">Secure</p>
                    </div>
                </div>
            </div>

            <div class="h-px w-full bg-gradient-to-r from-transparent via-white/10 to-transparent mb-6"></div>
        </div>

        <nav class="flex-1 px-6 space-y-2 flex flex-col">
            <a href="#"
                class="group flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/10 text-white shadow-[0_4px_20px_rgba(0,0,0,0.2)] transition-all hover:scale-[1.02] hover:bg-white/10 hover:border-indigo-500/30">
                <div
                    class="p-2 rounded-lg bg-indigo-500/20 text-indigo-400 group-hover:bg-indigo-500 group-hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                </div>
                <span class="font-semibold tracking-wide">Dashboard</span>
            </a>

            <a href="#" onclick="openInputModal()"
                class="group flex items-center gap-4 p-4 rounded-2xl text-gray-400 hover:bg-white/5 hover:text-white transition-all hover:translate-x-1">
                <div
                    class="p-2 rounded-lg bg-white/5 text-gray-500 group-hover:bg-purple-500/20 group-hover:text-purple-400 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <span class="font-medium">Input Grades</span>
            </a>

            <a href="#"
                class="group flex items-center gap-4 p-4 rounded-2xl text-gray-400 hover:bg-white/5 hover:text-white transition-all hover:translate-x-1">
                <div
                    class="p-2 rounded-lg bg-white/5 text-gray-500 group-hover:bg-emerald-500/20 group-hover:text-emerald-400 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <span class="font-medium">Audit Log</span>
            </a>

            <a href="{{ route('lecturer.transcript') }}"
                class="group flex items-center gap-4 p-4 rounded-2xl text-gray-400 hover:bg-white/5 hover:text-white transition-all hover:translate-x-1">
                <div
                    class="p-2 rounded-lg bg-white/5 text-gray-500 group-hover:bg-purple-500/20 group-hover:text-purple-400 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <span class="font-medium">Student Transcripts</span>
            </a>

            <form action="{{ route('logout') }}" method="POST" class="mt-auto pt-4 border-t border-white/5">
                @csrf
                <button type="submit"
                    class="w-full group flex items-center gap-4 p-4 rounded-2xl text-gray-400 hover:bg-red-500/10 hover:text-red-400 transition-all hover:translate-x-1">
                    <div
                        class="p-2 rounded-lg bg-white/5 text-gray-500 group-hover:bg-red-500/20 group-hover:text-red-400 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                    </div>
                    <span class="font-medium">Sign Out</span>
                </button>
            </form>
        </nav>

        <div class="p-6">
            <div
                class="p-5 rounded-2xl bg-gradient-to-br from-indigo-900/40 to-purple-900/40 border border-indigo-500/20 relative overflow-hidden group">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000">
                </div>
                <div class="flex items-center justify-between mb-2">
                    <p class="text-xs text-indigo-300 font-bold uppercase tracking-wider">System Health</p>
                    <span class="flex h-2 w-2">
                        <span
                            class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                </div>
                <div class="w-full bg-black/40 rounded-full h-1.5 mb-2">
                    <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-1.5 rounded-full" style="width: 98%">
                    </div>
                </div>
                <p class="text-[10px] text-gray-400">All services operational</p>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 h-screen overflow-y-auto relative scrollbar-hide">
        @if(session('error'))
            <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-medium">{{ session('error') }}</span>
            </div>
        @endif

        @if(session('success'))
            <div
                class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Header -->
        <header
            class="flex items-center justify-between mb-10 glass-card p-5 sticky top-0 z-20 rounded-2xl border-b border-white/5">
            <div>
                <h2 class="text-2xl font-bold text-white">Overview</h2>
                <p class="text-sm text-gray-400 mt-1">Real-time academic data monitoring</p>
            </div>
            <div class="flex items-center gap-6">
                <!-- Theme Switcher -->
                <div class="flex items-center gap-2 p-2 rounded-xl glass-card">
                    <button onclick="switchTheme()" id="theme-btn"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-white/10 transition-all group">
                        <svg id="theme-icon" class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                            </path>
                        </svg>
                        <span id="theme-text"
                            class="text-xs font-semibold text-gray-400 group-hover:text-white transition-colors">Dark</span>
                    </button>
                </div>

                <div class="relative cursor-pointer group p-2 rounded-xl hover:bg-white/5 transition-colors">
                    <svg class="w-6 h-6 text-gray-400 group-hover:text-white transition-colors" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                        </path>
                    </svg>
                    <span
                        class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border border-[#050505] animate-pulse"></span>
                </div>
                <div class="flex items-center gap-3 pl-6 border-l border-white/10">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-white">{{ $lecturerName }}</p>
                        <p class="text-xs text-indigo-400">{{ $userRole }}</p>
                    </div>
                    <div
                        class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-500 border border-white/20 shadow-[0_0_15px_rgba(99,102,241,0.5)] flex items-center justify-center text-sm font-bold">
                        {{ strtoupper(substr($lecturerName, 0, 2)) }}
                    </div>
                </div>
            </div>
        </header>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Stat Card 1 -->
            <div
                class="glass-card p-6 rounded-3xl relative overflow-hidden group hover:border-indigo-500/50 transition-all duration-500 hover:-translate-y-1">
                <div
                    class="absolute right-0 top-0 w-32 h-32 bg-indigo-500/10 rounded-bl-full blur-2xl group-hover:bg-indigo-500/20 transition-colors">
                </div>
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="p-3 rounded-xl bg-indigo-500/10 text-indigo-400 group-hover:bg-indigo-500 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-400 font-semibold uppercase tracking-wider">Total Students</p>
                </div>
                <h3 class="text-4xl font-bold text-white group-hover:text-indigo-400 transition-colors counter"
                    data-target="{{ $totalStudents }}">0</h3>
                <div class="mt-4 flex items-center gap-2 text-xs text-emerald-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    <span>+12% from last semester</span>
                </div>
            </div>

            <!-- Stat Card 2 -->
            <div
                class="glass-card p-6 rounded-3xl relative overflow-hidden group hover:border-purple-500/50 transition-all duration-500 hover:-translate-y-1">
                <div
                    class="absolute right-0 top-0 w-32 h-32 bg-purple-500/10 rounded-bl-full blur-2xl group-hover:bg-purple-500/20 transition-colors">
                </div>
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="p-3 rounded-xl bg-purple-500/10 text-purple-400 group-hover:bg-purple-500 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-400 font-semibold uppercase tracking-wider">Average Grade</p>
                </div>
                <h3 class="text-4xl font-bold text-white group-hover:text-purple-400 transition-colors counter"
                    data-target="{{ number_format($averageGrade, 2) }}">0</h3>
                <div class="mt-4 flex items-center gap-2 text-xs text-emerald-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    <span>Above target (3.00)</span>
                </div>
            </div>

            <!-- Stat Card 3 -->
            <div
                class="glass-card p-6 rounded-3xl relative overflow-hidden group hover:border-emerald-500/50 transition-all duration-500 hover:-translate-y-1">
                <div
                    class="absolute right-0 top-0 w-32 h-32 bg-emerald-500/10 rounded-bl-full blur-2xl group-hover:bg-emerald-500/20 transition-colors">
                </div>
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="p-3 rounded-xl bg-emerald-500/10 text-emerald-400 group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-400 font-semibold uppercase tracking-wider">Integrity Score</p>
                </div>
                <h3 class="text-4xl font-bold text-white group-hover:text-emerald-400 transition-colors">100%</h3>
                <div class="mt-4 flex items-center gap-2 text-xs text-emerald-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>No tampering detected</span>
                </div>
            </div>
        </div>

        <!-- Charts & Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 pb-8">
            <!-- Main Chart -->
            <div class="glass-card p-8 lg:col-span-2 rounded-3xl border border-white/5">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-xl font-bold text-white">Grade Distribution</h3>
                        <p class="text-sm text-gray-400">Statistical analysis of student performance</p>
                    </div>
                    <div class="flex gap-2">
                        <button
                            class="px-4 py-2 rounded-xl bg-white/5 text-xs font-medium text-gray-400 hover:bg-white/10 hover:text-white transition-colors">Weekly</button>
                        <button
                            class="px-4 py-2 rounded-xl bg-indigo-600 text-xs font-medium text-white shadow-lg shadow-indigo-500/30">Semester</button>
                    </div>
                </div>
                <div class="h-[350px] w-full relative">
                    <canvas id="gradeChart"></canvas>
                </div>
            </div>

            <!-- Recent Logs -->
            <div class="glass-card p-8 rounded-3xl border border-white/5 flex flex-col">
                <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Live Integrity Logs
                </h3>
                <div class="space-y-4 overflow-y-auto flex-1 pr-2 custom-scrollbar" style="max-height: 350px;">
                    @foreach($records as $record)
                        <div
                            class="p-4 rounded-2xl bg-white/5 border border-white/5 hover:bg-white/10 hover:border-indigo-500/30 transition-all cursor-pointer group">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-gradient-to-br from-gray-700 to-gray-800 flex items-center justify-center text-xs font-bold border border-white/10">
                                        {{ substr($record->student_name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p
                                            class="text-sm font-bold text-white group-hover:text-indigo-400 transition-colors">
                                            {{ $record->student_name }}
                                        </p>
                                        <p class="text-[10px] text-gray-500">{{ $record->student_nim }}</p>
                                    </div>
                                </div>
                                <span
                                    class="px-2 py-1 rounded-lg bg-indigo-500/10 text-indigo-400 text-xs font-bold border border-indigo-500/20">{{ $record->grade_letter }}</span>
                            </div>
                            <div class="flex items-center gap-2 mt-3 pt-3 border-t border-white/5">
                                <svg class="w-3 h-3 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-[10px] text-gray-500 font-mono truncate">HASH:
                                    {{ substr($record->integrity_hash, 0, 16) }}...
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

    <!-- Input Modal -->
    <div id="input-modal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-[#030305]/90 backdrop-blur-md transition-opacity" onclick="closeInputModal()">
        </div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-2xl p-4">
            <div
                class="glass-card p-8 rounded-3xl border border-indigo-500/30 shadow-[0_0_100px_rgba(99,102,241,0.2)] relative overflow-hidden">
                <!-- Decorative Background -->
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none">
                </div>

                <div class="flex justify-between items-center mb-8 relative">
                    <div>
                        <h3 class="text-2xl font-bold text-white">Input New Grade</h3>
                        <p class="text-sm text-gray-400">Secure entry for academic records</p>
                    </div>
                    <button onclick="closeInputModal()"
                        class="p-2 rounded-xl hover:bg-white/10 text-gray-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form id="gradeForm" class="space-y-6 relative">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div class="col-span-2 space-y-2">
                            <label class="text-xs font-semibold text-gray-400 uppercase tracking-wider ml-1">Select
                                Course</label>
                            <select name="course_id"
                                class="input-premium w-full rounded-xl px-4 py-3 text-white focus:ring-0 appearance-none bg-[#1a1a20]"
                                required>
                                <option value="" disabled selected>Choose a subject...</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }} ({{ $course->code }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-2 space-y-2 relative" id="student-search-container">
                            <label class="text-xs font-semibold text-gray-400 uppercase tracking-wider ml-1">Search
                                Student</label>
                            <input type="text" id="student-search"
                                class="input-premium w-full rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:ring-0"
                                placeholder="Type Name or NIM..." autocomplete="off">
                            <input type="hidden" name="student_id" id="student_id" required>

                            <!-- Dropdown Results -->
                            <div id="student-results"
                                class="absolute left-0 right-0 top-full mt-2 bg-[#1a1a20] border border-white/10 rounded-xl shadow-2xl z-50 hidden max-h-60 overflow-y-auto custom-scrollbar">
                                @foreach($students as $student)
                                    <div class="student-option p-3 hover:bg-indigo-500/20 cursor-pointer transition-colors border-b border-white/5 last:border-0"
                                        data-id="{{ $student->id }}" data-name="{{ $student->name }}"
                                        data-nim="{{ $student->nim }}">
                                        <p class="text-sm font-bold text-white">{{ $student->name }}</p>
                                        <p class="text-xs text-gray-400">{{ $student->nim }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="p-6 rounded-2xl bg-white/5 border border-white/5 space-y-4">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="text-sm font-bold text-white">Grade Components</span>
                        </div>
                        <div class="mb-4">
                            <p class="text-xs text-indigo-400/80 italic">* Input values using 0-100 scale (e.g., 85.50,
                                90)</p>
                        </div>
                        <div class="grid grid-cols-4 gap-4">
                            <div class="col-span-2 md:col-span-1 space-y-1">
                                <label class="text-[10px] font-medium text-gray-400 uppercase">P1 CS (60%)</label>
                                <input type="number" step="0.01" name="p1_cs"
                                    class="input-premium w-full rounded-lg px-3 py-2 text-white text-sm focus:ring-0"
                                    placeholder="0-100" required>
                            </div>
                            <div class="col-span-2 md:col-span-1 space-y-1">
                                <label class="text-[10px] font-medium text-gray-400 uppercase">P1 PE (40%)</label>
                                <input type="number" step="0.01" name="p1_pe"
                                    class="input-premium w-full rounded-lg px-3 py-2 text-white text-sm focus:ring-0"
                                    placeholder="0-100" required>
                            </div>
                            <div class="col-span-2 md:col-span-1 space-y-1">
                                <label class="text-[10px] font-medium text-gray-400 uppercase">P2 CS (60%)</label>
                                <input type="number" step="0.01" name="p2_cs"
                                    class="input-premium w-full rounded-lg px-3 py-2 text-white text-sm focus:ring-0"
                                    placeholder="0-100" required>
                            </div>
                            <div class="col-span-2 md:col-span-1 space-y-1">
                                <label class="text-[10px] font-medium text-gray-400 uppercase">P2 PE (40%)</label>
                                <input type="number" step="0.01" name="p2_pe"
                                    class="input-premium w-full rounded-lg px-3 py-2 text-white text-sm focus:ring-0"
                                    placeholder="0-100" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-bold py-4 rounded-xl shadow-[0_0_20px_rgba(99,102,241,0.4)] hover:shadow-[0_0_30px_rgba(99,102,241,0.6)] transform hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2 group">
                        <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        CALCULATE & SECURE SAVE
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Staggered Entrance Animation
        anime({
            targets: '.glass-card',
            translateY: [20, 0],
            opacity: [0, 1],
            delay: anime.stagger(100),
            easing: 'easeOutExpo',
            duration: 1200
        });

        // Counter Animation
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            const target = parseFloat(counter.getAttribute('data-target'));
            anime({
                targets: counter,
                innerHTML: [0, target],
                round: target % 1 === 0 ? 1 : 100,
                easing: 'easeOutExpo',
                duration: 2500
            });
        });

        // Chart Configuration - Enhanced Colorful Version
        const ctx = document.getElementById('gradeChart').getContext('2d');
        const chartData = @json($chartData);

        // Create multiple gradients for each bar
        const createGradient = (ctx, color1, color2) => {
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, color1);
            gradient.addColorStop(1, color2);
            return gradient;
        };

        // Vibrant color palette
        const colors = [
            { start: 'rgba(139, 92, 246, 0.9)', end: 'rgba(139, 92, 246, 0.3)' },  // Purple
            { start: 'rgba(99, 102, 241, 0.9)', end: 'rgba(99, 102, 241, 0.3)' },  // Indigo
            { start: 'rgba(59, 130, 246, 0.9)', end: 'rgba(59, 130, 246, 0.3)' },  // Blue
            { start: 'rgba(14, 165, 233, 0.9)', end: 'rgba(14, 165, 233, 0.3)' },  // Sky
            { start: 'rgba(6, 182, 212, 0.9)', end: 'rgba(6, 182, 212, 0.3)' },    // Cyan
            { start: 'rgba(20, 184, 166, 0.9)', end: 'rgba(20, 184, 166, 0.3)' },  // Teal
            { start: 'rgba(34, 197, 94, 0.9)', end: 'rgba(34, 197, 94, 0.3)' },    // Green
            { start: 'rgba(234, 179, 8, 0.9)', end: 'rgba(234, 179, 8, 0.3)' }     // Yellow
        ];

        const backgroundColors = Object.keys(chartData).map((_, index) =>
            createGradient(ctx, colors[index].start, colors[index].end)
        );

        const borderColors = [
            '#8b5cf6', '#6366f1', '#3b82f6', '#0ea5e9',
            '#06b6d4', '#14b8a6', '#22c55e', '#eab308'
        ];

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(chartData),
                datasets: [{
                    label: 'Students',
                    data: Object.values(chartData),
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 2,
                    borderRadius: 12,
                    borderSkipped: false,
                    barThickness: 35,
                    hoverBackgroundColor: borderColors,
                    hoverBorderWidth: 3,
                    hoverBorderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: 'rgba(15, 15, 20, 0.95)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        titleFont: { family: 'Outfit', size: 14, weight: 'bold' },
                        bodyFont: { family: 'Outfit', size: 13 },
                        borderColor: 'rgba(255, 255, 255, 0.2)',
                        borderWidth: 1,
                        padding: 16,
                        displayColors: true,
                        cornerRadius: 12,
                        callbacks: {
                            label: function (context) {
                                return context.parsed.y + ' Students';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.05)',
                            drawBorder: false,
                            lineWidth: 1
                        },
                        ticks: {
                            color: '#94a3b8',
                            font: { family: 'Outfit', size: 11, weight: '500' },
                            padding: 10
                        },
                        border: { display: false }
                    },
                    x: {
                        grid: { display: false },
                        ticks: {
                            color: '#cbd5e1',
                            font: { family: 'Outfit', size: 12, weight: '600' },
                            padding: 10
                        },
                        border: { display: false }
                    }
                },
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart',
                    onProgress: function (animation) {
                        // Animate bars with bounce effect
                        const chartInstance = animation.chart;
                        const ctx = chartInstance.ctx;
                        ctx.shadowBlur = 20;
                        ctx.shadowColor = 'rgba(99, 102, 241, 0.5)';
                    },
                    onComplete: function () {
                        // Add glow effect on complete
                        this.ctx.shadowBlur = 0;
                    }
                },
                interaction: {
                    mode: 'index',
                    intersect: false
                }
            },
            plugins: [{
                afterDraw: (chart) => {
                    // Add subtle glow effect to bars
                    const ctx = chart.ctx;
                    chart.data.datasets.forEach((dataset, i) => {
                        const meta = chart.getDatasetMeta(i);
                        meta.data.forEach((bar, index) => {
                            ctx.save();
                            ctx.shadowBlur = 15;
                            ctx.shadowColor = borderColors[index] + '80';
                            ctx.restore();
                        });
                    });
                }
            }]
        });

        // Student Search Logic
        document.getElementById('gradeForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const form = this;
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnContent = submitBtn.innerHTML;

            // Loading State
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 text-white mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';

            try {
                const formData = new FormData(form);
                const response = await fetch('{{ route("grade.store") }}', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: formData
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Something went wrong');
                }

                // Success - Show popup and reload
                await Swal.fire({
                    title: 'Success!',
                    text: data.message,
                    icon: 'success',
                    background: '#1a1a20',
                    color: '#fff',
                    confirmButtonColor: '#6366f1',
                    confirmButtonText: 'OK'
                });

                window.location.reload();

            } catch (error) {
                // Error (Duplicate or Validation) - Show popup but stay on page
                Swal.fire({
                    title: 'Attention!',
                    text: error.message,
                    icon: 'warning',
                    background: '#1a1a20',
                    color: '#fff',
                    confirmButtonColor: '#6366f1',
                    confirmButtonText: 'OK'
                });

                // Reset button
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnContent;
            }
        });

        // Student Search Logic
        const searchInput = document.getElementById('student-search');
        const resultsContainer = document.getElementById('student-results');
        const studentOptions = document.querySelectorAll('.student-option');
        const hiddenInput = document.getElementById('student_id');

        searchInput.addEventListener('input', function (e) {
            const value = e.target.value.toLowerCase();
            let hasResults = false;

            if (value.length > 0) {
                resultsContainer.classList.remove('hidden');
                studentOptions.forEach(option => {
                    const name = option.getAttribute('data-name').toLowerCase();
                    const nim = option.getAttribute('data-nim');

                    if (name.includes(value) || nim.includes(value)) {
                        option.classList.remove('hidden');
                        hasResults = true;
                    } else {
                        option.classList.add('hidden');
                    }
                });
            } else {
                resultsContainer.classList.add('hidden');
            }
        });

        studentOptions.forEach(option => {
            option.addEventListener('click', function () {
                const name = this.getAttribute('data-name');
                const nim = this.getAttribute('data-nim');
                const id = this.getAttribute('data-id');

                searchInput.value = `${name} (${nim})`;
                hiddenInput.value = id;
                resultsContainer.classList.add('hidden');
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function (e) {
            if (!document.getElementById('student-search-container').contains(e.target)) {
                resultsContainer.classList.add('hidden');
            }
        });

        // Function to reset form
        function resetGradeForm() {
            const form = document.getElementById('gradeForm');
            if (form) {
                form.reset();
                const studentIdInput = document.getElementById('student_id');
                if (studentIdInput) studentIdInput.value = '';
                const searchInput = document.getElementById('student-search');
                if (searchInput) searchInput.value = '';
                const resultsContainer = document.getElementById('student-results');
                if (resultsContainer) resultsContainer.classList.add('hidden');
            }
        }

        // Function to close modal and reset form
        function closeInputModal() {
            const modal = document.getElementById('input-modal');
            if (modal) {
                modal.classList.add('hidden');
                resetGradeForm();
            }
        }

        // Function to open modal
        function openInputModal() {
            const modal = document.getElementById('input-modal');
            if (modal) {
                modal.classList.remove('hidden');
            }
        }

        // Auto-open modal if URL has openModal parameter
        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('openModal') === 'true') {
                openInputModal();
                // Remove parameter from URL without reload
                const newUrl = window.location.pathname;
                window.history.replaceState({}, document.title, newUrl);
            }
        });
    </script>
    <script>
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