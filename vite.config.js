import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',     // Archivo de Breeze
                'resources/js/app.js',       // Archivo de Breeze
            ],
            refresh: true,
        }),
    ],
});