// src/modules/Products/api.js

import api from '../../common/API';

// Lấy danh sách sản phẩm
export const fetchProductsApi = async () => {
  const response = await api.get('/products');
  return response.data;
};

// Lấy chi tiết một sản phẩm theo ID
export const fetchProductByIdApi = async (id) => {
  const response = await api.get(`/products/${id}`);
  return response.data;
};

// Tạo sản phẩm mới
export const createProductApi = async (productData) => {
  const formData = new FormData();
  for (const key in productData) {
    if (Object.prototype.hasOwnProperty.call(productData, key)) {
      const value = productData[key];
      if (value !== null && value !== undefined) {
        if (key === 'img' && value instanceof File) {
          formData.append(key, value);
        } else if (Array.isArray(value)) {
          value.forEach(item => formData.append(`${key}[]`, item));
        } else {
          formData.append(key, value);
        }
      }
    }
  }

  const response = await api.post('/products', formData, {
    headers: {
      'Content-Type': 'multipart/form-data',
    },
  });
  return response.data;
};

// Cập nhật sản phẩm
export const updateProductApi = async (id, productData) => {
  const formData = new FormData();
  for (const key in productData) {
    if (Object.prototype.hasOwnProperty.call(productData, key)) {
      const value = productData[key];
      if (value !== null && value !== undefined) {
        if (key === 'img' && value instanceof File) {
          formData.append(key, value);
        } else if (Array.isArray(value)) {
          value.forEach(item => formData.append(`${key}[]`, item));
        } else {
          formData.append(key, value);
        }
      }
    }
  }
  formData.append('_method', 'POST'); // Laravel thường nhận PUT qua POST khi có FormData

  const response = await api.post(`/products/${id}`, formData, {
    headers: {
      'Content-Type': 'multipart/form-data',
    },
  });
  return response.data;
};

// Xóa sản phẩm
export const deleteProductApi = async (id) => {
  const response = await api.delete(`/products/${id}`);
  return response.data;
};

// ===========================================
// HÀM API MỚI CHO CÁC HÀNH ĐỘNG
// ===========================================

// Yêu thích/Bỏ yêu thích sản phẩm
export const toggleFavoriteApi = async (productId) => {
  const response = await api.post(`/products/${productId}/favorite/toggle`);
  return response.data;
};

// Lấy trạng thái yêu thích của một sản phẩm
export const checkFavoriteStatusApi = async (productId) => {
  const response = await api.get(`/products/${productId}/favorite/status`);
  return response.data;
};

// Đặt lịch
export const createBookingApi = async (productId, bookingData) => {
  const response = await api.post(`/products/${productId}/bookings`, bookingData);
  return response.data;
};

// Thêm bình luận
export const addCommentApi = async (productId, commentData) => {
  const response = await api.post(`/products/${productId}/comments`, commentData);
  return response.data;
};