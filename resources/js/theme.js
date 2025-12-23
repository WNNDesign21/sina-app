// Theme Management
class ThemeManager {
    constructor() {
        this.theme = this.getStoredTheme() || 'auto';
        this.init();
    }

    init() {
        this.applyTheme();
        this.watchSystemTheme();
    }

    getStoredTheme() {
        return localStorage.getItem('theme');
    }

    setStoredTheme(theme) {
        localStorage.setItem('theme', theme);
    }

    getSystemTheme() {
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }

    applyTheme() {
        let effectiveTheme = this.theme;

        if (this.theme === 'auto') {
            effectiveTheme = this.getSystemTheme();
        }

        if (effectiveTheme === 'light') {
            document.documentElement.setAttribute('data-theme', 'light');
        } else {
            document.documentElement.removeAttribute('data-theme');
        }
    }

    setTheme(newTheme) {
        this.theme = newTheme;
        this.setStoredTheme(newTheme);
        this.applyTheme();

        // Dispatch custom event
        window.dispatchEvent(new CustomEvent('themechange', { detail: { theme: newTheme } }));
    }

    cycleTheme() {
        const themes = ['dark', 'light', 'auto'];
        const currentIndex = themes.indexOf(this.theme);
        const nextIndex = (currentIndex + 1) % themes.length;
        this.setTheme(themes[nextIndex]);
        return themes[nextIndex];
    }

    watchSystemTheme() {
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
            if (this.theme === 'auto') {
                this.applyTheme();
            }
        });
    }

    getCurrentTheme() {
        return this.theme;
    }

    getEffectiveTheme() {
        return this.theme === 'auto' ? this.getSystemTheme() : this.theme;
    }
}

// Initialize theme manager
const themeManager = new ThemeManager();

// Export for use in other scripts
window.themeManager = themeManager;
