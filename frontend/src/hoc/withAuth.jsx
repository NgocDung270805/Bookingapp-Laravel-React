// src/hoc/withAuth.jsx

import React from 'react';
import { useAuth } from '../hooks/useAuth';
import { Navigate } from 'react-router-dom';
import { PATHS } from '../common/constants';

const withAuth = (WrappedComponent) => {
  const ComponentWithAuth = (props) => {
    const { isAuthenticated, loading } = useAuth();

    if (loading) {
      // Có thể hiển thị một spinner hoặc loading component ở đây
      return <div>Đang kiểm tra xác thực...</div>;
    }

    if (!isAuthenticated) {
      // Nếu chưa xác thực, chuyển hướng về trang đăng nhập
      return <Navigate to={PATHS.LOGIN} replace />;
    }

    return <WrappedComponent {...props} />;
  };

  return ComponentWithAuth;
};

export default withAuth;