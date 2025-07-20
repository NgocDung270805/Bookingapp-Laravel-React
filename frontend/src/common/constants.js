// src/common/constants.js
export const BASE_URL_ADMIN = 'https://phungngocdungapp.up.railway.app/'; // Đảm bảo đúng với URL API Laravel của bạn https://phungngocdungapp.up.railway.app/
export const API_BASE_URL   = 'https://phungngocdungapp.up.railway.app/api/'; // Đảm bảo đúng với URL API Laravel của bạn http://127.0.0.1:8000/

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
  PRODUCTS_BY_CATEGORY_SLUG: '/products/categories/:categorySlug',
  PRODUCT_DETAIL_BY_SLUG: '/products/:productSlug',
  ADMIN_DASHBOARD: BASE_URL_ADMIN,
};

// Bạn có thể định nghĩa các giá trị giới tính nếu cần kiểm tra
export const GENDER_TYPES = {
  MALE: 'nam',
  FEMALE: 'nu',
  OTHER: 'khac',
};