import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react-swc'

export default defineConfig({
  plugins: [react()],
  server: {
    host: true, // Giữ lại nếu bạn cần truy cập từ IP khác 
  }
})

// Cấu hình cho ngrok chạy trên localhost
// const ngrokHost = 'a0cd-42-118-57-49.ngrok-free.app'
// // https://vite.dev/config/
// export default defineConfig({
//   plugins: [react()],
//   server: {
//     host: true, // Cho phép truy cập từ external network
//     allowedHosts: [ngrokHost], // Thêm domain ngrok vào danh sách cho phép
//   }
// })