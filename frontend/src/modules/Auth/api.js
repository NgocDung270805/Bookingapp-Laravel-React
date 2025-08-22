// src/modules/Auth/api.js

import api from '../../common/API'; // Import Axios instance đã cấu hình

// Hàm đăng nhập
export const loginApi = async (credentials) => {
  const response = await api.post('/login', credentials);
  return response.data;
};

// Hàm đăng ký
export const registerApi = async (userData) => {
  const response = await api.post('/register', userData);
  return response.data;
};

// Hàm đăng xuất
export const logoutApi = async () => {
  const response = await api.post('/logout'); // Endpoint logout thường không cần body
  return response.data;
};

// Hàm API cho social login
export const loginSocialApi = async ({ provider, token }) => {
  const response = await api.post(`/auth/social/${provider}/callback`, { token });
  return response.data;
};