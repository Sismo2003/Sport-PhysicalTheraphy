/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./web/**/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        main: '#74c8cc',
        secondary :'#A8E3E5',
        'custom-gray': '#EDEFF4'
      },
    },
  },
  mode: 'jit',
  plugins: [],
}

