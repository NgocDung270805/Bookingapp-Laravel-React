// src/modules/Auth/containers/RegisterPage.jsx

import React, { useState } from 'react';
import { useAppDispatch, useAppSelector } from '../../../appRedux';
import { registerUser } from '../slice';
import { useNavigate } from 'react-router-dom';
import { PATHS } from '../../../common/constants';

const RegisterPage = () => {
  const dispatch = useAppDispatch();
  const { loading, error, isAuthenticated } = useAppSelector((state) => state.auth);
  const navigate = useNavigate();

  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [passwordConfirmation, setPasswordConfirmation] = useState('');

  // Nếu người dùng đã đăng nhập, chuyển hướng về trang chủ
  if (isAuthenticated) {
    navigate(PATHS.HOME);
    return null;
  }

  const handleSubmit = async (e) => {
    e.preventDefault();
    const resultAction = await dispatch(
      registerUser({
        name,
        email,
        password,
        password_confirmation: passwordConfirmation, // Đảm bảo khớp với validation backend
      })
    );
    if (registerUser.fulfilled.match(resultAction)) {
      navigate(PATHS.HOME); // Chuyển hướng về trang chủ sau khi đăng ký thành công
    }
  };

  return (
    <div style={{ padding: '20px', maxWidth: '400px', margin: 'auto', border: '1px solid #ccc', borderRadius: '8px' }}>
      <h2>Đăng ký</h2>
      <form onSubmit={handleSubmit}>
        <div>
          <label htmlFor="name">Tên của bạn:</label>
          <input
            type="text"
            id="name"
            value={name}
            onChange={(e) => setName(e.target.value)}
            required
            style={{ width: '100%', padding: '8px', margin: '5px 0' }}
          />
        </div>
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
        <div>
          <label htmlFor="passwordConfirmation">Xác nhận mật khẩu:</label>
          <input
            type="password"
            id="passwordConfirmation"
            value={passwordConfirmation}
            onChange={(e) => setPasswordConfirmation(e.target.value)}
            required
            style={{ width: '100%', padding: '8px', margin: '5px 0' }}
          />
        </div>
        {error && <p style={{ color: 'red' }}>{error}</p>}
        <button type="submit" disabled={loading} style={{ padding: '10px 15px', backgroundColor: '#007bff', color: 'white', border: 'none', borderRadius: '4px', cursor: 'pointer' }}>
          {loading ? 'Đang đăng ký...' : 'Đăng ký'}
        </button>
      </form>
      <p style={{ marginTop: '15px' }}>
        Đã có tài khoản? <a href={PATHS.LOGIN}>Đăng nhập</a>
      </p>
    </div>
  );
};

export default RegisterPage;