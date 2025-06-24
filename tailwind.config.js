import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: [
                    "Figtree",
                    ...defaultTheme.fontFamily.sans,
                    "Inter",
                    "sans-serif",
                ],
                roboto: ["Roboto", "sans-serif"],
            },
            colors: {
                darkBlue: "#0A1D3D",
            },
            height: {
                "screen-60": "60vh",
                "screen-70": "70vh",
            },
        },
    },

    plugins: [forms],
};

