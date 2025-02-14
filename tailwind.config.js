/** @type {import('tailwindcss').Config} config */
const config = {
  // prefix: 'tw-',
  
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    
    extend: {

      colors: {}, // Extend Tailwind's default colors
    },
  },
  corePlugins: {
    container: false,
  },
  plugins: [],
};

export default config;
