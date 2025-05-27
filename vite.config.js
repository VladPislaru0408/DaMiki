import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

// vite.config.js
export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/main.js"],
            refresh: true,
        }),
    ],
});
