// src/pages/Home/HomePage.jsx

import React, { use, useEffect, useRef, useState } from 'react';
import dayjs from 'dayjs'
import 'dayjs/locale/vi'
import { Link } from 'react-router-dom';
import { useAuth } from '../../../hooks/useAuth'; // Lấy thông tin user
import { PATHS, BASE_URL_ADMIN } from '../../../common/constants';
import { useDispatch, useSelector } from 'react-redux';
import { fetchBanners, selectSliderBanners, selectDaMuaBanners, selectDiaDiemDaQuaBanners } from '../../../modules/Banners/slice';
import { fetchCategories, selectAllCategories, selectCategoriesLoading, selectCategoriesError } from '../../../modules/Categories/slice'; // Phần import lấy all category
import { fetchTopViewedProducts, selectTopViewedProducts, selectProductsLoading, selectProductsError, selectNewestProducts, fetchNewestProducts } from '../../../modules/Products/slice';
import categoryStyles from './CategorySlider.module.css'; // Import CSS module cho category
import customerStyles from './CustomerSlider.module.css';
import styles from './HomeSlider.module.css';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faStar, faArrowRight } from '@fortawesome/free-solid-svg-icons';
import { faHeart } from '@fortawesome/free-regular-svg-icons';

// Import Isotope và imagesLoaded
import Isotope from 'isotope-layout';
import imagesLoaded from 'imagesloaded';

import { faVolumeMute, faVolumeUp, faPause, faPlay } from "@fortawesome/free-solid-svg-icons"; // Import icon âm thanh

dayjs.locale('vi')
const HomePage = () => {
  const dispatch = useDispatch();

  // ===============================================
  // Lấy dữ liệu Banners từ Redux store
  // ===============================================
  const sliderBanners = useSelector(selectSliderBanners);
  const diaDiemDaQuaBanners = useSelector(selectDiaDiemDaQuaBanners); // Đây sẽ là mảng sau khi sửa slice
  const daMuaBanners = useSelector(selectDaMuaBanners);
  const bannersLoading = useSelector((state) => state.banners.loading);
  const allBanners = useSelector((state) => state.banners.banners); // Lấy toàn bộ banners đã fetch

  // ===============================================
  // Lấy dữ liệu Categories từ Redux store
  // ===============================================
  const categories = useSelector(selectAllCategories);
  const categoriesLoading = useSelector(selectCategoriesLoading);
  const categoriesError = useSelector(selectCategoriesError);

  // ===============================================
  // Lấy dữ liệu Products xem nhiều nhất từ Redux store
  // ===============================================
  const topViewedProducts = useSelector(selectTopViewedProducts);
  const productsLoading = useSelector(selectProductsLoading);
  const productsError = useSelector(selectProductsError);
  // Lấy sản phẩm mới nhất theo created_at
  const newestProducts = useSelector(selectNewestProducts);

  // ===============================================
  // STATE & REFS CHO PHẦN VIDEO
  // ===============================================
  const videoRef1 = useRef(null);
  const videoRef2 = useRef(null);
  const videoRef3 = useRef(null);

  const [activeVideo, setActiveVideo] = useState(null); // video đang bật tiếng
  const [playingVideo, setPlayingVideo] = useState({ 1: true, 2: true, 3: true }); // mặc định autoplay

  // Toggle mute/unmute
  const toggleMute = (id) => {
    const videos = {
      1: videoRef1.current,
      2: videoRef2.current,
      3: videoRef3.current,
    };

    if (activeVideo === id) {
      videos[id].muted = true;
      setActiveVideo(null);
      return;
    }

    Object.values(videos).forEach((v) => v && (v.muted = true));
    if (videos[id]) {
      videos[id].muted = false;
      setActiveVideo(id);
    }
  };

  // Toggle play/pause
  const togglePlay = (id) => {
    const videos = {
      1: videoRef1.current,
      2: videoRef2.current,
      3: videoRef3.current,
    };

    const video = videos[id];
    if (!video) return;

    if (video.paused) {
      // Pause tất cả video khác trước
      Object.keys(videos).forEach((key) => {
        if (Number(key) !== id && videos[key]) {
          videos[key].pause();
          setPlayingVideo((prev) => ({ ...prev, [key]: false }));
        }
      });

      // Play video hiện tại
      video.play();
      setPlayingVideo((prev) => ({ ...prev, [id]: true }));
    } else {
      // Nếu đang play thì pause
      video.pause();
      setPlayingVideo((prev) => ({ ...prev, [id]: false }));
    }
  };


  // ===============================================
  // useEffect để fetch dữ liệu khi component mount
  // ===============================================
  useEffect(() => {
    // Thay đổi tiêu đề trang khi component này được render
    document.title = 'Home - Trang Chu';
  }, []);

  useEffect(() => {
    if (!bannersLoading && allBanners.length === 0) {
      dispatch(fetchBanners(null)); // Fetch tất cả banners nếu bạn muốn lọc chúng bằng selectors
    }

  }, [dispatch, bannersLoading, allBanners.length]); // Thêm allBanners.length vào dependency để re-run khi banners thay đổi
  // console.log(daMuaBanners);

  useEffect(() => {
    // Điều kiện này để tránh fetch lại categories nếu đã có dữ liệu hoặc đang loading
    if (!categoriesLoading && categories.length === 0 && !categoriesError) {
      dispatch(fetchCategories());
    }

    // Fetch Top Viewed Products (nếu chưa có hoặc đang không tải)
    if (!productsLoading && topViewedProducts.length === 0) {
      // console.log("Dispatching fetchTopViewedProducts()...");
      dispatch(fetchTopViewedProducts());
    }
    //
    if (!productsLoading && newestProducts.length === 0) {
      dispatch(fetchNewestProducts());
    }
  }, [dispatch, categoriesLoading, categories.length, categoriesError]);

  const { user } = useAuth(); // Lấy thông tin user

  // ===============================================
  // STATE & REFS CHO PHẦN GALLERY (ISOTOPE)
  // ===============================================
  const galleryRef = useRef(null); // Ref cho container của Isotope (#image_gallery)
  const filterNavRef = useRef(null); // Ref cho ul của các nút lọc
  const [isotopeInstance, setIsotopeInstance] = useState(null); // State để lưu instance của Isotope
  const [activeFilter, setActiveFilter] = useState('.tokyo'); // State cho active filter

  // useEffect để khởi tạo Isotope và Feather Icons cho Gallery
  useEffect(() => {
    // Kiểm tra và khởi tạo Isotope
    if (window.Isotope && window.imagesLoaded && galleryRef.current) {
      window.imagesLoaded(galleryRef.current, () => {
        setTimeout(() => { // Giữ setTimeout để ổn định DOM
          // console.log("Initializing Isotope for Gallery:", galleryRef.current.children);
          const iso = new window.Isotope(galleryRef.current, {
            itemSelector: '',
            layoutMode: 'packery',
            filter: activeFilter
          });
          setIsotopeInstance(iso);
        }, 100);
      });
    }

    // Khởi tạo Feather Icons
    if (window.feather) {
      window.feather.replace();
    }

    // Cleanup function cho Isotope
    return () => {
      if (isotopeInstance) { // Sử dụng instance từ state
        isotopeInstance.destroy();
      }
    };
  }, []); // [] đảm bảo chỉ chạy một lần khi mount

  // useEffect để xử lý khi filter của Gallery thay đổi
  useEffect(() => {
    if (isotopeInstance) {
      isotopeInstance.arrange({ filter: activeFilter });
    }
  }, [activeFilter, isotopeInstance]);

  // Hàm xử lý khi click vào nút lọc của Gallery
  const handleFilterClick = (e) => {
    if (e.target.tagName === 'A' && e.target.dataset.filter) {
      const filterValue = e.target.dataset.filter;
      setActiveFilter(filterValue);
    }
  };


  // ===============================================
  // STATE & REFS CHO PHẦN SWIPER SLIDER
  // ===============================================
  const swiperRef1 = useRef(null); // Ref riêng cho Swiper Slider thứ nhất
  const swiperRef2 = useRef(null); // Ref riêng cho Swiper Slider thứ hai

  // useEffect để khởi tạo Swiper Slider thứ nhất
  useEffect(() => {
    if (window.Swiper && swiperRef1.current) {
      const swiperConfigString = swiperRef1.current.dataset.swiper;
      let swiperConfig = {};
      if (swiperConfigString) {
        try {
          swiperConfig = JSON.parse(swiperConfigString.replace(/'/g, '"'));
        } catch (e) {
          console.error("Lỗi parse Swiper config 1:", e);
        }
      }

      const mySwiper1 = new window.Swiper(swiperRef1.current, {
        ...swiperConfig,
        navigation: {
          nextEl: '.swiper-button-next', // Selector duy nhất cho Swiper 1
          prevEl: '.swiper-button-prev', // Selector duy nhất cho Swiper 1
        },
      });

      return () => {
        if (mySwiper1) {
          mySwiper1.destroy();
        }
      };
    }
  }, []); // [] đảm bảo chỉ chạy một lần khi mount

  // useEffect để khởi tạo Swiper Slider thứ hai
  useEffect(() => {
    if (window.Swiper && swiperRef2.current) {
      const swiperConfigString = swiperRef2.current.dataset.swiper;
      let swiperConfig = {};
      if (swiperConfigString) {
        try {
          swiperConfig = JSON.parse(swiperConfigString.replace(/'/g, '"'));
        } catch (e) {
          console.error("Lỗi parse Swiper config 2:", e);
        }
      }

      const mySwiper2 = new window.Swiper(swiperRef2.current, {
        ...swiperConfig,
        navigation: {
          nextEl: '.swiper-button-next', // Selector duy nhất cho Swiper 2
          prevEl: '.swiper-button-prev', // Selector duy nhất cho Swiper 2
        },
      });

      return () => {
        if (mySwiper2) {
          mySwiper2.destroy();
        }
      };
    }
  }, []); // [] đảm bảo chỉ chạy một lần khi mount

  return (
    <>
      <div
        className={styles.heroBanner}
        style={{
          backgroundImage: sliderBanners?.image_path
            ? `url(${sliderBanners.image_path})`
            : "url(../../assets/img/bg/slider.jpg)",
        }}
      ></div>

      <section className="pt-6 pt-md-10 pb-10" >
        <div className="container-medium">
          <div className="bg-holder d-none d-xl-block" style={{ backgroundImage: "url(../../assets/img/bg/bg-left-27.png)", backgroundSize: "auto", backgroundPosition: "left" }}></div>
          <div className="bg-holder d-none d-xl-block" style={{ backgroundImage: "url(../../assets/img/bg/bg-right-27.png)", backgroundSize: "auto", backgroundPosition: "right" }}></div>
          <div className="row g-3 position-relative">
            <div className="col-lg-6">
              <div className="row g-3">
                <div className="col-md-7">
                  <h4 className="fw-semibold mb-3">Xe mới</h4>
                  <h2 className="fs-4 fw-semibold mb-3 mb-md-4">Cảm xúc mới - <span className="text-primary-light fw-bold">Đặt lịch lái thử ngay</span></h2>
                  <p className="mb-3 mb-md-0 text-body-tertiary">Đây là nơi lý tưởng để bạn khám phá các dòng xe mới nhất và đặt lịch lái thử trực tiếp. Với hệ thống đặt lịch thông minh, bạn dễ dàng lựa chọn thời gian, địa điểm và mẫu xe phù hợp với nhu cầu của mình.
                    Hãy bắt đầu hành trình trải nghiệm xe theo cách riêng của bạn!<span className="d-none d-lg-inline-block d-xl-none">... </span></p>
                </div>
                <div className="col-6 col-md-5">
                  <div className="img-zoom-hover position-relative h-100 rounded-3 overflow-hidden">
                    <Link to={`/products/${newestProducts[0]?.slug}`}>
                      <img className="w-100 h-100 object-fit-cover" src={`${PATHS.ADMIN_DASHBOARD}storage/${newestProducts[0]?.img}`} alt="" />
                    </Link>
                    <div className="backdrop-faded">
                      <Link to={`/products/${newestProducts[0]?.slug}`} className="fw-bold fs-7 text-white stretched-link">{newestProducts[0]?.name}</Link>
                      <p className="mb-0 text-white fs-9">{newestProducts.categories?.[0]?.name || ''}</p>
                    </div>
                  </div>
                </div>
                <div className="col-6 col-md-5">
                  <div className="img-zoom-hover position-relative h-100 rounded-3 overflow-hidden">
                    <Link to={`/products/${newestProducts[1]?.slug}`}>
                      <img className="w-100 h-100 object-fit-cover" src={`${PATHS.ADMIN_DASHBOARD}storage/${newestProducts[1]?.img}`} alt="" />
                    </Link>
                    <div className="backdrop-faded">
                      <Link to={`/products/${newestProducts[1]?.slug}`} className="fw-bold fs-7 text-white">{newestProducts[1]?.name}</Link>
                      <p className="mb-0 text-white fs-9">{newestProducts.categories?.[0]?.name || ''}</p>
                    </div>
                  </div>
                </div>
                <div className="col-md-7">
                  <div className="img-zoom-hover position-relative h-100 rounded-3 overflow-hidden">
                    <Link to={`/products/${newestProducts[2]?.slug}`}>
                      <img className="w-100 h-md-100 object-fit-cover" src={`${PATHS.ADMIN_DASHBOARD}storage/${newestProducts[2]?.img}`} alt="" height="220" />
                    </Link>
                    <div className="backdrop-faded">
                      <Link to={`/products/${newestProducts[2]?.slug}`} className="fw-bold fs-7 text-white">{newestProducts[2]?.name}</Link>
                      <p className="mb-0 text-white fs-9">{newestProducts.categories?.[2]?.name || ''}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="col-lg-6">
              <div className="d-flex flex-column gap-3 h-100">
                <div className="img-zoom-hover position-relative h-100 rounded-3 overflow-hidden">
                  <Link to={`/products/${newestProducts[3]?.slug}`}>
                    <img className="w-100 h-lg-100 object-fit-cover" src={`${PATHS.ADMIN_DASHBOARD}storage/${newestProducts[3]?.img}`} alt="" height="220" />
                  </Link>
                  <div className="backdrop-faded">
                    <Link to={`/products/${newestProducts[3]?.slug}`} className="fw-bold fs-7 text-white">{newestProducts[3]?.name}</Link>
                    <p className="mb-0 text-white fs-9">{newestProducts.categories?.[0]?.name || ''}</p>
                  </div>
                </div>
                <Link to={PATHS.PRODUCTS} className="btn btn-primary w-100 py-3 fs-8">Xem thêm
                  <span className="fa-solid fa-chevron-right ms-2" data-fa-transform="down-2"></span>
                </Link>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section className="pb-10 pt-0">
        <div className="bg-holder d-none d-md-block" style={{ backgroundImage: "url(../../assets/img/bg/bg-left-28.png)", backgroundSize: "7%", backgroundPosition: "left 27%" }}></div>
        <div className="bg-holder d-none d-md-block" style={{ backgroundImage: "url(../../assets/img/bg/bg-right-28.png)", backgroundSize: "16%", backgroundPosition: "right -25px" }}></div>
        <div className="container-medium text-center mb-11 position-relative">
          <h3 className="mb-2 text-body-emphasis">Khám phá các hãng xe hàng đầu</h3>
          <p className="text-body-tertiary mb-0">Chúng tôi mang đến cho bạn những lựa chọn phong phú từ các thương hiệu xe uy tín. Tất cả đều được tuyển chọn kỹ lưỡng với chất lượng đảm bảo, phù hợp với nhu cầu và ngân sách của bạn.</p>
        </div>
        <div className="container-fluid px-sm-0">
          <div className="swiper-theme-container swiper-slide-nav-top">
            <div className="swiper-nav">
              <div className="swiper-button-next"><span className="fas fa-chevron-right text-primary" data-fa-transform="shrink-3"></span></div>
              <div className="swiper-button-prev"><span className="fas fa-chevron-left text-primary" data-fa-transform="shrink-3"></span></div>
            </div>
            <div className="swiper theme-slider" data-swiper='{"loop":false, "centeredSlides":true,"autoplay":true,"centeredSlidesBounds":true,"spaceBetween":16,"slidesPerView":1,"speed":1500,"breakpoints":{"576":{"slidesPerView":"auto"}}}' ref={swiperRef1}>
              <div className="swiper-wrapper">
                {!categoriesLoading && categories.length > 0 ? (categories.map((category) => (
                  <div className={`swiper-slide w-sm-auto ${categoryStyles.myCustomSlide}`} key={category.id}>
                    <Link to={`${PATHS.PRODUCTS_BY_CATEGORY_SLUG}${category.slug}`} className="position-relative rounded-3 overflow-hidden d-block">
                      <img className="w-100 w-sm-auto object-fit-cover" src={`${PATHS.ADMIN_DASHBOARD}storage/${category.img}`} alt={category.name} style={{ height: "220px" }} />
                      <div className="img-backdrop-faded" style={{ height: "220px" }}>
                        <div className="image-reveal-content mb-3">
                          <div className="d-flex align-items-center gap-2 mb-2">
                          </div>
                          <div className="d-flex align-items-center gap-2"><span className="fa-solid fa-car text-secondary-lighter"></span>
                            <h6 className="mb-0 text-secondary-lighter fw-semibold">{category.products_count} Xe</h6>
                          </div>
                        </div>
                        <div className="d-flex align-items-center gap-2">
                          <img src={`${PATHS.ADMIN_DASHBOARD}storage/${category.img}`} alt="" width="25px" height="18px" />
                          <h4 className="mb-0 text-white">{category.name}</h4>
                        </div>
                      </div>
                    </Link>
                  </div>
                ))) : (
                  !categoriesLoading && !categoriesError && <div className="swiper-slide w-sm-auto"><p>Không có danh mục nào để hiển thị.</p></div>
                )}
              </div>
            </div>
          </div>
        </div>
      </section>

      <section className="py-0">
        <div className="bg-holder d-none d-xl-block" style={{ backgroundImage: "url(../../assets/img/bg/bg-left-29.png)", backgroundSize: "auto", backgroundPosition: "-15%" }}></div>
        <div className="container-medium position-relative">
          <h3 className="mb-2 text-body-emphasis text-center text-xl-start">🔥 Xe nổi bật nhất tuần</h3>
          <div className="d-xl-flex justify-content-between mb-5 text-center">
            <p className="mb-0 text-body-tertiary">Đây là mẫu xe đang gây “sốt” với lượt xem kỷ lục từ khách hàng trên toàn quốc. Xem chi tiết ngay!</p>
            <Link to={PATHS.PRODUCTS} className="btn btn-link p-0 fs-8">Xem tất cả
              <span className="fa-solid fa-chevron-right ms-2" data-fa-transform="shrink-3"></span>
            </Link>
          </div>
          <div className="row g-0 justify-content-center">
            <div className="col-sm-11 col-md-8 col-lg-6 col-xl-12">
              <div className="row gy-5 gx-xl-7 justify-content-between pe-4">
                {!productsLoading && topViewedProducts.length > 0 && (
                  topViewedProducts.map((product) => (
                    <div className="col-xl-4" key={product.id}>
                      <div className="card card-img-shift border-0 mx-auto">
                        <div className="rounded-3 overflow-hidden w-100 position-relative z-5">
                          <img className="w-100" src={`${PATHS.ADMIN_DASHBOARD}storage/${product.img}`} alt="" height="250" />
                          <button className="btn btn-wish position-absolute top-0 end-0 mt-3 me-3">
                            <span className="far fa-heart"></span>
                          </button>
                        </div>
                        <div className="card-body p-0">
                          <div className="card-content">
                            <div className="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
                              <div>
                                <span className="badge badge-phoenix px-1 badge-phoenix-info">{product.tags?.map((cat) => cat.name).join(', ') || ''}</span>
                              </div>
                              <h6>
                                <i className="fas fa-eye me-1"></i>
                                {product.views || 0}
                              </h6>
                            </div>
                            <Link to={`/products/${product.slug}`} className="fw-bold fs-7 text-body-emphasis mb-2 text-primary-hover">
                              {product.name}
                            </Link>
                            <a className="fw-semibold text-body-tertiary mb-3 d-block" href="#!">
                              <span className="fa-solid fa-car-side me-2"></span>{product.categories?.map((cat) => cat.name).join(', ') || 'N/A'}
                            </a>
                            <h6 className="fe-semibold text-body-tertiary d-flex align-items-center gap-1 mb-4">Giá
                              <span className="fw-bolder fs-7 text-body-highlight">{product.price ? new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(product.price) : 'Liên hệ'}</span>
                            </h6>
                            <Link to={`/products/${product.slug}`} className="btn btn-primary px-5">
                              Xem Chi Tiết
                            </Link>
                          </div>
                        </div>
                      </div>
                    </div>
                  ))
                )}
              </div>
            </div>
          </div>
        </div>
      </section>

      <section className="py-10 overflow-hidden">
        <div
          className="bg-holder d-none d-xl-block"
          style={{
            backgroundImage: 'url(../../assets/img/bg/bg-left-30.png)',
            backgroundSize: '40%',
            backgroundPosition: 'left',
            zIndex: 1,
          }}
        ></div>
        <div
          className="bg-holder d-none d-xl-block"
          style={{
            backgroundImage: 'url(../../assets/img/bg/bg-right-30.png)',
            backgroundSize: '26%',
            backgroundPosition: 'right 25px',
            zIndex: 1,
          }}
        ></div>
        <div className="bg-booking-gallery"></div>
        <div className="container-medium position-relative z-2">
          <h3 className="mb-2 text-body-emphasis text-center">
            🚗 Trải Nghiệm Xe Thực Tế Qua Video
          </h3>
          <p className="mb-0 text-body-tertiary text-center mb-5">
            Khám phá mọi chi tiết, nội thất và trải nghiệm lái thử qua những thước phim chân thực nhất.
          </p>
          <ul
            className="nav mb-6 justify-content-center flex-wrap mx-auto w-max-content"
            data-filter-nav="data-filter-nav"
            onClick={handleFilterClick}
          >
            <li className="nav-item">
              <a className={`isotope-nav cursor-pointer ${activeFilter === '.tokyo' ? 'active' : ''}`} data-filter=".tokyo">
                Tất cả
              </a>
            </li>
            <li className="nav-item">
              <a className={`isotope-nav cursor-pointer ${activeFilter === '.bali' ? 'active' : ''}`} data-filter=".bali">
                Sedan
              </a>
            </li>
            <li className="nav-item">
              <a className={`isotope-nav cursor-pointer ${activeFilter === '.sydney' ? 'active' : ''}`} data-filter=".sydney">
                SUV
              </a>
            </li>
            <li className="nav-item">
              {' '}
              <a className={`isotope-nav cursor-pointer ${activeFilter === '.paris' ? 'active' : ''}`} data-filter=".paris">
                Xe điện
              </a>
            </li>
          </ul>
          <div className="row g-0 justify-content-center">
            <div className="col-md-12 col-lg-10 col-xl-9 mx-auto">
              <div className="row g-3 justify-content-center" id="image_gallery" ref={galleryRef}>
                {/* Tokyo */}
                <div className="col-12 col-md-6 col-lg-4 tokyo">
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden position-relative">
                    <video
                      ref={videoRef1}
                      src="../../assets/video/capnhatmauxemoinhat.mp4"
                      className="w-100 object-fit-cover"
                      style={{ aspectRatio: "9/16", objectFit: "cover" }}
                      poster="https://marketplace.canva.com/EAGRB58BnmI/2/0/1600w/canva-b%C3%A0i-%C4%91%C4%83ng-instagram-qu%E1%BA%A3ng-c%C3%A1o-xe-h%C6%A1i-hi%E1%BB%87n-%C4%91%E1%BA%A1i-tr%E1%BA%BB-trung-xanh-d%C6%B0%C6%A1ng-f3rvclAtsus.jpg"   // ảnh giới thiệu trước khi chạy
                      muted
                      // autoPlay
                      loop
                      playsInline
                      onClick={() => togglePlay(1)}
                    />

                    {/* Nút Play chỉ hiện khi video đang pause */}
                    {!playingVideo[1] && (
                      <button
                        onClick={() => togglePlay(1)}
                        className="position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center"
                        style={{
                          width: "60px",
                          height: "60px",
                          borderRadius: "50%",
                          backgroundColor: "rgba(0,0,0,0.6)",
                          color: "#fff",
                          border: "none"
                        }}
                      >
                        <FontAwesomeIcon icon={faPlay} size="lg" />
                      </button>
                    )}

                    {/* Nút mute/unmute góc phải dưới */}
                    <button
                      onClick={() => toggleMute(1)}
                      className="position-absolute bottom-0 end-0 mb-2 me-2 d-flex align-items-center justify-content-center"
                      style={{
                        width: "36px",
                        height: "36px",
                        borderRadius: "50%",
                        backgroundColor: "rgba(0,0,0,0.5)",
                        color: "#fff",
                        border: "none",
                        zIndex: 9999
                      }}
                    >
                      <FontAwesomeIcon icon={activeVideo === 1 ? faVolumeUp : faVolumeMute} />
                    </button>
                    <div className="backdrop-faded">
                      <a className="text-white fw-bolder fs-7 stretched-link" href="#!">
                        Tổng hợp xem xe mới nhất
                      </a>
                    </div>
                  </div>
                </div>
                <div className="col-12 col-md-6 col-lg-4 tokyo">
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden position-relative">
                    <video
                      ref={videoRef2}
                      src="../../assets/video/mazda3.mp4"
                      className="w-100 object-fit-cover"
                      style={{ aspectRatio: "9/16", objectFit: "cover" }}
                      poster="https://i1-vnexpress.vnecdn.net/2021/09/18/Mazda32020VnE993047211573621051jpg-1631963909.jpg?w=750&h=450&q=100&dpr=1&fit=crop&s=Ksi2dIeIocGk9Pke5aGnRQ"   // ảnh giới thiệu trước khi chạy
                      muted
                      // autoPlay
                      loop
                      playsInline
                      onClick={() => togglePlay(2)}
                    />

                    {/* Nút Play chỉ hiện khi video đang pause */}
                    {!playingVideo[2] && (
                      <button
                        onClick={() => togglePlay(2)}
                        className="position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center"
                        style={{
                          width: "60px",
                          height: "60px",
                          borderRadius: "50%",
                          backgroundColor: "rgba(0,0,0,0.6)",
                          color: "#fff",
                          border: "none"
                        }}
                      >
                        <FontAwesomeIcon icon={faPlay} size="lg" />
                      </button>
                    )}

                    {/* Nút mute/unmute góc phải dưới */}
                    <button
                      onClick={() => toggleMute(2)}
                      className="position-absolute bottom-0 end-0 mb-2 me-2 d-flex align-items-center justify-content-center"
                      style={{
                        width: "36px",
                        height: "36px",
                        borderRadius: "50%",
                        backgroundColor: "rgba(0,0,0,0.5)",
                        color: "#fff",
                        border: "none",
                        zIndex: 9999
                      }}
                    >
                      <FontAwesomeIcon icon={activeVideo === 2 ? faVolumeUp : faVolumeMute} />
                    </button>
                    <div className="backdrop-faded">
                      <a className="text-white fw-bolder fs-7 stretched-link" href="#!">
                        Mazda 3 2024 - Chi tiết và trải nghiệm
                      </a>
                    </div>
                  </div>
                </div>
                <div className="col-12 col-md-6 col-lg-4 tokyo">
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden position-relative">
                    <video
                      ref={videoRef3}
                      src="../../assets/video/MPV7cho.mp4"
                      className="w-100 object-fit-cover"
                      style={{ aspectRatio: "9/16", objectFit: "cover" }}
                      poster="https://image.made-in-china.com/2f0j00TeBbyKdliskS/2021-KIA-Carnival-2-0t-Luxury-2WD-MPV-7-Seats-Car-Left-Hand-Drive-Gasoline-Car-Made-in-China-0km-Used-Car.webp"   // ảnh giới thiệu trước khi chạy
                      muted
                      // autoPlay
                      loop
                      playsInline
                      onClick={() => togglePlay(3)}
                    />

                    {/* Nút Play chỉ hiện khi video đang pause */}
                    {!playingVideo[3] && (
                      <button
                        onClick={() => togglePlay(3)}
                        className="position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center"
                        style={{
                          width: "60px",
                          height: "60px",
                          borderRadius: "50%",
                          backgroundColor: "rgba(0,0,0,0.6)",
                          color: "#fff",
                          border: "none"
                        }}
                      >
                        <FontAwesomeIcon icon={faPlay} size="lg" />
                      </button>
                    )}

                    {/* Nút mute/unmute góc phải dưới */}
                    <button
                      onClick={() => toggleMute(3)}
                      className="position-absolute bottom-0 end-0 mb-2 me-2 d-flex align-items-center justify-content-center"
                      style={{
                        width: "36px",
                        height: "36px",
                        borderRadius: "50%",
                        backgroundColor: "rgba(0,0,0,0.5)",
                        color: "#fff",
                        border: "none",
                        zIndex: 9999
                      }}
                    >
                      <FontAwesomeIcon icon={activeVideo === 3 ? faVolumeUp : faVolumeMute} />
                    </button>
                    <div className="backdrop-faded">
                      <a className="text-white fw-bolder fs-7 stretched-link" href="#!">
                        MPV 7 chỗ - Lựa chọn hoàn hảo cho gia đình
                      </a>
                    </div>
                  </div>
                </div>
                {/* Bali */}
                <div className="col-12 col-md-6 col-lg-4 bali" style={{ display: activeFilter === '.bali' || activeFilter === '*' ? 'block' : 'none' }}>
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden">
                    <a href="#!">
                      <img
                        className="w-100 object-fit-cover"
                        src="../../assets/img/gallery/bali-1.png"
                        alt=""
                        style={{ aspectRatio: "9/16", objectFit: "cover" }}
                      />
                    </a>
                    <button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4">
                      <FontAwesomeIcon icon={faHeart} />
                    </button>
                    <div className="backdrop-faded">
                      <a className="text-white fw-bolder fs-7 stretched-link" href="#!">
                        Nusa Lembongan
                      </a>
                      <h5 className="text-light mb-0">
                        <FontAwesomeIcon icon={faStar} className="text-warning me-1" />
                        4.7<span className="fs-10">/5 </span>(1.2k review)
                      </h5>
                    </div>
                  </div>
                </div>
                <div className="col-12 col-md-6 col-lg-4 bali" style={{ display: activeFilter === '.bali' || activeFilter === '*' ? 'block' : 'none' }}>
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden">
                    <a href="#!">
                      <img
                        className="w-100 object-fit-cover"
                        src="../../assets/img/gallery/bali-2.png"
                        alt=""
                        style={{ aspectRatio: "9/16", objectFit: "cover" }}
                      />
                    </a>
                    <button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4">
                      <FontAwesomeIcon icon={faHeart} />
                    </button>
                    <div className="backdrop-faded">
                      <a className="text-white fw-bolder fs-7 stretched-link" href="#!">
                        Waterbom Bali
                      </a>
                      <h5 className="text-light mb-0">
                        <FontAwesomeIcon icon={faStar} className="text-warning me-1" />
                        4.5<span className="fs-10">/5 </span>(1.8k review)
                      </h5>
                    </div>
                  </div>
                </div>
                <div className="col-12 col-md-6 col-lg-4 bali" style={{ display: activeFilter === '.bali' || activeFilter === '*' ? 'block' : 'none' }}>
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden">
                    <a href="#!">
                      <img
                        className="w-100 object-fit-cover"
                        src="../../assets/img/gallery/bali-3.png"
                        alt=""
                        style={{ aspectRatio: "9/16", objectFit: "cover" }} // video dọc
                      />
                    </a>
                    <button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4">
                      <FontAwesomeIcon icon={faHeart} />
                    </button>
                    <div className="backdrop-faded">
                      <a className="text-white fw-bolder fs-7 stretched-link" href="#!">
                        Kuta Beach
                      </a>
                      <h5 className="text-light mb-0">
                        <FontAwesomeIcon icon={faStar} className="text-warning me-1" />
                        5<span className="fs-10">/5 </span>(4.1k review)
                      </h5>
                    </div>
                  </div>
                </div>
                {/* Sydney */}
                <div className="col-12 col-md-6 col-lg-4 sydney" style={{ display: activeFilter === '.sydney' || activeFilter === '*' ? 'block' : 'none' }}>
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden">
                    <a href="#!">
                      <img
                        className="w-100 object-fit-cover"
                        src="../../assets/img/gallery/bali-3.png"
                        alt=""
                        style={{ aspectRatio: "9/16", objectFit: "cover" }} // video dọc
                      />
                    </a>
                    <button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4">
                      <FontAwesomeIcon icon={faHeart} />
                    </button>
                    <div className="backdrop-faded">
                      <a className="text-white fw-bolder fs-7 stretched-link" href="#!">
                        Kuta Beach
                      </a>
                      <h5 className="text-light mb-0">
                        <FontAwesomeIcon icon={faStar} className="text-warning me-1" />
                        5<span className="fs-10">/5 </span>(4.1k review)
                      </h5>
                    </div>
                  </div>
                </div>
                <div className="col-12 col-md-6 col-lg-4 sydney" style={{ display: activeFilter === '.sydney' || activeFilter === '*' ? 'block' : 'none' }}>
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden">
                    <a href="#!">
                      <img
                        className="w-100 object-fit-cover"
                        src="../../assets/img/gallery/bali-3.png"
                        alt=""
                        style={{ aspectRatio: "9/16", objectFit: "cover" }} // video dọc
                      />
                    </a>
                    <button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4">
                      <FontAwesomeIcon icon={faHeart} />
                    </button>
                    <div className="backdrop-faded">
                      <a className="text-white fw-bolder fs-7 stretched-link" href="#!">
                        Kuta Beach
                      </a>
                      <h5 className="text-light mb-0">
                        <FontAwesomeIcon icon={faStar} className="text-warning me-1" />
                        5<span className="fs-10">/5 </span>(4.1k review)
                      </h5>
                    </div>
                  </div>
                </div>
                <div className="col-12 col-md-6 col-lg-4 sydney" style={{ display: activeFilter === '.sydney' || activeFilter === '*' ? 'block' : 'none' }}>
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden">
                    <a href="#!">
                      <img
                        className="w-100 object-fit-cover"
                        src="../../assets/img/gallery/bali-3.png"
                        alt=""
                        style={{ aspectRatio: "9/16", objectFit: "cover" }} // video dọc
                      />
                    </a>
                    <button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4">
                      <FontAwesomeIcon icon={faHeart} />
                    </button>
                    <div className="backdrop-faded">
                      <a className="text-white fw-bolder fs-7 stretched-link" href="#!">
                        Kuta Beach
                      </a>
                      <h5 className="text-light mb-0">
                        <FontAwesomeIcon icon={faStar} className="text-warning me-1" />
                        5<span className="fs-10">/5 </span>(4.1k review)
                      </h5>
                    </div>
                  </div>
                </div>
                {/* Paris */}
                <div className="col-12 col-md-6 col-lg-4 paris" style={{ display: activeFilter === '.paris' || activeFilter === '*' ? 'block' : 'none' }}>
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden">
                    <a href="#!">
                      <img
                        className="w-100 object-fit-cover"
                        src="../../assets/img/gallery/bali-3.png"
                        alt=""
                        style={{ aspectRatio: "9/16", objectFit: "cover" }} // video dọc
                      />
                    </a>
                    <button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4">
                      <FontAwesomeIcon icon={faHeart} />
                    </button>
                    <div className="backdrop-faded">
                      <a className="text-white fw-bolder fs-7 stretched-link" href="#!">
                        Kuta Beach
                      </a>
                      <h5 className="text-light mb-0">
                        <FontAwesomeIcon icon={faStar} className="text-warning me-1" />
                        5<span className="fs-10">/5 </span>(4.1k review)
                      </h5>
                    </div>
                  </div>
                </div>
                <div className="col-12 col-md-6 col-lg-4 paris" style={{ display: activeFilter === '.paris' || activeFilter === '*' ? 'block' : 'none' }}>
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden">
                    <a href="#!">
                      <img
                        className="w-100 object-fit-cover"
                        src="../../assets/img/gallery/bali-3.png"
                        alt=""
                        style={{ aspectRatio: "9/16", objectFit: "cover" }} // video dọc
                      />
                    </a>
                    <button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4">
                      <FontAwesomeIcon icon={faHeart} />
                    </button>
                    <div className="backdrop-faded">
                      <a className="text-white fw-bolder fs-7 stretched-link" href="#!">
                        Kuta Beach
                      </a>
                      <h5 className="text-light mb-0">
                        <FontAwesomeIcon icon={faStar} className="text-warning me-1" />
                        5<span className="fs-10">/5 </span>(4.1k review)
                      </h5>
                    </div>
                  </div>
                </div>
                <div className="col-12 col-md-6 col-lg-4 paris" style={{ display: activeFilter === '.paris' || activeFilter === '*' ? 'block' : 'none' }}>
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden">
                    <a href="#!">
                      <img
                        className="w-100 object-fit-cover"
                        src="../../assets/img/gallery/bali-3.png"
                        alt=""
                        style={{ aspectRatio: "9/16", objectFit: "cover" }} // video dọc
                      />
                    </a>
                    <button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4">
                      <FontAwesomeIcon icon={faHeart} />
                    </button>
                    <div className="backdrop-faded">
                      <a className="text-white fw-bolder fs-7 stretched-link" href="#!">
                        Kuta Beach
                      </a>
                      <h5 className="text-light mb-0">
                        <FontAwesomeIcon icon={faStar} className="text-warning me-1" />
                        5<span className="fs-10">/5 </span>(4.1k review)
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div className="d-flex align-items-center justify-content-center gap-3 mt-4">
            <h5 className="mb-0">Xem thêm</h5>
            <div className="btn-ping">
              <div className="btn-ping-bg"></div>
              <button className="btn border p-0 fs-8 text-primary d-flex align-items-center justify-content-center">
                <FontAwesomeIcon icon={faArrowRight} />
              </button>
            </div>
          </div>
        </div>
      </section>

      <section className="pb-7 pt-0 overflow-x-hidden">
        <div className="bg-holder d-none d-xl-block" style={{ backgroundImage: 'url(../../assets/img/bg/bg-left-31.png)', backgroundSize: '22%', backgroundPosition: 'left', zIndex: 1 }}></div>
        <div className="bg-holder d-none d-xl-block" style={{ backgroundImage: 'url(../../assets/img/bg/bg-right-31.png)', backgroundSize: '15%', backgroundPosition: 'right bottom', zIndex: 1 }}></div>
        <div className="bg-latest-posts"></div>
        <div className="container-medium text-center position-relative z-2">
          <h3 className="mb-2 text-body-emphasis">😊 Gương mặt rạng rỡ của khách hàng thân yêu</h3>
          <p className="mb-0 text-body-tertiary mb-13">Mỗi nụ cười là một sự hài lòng. Cảm ơn quý khách đã lựa chọn chúng tôi để cùng khởi đầu những hành trình mới.</p>
        </div>
        <div className="swiper-theme-container swiper-zooming-slider">
          <div className="swiper-container customer-slider"
            // Sửa lại cấu hình Swiper của phần khách hàng
            data-swiper='{"loop":false,"spaceBetween":32,"speed":2000,"autoplay":true,"centeredSlides":true,"simulateTouch":false,"breakpoints":{"0":{"slidesPerView":1,"spaceBetween":16},"540":{"slidesPerView":1.5},"768":{"slidesPerView":1.8},"1200":{"slidesPerView":2},"1530":{"slidesPerView":2.8}}}'
            ref={swiperRef2}>
            <div className="swiper-wrapper">
              {daMuaBanners.map((banner) => (
                <div className={`swiper-slide rounded-3 overflow-hidden ${customerStyles.myCustomSlide}`} key={banner.id}>
                  <div className="position-relative w-100 h-100">
                    <img className="w-100 h-100 object-fit-cover" src={banner.image_path} alt={banner.title} />
                    <div className="backdrop-faded p-4 p-md-6">
                      <div className="d-flex align-items-center mb-2"><span className="text-secondary-lighter me-2" data-feather="calendar"></span>
                        <h6 className="mb-0 fw-semibold text-secondary-lighter pe-3 me-3 border-end">{dayjs(banner.created_at).format('dddd, DD MMMM YYYY')}</h6>
                        <span className="fa-solid fa-star text-warning fs-9 me-2"></span>
                        <h6 className="mb-0 text-secondary-lighter fw-semibold">5</h6>
                      </div>
                      <a className="text-white fw-bold fs-7" href={banner.link || '#!'}>{banner.title}</a>
                    </div>
                  </div>
                </div>
              ))}
            </div>
          </div>
          <div className="swiper-nav">
            <div className="swiper-button-next"><span className="fas fa-chevron-right text-primary" data-fa-transform="shrink-3"></span></div>
            <div className="swiper-button-prev"><span className="fas fa-chevron-left text-primary" data-fa-transform="shrink-3"></span></div>
          </div>
        </div>
        <div className="text-center mt-12 position-relative z-2"><button className="btn btn-link p-0 fs-8">Xem thêm<span className="fa-solid fa-chevron-right ms-2" data-fa-transform="shrink-1"></span></button></div>
      </section>

      <section className="pb-10 pt-3">
        <div className="bg-holder d-none d-xl-block" style={{ backgroundImage: 'url(../../assets/img/bg/bg-left-32.png)', backgroundSize: '26%', backgroundPosition: 'left 115px' }}></div>
        <div className="bg-holder d-none d-xl-block" style={{ backgroundImage: 'url(../../assets/img/bg/bg-right-32.png)', backgroundSize: '28%', backgroundPosition: 'right -25px' }}></div>
        <div className="container-medium position-relative">
          <div className="row g-0 justify-content-center">
            <div className="col-lg-10 col-xl-7">
              <div className="d-md-flex align-items-center gap-7 text-center text-md-start"><img className="mb-4 mb-md-0 d-dark-none" src="../../assets/img/spot-illustrations/40.png" width="260" alt="" /><img className="mb-4 mb-md-0 d-light-none" src="../../assets/img/spot-illustrations/dark_40.png" width="260" alt="" />
                <div className="flex-1">
                  <h3 className="mb-0">Để lại Email</h3>
                  <p className="mb-4 text-body-tertiary">Để lại email chúng tôi sẽ gửi thông tin sản phẩm mới cho bạn.</p>
                  <form className="d-flex justify-content-center">
                    <input className="form-control me-3" id="ctaEmail1" type="email" placeholder="Email" aria-describedby="ctaEmail1" />
                    <button className="btn btn-primary d-flex align-items-center" type="submit"> Gửi
                      <span className="fa-solid fa-chevron-right ms-2 fs-9"></span>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section className="pb-7 pt-0">
        <div className="container-medium">
          <div className="text-center mb-5">
            <h3 className="mb-2 text-body-emphasis">🚗 Những nơi khách hàng đã tin tưởng lựa chọn</h3>
            <p className="mb-0 text-body-tertiary">Cảm ơn quý khách hàng đã đồng hành cùng chúng tôi! Dưới đây là một số địa điểm mà chúng tôi đã giao xe thành công.</p>
          </div>
          <div className="row g-3">
            {diaDiemDaQuaBanners.map((banner) => (
              <div className="col-md-6 col-xl-4" key={banner.id}>
                <div className="img-zoom-hover rounded-3 overflow-hidden position-relative">
                  <a href={banner.link || '#!'}>
                    <img className="latest-img w-100 object-fit-cover" src={banner.image_path} alt={banner.title} />
                  </a>
                  <div className="backdrop-faded">
                    <a className="fw-semibold mb-0 text-secondary-lighter stretched-link" href={banner.link || '#!'}>
                      <span className="fa-solid fa-location-dot text-secondary-lighter me-2"></span>
                      {banner.title}
                    </a>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section><br /><br />
    </>
  );
};

export default HomePage;