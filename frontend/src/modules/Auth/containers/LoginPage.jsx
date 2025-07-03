// // src/modules/Auth/containers/LoginPage.jsx

import React, { useState } from 'react';
import { useAppDispatch, useAppSelector } from '../../../appRedux';
import { loginUser } from '../slice';
import { useNavigate } from 'react-router-dom';
import { PATHS } from '../../../common/constants';

const LoginPage = () => {
  const togglePassword = () => {
    const passwordInput = document.getElementById('password');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
  };
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
    <>
      <main class="main" id="top" style={{ width: '1900px', height: '100vh' }}>
        <div class="container-fluid bg-body-tertiary dark__bg-gray-1200">
          <div class="bg-holder bg-auth-card-overlay" style={{ backgroundImage: 'url(../../../assets/img/bg/37.png)' }}>
          </div>
          <div class="row flex-center position-relative min-vh-100 g-0 py-5">
            <div class="col-11 col-sm-10 col-xl-8">
              <div class="card border border-translucent auth-card">
                <div class="card-body pe-md-0">
                  <div class="row align-items-center gx-0 gy-7">
                    <div
                      class="col-auto bg-body-highlight dark__bg-gray-1100 rounded-3 position-relative overflow-hidden auth-title-box">
                      <div class="bg-holder" style={{ backgroundImage: 'url(../../../assets/img/bg/38.png)' }}>
                      </div>
                      <div
                        class="position-relative px-4 px-lg-7 pt-7 pb-7 pb-sm-5 text-center text-md-start pb-lg-7 pb-md-7">
                        <h3 class="mb-3 text-body-emphasis fs-7">Đăng Nhập Vào Hệ Thống</h3>
                        <p class="text-body-tertiary">Hãy đăng nhập để trải nghiệm hệ thống bảo mật
                          nhanh chóng, đơn giản và an toàn!</p>
                        <ul class="list-unstyled mb-0 w-max-content w-md-auto">
                          <li class="d-flex align-items-center"><span
                            class="uil uil-check-circle text-success me-2"></span><span
                              class="text-body-tertiary fw-semibold">Nhanh chóng</span></li>
                          <li class="d-flex align-items-center"><span
                            class="uil uil-check-circle text-success me-2"></span><span
                              class="text-body-tertiary fw-semibold">Đơn giản</span></li>
                          <li class="d-flex align-items-center"><span
                            class="uil uil-check-circle text-success me-2"></span><span
                              class="text-body-tertiary fw-semibold">Phản hồi nhanh</span></li>
                        </ul>
                      </div>
                      <div class="position-relative z-n1 mb-6 d-none d-md-block text-center mt-md-15">
                        <img class="auth-title-box-img d-dark-none"
                          src="../../../assets/img/spot-illustrations/auth.png" alt="auth" />
                        <img class="auth-title-box-img d-light-none"
                          src="../../../assets/img/spot-illustrations/auth-dark.png" alt="auth1" />
                      </div>
                    </div>
                    <div class="col mx-auto">
                      <div class="auth-form-box">
                        <div class="text-center mb-7"><a
                          class="d-flex flex-center text-decoration-none mb-4"
                          href="../../../index.html">
                          <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block">
                            <img src="https://cdn-icons-png.flaticon.com/512/2206/2206368.png"
                              alt="phoenix" width="58" />
                          </div>
                        </a>
                          <h3 class="text-body-highlight">Sign In</h3>
                          <p class="text-body-tertiary">Nhận quyền truy cập vào tài khoản của bạn</p>
                        </div><button class="btn btn-phoenix-secondary w-100 mb-3"><span
                          class="fab fa-google text-danger me-2 fs-9"></span>Sign in with
                          google</button><button class="btn btn-phoenix-secondary w-100"><span
                            class="fab fa-facebook text-primary me-2 fs-9"></span>Sign in with
                          facebook</button>
                        <div class="position-relative">
                          <hr class="bg-body-secondary mt-5 mb-4" />
                          <div class="divider-content-center bg-body-emphasis">or use email</div>
                        </div>
                        <form onSubmit={handleSubmit}>
                          <div class="mb-3 text-start">
                            <label class="form-label" for="email">Email address</label>
                            <div class="form-icon-container">
                              <input class="form-control form-icon-input" type="email" id="email" value={email} onChange={(e) => setEmail(e.target.value)} required placeholder="name@gmail.com" />
                              {/* <input class="form-control form-icon-input" type="email" id="email" value={email} onChange={(e) => setEmail(e.target.value)} required placeholder="name@gmail.com" /> */}
                              <span class="fas fa-user text-body fs-9 form-icon"></span>
                              {/* @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror */}
                            </div>
                          </div>

                          <div class="mb-3 text-start">
                            <label class="form-label" for="password">Password</label>
                            <div class="form-icon-container position-relative"
                              data-password="data-password">
                              <input class="form-control form-icon-input pe-6" type="password" id="password" value={password} onChange={(e) => setPassword(e.target.value)} required placeholder="Password" data-password-input="data-password-input" />
                              {/* <input class="form-control form-icon-input pe-6" type="password" id="password" value={password} onChange={(e) => setPassword(e.target.value)} required style={{ width: '100%', padding: '8px', margin: '5px 0' }} /> */}
                              <span class="fas fa-key text-body fs-9 form-icon"></span>
                              {/* Nút hiển mật khẩu */}
                              <button type="button"
                                className="btn px-3 py-0 h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary"
                                onClick={togglePassword}>
                                <span className="uil uil-eye show"></span>
                                {/* {{-- < span class="uil uil-eye-slash hide"></> --}} */}
                              </button>

                              {/* {{-- Hiển thị lỗi --}} */}
                              {/* @error('password')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror */}
                            </div>
                          </div>

                          <div class="row flex-between-center mb-7">
                            <div class="col-auto">
                              <div class="form-check mb-0"><input class="form-check-input"
                                id="basic-checkbox" type="checkbox"
                                checked="checked" /><label class="form-check-label mb-0"
                                  for="basic-checkbox">Remember me</label></div>
                            </div>
                            <div class="col-auto">
                              <a class="fs-9 fw-semibold"
                                href="#">Forgot
                                Password?</a>
                            </div>
                          </div>
                          {error && <p style={{ color: 'red' }}>{error}</p>}
                          <button type="submit" disabled={loading} class="btn btn-primary w-100 mb-3">{loading ? 'Đang đăng nhập...' : 'Sign In'}</button>
                          {/* <button type="submit" disabled={loading}>
                            {loading ? 'Đang đăng nhập...' : 'Đăng nhập'}
                          </button> */}
                          {/* {{-- < div class="text-center"><a class="fs-9 fw-bold" href="../../../pages/authentication/card/sign-up.html">Create an account</a></> --}} */}
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div >
        </div >
      </main >
      <div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1"
        aria-labelledby="settings-offcanvas">
        <div class="offcanvas-header align-items-start border-bottom flex-column border-translucent">
          <div class="pt-1 w-100 mb-6 d-flex justify-content-between align-items-start">
            <div>
              <h5 class="mb-2 me-2 lh-sm"><span class="fas fa-palette me-2 fs-8"></span>Theme Customizer</h5>
              <p class="mb-0 fs-9">Explore different styles according to your preferences</p>
            </div><button class="btn p-1 fw-bolder" type="button" data-bs-dismiss="offcanvas"
              aria-label="Close"><span class="fas fa-times fs-8"> </span></button>
          </div><button class="btn btn-phoenix-secondary w-100" data-theme-control="reset"><span
            class="fas fa-arrows-rotate me-2 fs-10"></span>Reset to default</button>
        </div>
        <div class="offcanvas-body scrollbar px-card" id="themeController">
          <div class="setting-panel-item mt-0">
            <h5 class="setting-panel-item-title">Color Scheme</h5>
            <div class="row gx-2">
              <div class="col-4"><input class="btn-check" id="themeSwitcherLight" name="theme-color"
                type="radio" value="light" data-theme-control="phoenixTheme" /><label
                  class="btn d-inline-block btn-navbar-style fs-9" for="themeSwitcherLight"> <span
                    class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0"
                      src="../../../assets/img/generic/default-light.png" alt="" /></span><span
                        class="label-text">Light</span></label></div>
              <div class="col-4"><input class="btn-check" id="themeSwitcherDark" name="theme-color"
                type="radio" value="dark" data-theme-control="phoenixTheme" /><label
                  class="btn d-inline-block btn-navbar-style fs-9" for="themeSwitcherDark"> <span
                    class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0"
                      src="../../../assets/img/generic/default-dark.png" alt="" /></span><span
                        class="label-text"> Dark</span></label></div>
              <div class="col-4"><input class="btn-check" id="themeSwitcherAuto" name="theme-color"
                type="radio" value="auto" data-theme-control="phoenixTheme" /><label
                  class="btn d-inline-block btn-navbar-style fs-9" for="themeSwitcherAuto"> <span
                    class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0"
                      src="../../../assets/img/generic/auto.png" alt="" /></span><span
                        class="label-text"> Auto</span></label></div>
            </div>
          </div>
          <div class="border border-translucent rounded-3 p-4 setting-panel-item bg-body-emphasis">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="setting-panel-item-title mb-1">RTL </h5>
              <div class="form-check form-switch mb-0"><input class="form-check-input ms-auto" type="checkbox"
                data-theme-control="phoenixIsRTL" /></div>
            </div>
            <p class="mb-0 text-body-tertiary">Change text direction</p>
          </div>
          <div class="border border-translucent rounded-3 p-4 setting-panel-item bg-body-emphasis">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="setting-panel-item-title mb-1">Support Chat </h5>
              <div class="form-check form-switch mb-0"><input class="form-check-input ms-auto" type="checkbox"
                data-theme-control="phoenixSupportChat" /></div>
            </div>
            <p class="mb-0 text-body-tertiary">Toggle support chat</p>
          </div>
          <div class="setting-panel-item">
            <h5 class="setting-panel-item-title">Navigation Type</h5>
            <div class="row gx-2">
              <div class="col-6"><input class="btn-check" id="navbarPositionVertical" name="navigation-type"
                type="radio" value="vertical" data-theme-control="phoenixNavbarPosition"
                disabled="disabled" /><label class="btn d-inline-block btn-navbar-style fs-9"
                  for="navbarPositionVertical"> <span class="rounded d-block"><img
                    class="img-fluid img-prototype d-dark-none"
                    src="../../../assets/img/generic/default-light.png" alt="" /><img
                      class="img-fluid img-prototype d-light-none"
                      src="../../../assets/img/generic/default-dark.png" alt="" /></span><span
                        class="label-text">Vertical</span></label></div>
              <div class="col-6"><input class="btn-check" id="navbarPositionHorizontal"
                name="navigation-type" type="radio" value="horizontal"
                data-theme-control="phoenixNavbarPosition" disabled="disabled" /><label
                  class="btn d-inline-block btn-navbar-style fs-9" for="navbarPositionHorizontal"> <span
                    class="rounded d-block"><img class="img-fluid img-prototype d-dark-none"
                      src="../../../assets/img/generic/top-default.png" alt="" /><img
                      class="img-fluid img-prototype d-light-none"
                      src="../../../assets/img/generic/top-default-dark.png"
                      alt="" /></span><span class="label-text"> Horizontal</span></label></div>
              <div class="col-6"><input class="btn-check" id="navbarPositionCombo" name="navigation-type"
                type="radio" value="combo" data-theme-control="phoenixNavbarPosition"
                disabled="disabled" /><label class="btn d-inline-block btn-navbar-style fs-9"
                  for="navbarPositionCombo"> <span class="rounded d-block"><img
                    class="img-fluid img-prototype d-dark-none"
                    src="../../../assets/img/generic/nav-combo-light.png" alt="" /><img
                      class="img-fluid img-prototype d-light-none"
                      src="../../../assets/img/generic/nav-combo-dark.png" alt="" /></span><span
                        class="label-text"> Combo</span></label></div>
              <div class="col-6"><input class="btn-check" id="navbarPositionTopDouble" name="navigation-type"
                type="radio" value="dual-nav" data-theme-control="phoenixNavbarPosition"
                disabled="disabled" /><label class="btn d-inline-block btn-navbar-style fs-9"
                  for="navbarPositionTopDouble"> <span class="rounded d-block"><img
                    class="img-fluid img-prototype d-dark-none"
                    src="../../../assets/img/generic/dual-light.png" alt="" /><img
                      class="img-fluid img-prototype d-light-none"
                      src="../../../assets/img/generic/dual-dark.png" alt="" /></span><span
                        class="label-text"> Dual nav</span></label></div>
            </div>
            <p class="text-warning-dark font-medium"> <span
              class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update navigation
              type in this page</p>
          </div>
          <div class="setting-panel-item">
            <h5 class="setting-panel-item-title">Vertical Navbar Appearance</h5>
            <div class="row gx-2">
              <div class="col-6"><input class="btn-check" id="navbar-style-default" type="radio"
                name="config.name" value="default" data-theme-control="phoenixNavbarVerticalStyle"
                disabled="disabled" /><label class="btn d-block w-100 btn-navbar-style fs-9"
                  for="navbar-style-default"> <img class="img-fluid img-prototype d-dark-none"
                    src="../../../assets/img/generic/default-light.png" alt="" /><img
                    class="img-fluid img-prototype d-light-none"
                    src="../../../assets/img/generic/default-dark.png" alt="" /><span
                      class="label-text d-dark-none"> Default</span><span
                        class="label-text d-light-none">Default</span></label></div>
              <div class="col-6"><input class="btn-check" id="navbar-style-dark" type="radio"
                name="config.name" value="darker" data-theme-control="phoenixNavbarVerticalStyle"
                disabled="disabled" /><label class="btn d-block w-100 btn-navbar-style fs-9"
                  for="navbar-style-dark"> <img class="img-fluid img-prototype d-dark-none"
                    src="../../../assets/img/generic/vertical-darker.png" alt="" /><img
                    class="img-fluid img-prototype d-light-none"
                    src="../../../assets/img/generic/vertical-lighter.png" alt="" /><span
                      class="label-text d-dark-none"> Darker</span><span
                        class="label-text d-light-none">Lighter</span></label></div>
            </div>
            <p class="text-warning-dark font-medium"> <span
              class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update vertical
              navbar appearance in this page</p>
          </div>
          <div class="setting-panel-item">
            <h5 class="setting-panel-item-title">Horizontal Navbar Shape</h5>
            <div class="row gx-2">
              <div class="col-6"><input class="btn-check" id="navbarShapeDefault" name="navbar-shape"
                type="radio" value="default" data-theme-control="phoenixNavbarTopShape"
                disabled="disabled" /><label class="btn d-inline-block btn-navbar-style fs-9"
                  for="navbarShapeDefault"> <span class="mb-2 rounded d-block"><img
                    class="img-fluid img-prototype d-dark-none mb-0"
                    src="../../../assets/img/generic/top-default.png" alt="" /><img
                      class="img-fluid img-prototype d-light-none mb-0"
                      src="../../../assets/img/generic/top-default-dark.png"
                      alt="" /></span><span class="label-text">Default</span></label></div>
              <div class="col-6"><input class="btn-check" id="navbarShapeSlim" name="navbar-shape"
                type="radio" value="slim" data-theme-control="phoenixNavbarTopShape"
                disabled="disabled" /><label class="btn d-inline-block btn-navbar-style fs-9"
                  for="navbarShapeSlim"> <span class="mb-2 rounded d-block"><img
                    class="img-fluid img-prototype d-dark-none mb-0"
                    src="../../../assets/img/generic/top-slim.png" alt="" /><img
                      class="img-fluid img-prototype d-light-none mb-0"
                      src="../../../assets/img/generic/top-slim-dark.png" alt="" /></span><span
                        class="label-text"> Slim</span></label></div>
            </div>
            <p class="text-warning-dark font-medium"> <span
              class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update horizontal
              navbar shape in this page</p>
          </div>
          <div class="setting-panel-item">
            <h5 class="setting-panel-item-title">Horizontal Navbar Appearance</h5>
            <div class="row gx-2">
              <div class="col-6"><input class="btn-check" id="navbarTopDefault" name="navbar-top-style"
                type="radio" value="default" data-theme-control="phoenixNavbarTopStyle"
                disabled="disabled" /><label class="btn d-inline-block btn-navbar-style fs-9"
                  for="navbarTopDefault"> <span class="mb-2 rounded d-block"><img
                    class="img-fluid img-prototype d-dark-none mb-0"
                    src="../../../assets/img/generic/top-default.png" alt="" /><img
                      class="img-fluid img-prototype d-light-none mb-0"
                      src="../../../assets/img/generic/top-style-darker.png"
                      alt="" /></span><span class="label-text">Default</span></label></div>
              <div class="col-6"><input class="btn-check" id="navbarTopDarker" name="navbar-top-style"
                type="radio" value="darker" data-theme-control="phoenixNavbarTopStyle"
                disabled="disabled" /><label class="btn d-inline-block btn-navbar-style fs-9"
                  for="navbarTopDarker"> <span class="mb-2 rounded d-block"><img
                    class="img-fluid img-prototype d-dark-none mb-0"
                    src="../../../assets/img/generic/navbar-top-style-light.png" alt="" /><img
                      class="img-fluid img-prototype d-light-none mb-0"
                      src="../../../assets/img/generic/top-style-lighter.png"
                      alt="" /></span><span class="label-text d-dark-none">Darker</span><span
                        class="label-text d-light-none">Lighter</span></label></div>
            </div>
            <p class="text-warning-dark font-medium"> <span
              class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update horizontal
              navbar appearance in this page</p>
          </div><a class="bun btn-primary d-grid mb-3 text-white mt-5 btn btn-primary"
            href="https://themes.getbootstrap.com/product/phoenix-admin-dashboard-webapp-template/"
            target="_blank">Purchase template</a>
        </div>
      </div>
    </>
  );
};

export default LoginPage;