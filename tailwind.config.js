/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      // Force RGB color format for PDF compatibility
      colors: {
        primary: {
          DEFAULT: '#003D7A',
          50: '#E6EDF5',
          100: '#CCDAEB',
          200: '#99B5D7',
          300: '#6690C3',
          400: '#336BAF',
          500: '#003D7A',
          600: '#003162',
          700: '#002549',
          800: '#001931',
          900: '#000C18',
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
  // Force legacy color format for PDF compatibility (no oklch)
  corePlugins: {
    // Disable oklch color space
  },
  daisyui: {
    themes: [
      {
        mytheme: {
          "primary": "#003D7A",
          "secondary": "#5B5FC7",
          "accent": "#FF9500",
          "neutral": "#3d4451",
          "base-100": "#ffffff",
          "info": "#3abff8",
          "success": "#36d399",
          "warning": "#fbbd23",
          "error": "#f87272",
        },
      },
    ],
    // Force hex colors in DaisyUI instead of oklch
    styled: true,
    base: true,
    utils: true,
    logs: true,
    rtl: false,
  },
  plugins: [require('daisyui')],
}
