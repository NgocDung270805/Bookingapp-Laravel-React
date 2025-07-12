// src/modules/Categories/api.js

import api from '../../common/API'; // Import instance axios đã cấu hình từ src/common/API.js

// Hàm để fetch tất cả danh mục từ API
export const fetchCategoriesApi = async () => {
  try {
    const response = await api.get('/categories');
    // Backend của bạn trả về { status, message, categories: [...] }
    return response.data; 
  } catch (error) {
    console.error('Lỗi khi fetch danh mục:', error);
    throw error; // Ném lỗi để xử lý ở slice
  }
};