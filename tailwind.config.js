// tailwind.config.js
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                playfair: ['"Playfair Display"', "serif"],
                inter: ["Inter", "sans-serif"],
                lora: ["Lora", "sans-serif"],
            },
            colors: {
                gold: "#F7C11F",
                cream: "#F7F1E7",
                charcoal: "#040012",
                buttonBg: "#DFDFDF",
                buttonBorder: "#F4C243",
                subtitle: "#E4E4E4",
                galerieColor: "#D9D9D9",
                galerieLineColor: "#969696",
            },
            keyframes: {
                "fade-in": {
                    "0%": { opacity: 0, transform: "translateY(20px)" },
                    "100%": { opacity: 1, transform: "translateY(0)" },
                },
            },
            animation: {
                "fade-in": "fade-in 0.6s ease-out both",
            },
        },
    },
    plugins: [],
};
