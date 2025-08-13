// src/modules/Products/containers/ProductsPage.jsx

import React, { useEffect, useState } from 'react';
import { useAppDispatch, useAppSelector } from '../../../appRedux';
import { Link } from 'react-router-dom';
import {
  fetchProducts,
  toggleFavorite,
  // Bỏ các action CRUD sản phẩm không dùng ở đây
} from '../slice';

// Import các component Modal mới
import CommentFormModal from '../components/CommentFormModal';
import BookingFormModal from '../components/BookingFormModal';
import { PATHS } from '../../../common/constants'; // Import PATHS nếu cần

const ProductsPage = () => {
  useEffect(() => {
    // Thay đổi tiêu đề trang khi component này được render
    document.title = 'Products - BookingApp';
  }, []); // [] đảm bảo hiệu ứng chỉ chạy một lần sau khi render đầu tiên
  const dispatch = useAppDispatch();
  const { products, loading, error } = useAppSelector((state) => state.products);

  // States để quản lý hiển thị modal
  const [showCommentModal, setShowCommentModal] = useState(false);
  const [showBookingModal, setShowBookingModal] = useState(false);
  const [selectedProductIdForAction, setSelectedProductIdForAction] = useState(null); // Lưu ID sản phẩm được chọn cho hành động

  // Fetch products khi component mount
  useEffect(() => {
    dispatch(fetchProducts());
  }, [dispatch]);

  // ===========================================
  // HÀM XỬ LÝ CÁC NÚT HÀNH ĐỘNG
  // ===========================================

  const handleToggleFavorite = async (productId) => {
    const resultAction = await dispatch(toggleFavorite(productId));
    if (toggleFavorite.fulfilled.match(resultAction)) {
      alert(resultAction.payload.message);
    } else {
      alert(`Lỗi yêu thích: ${JSON.stringify(resultAction.payload)}`);
    }
  };

  const handleOpenCommentModal = (productId) => {
    setSelectedProductIdForAction(productId);
    setShowCommentModal(true);
  };

  const handleCloseCommentModal = () => {
    setShowCommentModal(false);
    setSelectedProductIdForAction(null);
  };

  const handleOpenBookingModal = (productId) => {
    setSelectedProductIdForAction(productId);
    setShowBookingModal(true);
  };

  const handleCloseBookingModal = () => {
    setShowBookingModal(false);
    setSelectedProductIdForAction(null);
  };

  // ===========================================
  // HIỂN THỊ UI
  // ===========================================

  if (loading) {
    return <div>Đang tải sản phẩm...</div>;
  }

  if (error) {
    return <div style={{ color: 'red' }}>Lỗi: {JSON.stringify(error)}</div>;
  }

  return (
    <>
      <div className="navbar-responsive-navitems navbar-expand border-y bg-body-emphasis border-translucent py-2">
        <div className="container-medium d-flex flex-between-center" data-navbar="data-navbar">
          <ul className="navbar-nav justify-content-end align-items-center">
            <li className="nav-item" data-nav-item="data-nav-item"><Link className="nav-link px-3 ps-0 text-primary" to={PATHS.HOME}>Home</Link></li>
            {/* <li className="nav-item" data-nav-item="data-nav-item"><Link className="nav-link px-3  " href="#!">Chi tiết sản phẩm</Link></li> */}
            {/* <li className="nav-item" data-nav-item="data-nav-item"><Link className="nav-link px-3  " href="#!">Hotel Compare</Link></li> */}
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
          <div className="bg-holder rounded-md-2" style={{ backgroundImage: 'url(../../../../assets/img/bg/42.png)', backgroundPosition: 'center', backgroundSize: 'cover' }}></div>
          <div className="row gx-0 gy-3 gy-md-0 align-items-center mx-auto p-3 bg-body-emphasis rounded-5 rounded-md-pill position-relative border w-lg-75">
            <div className="col-12 col-md">
              <div className="form-icon-container border-bottom border-bottom-md-0 border-translucent pb-3 pb-md-0">
                <input className="form-control form-icon-input border-0 py-0 shadow-none fs-8" type="text" placeholder="Tên Xe" />
                <span className="fa-solid fa-car form-icon text-body-tertiary top-0" data-fa-transform="down-2"></span></div>
            </div>
            <div className="col-6 col-md">
              <div className="form-icon-container flatpickr-input-container">
                <input className="form-control datetimepicker form-icon-input border-y-0 border-start-0 border-start-md py-0 shadow-none border-translucent fs-8 rounded-0" type="text" placeholder="Thương hiệu xe" data-options='{"mode":"range","dateFormat":"d/m/y","disableMobile":true}' />
                <span className="fa-solid fa-car form-icon top-0 text-body-tertiary" data-fa-transform="down-2"></span></div>
            </div>
            {/* <div className="col-6 col-md"><button className="btn px-3 fs-8 fw-semibold text-body-tertiary" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside"><span className="fa-solid fa-user me-2"></span>1 adult</button>
              <div className="dropdown-menu dropdown-menu-start p-4" style={{ maxWidth: "320px" }}>
                <div className="row align-items-center g-0 pb-3 border-bottom border-translucent">
                  <div className="col-5">
                    <h5 className="mb-0 text-body">Adults</h5>
                  </div>
                  <div className="col-7">
                    <div className="input-group gap-2" data-quantity="data-quantity"><button className="btn btn-phoenix-primary px-2 rounded" data-type="minus"><span className="fa-solid fa-minus px-1"></span></button>
                      <input className="form-control border-translucent input-spin-none text-center rounded" id="adults" type="number" value="2" />
                      <button className="btn btn-phoenix-primary px-2 rounded" data-type="plus"><span className="fa-solid fa-plus px-1"></span></button></div>
                  </div>
                </div>
                <div className="row align-items-center g-0 py-3 border-bottom border-translucent">
                  <div className="col-5">
                    <h5 className="mb-0 text-body">Infants</h5>
                  </div>
                  <div className="col-7">
                    <div className="input-group gap-2" data-quantity="data-quantity"><button className="btn btn-phoenix-primary px-2 rounded" data-type="minus"><span className="fa-solid fa-minus px-1"></span></button><input className="form-control border-translucent input-spin-none text-center rounded" id="infants" type="number" value="2" /><button className="btn btn-phoenix-primary px-2 rounded" data-type="plus"><span className="fa-solid fa-plus px-1"></span></button></div>
                  </div>
                </div>
                <div className="row align-items-center g-0 pt-3">
                  <div className="col-5">
                    <h5 className="mb-0 text-body">Children</h5>
                  </div>
                  <div className="col-7">
                    <div className="input-group gap-2" data-quantity="data-quantity"><button className="btn btn-phoenix-primary px-2 rounded" data-type="minus"><span className="fa-solid fa-minus px-1"></span></button><input className="form-control border-translucent input-spin-none text-center rounded" id="children" type="number" value="2" /><button className="btn btn-phoenix-primary px-2 rounded" data-type="plus"><span className="fa-solid fa-plus px-1"></span></button></div>
                  </div>
                </div>
              </div>
            </div> */}
            <div className="col-12 col-md-auto"><button className="btn btn-lg btn-phoenix-primary rounded-pill w-100"><span className="fa-solid fa-search me-2"></span>Search</button></div>
          </div>
        </div>
      </div>

      <section className="py-0">
        <div className="container-medium">
          <div className="py-6">
            <div className="d-flex"><select className="form-select w-sm-auto me-4" id="hotelSort" name="Hotel sort">
              <option>Giá giảm</option>
              <option>Giá tăng</option>
              <option>Lượt xem cao nhất</option>
              <option>Lượt xem thấp nhất</option>
            </select>
              {/* <button className="btn btn-phoenix-secondary text-nowrap px-3 px-md-4 ms-auto me-2"> */}
              {/* <span className="fa-solid fa-map me-md-2"></span>
                <span className="d-none d-md-inline-block">Show in map</span> */}
              {/* </button> */}
              <button className="btn btn-phoenix-secondary text-nowrap px-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#hotelFilterOffcanvas" aria-controls="hotelFilterOffcanvas">
                <span className="fa-solid fa-filter me-md-2"></span>
                <span className="d-none d-md-inline-block">Lọc</span>
              </button>
            </div>
          </div>
          <div className="row g-3 mb-6">
            {products.map((product) => (
              <div className="col-sm-6 col-lg-4 col-xl-3" key={product.id}>
                <div className="hover-actions-trigger mx-auto rounded-3 overflow-hidden">
                  {product.img ? (
                    <img src={`${PATHS.ADMIN_DASHBOARD}storage/${product.img}`} alt={product.name} className="img-fluid" style={{ width: '336px', height: '420px', objectFit: 'cover' }} />
                  ) : (
                    <img className="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkmw2SF6CxOmnd63-nmTYy2GPZFR-zKQCLLQ&s" alt="" style={{ width: '336px', height: '420px', objectFit: 'cover' }} />
                  )}
                  <div className="hover-actions top-0 end-0 mt-4 me-4 z-5"><button className="btn btn-wish"><span className="far fa-heart" data-fa-transform="down-1"></span></button></div>
                  <div className="backdrop-faded backdrop-secondary-dark h-100 d-flex flex-column justify-content-end">
                    <a className="stretched-link fs-7 text-white fw-bold" href={`/products/${product.slug}`}>{product.name}</a>
                    <p className="mb-2 text-secondary-lighter"><span className="fa-solid fa-car-side me-2"></span>{product.categories && product.categories.length > 0
                      ? product.categories.map(cat => cat.name).join(', ')
                      : 'N/A'}</p>
                    <div className="d-flex align-items-center gap-3">
                      <span className="badge badge-phoenix badge-phoenix-warning fs-8 fw-normal">
                        <span className="fa-solid fa-eye me-1 fs-9" data-fa-transform="up-1"></span>
                        <span className="badge-label">{product.views || 0}</span>
                      </span>
                      <h4 className="mb-0 text-white fw-bold text-nowrap">{product.price ? new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(product.price) : 'Liên hệ'} <span className="text-secondary-lighter fs-8 fw-normal"></span></h4>
                    </div>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      <div className="offcanvas offcanvas-end"
        // tabindex="-1"
        id="hotelFilterOffcanvas" aria-labelledby="hotelFilterOffcanvasLabel">
        <div className="offcanvas-header p-4 bg-body-highlight">
          <h5 className="mb-0 text-body-highlight" id="hotelFilterOffcanvasLabel">Filter</h5><button className="btn btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div className="offcanvas-body scrollbar p-4">
          <h4 className="text-body-highlight mb-4">Price Range</h4>
          <div className="row g-2">
            <div className="col-6">
              <div className="form-icon-container"><input className="form-control form-icon-input" type="text" placeholder="Minimum amount: $245" /><span className="fa-solid fa-dollar-sign form-icon text-body-tertiary fs-9"></span></div>
            </div>
            <div className="col-6">
              <div className="form-icon-container"><input className="form-control form-icon-input" type="text" placeholder="Maximum amount: $245" /><span className="fa-solid fa-dollar-sign form-icon text-body-tertiary fs-9"></span></div>
            </div>
          </div>
          <div className="noUi-primary-lighter noUi-slider-large noUi-handle-primary noUi-handle-circle ps-5 pe-3 mt-3" data-nouislider='{"range":{"min":0,"max":250},"start":[20,150],"connect":true}'></div>
          <hr className="my-5" />
          <h4 className="mb-4 text-body-highlight">Amenities</h4>
          <p className="text-body-tertiary">Essentials</p>
          <div className="row g-3">
            <div className="col-6">
              {/* <div className="form-check"><input className="form-check-input" id="wifi" type="checkbox" value="wifi" /><label className="form-check-label fs-8 text-body-highlight fw-normal" for="wifi">Wifi</label></div> */}
              {/* <div className="form-check"><input className="form-check-input" id="kitchen" type="checkbox" value="kitchen" /><label className="form-check-label fs-8 text-body-highlight fw-normal" for="kitchen">Kitchen</label></div> */}
              {/* <div className="form-check"><input className="form-check-input" id="air-conditioning" type="checkbox" value="air-conditioning" /><label className="form-check-label fs-8 text-body-highlight fw-normal" for="air-conditioning">Air conditioning</label></div> */}
            </div>
            <div className="col-6">
              {/* <div className="form-check"><input className="form-check-input" id="washer" type="checkbox" value="washer" /><label className="form-check-label fs-8 text-body-highlight fw-normal" for="washer">Washer</label></div> */}
              {/* <div className="form-check"><input className="form-check-input" id="dryer" type="checkbox" value="dryer" /><label className="form-check-label fs-8 text-body-highlight fw-normal" for="dryer">Dryer</label></div> */}
              {/* <div className="form-check"><input className="form-check-input" id="heating" type="checkbox" value="heating" /><label className="form-check-label fs-8 text-body-highlight fw-normal" for="heating">Heating</label></div> */}
            </div>
          </div>
          <p className="text-body-tertiary mt-3">Location</p>
          <div className="row g-3">
            <div className="col-6">
              {/* <div className="form-check"><input className="form-check-input" id="beach-front" type="checkbox" value="beach-front" /><label className="form-check-label fs-8 text-body-highlight fw-normal" for="beach-front">Beach-front</label></div> */}
              {/* <div className="form-check"><input className="form-check-input" id="near-markets" type="checkbox" value="near-markets" /><label className="form-check-label fs-8 text-body-highlight fw-normal" for="near-markets">Near markets</label></div> */}
            </div>
            <div className="col-6">
              {/* <div className="form-check"><input className="form-check-input" id="water-front" type="checkbox" value="water-front" /><label className="form-check-label fs-8 text-body-highlight fw-normal" for="water-front">Water-front</label></div> */}
            </div>
          </div><a className="fw-bold fs-9 mt-3 d-inline-block" href="#!">Show more items</a>
          <hr className="my-5" />
          <h4 className="mb-4 text-body-highlight">Number of Private Bathrooms</h4>
          <div className="input-group gap-2 w-70 w-sm-50" data-quantity="data-quantity"><button className="btn btn-phoenix-primary px-3 rounded" data-type="minus"><span className="fa-solid fa-minus"></span></button>
            {/* <input className="form-control border-translucent input-spin-none text-center rounded" id="private-bathrooms" type="number" value="2" /> */}
            <button className="btn btn-phoenix-primary px-3 rounded" data-type="plus"><span className="fa-solid fa-plus"></span></button></div>
          <h4 className="mb-4 mt-5 text-body-highlight">Number of Bedrooms</h4>
          <div className="input-group gap-2 w-70 w-sm-50" data-quantity="data-quantity"><button className="btn btn-phoenix-primary px-3 rounded" data-type="minus"><span className="fa-solid fa-minus"></span></button>
            {/* <input className="form-control border-translucent input-spin-none text-center rounded" id="bedrooms" type="number" value="2" /> */}
            <button className="btn btn-phoenix-primary px-3 rounded" data-type="plus"><span className="fa-solid fa-plus"></span></button></div>
          <h4 className="mb-4 mt-5 text-body-highlight">Number of Beds</h4>
          <div className="input-group gap-2 w-70 w-sm-50" data-quantity="data-quantity"><button className="btn btn-phoenix-primary px-3 rounded" data-type="minus"><span className="fa-solid fa-minus"></span></button>
            {/* <input className="form-control border-translucent input-spin-none text-center rounded" id="beds" type="number" value="2" /> */}
            <button className="btn btn-phoenix-primary px-3 rounded" data-type="plus"><span className="fa-solid fa-plus"></span></button></div>
          <hr className="my-5" />
          <h4 className="mb-4">Rating</h4>
          {/* <input className="rating-radio btn-check" type="radio" name="ratingOption" id="option1" autocomplete="off" checked="checked" /> */}
          {/* <label className="btn w-100 d-flex align-items-center gap-1 mb-2" for="option1"> */}
          <span className="fa-solid fa-star text-warning"></span>
          <span className="fa-solid fa-star text-warning"></span>
          <span className="fa-solid fa-star text-warning"></span>
          <span className="fa-solid fa-star text-warning"></span>
          <span className="fa-solid fa-star text-warning"></span>
          <span className="fa-solid fa-check ms-auto text-primary check-icon">
          </span>
          {/* </label> */}
          {/* <input className="rating-radio btn-check" type="radio" name="ratingOption" id="option2" autocomplete="off" /> */}
          {/* <label className="btn w-100 d-flex align-items-center gap-1 mb-2" for="option2"> */}
          <span className="fa-solid fa-star text-warning"></span>
          <span className="fa-solid fa-star text-warning"></span>
          <span className="fa-solid fa-star text-warning"></span>
          <span className="fa-solid fa-star text-warning"></span>
          <span className="fa-regular fa-star text-warning"></span>
          <span className="text-body ms-1 fs-8 fw-normal">and above</span>
          <span className="fa-solid fa-check ms-auto text-primary check-icon"></span>
          {/* </label> */}
          {/* <input className="rating-radio btn-check" type="radio" name="ratingOption" id="option3" autocomplete="off" /><label className="btn w-100 d-flex align-items-center gap-1 mb-2" for="option3"><span className="fa-solid fa-star text-warning"></span><span className="fa-solid fa-star text-warning"></span><span className="fa-solid fa-star text-warning"></span><span className="fa-regular fa-star text-warning"></span><span className="fa-regular fa-star text-warning"></span><span className="text-body ms-1 fs-8 fw-normal">and above</span><span className="fa-solid fa-check ms-auto text-primary check-icon"></span></label><input className="rating-radio btn-check" type="radio" name="ratingOption" id="option4" autocomplete="off" /><label className="btn w-100 d-flex align-items-center gap-1 mb-2" for="option4"><span className="fa-solid fa-star text-warning"></span><span className="fa-solid fa-star text-warning"></span><span className="fa-regular fa-star text-warning"></span><span className="fa-regular fa-star text-warning"></span><span className="fa-regular fa-star text-warning"></span><span className="text-body ms-1 fs-8 fw-normal">and above</span><span className="fa-solid fa-check ms-auto text-primary check-icon"></span></label><input className="rating-radio btn-check" type="radio" name="ratingOption" id="option5" autocomplete="off" /><label className="btn w-100 d-flex align-items-center gap-1" for="option5"><span className="fa-solid fa-star text-warning"></span><span className="fa-regular fa-star text-warning"></span><span className="fa-regular fa-star text-warning"></span><span className="fa-regular fa-star text-warning"></span><span className="fa-regular fa-star text-warning"></span><span className="text-body ms-1 fs-8 fw-normal">and above</span><span className="fa-solid fa-check ms-auto text-primary check-icon"></span></label> */}
        </div>
        <div className="p-4 border-top border-translucent d-flex gap-2"><button className="btn btn-lg btn-phoenix-primary">Reset</button><button className="btn btn-lg btn-primary flex-1">Show 445 items</button></div>
      </div>
      <section className="py-0 mb-9">
        <div className="container-medium-md px-0 px-md-3">
          <div className="p-5 p-sm-7 py-xl-12 px-xl-15 rounded-md-2 overflow-hidden position-relative">
            <div className="bg-holder bg-holder overlay bg-opacity-85" style={{ backgroundImage: "url(../../../../assets/img/bg/43.png)", backgroundPosition: "center", backgroundSize: "cover" }}></div>
            <div className="row g-5 position-relative justify-content-between">
              <div className="col-md-6 col-lg-3">
                <h5 className="text-white mb-3"></h5>
                <div className="row g-3">
                  <div className="col">
                    <ul className="list-unstyled mb-0">
                      <li className="mb-1"><a className="text-secondary-lighter" href="#!">Home</a></li>
                      <li className="mb-1"><a className="text-secondary-lighter" href="#!">Điều khoản</a></li>
                      <li className="mb-1"><a className="text-secondary-lighter" href="#!">Tài năng  &amp; văn hóa</a></li>
                      <li className="mb-1"><a className="text-secondary-lighter" href="#!">Điểm đến</a></li>
                      <li className="mb-1"><a className="text-secondary-lighter" href="#!">Sơ đồ trang web</a></li>
                    </ul>
                  </div>
                  <div className="col">
                    <ul className="list-unstyled mb-0">
                      <li className="mb-1"><a className="text-secondary-lighter" href="#!">Chính sách hoàn tiền</a></li>
                      <li className="mb-1"><a className="text-secondary-lighter" href="#!">Chính sách EMI</a></li>
                      <li className="mb-1"><a className="text-secondary-lighter" href="#!">Chính sách bảo mật</a></li>
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

export default ProductsPage;