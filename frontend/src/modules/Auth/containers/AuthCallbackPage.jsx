// src/modules/Auth/containers/AuthCallbackPage.jsx

import React, { useEffect } from 'react';
import { useAppDispatch } from '../../../appRedux';
import { setAuth } from '../slice';
import { useNavigate, useLocation } from 'react-router-dom';
import { PATHS, TOKEN_KEY, USER_INFO_KEY } from '../../../common/constants';

const AuthCallbackPage = () => {
    const dispatch = useAppDispatch();
    const navigate = useNavigate();
    const location = useLocation();

    useEffect(() => {
        const queryParams = new URLSearchParams(location.search);
        const token = queryParams.get('token');
        const user_name = queryParams.get('user_name');
        const user_email = queryParams.get('user_email');
        const error = queryParams.get('error');
        const message = queryParams.get('message');

        if (token && user_name && user_email) {
            const user = { name: decodeURIComponent(user_name), email: decodeURIComponent(user_email) };
            dispatch(setAuth({ user, token }));
            // ✅ Truyền thông báo thành công qua state
            navigate(PATHS.HOME, { state: { message: `Xin chào, ${user.name}! Bạn đã đăng nhập thành công.` } });
        } else if (error) {
            // ✅ Xử lý lỗi đặc biệt từ Facebook khi không có email
            if (message === 'no_email_found') {
                console.error('Đăng nhập thành công, nhưng không có email. Yêu cầu người dùng cập nhật.');
                // Chuyển hướng đến trang profile và truyền thông báo qua state
                navigate(PATHS.PROFILE, { state: { message: 'Tài khoản của bạn không có email. Vui lòng thêm email để hoàn thiện hồ sơ.' } });
            } else {
                // Lỗi chung khác
                console.error('Đăng nhập thất bại:', error);
                navigate(PATHS.LOGIN, { state: { message: 'Đăng nhập thất bại. Vui lòng thử lại.' } });
            }
        } else {
            navigate(PATHS.LOGIN);
        }
    }, [location, navigate, dispatch]);

    return (
        <div style={{ padding: '50px', textAlign: 'center' }}>
            <h2>Đang xử lý đăng nhập...</h2>
            <p>Vui lòng đợi trong giây lát.</p>
        </div>
    );
};

export default AuthCallbackPage;