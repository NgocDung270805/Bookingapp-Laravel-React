// src/core/layouts/AuthLayout/AuthLayout.jsx

import React from 'react';
import { Outlet } from 'react-router-dom';

const AuthLayout = () => {
  return (
    <div style={{ display: 'flex', justifyContent: 'center', alignItems: 'center', minHeight: '100vh', backgroundColor: '#f0f2f5' }}>
      <div style={{ backgroundColor: 'white', padding: '40px', borderRadius: '8px', boxShadow: '0 4px 8px rgba(0,0,0,0.1)' }}>
        <Outlet /> {/* Nơi LoginPage hoặc RegisterPage sẽ được render */}
      </div>
    </div>
  );
};

export default AuthLayout;