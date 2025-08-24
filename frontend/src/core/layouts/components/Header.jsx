// src/core/layouts/components/Header.jsx

import React, { useEffect } from 'react';
import { Link } from 'react-router-dom';
import { useAuth } from '../../../hooks/useAuth';
import { PATHS, BASE_URL_ADMIN } from '../../../common/constants';
// Import các custom hooks của Redux nếu bạn đã tạo (như useAppDispatch, useAppSelector)
import { useDispatch, useSelector } from 'react-redux'; // Hoặc import { useAppDispatch, useAppSelector } from '../../../appRedux';
import { fetchCategories, selectAllCategories, selectCategoriesLoading, selectCategoriesError } from '../../../modules/Categories/slice';
import { fetchBanners, selectLogoBanner } from '../../../modules/Banners/slice';

const Header = () => {
  // --- TẤT CẢ CÁC CUỘC GỌI HOOKS PHẢI NẰM Ở ĐÂY, TRƯỚC BẤT KỲ LOGIC NÀO KHÁC ---
  const { isAuthenticated, user, logout } = useAuth();
  const dispatch = useDispatch(); // Hoặc useAppDispatch()
  const logoBanner = useSelector(selectLogoBanner); // Hook thứ ba
  const bannersLoading = useSelector(state => state.banners.loading); // Hook thứ tư

  // Lấy danh sách banners ở cấp cao nhất của component
  const allBanners = useSelector(state => state.banners.banners); // Đặt Hook này ở đây

  // ===============================================
  // Lấy dữ liệu Categories từ Redux store
  // ===============================================
  const categories = useSelector(selectAllCategories);
  const categoriesLoading = useSelector(selectCategoriesLoading);
  const categoriesError = useSelector(selectCategoriesError);

  // Các useEffect cũng là Hooks, đặt sau các useState/useRef/useSelector/useDispatch
  useEffect(() => {
    // Bây giờ bạn có thể sử dụng allBanners mà không vi phạm quy tắc Hooks
    if (!bannersLoading && allBanners.length === 0) {
      dispatch(fetchBanners());
    }
  }, [dispatch, bannersLoading, allBanners.length]); // Thêm allBanners.length vào dependency array

  useEffect(() => {
    // Khởi tạo Feather Icons
    if (feather) { // Kiểm tra feather có tồn tại không
      feather.replace();
    }
  }, []);

  useEffect(() => {
    // Điều kiện này để tránh fetch lại categories nếu đã có dữ liệu hoặc đang loading
    if (!categoriesLoading && categories.length === 0 && !categoriesError) {
      dispatch(fetchCategories());
    }

  }, [dispatch, categoriesLoading, categories.length, categoriesError]);

  // Kiểm tra nếu user là admin (logic thông thường, sau các Hooks)
  const isAdmin = user && user.roles && user.roles.some(role => role.name === 'admin');


  return (
    <div className="bg-body-emphasis sticky-top" data-navbar-shadow-on-scroll="data-navbar-shadow-on-scroll">
      <nav className="navbar navbar-landing navbar-expand-lg container-medium">
        <Link to={PATHS.HOME} className="navbar-brand flex-1 flex-lg-grow-0 me-lg-8 me-xl-13">
          <div className="d-flex align-items-center">
            <img src="../../assets/img/icons/logo.png" alt="" style={{ height: "40px", width: "auto", maxWidth: "200px", objectFit: "contain", marginRight: "10px", display: "block" }} />
            {/* {bannersLoading ? (
              <span></span> // Hiển thị trạng thái tải
            ) : logoBanner && logoBanner.image_path ? (
              <img src={logoBanner.image_path} alt={logoBanner.title || "Logo BookingApp"} style={{ height: '40px', marginRight: '10px' }} />
            ) : (
              <img src="../../assets/img/icons/logo.png" alt="" style={{ height: '40px', marginRight: '10px' }} />
            )} */}
          </div>
        </Link>
        <div className="col-auto order-md-1">
          <ul className="navbar-nav navbar-nav-icons flex-row me-n2">
            <li className="nav-item d-flex align-items-center">
              <div className="theme-control-toggle fa-icon-wait px-2">
                <input className="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" />
                <label className="mb-0 theme-control-toggle-label theme-control-toggle-light" htmlFor="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme" style={{ height: '32px', width: '32px' }}>
                  <span className="icon" data-feather="moon"></span>
                </label>
                <label className="mb-0 theme-control-toggle-label theme-control-toggle-dark" htmlFor="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme" style={{ height: '32px', width: '32px' }}>
                  <span className="icon" data-feather="sun"></span>
                </label>
              </div>
            </li>
            {/* Phần giỏ hàng */}
            {/* <li className="nav-item">
              <a className="nav-link px-2 icon-indicator icon-indicator-primary" href="../../../apps/e-commerce/landing/cart.html" role="button">
                <span className="text-body-tertiary" data-feather="shopping-cart" style={{ height: '20px', width: '20px' }}></span>
                <span className="icon-indicator-number">3</span>
              </a>
            </li> */}
            <li className="nav-item dropdown">
              <a className="nav-link px-2 icon-indicator icon-indicator-sm icon-indicator-danger" id="navbarTopDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                <span className="text-body-tertiary" data-feather="bell" style={{ height: '20px', width: '20px' }}></span></a>
              <div className="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border navbar-dropdown-caret mt-2" id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                <div className="card position-relative border-0">
                  <div className="card-header p-2">
                    <div className="d-flex justify-content-between">
                      <h5 className="text-body-emphasis mb-0">Notifications</h5><button className="btn btn-link p-0 fs-9 fw-normal" type="button">Mark all as read</button>
                    </div>
                  </div>
                  <div className="card-body p-0">
                    <div className="scrollbar-overlay" style={{ height: '27rem' }}>
                      <div className="px-2 px-sm-3 py-3 notification-card position-relative read border-bottom">
                        <div className="d-flex align-items-center justify-content-between position-relative">
                          <div className="d-flex">
                            <div className="avatar avatar-m status-online me-3"><img className="rounded-circle" src="../../../assets/img/team/40x40/30.webp" alt="" /></div>
                            <div className="flex-1 me-sm-3">
                              <h4 className="fs-9 text-body-emphasis">Jessie Samson</h4>
                              <p className="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span className='me-1 fs-10'>💬</span>Mentioned you in a comment.<span className="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">10m</span></p>
                              <p className="text-body-secondary fs-9 mb-0"><span className="me-1 fas fa-clock"></span><span className="fw-bold">10:41 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div className="dropdown notification-dropdown"><button className="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span className="fas fa-ellipsis-h fs-10 text-body"></span></button>
                            <div className="dropdown-menu py-2"><a className="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div className="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                        <div className="d-flex align-items-center justify-content-between position-relative">
                          <div className="d-flex">
                            <div className="avatar avatar-m status-online me-3">
                              <div className="avatar-name rounded-circle"><span>J</span></div>
                            </div>
                            <div className="flex-1 me-sm-3">
                              <h4 className="fs-9 text-body-emphasis">Jane Foster</h4>
                              <p className="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span className='me-1 fs-10'>📅</span>Created an event.<span className="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">20m</span></p>
                              <p className="text-body-secondary fs-9 mb-0"><span className="me-1 fas fa-clock"></span><span className="fw-bold">10:20 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div className="dropdown notification-dropdown"><button className="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span className="fas fa-ellipsis-h fs-10 text-body"></span></button>
                            <div className="dropdown-menu py-2"><a className="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div className="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                        <div className="d-flex align-items-center justify-content-between position-relative">
                          <div className="d-flex">
                            <div className="avatar avatar-m status-online me-3"><img className="rounded-circle avatar-placeholder" src="../../../assets/img/team/40x40/avatar.webp" alt="" /></div>
                            <div className="flex-1 me-sm-3">
                              <h4 className="fs-9 text-body-emphasis">Jessie Samson</h4>
                              <p className="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span className='me-1 fs-10'>👍</span>Liked your comment.<span className="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">1h</span></p>
                              <p className="text-body-secondary fs-9 mb-0"><span className="me-1 fas fa-clock"></span><span className="fw-bold">9:30 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div className="dropdown notification-dropdown"><button className="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span className="fas fa-ellipsis-h fs-10 text-body"></span></button>
                            <div className="dropdown-menu py-2"><a className="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div className="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                        <div className="d-flex align-items-center justify-content-between position-relative">
                          <div className="d-flex">
                            <div className="avatar avatar-m status-online me-3"><img className="rounded-circle" src="../../../assets/img/team/40x40/57.webp" alt="" /></div>
                            <div className="flex-1 me-sm-3">
                              <h4 className="fs-9 text-body-emphasis">Kiera Anderson</h4>
                              <p className="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span className='me-1 fs-10'>💬</span>Mentioned you in a comment.<span className="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                              <p className="text-body-secondary fs-9 mb-0"><span className="me-1 fas fa-clock"></span><span className="fw-bold">9:11 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div className="dropdown notification-dropdown"><button className="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span className="fas fa-ellipsis-h fs-10 text-body"></span></button>
                            <div className="dropdown-menu py-2"><a className="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div className="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                        <div className="d-flex align-items-center justify-content-between position-relative">
                          <div className="d-flex">
                            <div className="avatar avatar-m status-online me-3"><img className="rounded-circle" src="../../../assets/img/team/40x40/59.webp" alt="" /></div>
                            <div className="flex-1 me-sm-3">
                              <h4 className="fs-9 text-body-emphasis">Herman Carter</h4>
                              <p className="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span className='me-1 fs-10'>👤</span>Tagged you in a comment.<span className="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                              <p className="text-body-secondary fs-9 mb-0"><span className="me-1 fas fa-clock"></span><span className="fw-bold">10:58 PM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div className="dropdown notification-dropdown"><button className="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span className="fas fa-ellipsis-h fs-10 text-body"></span></button>
                            <div className="dropdown-menu py-2"><a className="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div className="px-2 px-sm-3 py-3 notification-card position-relative read ">
                        <div className="d-flex align-items-center justify-content-between position-relative">
                          <div className="d-flex">
                            <div className="avatar avatar-m status-online me-3"><img className="rounded-circle" src="../../../assets/img/team/40x40/58.webp" alt="" /></div>
                            <div className="flex-1 me-sm-3">
                              <h4 className="fs-9 text-body-emphasis">Benjamin Button</h4>
                              <p className="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span className='me-1 fs-10'>👍</span>Liked your comment.<span className="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                              <p className="text-body-secondary fs-9 mb-0"><span className="me-1 fas fa-clock"></span><span className="fw-bold">10:18 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div className="dropdown notification-dropdown"><button className="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span className="fas fa-ellipsis-h fs-10 text-body"></span></button>
                            <div className="dropdown-menu py-2"><a className="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div className="card-footer p-0 border-top border-translucent border-0">
                    <div className="my-2 text-center fw-bold fs-10 text-body-tertiary text-opactity-85"><a className="fw-bolder" href="../../../pages/notifications.html">Notification history</a></div>
                  </div>
                </div>
              </div>
            </li>
            <li className="nav-item dropdown">
              <a className="nav-link px-2" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                <span className="text-body-tertiary" data-feather="user" style={{ width: '20px', height: '20px' }}></span>
              </a>
              <div className="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border mt-2" aria-labelledby="navbarDropdownUser">
                <div className="card position-relative border-0">
                  {isAuthenticated ? (
                    <>
                      <div className="card-body p-0">
                        <div className="text-center pt-4 pb-3">
                          <div className="avatar avatar-xl ">
                            <img className="rounded-circle " src={user.profile?.avatar ? `${BASE_URL_ADMIN}storage/${user.profile.avatar}` : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkgjgrCNlnMAjfAJmzC9Q8OGQKwKQpq3HtUQ&s'} alt="" />
                          </div>
                          <h6 className="mt-2 text-body-emphasis">{user?.name || 'Bạn'}!</h6>
                        </div>
                        <div className="mb-3 mx-3"><input className="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" /></div>
                      </div>
                      <div className="overflow-auto scrollbar" style={{ height: '10rem' }}>
                        <ul className="nav d-flex flex-column mb-2 pb-1">
                          {isAdmin && ( // Chỉ hiển thị link "Quản lý" nếu là admin
                            <li className="nav-item">
                              <a className="nav-link px-3 d-block" href={PATHS.ADMIN_DASHBOARD}>
                                <span className="me-2 text-body align-bottom" data-feather="shield"></span>
                                <span>ADMIN/MANAGER</span>
                              </a>
                            </li>
                          )}
                          <Link to={PATHS.PROFILE} className="nav-link px-3 d-block">
                            <span className="me-2 text-body align-bottom" data-feather="user"></span>
                            <span>Hồ sơ cá nhân</span>
                          </Link>
                          <li className="nav-item"><a className="nav-link px-3 d-block" href="#!"><span className="me-2 text-body align-bottom" data-feather="pie-chart"></span>Dashboard</a></li>
                          <li className="nav-item"><a className="nav-link px-3 d-block" href="#!"> <span className="me-2 text-body align-bottom" data-feather="lock"></span>Posts &amp; Activity</a></li>
                          <li className="nav-item"><a className="nav-link px-3 d-block" href="#!"> <span className="me-2 text-body align-bottom" data-feather="settings"></span>Settings &amp; Privacy </a></li>
                          <li className="nav-item"><a className="nav-link px-3 d-block" href="#!"> <span className="me-2 text-body align-bottom" data-feather="help-circle"></span>Help Center</a></li>
                          <li className="nav-item"><a className="nav-link px-3 d-block" href="#!"> <span className="me-2 text-body align-bottom" data-feather="globe"></span>Language</a></li>
                        </ul>
                      </div>
                      <div className="card-footer p-0 border-top border-translucent">
                        <ul className="nav d-flex flex-column my-3">
                          <li className="nav-item"><a className="nav-link px-3 d-block" href="#!"> <span className="me-2 text-body align-bottom" data-feather="user-plus"></span>Đặt lịch</a></li>
                        </ul>
                        <hr />
                        <div className="px-3">
                          <a className="btn btn-phoenix-secondary d-flex flex-center w-100" onClick={logout}>
                            <span className="me-2" data-feather="log-out"> </span>Sign out
                          </a>
                        </div>
                        <div className="my-2 text-center fw-bold fs-10 text-body-quaternary"><a className="text-body-quaternary me-1" href="#!">Privacy policy</a>&bull;<a className="text-body-quaternary mx-1" href="#!">Terms</a>&bull;<a className="text-body-quaternary ms-1" href="#!">Cookies</a></div>
                      </div>
                    </>
                  ) : (
                    <>
                      <div className="card-footer p-0 border-top border-translucent">
                        <ul className="nav d-flex flex-column my-3">
                          <li className="nav-item">
                            <Link to={PATHS.REGISTER} className="nav-link px-3 d-block">
                              <span className="me-2 text-body align-bottom" data-feather="user-plus"></span>
                              Đăng ký tài khoản
                            </Link>
                          </li>
                        </ul>
                        <hr />
                        <div className="px-3">
                          <Link to={PATHS.LOGIN} className="btn btn-phoenix-secondary d-flex flex-center w-100">
                            <span className="me-2" data-feather="log-in"> </span>Đăng nhập
                          </Link>
                        </div>
                        <div className="my-2 text-center fw-bold fs-10 text-body-quaternary"><a className="text-body-quaternary me-1" href="#!">Chính sách bảo mật</a>&bull;<a className="text-body-quaternary mx-1" href="#!">Điều khoản</a>&bull;<a className="text-body-quaternary ms-1" href="#!">Cookies</a></div>
                      </div>
                    </>
                  )}
                </div>
              </div>
            </li>
          </ul>
        </div>
        <button className="navbar-toggler fs-8 ps-1 ps-sm-3 pe-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span className="navbar-toggler-icon"></span>
        </button>
        <div className="collapse navbar-collapse navbar-top-collapse order-1 order-lg-0 justify-content-center pb-0" id="navbarTopCollapse">
          <ul className="navbar-nav travel-nav-top me-auto" data-dropdown-on-hover="data-dropdown-on-hover">
            <li className="nav-item dropdown">
              <a className="nav-link fs-8 fw-bold dropdown-toggle text-primary" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">Thương hiệu</a>
              <ul className="dropdown-menu navbar-dropdown-caret">
                {!categoriesLoading && categories.length > 0 ? (categories.map((category) => (
                  <li key={category.id}>
                    <Link to={`${PATHS.PRODUCTS_BY_CATEGORY_SLUG}${category.slug}`} className="dropdown-item">
                      {category.name}
                    </Link>
                  </li>
                ))) : (
                  !categoriesLoading && !categoriesError && <div className="swiper-slide w-sm-auto"><p>Không có danh mục nào để hiển thị.</p></div>
                )}
              </ul>
            </li>
            <li className="nav-item dropdown"><a className="nav-link fs-8 fw-bold dropdown-toggle " href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">Xe</a>
              <ul className="dropdown-menu navbar-dropdown-caret">
                <li>
                  {/* <a className="dropdown-item" href={PATHS.PRODUCTS}>Danh sách xe</a> */}
                  <Link to={PATHS.PRODUCTS} className="dropdown-item">Danh sách xe</Link>
                </li>
                {/* <li><a className="dropdown-item" href="../../../../apps/travel-agency/flight/booking.html">Booking</a></li> */}
                {/* <li><a className="dropdown-item" href="../../../../apps/travel-agency/flight/payment.html">Payment</a></li> */}
              </ul>
            </li>
            <li className="nav-item dropdown">
              <a className="nav-link fs-8 fw-bold dropdown-toggle " href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">Thông tin / Chính sách</a>
              <ul className="dropdown-menu navbar-dropdown-caret">
                <li><Link to={PATHS.ABOUT} className="dropdown-item">Giới thiệu</Link></li>
                <li><Link to={PATHS.PRIVACY_POLICY} className="dropdown-item">Chính Sách Bảo Mật</Link></li>
                <li><Link to={PATHS.BOOKING_POLICY} className="dropdown-item">Chính Sách Đặt Lịch</Link></li>
                <li><Link to={PATHS.FAQ} className="dropdown-item">Câu Hỏi Thường Gặp</Link></li>
                <li><Link to={PATHS.CONTACT} className="dropdown-item">Liên Hệ</Link></li>
                <li><Link to={PATHS.WARRANTY_POLICY} className="dropdown-item">Chính Sách Bảo Hành</Link></li>
                <li><Link to={PATHS.TERMS} className="dropdown-item">Điều Khoản</Link></li>
              </ul>
            </li>
            {/* <li className="nav-item dropdown">
              <Link to={PATHS.ABOUT} className="nav-link fs-8 fw-bold" role="button" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">Giới thiệu</Link>
            </li> */}

            {/* <li className="nav-item dropdown"><a className="nav-link fs-8 fw-bold  " href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">Package</a></li> */}
          </ul>
        </div>
      </nav >
    </div >
  );
};

export default Header;