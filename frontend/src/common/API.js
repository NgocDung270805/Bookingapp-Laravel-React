// src/common/API.js

import axios from 'axios';
import { API_BASE_URL, TOKEN_KEY, USER_INFO_KEY, PATHS } from './constants';

const api = axios.create({
  baseURL: API_BASE_URL,
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
  },
});

// Interceptor cho Request: Tự động thêm token vào header Authorization
api.interceptors.request.use(
  (config) => {
    const token = localStorage.getItem(TOKEN_KEY);
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);

// Interceptor cho Response: Xử lý lỗi, đặc biệt là lỗi 401 Unauthorized
api.interceptors.response.use(
  (response) => {
    return response;
  },
  (error) => {
    if (error.response && error.response.status === 401) {
      // Nếu token hết hạn hoặc không hợp lệ, xóa token và chuyển hướng về trang đăng nhập
      localStorage.removeItem(TOKEN_KEY);
      localStorage.removeItem(USER_INFO_KEY);
      // alert('Phiên đăng nhập đã hết hạn. Vui lòng đăng nhập lại.'); // Tránh dùng alert trong React production code
      window.location.href = PATHS.LOGIN; // Chuyển hướng cứng, có thể dùng useNavigate từ React Router nếu trong component
    }
    return Promise.reject(error);
  }
);

export default api;