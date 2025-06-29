// src/core/layouts/MainLayout/MainLayout.jsx

import React from 'react';
import { Outlet } from 'react-router-dom'; // Dùng Outlet để render các route con
import Header from '../components/Header'; // Import Header
import Sidebar from '../components/Sidebar'; // Import Sidebar
// import styles from './MainLayout.module.css'; // Nếu bạn có CSS module riêng

const MainLayout = () => {
  return (
    <div style={{ display: 'flex', flexDirection: 'column', minHeight: '100vh' }}>
      <Header /> {/* Hiển thị Header */}
      <div style={{ display: 'flex', flexGrow: 1 }}>
        <Sidebar /> {/* Hiển thị Sidebar */}
        <main style={{ flexGrow: 1, padding: '20px', backgroundColor: '#fff' }}>
          <Outlet /> {/* Đây là nơi các trang (pages) sẽ được render */}
        </main>
      </div>
      {/* <Footer /> // Nếu bạn có component Footer */}
    </div>
  );
};

export default MainLayout;