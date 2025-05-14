// tailwind.config.js
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      fontFamily: {
        playfair: ['"Playfair Display"', 'serif'],
        inter: ['Inter', 'sans-serif'],
        lora: ['Lora', 'sans-serif'],
      },
      colors: {
        gold: '#F7C11F',
        cream: '#F7F1E7',
        charcoal: '#040012',
        buttonBg: '#DFDFDF',
        buttonBorder: '#F4C243',
        subtitle: '#E4E4E4',
        galerieColor: '#D9D9D9',
        galerieLineColor: '#969696',
      },
    },
  },
  plugins: [],
}