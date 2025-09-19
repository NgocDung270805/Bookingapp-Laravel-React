// src/core/layouts/MainLayout/MainLayout.jsx

// Sau khi sửa
import React from 'react';
import { Outlet } from 'react-router-dom';
import Header from '../components/Header';
import Footer from '../components/Footer';
import SupportChatWidget from '../components/SupportChatWidget';
import './MainLayout.css';

const MainLayout = () => {
  return (
    <div className="layout-wrapper">
      <Header />
      <main className="main-content">
        <Outlet />
      </main>
      <Footer />
      <SupportChatWidget />
    </div>
  );
};

export default MainLayout;