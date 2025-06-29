// src/App.jsx

import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import { Provider } from 'react-redux'; // Provider để kết nối Redux store
import { store } from './appRedux'; // Import Redux store

// Layouts
import MainLayout from './core/layouts/MainLayout/MainLayout';
import AuthLayout from './core/layouts/AuthLayout/AuthLayout';

// Pages/Containers
import HomePage from './pages/Home/HomePage'; // Ví dụ một trang chủ đơn giản
import ProductsPage from './pages/Products/ProductsPage'; // Ví dụ trang sản phẩm
import LoginPage from './modules/Auth/containers/LoginPage';
import RegisterPage from './modules/Auth/containers/RegisterPage';
import ProfilePage from './modules/profile/containers/ProfilePage';

// HOCs (Higher-Order Components)
import withAuth from './hoc/withAuth.jsx'; // HOC để bảo vệ route

// Constants
import { PATHS } from './common/constants'; // Import các đường dẫn

// Bọc các trang cần bảo vệ bằng HOC `withAuth`
const ProtectedProfilePage = withAuth(ProfilePage);
const ProtectedHomePage = withAuth(HomePage); // Ví dụ nếu muốn trang chủ cũng được bảo vệ

const App = () => {
  return (
    <Provider store={store}> {/* Bọc toàn bộ ứng dụng bằng Redux Provider */}
      <Router> {/* BrowserRouter để kích hoạt định tuyến */}
        <Routes> {/* Chứa tất cả các định nghĩa route */}

          {/* Nhóm các route dùng AuthLayout (login, register) */}
          <Route path={PATHS.LOGIN} element={<AuthLayout />}>
            <Route index element={<LoginPage />} /> {/* Trang login */}
          </Route>
          <Route path={PATHS.REGISTER} element={<AuthLayout />}>
            <Route index element={<RegisterPage />} /> {/* Trang register */}
          </Route>

          {/* Nhóm các route dùng MainLayout (các trang chính của app) */}
          <Route path="/" element={<MainLayout />}>
            {/* Trang chủ (ví dụ không cần bảo vệ nếu bạn muốn) */}
            {/* Nếu HomePage cần bảo vệ, thay thế bằng <Route index element={<ProtectedHomePage />} /> */}
            <Route index element={<HomePage />} /> 
            
            <Route path={PATHS.PRODUCTS} element={<ProductsPage />} /> {/* Trang sản phẩm */}
            
            {/* Route cho trang hồ sơ, được bảo vệ bằng withAuth */}
            <Route path={PATHS.PROFILE} element={<ProtectedProfilePage />} />
            
            {/* Thêm các route khác cần MainLayout ở đây */}
          </Route>

          {/* Route NotFound (tùy chọn) */}
          {/* <Route path="*" element={<div>404 Not Found</div>} /> */}
        </Routes>
      </Router>
    </Provider>
  );
};

export default App;