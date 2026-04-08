import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: 'node_modules/tinymce/skins',
                    dest: 'assets/js/tinymce'
                },
                {
                    src: 'node_modules/tinymce/themes',
                    dest: 'assets/js/tinymce'
                },
                {
                    src: 'node_modules/tinymce/plugins',
                    dest: 'assets/js/tinymce'
                },
                {
                    src: 'node_modules/tinymce/icons',
                    dest: 'assets/js/tinymce'
                }
            ]
        })
    ],
});
