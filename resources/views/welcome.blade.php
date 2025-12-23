<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SINA - Secure Access</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
</head>

<div class="fixed top-6 right-6 z-50">
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
    <body
    class="antialiased min-h-screen flex items-center justify-center relative overflow-hidden selection:bg-indigo-500 selection:text-white">

    <!-- Ambient Background Elements -->
    <div class="fixed inset-0 z-[-1]">
        <div
            class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-indigo-600/10 rounded-full blur-[120px] animate-pulse">
        </div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-purple-600/10 rounded-full blur-[120px] animate-pulse"
            style="animation-delay: 2s"></div>
    </div>

    <!-- Main Login Container -->
    <div class="w-full max-w-6xl grid grid-cols-1 lg:grid-cols-2 gap-12 p-6 items-center">

        <!-- Left Side: Branding & Info -->
        <div class="hidden lg:block space-y-8 relative">
            <div class="absolute -left-10 -top-10 w-24 h-24 border-l-2 border-t-2 border-white/10 rounded-tl-3xl"></div>

            <div class="space-y-2 opacity-0 translate-y-4" id="brand-text">
                <div class="flex items-center gap-3 mb-4">
                    <div class="h-px w-12 bg-indigo-500"></div>
                    <span class="text-indigo-400 tracking-[0.2em] text-sm font-bold uppercase">Sistem Integritas
                        Nilai Akademik</span>
                </div>
                <h1 class="text-7xl font-bold tracking-tight text-white leading-tight">
                    SINA <br />
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400">SYSTEM</span>
                </h1>
                <p class="text-gray-400 text-lg max-w-md leading-relaxed">
                    Sistem Integritas Nilai Akademik dengan standar keamanan enkripsi tingkat tinggi dan presisi data
                    absolut.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-6 pt-8 opacity-0 translate-y-4" id="features-grid">
                <div class="glass-card p-6 rounded-2xl border-l-4 border-indigo-500">
                    <div class="text-indigo-400 mb-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-white font-semibold">AES-256 Encryption</h3>
                    <p class="text-xs text-gray-500 mt-1">Data secured at rest & in transit</p>
                </div>
                <div class="glass-card p-6 rounded-2xl border-l-4 border-emerald-500">
                    <div class="text-emerald-400 mb-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-white font-semibold">Integrity Hashing</h3>
                    <p class="text-xs text-gray-500 mt-1">Anti-tamper verification system</p>
                </div>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="relative">
            <div class="glass-card p-10 rounded-3xl relative overflow-hidden transform transition-all duration-700 opacity-0 translate-y-8"
                id="login-card">
                <!-- Decorative Top Line -->
                <div
                    class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-indigo-500 to-transparent opacity-70">
                </div>

                <div class="mb-10 text-center">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-indigo-500/10 to-purple-500/10 border border-white/5 mb-6 shadow-[0_0_30px_rgba(99,102,241,0.2)] group hover:scale-110 transition-transform duration-500">
                        <svg class="w-10 h-10 text-indigo-400 group-hover:text-white transition-colors" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.131A8 8 0 008 8m0 1.036.067 2.059.195 3.068">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white tracking-tight">Access Control</h2>
                    <p class="text-sm text-gray-500 mt-2">Please authenticate to continue</p>
                </div>

                <form action="{{ route('login.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    @if ($errors->any())
                        <div class="p-4 mb-4 text-sm text-red-400 rounded-xl bg-red-500/10 border border-red-500/20">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="space-y-2">
                        <label
                            class="text-xs font-semibold text-gray-400 uppercase tracking-wider ml-1">Identity</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500 group-focus-within:text-indigo-400 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input type="text" name="username"
                                class="input-premium w-full rounded-xl py-4 pl-12 pr-4 text-white placeholder-gray-600 focus:ring-0"
                                placeholder="Enter your ID" required>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label
                            class="text-xs font-semibold text-gray-400 uppercase tracking-wider ml-1">Passcode</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500 group-focus-within:text-indigo-400 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                            </div>
                            <input type="password" name="password"
                                class="input-premium w-full rounded-xl py-4 pl-12 pr-4 text-white placeholder-gray-600 focus:ring-0"
                                placeholder="••••••••" required>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-bold py-4 rounded-xl shadow-[0_0_20px_rgba(99,102,241,0.4)] hover:shadow-[0_0_30px_rgba(99,102,241,0.6)] transform hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2 group">
                        <span>INITIATE SESSION</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </button>
                </form>

                <div class="mt-8 pt-6 border-t border-white/5 flex justify-between items-center text-xs text-gray-500">
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>Server Online</span>
                    </div>
                    <span>v2.0.4 Secure Build</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Entrance Animations
        anime.timeline({
            easing: 'easeOutExpo'
        })
            .add({
                targets: '#brand-text',
                opacity: [0, 1],
                translateY: [20, 0],
                duration: 1200,
                delay: 200
            })
            .add({
                targets: '#features-grid',
                opacity: [0, 1],
                translateY: [20, 0],
                duration: 1200,
                offset: '-=800'
            })
            .add({
                targets: '#login-card',
                opacity: [0, 1],
                translateY: [40, 0],
                duration: 1400,
                offset: '-=1000'
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