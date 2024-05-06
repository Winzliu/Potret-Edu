const { addDynamicIconSelectors } = require('@iconify/tailwind');

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            fontFamily: {
                Poppins: ["Poppins", "sans-serif"],
            },
    colors: {
        mainColor: '#F3B835',
        secondaryColor: '#FECD33',
        tertiaryColor: '#12AAC0',
        fourthColor: '#C4D9E0',
        background: '#EEF5F6',
        purpleRed: "#DD3363",
        greenConfirm: "#4DAC3F",
          },
      },
  },
  plugins: [require('daisyui'),
    addDynamicIconSelectors(),
    require('flowbite/plugin'),
  ],


//Apabila warna background tampilan web menjadi hitam, tambahkan kode berikut
  daisyui: {
    themes: ["light"],
  },
}
