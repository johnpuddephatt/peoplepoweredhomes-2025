/** @type {import('tailwindcss').Config} config */

import typography from '@tailwindcss/typography';

const config = {
  // prefix: 'tw-',

  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    colors: {
      primary: '#64e2d8',
      black: '#000',
      white: '#fff',
      gray: '#666',
    },
  },
  corePlugins: {
    container: false,
  },
  plugins: [typography],
};

export default config;
