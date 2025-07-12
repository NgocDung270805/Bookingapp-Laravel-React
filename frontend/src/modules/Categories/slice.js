// src/modules/Categories/slice.js

import { createSlice, createAsyncThunk, createSelector } from '@reduxjs/toolkit';
import { fetchCategoriesApi } from './api'; // Import hàm API đã tạo

const initialState = {
  categories: [], // Mảng chứa các đối tượng danh mục
  loading: false, // Trạng thái loading
  error: null,    // Thông báo lỗi nếu có
};

// Async Thunk để fetch danh sách danh mục
export const fetchCategories = createAsyncThunk(
  'categories/fetchCategories',
  async (_, { rejectWithValue }) => {
    try {
      const response = await fetchCategoriesApi();
      return response.categories; // Trả về mảng categories từ response
    } catch (error) {
      return rejectWithValue(error.response?.data?.message || 'Không thể tải danh sách danh mục.');
    }
  }
);

const categoriesSlice = createSlice({
  name: 'categories',
  initialState,
  reducers: {
    // Có thể thêm các reducers đồng bộ khác nếu cần
  },
  extraReducers: (builder) => {
    builder
      // Xử lý khi đang fetch danh mục
      .addCase(fetchCategories.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      // Xử lý khi fetch danh mục thành công
      .addCase(fetchCategories.fulfilled, (state, action) => {
        state.loading = false;
        state.categories = action.payload; // Gán dữ liệu danh mục vào state
      })
      // Xử lý khi fetch danh mục thất bại
      .addCase(fetchCategories.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload; // Lưu thông báo lỗi
        state.categories = []; // Xóa dữ liệu cũ nếu lỗi
      });
  },
});

// Selector để lấy tất cả categories
export const selectAllCategories = (state) => state.categories.categories;

// Selector để lấy trạng thái loading
export const selectCategoriesLoading = (state) => state.categories.loading;

// Selector để lấy lỗi
export const selectCategoriesError = (state) => state.categories.error;

export default categoriesSlice.reducer;