/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./index.html", "./src/**/*.{vue,js,ts,jsx,tsx}"],
    theme: {
        extend: {
            color: {
              primary: 'var(--color-primary)',
              secondary: 'var(--color-secondary)',
            },
        },
    },
    plugins: [],
};
