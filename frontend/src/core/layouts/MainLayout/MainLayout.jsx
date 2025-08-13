// src/core/layouts/MainLayout/MainLayout.jsx

import React from 'react';
import { Outlet } from 'react-router-dom'; // Dùng Outlet để render các route con
import Header from '../components/Header'; // Import Header
import Footer from '../components/Footer'; // Import Footer
import SupportChatWidget from '../components/SupportChatWidget';

const MainLayout = () => {
  return (
    <>
      <main className="main" id="top">
        <Header />
        <div style={{ flexGrow: 1, width: '100%', maxWidth: '100vw' }}>
          <main style={{ flexGrow: 1, padding: '20px', backgroundColor: '#fff' }}>
            <Outlet />{/* Đây là nơi các trang (pages) sẽ được render */}
          </main>
        </div>
        <Footer />
        <SupportChatWidget />
      </main>
    </>
  );
};

export default MainLayout;