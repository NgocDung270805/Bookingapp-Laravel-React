// src/modules/Products/slice.js
import { createSlice, createAsyncThunk, createSelector } from '@reduxjs/toolkit';
import { toast } from 'react-toastify';
import {
  fetchProductsApi,
  fetchProductByIdApi,
  fetchProductBySlugApi,
  createProductApi,
  updateProductApi,
  deleteProductApi,
  toggleFavoriteApi,
  createBookingApi,
  addCommentApi,
  fetchProductCommentsApi,
  getGeminiChatResponse,
  fetchTopViewedProductsApi,
  fetchNewestProductsApi,
} from './api';

// Selector cơ bản
const selectProductsState = (state) => state.products;

const initialState = {
  newestProducts: [],
  topViewedProducts: [],
  products: [],
  selectedProduct: null,
  loading: false,
  error: null,
  commentLoading: false,
  commentError: null,
};

// Async Thunk để lấy 3 sản phẩm có lượt xem cao nhất
export const fetchTopViewedProducts = createAsyncThunk(
  'products/fetchTopViewedProducts',
  async (_, { rejectWithValue }) => {
    try {
      const response = await fetchTopViewedProductsApi();
      return response.products;
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

export const fetchProducts = createAsyncThunk(
  'products/fetchProducts',
  async (query = '', { rejectWithValue }) => {
    try {
      const response = await fetchProductsApi(query);
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

export const fetchProductBySlug = createAsyncThunk(
  'products/fetchProductBySlug',
  async (slug, { rejectWithValue }) => {
    try {
      const response = await fetchProductBySlugApi(slug);
      if (response && response.product) {
        return response.product;
      } else if (response) {
        return response;
      } else {
        return null;
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

export const toggleFavorite = createAsyncThunk(
  'products/toggleFavorite',
  async (productId, { rejectWithValue }) => {
    try {
      const response = await toggleFavoriteApi(productId);
      // Kiểm tra cả status và message
      if (response.status === 200 && response.message) {
        return response;
      }
      return rejectWithValue(response.message || 'Không thể cập nhật yêu thích');
    } catch (error) {
      return rejectWithValue(error.response?.data?.message || 'Có lỗi xảy ra');
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

export const fetchProductComments = createAsyncThunk(
  'products/fetchProductComments',
  async (productId) => {
    const response = await fetchProductCommentsApi(productId);
    return response.comments;
  }
);

export const sendGeminiMessage = createAsyncThunk(
  'chat/sendGeminiMessage',
  async (messageText, { rejectWithValue }) => {
    try {
      const response = await getGeminiChatResponse(messageText);
      return response;
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
      .addCase(fetchNewestProducts.pending, (state) => {
        state.loading = true;
      })
      .addCase(fetchNewestProducts.fulfilled, (state, action) => {
        state.loading = false;
        state.newestProducts = action.payload;
      })
      .addCase(fetchNewestProducts.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
      })
      .addCase(fetchTopViewedProducts.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(fetchTopViewedProducts.fulfilled, (state, action) => {
        state.loading = false;
        state.topViewedProducts = action.payload;
      })
      .addCase(fetchTopViewedProducts.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
      })
      .addCase(fetchProducts.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(fetchProducts.fulfilled, (state, action) => {
        state.loading = false;
        state.products = action.payload;
      })
      .addCase(fetchProducts.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
        state.products = [];
      })
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
      .addCase(createProduct.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(createProduct.fulfilled, (state, action) => {
        state.loading = false;
        state.products.push(action.payload);
        toast.success('Tạo sản phẩm thành công!');
      })
      .addCase(createProduct.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
        toast.error('Tạo sản phẩm thất bại: ' + action.payload);
      })
      .addCase(updateProduct.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(updateProduct.fulfilled, (state, action) => {
        state.loading = false;
        const index = state.products.findIndex((p) => p.id === action.payload.id);
        if (index !== -1) {
          state.products[index] = action.payload;
        }
        if (state.selectedProduct && state.selectedProduct.id === action.payload.id) {
          state.selectedProduct = action.payload;
        }
        toast.success('Cập nhật sản phẩm thành công!');
      })
      .addCase(updateProduct.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
        toast.error('Cập nhật sản phẩm thất bại: ' + action.payload);
      })
      .addCase(deleteProduct.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(deleteProduct.fulfilled, (state, action) => {
        state.loading = false;
        state.products = state.products.filter((p) => p.id !== action.payload);
        toast.success('Xóa sản phẩm thành công!');
      })
      .addCase(deleteProduct.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
        toast.error('Xóa sản phẩm thất bại: ' + action.payload);
      })
      .addCase(toggleFavorite.fulfilled, (state, action) => {
        // Giải nén response từ API
        const { productId, is_favorited } = action.payload;
        
        // Cập nhật trạng thái trong danh sách products
        const productToUpdate = state.products.find((p) => p.id === productId);
        if (productToUpdate) {
          productToUpdate.is_favorited = is_favorited;
        }
        
        // Cập nhật trạng thái trong selectedProduct nếu đang xem chi tiết
        if (state.selectedProduct && state.selectedProduct.id === productId) {
          state.selectedProduct.is_favorited = is_favorited;
        }
      })
      .addCase(createBooking.pending, (state) => {
        state.error = null;
      })
      .addCase(createBooking.fulfilled, (state) => {
        toast.success('Đặt lịch thành công!');
      })
      .addCase(createBooking.rejected, (state, action) => {
        state.error = action.payload;
        toast.error('Đặt lịch thất bại: ' + action.payload);
      })
      .addCase(addComment.pending, (state) => {
        state.error = null;
      })
      .addCase(addComment.fulfilled, (state) => {
        toast.success('Bình luận đã được gửi!');
      })
      .addCase(addComment.rejected, (state, action) => {
        state.error = action.payload;
        toast.error('Bình luận thất bại: ' + action.payload);
      })
      .addCase(sendGeminiMessage.pending, (state) => {
        state.error = null;
      })
      .addCase(sendGeminiMessage.fulfilled, (state) => {
        // Xử lý suggested_products nếu cần
      })
      .addCase(sendGeminiMessage.rejected, (state, action) => {
        state.error = action.payload;
      })
      .addCase(fetchProductComments.pending, (state) => {
        state.commentLoading = true;
        state.commentError = null;
      })
      .addCase(fetchProductComments.fulfilled, (state, action) => {
        state.commentLoading = false;
        if (state.selectedProduct) {
          state.selectedProduct.comments = Array.isArray(action.payload) ? action.payload : [];
        }
      })
      .addCase(fetchProductComments.rejected, (state, action) => {
        state.commentLoading = false;
        state.commentError = action.error.message;
      });
  },
});

// Exports
export const { clearSelectedProduct, setProductsError } = productsSlice.actions;

// Selectors
export const selectSelectedProduct = createSelector(
  [selectProductsState],
  (products) => products.selectedProduct
);

export const selectAllProducts = createSelector(
  [selectProductsState],
  (products) => products?.products?.data || []
);

export const selectTopViewedProducts = createSelector(
  [selectProductsState],
  (products) => products.topViewedProducts
);

export const selectNewestProducts = createSelector(
  [selectProductsState],
  (products) => products.newestProducts
);

export const selectProductsLoading = createSelector(
  [selectProductsState],
  (products) => products.loading
);

export const selectProductsError = createSelector(
  [selectProductsState],
  (products) => products.error
);

export const selectProductComments = createSelector(
  [selectSelectedProduct],
  (product) => product?.comments || []
);

export default productsSlice.reducer;
