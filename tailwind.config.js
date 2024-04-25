/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        'Poppins': ['Poppins', 'sans-serif'],
    },
    colors: {
        mainColor: '#F3B835',
        secondaryColor: '#F7A623',
        tertiaryColor: '#FECD33',
        background: '#EEF5F6',
        semiBlack: 'rgba(0,0,0,0.4)',
        lightGrey: '#EDEDED',
        darkGrey: '#5F5F5F',
        mediumGrey: '#5c5c5c',
        mediumRed: '#FF0000',
        semiWhite: '#fefefe',
        plat: '#dedede',
    },
    },
  },
  plugins: [require('daisyui')],

//Apabila warna background tampilan web menjadi hitam, tambahkan kode berikut
daisyui: {
  themes: ["light"],
},
}

