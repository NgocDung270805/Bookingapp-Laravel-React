// src/core/layouts/components/Sidebar.jsx

import React from 'react';
import { Link } from 'react-router-dom';
import { PATHS } from '../../../common/constants'; // Import PATHS

const Sidebar = () => {
  return (
    <aside style={{ width: '200px', padding: '20px', borderRight: '1px solid #e9ecef', backgroundColor: '#f0f2f5' }}>
      <ul style={{ listStyle: 'none', padding: 0 }}>
        <li style={{ marginBottom: '10px' }}>
          <Link to={PATHS.HOME} style={{ textDecoration: 'none', color: '#333', display: 'block', padding: '8px', borderRadius: '4px', backgroundColor: '#e2e6ea' }}>Trang chủ</Link>
        </li>
        <li style={{ marginBottom: '10px' }}>
          <Link to={PATHS.PRODUCTS} style={{ textDecoration: 'none', color: '#333', display: 'block', padding: '8px', borderRadius: '4px' }}>Sản phẩm</Link>
        </li>
        <li style={{ marginBottom: '10px' }}>
          <Link to={PATHS.PROFILE} style={{ textDecoration: 'none', color: '#333', display: 'block', padding: '8px', borderRadius: '4px' }}>Hồ sơ của tôi</Link>
        </li>
        {/* Thêm các link điều hướng khác ở đây */}
      </ul>
    </aside>
  );
};

export default Sidebar;