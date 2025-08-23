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

        if (token && user_name && user_email) {
            const user = { name: decodeURIComponent(user_name), email: decodeURIComponent(user_email) };
            dispatch(setAuth({ user, token }));
            // ✅ Truyền thông báo thành công qua state
            navigate(PATHS.HOME, { state: { message: `Xin chào, ${user.name}! Bạn đã đăng nhập thành công.` } });
        } else if (error) {
            console.error('Đăng nhập thất bại:', error);
            // ✅ Truyền thông báo lỗi qua state
            navigate(PATHS.LOGIN, { state: { message: 'Đăng nhập Google thất bại.' } });
        } else {
            navigate(PATHS.LOGIN);
        }
    }, [location, navigate, dispatch]);

    return (
        <div>Đang xử lý đăng nhập...</div>
    );
};

export default AuthCallbackPage;