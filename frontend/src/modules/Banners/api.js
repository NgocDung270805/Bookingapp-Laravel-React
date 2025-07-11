// src/modules/Banners/api.js

import api from '../../common/API';

// Lấy danh sách banner, có thể lọc theo type
// Nếu type được truyền, nó sẽ gửi request dạng /banners?type=X
// Nếu không, nó sẽ gửi /banners (lấy tất cả)
export const fetchBannersApi = async (type = null) => {
  const params = {};
  if (type !== null) {
    params.type = type;
  }
  const response = await api.get('/banners', { params });
  return response.data;
};

// Lấy chi tiết một banner theo ID (giữ lại nếu cần hiển thị chi tiết banner)
export const fetchBannerByIdApi = async (id) => {
  const response = await api.get(`/banners/${id}`);
  return response.data;
};

// --- CÁC HÀM CRUD KHÔNG CẦN CHO REACT APP CÔNG KHAI ---
// Nếu bạn có các hàm createBannerApi, updateBannerApi, deleteBannerApi, fetchBannersByTypeApi
// hãy xóa chúng đi khỏi file này.