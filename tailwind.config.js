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

                weak:{
                   light: '#DE5176',
                   DEFAULT: '#DE3E6B',
                   dark: '#B3425F', 
                   darker: '#A63D58',  
                },
                medium:{
                   light: '#D5B743',
                   DEFAULT: '#C9AD3F',
                   dark: '#B39A38', 
                   darker: '#A58F34',  
                },
                strong:{
                   light: '#7CD859',
                   DEFAULT: '#52D23D',
                   dark: '#5CA243', 
                   darker: '#54933D',  
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

    plugins: [
    require('@tailwindcss/forms'),
    require('daisyui'),],

    daisyui: {
        themes: [
          {
            'passworld': {                          /* your theme name */
               'primary' : '#2AD199',           /* Primary color */
               'primary-focus' : '#55AC84',     /* Primary color - focused */
               'primary-content' : '#ffffff',   /* Foreground content color to use on primary color */

               'secondary' : '#E3658F',         /* Secondary color */
               'secondary-focus' : '#BA607F',   /* Secondary color - focused */
               'secondary-content' : '#ffffff', /* Foreground content color to use on secondary color */

               'accent' : '#37cdbe',            /* Accent color */
               'accent-focus' : '#2aa79b',      /* Accent color - focused */
               'accent-content' : '#ffffff',    /* Foreground content color to use on accent color */

               'neutral' : '#3d4451',           /* Neutral color */
               'neutral-focus' : '#2a2e37',     /* Neutral color - focused */
               'neutral-content' : '#ffffff',   /* Foreground content color to use on neutral color */

               'base-100' : '#ffffff',          /* Base color of page, used for blank backgrounds */
               'base-200' : '#f9fafb',          /* Base color, a little darker */
               'base-300' : '#d1d5db',          /* Base color, even more darker */
               'base-content' : '#1f2937',      /* Foreground content color to use on base color */

               'info' : '#2094f3',              /* Info */
               'success' : '#009485',           /* Success */
               'warning' : '#ff9900',           /* Warning */
               'error' : '#ff5724',             /* Error */
            },
          },
        ],
      },


};
