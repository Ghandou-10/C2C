import laravel from 'laravel-vite-plugin';
import {defineConfig} from 'vite';
import * as path from 'path';
import vue from '@vitejs/plugin-vue2';
import {dashboardChosenColor} from './Modules/Dashboard/Resources/assets/js/colors.js';
import postcssRtl from 'postcss-rtl';

const projectRootDir = path.resolve(__dirname);

export default defineConfig({
    plugins: [
        laravel([
            'Modules/Dashboard/Resources/assets/js/qovex/qovex.js',
            'Modules/Dashboard/Resources/assets/scss/qovex/qovex.scss',
            'Modules/Dashboard/Resources/assets/js/flatAble/flatAble.js',
            'Modules/Dashboard/Resources/assets/scss/flatAble/flatAble.scss',
            'Modules/Chats/Resources/assets/js/chat/chat.js',
            'Modules/Chats/Resources/assets/scss/chat/chat.scss',
            'Modules/Installer/Resources/assets/js/installer.js',
            'Modules/Installer/Resources/assets/scss/installer.scss',
        ]),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        {
            name: 'blade',
            handleHotUpdate({file, server}) {
                if (file.endsWith('.blade.php')) {
                    server.ws.send({
                        type: 'full-reload',
                        path: '*',
                    });
                }
            },
        },
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap4'),
            '~bootstrap5': path.resolve(__dirname, 'node_modules/bootstrap5'),
            '~fortawesome': path.resolve(__dirname, 'node_modules/@fortawesome/fontawesome-free'),
            '~select2': path.resolve(__dirname, 'node_modules/select2'),
            '~bootstrap-select': path.resolve(__dirname, 'node_modules/bootstrap-select'),
            '~bootstrap-select5': path.resolve(__dirname, 'node_modules/bootstrap-select5'),
            '~summernote': path.resolve(__dirname, 'node_modules/summernote'),
            '~glightbox': path.resolve(__dirname, 'node_modules/glightbox'),
            '~simonwep': path.resolve(__dirname, 'node_modules/@simonwep/pickr'),
            '~swiper': path.resolve(__dirname, 'node_modules/swiper'),
            '~bootstrap-colorpicker': path.resolve(__dirname, 'node_modules/bootstrap-colorpicker'),
            vue: 'vue/dist/vue.esm.js',
            $fonts: path.resolve(projectRootDir, "Modules/Dashboard/Resources/assets/fonts"),
            $flatAbleFonts: path.resolve(projectRootDir, "Modules/Dashboard/Resources/assets/fonts/flatAble"),
            $chatImages: path.resolve(projectRootDir, "Modules/Chats/Resources/assets/images/chat"),
            $chatFonts: path.resolve(projectRootDir, "Modules/Chats/Resources/assets/fonts/chat"),
        }
    },
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `$dashboardChosenColor: ${dashboardChosenColor};`,
            }
        },
        postcss: {
            plugins: [
                postcssRtl()
            ]
        }
    },
    define: {
        "process.env": process.env,
    },
    build: {chunkSizeWarningLimit: 1600,}
})
