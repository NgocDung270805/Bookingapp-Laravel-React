// src/modules/Products/slice.js

import { createSlice, createAsyncThunk } from '@reduxjs/toolkit';
import {
  fetchProductsApi,
  fetchProductByIdApi,
  createProductApi,
  updateProductApi,
  deleteProductApi,
  toggleFavoriteApi, // Import mới
  createBookingApi,  // Import mới
  addCommentApi,     // Import mới
  getGeminiChatResponse, // Import mới
} from './api';

const initialState = {
  products: [],
  selectedProduct: null,
  loading: false,
  error: null,
  // Thêm trạng thái riêng cho các hành động nếu cần quản lý chi tiết
  // Ví dụ: favoritingStatus: 'idle', bookingStatus: 'idle', commentingStatus: 'idle',
};

// Async Thunks cho Products (đã có)
export const fetchProducts = createAsyncThunk(
  'products/fetchProducts',
  async (query = '', { rejectWithValue }) => { // query mặc định rỗng
    try {
      const response = await fetchProductsApi(query); // Truyền query vào hàm API
      return response.products;
    } catch (error) {
      return rejectWithValue(error.response?.data?.message || 'Không thể tải danh sách sản phẩm.');
    }
  }
);

export const fetchProductById = createAsyncThunk(
  'products/fetchProductById',
  async (id, { rejectWithValue }) => {
    try {
      const response = await fetchProductByIdApi(id);
      return response.product;
    } catch (error) {
      return rejectWithValue(error.response?.data?.message || 'Không thể tải chi tiết sản phẩm.');
    }
  }
);

export const createProduct = createAsyncThunk(
  'products/createProduct',
  async (productData, { rejectWithValue }) => {
    try {
      const response = await createProductApi(productData);
      return response.product;
    } catch (error) {
      return rejectWithValue(error.response?.data?.errors || error.response?.data?.message || 'Tạo sản phẩm thất bại.');
    }
  }
);

export const updateProduct = createAsyncThunk(
  'products/updateProduct',
  async ({ id, productData }, { rejectWithValue }) => {
    try {
      const response = await updateProductApi(id, productData);
      return response.product;
    } catch (error) {
      return rejectWithValue(error.response?.data?.errors || error.response?.data?.message || 'Cập nhật sản phẩm thất bại.');
    }
  }
);

export const deleteProduct = createAsyncThunk(
  'products/deleteProduct',
  async (id, { rejectWithValue }) => {
    try {
      await deleteProductApi(id);
      return id;
    } catch (error) {
      return rejectWithValue(error.response?.data?.message || 'Xóa sản phẩm thất bại.');
    }
  }
);

// ===========================================
// ASYNC THUNKS MỚI CHO CÁC HÀNH ĐỘNG
// ===========================================

export const toggleFavorite = createAsyncThunk(
  'products/toggleFavorite',
  async (productId, { rejectWithValue, dispatch }) => {
    try {
      const response = await toggleFavoriteApi(productId);
      // Sau khi toggle, chúng ta có thể re-fetch lại products để cập nhật trạng thái
      // hoặc cập nhật trạng thái của sản phẩm cụ thể trong Redux store
      dispatch(fetchProducts()); // Re-fetch toàn bộ danh sách để cập nhật trạng thái yêu thích
      return { productId, ...response };
    } catch (error) {
      return rejectWithValue(error.response?.data?.message || 'Không thể cập nhật yêu thích.');
    }
  }
);

export const createBooking = createAsyncThunk(
  'products/createBooking',
  async ({ productId, bookingData }, { rejectWithValue }) => {
    try {
      const response = await createBookingApi(productId, bookingData);
      return response.booking;
    } catch (error) {
      return rejectWithValue(error.response?.data?.errors || error.response?.data?.message || 'Đặt lịch thất bại.');
    }
  }
);

export const addComment = createAsyncThunk(
  'products/addComment',
  async ({ productId, commentData }, { rejectWithValue }) => {
    try {
      const response = await addCommentApi(productId, commentData);
      return response.comment;
    } catch (error) {
      return rejectWithValue(error.response?.data?.errors || error.response?.data?.message || 'Bình luận thất bại.');
    }
  }
);

// ===========================================
// ASYNC THUNKS MỚI CHO GEMINI AI CHAT
// ===========================================

export const sendGeminiMessage = createAsyncThunk(
  'chat/sendGeminiMessage',
  async (messageText, { rejectWithValue }) => {
    try {
      const response = await getGeminiChatResponse(messageText);
      return response; // Trả về { ai_response, suggested_products }
    } catch (error) {
      return rejectWithValue(error.response?.data?.error || 'Lỗi kết nối AI.');
    }
  }
);

const productsSlice = createSlice({
  name: 'products',
  initialState,
  reducers: {
    clearSelectedProduct: (state) => {
      state.selectedProduct = null;
    },
    setProductsError: (state, action) => {
      state.error = action.payload;
    }
  },
  extraReducers: (builder) => {
    builder
      // Fetch Products
      .addCase(fetchProducts.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(fetchProducts.fulfilled, (state, action) => {
        state.loading = false;
        // Đảm bảo trạng thái is_favorited được thêm vào mỗi sản phẩm nếu user đã đăng nhập
        // Hoặc bạn có thể fetch status riêng sau đó gán vào
        // Để đơn giản, giả sử API products trả về is_favorited cho từng sản phẩm nếu user đăng nhập
        state.products = action.payload;
      })
      .addCase(fetchProducts.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
      })
      // ... (Các extraReducers cho fetchProductById, createProduct, updateProduct, deleteProduct)
      // Giữ nguyên như code cũ

      // ===========================================
      // XỬ LÝ EXTRA REDUCERS MỚI CHO CÁC HÀNH ĐỘNG
      // ===========================================
      .addCase(toggleFavorite.pending, (state) => {
        // Có thể thêm trạng thái loading riêng cho favorite nếu muốn
        // state.favoritingStatus = 'loading';
        state.error = null;
      })
      .addCase(toggleFavorite.fulfilled, (state, action) => {
        // state.favoritingStatus = 'idle';
        // Cập nhật trạng thái yêu thích của sản phẩm trong danh sách
        const productIndex = state.products.findIndex(p => p.id === action.payload.productId);
        if (productIndex !== -1) {
          // Cập nhật thuộc tính is_favorited (nếu có trong payload hoặc re-fetch đã xử lý)
          // Nếu bạn re-fetch fetchProducts sau khi toggle, không cần cập nhật ở đây
          // Nếu không re-fetch, bạn cần cập nhật thủ công:
          // state.products[productIndex].is_favorited = action.payload.is_favorited;
        }
      })
      .addCase(toggleFavorite.rejected, (state, action) => {
        // state.favoritingStatus = 'failed';
        state.error = action.payload;
      })
      .addCase(createBooking.pending, (state) => {
        // state.bookingStatus = 'loading';
        state.error = null;
      })
      .addCase(createBooking.fulfilled, (state, action) => {
        // state.bookingStatus = 'success';
        // Có thể thêm booking vào danh sách bookings của user nếu bạn quản lý nó trong Redux
        alert('Đặt lịch thành công! Booking ID: ' + action.payload.id); // Thông báo trực tiếp
      })
      .addCase(createBooking.rejected, (state, action) => {
        // state.bookingStatus = 'failed';
        state.error = action.payload;
        alert('Đặt lịch thất bại: ' + JSON.stringify(action.payload));
      })
      .addCase(addComment.pending, (state) => {
        // state.commentingStatus = 'loading';
        state.error = null;
      })
      .addCase(addComment.fulfilled, (state, action) => {
        // state.commentingStatus = 'success';
        // Có thể thêm comment mới vào danh sách comments của sản phẩm (nếu có)
        alert('Bình luận đã được gửi!');
      })
      .addCase(addComment.rejected, (state, action) => {
        // state.commentingStatus = 'failed';
        state.error = action.payload;
        alert('Bình luận thất bại: ' + JSON.stringify(action.payload));
      })
      // Xử lý sendGeminiMessage
      .addCase(sendGeminiMessage.pending, (state) => {
        // state.chatAILoading = true; // Nếu có state loading riêng
        state.error = null;
      })
      .addCase(sendGeminiMessage.fulfilled, (state, action) => {
        // state.chatAILoading = false;
        // Bạn có thể xử lý suggested_products ở đây nếu muốn lưu vào Redux
        // Hoặc chỉ để SupportChatWidget xử lý.
      })
      .addCase(sendGeminiMessage.rejected, (state, action) => {
        // state.chatAILoading = false;
        state.error = action.payload; // Lỗi từ backend
      });
  },
});

export const { clearSelectedProduct, setProductsError } = productsSlice.actions;
export default productsSlice.reducer;