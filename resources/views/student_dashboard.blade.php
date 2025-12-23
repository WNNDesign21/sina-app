<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Dashboard - SINA Secure</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
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
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                </div>
                <div>
                    <h1 class="font-bold text-2xl tracking-tight text-white">SINA</h1>
                    <div class="flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        <p class="text-[10px] text-emerald-400 font-bold tracking-widest uppercase">Student</p>
                    </div>
                </div>
            </div>

            <div class="h-px w-full bg-gradient-to-r from-transparent via-white/10 to-transparent mb-6"></div>
        </div>

        <nav class="flex-1 px-6 space-y-2 flex flex-col">
            <a href="{{ route('dashboard') }}"
                class="group flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/10 text-white shadow-[0_4px_20px_rgba(0,0,0,0.2)] transition-all hover:scale-[1.02] hover:bg-white/10 hover:border-indigo-500/30">
                <div
                    class="p-2 rounded-lg bg-indigo-500/20 text-indigo-400 group-hover:bg-indigo-500 group-hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                </div>
                <span class="font-semibold tracking-wide">My Dashboard</span>
            </a>

            <a href="{{ route('transcript') }}"
                class="group flex items-center gap-4 p-4 rounded-2xl text-gray-400 hover:bg-white/5 hover:text-white transition-all hover:translate-x-1">
                <div
                    class="p-2 rounded-lg bg-white/5 text-gray-500 group-hover:bg-purple-500/20 group-hover:text-purple-400 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <span class="font-medium">Transcript</span>
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
                    <p class="text-xs text-indigo-300 font-bold uppercase tracking-wider">Academic Status</p>
                    <span class="flex h-2 w-2">
                        <span
                            class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                </div>
                <div class="w-full bg-black/40 rounded-full h-1.5 mb-2">
                    <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-1.5 rounded-full" style="width: 100%">
                    </div>
                </div>
                <p class="text-[10px] text-gray-400">Active - Semester 5</p>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 h-screen overflow-y-auto relative scrollbar-hide">
        <!-- Header -->
        <header
            class="flex items-center justify-between mb-10 glass-card p-5 sticky top-0 z-20 rounded-2xl border-b border-white/5">
            <div>
                <h2 class="text-2xl font-bold text-white">My Performance</h2>
                <p class="text-sm text-gray-400 mt-1">Personal academic overview</p>
            </div>
            <div class="flex items-center gap-6">
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
                
                <div class="flex items-center gap-3 pl-6 border-l border-white/10">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-white">{{ $student->name ?? Auth::user()->username }}</p>
                        <p class="text-xs text-indigo-400">{{ $student->nim ?? 'Student' }}</p>
                    </div>
                    <div
                        class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-500 border border-white/20 shadow-[0_0_15px_rgba(99,102,241,0.5)] flex items-center justify-center text-sm font-bold">
                        {{ substr($student->name ?? 'ST', 0, 2) }}
                    </div>
                </div>
            </div>
        </header>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Stat Card 1: IPS -->
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
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-400 font-semibold uppercase tracking-wider">Current IPS</p>
                </div>
                <h3 class="text-4xl font-bold text-white group-hover:text-indigo-400 transition-colors counter"
                    data-target="{{ $ips }}">0.00</h3>
                <div class="mt-4 flex items-center gap-2 text-xs text-emerald-400">
                    <span>Target: 4.00</span>
                </div>
            </div>

            <!-- Stat Card 2: SKS -->
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
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-400 font-semibold uppercase tracking-wider">Total SKS</p>
                </div>
                <h3 class="text-4xl font-bold text-white group-hover:text-purple-400 transition-colors counter"
                    data-target="{{ $totalSks }}">0</h3>
                <div class="mt-4 flex items-center gap-2 text-xs text-emerald-400">
                    <span>Progress to Graduation</span>
                </div>
            </div>

            <!-- Stat Card 3: Rank/Status -->
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
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-400 font-semibold uppercase tracking-wider">Status</p>
                </div>
                <h3 class="text-4xl font-bold text-white group-hover:text-emerald-400 transition-colors">
                    {{ $ips >= 3.5 ? 'Excellent' : ($ips >= 3.0 ? 'Good' : 'Satisfactory') }}
                </h3>
                <div class="mt-4 flex items-center gap-2 text-xs text-emerald-400">
                    <span>Based on current performance</span>
                </div>
            </div>
        </div>

        <!-- Charts & Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 pb-8">
            <!-- Main Chart -->
            <div class="glass-card p-8 lg:col-span-1 rounded-3xl border border-white/5">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-xl font-bold text-white">Course Distribution</h3>
                        <p class="text-sm text-gray-400">Your enrolled courses</p>
                    </div>
                </div>
                
                <!-- Flex container: Chart + Legend -->
                <div class="flex items-center gap-6">
                    <!-- Donut Chart -->
                    <div class="flex-shrink-0" style="width: 180px; height: 180px;">
                        <canvas id="gradeChart"></canvas>
                    </div>
                    
                    <!-- Course List -->
                    <div class="flex-1 space-y-3 max-h-[180px] overflow-y-auto scrollbar-thin scrollbar-thumb-white/10 scrollbar-track-transparent pr-2">
                        @php
                            $colors = ['#FF6B6B', '#4ECDC4', '#FFE66D', '#95E1D3', '#F38181', '#AA96DA', '#FCBAD3', '#A8E6CF'];
                            $index = 0;
                            $totalSksChart = array_sum($chartData);
                        @endphp
                        @foreach($chartData as $courseName => $sks)
                            @php
                                $color = $colors[$index % count($colors)];
                                $percentage = $totalSksChart > 0 ? round(($sks / $totalSksChart) * 100, 1) : 0;
                                $index++;
                            @endphp
                            <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-white/5 transition-colors group cursor-pointer">
                                <div class="w-3 h-3 rounded-full flex-shrink-0" style="background-color: {{ $color }}"></div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-white truncate">{{ $courseName }}</p>
                                    <p class="text-xs text-gray-400">{{ $sks }} SKS • {{ $percentage }}%</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Recent Logs -->
            <div class="glass-card p-8 lg:col-span-2 rounded-3xl border border-white/5 flex flex-col">
                <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Academic History
                </h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-xs text-gray-400 uppercase border-b border-white/10">
                                <th class="py-3 px-4">Course</th>
                                <th class="py-3 px-4">SKS</th>
                                <th class="py-3 px-4">Grade</th>
                                <th class="py-3 px-4">Point</th>
                                <th class="py-3 px-4">Integrity Hash</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-300">
                            @forelse($records as $record)
                                <tr class="border-b border-white/5 hover:bg-white/5 transition-colors">
                                    <td class="py-3 px-4 font-medium text-white">
                                        {{ $record->course->name ?? 'Unknown Course' }}</td>
                                    <td class="py-3 px-4">{{ $record->course->sks ?? '-' }}</td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="px-2 py-1 rounded-lg bg-indigo-500/10 text-indigo-400 text-xs font-bold border border-indigo-500/20">
                                            {{ $record->grade_letter }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">{{ $record->grade_point }}</td>
                                    <td class="py-3 px-4 font-mono text-xs text-gray-500">
                                        {{ substr($record->integrity_hash, 0, 10) }}...</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-8 text-center text-gray-500">No academic records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

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

        // Chart Configuration - Enhanced Colorful Donut per Course
        const ctx = document.getElementById('gradeChart').getContext('2d');
        const chartData = @json($chartData);

        // Vibrant color palette for courses
        const courseColors = [
            '#FF6B6B',  // Purple
            '#4ECDC4',  // Blue
            '#FFE66D',  // Sky
            '#95E1D3',    // Cyan
            '#F38181',  // Teal
            '#AA96DA',    // Green
            '#FCBAD3',    // Yellow
            '#A8E6CF'   // Orange
        ];

        const labels = Object.keys(chartData);
        const values = Object.values(chartData);
        const backgroundColors = labels.map((_, i) => courseColors[i % courseColors.length]);
        const borderColors = labels.map((_, i) => courseColors[i % courseColors.length]);

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: backgroundColors,
                    borderColor: 'transparent',
                    borderWidth: 0,
                    hoverBorderWidth: 0,
                    hoverBorderColor: 'transparent',
                    hoverOffset: 20,
                    spacing: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '75%',
                layout: {
                    padding: 10
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: false,
                        backgroundColor: 'rgba(15, 15, 20, 0.95)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        titleFont: { family: 'Outfit', size: 14, weight: 'bold' },
                        bodyFont: { family: 'Outfit', size: 13 },
                        borderColor: 'rgba(255, 255, 255, 0.2)',
                        borderWidth: 1,
                        padding: 16,
                        cornerRadius: 12,
                        displayColors: true,
                        callbacks: {
                            label: function (context) {
                                const label = context.label || '';
                                const value = context.parsed || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                                return `${label}: ${value} SKS (${percentage}%)`;
                            }
                        }
                    }
                },
                animation: {
                    animateRotate: true,
                    animateScale: true,
                    duration: 2500,
                    easing: 'easeInOutQuart',
                    onProgress: function (animation) {
                        const chartInstance = animation.chart;
                        const ctx = chartInstance.ctx;
                        ctx.shadowBlur = 0;
                        ctx.shadowColor = 'transparent';
                    },
                    onComplete: function () {
                        this.ctx.shadowBlur = 0;
                    }
                },
                interaction: {
                    mode: 'nearest',
                    intersect: true
                }
            },
            plugins: [{
                id: 'customLabels',
                afterDraw: (chart) => {
                    const ctx = chart.ctx;
                    const chartArea = chart.chartArea;
                    const centerX = (chartArea.left + chartArea.right) / 2;
                    const centerY = (chartArea.top + chartArea.bottom) / 2;

                    // Draw center IPS text with glow
                    ctx.save();
                    ctx.shadowBlur = 0;
                    ctx.shadowColor = 'transparent';
                    ctx.font = 'bold 28px Outfit';
                    ctx.fillStyle = '#fff';
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';
                    ctx.fillText('{{ $ips }}', centerX, centerY - 8);

                    ctx.shadowBlur = 0;
                    ctx.font = '600 14px Outfit';
                    ctx.fillStyle = '#94a3b8';
                    ctx.fillText('IPS', centerX, centerY + 22);
                    ctx.restore();

                    // Percentage labels removed for cleaner look - info shown in side list
                    const meta = chart.getDatasetMeta(0);
                    const total = chart.data.datasets[0].data.reduce((a, b) => a + b, 0);

                    meta.data.forEach((arc, index) => {
                        if (chart.data.datasets[0].data[index] === 0) return;

                        const angle = (arc.startAngle + arc.endAngle) / 2;
                        const radius = arc.outerRadius + 8;
                        const x = centerX + Math.cos(angle) * radius;
                        const y = centerY + Math.sin(angle) * radius;

                        const percentage = ((chart.data.datasets[0].data[index] / total) * 100).toFixed(0);
                        const color = borderColors[index];

                        // Draw connecting line with gradient
                        const lineStartRadius = arc.outerRadius + 5;
                        const lineStartX = centerX + Math.cos(angle) * lineStartRadius;
                        const lineStartY = centerY + Math.sin(angle) * lineStartRadius;

                        ctx.save();
                        ctx.beginPath();
                        ctx.moveTo(lineStartX, lineStartY);
                        ctx.lineTo(x, y);
                        ctx.strokeStyle = color;
                        ctx.lineWidth = 2;
                        ctx.shadowBlur = 0;
                        ctx.shadowColor = 'transparent';
                        ctx.stroke();
                        ctx.restore();

                        // Draw percentage circle with glow
                        ctx.save();
                        ctx.shadowBlur = 0;
                        ctx.shadowColor = 'transparent';
                        ctx.beginPath();
                        ctx.arc(x, y, 14, 0, 2 * Math.PI);
                        ctx.fillStyle = color;
                        ctx.fill();
                        ctx.strokeStyle = '#030305';
                        ctx.lineWidth = 2;
                        ctx.stroke();
                        ctx.restore();

                        // Draw percentage text
                        ctx.save();
                        ctx.font = 'bold 10px Outfit';
                        ctx.fillStyle = '#fff';
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'middle';
                        ctx.shadowBlur = 0;
                        ctx.shadowColor = 'transparent';
                        ctx.fillText(percentage + '%', x, y);
                        ctx.restore();

                        // Course name labels removed - shown in legend below
                    });
                }
            }]
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
            const currentTheme = window.themeManager.getCurrentTheme();
            updateThemeUI(currentTheme);
        });

        // Listen for theme changes
        window.addEventListener('themechange', (e) => {
            updateThemeUI(e.detail.theme);
        });
    </script>
</body>

</html>