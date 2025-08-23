// // src/modules/Auth/containers/LoginPage.jsx

import React, { useState, useEffect } from 'react';
import { useAppDispatch, useAppSelector } from '../../../appRedux';
import { loginUser, loginSocial } from '../slice';
import { Link, useNavigate, useLocation } from 'react-router-dom';
import { PATHS } from '../../../common/constants';
import FacebookLogin from "@greatsumini/react-facebook-login";

const LoginPage = () => {
  const dispatch = useAppDispatch();
  const [errorMessage] = useState('');
  const { loading, error, isAuthenticated, user } = useAppSelector((state) => state.auth); // Thêm 'user'
  const navigate = useNavigate();
  const location = useLocation();

  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  // ✅ Hàm xử lý việc chuyển hướng
  const handleGoogleLogin = () => {
    // Chuyển hướng đến endpoint backend để bắt đầu quá trình OAuth
    window.location.href = `${PATHS.API_BASE_URL}auth/google/redirect`;
  };

  // Sử dụng useEffect để xử lý chuyển hướng sau khi state thay đổi
  useEffect(() => {
    if (isAuthenticated && user) {
      const isAdmin = user.roles?.some((r) => r.name === 'admin');

      // Chuyển hướng một lần khi isAuthenticated là true
      if (isAdmin) {
        navigate(PATHS.DASHBOARD, { replace: true });
      } else {
        navigate(PATHS.HOME, { replace: true });
      }
    }
  }, [isAuthenticated, navigate, user]);

  // Nếu người dùng đã xác thực (và đang trong quá trình chuyển hướng bởi useEffect), không render form login
  if (isAuthenticated) {
    return null;
  }

  const togglePassword = () => {
    const passwordInput = document.getElementById('password');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    const resultAction = await dispatch(loginUser({ email, password, device_name: 'react_app' }));

    if (loginUser.fulfilled.match(resultAction)) {
      const loggedInUser = resultAction.payload.user;
      const isAdmin = loggedInUser.roles && loggedInUser.roles.some(role => role.name === 'admin');

      if (isAdmin) {
        window.location.href = `${PATHS.ADMIN_DASHBOARD}`; // Chuyển hướng cứng đến Laravel Admin
      } else {
        navigate(PATHS.HOME); // Chuyển hướng về trang chủ React
      }
    }
  };

  const handleFacebookResponse = async (response) => {
    if (response.accessToken) {
      await dispatch(loginSocial({ provider: 'facebook', token: response.accessToken }));
    } else {
      console.log('Facebook Login Failed');
    }
  };

  return (
    <>
      <main className="main" id="top" style={{ width: '100%' }}>
        <div className="container-fluid bg-body-tertiary dark__bg-gray-1200">
          <div className="bg-holder bg-auth-card-overlay" style={{ backgroundImage: 'url(../../../assets/img/bg/37.png)' }}>
          </div>
          <div className="row flex-center position-relative min-vh-200 g-0 py-5">
            <div className="col-12 col-lg-10 col-xl-12">
              <div className="card border border-translucent auth-card">
                <div className="card-body pe-md-15">
                  <div className="row align-items-center gap-15">
                    <div
                      className="col-12 col-lg-6 bg-body-highlight dark__bg-gray-1100 rounded-3 position-relative overflow-hidden auth-title-box">
                      <div className="bg-holder" style={{ backgroundImage: 'url(../../../assets/img/bg/38.png)' }}>
                      </div>
                      <div
                        className="position-relative px-4 px-lg-7 pt-7 pb-7 pb-sm-5 text-center text-md-start pb-lg-7 pb-md-7">
                        <h3 className="mb-3 text-body-emphasis fs-7">Đăng Nhập Tài Khoản</h3>
                        <p className="text-body-tertiary">Hãy đăng nhập để trải nghiệm dịch vụ của chúng tôi chọn vẹn và an toàn!</p>
                        <ul className="list-unstyled mb-0 w-max-content w-md-auto">
                          <li className="d-flex align-items-center"><span
                            className="uil uil-check-circle text-success me-2"></span><span
                              className="text-body-tertiary fw-semibold">Nhanh chóng</span></li>
                          <li className="d-flex align-items-center"><span
                            className="uil uil-check-circle text-success me-2"></span><span
                              className="text-body-tertiary fw-semibold">Đơn giản</span></li>
                          <li className="d-flex align-items-center"><span
                            className="uil uil-check-circle text-success me-2"></span><span
                              className="text-body-tertiary fw-semibold">Phản hồi nhanh</span></li>
                        </ul>
                      </div>
                      <div className="position-relative z-n1 mb-6 d-none d-md-block text-center mt-md-15">
                        <img className="auth-title-box-img d-dark-none"
                          src="../../../assets/img/spot-illustrations/auth.png" alt="auth" />
                        <img className="auth-title-box-img d-light-none"
                          src="../../../assets/img/spot-illustrations/auth-dark.png" alt="auth1" />
                      </div>
                    </div>
                    <div className="col mx-auto col-lg-100">
                      <div className="auth-form-box">
                        <div className="text-center mb-7">
                          <Link to={PATHS.HOME} className="d-flex flex-center text-decoration-none mb-4">
                            <div className="d-flex align-items-center fw-bolder fs-3 d-inline-block">
                              <img src="/assets/img/icons/logo.png" style={{ height: "40px", width: "auto", maxWidth: "200px", objectFit: "contain", marginRight: "10px", display: "block" }}
                                alt="Văn Đại Car" width="58" />
                            </div>
                          </Link>
                          <h3 className="text-body-highlight">Đăng Nhập</h3>
                          <p className="text-body-tertiary">Đăng nhập tài khoản của bạn để tiếp tục!</p>
                        </div>
                        <button className="btn btn-phoenix-secondary w-100 mb-3" onClick={handleGoogleLogin}>
                          <span className="fab fa-google text-danger me-2 fs-9"></span>Đăng nhập với Google
                        </button>

                        <FacebookLogin
                          appId="YOUR_FACEBOOK_APP_ID"
                          autoLoad={false}
                          fields="name,email,picture"
                          callback={handleFacebookResponse}
                          render={({ onClick }) => (
                            <button
                              className="btn btn-phoenix-secondary w-100"
                              onClick={onClick}
                              disabled={loading}
                            >
                              <span className="fab fa-facebook text-primary me-2 fs-9"></span>Đăng nhập với Facebook
                            </button>
                          )}
                        />
                        <div className="position-relative">
                          <hr className="bg-body-secondary mt-5 mb-4" />
                          <div className="divider-content-center bg-body-emphasis">hoặc sử dụng email</div>
                        </div>
                        <form onSubmit={handleSubmit}>
                          <div className="mb-3 text-start">
                            <label className="form-label" htmlFor="email">Địa chỉ email</label>
                            <div className="form-icon-container">
                              <input className="form-control form-icon-input" type="email" id="email" value={email} onChange={(e) => setEmail(e.target.value)} required placeholder="name@gmail.com" />
                              <span className="fas fa-user text-body fs-9 form-icon"></span>
                            </div>
                          </div>

                          <div className="mb-3 text-start">
                            <label className="form-label" htmlFor="password">Mật khẩu</label>
                            <div className="form-icon-container position-relative"
                              data-password="data-password">
                              <input className="form-control form-icon-input pe-6" type="password" id="password" value={password} onChange={(e) => setPassword(e.target.value)} required placeholder="Password" data-password-input="data-password-input" />
                              <span className="fas fa-key text-body fs-9 form-icon"></span>
                              <button type="button"
                                className="btn px-3 py-0 h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary"
                                onClick={togglePassword}>
                                <span className="uil uil-eye show"></span>
                              </button>
                            </div>
                          </div>

                          <div className="row flex-between-center mb-7">
                            <div className="col-auto">
                              <div className="form-check mb-0">
                                <input
                                  className="form-check-input"
                                  id="basic-checkbox"
                                  type="checkbox"
                                  checked
                                  onChange={(e) => setRemember(e.target.checked)}
                                />
                                <label className="form-check-label mb-0"
                                  htmlFor="basic-checkbox">Nhớ mật khẩu
                                </label>
                              </div>
                            </div>
                            <div className="col-auto">
                              <a className="fs-9 fw-semibold"
                                href="#">Quên mật khẩu?
                              </a>
                            </div>
                          </div>
                          {error && <p style={{ color: 'red' }}>{error}</p>}
                          <button type="submit" disabled={loading} className="btn btn-primary w-100 mb-3">{loading ? 'Đang đăng nhập...' : 'Đăng Nhập'}</button>
                          <div className="text-center">
                            <Link to={PATHS.REGISTER} className="fs-9 fw-bold">Tạo mới tài khoản</Link>
                          </div>
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
      <div className="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabIndex="-1"
        aria-labelledby="settings-offcanvas">
        <div className="offcanvas-header align-items-start border-bottom flex-column border-translucent">
          <div className="pt-1 w-100 mb-6 d-flex justify-content-between align-items-start">
            <div>
              <h5 className="mb-2 me-2 lh-sm"><span className="fas fa-palette me-2 fs-8"></span>Theme Customizer</h5>
              <p className="mb-0 fs-9">Explore different styles according to your preferences</p>
            </div><button className="btn p-1 fw-bolder" type="button" data-bs-dismiss="offcanvas"
              aria-label="Close"><span className="fas fa-times fs-8"> </span></button>
          </div><button className="btn btn-phoenix-secondary w-100" data-theme-control="reset"><span
            className="fas fa-arrows-rotate me-2 fs-10"></span>Reset to default</button>
        </div>
        <div className="offcanvas-body scrollbar px-card" id="themeController">
          <div className="setting-panel-item mt-0">
            <h5 className="setting-panel-item-title">Color Scheme</h5>
            <div className="row gx-2">
              <div className="col-4"><input className="btn-check" id="themeSwitcherLight" name="theme-color"
                type="radio" value="light" data-theme-control="phoenixTheme" /><label
                  className="btn d-inline-block btn-navbar-style fs-9" htmlFor="themeSwitcherLight"> <span
                    className="mb-2 rounded d-block"><img className="img-fluid img-prototype mb-0"
                      src="../../../assets/img/generic/default-light.png" alt="" /></span><span
                        className="label-text">Light</span></label></div>
              <div className="col-4"><input className="btn-check" id="themeSwitcherDark" name="theme-color"
                type="radio" value="dark" data-theme-control="phoenixTheme" /><label
                  className="btn d-inline-block btn-navbar-style fs-9" htmlFor="themeSwitcherDark"> <span
                    className="mb-2 rounded d-block"><img className="img-fluid img-prototype mb-0"
                      src="../../../assets/img/generic/default-dark.png" alt="" /></span><span
                        className="label-text"> Dark</span></label></div>
              <div className="col-4"><input className="btn-check" id="themeSwitcherAuto" name="theme-color"
                type="radio" value="auto" data-theme-control="phoenixTheme" /><label
                  className="btn d-inline-block btn-navbar-style fs-9" htmlFor="themeSwitcherAuto"> <span
                    className="mb-2 rounded d-block"><img className="img-fluid img-prototype mb-0"
                      src="../../../assets/img/generic/auto.png" alt="" /></span><span
                        className="label-text"> Auto</span></label></div>
            </div>
          </div>
          <div className="border border-translucent rounded-3 p-4 setting-panel-item bg-body-emphasis">
            <div className="d-flex justify-content-between align-items-center">
              <h5 className="setting-panel-item-title mb-1">RTL </h5>
              <div className="form-check form-switch mb-0"><input className="form-check-input ms-auto" type="checkbox"
                data-theme-control="phoenixIsRTL" /></div>
            </div>
            <p className="mb-0 text-body-tertiary">Change text direction</p>
          </div>
          <div className="border border-translucent rounded-3 p-4 setting-panel-item bg-body-emphasis">
            <div className="d-flex justify-content-between align-items-center">
              <h5 className="setting-panel-item-title mb-1">Support Chat </h5>
              <div className="form-check form-switch mb-0"><input className="form-check-input ms-auto" type="checkbox"
                data-theme-control="phoenixSupportChat" /></div>
            </div>
            <p className="mb-0 text-body-tertiary">Toggle support chat</p>
          </div>
          <div className="setting-panel-item">
            <h5 className="setting-panel-item-title">Navigation Type</h5>
            <div className="row gx-2">
              <div className="col-6"><input className="btn-check" id="navbarPositionVertical" name="navigation-type"
                type="radio" value="vertical" data-theme-control="phoenixNavbarPosition"
                disabled="disabled" /><label className="btn d-inline-block btn-navbar-style fs-9"
                  htmlFor="navbarPositionVertical"> <span className="rounded d-block"><img
                    className="img-fluid img-prototype d-dark-none"
                    src="../../../assets/img/generic/default-light.png" alt="" /><img
                      className="img-fluid img-prototype d-light-none"
                      src="../../../assets/img/generic/default-dark.png" alt="" /></span><span
                        className="label-text">Vertical</span></label></div>
              <div className="col-6"><input className="btn-check" id="navbarPositionHorizontal"
                name="navigation-type" type="radio" value="horizontal"
                data-theme-control="phoenixNavbarPosition" disabled="disabled" /><label
                  className="btn d-inline-block btn-navbar-style fs-9" htmlFor="navbarPositionHorizontal"> <span
                    className="rounded d-block"><img className="img-fluid img-prototype d-dark-none"
                      src="../../../assets/img/generic/top-default.png" alt="" /><img
                      className="img-fluid img-prototype d-light-none"
                      src="../../../assets/img/generic/top-default-dark.png"
                      alt="" /></span><span className="label-text"> Horizontal</span></label></div>
              <div className="col-6"><input className="btn-check" id="navbarPositionCombo" name="navigation-type"
                type="radio" value="combo" data-theme-control="phoenixNavbarPosition"
                disabled="disabled" /><label className="btn d-inline-block btn-navbar-style fs-9"
                  htmlFor="navbarPositionCombo"> <span className="rounded d-block"><img
                    className="img-fluid img-prototype d-dark-none"
                    src="../../../assets/img/generic/nav-combo-light.png" alt="" /><img
                      className="img-fluid img-prototype d-light-none"
                      src="../../../assets/img/generic/nav-combo-dark.png" alt="" /></span><span
                        className="label-text"> Combo</span></label></div>
              <div className="col-6"><input className="btn-check" id="navbarPositionTopDouble" name="navigation-type"
                type="radio" value="dual-nav" data-theme-control="phoenixNavbarPosition"
                disabled="disabled" /><label className="btn d-inline-block btn-navbar-style fs-9"
                  htmlFor="navbarPositionTopDouble"> <span className="rounded d-block"><img
                    className="img-fluid img-prototype d-dark-none"
                    src="../../../assets/img/generic/dual-light.png" alt="" /><img
                      className="img-fluid img-prototype d-light-none"
                      src="../../../assets/img/generic/dual-dark.png" alt="" /></span><span
                        className="label-text"> Dual nav</span></label></div>
            </div>
            <p className="text-warning-dark font-medium"> <span
              className="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update navigation
              type in this page</p>
          </div>
          <div className="setting-panel-item">
            <h5 className="setting-panel-item-title">Vertical Navbar Appearance</h5>
            <div className="row gx-2">
              <div className="col-6"><input className="btn-check" id="navbar-style-default" type="radio"
                name="config.name" value="default" data-theme-control="phoenixNavbarVerticalStyle"
                disabled="disabled" /><label className="btn d-block w-100 btn-navbar-style fs-9"
                  htmlFor="navbar-style-default"> <img className="img-fluid img-prototype d-dark-none"
                    src="../../../assets/img/generic/default-light.png" alt="" /><img
                    className="img-fluid img-prototype d-light-none"
                    src="../../../assets/img/generic/default-dark.png" alt="" /><span
                      className="label-text d-dark-none"> Default</span><span
                        className="label-text d-light-none">Default</span></label></div>
              <div className="col-6"><input className="btn-check" id="navbar-style-dark" type="radio"
                name="config.name" value="darker" data-theme-control="phoenixNavbarVerticalStyle"
                disabled="disabled" /><label className="btn d-block w-100 btn-navbar-style fs-9"
                  htmlFor="navbar-style-dark"> <img className="img-fluid img-prototype d-dark-none"
                    src="../../../assets/img/generic/vertical-darker.png" alt="" /><img
                    className="img-fluid img-prototype d-light-none"
                    src="../../../assets/img/generic/vertical-lighter.png" alt="" /><span
                      className="label-text d-dark-none"> Darker</span><span
                        className="label-text d-light-none">Lighter</span></label></div>
            </div>
            <p className="text-warning-dark font-medium"> <span
              className="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update vertical
              navbar appearance in this page</p>
          </div>
          <div className="setting-panel-item">
            <h5 className="setting-panel-item-title">Horizontal Navbar Shape</h5>
            <div className="row gx-2">
              <div className="col-6"><input className="btn-check" id="navbarShapeDefault" name="navbar-shape"
                type="radio" value="default" data-theme-control="phoenixNavbarTopShape"
                disabled="disabled" /><label className="btn d-inline-block btn-navbar-style fs-9"
                  htmlFor="navbarShapeDefault"> <span className="mb-2 rounded d-block"><img
                    className="img-fluid img-prototype d-dark-none mb-0"
                    src="../../../assets/img/generic/top-default.png" alt="" /><img
                      className="img-fluid img-prototype d-light-none mb-0"
                      src="../../../assets/img/generic/top-default-dark.png"
                      alt="" /></span><span className="label-text">Default</span></label></div>
              <div className="col-6"><input className="btn-check" id="navbarShapeSlim" name="navbar-shape"
                type="radio" value="slim" data-theme-control="phoenixNavbarTopShape"
                disabled="disabled" /><label className="btn d-inline-block btn-navbar-style fs-9"
                  htmlFor="navbarShapeSlim"> <span className="mb-2 rounded d-block"><img
                    className="img-fluid img-prototype d-dark-none mb-0"
                    src="../../../assets/img/generic/top-slim.png" alt="" /><img
                      className="img-fluid img-prototype d-light-none mb-0"
                      src="../../../assets/img/generic/top-slim-dark.png" alt="" /></span><span
                        className="label-text"> Slim</span></label></div>
            </div>
            <p className="text-warning-dark font-medium"> <span
              className="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update horizontal
              navbar shape in this page</p>
          </div>
          <div className="setting-panel-item">
            <h5 className="setting-panel-item-title">Horizontal Navbar Appearance</h5>
            <div className="row gx-2">
              <div className="col-6"><input className="btn-check" id="navbarTopDefault" name="navbar-top-style"
                type="radio" value="default" data-theme-control="phoenixNavbarTopStyle"
                disabled="disabled" /><label className="btn d-inline-block btn-navbar-style fs-9"
                  htmlFor="navbarTopDefault"> <span className="mb-2 rounded d-block"><img
                    className="img-fluid img-prototype d-dark-none mb-0"
                    src="../../../assets/img/generic/top-default.png" alt="" /><img
                      className="img-fluid img-prototype d-light-none mb-0"
                      src="../../../assets/img/generic/top-style-darker.png"
                      alt="" /></span><span className="label-text">Default</span></label></div>
              <div className="col-6"><input className="btn-check" id="navbarTopDarker" name="navbar-top-style"
                type="radio" value="darker" data-theme-control="phoenixNavbarTopStyle"
                disabled="disabled" /><label className="btn d-inline-block btn-navbar-style fs-9"
                  htmlFor="navbarTopDarker"> <span className="mb-2 rounded d-block"><img
                    className="img-fluid img-prototype d-dark-none mb-0"
                    src="../../../assets/img/generic/navbar-top-style-light.png" alt="" /><img
                      className="img-fluid img-prototype d-light-none mb-0"
                      src="../../../assets/img/generic/top-style-lighter.png"
                      alt="" /></span><span className="label-text d-dark-none">Darker</span><span
                        className="label-text d-light-none">Lighter</span></label></div>
            </div>
            <p className="text-warning-dark font-medium"> <span
              className="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update horizontal
              navbar appearance in this page</p>
          </div><a className="bun btn-primary d-grid mb-3 text-white mt-5 btn btn-primary"
            href="https://themes.getbootstrap.com/product/phoenix-admin-dashboard-webapp-template/"
            target="_blank">Purchase template</a>
        </div>
      </div>
    </>
  );
};

export default LoginPage;