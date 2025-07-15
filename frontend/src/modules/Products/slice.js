// src/modules/Products/slice.js

import { createSlice, createAsyncThunk, createSelector } from '@reduxjs/toolkit';
import {
  fetchProductsApi,
  fetchProductByIdApi,
  fetchProductBySlugApi,
  createProductApi,
  updateProductApi,
  deleteProductApi,
  toggleFavoriteApi, // Import mới
  createBookingApi,  // Import mới
  addCommentApi,     // Import mới
  getGeminiChatResponse, // Import mới
  fetchTopViewedProductsApi,
  fetchNewestProductsApi,
} from './api';

const initialState = {
  newestProducts: [],
  topViewedProducts: [],
  products: [],
  selectedProduct: null,
  loading: false,
  error: null,
  // Thêm trạng thái riêng cho các hành động nếu cần quản lý chi tiết
  // Ví dụ: favoritingStatus: 'idle', bookingStatus: 'idle', commentingStatus: 'idle',
};

// Async Thunk để lấy 3 sản phẩm có lượt xem cao nhất
export const fetchTopViewedProducts = createAsyncThunk(
  'products/fetchTopViewedProducts',
  async (_, { rejectWithValue }) => {
    try {
      const response = await fetchTopViewedProductsApi(); // Gọi API
      return response.products; // Giả sử API trả về object có thuộc tính 'products'
    } catch (error) {
      return rejectWithValue(error.response?.data?.message || 'Không thể tải sản phẩm xem nhiều nhất.');
    }
  }
);

export const fetchNewestProducts = createAsyncThunk(
  'products/fetchNewestProducts',
  async (_, { rejectWithValue }) => {
    try {
      const response = await fetchNewestProductsApi();
      return response.products;
    } catch (error) {
      return rejectWithValue(error.response?.data?.message || 'Không thể tải sản phẩm mới nhất.');
    }
  }
);

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

// Async Thunk mới để lấy sản phẩm theo slug
export const fetchProductBySlug = createAsyncThunk(
  'products/fetchProductBySlug',
  async (slug, { rejectWithValue }) => {
    try {
      const response = await fetchProductBySlugApi(slug);

      // --- PHẦN QUAN TRỌNG CẦN KIỂM TRA ---
      // Nếu API của bạn trả về đối tượng sản phẩm trực tiếp (ví dụ: {id: 1, name: "Product"}),
      // thì bạn nên `return response;`.
      // Nếu API của bạn trả về một đối tượng có key 'product' (ví dụ: {product: {id: 1, name: "Product"}}),
      // thì `return response.product;` là đúng.
      if (response && response.product) {
        return response.product; // Giả định API trả về { product: {...} }
      } else if (response) {
        return response; // Giả định API trả về {...} trực tiếp
      } else {
        return null; // Xử lý phản hồi rỗng/không mong đợi
      }

    } catch (error) {
      return rejectWithValue(error.response?.data?.message || 'Không thể tải chi tiết sản phẩm theo slug.');
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
    },
  },
  extraReducers: (builder) => {
    builder
      // Xử lý lấy 4 sản phẩm mới nhất theo created_at
      .addCase(fetchNewestProducts.pending, (state) => {
        state.loading = true;
      })
      .addCase(fetchNewestProducts.fulfilled, (state, action) => {
        state.loading = false;
        state.newestProducts = action.payload; // bạn cần tạo state `newestProducts` trong initialState
      })
      .addCase(fetchNewestProducts.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
      })

      // Xử lý khi fetchTopViewedProducts đang pending
      .addCase(fetchTopViewedProducts.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      // Xử lý khi fetchTopViewedProducts thành công
      .addCase(fetchTopViewedProducts.fulfilled, (state, action) => {
        state.loading = false;
        state.topViewedProducts = action.payload; // Lưu dữ liệu vào topViewedProducts
      })
      // Xử lý khi fetchTopViewedProducts thất bại
      .addCase(fetchTopViewedProducts.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
      })

      // Xử lý fetchProducts
      .addCase(fetchProducts.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(fetchProducts.fulfilled, (state, action) => {
        state.loading = false;
        state.products = action.payload; // Đảm bảo luôn là mảng
      })
      .addCase(fetchProducts.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
        state.products = [];
      })
      // Xử lý fetchProductById
      .addCase(fetchProductById.pending, (state) => {
        state.loading = true;
        state.error = null;
        state.selectedProduct = null;
      })
      .addCase(fetchProductById.fulfilled, (state, action) => {
        state.loading = false;
        state.selectedProduct = action.payload;
      })
      .addCase(fetchProductById.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
        state.selectedProduct = null;
      })
      // Chi tiết sản phẩm
      .addCase(fetchProductBySlug.pending, (state) => {
        state.loading = true;
        state.error = null;
        state.selectedProduct = null;
      })
      .addCase(fetchProductBySlug.fulfilled, (state, action) => {
        state.loading = false;
        state.selectedProduct = action.payload;
      })
      .addCase(fetchProductBySlug.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
        state.selectedProduct = null;
      })
      // Xử lý createProduct
      .addCase(createProduct.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(createProduct.fulfilled, (state, action) => {
        state.loading = false;
        state.products.push(action.payload); // Thêm sản phẩm mới vào danh sách
        alert('Tạo sản phẩm thành công!');
      })
      .addCase(createProduct.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
        alert('Tạo sản phẩm thất bại: ' + JSON.stringify(action.payload));
      })
      // Xử lý updateProduct
      .addCase(updateProduct.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(updateProduct.fulfilled, (state, action) => {
        state.loading = false;
        // Cập nhật sản phẩm trong danh sách
        const index = state.products.findIndex((p) => p.id === action.payload.id);
        if (index !== -1) {
          state.products[index] = action.payload;
        }
        // Nếu sản phẩm đang được chọn, cũng cập nhật nó
        if (state.selectedProduct && state.selectedProduct.id === action.payload.id) {
          state.selectedProduct = action.payload;
        }
        alert('Cập nhật sản phẩm thành công!');
      })
      .addCase(updateProduct.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
        alert('Cập nhật sản phẩm thất bại: ' + JSON.stringify(action.payload));
      })
      // Xử lý deleteProduct
      .addCase(deleteProduct.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(deleteProduct.fulfilled, (state, action) => {
        state.loading = false;
        state.products = state.products.filter((p) => p.id !== action.payload); // Lọc bỏ sản phẩm đã xóa
        alert('Xóa sản phẩm thành công!');
      })
      .addCase(deleteProduct.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
        alert('Xóa sản phẩm thất bại: ' + JSON.stringify(action.payload));
      })
      // Xử lý toggleFavorite
      .addCase(toggleFavorite.fulfilled, (state, action) => {
        // Cập nhật trạng thái yêu thích của sản phẩm trong danh sách
        const { productId, isFavorited } = action.payload;
        const productToUpdate = state.products.find((p) => p.id === productId);
        if (productToUpdate) {
          productToUpdate.is_favorited = isFavorited; // Cập nhật trường is_favorited
        }
        // Cập nhật selectedProduct nếu nó là sản phẩm đang được yêu thích/bỏ yêu thích
        if (state.selectedProduct && state.selectedProduct.id === productId) {
          state.selectedProduct.is_favorited = isFavorited;
        }
      })
      .addCase(createBooking.pending, (state) => {
        // state.bookingStatus = 'loading';
        state.error = null;
      })
      .addCase(createBooking.fulfilled, (state, action) => {
        // state.bookingStatus = 'success';
        alert('Đặt lịch thành công!');
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
export const selectAllProducts = (state) => state.products?.products?.data || [];
export const selectTopViewedProducts = (state) => state.products.topViewedProducts;
export const selectNewestProducts = (state) => state.products.newestProducts;
export const selectProductsLoading = (state) => state.products.loading;
export const selectProductsError = (state) => state.products.error;
export default productsSlice.reducer;
