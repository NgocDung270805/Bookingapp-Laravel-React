// src/common/constants.js
export const BASE_URL_ADMIN = 'http://localhost:8000/'; // Đảm bảo đúng với URL API Laravel của bạn
export const API_BASE_URL = 'http://localhost:8000/api'; // Đảm bảo đúng với URL API Laravel của bạn

export const TOKEN_KEY = 'authToken'; // Key để lưu token xác thực trong Local Storage
export const USER_INFO_KEY = 'userInfo'; // Key để lưu thông tin user trong Local Storage

// Các đường dẫn route frontend mà bạn sẽ dùng trong React Router
export const PATHS = {
  HOME: '/',
  LOGIN: '/login',
  REGISTER: '/register',
  PROFILE: '/user/profile',
  LOGOUT: '/logout',
  PRODUCTS: '/products',
  ADMIN_DASHBOARD: BASE_URL_ADMIN,
};

// Bạn có thể định nghĩa các giá trị giới tính nếu cần kiểm tra
export const GENDER_TYPES = {
  MALE: 'nam',
  FEMALE: 'nu',
  OTHER: 'khac',
};