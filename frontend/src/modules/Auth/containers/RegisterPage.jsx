// src/modules/Auth/containers/RegisterPage.jsx

import React, { useState } from 'react';
import { useAppDispatch, useAppSelector } from '../../../appRedux';
import { registerUser } from '../slice';
import { Link, useNavigate } from 'react-router-dom';
import { PATHS } from '../../../common/constants';

const RegisterPage = () => {
  const togglePassword = () => {
    const passwordInput = document.getElementById('password');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
  };
  const togglePasswordConfirmation = () => {
    const passwordInput = document.getElementById('passwordConfirmation');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
  };
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
    // <div style={{ padding: '20px', maxWidth: '400px', margin: 'auto', border: '1px solid #ccc', borderRadius: '8px', color: '#000000'}}>
    //   <h2>Đăng ký</h2>
    //   <form onSubmit={handleSubmit}>
    //     <div>
    //       <label htmlFor="name">Tên của bạn:</label>
    //       <input
    //         type="text"
    //         id="name"
    //         value={name}
    //         onChange={(e) => setName(e.target.value)}
    //         required
    //         style={{ width: '100%', padding: '8px', margin: '5px 0' }}
    //       />
    //     </div>
    //     <div>
    //       <label htmlFor="email">Email:</label>
    //       <input type="email" id="email" value={email} onChange={(e) => setEmail(e.target.value)} required style={{ width: '100%', padding: '8px', margin: '5px 0' }} />
    //     </div>
    //         style={{ width: '100%', padding: '8px', margin: '5px 0' }}
    //       />
    //     </div>
    //     <div>
    //       <label htmlFor="password">Mật khẩu:</label>
    //       <input type="password" id="password" value={password} onChange={(e) => setPassword(e.target.value)} required style={{ width: '100%', padding: '8px', margin: '5px 0' }} />
    //     </div>
    //         style={{ width: '100%', padding: '8px', margin: '5px 0' }}
    //       />
    //     </div>
    //     <div>
    //       <label htmlFor="passwordConfirmation">Xác nhận mật khẩu:</label>
    //       <input
    //         type="password"
    //         id="passwordConfirmation"
    //         value={passwordConfirmation}
    //         onChange={(e) => setPasswordConfirmation(e.target.value)}
    //         required
    //         style={{ width: '100%', padding: '8px', margin: '5px 0' }}
    //       />
    //     </div>
    //     {error && <p style={{ color: 'red' }}>{error}</p>}
    //     <button type="submit" disabled={loading} style={{ padding: '10px 15px', backgroundColor: '#007bff', color: 'white', border: 'none', borderRadius: '4px', cursor: 'pointer' }}>
    //       {loading ? 'Đang đăng ký...' : 'Đăng ký'}
    //     </button>
    //   </form>
    //   <p style={{ marginTop: '15px' }}>
    //     Đã có tài khoản? <a href={PATHS.LOGIN}>Đăng nhập</a>
    //   </p>
    // </div>
    <>
      <main class="main" id="top" style={{ width: '1900px', height: '100vh' }}>
        <div class="container-fluid bg-body-tertiary dark__bg-gray-1200">
          <div class="bg-holder bg-auth-card-overlay" style={{ backgroundImage: 'url(../../../assets/img/bg/37.png)' }}></div>
          <div class="row flex-center position-relative min-vh-100 g-0 py-5">
            <div class="col-11 col-sm-10 col-xl-8">
              <div class="card border border-translucent auth-card">
                <div class="card-body pe-md-0">
                  <div class="row align-items-center gx-0 gy-7">
                    <div class="col-auto bg-body-highlight dark__bg-gray-1100 rounded-3 position-relative overflow-hidden auth-title-box">
                      <div class="bg-holder" style={{ backgroundImage: 'url(../../../assets/img/bg/38.png)' }}></div>
                      <div class="position-relative px-4 px-lg-7 pt-7 pb-7 pb-sm-5 text-center text-md-start pb-lg-7 card-sign-up">
                        <h3 class="mb-3 text-body-emphasis fs-7">Đăng Ký Vào Hệ Thống</h3>
                        <p class="text-body-tertiary">Hãy đăng nhập để trải nghiệm hệ thống bảo mật
                          nhanh chóng, đơn giản và an toàn!</p>
                        <ul class="list-unstyled mb-0 w-max-content w-md-auto">
                          <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Nhanh chóng</span></li>
                          <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Đơn giản</span></li>
                          <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Phản hồi nhanh</span></li>
                        </ul>
                      </div>
                      <div class="position-relative z-n1 mb-6 d-none d-md-block text-center mt-md-15"><img class="auth-title-box-img d-dark-none" src="../../../assets/img/spot-illustrations/auth.png" alt="" /><img class="auth-title-box-img d-light-none" src="../../../assets/img/spot-illustrations/auth-dark.png" alt="" /></div>
                    </div>
                    <div class="col mx-auto">
                      <div class="auth-form-box">
                        <div class="text-center mb-7">
                          <Link to={PATHS.HOME} className="d-flex flex-center text-decoration-none mb-4">
                            <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block">
                              <img src="../../../assets/img/icons/logo.png" alt="phoenix" width="200" />
                            </div>
                          </Link>
                          <h3 class="text-body-highlight">Đăng Ký</h3>
                          <p class="text-body-tertiary">Tạo tài khoản của bạn hôm nay</p>
                        </div><button class="btn btn-phoenix-secondary w-100 mb-3"><span class="fab fa-google text-danger me-2 fs-9"></span>Đăng ký với google</button><button class="btn btn-phoenix-secondary w-100"><span class="fab fa-facebook text-primary me-2 fs-9"></span>Đăng ký với facebook</button>
                        <div class="position-relative mt-4">
                          <hr class="bg-body-secondary" />
                          <div class="divider-content-center bg-body-emphasis">hoặc sử dụng email</div>
                        </div>
                        <form onSubmit={handleSubmit}>
                          <div class="mb-3 text-start">
                            <label class="form-label" htmlFor="name">Họ và tên<nav></nav></label>
                            <input class="form-control" id="name" type="text" value={name} onChange={(e) => setName(e.target.value)} placeholder="Vui lòng nhập họ và tên" required />
                          </div>
                          <div class="mb-3 text-start">
                            <label class="form-label" htmlFor="email">Email</label>
                            <input class="form-control" id="email" type="email" value={email} onChange={(e) => setEmail(e.target.value)} placeholder="name@gmail.com" required />
                          </div>
                          <div class="row g-3 mb-3">
                            <div class="col-sm-6"><label class="form-label" for="password">Mật khẩu</label>
                              <div class="position-relative" data-password="data-password">
                                <input class="form-control form-icon-input pe-6" id="password" type="password" value={password} onChange={(e) => setPassword(e.target.value)} placeholder="Password" data-password-input="data-password-input" required />
                                <button class="btn px-3 py-0 h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary" type="button" data-password-toggle="data-password-toggle" onClick={togglePassword}>
                                  <span class="uil uil-eye show"></span>
                                  <span class="uil uil-eye-slash hide"></span>
                                </button>
                              </div>
                            </div>
                            <div class="col-sm-6"><label class="form-label" for="confirmPassword">Xác nhận mật khẩu</label>
                              <div class="position-relative" data-password="data-password">
                                <input class="form-control form-icon-input pe-6" id="passwordConfirmation" type="password" value={passwordConfirmation}
                                  onChange={(e) => setPasswordConfirmation(e.target.value)} placeholder="Confirm Password" data-password-input="data-password-input" required />
                                <button class="btn px-3 py-0 h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary" type="button" onClick={togglePasswordConfirmation} data-password-toggle="data-password-toggle"><span class="uil uil-eye show"></span><span class="uil uil-eye-slash hide"></span></button></div>
                            </div>
                          </div>
                          {error && <p style={{ color: 'red' }}>{error}</p>}
                          <div class="form-check mb-3"><input class="form-check-input" id="termsService" type="checkbox" /><label class="form-label fs-9 text-transform-none" for="termsService">Tôi chấp nhận
                            <a href="#!">các điều khoản</a> và <a href="#!">chính sách bảo mật</a></label></div>
                          <button class="btn btn-primary w-100 mb-3" type="submit" disabled={loading}>
                            {loading ? 'Đang đăng ký...' : 'Đăng ký'}
                          </button>
                          <div class="text-center">
                            <Link to={PATHS.LOGIN} className="fs-9 fw-bold">Đăng nhập vào tài khoản hiện có</Link>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="support-chat-container">
          <div class="container-fluid support-chat">
            <div class="card bg-body-emphasis">
              <div class="card-header d-flex flex-between-center px-4 py-3 border-bottom border-translucent">
                <h5 class="mb-0 d-flex align-items-center gap-2">Demo widget<span class="fa-solid fa-circle text-success fs-11"></span></h5>
                <div class="btn-reveal-trigger"><button class="btn btn-link p-0 dropdown-toggle dropdown-caret-none transition-none d-flex" type="button" id="support-chat-dropdown" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h text-body"></span></button>
                  <div class="dropdown-menu dropdown-menu-end py-2" aria-labelledby="support-chat-dropdown"><a class="dropdown-item" href="#!">Request a callback</a><a class="dropdown-item" href="#!">Search in chat</a><a class="dropdown-item" href="#!">Show history</a><a class="dropdown-item" href="#!">Report to Admin</a><a class="dropdown-item btn-support-chat" href="#!">Close Support</a></div>
                </div>
              </div>
              <div class="card-body chat p-0">
                <div class="d-flex flex-column-reverse scrollbar h-100 p-3">
                  <div class="text-end mt-6"><a class="mb-2 d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                    <p class="mb-0 fw-semibold fs-9">I need help with something</p><span class="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
                  </a><a class="mb-2 d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                      <p class="mb-0 fw-semibold fs-9">I can’t reorder a product I previously ordered</p><span class="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
                    </a><a class="mb-2 d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                      <p class="mb-0 fw-semibold fs-9">How do I place an order?</p><span class="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
                    </a><a class="false d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                      <p class="mb-0 fw-semibold fs-9">My payment method not working</p><span class="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
                    </a></div>
                  <div class="text-center mt-auto">
                    <div class="avatar avatar-3xl status-online"><img class="rounded-circle border border-3 border-light-subtle" src="../../../assets/img/team/30.webp" alt="" /></div>
                    <h5 class="mt-2 mb-3">Eric</h5>
                    <p class="text-center text-body-emphasis mb-0">Ask us anything – we’ll get back to you here or by email within 24 hours.</p>
                  </div>
                </div>
              </div>
              <div class="card-footer d-flex align-items-center gap-2 border-top border-translucent ps-3 pe-4 py-3">
                <div class="d-flex align-items-center flex-1 gap-3 border border-translucent rounded-pill px-4"><input class="form-control outline-none border-0 flex-1 fs-9 px-0" type="text" placeholder="Write message" /><label class="btn btn-link d-flex p-0 text-body-quaternary fs-9 border-0" for="supportChatPhotos"><span class="fa-solid fa-image"></span></label><input class="d-none" type="file" accept="image/*" id="supportChatPhotos" /><label class="btn btn-link d-flex p-0 text-body-quaternary fs-9 border-0" for="supportChatAttachment"> <span class="fa-solid fa-paperclip"></span></label><input class="d-none" type="file" id="supportChatAttachment" /></div><button class="btn p-0 border-0 send-btn"><span class="fa-solid fa-paper-plane fs-9"></span></button>
              </div>
            </div>
          </div><button class="btn btn-support-chat p-0 border border-translucent"><span class="fs-8 btn-text text-primary text-nowrap">Chat demo</span><span class="ping-icon-wrapper mt-n4 ms-n6 mt-sm-0 ms-sm-2 position-absolute position-sm-relative"><span class="ping-icon-bg"></span><span class="fa-solid fa-circle ping-icon"></span></span><span class="fa-solid fa-headset text-primary fs-8 d-sm-none"></span><span class="fa-solid fa-chevron-down text-primary fs-7"></span></button>
        </div>
      </main >

      <div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1" aria-labelledby="settings-offcanvas">
        <div class="offcanvas-header align-items-start border-bottom flex-column border-translucent">
          <div class="pt-1 w-100 mb-6 d-flex justify-content-between align-items-start">
            <div>
              <h5 class="mb-2 me-2 lh-sm"><span class="fas fa-palette me-2 fs-8"></span>Theme Customizer</h5>
              <p class="mb-0 fs-9">Explore different styles according to your preferences</p>
            </div><button class="btn p-1 fw-bolder" type="button" data-bs-dismiss="offcanvas" aria-label="Close"><span class="fas fa-times fs-8"> </span></button>
          </div><button class="btn btn-phoenix-secondary w-100" data-theme-control="reset"><span class="fas fa-arrows-rotate me-2 fs-10"></span>Reset to default</button>
        </div>
        <div class="offcanvas-body scrollbar px-card" id="themeController">
          <div class="setting-panel-item mt-0">
            <h5 class="setting-panel-item-title">Color Scheme</h5>
            <div class="row gx-2">
              <div class="col-4"><input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio" value="light" data-theme-control="phoenixTheme" /><label class="btn d-inline-block btn-navbar-style fs-9" for="themeSwitcherLight"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="../../../assets/img/generic/default-light.png" alt="" /></span><span class="label-text">Light</span></label></div>
              <div class="col-4"><input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio" value="dark" data-theme-control="phoenixTheme" /><label class="btn d-inline-block btn-navbar-style fs-9" for="themeSwitcherDark"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="../../../assets/img/generic/default-dark.png" alt="" /></span><span class="label-text"> Dark</span></label></div>
              <div class="col-4"><input class="btn-check" id="themeSwitcherAuto" name="theme-color" type="radio" value="auto" data-theme-control="phoenixTheme" /><label class="btn d-inline-block btn-navbar-style fs-9" for="themeSwitcherAuto"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="../../../assets/img/generic/auto.png" alt="" /></span><span class="label-text"> Auto</span></label></div>
            </div>
          </div>
          <div class="border border-translucent rounded-3 p-4 setting-panel-item bg-body-emphasis">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="setting-panel-item-title mb-1">RTL </h5>
              <div class="form-check form-switch mb-0"><input class="form-check-input ms-auto" type="checkbox" data-theme-control="phoenixIsRTL" /></div>
            </div>
            <p class="mb-0 text-body-tertiary">Change text direction</p>
          </div>
          <div class="border border-translucent rounded-3 p-4 setting-panel-item bg-body-emphasis">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="setting-panel-item-title mb-1">Support Chat </h5>
              <div class="form-check form-switch mb-0"><input class="form-check-input ms-auto" type="checkbox" data-theme-control="phoenixSupportChat" /></div>
            </div>
            <p class="mb-0 text-body-tertiary">Toggle support chat</p>
          </div>
          <div class="setting-panel-item">
            <h5 class="setting-panel-item-title">Navigation Type</h5>
            <div class="row gx-2">
              <div class="col-6"><input class="btn-check" id="navbarPositionVertical" name="navigation-type" type="radio" value="vertical" data-theme-control="phoenixNavbarPosition" disabled="disabled" /><label class="btn d-inline-block btn-navbar-style fs-9" for="navbarPositionVertical"> <span class="rounded d-block"><img class="img-fluid img-prototype d-dark-none" src="../../../assets/img/generic/default-light.png" alt="" /><img class="img-fluid img-prototype d-light-none" src="../../../assets/img/generic/default-dark.png" alt="" /></span><span class="label-text">Vertical</span></label></div>
              <div class="col-6"><input class="btn-check" id="navbarPositionHorizontal" name="navigation-type" type="radio" value="horizontal" data-theme-control="phoenixNavbarPosition" disabled="disabled" /><label class="btn d-inline-block btn-navbar-style fs-9" for="navbarPositionHorizontal"> <span class="rounded d-block"><img class="img-fluid img-prototype d-dark-none" src="../../../assets/img/generic/top-default.png" alt="" /><img class="img-fluid img-prototype d-light-none" src="../../../assets/img/generic/top-default-dark.png" alt="" /></span><span class="label-text"> Horizontal</span></label></div>
              <div class="col-6"><input class="btn-check" id="navbarPositionCombo" name="navigation-type" type="radio" value="combo" data-theme-control="phoenixNavbarPosition" disabled="disabled" /><label class="btn d-inline-block btn-navbar-style fs-9" for="navbarPositionCombo"> <span class="rounded d-block"><img class="img-fluid img-prototype d-dark-none" src="../../../assets/img/generic/nav-combo-light.png" alt="" /><img class="img-fluid img-prototype d-light-none" src="../../../assets/img/generic/nav-combo-dark.png" alt="" /></span><span class="label-text"> Combo</span></label></div>
              <div class="col-6"><input class="btn-check" id="navbarPositionTopDouble" name="navigation-type" type="radio" value="dual-nav" data-theme-control="phoenixNavbarPosition" disabled="disabled" /><label class="btn d-inline-block btn-navbar-style fs-9" for="navbarPositionTopDouble"> <span class="rounded d-block"><img class="img-fluid img-prototype d-dark-none" src="../../../assets/img/generic/dual-light.png" alt="" /><img class="img-fluid img-prototype d-light-none" src="../../../assets/img/generic/dual-dark.png" alt="" /></span><span class="label-text"> Dual nav</span></label></div>
            </div>
            <p class="text-warning-dark font-medium"> <span class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update navigation type in this page</p>
          </div>
          <div class="setting-panel-item">
            <h5 class="setting-panel-item-title">Vertical Navbar Appearance</h5>
            <div class="row gx-2">
              <div class="col-6"><input class="btn-check" id="navbar-style-default" type="radio" name="config.name" value="default" data-theme-control="phoenixNavbarVerticalStyle" disabled="disabled" /><label class="btn d-block w-100 btn-navbar-style fs-9" for="navbar-style-default"> <img class="img-fluid img-prototype d-dark-none" src="../../../assets/img/generic/default-light.png" alt="" /><img class="img-fluid img-prototype d-light-none" src="../../../assets/img/generic/default-dark.png" alt="" /><span class="label-text d-dark-none"> Default</span><span class="label-text d-light-none">Default</span></label></div>
              <div class="col-6"><input class="btn-check" id="navbar-style-dark" type="radio" name="config.name" value="darker" data-theme-control="phoenixNavbarVerticalStyle" disabled="disabled" /><label class="btn d-block w-100 btn-navbar-style fs-9" for="navbar-style-dark"> <img class="img-fluid img-prototype d-dark-none" src="../../../assets/img/generic/vertical-darker.png" alt="" /><img class="img-fluid img-prototype d-light-none" src="../../../assets/img/generic/vertical-lighter.png" alt="" /><span class="label-text d-dark-none"> Darker</span><span class="label-text d-light-none">Lighter</span></label></div>
            </div>
            <p class="text-warning-dark font-medium"> <span class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update vertical navbar appearance in this page</p>
          </div>
          <div class="setting-panel-item">
            <h5 class="setting-panel-item-title">Horizontal Navbar Shape</h5>
            <div class="row gx-2">
              <div class="col-6"><input class="btn-check" id="navbarShapeDefault" name="navbar-shape" type="radio" value="default" data-theme-control="phoenixNavbarTopShape" disabled="disabled" /><label class="btn d-inline-block btn-navbar-style fs-9" for="navbarShapeDefault"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="../../../assets/img/generic/top-default.png" alt="" /><img class="img-fluid img-prototype d-light-none mb-0" src="../../../assets/img/generic/top-default-dark.png" alt="" /></span><span class="label-text">Default</span></label></div>
              <div class="col-6"><input class="btn-check" id="navbarShapeSlim" name="navbar-shape" type="radio" value="slim" data-theme-control="phoenixNavbarTopShape" disabled="disabled" /><label class="btn d-inline-block btn-navbar-style fs-9" for="navbarShapeSlim"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="../../../assets/img/generic/top-slim.png" alt="" /><img class="img-fluid img-prototype d-light-none mb-0" src="../../../assets/img/generic/top-slim-dark.png" alt="" /></span><span class="label-text"> Slim</span></label></div>
            </div>
            <p class="text-warning-dark font-medium"> <span class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update horizontal navbar shape in this page</p>
          </div>
          <div class="setting-panel-item">
            <h5 class="setting-panel-item-title">Horizontal Navbar Appearance</h5>
            <div class="row gx-2">
              <div class="col-6"><input class="btn-check" id="navbarTopDefault" name="navbar-top-style" type="radio" value="default" data-theme-control="phoenixNavbarTopStyle" disabled="disabled" /><label class="btn d-inline-block btn-navbar-style fs-9" for="navbarTopDefault"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="../../../assets/img/generic/top-default.png" alt="" /><img class="img-fluid img-prototype d-light-none mb-0" src="../../../assets/img/generic/top-style-darker.png" alt="" /></span><span class="label-text">Default</span></label></div>
              <div class="col-6"><input class="btn-check" id="navbarTopDarker" name="navbar-top-style" type="radio" value="darker" data-theme-control="phoenixNavbarTopStyle" disabled="disabled" /><label class="btn d-inline-block btn-navbar-style fs-9" for="navbarTopDarker"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="../../../assets/img/generic/navbar-top-style-light.png" alt="" /><img class="img-fluid img-prototype d-light-none mb-0" src="../../../assets/img/generic/top-style-lighter.png" alt="" /></span><span class="label-text d-dark-none">Darker</span><span class="label-text d-light-none">Lighter</span></label></div>
            </div>
            <p class="text-warning-dark font-medium"> <span class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update horizontal navbar appearance in this page</p>
          </div><a class="bun btn-primary d-grid mb-3 text-white mt-5 btn btn-primary" href="https://themes.getbootstrap.com/product/phoenix-admin-dashboard-webapp-template/" target="_blank">Purchase template</a>
        </div>
      </div>
      <a class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
        <div class="card-body d-flex align-items-center px-2 py-1">
          <div class="position-relative rounded-start" style={{ height: '34px', width: '28px' }}>
            <div class="settings-popover"><span class="ripple"><span class="fa-spin position-absolute all-0 d-flex flex-center"><span class="icon-spin position-absolute all-0 d-flex flex-center"><svg width="20" height="20" viewBox="0 0 20 20" fill="#ffffff" xmlns="http://www.w3.org/2000/svg"><path d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z" fill="#2A7BE4"></path></svg></span></span></span></div>
          </div><small class="text-uppercase text-body-tertiary fw-bold py-2 pe-2 ps-1 rounded-end">customize</small>
        </div>
      </a>
    </>
  );
};

export default RegisterPage;