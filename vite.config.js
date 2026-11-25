import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',   // keep for tailwind
                'resources/scss/app.scss', // SCSS entry
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                // silence deprecation warnings from sass
                silenceDeprecations: ['legacy-js-api'],
            },
        },
    },
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
