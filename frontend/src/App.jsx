// src/App.jsx

import React, { useEffect } from 'react';
import { Routes, Route, useLocation } from 'react-router-dom';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

// Layouts
import MainLayout from './core/layouts/MainLayout/MainLayout';
import AuthLayout from './core/layouts/AuthLayout/AuthLayout';

// Pages/Containers
import HomePage from './pages/Home/containers/HomePage.jsx';
import AboutPage from './pages/About/containers/AboutPage.jsx';
import PrivacyPolicy from './pages/PrivacyPolicy/PrivacyPolicy.jsx';
import BookingPolicy from './pages/BookingPolicy/BookingPolicy.jsx';
import FAQPage from './pages/FAQ/FAQPage.jsx';
import ContactPage from './pages/Contact/ContactPage.jsx';
import WarrantyPolicy from './pages/Warranty/WarrantyPolicy.jsx';
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
    const location = useLocation();

    useEffect(() => {
        if (location.state?.message) {
            toast.success(location.state.message);
            window.history.replaceState({}, document.title);
        }
    }, [location]);

    return (
        <div>
            <Routes>
                {/* Routes không cần layout, ví dụ: trang callback */}
                <Route path={PATHS.AUTH_CALLBACK} element={<AuthCallbackPage />} />

                {/* Routes với AuthLayout cho các trang đăng nhập/đăng ký */}
                <Route element={<AuthLayout />}>
                    <Route path={PATHS.LOGIN} element={<LoginPage />} />
                    <Route path={PATHS.REGISTER} element={<RegisterPage />} />
                </Route>

                {/* Routes với MainLayout cho các trang chính và cần bảo vệ */}
                <Route element={<MainLayout />}>
                    <Route path={PATHS.HOME} element={<HomePage />} />
                    <Route path={PATHS.ABOUT} element={<AboutPage />} />
                    <Route path={PATHS.PRIVACY_POLICY} element={<PrivacyPolicy />} />
                    <Route path={PATHS.BOOKING_POLICY} element={<BookingPolicy />} />
                    <Route path={PATHS.FAQ} element={<FAQPage />} />
                    <Route path={PATHS.CONTACT} element={<ContactPage />} />
                    <Route path={PATHS.WARRANTY_POLICY} element={<WarrantyPolicy />} />
                    <Route path={PATHS.PRODUCTS} element={<ProtectedProductsPage />} />
                    <Route path={PATHS.PROFILE} element={<ProtectedProfilePage />} />
                    <Route path={PATHS.PRODUCTS_BY_CATEGORY_SLUG} element={<ProtectedProductsByCategoriesPage />} />
                    <Route path={PATHS.PRODUCT_DETAIL_BY_SLUG} element={<ProtectedProductDetailPage />} />
                </Route>
            </Routes>
            <ToastContainer />
        </div>
    );
};

export default App;