// src/App.jsx

import React from 'react';
import { Routes, Route } from 'react-router-dom';

// Layouts
import MainLayout from './core/layouts/MainLayout/MainLayout';
import AuthLayout from './core/layouts/AuthLayout/AuthLayout';

// Pages/Containers
import HomePage from './pages/Home/containers/HomePage.jsx';
import AboutPage from './pages/About/containers/AboutPage.jsx';
import ProductsPage from './modules/Products/containers/ProductsPage';
import LoginPage from './modules/Auth/containers/LoginPage';
import AuthCallbackPage from './modules/Auth/containers/AuthCallbackPage';
import RegisterPage from './modules/Auth/containers/RegisterPage';
import ProfilePage from './modules/profile/containers/ProfilePage';
import ProductsByCategoriesPage from './modules/Products/containers/ProductsByCategoriesPage';
import ProductDetailPage from './modules/Products/containers/ProductDetailPage.jsx';

// HOCs
import withAuth from './hoc/withAuth.jsx';

// Constants
import { PATHS } from './common/constants';

// Bọc các trang cần bảo vệ bằng HOC `withAuth`
const ProtectedProfilePage = withAuth(ProfilePage);
const ProtectedProductsPage = withAuth(ProductsPage);
const ProtectedProductsByCategoriesPage = withAuth(ProductsByCategoriesPage);
const ProtectedProductDetailPage = withAuth(ProductDetailPage);


const App = () => {
  return (
    // Loại bỏ <Provider> và <Router> ở đây
    <Routes>
      <Route path={PATHS.LOGIN} element={<AuthLayout />}>
        <Route index element={<LoginPage />} />
      </Route>
      <Route path={PATHS.REGISTER} element={<AuthLayout />}>
        <Route index element={<RegisterPage />} />
      </Route>
      <Route path={PATHS.AUTH_CALLBACK} element={<AuthCallbackPage />} />
      <Route path={PATHS.HOME} element={<MainLayout />}>
        <Route index element={<HomePage />} />
        <Route path={PATHS.ABOUT} element={<AboutPage />} />
        <Route
          path={PATHS.PRODUCTS_BY_CATEGORY_SLUG} element={<ProductsByCategoriesPage />}
        />
        <Route path={PATHS.PRODUCT_DETAIL_BY_SLUG} element={<ProductDetailPage />} />
        <Route path={PATHS.PRODUCTS} element={<ProductsPage />} />
        <Route path={PATHS.PROFILE} element={<ProtectedProfilePage />} />
      </Route>
    </Routes>
    // Loại bỏ </Provider> và </Router> ở đây
  );
};

export default App;