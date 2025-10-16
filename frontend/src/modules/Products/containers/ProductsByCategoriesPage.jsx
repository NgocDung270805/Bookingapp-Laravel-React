// src/modules/Products/containers/ProductsByCategoriesPage.jsx

import React, { useEffect, useState, useMemo } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { Link, useParams } from 'react-router-dom';
import {
  fetchProducts,
  selectAllProducts,
  selectProductsLoading,
  selectProductsError,
} from '../slice';
import { PATHS } from '../../../common/constants';
import { DotLottieReact } from '@lottiefiles/dotlottie-react';
import LoadingIndicator from '../../../core/components/LoadingIndicator';
import ErrorIndicator from '../../../core/components/ErrorIndicator';

const ProductsByCategoriesPage = () => {
  const dispatch = useDispatch();
  const { categorySlug } = useParams();
  const [searchName, setSearchName] = useState('');
  const [searchSegment, setSearchSegment] = useState('');
  const [sortType, setSortType] = useState('');
  const [priceRange, setPriceRange] = useState({ min: '', max: '' });
  const [selectedFeatures, setSelectedFeatures] = useState([]);

  // Gọi API khi slug thay đổi
  useEffect(() => {
    if (categorySlug) {
      document.title = `Sản phẩm - ${categorySlug.replace(/-/g, ' ').toUpperCase()}`;
      dispatch(fetchProducts(categorySlug));
    }
  }, [dispatch, categorySlug]);

  // Selector dữ liệu
  const rawProductsData = useSelector((state) => state.products); // toàn bộ object
  const allProducts = rawProductsData.products?.data || [];
  const category = rawProductsData.category || null;
  const loading = useSelector(selectProductsLoading);
  const error = useSelector(selectProductsError);

  // Filter and sort products based on all criteria
  const products = useMemo(() => {
    let filteredProducts = allProducts.filter(product => {
      const nameMatch = product.name.toLowerCase().includes(searchName.toLowerCase());
      const segmentMatch = product.categories?.some(cat =>
        cat.name.toLowerCase().includes(searchSegment.toLowerCase())
      ) || !searchSegment;

      // Price range filter
      const price = product.variants?.[0]?.discount_price || 0;
      const priceMatch =
        (!priceRange.min || price >= parseFloat(priceRange.min)) &&
        (!priceRange.max || price <= parseFloat(priceRange.max));

      return nameMatch && segmentMatch && priceMatch;
    });

    // Sort products based on sortType
    switch (sortType) {
      case 'price_desc':
        return filteredProducts.sort((a, b) =>
          (b.variants?.[0]?.discount_price || 0) - (a.variants?.[0]?.discount_price || 0)
        );
      case 'price_asc':
        return filteredProducts.sort((a, b) =>
          (a.variants?.[0]?.discount_price || 0) - (b.variants?.[0]?.discount_price || 0)
        );
      case 'views_desc':
        return filteredProducts.sort((a, b) => (b.views || 0) - (a.views || 0));
      case 'views_asc':
        return filteredProducts.sort((a, b) => (a.views || 0) - (b.views || 0));
      default:
        return filteredProducts;
    }
  }, [allProducts, searchName, searchSegment, sortType, priceRange, selectedFeatures]);

  // Handle search input changes
  const handleNameSearch = (e) => {
    setSearchName(e.target.value);
  };

  const handleSegmentSearch = (e) => {
    setSearchSegment(e.target.value);
  };

  // Handle sort change
  const handleSortChange = (e) => {
    setSortType(e.target.value);
  };

  // Handle price range change
  const handlePriceRangeChange = (e) => {
    const { name, value } = e.target;
    setPriceRange(prev => ({
      ...prev,
      [name]: value
    }));
  };

  // Handle feature selection
  const handleFeatureChange = (feature) => {
    setSelectedFeatures(prev => {
      if (prev.includes(feature)) {
        return prev.filter(f => f !== feature);
      }
      return [...prev, feature];
    });
  };

  // Handle filter reset
  const handleResetFilters = () => {
    setPriceRange({ min: '', max: '' });
    setSelectedFeatures([]);
    setSortType('');
  };

  // Hiển thị loading
  if (loading) {
    return <LoadingIndicator />;
  }

  // Hiển thị lỗi
  if (error) {
    return <ErrorIndicator message={error} />;
  }

  return (
    <>
      <div className="navbar-responsive-navitems navbar-expand border-y bg-body-emphasis border-translucent py-2">
        <div className="container-medium d-flex flex-between-center" data-navbar="data-navbar">
          <ul className="navbar-nav justify-content-end align-items-center">
            <li className="nav-item" data-nav-item="data-nav-item"><Link className="nav-link px-3 ps-0 text-primary" to={PATHS.HOME}>Trang chủ</Link></li>
            <li className="nav-item" data-nav-item="data-nav-item"><Link className="nav-link px-3" to={PATHS.MY_BOOKINGS}>Lịch xem xe</Link></li>
            {/* <li className="nav-item" data-nav-item="data-nav-item"><Link className="nav-link px-3  " href="#!">So sánh xe</Link></li> */}
            {/* <li className="nav-item" data-nav-item="data-nav-item"><Link className="nav-link px-3  " href="#!">Check out</Link></li> */}
            {/* <li className="nav-item" data-nav-item="data-nav-item"><Link className="nav-link px-3  " href="#!">Payment</Link></li> */}
            {/* <li className="nav-item" data-nav-item="data-nav-item"><Link className="nav-link px-3  " href="#!">Gallery</Link></li> */}
            {/* <li className="nav-item dropdown" data-nav-item="data-nav-item" data-more-item="data-more-item"><a className="nav-link dropdown-toggle dropdown-caret-none fw-bold pe-0 ps-3" href="javascript: void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-boundary="window" data-bs-reference="parent"> More<span className="fas fa-angle-down ms-2"></span></a>
              <div className="dropdown-menu dropdown-menu-end category-list" aria-labelledby="navbarDropdown" data-category-list="data-category-list"></div>
            </li> */}
          </ul>
        </div>
      </div>


      <section className="py-0">
        <div className="container-small">
          <nav className="navbar navbar-landing navbar-home navbar-expand py-4 px-0">
            <ul className="navbar-nav mx-auto mt-3 mt-lg-0 gap-2">
              <li className="nav-item"><a className="nav-link fw-bold rounded-3 active" aria-current="page" href="#!"> <span className="me-2 fa-solid fa-car"></span>Xe Theo Thương Hiệu</a></li>
              <li className="nav-item"><a className="nav-link fw-bold rounded-3" aria-current="page" href="#!"> <span className="fa-solid fa-eye"></span>Xem Chi Tiết</a></li>
              <li className="nav-item"><a className="nav-link fw-bold rounded-3" aria-current="page" href="#!"> <span className="fa-solid fa-calendar-check me-2"></span>Đặt Lịch</a></li>
            </ul>
          </nav>
        </div>
      </section>

      <div className="container-medium-md px-0 px-md-3">
        <div className="px-3 py-8 position-relative">
          <div className="bg-holder rounded-md-2" style={{ backgroundImage: 'url(https://png.pngtree.com/background/20250102/original/pngtree-soft-orange-banner-background-vector-picture-image_16003491.jpg)', backgroundPosition: 'center', backgroundSize: 'cover' }}></div>
          <div className="row gx-0 gy-3 gy-md-0 align-items-center mx-auto p-3 bg-body-emphasis rounded-5 rounded-md-pill position-relative border w-lg-75">
            <div className="col-12 col-md">
              <div className="form-icon-container border-bottom border-bottom-md-0 border-translucent pb-3 pb-md-0">
                <input
                  className="form-control form-icon-input border-0 py-0 shadow-none fs-8"
                  type="text"
                  placeholder="Tên Xe"
                  value={searchName}
                  onChange={handleNameSearch}
                />
                <span className="fa-solid fa-car form-icon text-body-tertiary top-0" data-fa-transform="down-2"></span>
              </div>
            </div>
            <div className="col-6 col-md">
              <div className="form-icon-container flatpickr-input-container">
                <input
                  className="form-control form-icon-input border-y-0 border-start-0 border-start-md py-0 shadow-none border-translucent fs-8 rounded-0"
                  type="text"
                  placeholder="Phân khúc xe"
                  value={searchSegment}
                  onChange={handleSegmentSearch}
                />
                <span className="fa-solid fa-car form-icon top-0 text-body-tertiary" data-fa-transform="down-2"></span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <section className="py-0">
        <div className="container-medium">
          <div className="py-6">
            <div className="d-flex">
              <select
                className="form-select w-sm-auto me-4"
                id="hotelSort"
                name="Hotel sort"
                value={sortType}
                onChange={handleSortChange}
              >
                <option value="">Mặc định</option>
                <option value="price_desc">Giá giảm dần</option>
                <option value="price_asc">Giá tăng dần</option>
                <option value="views_desc">Lượt xem cao nhất</option>
                <option value="views_asc">Lượt xem thấp nhất</option>
              </select>
              <button className="btn btn-phoenix-secondary text-nowrap px-3 px-md-4 ms-auto me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#hotelFilterOffcanvas" aria-controls="hotelFilterOffcanvas">
                <span className="fa-solid fa-filter me-md-2"></span>
                <span className="d-none d-md-inline-block">Lọc</span>
              </button>
            </div>
          </div>
          <div className="row g-3 mb-6">
            {products.length > 0 ? (
              products.map((product) => (
                <div key={product.id} className="col-sm-6 col-lg-4 col-xl-3">
                  <div className="hover-actions-trigger mx-auto rounded-3 overflow-hidden">
                    {product.img ? (
                      <img
                        src={`${PATHS.ADMIN_DASHBOARD}storage/${product.img}`}
                        alt={product.name}
                        className="img-fluid"
                        style={{ width: '336px', height: '420px', objectFit: 'cover' }}
                      />
                    ) : (
                      <img
                        className="img-fluid"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkmw2SF6CxOmnd63-nmTYy2GPZFR-zKQCLLQ&s"
                        alt="placeholder"
                        style={{ width: '336px', height: '420px', objectFit: 'cover' }}
                      />
                    )}

                    <div className="hover-actions top-0 end-0 mt-4 me-4 z-5">
                      <button className="btn btn-wish">
                        <span className="far fa-heart" data-fa-transform="down-1"></span>
                      </button>
                    </div>

                    <div className="backdrop-faded backdrop-secondary-dark h-100 d-flex flex-column justify-content-end">
                      <a
                        className="stretched-link fs-7 text-white fw-bold"
                        href={`/products/${product.slug}`}
                      >
                        {product.name}
                      </a>
                      <p className="mb-2 text-secondary-lighter">
                        <span className="fa-solid fa-car-side me-2"></span>
                        {product.categories?.length > 0
                          ? product.categories.map((cat) => cat.name).join(', ')
                          : 'N/A'}
                      </p>
                      <div className="d-flex align-items-center gap-3">
                        <span className="badge badge-phoenix fs-8 fw-normal">
                          <span className="fa-solid fa-eye me-1 fs-9" data-fa-transform="up-1"></span>
                          <span className="badge-label">{product.views || 0}</span>
                        </span>
                        <h4 className="mb-0 text-white fw-bold text-nowrap">
                          {product?.variants?.[0]?.pricing_type === 'public_price' ? (
                            <>
                              {product?.variants?.[0]?.discount_price > 0 && (
                                <>
                                  {new Intl.NumberFormat('vi-VN', {
                                    style: 'currency',
                                    currency: 'VND'
                                  }).format(product?.variants?.[0]?.discount_price)}
                                </>
                              )}
                            </>
                          ) : (
                            // <button className="btn btn-lg btn-warning rounded-pill w-100 fs-9 fs-sm-8" onClick={() => setShowBookingModal(true)}>
                            // <span className="fas fa-calendar-alt me-2"></span>Nhận báo giá
                            // </button>
                            <p>Liên hệ</p>
                          )}
                        </h4>
                      </div>
                    </div>
                  </div>
                </div>
              ))
            ) : (
              <div style={{ display: "flex", flexDirection: "column", justifyContent: "center", alignItems: "center", height: "50vh" }}>
                <DotLottieReact
                  src="https://lottie.host/ba54bfa2-2a03-4b70-8524-78b1c56e2bd8/zXqz2dLGow.lottie"
                  loop
                  autoplay
                  style={{ width: "500px", height: "500px" }} />
              </div>
            )}
          </div>
        </div>
      </section>

      {/* Lọc */}
      <div className="offcanvas offcanvas-end" id="hotelFilterOffcanvas" aria-labelledby="hotelFilterOffcanvasLabel">
        <div className="offcanvas-header p-4 bg-body-highlight">
          <h5 className="mb-0 text-body-highlight" id="hotelFilterOffcanvasLabel">Bộ lọc</h5>
          <button className="btn btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div className="offcanvas-body scrollbar p-4">
          <h4 className="text-body-highlight mb-4">Phạm vi giá</h4>
          <div className="row g-2">
            <div className="col-6">
              <div className="form-icon-container">
                <input
                  className="form-control form-icon-input"
                  type="number"
                  placeholder="Giá thấp nhất"
                  name="min"
                  value={priceRange.min}
                  onChange={handlePriceRangeChange}
                />
                <span className="fa-solid fa-dollar-sign form-icon text-body-tertiary fs-9"></span>
              </div>
            </div>
            <div className="col-6">
              <div className="form-icon-container">
                <input
                  className="form-control form-icon-input"
                  type="number"
                  placeholder="Giá cao nhất"
                  name="max"
                  value={priceRange.max}
                  onChange={handlePriceRangeChange}
                />
                <span className="fa-solid fa-dollar-sign form-icon text-body-tertiary fs-9"></span>
              </div>
            </div>
          </div>

          <hr className="my-5" />

          <h4 className="mb-4 text-body-highlight">Tính năng xe</h4>
          <div className="row g-3">
            <div className="col-6">
              <div className="form-check">
                <input
                  className="form-check-input"
                  type="checkbox"
                  id="automatic"
                  checked={selectedFeatures.includes('automatic')}
                  onChange={() => handleFeatureChange('automatic')}
                />
                <label className="form-check-label fs-8 text-body-highlight fw-normal" htmlFor="automatic">
                  Số tự động
                </label>
              </div>
              <div className="form-check">
                <input
                  className="form-check-input"
                  type="checkbox"
                  id="gps"
                  checked={selectedFeatures.includes('gps')}
                  onChange={() => handleFeatureChange('gps')}
                />
                <label className="form-check-label fs-8 text-body-highlight fw-normal" htmlFor="gps">
                  GPS
                </label>
              </div>
              <div className="form-check">
                <input
                  className="form-check-input"
                  type="checkbox"
                  id="bluetooth"
                  checked={selectedFeatures.includes('bluetooth')}
                  onChange={() => handleFeatureChange('bluetooth')}
                />
                <label className="form-check-label fs-8 text-body-highlight fw-normal" htmlFor="bluetooth">
                  Bluetooth
                </label>
              </div>
            </div>
            <div className="col-6">
              <div className="form-check">
                <input
                  className="form-check-input"
                  type="checkbox"
                  id="backup-camera"
                  checked={selectedFeatures.includes('backup-camera')}
                  onChange={() => handleFeatureChange('backup-camera')}
                />
                <label className="form-check-label fs-8 text-body-highlight fw-normal" htmlFor="backup-camera">
                  Camera lùi
                </label>
              </div>
              <div className="form-check">
                <input
                  className="form-check-input"
                  type="checkbox"
                  id="sunroof"
                  checked={selectedFeatures.includes('sunroof')}
                  onChange={() => handleFeatureChange('sunroof')}
                />
                <label className="form-check-label fs-8 text-body-highlight fw-normal" htmlFor="sunroof">
                  Cửa sổ trời
                </label>
              </div>
              <div className="form-check">
                <input
                  className="form-check-input"
                  type="checkbox"
                  id="parking-sensor"
                  checked={selectedFeatures.includes('parking-sensor')}
                  onChange={() => handleFeatureChange('parking-sensor')}
                />
                <label className="form-check-label fs-8 text-body-highlight fw-normal" htmlFor="parking-sensor">
                  Cảm biến đỗ xe
                </label>
              </div>
            </div>
          </div>

          <hr className="my-5" />

          <h4 className="mb-4">Đánh giá</h4>
          <div className="rating-options">
            <input className="rating-radio btn-check" type="radio" name="ratingOption" id="option5" />
            <label className="btn w-100 d-flex align-items-center gap-1 mb-2" htmlFor="option5">
              <span className="fa-solid fa-star text-warning"></span>
              <span className="fa-solid fa-star text-warning"></span>
              <span className="fa-solid fa-star text-warning"></span>
              <span className="fa-solid fa-star text-warning"></span>
              <span className="fa-solid fa-star text-warning"></span>
            </label>

            <input className="rating-radio btn-check" type="radio" name="ratingOption" id="option4" />
            <label className="btn w-100 d-flex align-items-center gap-1 mb-2" htmlFor="option4">
              <span className="fa-solid fa-star text-warning"></span>
              <span className="fa-solid fa-star text-warning"></span>
              <span className="fa-solid fa-star text-warning"></span>
              <span className="fa-solid fa-star text-warning"></span>
              <span className="fa-regular fa-star text-warning"></span>
              <span className="text-body ms-1 fs-8 fw-normal">trở lên</span>
            </label>
          </div>
        </div>
        <div className="p-4 border-top border-translucent d-flex gap-2">
          <button className="btn btn-lg btn-phoenix-primary" onClick={handleResetFilters}>Đặt lại</button>
          <button className="btn btn-lg btn-primary flex-1" data-bs-dismiss="offcanvas">
            Áp dụng bộ lọc
          </button>
        </div>
      </div>

      {/* Footer */}
      <section className="py-0 mb-9">
        <div className="container-medium-md px-0 px-md-3">
          <div className="p-5 p-sm-7 py-xl-12 px-xl-15 rounded-md-2 overflow-hidden position-relative">
            <div className="bg-holder bg-holder overlay bg-opacity-85" style={{ backgroundImage: "url(../../../../assets/img/bg/footerProduct.jpg)", backgroundPosition: "center", backgroundSize: "cover" }}></div>
            <div className="row g-5 position-relative justify-content-between">
              <div className="col-md-6 col-lg-3">
                <h5 className="text-white mb-3"></h5>
                <div className="row g-3">
                  <div className="col">
                    <ul className="list-unstyled mb-0">
                      <li className="mb-1"><Link to={PATHS.HOME} className="text-secondary-lighter">Home</Link></li>
                      <li className="mb-1"><Link to={PATHS.ABOUT} className="text-secondary-lighter">Giới thiệu</Link></li>
                      <li className="mb-1"><Link to={PATHS.PRIVACY_POLICY} className="text-secondary-lighter">Chính sách bảo mật</Link></li>
                      <li className="mb-1"><Link to={PATHS.BOOKING_POLICY} className="text-secondary-lighter">Chính sách đặt lịch</Link></li>
                    </ul>
                  </div>
                  <div className="col">
                    <ul className="list-unstyled mb-0">
                      <li className="mb-1"><Link to={PATHS.FAQ} className="text-secondary-lighter">Câu hỏi thường gặp</Link></li>
                      <li className="mb-1"><Link to={PATHS.CONTACT} className="text-secondary-lighter">Liên hệ</Link></li>
                      <li className="mb-1"><Link to={PATHS.WARRANTY_POLICY} className="text-secondary-lighter">Chính sách bảo hành</Link></li>
                      <li className="mb-1"><Link to={PATHS.TERMS} className="text-secondary-lighter">Điều khoản</Link></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div className="col-md-6 col-lg-3">
                <h5 className="text-white mb-3">Liên hệ</h5><a className="d-block text-secondary-lighter mb-1 text-nowrap" href="mailto:phungdung2708@gmail.com"><span className="fa-solid fa-envelope me-2 me-lg-1 me-xl-2"></span>Phungdung2708@gmail.com</a><a className="d-block text-secondary-lighter mb-1" href="tel:+84 965336741"><span className="fa-solid fa-phone me-2 me-lg-1 me-xl-2"> </span>+84 965.336.741</a>
              </div>
              <div className="col-lg-5">
                <h2 className="text-white mb-2 fw-semibold">Trải nghiệm một cách chọn vẹn nhất</h2>
                <p className="mb-5 text-secondary-lighter">Đăng ký để nhận thông báo<br />về các ưu đãi ngay lập tức </p>
                <div className="d-flex gap-2">
                  <div className="form-icon-container flex-1"><input className="form-control form-icon-input" type="text" placeholder="Email của bạn " /><span className="fa-solid fa-envelope form-icon text-body fs-9" data-fa-transform="up-2"></span></div><button className="btn btn-primary rounded">Gửi</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </>
  );
};

export default ProductsByCategoriesPage;