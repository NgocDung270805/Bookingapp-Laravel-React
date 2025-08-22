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
            const user = { name: user_name, email: user_email };
            localStorage.setItem(TOKEN_KEY, token);
            localStorage.setItem(USER_INFO_KEY, JSON.stringify(user));
            dispatch(setAuth({ user, token })); // Cập nhật trạng thái Redux
            navigate(PATHS.DASHBOARD);
        } else if (error) {
            console.error('Đăng nhập thất bại:', error);
            navigate(PATHS.LOGIN, { state: { errorMessage: 'Đăng nhập Google thất bại' } });
        } else {
            navigate(PATHS.LOGIN);
        }
    }, [location, navigate, dispatch]);

    return (
        <div>Đang xử lý đăng nhập...</div>
    );
};

export default AuthCallbackPage;