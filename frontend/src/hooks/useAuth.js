// src/hooks/useAuth.js

import { useAppSelector, useAppDispatch } from '../appRedux';
import { logoutUser, clearAuth } from '../modules/Auth/slice';
import { useNavigate } from 'react-router-dom';
import { PATHS } from '../common/constants';

export const useAuth = () => {
  const { isAuthenticated, user, loading, error } = useAppSelector((state) => state.auth);
  const dispatch = useAppDispatch();
  const navigate = useNavigate();

  const logout = () => {
    dispatch(logoutUser());
    // Sau khi logout, chuyển hướng về trang đăng nhập
    navigate(PATHS.LOGIN);
    dispatch(clearAuth()); // Đảm bảo trạng thái Redux cũng được xóa
  };

  return { isAuthenticated, user, loading, error, logout };
};