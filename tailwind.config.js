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
                light: '#A0F9D8',
                DEFAULT: '#17B178',
                dark: '#259169',
                darker: '#276F54',
                },
                mainorange:{
                  light: '#FFCAA7',
                  DEFAULT: '#FF8C42',
                  dark: '#D85F12', 
                  darker: '#774A2D', 
                },
                mainpink:{
                  light: '#F1CEDA',
                  DEFAULT: '#DF3F74',
                  dark: '#9D3658', 
                  darker: '#66293D', 
                },

            },
            boxShadow: {
                ps: 'rgba(50, 50, 93, 0.25) 0px 0px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px',
            },
            animation: {
                'reverse-spin': 'reverse-spin 1s linear infinite'
            },
            keyframes: {
                'reverse-spin': {
                    from: {
                        transform: 'rotate(360deg)'
                    },
            }
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
