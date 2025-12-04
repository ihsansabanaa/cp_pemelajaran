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
        primary: {
          DEFAULT: '#0066CC',
          50: '#E6F2FF',
          100: '#CCE5FF',
          200: '#99CCFF',
          300: '#66B2FF',
          400: '#3399FF',
          500: '#0066CC',
          600: '#0052A3',
          700: '#003D7A',
          800: '#002952',
          900: '#001429',
        },
        secondary: {
          DEFAULT: '#5B5FC7',
          50: '#EDEDFA',
          100: '#DCDCF5',
          200: '#B9B9EB',
          300: '#9696E1',
          400: '#7378D7',
          500: '#5B5FC7',
          600: '#4649A2',
          700: '#34377A',
          800: '#232551',
          900: '#121329',
        },
        accent: {
          DEFAULT: '#FF9500',
          50: '#FFE5CC',
          100: '#FFD9B3',
          200: '#FFC280',
          300: '#FFAB4D',
          400: '#FFA026',
          500: '#FF9500',
          600: '#CC7700',
          700: '#995900',
          800: '#663B00',
          900: '#331E00',
        },
      },
    },
  },
  plugins: [],
}
