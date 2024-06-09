const { addDynamicIconSelectors } = require("@iconify/tailwind");

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
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
            purpleRed: '#DD3363',
            greenConfirm: '#4DAC3F',
            background: '#EEF5F6',
            },
        animation: {
            scale: 'scale 3s infinite linear',
            notif: 'notif 2s linear',
            notifKitchen: 'notif 3s linear',
        },
        keyframes: {
            scale: {
                '0%': {
                    scale: '100%',
                },
                '50%': {
                    scale: '130%',
                },
                '100%': {
                    scale: '100%',
                }
            },
            notif: {
                '0%': {
                    opacity: '0%',
                },
                '20%': {
                    opacity: '100%',
                },
                '80%': {
                    opacity: '100%',
                },
                '100%': {
                    opacity: '0%',
                },
            },
        },
        },
    },
    plugins: [
      require('daisyui'), 
      addDynamicIconSelectors(),
      require('flowbite/plugin')
    ],

//Apabila warna background tampilan web menjadi hitam, tambahkan kode berikut
    daisyui: {
        themes: ['light'],
    },
};
