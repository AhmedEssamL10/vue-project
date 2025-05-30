/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./*.html",
        "./src/**/*.{js,ts,jsx,tsx,vue}",
        "./node_modules/flyonui/dist/js/*.js",
        "./resources/**/*.blade.php",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            container: {
                center: true,
            },
            colors: {
                purple: {
                    light: "#9b87f5",
                    deep: "#7E69AB",
                },
                primary: "#128043",
                secondary: "#23519f",
                third: "#e97709",
                client: {
                    DEFAULT: "#9b87f5",
                    dark: "#3c0964",
                    light: "#b3a3f8",
                },
                worker: {
                    DEFAULT: "#F97316",
                    dark: "#d76313",
                    light: "#FB923C",
                },
            },
            keyframes: {
                float: {
                    "0%, 100%": { transform: "translateY(0)" },
                    "50%": { transform: "translateY(-10px)" },
                },
            },
            animation: {
                float: "float 3s ease-in-out infinite",
            },
            fontFamily: {
                cairo: ["Cairo", "sans-serif"],
                inter: ["Inter", "sans-serif"],
            },
        },
    },
    plugins: [require("daisyui")],
};
