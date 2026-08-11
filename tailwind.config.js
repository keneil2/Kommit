/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/*.ts",
  ],
  theme: { 
    extend: { colors: {
      primary: 'var(--color-primary)',
      secondary: 'var(--color-secondary)',
      destructive:'var(--color-destructive)'
    },},
  
  
  },
  plugins: [],
}