/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.php", "./src/**/*.{js,css,php}", "./assets/**/*"],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
        display: ['Instrument Sans', 'Inter', 'sans-serif'],
      },
      colors: {
        bg: '#070709',
        surface: '#111113',
        surface2: '#19191B',
        line: '#232326',
        accent: '#B9FF66',
        accentHover: '#A8E635',
        muted: '#A1A1AA',
      },
      boxShadow: {
        soft: '0 1px 0 0 rgba(255,255,255,0.04), 0 8px 24px rgba(0,0,0,0.5)',
      }
    },
  },
  plugins: [],
}
