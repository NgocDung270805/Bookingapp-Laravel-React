// src/App.jsx

import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import { Provider } from 'react-redux';
import { store } from './appRedux';

// Layouts
import MainLayout from './core/layouts/MainLayout/MainLayout';
import AuthLayout from './core/layouts/AuthLayout/AuthLayout';

// Pages/Containers
import HomePage from './pages/Home/HomePage';
import ProductsPage from './modules/Products/containers/ProductsPage'; // THAY ĐỔI ĐƯỜNG DẪN NÀY
import LoginPage from './modules/Auth/containers/LoginPage';
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
const ProtectedProductsPage = withAuth(ProductsPage); // Bọc ProductsPage nếu bạn muốn nó là trang bảo vệ
const ProtectedProductsByCategoriesPage = withAuth(ProductsByCategoriesPage);
const ProtectedProductDetailPage = withAuth(ProductDetailPage);


const App = () => {
  return (
    <Provider store={store}>
      <Router>
        <Routes>

          <Route path={PATHS.LOGIN} element={<AuthLayout />}>
            <Route index element={<LoginPage />} />
          </Route>
          <Route path={PATHS.REGISTER} element={<AuthLayout />}>
            <Route index element={<RegisterPage />} />
          </Route>

          <Route path="/" element={<MainLayout />}>
            <Route index element={<HomePage />} /> 

            <Route
              path={PATHS.PRODUCTS_BY_CATEGORY_SLUG} element={<ProductsByCategoriesPage />}
            />
            <Route path={PATHS.PRODUCT_DETAIL_BY_SLUG} element={<ProductDetailPage />} />
            
            {/* Nếu ProductsPage cần bảo vệ, dùng ProtectedProductsPage */}
            {/* <Route path={PATHS.PRODUCTS} element={<ProtectedProductsPage />} /> */}
            {/* Nếu ProductsPage không cần bảo vệ, dùng ProductsPage */}
            <Route path={PATHS.PRODUCTS} element={<ProductsPage />} /> 
            
            <Route path={PATHS.PROFILE} element={<ProtectedProfilePage />} />
            
          </Route>

        </Routes>
      </Router>
    </Provider>
  );
};

export default App;