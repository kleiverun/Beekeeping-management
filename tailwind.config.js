/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
    theme: {
    extend: {
        colors: {
            'menu-orange': '#FFA800',
            'background-orange': '#FFB800E5',
        },
    },
  },
  plugins: [],
}

