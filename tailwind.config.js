const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content:[
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
                background:{
                    DEFAULT: "#1F2937",
                },
                
                weak:{
                   light: '#FFF0F0',
                   DEFAULT: '#DE3E6B',
                   dark: '#B3425F', 
                   darker: '#A63D58',  
                },
                medium:{
                   light: '#FFFEF0',
                   DEFAULT: '#C9AD3F',
                   dark: '#B39A38', 
                   darker: '#A58F34',  
                },
                strong:{
                   light: '#F4FFF0',
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
    require('@tailwindcss/typography'),
    require('daisyui'),],

    daisyui: {
        themes: [
          {
            'passworld': {                       /* your theme name */
               'primary' : '#0FCB99',           /* Primary color */
               'primary-focus' : '#0EB78A',     /* Primary color - focused */
               'primary-content' : '#032e23',   /* Foreground content color to use on primary color */

               'secondary' : '#D7346A',         /* Secondary color */
               'secondary-focus' : '#C73D6A',   /* Secondary color - focused */
               'secondary-content' : '#FFFFFF', /* Foreground content color to use on secondary color */

               'accent' : '#FF8C42',            /* Accent color */
               'accent-focus' : '#EA7327',      /* Accent color - focused */
               'accent-content' : '#532e16',    /* Foreground content color to use on accent color */

               'neutral' : '#465569',           /* Neutral color */
               'neutral-focus' : '#39475A',     /* Neutral color - focused */
               'neutral-content' : '#FFFFFF',   /* Foreground content color to use on neutral color */

               'base-100' : '#FFFFFF',          /* Base color of page, used for blank backgrounds */
               'base-200' : '#F9F9F9',          /* Base color, a little darker */
               'base-300' : '#F0F0F0',          /* Base color, even more darker */
               'base-content' : '#4D4D4D',      /* Foreground content color to use on base color */

               'info' : '#004278',              /* Info */
               'info-content' : '#DAEAF6', 
               'success' : '#026300',           /* Success */
               'success-content' : '#DEF2DD', 
               'warning' : '#6E4700',           /* Warning */
               'warning-content' : '#FFE898',
               'error' : '#7E342F',             /* Error */
               'error-content' : '#F7D4D2',
            },

          },
          "light",
          "dracula",
        ],
      },


};
