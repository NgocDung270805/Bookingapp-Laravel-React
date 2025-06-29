// src/modules/profile/slice.js

import { createSlice, createAsyncThunk } from '@reduxjs/toolkit';
import { fetchProfileApi, updateProfileApi } from './api';
import { updateUser, setAuthError } from '../Auth/slice'; // Import action từ Auth slice

const initialState = {
  profileData: null,
  loading: false,
  error: null,
};

// Async Thunk để lấy profile
export const fetchUserProfile = createAsyncThunk(
  'profile/fetchUserProfile',
  async (_, { rejectWithValue, dispatch }) => {
    try {
      const response = await fetchProfileApi();
      // Sau khi lấy profile, cập nhật thông tin user trong Auth slice
      dispatch(updateUser(response.user));
      return response.user;
    } catch (error) {
      if (error.response && error.response.status === 401) {
        dispatch(setAuthError('Phiên đăng nhập hết hạn. Vui lòng đăng nhập lại.'));
      }
      return rejectWithValue(error.response?.data?.message || 'Không thể tải hồ sơ.');
    }
  }
);

// Async Thunk để cập nhật profile
export const updateUserProfile = createAsyncThunk(
  'profile/updateUserProfile',
  async (userData, { rejectWithValue, dispatch }) => {
    try {
      const response = await updateProfileApi(userData);
      // Sau khi cập nhật profile, cập nhật thông tin user trong Auth slice
      dispatch(updateUser(response.user));
      return response.user;
    } catch (error) {
      if (error.response && error.response.status === 401) {
        dispatch(setAuthError('Phiên đăng nhập hết hạn. Vui lòng đăng nhập lại.'));
      }
      // Trả về cả lỗi validation nếu có (thường là object)
      return rejectWithValue(error.response?.data?.errors || error.response?.data?.message || 'Cập nhật hồ sơ thất bại.');
    }
  }
);


const profileSlice = createSlice({
  name: 'profile',
  initialState,
  reducers: {
    // Action để xóa trạng thái profile (ví dụ: khi logout)
    clearProfile: (state) => {
      state.profileData = null;
      state.loading = false;
      state.error = null;
    },
    // Action để thiết lập profile data (ví dụ: khi user login, có thể sync dữ liệu từ Auth slice sang đây)
    setProfileData: (state, action) => {
      state.profileData = action.payload;
    }
  },
  extraReducers: (builder) => {
    builder
      .addCase(fetchUserProfile.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(fetchUserProfile.fulfilled, (state, action) => {
        state.loading = false;
        state.profileData = action.payload;
      })
      .addCase(fetchUserProfile.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
      })
      .addCase(updateUserProfile.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(updateUserProfile.fulfilled, (state, action) => {
        state.loading = false;
        state.profileData = action.payload;
      })
      .addCase(updateUserProfile.rejected, (state, action) => {
        state.loading = false;
        // Kiểm tra nếu lỗi là một object (từ validation), bạn có thể xử lý hiển thị khác
        state.error = (typeof action.payload === 'object' ? JSON.stringify(action.payload) : action.payload) || 'Cập nhật hồ sơ thất bại.';
      });
  },
});

export const { clearProfile, setProfileData } = profileSlice.actions;
export default profileSlice.reducer;