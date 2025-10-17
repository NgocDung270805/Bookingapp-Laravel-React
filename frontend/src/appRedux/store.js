// src/appRedux/store.js

import { configureStore } from '@reduxjs/toolkit';
import authReducer from '../modules/Auth/slice';
import profileReducer from '../modules/profile/slice';
import productsReducer from '../modules/Products/slice';
import bannersReducer from '../modules/Banners/slice';
import categoriesReducer from '../modules/Categories/slice';
import favoritesReducer from './slices/favoritesSlice';
import bookingsReducer from '../modules/bookings/slice';

export const store = configureStore({
    reducer: {
        auth: authReducer,
        profile: profileReducer,
        products: productsReducer,
        banners: bannersReducer,
        categories: categoriesReducer,
        favorites: favoritesReducer,
        bookings: bookingsReducer,
    },
});