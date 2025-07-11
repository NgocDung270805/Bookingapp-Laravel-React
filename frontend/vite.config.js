// vite.config.js
import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react-swc'; // Sử dụng @vitejs/plugin-react-swc như trong package.json
import path from 'path'; // Import path module

export default defineConfig({
  plugins: [react()],
  resolve: {
    server: {
      host: true, // Giữ lại nếu bạn cần truy cập từ IP khác 
    },
    alias: {
      // Thêm alias này để đảm bảo tất cả các gói sử dụng cùng một bản sao của React
      'react': path.resolve(__dirname, 'node_modules/react'),
      'react-dom': path.resolve(__dirname, 'node_modules/react-dom'),
    },
  },
  // Thêm optimizeDeps để Vite xử lý các dependencies này một cách nhất quán
  optimizeDeps: {
    include: ['react', 'react-dom'],
  },
  //   Cấu hình cho ngrok chạy trên localhost
  // const ngrokHost = 'a0cd-42-118-57-49.ngrok-free.app'
  // // https://vite.dev/config/
  // export default defineConfig({
  //   plugins: [react()],
  //   server: {
  //     host: true, // Cho phép truy cập từ external network
  //     allowedHosts: [ngrokHost], // Thêm domain ngrok vào danh sách cho phép
  //   }
  // })
});
