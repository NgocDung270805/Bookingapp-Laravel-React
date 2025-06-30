// src/appRedux/store.js

import { configureStore } from '@reduxjs/toolkit';
import authReducer from '../modules/Auth/slice'; // Import auth reducer
import profileReducer from '../modules/profile/slice'; // Import profile reducer
import productsReducer from '../modules/Products/slice';

export const store = configureStore({
  reducer: {
    auth: authReducer,    // Đăng ký auth reducer vào store
    profile: profileReducer, // Đăng ký profile reducer vào store
    products: productsReducer,
  },
  // Bạn có thể thêm cấu hình middleware hoặc enhancers ở đây nếu cần
});