import { createSlice, createAsyncThunk } from '@reduxjs/toolkit';
import { createBookingApi } from './api';

export const createBooking = createAsyncThunk(
  'bookings/create',
  async ({ productId, bookingData }, { rejectWithValue }) => {
    try {
      const response = await createBookingApi(productId, bookingData);
      return response;
    } catch (error) {
      return rejectWithValue(error.response?.data);
    }
  }
);

const bookingsSlice = createSlice({
  name: 'bookings',
  initialState: {
    loading: false,
    error: null,
  },
  reducers: {},
  extraReducers: (builder) => {
    builder
      .addCase(createBooking.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(createBooking.fulfilled, (state) => {
        state.loading = false;
      })
      .addCase(createBooking.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload?.message || 'Có lỗi xảy ra';
      });
  },
});

export default bookingsSlice.reducer;