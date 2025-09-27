// src/common/constants.js

export const BASE_URL_ADMIN = 'http://127.0.0.1:8000/'; 
export const API_BASE_URL   = 'http://127.0.0.1:8000/api/'; 

export const TOKEN_KEY = 'authToken'; // Key để lưu token xác thực trong Local Storage
export const USER_INFO_KEY = 'userInfo'; // Key để lưu thông tin user trong Local Storage

// Các đường dẫn route frontend mà bạn sẽ dùng trong React Router
export const PATHS = {
  HOME: '/',
  ABOUT: '/about',
  PRIVACY_POLICY: '/privacy-policy',
  BOOKING_POLICY: '/booking-policy',
  FAQ: '/faq',
  CONTACT: '/contact',
  WARRANTY_POLICY: '/warranty-policy',
  TERMS: '/terms',

  LOGIN: '/login',
  AUTH_CALLBACK: '/auth/callback',
  REGISTER: '/register',
  PROFILE: '/user/profile',
  MY_BOOKINGS: '/user/bookings',
  FAVORITE_PRODUCTS: '/user/favorites',
  LOGOUT: '/logout',
  PRODUCTS: '/products',
  PRODUCTS_BY_CATEGORY_SLUG: '/products/categories/:categorySlug',
  PRODUCT_DETAIL_BY_SLUG: '/products/:productSlug',
  ADMIN_DASHBOARD: BASE_URL_ADMIN,
  API_BASE_URL: API_BASE_URL,
};

// Định nghĩa các giá trị giới tính
export const GENDER_TYPES = {
  MALE: 'nam',
  FEMALE: 'nu',
  OTHER: 'khac',
};