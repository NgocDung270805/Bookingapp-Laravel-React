import api from '../../common/API';

export const createBookingApi = async (productId, data) => {
  const response = await api.post(`/products/${productId}/bookings`, data);
  return response.data;
};