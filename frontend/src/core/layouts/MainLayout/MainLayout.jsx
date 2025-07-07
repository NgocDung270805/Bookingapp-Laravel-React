// src/core/layouts/MainLayout/MainLayout.jsx

import React from 'react';
import { Outlet } from 'react-router-dom'; // Dùng Outlet để render các route con
import Header from '../components/Header'; // Import Header
import Footer from '../components/Footer'; // Import Footer
import SupportChatWidget from '../components/SupportChatWidget';

const MainLayout = () => {
  return (
    <>
      <Header /> {/* Hiển thị Header */}
      <div style={{ display: 'flex', flexGrow: 1, width: '100%' }}>
        <main style={{ flexGrow: 1, padding: '20px', backgroundColor: '#fff', width: '1900px' }}>
          <Outlet /> {/* Đây là nơi các trang (pages) sẽ được render */}
        </main>
      </div>
      <Footer />
      <SupportChatWidget />
    </>
  );
};

export default MainLayout;