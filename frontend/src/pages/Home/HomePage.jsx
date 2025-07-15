// src/pages/Home/HomePage.jsx

import React, { use, useEffect, useRef, useState } from 'react';
import dayjs from 'dayjs'
import 'dayjs/locale/vi'
import { Link } from 'react-router-dom';
import { useAuth } from '../../hooks/useAuth'; // Lấy thông tin user
import { PATHS } from '../../common/constants';
import { BASE_URL_ADMIN } from '../../common/constants';
import { useDispatch, useSelector } from 'react-redux';
import { fetchBanners, selectSliderBanners, selectDaMuaBanners, selectDiaDiemDaQuaBanners } from '../../modules/Banners/slice';
import { fetchCategories, selectAllCategories, selectCategoriesLoading, selectCategoriesError } from '../../modules/Categories/slice'; // Phần import lấy all category
import { fetchTopViewedProducts, selectTopViewedProducts, selectProductsLoading, selectProductsError } from '../../modules/Products/slice';

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
      console.log("Dispatching fetchTopViewedProducts()...");
      dispatch(fetchTopViewedProducts());
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
          console.log("Initializing Isotope for Gallery:", galleryRef.current.children);
          const iso = new window.Isotope(galleryRef.current, {
            itemSelector: '.isotope-item',
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
        className="booking-hero-header position-relative"
        style={{ height: '737.41px' }} // wrapper cao, giữ layout
      >
        <div
          className="bg-holder position-absolute top-0 start-0 w-100 h-100"
          style={{
            backgroundImage: sliderBanners?.image_path
              ? `url(${sliderBanners.image_path})`
              : 'url(../../assets/img/bg/slider.jpg)',
            backgroundSize: 'cover',
            backgroundPosition: 'center',
            backgroundRepeat: 'no-repeat',
            imageRendering: 'auto', // hoặc 'crisp-edges' hoặc 'pixelated' nếu ảnh cần
          }}
        >
          {bannersLoading && (
            <div className="loading-banner text-white text-center pt-5">

            </div>
          )}
        </div>
      </div>
      {/*  */}
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
Hãy bắt đầu hành trình trải nghiệm xe theo cách riêng của bạn!<span className="d-none d-lg-inline-block d-xl-none">... </span><span className="d-lg-none d-xl-inline">This will help you with the pricing that you’ll need, the accommodation facilities, food and beverages, and water rides.</span></p>
                </div>
                <div className="col-6 col-md-5">
                  <div className="img-zoom-hover position-relative h-100 rounded-3 overflow-hidden"><a href="#!"><img className="w-100 h-100 object-fit-cover" src="../../assets/img/gallery/35.png" alt="" /></a>
                    <div className="backdrop-faded"><a className="fw-bold fs-7 text-white stretched-link" href="#!">New Zealand</a>
                      <p className="mb-0 text-white fs-9">17 Hotels</p>
                    </div>
                  </div>
                </div>
                <div className="col-6 col-md-5">
                  <div className="img-zoom-hover position-relative h-100 rounded-3 overflow-hidden"><a href="#!"> <img className="w-100 h-100 object-fit-cover" src="../../assets/img/gallery/36.png" alt="" /></a>
                    <div className="backdrop-faded"><a className="fw-bold fs-7 text-white" href="#!">London</a>
                      <p className="mb-0 text-white fs-9">17 Hotels</p>
                    </div>
                  </div>
                </div>
                <div className="col-md-7">
                  <div className="img-zoom-hover position-relative h-100 rounded-3 overflow-hidden"><a href="#!"> <img className="w-100 h-md-100 object-fit-cover" src="../../assets/img/gallery/37.png" alt="" height="220" /></a>
                    <div className="backdrop-faded"><a className="fw-bold fs-7 text-white" href="#!">Maui</a>
                      <p className="mb-0 text-white fs-9">14 Hotels</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="col-lg-6">
              <div className="d-flex flex-column gap-3 h-100">
                <div className="img-zoom-hover position-relative h-100 rounded-3 overflow-hidden">
                  <a href="#!"><img className="w-100 h-lg-100 object-fit-cover" src="../../assets/img/gallery/38.png" alt="" height="220" /></a>
                  <div className="backdrop-faded"><a className="fw-bold fs-7 text-white" href="#!">Bali, Indonesia</a>
                    <p className="mb-0 text-white fs-9">51 Hotels</p>
                  </div>
                </div><button className="btn btn-primary w-100 py-3 fs-8">Explore more<span className="fa-solid fa-chevron-right ms-2" data-fa-transform="down-2"></span></button>
              </div>
            </div>
          </div>
        </div>
      </section>
      {/*  */}
      <section className="pb-10 pt-0">
        <div className="bg-holder d-none d-md-block" style={{ backgroundImage: "url(../../assets/img/bg/bg-left-28.png)", backgroundSize: "7%", backgroundPosition: "left 27%" }}></div>
        <div className="bg-holder d-none d-md-block" style={{ backgroundImage: "url(../../assets/img/bg/bg-right-28.png)", backgroundSize: "16%", backgroundPosition: "right -25px" }}></div>
        <div className="container-medium text-center mb-11 position-relative">
          <h3 className="mb-2 text-body-emphasis">Travel more, spend less</h3>
          <p className="text-body-tertiary mb-0">Working with Phoenix means you’ll have all the plans and the perfect price list to help you plan.</p>
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
                  <div className="swiper-slide w-sm-auto" key={category.id}>
                    <Link to={`${PATHS.PRODUCTS_BY_CATEGORY_SLUG}${category.slug}`} className="position-relative rounded-3 overflow-hidden d-block">
                      <img className="w-100 w-sm-auto object-fit-cover" src={`${PATHS.ADMIN_DASHBOARD}storage/${category.img}`} alt={category.name} width="420px" height="220px" />
                      <div className="img-backdrop-faded">
                        <div className="image-reveal-content mb-3">
                          <div className="d-flex align-items-center gap-2 mb-2">
                            {/* <span className="fa-solid fa-hotel text-secondary-lighter"></span> */}
                            {/* <h6 className="mb-0 text-secondary-lighter fw-semibold">17 Hotels</h6> */}
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
                    <div className="col-xl-4">
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
                                {/* <span className="badge badge-phoenix px-1 me-2 badge-phoenix-warning">promoted</span> */}
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
        <div className="bg-holder d-none d-xl-block" style={{ backgroundImage: "url(../../assets/img/bg/bg-left-30.png)", backgroundSize: "40%", backgroundPosition: "left", zIndex: 1 }}></div>
        <div className="bg-holder d-none d-xl-block" style={{ backgroundImage: "url(../../assets/img/bg/bg-right-30.png)", backgroundSize: "26%", backgroundPosition: "right 25px", zIndex: 1 }}></div>
        <div className="bg-booking-gallery"></div>
        {/* <div className="container-medium position-relative z-2">
          <h3 className="mb-2 text-body-emphasis text-center">Popular Attractions</h3>
          <p className="mb-0 text-body-tertiary text-center mb-5">Explore the most popular and frequently visited destinations around the world</p>
          <ul className="nav mb-6 justify-content-center flex-wrap mx-auto w-max-content" data-filter-nav="data-filter-nav">
            <li className="nav-item"><a className="isotope-nav cursor-pointer active" data-filter=".tokyo">Tokyo</a></li>
            <li className="nav-item"><a className="isotope-nav cursor-pointer" data-filter=".bali">Bali</a></li>
            <li className="nav-item"><a className="isotope-nav cursor-pointer" data-filter=".sydney">Sydney</a></li>
            <li className="nav-item"> <a className="isotope-nav cursor-pointer" data-filter=".paris">Paris</a></li>
          </ul>
          <div className="row g-0 justify-content-center">
            <div className="col-md-9 col-lg-7 col-xl-5">
              <div className="row gx-0 gy-3" id="image_gallery" data-sl-isotope='{"layoutMode":"packery","filter":".tokyo"}'>
                <div className="col-12 isotope-item w-100 tokyo">
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img className="w-100 object-fit-cover" src="../../assets/img/gallery/tokyo-1.png" alt="" height="220" /></a><button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span className="far fa-heart"></span></button>
                    <div className="backdrop-faded"><a className="text-white fw-bolder fs-7 stretched-link" href="#!">King Power Mahanakhon</a>
                      <h5 className="text-light mb-0"><span className="fa-solid fa-star text-warning me-1" data-fa-transform="shrink-2"></span>4.8<span className="fs-10">/5 </span>(1.4k review)</h5>
                    </div>
                  </div>
                </div>
                <div className="col-12 isotope-item w-100 tokyo">
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img className="w-100 object-fit-cover" src="../../assets/img/gallery/tokyo-2.png" alt="" height="220" /></a><button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span className="far fa-heart"></span></button>
                    <div className="backdrop-faded"><a className="text-white fw-bolder fs-7 stretched-link" href="#!">Meiji Jingu</a>
                      <h5 className="text-light mb-0"><span className="fa-solid fa-star text-warning me-1" data-fa-transform="shrink-2"></span>5<span className="fs-10">/5 </span>(2.2k review)</h5>
                    </div>
                  </div>
                </div>
                <div className="col-12 isotope-item w-100 tokyo">
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img className="w-100 object-fit-cover" src="../../assets/img/gallery/tokyo-3.png" alt="" height="220" /></a><button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span className="far fa-heart"></span></button>
                    <div className="backdrop-faded"><a className="text-white fw-bolder fs-7 stretched-link" href="#!">Imperial Palace</a>
                      <h5 className="text-light mb-0"><span className="fa-solid fa-star text-warning me-1" data-fa-transform="shrink-2"></span>4.5<span className="fs-10">/5 </span>(1.2k review)</h5>
                    </div>
                  </div>
                </div>
                <div className="col-12 isotope-item w-100 bali">
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img className="w-100 object-fit-cover" src="../../assets/img/gallery/bali-1.png" alt="" height="220" /></a><button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span className="far fa-heart"></span></button>
                    <div className="backdrop-faded"><a className="text-white fw-bolder fs-7 stretched-link" href="#!">Nusa Lembongan</a>
                      <h5 className="text-light mb-0"><span className="fa-solid fa-star text-warning me-1" data-fa-transform="shrink-2"></span>4.7<span className="fs-10">/5 </span>(1.2k review)</h5>
                    </div>
                  </div>
                </div>
                <div className="col-12 isotope-item w-100 bali">
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img className="w-100 object-fit-cover" src="../../assets/img/gallery/bali-2.png" alt="" height="220" /></a><button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span className="far fa-heart"></span></button>
                    <div className="backdrop-faded"><a className="text-white fw-bolder fs-7 stretched-link" href="#!">Waterbom Bali</a>
                      <h5 className="text-light mb-0"><span className="fa-solid fa-star text-warning me-1" data-fa-transform="shrink-2"></span>4.5<span className="fs-10">/5 </span>(1.8k review)</h5>
                    </div>
                  </div>
                </div>
                <div className="col-12 isotope-item w-100 bali">
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img className="w-100 object-fit-cover" src="../../assets/img/gallery/bali-3.png" alt="" height="220" /></a><button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span className="far fa-heart"></span></button>
                    <div className="backdrop-faded"><a className="text-white fw-bolder fs-7 stretched-link" href="#!">Kuta Beach</a>
                      <h5 className="text-light mb-0"><span className="fa-solid fa-star text-warning me-1" data-fa-transform="shrink-2"></span>5<span className="fs-10">/5 </span>(4.1k review)</h5>
                    </div>
                  </div>
                </div>
                <div className="col-12 isotope-item w-100 sydney">
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img className="w-100 object-fit-cover" src="../../assets/img/gallery/sydney-1.png" alt="" height="220" /></a><button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span className="far fa-heart"></span></button>
                    <div className="backdrop-faded"><a className="text-white fw-bolder fs-7 stretched-link" href="#!">The Rocks</a>
                      <h5 className="text-light mb-0"><span className="fa-solid fa-star text-warning me-1" data-fa-transform="shrink-2"></span>4.8<span className="fs-10">/5 </span>(1.9k review)</h5>
                    </div>
                  </div>
                </div>
                <div className="col-12 isotope-item w-100 sydney">
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img className="w-100 object-fit-cover" src="../../assets/img/gallery/sydney-2.png" alt="" height="220" /></a><button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span className="far fa-heart"></span></button>
                    <div className="backdrop-faded"><a className="text-white fw-bolder fs-7 stretched-link" href="#!">Manly Beach</a>
                      <h5 className="text-light mb-0"><span className="fa-solid fa-star text-warning me-1" data-fa-transform="shrink-2"></span>4.7<span className="fs-10">/5 </span>(1.1k review)</h5>
                    </div>
                  </div>
                </div>
                <div className="col-12 isotope-item w-100 sydney">
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img className="w-100 object-fit-cover" src="../../assets/img/gallery/sydney-3.png" alt="" height="220" /></a><button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span className="far fa-heart"></span></button>
                    <div className="backdrop-faded"><a className="text-white fw-bolder fs-7 stretched-link" href="#!">Darling Harbour</a>
                      <h5 className="text-light mb-0"><span className="fa-solid fa-star text-warning me-1" data-fa-transform="shrink-2"></span>5<span className="fs-10">/5 </span>(3.2k review)</h5>
                    </div>
                  </div>
                </div>
                <div className="col-12 isotope-item w-100 paris">
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img className="w-100 object-fit-cover" src="../../assets/img/gallery/paris-1.png" alt="" height="220" /></a><button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span className="far fa-heart"></span></button>
                    <div className="backdrop-faded"><a className="text-white fw-bolder fs-7 stretched-link" href="#!">Louvre Museum</a>
                      <h5 className="text-light mb-0"><span className="fa-solid fa-star text-warning me-1" data-fa-transform="shrink-2"></span>4.4<span className="fs-10">/5 </span>(4.3k review)</h5>
                    </div>
                  </div>
                </div>
                <div className="col-12 isotope-item w-100 paris">
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img className="w-100 object-fit-cover" src="../../assets/img/gallery/paris-2.png" alt="" height="220" /></a><button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span className="far fa-heart"></span></button>
                    <div className="backdrop-faded"><a className="text-white fw-bolder fs-7 stretched-link" href="#!">Montmartre</a>
                      <h5 className="text-light mb-0"><span className="fa-solid fa-star text-warning me-1" data-fa-transform="shrink-2"></span>5<span className="fs-10">/5 </span>(5k review)</h5>
                    </div>
                  </div>
                </div>
                <div className="col-12 isotope-item w-100 paris">
                  <div className="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img className="w-100 object-fit-cover" src="../../assets/img/gallery/paris-3.png" alt="" height="220" /></a><button className="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span className="far fa-heart"></span></button>
                    <div className="backdrop-faded"><a className="text-white fw-bolder fs-7 stretched-link" href="#!">Tuileries Garden</a>
                      <h5 className="text-light mb-0"><span className="fa-solid fa-star text-warning me-1" data-fa-transform="shrink-2"></span>4.1<span className="fs-10">/5 </span>(4.5k review)</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div className="d-flex align-items-center justify-content-center gap-3 mt-4">
            <h5 className="mb-0">Explore more popular destination</h5>
            <div className="btn-ping">
              <div className="btn-ping-bg"></div><button className="btn border p-0 fs-8 text-primary d-flex align-items-center justify-content-center"><span className="fa-solid fa-arrow-right"></span></button>
            </div>
          </div>
        </div> */}
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
          <div className="swiper-container theme-slider" data-swiper='{"loop":false,"slidesPerView":1.3,"spaceBetween":32,"speed":2000,"autoplay":true,"centeredSlides":true,"simulateTouch":false,"breakpoints":{"540":{"slidesPerView":1.5},"768":{"slidesPerView":1.8},"1200":{"slidesPerView":2},"1530":{"slidesPerView":2.8}}}' ref={swiperRef2}>
            <div className="swiper-wrapper">
              {daMuaBanners.map((banner) => (
                <div className="swiper-slide rounded-3 overflow-hidden">
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
            {/*  */}
            {/* <div className="col-md-6 col-xl-4">
              <div className="img-zoom-hover rounded-3 overflow-hidden position-relative">
                <a href="#!">
                  <img className="latest-img w-100 object-fit-cover" src={firstDiaDiemBanner.image_path} alt="" />
                </a>
                <div className="backdrop-faded"><a className="fw-semibold mb-0 text-secondary-lighter stretched-link" href="#!"><span className="fa-solid fa-location-dot text-secondary-lighter me-2"></span>Grand Canyon</a></div>
              </div>
            </div> */}
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
      </section>

      {/* Phần tải app */}
      {/* <section className="pt-9 pb-10">
        <div className="bg-holder d-none d-xl-block" style={{ backgroundImage: 'url(../../assets/img/bg/bg-left-33.png)', backgroundSize: 'auto', backgroundPosition: '-8% 38px' }}></div>
        <div className="bg-holder d-none d-xl-block" style={{ backgroundImage: 'url(../../assets/img/bg/bg-right-33.png)', backgroundSize: '18%', backgroundPosition: 'right' }}></div>
        <div className="bg-get-app"></div>
        <div className="container-medium position-relative">
          <div className="row g-0 justify-content-center">
            <div className="col-lg-10 col-xl-8 col-xxl-7">
              <div className="d-md-flex align-items-center gap-5 text-center text-md-start">
                <img className="img-fluid d-dark-none" src="../../assets/img/spot-illustrations/i-phone.png" alt="" style={{ maxHeight: '540px' }} /><img className="img-fluid d-light-none" src="../../assets/img/spot-illustrations/i-phone-dark.png" alt="" style={{ maxHeight: '540px' }} />
                <div className="mt-5 mt-md-0">
                  <div className="d-none d-md-block"><img className="d-dark-none" src="../../assets/img/spot-illustrations/41.png" alt="" width="200" /><img className="d-light-none" src="../../assets/img/spot-illustrations/dark_41.png" alt="" width="200" /></div>
                  <h3 className="fw-bolder mt-4">Get The App Now</h3>
                  <p className="text-body-tertiary">Designed to provide the best user experience possible to all our customers with activities ranging from anything thinkable to the unthinkables.</p><a className="me-2" href="#!"><img src="../../assets/img/generic/play-store.png" alt="" height="32" /></a><a href="#!"><img src="../../assets/img/generic/app-store.png" alt="" height="32" /></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> */}
    </>
  );
};

export default HomePage;