import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
  plugins: [
    vue(),
    laravel({
      input: ['resources/js/main.js'],
      refresh: true,
    }),
  ],
  resolve: {
    alias: {
      '@assets': path.resolve(__dirname, 'public/assets')
    }
  },
  build: {
    manifest: true,
    outDir: 'public/build',
    rollupOptions: {
      input: 'resources/js/main.js',
    },
  },
});
