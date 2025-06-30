// src/pages/Home/HomePage.jsx

import React, { useEffect } from 'react';
import { useAuth } from '../../hooks/useAuth'; // Lấy thông tin user

const HomePage = () => {
  useEffect(() => {
    // Thay đổi tiêu đề trang khi component này được render
    document.title = 'Home - BookingApp';
  }, []); // [] đảm bảo hiệu ứng chỉ chạy một lần sau khi render đầu tiên
  const { user } = useAuth();

  return (
    <div style={{ padding: '20px', maxWidth: '400px', margin: 'auto', border: '1px solid #ccc', borderRadius: '8px', color: '#000000'}}>
      <h2>Trang chủ</h2>
      {user ? (
        <p>Chào mừng, {user.name}!</p>
      ) : (
        <p>Chào mừng bạn đến với ứng dụng.</p>
      )}
      <p>Đây là nội dung của trang chủ.</p>
    </div>
  );
};

export default HomePage;