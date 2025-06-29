// src/core/layouts/components/Header.jsx

import React from 'react';
import { Link } from 'react-router-dom';
import { useAuth } from '../../../hooks/useAuth'; // Sử dụng custom hook useAuth
import { PATHS } from '../../../common/constants'; // Import PATHS

const Header = () => {
  const { isAuthenticated, user, logout } = useAuth(); // Lấy trạng thái auth và hàm logout

  return (
    <header style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', padding: '10px 20px', backgroundColor: '#f8f9fa', borderBottom: '1px solid #e9ecef' }}>
      <div>
        <Link to={PATHS.HOME} style={{ textDecoration: 'none', color: '#007bff', fontWeight: 'bold', fontSize: '24px' }}>
          BookingApp
        </Link>
      </div>
      <nav>
        {isAuthenticated ? ( // Nếu đã đăng nhập
          <>
            <span style={{ marginRight: '15px' }}>Xin chào, {user?.name || 'Bạn'}!</span>
            <Link to={PATHS.PROFILE} style={{ textDecoration: 'none', color: '#007bff', marginRight: '15px' }}>
              Hồ sơ
            </Link>
            <button onClick={logout} style={{ padding: '8px 12px', backgroundColor: '#dc3545', color: 'white', border: 'none', borderRadius: '4px', cursor: 'pointer' }}>
              Đăng xuất
            </button>
          </>
        ) : ( // Nếu chưa đăng nhập
          <>
            <Link to={PATHS.LOGIN} style={{ textDecoration: 'none', color: '#007bff', marginRight: '15px' }}>
              Đăng nhập
            </Link>
            <Link to={PATHS.REGISTER} style={{ textDecoration: 'none', color: '#28a745' }}>
              Đăng ký
            </Link>
          </>
        )}
      </nav>
    </header>
  );
};

export default Header;