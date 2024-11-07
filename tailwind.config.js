import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                customblue: '#2E104E',
                customGray: {
                    light: '#D1D5DB', // Gris más claro
                    DEFAULT: '#9CA3AF', // Gris normal
                    dark: '#6B7280',   // Gris más oscuro
                    
                },
                primary: {
                    light: '#5B88FF',  // Azul claro
                    DEFAULT: '#3B61D1', // Azul normal
                    dark: '#2C4A91',   // Azul oscuro
                },
            },
        },
    },

    plugins: [forms],
};
