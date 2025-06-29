// src/modules/Auth/containers/LoginPage.jsx

import React, { useState } from 'react';
import { useAppDispatch, useAppSelector } from '../../../appRedux'; // Dùng hooks tùy chỉnh
import { loginUser } from '../slice'; // Import async thunk loginUser
import { useNavigate } from 'react-router-dom'; // Để chuyển hướng sau khi đăng nhập
import { PATHS } from '../../../common/constants'; // Import đường dẫn

const LoginPage = () => {
  const dispatch = useAppDispatch();
  const { loading, error, isAuthenticated } = useAppSelector((state) => state.auth);
  const navigate = useNavigate();

  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  // Nếu người dùng đã đăng nhập, chuyển hướng về trang chủ
  if (isAuthenticated) {
    navigate(PATHS.HOME);
    return null; // Không render gì khi đang chuyển hướng
  }

  const handleSubmit = async (e) => {
    e.preventDefault(); // Ngăn chặn hành vi mặc định của form
    const resultAction = await dispatch(loginUser({ email, password, device_name: 'react_app' }));

    // Kiểm tra nếu login thành công, chuyển hướng
    if (loginUser.fulfilled.match(resultAction)) {
      navigate(PATHS.HOME);
    }
    // Lỗi sẽ được hiển thị qua `error` state từ Redux
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
        {error && <p style={{ color: 'red' }}>{error}</p>} {/* Hiển thị lỗi từ Redux */}
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