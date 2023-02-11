/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: "jit",
    darkMode: 'class',
    content: [
        "./resources/**/*.{js,jsx,ts,tsx,vue,blade.php}",
    ],
    theme: {
        extend: {
            colors:{
                "atom-one-dark":"#282C34",
                "github-dark":"#0D1117",
                "q-dark-main-form-color":"#434141",
                "q-dark-main-form-bg-color":"#37383D",
                "q-dark-main-form-field-color":"#1D1E20",
                "q-dark-main-form-text-color":"#434141",

                "q-dark-main-navbar-bg-color":"#322b2b",
                "q-dark-main-hover-color":"#e94656",
                "q-dark-main-note-bg-color":"#bdbdbd",



            },
        },
    },
    variants: {},
    plugins: [
        // require("flowbite/plugin")
    ],
};
