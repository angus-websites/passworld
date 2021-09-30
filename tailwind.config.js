const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {

        screens: {
          'xs': '475px',
          ...defaultTheme.screens,
        },

        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                seagreen: {
                light: '#73F1B4',
                DEFAULT: '#6EE5AA',
                dark: '#5EC593',
                },
                mainorange:{
                  light: '#FFA770',
                  DEFAULT: '#FF8C42',
                  dark: '#FF680A', 
                  darker: '#DC864D', 
                },
                mainpink:{
                  light: '#EB6FAD',
                  DEFAULT: '#CB538C',
                  dark: '#BD4E82', 
                  darker: '#AF4879', 
                },

            },
            boxShadow: {
                ps: 'rgba(50, 50, 93, 0.25) 0px 0px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px',
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
