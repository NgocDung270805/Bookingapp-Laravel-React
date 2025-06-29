// src/modules/profile/api.js

import api from '../../common/API'; // Import Axios instance
import { updateUser } from '../Auth/slice'; // Import action từ Auth slice để cập nhật user sau khi update profile

// Hàm lấy thông tin profile người dùng đang đăng nhập
export const fetchProfileApi = async () => {
  const response = await api.get('/user/profile');
  return response.data;
};

// Hàm cập nhật thông tin profile người dùng đang đăng nhập
export const updateProfileApi = async (data) => {
  // Khi gửi file (như avatar), cần dùng FormData
  const formData = new FormData();
  for (const key in data) {
    if (Object.prototype.hasOwnProperty.call(data, key)) {
      const value = data[key];
      if (value !== null && value !== undefined) {
        // Xử lý đặc biệt cho File (ví dụ: avatar)
        if (key === 'avatar' && value instanceof File) {
          formData.append(key, value);
        } else {
          formData.append(key, value);
        }
      }
    }
  }

  // Laravel API của bạn sử dụng POST cho cập nhật profile, nhưng có thể cần _method PUT
  // Nếu backend của bạn đã cấu hình để nhận POST và xử lý PUT bên trong controller,
  // thì không cần append _method. Kiểm tra lại backend.
  // Trong trường hợp này, API backend bạn cung cấp trước đó dùng POST cho update, nên không cần _method.
  // formData.append('_method', 'POST'); // Chỉ dùng nếu backend yêu cầu POST nhưng thực hiện PUT

  const response = await api.post('/user/profile', formData, {
    headers: {
      'Content-Type': 'multipart/form-data', // Rất quan trọng khi gửi FormData
    },
  });
  return response.data;
};