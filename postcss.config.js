export default {
  plugins: {
    tailwindcss: {},
    // Convert oklch to rgb for PDF compatibility
    '@csstools/postcss-oklab-function': { preserve: false },
    autoprefixer: {},
  },
}
