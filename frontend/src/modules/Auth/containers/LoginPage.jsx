// // src/modules/Auth/containers/LoginPage.jsx

import React, { useState } from 'react';
import { useAppDispatch, useAppSelector } from '../../../appRedux';
import { loginUser } from '../slice';
import { useNavigate } from 'react-router-dom';
import { PATHS } from '../../../common/constants';

const LoginPage = () => {
  const dispatch = useAppDispatch();
  const { loading, error, isAuthenticated, user } = useAppSelector((state) => state.auth); // Thêm 'user'
  const navigate = useNavigate();

  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  // Nếu người dùng đã đăng nhập, chuyển hướng về trang chủ hoặc admin dashboard
  if (isAuthenticated) {
    // Kiểm tra nếu user là admin
    const isAdmin = user && user.roles && user.roles.some(role => role.name === 'admin');

    if (isAdmin) {
      window.location.href = 'BASE_URL'; // Chuyển hướng cứng đến Laravel Admin
    } else {
      navigate(PATHS.HOME); // Chuyển hướng về trang chủ React cho user thường
    }
    return null;
  }

  const handleSubmit = async (e) => {
    e.preventDefault();
    const resultAction = await dispatch(loginUser({ email, password, device_name: 'react_app' }));

    if (loginUser.fulfilled.match(resultAction)) {
      const loggedInUser = resultAction.payload.user;
      const isAdmin = loggedInUser.roles && loggedInUser.roles.some(role => role.name === 'admin');

      if (isAdmin) {
        window.location.href = 'http://localhost:8000/'; // Chuyển hướng cứng đến Laravel Admin
      } else {
        navigate(PATHS.HOME); // Chuyển hướng về trang chủ React
      }
    }
  };

  return (
    <div style={{ padding: '20px', maxWidth: '400px', margin: 'auto', border: '1px solid #ccc', borderRadius: '8px' }}>
      <h2>Đăng nhập</h2>
      <form onSubmit={handleSubmit}>
        <div>
          <label htmlFor="email">Email:</label>
          <input
            type="email"
            id="email"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
            required
            style={{ width: '100%', padding: '8px', margin: '5px 0' }}
          />
        </div>
        <div>
          <label htmlFor="password">Mật khẩu:</label>
          <input
            type="password"
            id="password"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
            required
            style={{ width: '100%', padding: '8px', margin: '5px 0' }}
          />
        </div>
        {error && <p style={{ color: 'red' }}>{error}</p>}
        <button type="submit" disabled={loading} style={{ padding: '10px 15px', backgroundColor: '#007bff', color: 'white', border: 'none', borderRadius: '4px', cursor: 'pointer' }}>
          {loading ? 'Đang đăng nhập...' : 'Đăng nhập'}
        </button>
      </form>
      <p style={{ marginTop: '15px' }}>
        Chưa có tài khoản? <a href={PATHS.REGISTER}>Đăng ký ngay</a>
      </p>
    </div>
  );
};

export default LoginPage;