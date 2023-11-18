/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
    extend: {
      colors: {
        'primary': {
          50: 'var(--color-primary-50)',
          100: 'var(--color-primary-100)',
          200: 'var(--color-primary-200)',
          300: 'var(--color-primary-300)',
          400: 'var(--color-primary-400)',
          500: 'var(--color-primary-500)',
          600: 'var(--color-primary-500)',
          700: 'var(--color-primary-700)',
          800: 'var(--color-primary-800)',
          900: 'var(--color-primary-900)',
          950: 'var(--color-primary-950)'
        },
        'on-primary': {
          50: 'var(--color-on-primary-50)',
          100: 'var(--color-on-primary-100)',
          200: 'var(--color-on-primary-200)',
          300: 'var(--color-on-primary-300)',
          400: 'var(--color-on-primary-400)',
          500: 'var(--color-on-primary-500)',
          600: 'var(--color-on-primary-600)',
          700: 'var(--color-on-primary-700)',
          800: 'var(--color-on-primary-800)',
          900: 'var(--color-on-primary-900)',
          950: 'var(--color-on-primary-950)'
        },
        'surface': {
          DEFAULT: 'var(--color-surface)',
          50: 'var(--color-surface-50)',
          100: 'var(--color-surface-100)',
          200: 'var(--color-surface-200)',
          300: 'var(--color-surface-300)',
          400: 'var(--color-surface-400)',
          500: 'var(--color-surface-500)',
          600: 'var(--color-surface-600)',
          700: 'var(--color-surface-700)',
          800: 'var(--color-surface-800)',
          900: 'var(--color-surface-900)',
          950: 'var(--color-surface-950)'
        },
        'on-surface': {
          50: 'var(--color-on-surface-50)',
          100: 'var(--color-on-surface-100)',
          200: 'var(--color-on-surface-200)',
          300: 'var(--color-on-surface-300)',
          400: 'var(--color-on-surface-400)',
          500: 'var(--color-on-surface-500)',
          600: 'var(--color-on-surface-600)',
          700: 'var(--color-on-surface-700)',
          800: 'var(--color-on-surface-800)',
          900: 'var(--color-on-surface-900)',
          950: 'var(--color-on-surface-950)'
        },
        'background': 'var(--color-background)',
        'on-background': 'var(--color-on-background)',
      }
    },
  },
  plugins: [],
}
