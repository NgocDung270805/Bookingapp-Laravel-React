// src/modules/Banners/slice.js

import { createSlice, createAsyncThunk, createSelector } from '@reduxjs/toolkit'; // Import createSelector
import { fetchBannersApi, fetchBannerByIdApi } from './api'; // Chỉ import các hàm API fetch

const initialState = {
  banners: [], // Sẽ lưu tất cả banners đã fetch
  selectedBanner: null,
  loading: false,
  error: null,
};

// Async Thunk để lấy tất cả banners (hoặc lọc theo type nếu được truyền)
export const fetchBanners = createAsyncThunk(
  'banners/fetchBanners',
  async (type = null, { rejectWithValue }) => { // type mặc định là null
    try {
      const response = await fetchBannersApi(type); // Truyền type vào hàm API
      return response.banners;
    } catch (error) {
      return rejectWithValue(error.response?.data?.message || 'Không thể tải danh sách banner.');
    }
  }
);

export const fetchBannerById = createAsyncThunk(
  'banners/fetchBannerById',
  async (id, { rejectWithValue }) => {
    try {
      const response = await fetchBannerByIdApi(id);
      return response.banner;
    } catch (error) {
      return rejectWithValue(error.response?.data?.message || 'Không thể tải chi tiết banner.');
    }
  }
);

const bannersSlice = createSlice({
  name: 'banners',
  initialState,
  reducers: {
    clearSelectedBanner: (state) => {
      state.selectedBanner = null;
    },
    setBannersError: (state, action) => {
      state.error = action.payload;
    }
  },
  extraReducers: (builder) => {
    builder
      .addCase(fetchBanners.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(fetchBanners.fulfilled, (state, action) => {
        state.loading = false;
        state.banners = action.payload; // Lưu tất cả banners vào state.banners
      })
      .addCase(fetchBanners.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
      })
      .addCase(fetchBannerById.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(fetchBannerById.fulfilled, (state, action) => {
        state.loading = false;
        state.selectedBanner = action.payload;
      })
      .addCase(fetchBannerById.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
      });
  },
});

export const { clearSelectedBanner, setBannersError } = bannersSlice.actions;
export default bannersSlice.reducer;

// ===============================================
// REDUX SELECTORS - ĐỂ LỌC DỮ LIỆU TỪ STATE
// ===============================================

// Selector cơ bản để lấy tất cả banners
const selectAllBanners = (state) => state.banners.banners;

// Selector để lấy banners theo type
export const selectBannersByType = (type) => createSelector(
  [selectAllBanners],
  (banners) => banners.filter(banner => banner.type === type)
);

// Selector để lấy banner Logo (type 1)
export const selectLogoBanner = createSelector(
  [selectAllBanners],
  (banners) => banners.find(banner => banner.type === 1) // Lấy banner đầu tiên có type 1
);

// Selector để lấy banner Slider (type 4)
export const selectSliderBanners = createSelector(
  [selectAllBanners],
  (banners) => banners.filter(banner => banner.type === 4) // Lấy tất cả banners có type 4
);

// Selector để lấy banner nền Footer (type 2)
export const selectFooterBackgroundBanner = createSelector(
  [selectAllBanners],
  (banners) => banners.find(banner => banner.type === 2) // Lấy banner đầu tiên có type 2
);

// Bạn có thể thêm các selectors khác cho các loại banner còn lại (type 3, 5)