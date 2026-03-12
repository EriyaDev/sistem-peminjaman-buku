import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
    extend: {
        width: {
        'desktop': '1440px',
        },
        screens: {
            'desktop': '1440px',
        },
        fontFamily: {
            poppins: 'Poppins',
            satoshi: 'Satoshi',
          },

          colors:{

            // Main Color Pallette
            'primary-color' : "#ECF2F9",
            'secondary-color' : "#FFFFFF",
            'third-color' : '#222222',
            'success-color' : '#00A84F',

            'accent-color' : "#5D2AF2",
            'accent-secondary-color' : "#29405B",
            'inactive-color' : "#A1A0A0",
            'gray-button-color' : "#F6F6F6",

            'border-color' : "#8D8A9D80",

            'text-primary-color' : "#38315A",
            'text-secondary-color' : "#8D8A9D",
          },
    },
  },
    plugins: [],
};
