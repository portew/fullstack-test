import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import {imageToWebpPlugin} from "vite-plugin-image-to-webp";

export default defineConfig({
    resolve: {
        alias: {
            '@images': '/resources/images'
        }
    },
    plugins: [
        imageToWebpPlugin({
            imageFormats: ['jpg', 'jpeg', 'png'],
            webpQuality: {
                quality : 100,
            },
            destinationFolder: 'resources/images',
        }),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public_html/build',
    },
    server: {
        hmr: {
            host: 'localhost',
        },
    },
});
