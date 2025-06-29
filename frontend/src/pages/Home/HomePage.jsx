// src/pages/Home/HomePage.jsx

import React from 'react';
import { useAuth } from '../../hooks/useAuth'; // Lấy thông tin user

const HomePage = () => {
  const { user } = useAuth();

  return (
    <div>
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