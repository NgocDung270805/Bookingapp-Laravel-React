// src/modules/Products/api.js

import api from '../../common/API';

// Lấy danh sách sản phẩm
// export const fetchProductsApi = async (query = '') => { // Thêm tham số query
//   const response = await api.get('/products', { params: { q: query } }); // Gửi query param 'q'
//   return response.data;
// };
export const fetchProductsApi = async (param = '') => {
  let url = '/products';
  let params = {};

  if (param) { // Nếu có tham số được truyền vào
    // Kiểm tra xem đây có phải là một category slug không
    // Trong ProductsByCategoriesPage.jsx, bạn đang truyền categorySlug từ useParams().
    // Vì vậy, ở đây, 'param' chính là categorySlug.
    // Chúng ta sẽ xây dựng URL theo dạng: /products/categories/{categorySlug}
    url = `/products/categories/${param}`;
    // Không có params.q trong trường hợp này vì slug đã là một phần của URL.
  }
  // Nếu param rỗng, URL sẽ vẫn là '/products', có thể dùng để lấy tất cả sản phẩm
  // hoặc để tìm kiếm chung nếu sau này bạn muốn thêm query param vào trang products tổng.

  const response = await api.get(url, { params: params }); // params sẽ rỗng nếu là category slug URL
  return response.data;
};

// Lấy 6 sản phẩm có View cao nhất
export const fetchTopViewedProductsApi = async () => {
  const response = await api.get('/products', {
    params: {
      most_viewed: 1
    }
  });
  return response.data; // Giả sử API trả về { products: [...] }
};

// Lấy 4 sản phẩm mới nhất theo created_at
export const fetchNewestProductsApi = async () => {
  const response = await api.get('/products', {
    params: {
      latest: 1
    }
  });
  return response.data;
};

// Lấy chi tiết một sản phẩm theo ID
export const fetchProductByIdApi = async (id) => {
  const response = await api.get(`/products/${id}`);
  return response.data;
};

// Lấy chi tiết một sản phẩm theo Slug (HÀM MỚI)
export const fetchProductBySlugApi = async (slug) => {
  const response = await api.get(`/products/${slug}`); // Giả sử API endpoint là /api/products/slug/{slug}
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

// Đảm bảo hàm này được EXPORT
export const getGeminiChatResponse = async (message) => { // Dòng này phải có 'export'
    const response = await api.post('/chat/gemini', { message });
    return response.data;
};

// API lấy danh sách comments của sản phẩm
export const fetchProductCommentsApi = async (productId) => {
  const response = await api.get(`/products/${productId}/comments`);
  return response.data;
};

// Lấy danh sách các lịch đã đặt của người dùng
export const fetchBookingsApi = async () => {
  const response = await api.get('/bookings');
  return response.data;
};