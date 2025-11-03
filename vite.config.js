import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',     // Archivo de Breeze
                'resources/css/style.css',   // ¡Tu archivo!
                'resources/js/app.js',       // Archivo de Breeze
                'resources/js/sidebar.js', // ¡Tu archivo!
                'resources/js/tienda.js',    // ¡Tu archivo!
            ],
            refresh: true,
        }),
    ],
});