// src/appRedux/slices/favoritesSlice.js
import { createSlice, createAsyncThunk } from '@reduxjs/toolkit';
import api from '../../common/API';

// Async thunk actions
export const getFavoriteProducts = createAsyncThunk(
    'favorites/getFavoriteProducts',
    async (_, { rejectWithValue }) => {
        try {
            const response = await api.get('/user/favorites');
            return response.data.favorited_products;
        } catch (error) {
            return rejectWithValue(error.response.data);
        }
    }
);

export const toggleFavorite = createAsyncThunk(
    'favorites/toggleFavorite',
    async (productId, { rejectWithValue }) => {
        try {
            const response = await api.post(`/products/${productId}/favorite/toggle`);
            return {
                productId,
                isFavorited: response.data.is_favorited
            };
        } catch (error) {
            return rejectWithValue(error.response.data);
        }
    }
);

export const checkFavoriteStatus = createAsyncThunk(
    'favorites/checkStatus',
    async (productId, { rejectWithValue }) => {
        try {
            const response = await api.get(`/products/${productId}/favorite/status`);
            return {
                productId,
                isFavorited: response.data.is_favorited
            };
        } catch (error) {
            return rejectWithValue(error.response.data);
        }
    }
);

const favoritesSlice = createSlice({
    name: 'favorites',
    initialState: {
        favoriteProducts: [],
        loading: false,
        error: null,
        productFavoriteStatus: {} // Lưu trạng thái yêu thích của từng sản phẩm
    },
    reducers: {
        clearFavorites: (state) => {
            state.favoriteProducts = [];
            state.loading = false;
            state.error = null;
            state.productFavoriteStatus = {};
        }
    },
    extraReducers: (builder) => {
        builder
            // Get favorite products
            .addCase(getFavoriteProducts.pending, (state) => {
                state.loading = true;
                state.error = null;
            })
            .addCase(getFavoriteProducts.fulfilled, (state, action) => {
                state.loading = false;
                state.favoriteProducts = action.payload;
            })
            .addCase(getFavoriteProducts.rejected, (state, action) => {
                state.loading = false;
                state.error = action.payload;
            })
            // Toggle favorite
            .addCase(toggleFavorite.pending, (state) => {
                state.loading = true;
                state.error = null;
            })
            .addCase(toggleFavorite.fulfilled, (state, action) => {
                state.loading = false;
                if (!action.payload.isFavorited) {
                    state.favoriteProducts = state.favoriteProducts.filter(
                        product => product.id !== action.payload.productId
                    );
                } else {
                    // Nếu thêm vào yêu thích, cần gọi lại getFavoriteProducts để lấy thông tin đầy đủ
                    state.favoriteProducts = [...state.favoriteProducts];
                }
            })
            .addCase(toggleFavorite.rejected, (state, action) => {
                state.loading = false;
                state.error = action.payload;
            })
            // Check favorite status
            .addCase(checkFavoriteStatus.fulfilled, (state, action) => {
                const { productId, isFavorited } = action.payload;
                state.productFavoriteStatus[productId] = isFavorited;
            });
    }
});

export const { clearFavorites } = favoritesSlice.actions;
export default favoritesSlice.reducer;