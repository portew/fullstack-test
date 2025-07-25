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
        screens: {
            'sm': '580px',
            // => @media (min-width: 580px) { ... }

            'lg': '990px',
            // => @media (min-width: 990px) { ... }

            'xl': '1240px',
            // => @media (min-width: 1240px) { ... }
            '2xl': '1480px',
            // => @media (min-width: 1480px) { ... }
        },
        extend: {
            fontFamily: {
                serif: ['Cactus Classical Serif', ...defaultTheme.fontFamily.sans],
                sans: ['Jost', ...defaultTheme.fontFamily.mono],
                option: ['Jost'],
            },
            width: {
                '576': '36rem',
                '960': '60rem',
                '1200': '75rem',
            },
            fontSize: {
                '2xs' : '.625rem',
                'xxl' : '1.5rem',
                '2xxl' : '3rem',
                'heading' : '3rem',
            },
            colors:{
                "cookie-cinereous": "#B09E99",
                "cookie-misty-rose": "#FEE9E1",
                "cookie-apricot": "#FAD4C0",
                "cookie-verdigris" : '#64B6AC',
                "cookie-celeste" : "#C0FDFB",
            }
        },
    },
    plugins: [],
};
