// src/modules/Auth/slice.js

import { createSlice, createAsyncThunk } from '@reduxjs/toolkit';
import { loginApi, registerApi, logoutApi, loginSocialApi } from './api';
import { TOKEN_KEY, USER_INFO_KEY } from '../../common/constants';

// Khởi tạo trạng thái ban đầu, cố gắng lấy từ Local Storage
const initialState = {
  token: localStorage.getItem(TOKEN_KEY),
  user: localStorage.getItem(USER_INFO_KEY) ? JSON.parse(localStorage.getItem(USER_INFO_KEY)) : null,
  isAuthenticated: !!localStorage.getItem(TOKEN_KEY), // true nếu có token
  loading: false,
  error: null,
};

// Async Thunks cho Login, Register, Logout
export const loginUser = createAsyncThunk(
  'auth/loginUser',
  async (credentials, { rejectWithValue }) => {
    try {
      const response = await loginApi(credentials);
      localStorage.setItem(TOKEN_KEY, response.token);
      localStorage.setItem(USER_INFO_KEY, JSON.stringify(response.user));
      return response;
    } catch (error) {
      // Trả về message lỗi từ backend nếu có, nếu không thì là lỗi chung
      return rejectWithValue(error.response?.data?.message || 'Đăng nhập thất bại.');
    }
  }
);

export const registerUser = createAsyncThunk(
  'auth/registerUser',
  async (userData, { rejectWithValue }) => {
    try {
      const response = await registerApi(userData);
      localStorage.setItem(TOKEN_KEY, response.token);
      localStorage.setItem(USER_INFO_KEY, JSON.stringify(response.user));
      return response;
    } catch (error) {
      return rejectWithValue(error.response?.data?.message || 'Đăng ký thất bại.');
    }
  }
);

export const logoutUser = createAsyncThunk(
  'auth/logoutUser',
  async (_, { rejectWithValue }) => {
    try {
      await logoutApi();
      localStorage.removeItem(TOKEN_KEY);
      localStorage.removeItem(USER_INFO_KEY);
      return;
    } catch (error) {
      // Mặc dù logout trên server thất bại, vẫn xóa token ở client để đảm bảo trạng thái
      localStorage.removeItem(TOKEN_KEY);
      localStorage.removeItem(USER_INFO_KEY);
      return rejectWithValue(error.response?.data?.message || 'Đăng xuất thất bại trên server.');
    }
  }
);

// Async Thunk cho đăng nhập bằng mạng xã hội
export const loginSocial = createAsyncThunk(
  'auth/loginSocial',
  async ({ provider, token }, { rejectWithValue }) => {
    try {
      const response = await loginSocialApi({ provider, token });
      localStorage.setItem(TOKEN_KEY, response.token);
      localStorage.setItem(USER_INFO_KEY, JSON.stringify(response.user));
      return response;
    } catch (error) {
      return rejectWithValue(error.response?.data?.message || 'Đăng nhập bằng ' + provider + ' thất bại.');
    }
  }
);

// Auth Slice
const authSlice = createSlice({
  name: 'auth',
  initialState,
  reducers: {
    setAuth: (state, action) => {
      const { token, user } = action.payload;
      state.token = token;
      state.user = user;
      state.isAuthenticated = true;
      state.loading = false;
      state.error = null;
      localStorage.setItem(TOKEN_KEY, token);
      localStorage.setItem(USER_INFO_KEY, JSON.stringify(user));
    },
    // Action để xóa trạng thái auth (ví dụ: khi người dùng tự động logout)
    clearAuth: (state) => {
      state.token = null;
      state.user = null;
      state.isAuthenticated = false;
      state.loading = false;
      state.error = null;
      localStorage.removeItem(TOKEN_KEY);
      localStorage.removeItem(USER_INFO_KEY);
    },
    // Action để thiết lập lỗi từ bên ngoài
    setAuthError: (state, action) => {
      state.error = action.payload;
    },
    // Action để cập nhật thông tin user (ví dụ: sau khi profile được cập nhật)
    // Bạn có thể dispatch action này từ slice profile
    updateUser: (state, action) => {
      state.user = action.payload;
      localStorage.setItem(USER_INFO_KEY, JSON.stringify(action.payload));
    },
    socialLoginSuccess: (state, action) => {
      const { token, role } = action.payload;
      state.isAuthenticated = true;
      state.token = token;
      state.user = { role }; // Lưu role, có thể cần fetch user info đầy đủ sau
      localStorage.setItem(TOKEN_KEY, token);
      localStorage.setItem(USER_INFO_KEY, JSON.stringify({ role }));
    },
  },
  extraReducers: (builder) => {
    builder
      // Xử lý Login
      .addCase(loginUser.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(loginUser.fulfilled, (state, action) => {
        state.loading = false;
        state.isAuthenticated = true;
        state.token = action.payload.token;
        state.user = action.payload.user;
        state.error = null;
      })
      .addCase(loginUser.rejected, (state, action) => {
        state.loading = false;
        state.isAuthenticated = false;
        state.token = null;
        state.user = null;
        state.error = action.payload; // action.payload chứa message lỗi từ rejectWithValue
      })
      // Xử lý Register
      .addCase(registerUser.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(registerUser.fulfilled, (state, action) => {
        state.loading = false;
        state.isAuthenticated = true;
        state.token = action.payload.token;
        state.user = action.payload.user;
        state.error = null;
      })
      .addCase(registerUser.rejected, (state, action) => {
        state.loading = false;
        state.isAuthenticated = false;
        state.token = null;
        state.user = null;
        state.error = action.payload;
      })
      // Xử lý Logout
      .addCase(logoutUser.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(logoutUser.fulfilled, (state) => {
        state.loading = false;
        state.isAuthenticated = false;
        state.token = null;
        state.user = null;
        state.error = null;
      })
      .addCase(logoutUser.rejected, (state, action) => {
        state.loading = false;
        // Dù logout server thất bại, vẫn xóa trạng thái client
        state.isAuthenticated = false;
        state.token = null;
        state.user = null;
        state.error = action.payload;
      })

      // xử lý cho login social trong extraReducers
      .addCase(loginSocial.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(loginSocial.fulfilled, (state, action) => {
        state.loading = false;
        state.isAuthenticated = true;
        state.token = action.payload.token;
        state.user = action.payload.user;
        state.error = null;
      })
      .addCase(loginSocial.rejected, (state, action) => {
        state.loading = false;
        state.isAuthenticated = false;
        state.token = null;
        state.user = null;
        state.error = action.payload;
      });
  },
});

export const { setAuth } = authSlice.actions;
export const { clearAuth, setAuthError, updateUser } = authSlice.actions; // Export actions
export default authSlice.reducer; // Export reducer mặc định