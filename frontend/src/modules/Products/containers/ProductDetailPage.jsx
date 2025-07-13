import React, { useEffect, useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { useParams } from 'react-router-dom';
import {
    fetchProductBySlug,
    toggleFavorite,
    selectProductsLoading,
    selectProductsError,
    clearSelectedProduct
} from '../slice';
import { PATHS, BASE_URL_ADMIN } from '../../../common/constants';
import BookingFormModal from '../components/BookingFormModal';
import CommentFormModal from '../components/CommentFormModal';

const ProductDetailPage = () => {
    const dispatch = useDispatch();
    const { productSlug } = useParams();

    const selectedProduct = useSelector((state) => state.products.selectedProduct);
    const loading = useSelector(selectProductsLoading);
    const error = useSelector(selectProductsError);

    const [showBookingModal, setShowBookingModal] = useState(false);
    const [showCommentModal, setShowCommentModal] = useState(false);

    useEffect(() => {
        if (productSlug) {
            dispatch(fetchProductBySlug(productSlug));
            document.title = `Chi tiết sản phẩm - ${productSlug.replace(/-/g, ' ').toUpperCase()}`;
        }
        return () => {
            dispatch(clearSelectedProduct());
        };
    }, [dispatch, productSlug]);

    const handleToggleFavorite = async (productId) => {
        const resultAction = await dispatch(toggleFavorite(productId));
        if (toggleFavorite.fulfilled.match(resultAction)) {
            alert(resultAction.payload.message);
        } else {
            alert(`Lỗi yêu thích: ${JSON.stringify(resultAction.payload)}`);
        }
    };

    if (loading) {
        return (
            <div className="container mt-5 text-center">
                <div className="spinner-border text-info" role="status"></div>
                <p className="mt-2 text-info">Đang tải chi tiết sản phẩm...</p>
            </div>
        );
    }

    if (error) {
        return (
            <div className="container mt-5 text-center">
                <div className="alert alert-danger">Lỗi khi tải sản phẩm: {error}</div>
                <p className="text-secondary">Vui lòng thử lại sau.</p>
            </div>
        );
    }

    if (!selectedProduct) {
        return (
            <div className="container mt-5 text-center">
                <div className="alert alert-warning">Không tìm thấy sản phẩm này.</div>
                <p className="text-secondary">Có thể sản phẩm không tồn tại hoặc đã bị xóa.</p>
            </div>
        );
    }

    const product = selectedProduct;
    const mainImageUrl = product.img ? `${BASE_URL_ADMIN}/${product.img}` : '';
    const galleryImages = product.images || [];

    return (
        <>
            <div className="navbar-responsive-navitems navbar-expand border-y bg-body-emphasis border-translucent py-2">
                <div className="container-medium d-flex flex-between-center" data-navbar="data-navbar">
                    <ul className="navbar-nav justify-content-end align-items-center">
                        <li className="nav-item" data-nav-item="data-nav-item"><a className="nav-link px-3 ps-0 " href={PATHS.HOME}>Home</a></li>
                        <li className="nav-item" data-nav-item="data-nav-item"><a className="nav-link px-3  text-primary" href="../../../../apps/travel-agency/hotel/customer/hotel-details.html">Chi Tiết Sản Phẩm</a></li>
                        {/* <li className="nav-item" data-nav-item="data-nav-item"><a className="nav-link px-3  " href="../../../../apps/travel-agency/hotel/customer/hotel-compare.html">Hotel Compare</a></li> */}
                        {/* <li className="nav-item" data-nav-item="data-nav-item"><a className="nav-link px-3  " href="../../../../apps/travel-agency/hotel/customer/checkout.html">Check out</a></li> */}
                        {/* <li className="nav-item" data-nav-item="data-nav-item"><a className="nav-link px-3  " href="../../../../apps/travel-agency/hotel/customer/payment.html">Payment</a></li> */}
                        {/* <li className="nav-item" data-nav-item="data-nav-item"><a className="nav-link px-3  " href="../../../../apps/travel-agency/hotel/customer/gallery.html">Gallery</a></li> */}
                        {/* <li className="nav-item dropdown" data-nav-item="data-nav-item" data-more-item="data-more-item"><a className="nav-link dropdown-toggle dropdown-caret-none fw-bold pe-0 ps-3" href="javascript: void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-boundary="window" data-bs-reference="parent"> More<span className="fas fa-angle-down ms-2"></span></a>
                            <div className="dropdown-menu dropdown-menu-end category-list" aria-labelledby="navbarDropdown" data-category-list="data-category-list"></div>
                        </li> */}
                    </ul>
                </div>
            </div>


            {/* <section className="pt-4 pb-9">
                <div className="container-medium">
                    <nav className="mb-3" aria-label="breadcrumb">
                        <ol className="breadcrumb mb-0">
                            <li className="breadcrumb-item"><a href="#">Page 1</a></li>
                            <li className="breadcrumb-item"><a href="#">Page 2</a></li>
                            <li className="breadcrumb-item active" aria-current="page">Default</li>
                        </ol>
                    </nav>
                    <h2 className="mb-4">Chi tiết sản phẩm</h2>
                    <div className="row g-4 flex-between-end mb-5">
                        <div className="col-md-8 col-lg-9">
                            <h1 className="mb-2 fw-semibold">{product.name}</h1>
                            <div className="mb-1"><a className="text-body-tertiary" href="#!"><span className="fa-solid fa-car-side me-2"></span> Danh mục:{' '}
                                {product.categories?.map((cat) => cat.name).join(', ') || 'N/A'}</a></div>
                            <div className="mb-1"><a className="text-body-tertiary" href="tel:+88029834555"><span className="fa-solid fa-eye me-2"></span>Lượt xem: {product.views}</a></div>
                            <div className="mb-1"><a className="text-body-tertiary" href="mailto:sales.dhaka@radisson.com"><span className="fa-solid fa-calendar-alt me-2" data-fa-transform="down-1"></span>Ngày đăng: {new Date(product.created_at).toLocaleDateString()}</a></div>
                        </div>
                        <div className="col-md-4 col-lg-3">
                            <div className="d-flex flex-md-column align-items-center align-items-md-end gap-3">
                                <h5 className="mb-0 text-nowrap"><span className="text-body-tertiary me-2 fw-normal">Rated</span><span className="text-primary me-2">Good</span><span className="badge text-bg-primary">4.3</span></h5><a className="btn btn-phoenix-primary px-5 px-lg-8 w-100 w-md-auto" href="#!"><span className="fa-solid fa-map me-2"> </span>Show in map</a>
                            </div>
                        </div>
                    </div>
                    <div className="row g-3">
                        <div className="col-xl-8">
                            <div className="row g-3 mb-3">
                                <div className="col-md-6">
                                    <a href="../../../../assets/img/hotels/25.png" data-gallery="hotel-details-gallery">
                                        <img className="img-fluid rounded-2" src={`${PATHS.ADMIN_DASHBOARD}storage/${product.img}`} alt="Hinh anh" />
                                    </a>
                                </div> */}
            {/* <div className="col-6 d-none d-md-block">
                                    <div className="row g-3">
                                        <div className="col-12"><a href="../../../../assets/img/hotels/26.png" data-gallery="hotel-details-gallery"> <img className="img-fluid rounded-2" src="../../../../assets/img/hotels/26_2.png" alt="" /></a></div>
                                        <div className="col-6"><a href="../../../../assets/img/hotels/27.png" data-gallery="hotel-details-gallery"> <img className="img-fluid rounded-2" src="../../../../assets/img/hotels/27_2.png" alt="" /></a></div>
                                        <div className="col-6"><a href="../../../../assets/img/hotels/28.png" data-gallery="hotel-details-gallery"> <img className="img-fluid rounded-2" src="../../../../assets/img/hotels/28_2.png" alt="" /></a></div>
                                    </div>
                                </div> */}
            {/* <div className="col-3 d-none d-md-block"><a href="../../../../assets/img/hotels/29.png" data-gallery="hotel-details-gallery"><img className="img-fluid rounded-2" src="../../../../assets/img/hotels/29_2.png" alt="" /></a></div>
                                <div className="col-3 d-none d-md-block"><a href="../../../../assets/img/hotels/30.png" data-gallery="hotel-details-gallery"><img className="img-fluid rounded-2" src="../../../../assets/img/hotels/30_2.png" alt="" /></a></div>
                                <div className="col-3 d-none d-md-block"><a href="../../../../assets/img/hotels/31.png" data-gallery="hotel-details-gallery"><img className="img-fluid rounded-2" src="../../../../assets/img/hotels/31_2.png" alt="" /></a></div>
                                <div className="col-md-3">
                                    <div className="position-relative rounded-2 overflow-hidden"><a href="../../../../assets/img/hotels/32.png" data-gallery="hotel-details-gallery"> <img className="w-100 h-md-100 object-fit-cover" src="../../../../assets/img/hotels/32_2.png" alt="" height="43" /></a>
                                        <div className="position-absolute w-100 h-100 left-0 top-0 d-flex flex-center bg-black bg-opacity-50"><a className="text-white stretched-link" href="../../../../apps/travel-agency/hotel/customer/gallery.html">Show all</a></div>
                                    </div>
                                </div> */}
            {/* </div>
                            <div className="scrollbar mt-5 mb-3 pb-3">
                                <ul className="nav nav-pills flex-nowrap" data-tab-map-container="data-tab-map-container" role="tablist">
                                    <li className="nav-item"><button className="nav-link active" id="pills-availability-tab" data-bs-toggle="pill" data-bs-target="#pills-availability" type="button" role="tab" aria-controls="pills-availability" aria-selected="true">Availability</button></li>
                                    <li className="nav-item"><button className="nav-link" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="true">Description</button></li>
                                    <li className="nav-item"><button className="nav-link" id="pills-policy-tab" data-bs-toggle="pill" data-bs-target="#pills-policy" type="button" role="tab" aria-controls="pills-policy" aria-selected="true">Policy</button></li>
                                    <li className="nav-item"><button className="nav-link" id="pills-facilities-tab" data-bs-toggle="pill" data-bs-target="#pills-facilities" type="button" role="tab" aria-controls="pills-facilities" aria-selected="true">Facilities</button></li>
                                    <li className="nav-item"><button className="nav-link" id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews" aria-selected="true">Reviews</button></li>
                                </ul>
                            </div>
                            <div className="tab-content" id="hotel-details-tab-content">
                                <div className="tab-pane fade show active" id="pills-availability" role="tabpanel" aria-labelledby="pills-availability-tab" */}
            {/* // tabindex="0" */}
            {/* >
                                    <h3 className="mb-3 fw-bold">Availability</h3> */}
            {/* <div className="card">
                                        <div className="card-body">
                                            <div className="row g-3">
                                                <div className="col-sm-6 col-lg-3"><label className="fw-bold text-body-tertiary mb-1" htmlFor="checkIn">Check in</label>
                                                    <div className="form-icon-container flatpickr-input-container"><input className="form-control form-icon-input datetimepicker" id="checkIn" type="text" placeholder="26 Jan, 2023" data-options='{"disableMobile":true}' /><span className="fa-solid fa-calendar text-body fs-9 form-icon"></span></div>
                                                </div>
                                                <div className="col-sm-6 col-lg-3"><label className="fw-bold text-body-tertiary mb-1" htmlFor="checkOut">Check out</label>
                                                    <div className="form-icon-container flatpickr-input-container"><input className="form-control form-icon-input datetimepicker" id="checkOut" type="text" placeholder="26 Jan, 2023" data-options='{"disableMobile":true}' /><span className="fa-solid fa-calendar text-body fs-9 form-icon"></span></div>
                                                </div>
                                                <div className="col-sm-6 col-lg-3"><label className="fw-bold text-body-tertiary mb-1">Adults</label>
                                                    <div className="input-group gap-2" data-quantity="data-quantity"><button className="btn btn-phoenix-primary rounded px-3" data-type="minus"><span className="fa-solid fa-minus"></span></button><input className="form-control border-translucent input-spin-none text-center rounded" id="adult" type="number"
                                                    //   value="2"
                                                    /><button className="btn btn-phoenix-primary rounded px-3" data-type="plus"><span className="fa-solid fa-plus"></span></button></div>
                                                </div>
                                                <div className="col-sm-auto ms-auto align-self-end"><button className="btn btn-primary w-100">Update Results</button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr className="my-6" />
                                    <div className="row g-3 mb-4">
                                        <div className="col-lg-8 col-xxl-7">
                                            <div className="row flex-lg-nowrap g-3 mb-2">
                                                <div className="col-md-auto">
                                                    <h4 className="mb-0 fw-semibold"><span className="fa-solid fa-circle fs-9 text-body-quaternary me-2" data-fa-transform="up-1"></span>Standard double queen</h4>
                                                </div>
                                                <div className="col-md-auto d-flex align-items-center">
                                                    <div className="vr bg-body-secondary me-3 d-none d-md-block"></div><span className="fa-solid fa-bed text-primary fs-9 me-1"></span><span className="fa-solid fa-bed text-primary fs-9"></span>
                                                    <div className="vr bg-body-secondary mx-3"></div><span className="fa-solid fa-user text-primary fs-9 me-1"></span><span className="fa-solid fa-user text-primary fs-9"></span>
                                                    <div className="vr bg-body-secondary mx-3"></div><span className="fa-solid fa-mug-saucer text-primary fs-9"></span>
                                                    <div className="vr bg-body-secondary mx-3"></div><span className="badge badge-phoenix badge-phoenix-info">10% OFF</span>
                                                </div>
                                            </div>
                                            <p className="mb-0">A standard double queen room has two queen-sized beds and may accept up to two people for a convenient and comfortable stay.</p>
                                        </div>
                                        <div className="col-lg-4 col-xxl-5">
                                            <h3 className="mb-2 d-flex align-items-center justify-content-lg-end gap-2"><span className="fs-9 text-body-quaternary fw-normal text-decoration-line-through">$1,456.65</span>$1,256.65</h3>
                                            <h5 className="text-body text-lg-end fw-normal">+$123 for tax and fees</h5>
                                        </div>
                                    </div>
                                    <div className="row g-3">
                                        <div className="col-lg-7">
                                            <div className="row gx-2 h-100">
                                                <div className="col-4"><a href="../../../../assets/img/hotels/33.png" data-gallery="room-gallery-0"><img className="w-100 h-100 object-fit-cover rounded-2" src="../../../../assets/img/hotels/33.png" alt="" /></a></div>
                                                <div className="col-4"><a href="../../../../assets/img/hotels/34.png" data-gallery="room-gallery-0"><img className="w-100 h-100 object-fit-cover rounded-2" src="../../../../assets/img/hotels/34.png" alt="" /></a></div>
                                                <div className="col-4"><a href="../../../../assets/img/hotels/35.png" data-gallery="room-gallery-0"><img className="w-100 h-100 object-fit-cover rounded-2" src="../../../../assets/img/hotels/35.png" alt="" /></a></div>
                                            </div>
                                        </div>
                                        <div className="col-lg-4 col-xl-5 col-xxl-4 ms-auto">
                                            <div className="card bg-body-highlight">
                                                <div className="card-body">
                                                    <ul className="mb-2 list-unstyled d-flex list flex-wrap gap-2">
                                                        <li className="text-body-highlight fs-9 me-1 mb-0 lh-1"><span className="fa-solid fa-check text-success me-1"> </span>wifi</li>
                                                        <li className="text-body-highlight fs-9 me-1 mb-0 lh-1"><span className="fa-solid fa-check text-success me-1"> </span>tv</li>
                                                        <li className="text-body-highlight fs-9 me-1 mb-0 lh-1"><span className="fa-solid fa-check text-success me-1"> </span>common area</li>
                                                        <li className="text-body-highlight fs-9 me-1 mb-0 lh-1"><span className="fa-solid fa-check text-success me-1"> </span>bathtub</li>
                                                        <li className="text-body-highlight fs-9 me-1 mb-0 lh-1"><span className="fa-solid fa-check text-success me-1"> </span>Heating</li>
                                                        <li className="text-body-highlight fs-9 me-1 mb-0 lh-1"><span className="fa-solid fa-check text-success me-1"> </span>Telephone</li>
                                                    </ul><a className="fw-bold fs-9" href="#!">Show other amenities </a>
                                                </div>
                                            </div><button className="btn btn-outline-primary w-100 mt-3">Add room</button>
                                        </div>
                                    </div>
                                    <hr className="my-6" />
                                    <div className="row g-3 mb-4">
                                        <div className="col-lg-8 col-xxl-7">
                                            <div className="row flex-lg-nowrap g-3 mb-2">
                                                <div className="col-md-auto">
                                                    <h4 className="mb-0 fw-semibold"><span className="fa-solid fa-circle fs-9 text-body-quaternary me-2" data-fa-transform="up-1"></span>Standard double king</h4>
                                                </div>
                                                <div className="col-md-auto d-flex align-items-center">
                                                    <div className="vr bg-body-secondary me-3 d-none d-md-block"></div><span className="fa-solid fa-bed text-primary fs-9 me-1"></span><span className="fa-solid fa-bed text-primary fs-9"></span>
                                                    <div className="vr bg-body-secondary mx-3"></div><span className="fa-solid fa-user text-primary fs-9 me-1"></span><span className="fa-solid fa-user text-primary fs-9 me-1"></span><span className="fa-solid fa-user text-primary fs-9 me-1"></span><span className="fa-solid fa-user text-primary fs-9"></span>
                                                    <div className="vr bg-body-secondary mx-3"></div><span className="fa-solid fa-mug-saucer text-primary fs-9"></span>
                                                    <div className="vr bg-body-secondary mx-3"></div><span className="badge badge-phoenix badge-phoenix-info">15% OFF</span>
                                                </div>
                                            </div>
                                            <p className="mb-0">A standard double king room is a hotel room with two king-size beds that can comfortably fit up to four guests.</p>
                                        </div>
                                        <div className="col-lg-4 col-xxl-5">
                                            <h3 className="mb-2 d-flex align-items-center justify-content-lg-end gap-2"><span className="fs-9 text-body-quaternary fw-normal text-decoration-line-through">$1,456.65</span>$1,856.65</h3>
                                            <h5 className="text-body text-lg-end fw-normal">+$155 for tax and fees</h5>
                                        </div>
                                    </div>
                                    <div className="row g-3">
                                        <div className="col-lg-7">
                                            <div className="row gx-2 h-100">
                                                <div className="col-4"><a href="../../../../assets/img/hotels/36.png" data-gallery="room-gallery-1"><img className="w-100 h-100 object-fit-cover rounded-2" src="../../../../assets/img/hotels/36.png" alt="" /></a></div>
                                                <div className="col-4"><a href="../../../../assets/img/hotels/37.png" data-gallery="room-gallery-1"><img className="w-100 h-100 object-fit-cover rounded-2" src="../../../../assets/img/hotels/37.png" alt="" /></a></div>
                                                <div className="col-4"><a href="../../../../assets/img/hotels/38.png" data-gallery="room-gallery-1"><img className="w-100 h-100 object-fit-cover rounded-2" src="../../../../assets/img/hotels/38.png" alt="" /></a></div>
                                            </div>
                                        </div>
                                        <div className="col-lg-4 col-xl-5 col-xxl-4 ms-auto">
                                            <div className="card bg-body-highlight">
                                                <div className="card-body">
                                                    <ul className="mb-2 list-unstyled d-flex list flex-wrap gap-2">
                                                        <li className="text-body-highlight fs-9 me-1 mb-0 lh-1"><span className="fa-solid fa-check text-success me-1"> </span>wifi</li>
                                                        <li className="text-body-highlight fs-9 me-1 mb-0 lh-1"><span className="fa-solid fa-check text-success me-1"> </span>tv</li>
                                                        <li className="text-body-highlight fs-9 me-1 mb-0 lh-1"><span className="fa-solid fa-check text-success me-1"> </span>common area</li>
                                                        <li className="text-body-highlight fs-9 me-1 mb-0 lh-1"><span className="fa-solid fa-check text-success me-1"> </span>bathtub</li>
                                                        <li className="text-body-highlight fs-9 me-1 mb-0 lh-1"><span className="fa-solid fa-check text-success me-1"> </span>Heating</li>
                                                        <li className="text-body-highlight fs-9 me-1 mb-0 lh-1"><span className="fa-solid fa-check text-success me-1"> </span>Telephone</li>
                                                    </ul><a className="fw-bold fs-9" href="#!">Show other amenities </a>
                                                </div>
                                            </div><button className="btn btn-outline-primary w-100 mt-3">Add room</button>
                                        </div>
                                    </div>
                                </div> */}
            {/* <div className="tab-pane fade" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab" tabindex="0">
                                    <h3 className="mb-3 fw-bold">Description</h3>
                                    <p className="text-body">Welcome to our hotel, an opulent and cozy setting with everything you need for a comfortable and happy stay. The city's biggest attractions, dining, shopping, and entertainment options are close to our hotel, which is situated in a desirable area.</p>
                                    <p className="text-body">Your comfort is our top priority when designing our rooms and suites, which include soft beds, fine linens, and contemporary conveniences like flat-screen TVs, fast internet access, and mini-fridges. Also, each room features a sizeable workstation, making it the perfect accommodation for business traveler's who need to remain connected and productive.</p>
                                    <div className="p-3 border bg-body-highlight border-translucent rounded-2 d-flex flex-between-center flex-wrap gap-3">
                                        <h5 className="mb-0"> <span className="text-body-tertiary fw-normal">Number of rooms : </span>70</h5>
                                        <h5 className="mb-0"> <span className="text-body-tertiary fw-normal">Number of floors : </span>14</h5>
                                        <h5 className="mb-0"> <span className="text-body-tertiary fw-normal">Construction year : </span>2018</h5>
                                    </div>
                                    <div className="card bg-body mt-5">
                                        <div className="card-body">
                                            <div className="mapbox-container rounded-2 border border-translucent mb-4">
                                                <div id="mapbox" data-mapbox='{"attributionControl":false,"center":[-74.0020158,40.7228022],"zoom":14,"scrollZoom":false}' style={{ height: '300px', width: '100%' }}></div>
                                            </div>
                                            <p className="mb-2 text-body-tertiary text-uppercase"><span className="fa-solid fa-map-marker-alt text-body-emphasis me-2"></span>Museum</p>
                                            <h5> 1.5 km <span className="text-body-tertiary fw-normal">from </span>Museum of Liberation War, Dhaka</h5>
                                            <hr className="my-4" />
                                            <p className="mb-2 text-body-tertiary text-uppercase"><span className="fa-solid fa-map-marker-alt text-body-emphasis me-2"></span>Historical monument</p>
                                            <h5> 3.5 km <span className="text-body-tertiary fw-normal">from </span>Lalbagh Kella</h5>
                                        </div>
                                    </div>
                                </div>
                                <div className="tab-pane fade" id="pills-policy" role="tabpanel" aria-labelledby="pills-policy-tab" tabindex="0">
                                    <h3 className="mb-5">Policy</h3>
                                    <div className="card bg-body-highlight mb-3">
                                        <div className="card-body">
                                            <div className="row g-3">
                                                <div className="col-sm-3">
                                                    <h5 className="mb-0"> <span className="fa-solid fa-clock fs-9 me-1" data-fa-transform="up-1"></span>Check in</h5>
                                                </div>
                                                <div className="col-sm-9">
                                                    <div className="progress overflow-visible" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style={{ height: '8px' }}>
                                                        <div className="progress-bar position-relative ms-auto overflow-visible rounded" style={{ width: '50%' }}><span className="text-info position-absolute mt-5 text-body fs-10">12 am</span></div>
                                                    </div>
                                                    <div className="d-flex flex-between-center w-100"><span className="text-info text-body fs-10 mt-1">6 am </span><span className="text-info text-body fs-10 mt-1">6 pm</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="card bg-body-highlight mb-3">
                                        <div className="card-body">
                                            <div className="row g-3">
                                                <div className="col-sm-3">
                                                    <h5 className="mb-0"> <span className="fa-solid fa-clock fs-9 me-1" data-fa-transform="up-1"></span>Check out</h5>
                                                </div>
                                                <div className="col-sm-9">
                                                    <div className="progress overflow-visible" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style={{ height: '8px' }}>
                                                        <div className="progress-bar position-relative overflow-visible rounded" style={{ width: '50%' }}><span className="text-info position-absolute mt-5 text-body fs-10 end-0">12 am</span></div>
                                                    </div>
                                                    <div className="d-flex flex-between-center w-100"><span className="text-info text-body fs-10 mt-1">6 am </span><span className="text-info text-body fs-10 mt-1">6 pm</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="card bg-body-highlight mb-3">
                                        <div className="card-body">
                                            <div className="row g-3">
                                                <div className="col-sm-3">
                                                    <h5 className="mb-0"> <span className="fa-solid fa-baby fs-9 me-1" data-fa-transform="up-1"></span>Baby policy</h5>
                                                </div>
                                                <div className="col-sm-9">
                                                    <h5 className="mb-2 text-success">Allowed</h5>
                                                    <p className="mb-0 text-body">Children under the age of five can stay in the same room as their parents and receive complimentary breakfast. Children from 5 to 10 years old will be charged $1,500 for extra bed and breakfast. Extra Breakfast Charge: $400 NET per night (for adults). Extra Breakfast Charge $200 NET Per Night (Above 5 to 11 Years)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="card bg-body-highlight mb-3">
                                        <div className="card-body">
                                            <div className="row g-3 align-items-center">
                                                <div className="col-5 col-sm-3">
                                                    <h5 className="mb-0"> <span className="fa-solid fa-paw fs-9 me-1" data-fa-transform="up-1"></span>Pet policy</h5>
                                                </div>
                                                <div className="col-7 col-sm-9">
                                                    <h5 className="mb-0 text-warning">Not Allowed</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="card bg-body-highlight">
                                        <div className="card-body">
                                            <div className="row g-3 align-items-center">
                                                <div className="col-5 col-sm-3">
                                                    <h5 className="mb-0"> <span className="fa-solid fa-credit-card fs-9 me-1" data-fa-transform="up-1"></span>Payment</h5>
                                                </div>
                                                <div className="col-7 col-sm-9"><img className="me-3" src="../../../../assets/img/logos/mastercard.png" alt="" /><img className="me-3" src="../../../../assets/img/logos/american_express.png" alt="" /><img src="../../../../assets/img/logos/visa.png" alt="" /></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="tab-pane fade" id="pills-facilities" role="tabpanel" aria-labelledby="pills-facilities-tab" tabindex="0">
                                    <h3 className="mb-5 fw-bold">Facilities</h3>
                                    <h5 className="mb-3">Most popular</h5>
                                    <div className="row g-0">
                                        <div className="col-sm-6 col-md-4">
                                            <div className="d-flex align-items-center gap-2 px-4 py-3 h-100 border-translucent border"><span className="fs-9 text-warning fa-solid fa-car"></span>
                                                <h5 className="text-body-tertiary mb-0 fw-normal">Airport shuttle</h5>
                                            </div>
                                        </div>
                                        <div className="col-sm-6 col-md-4">
                                            <div className="d-flex align-items-center gap-2 px-4 py-3 h-100 border-translucent border-bottom border-top-sm border-end border-start border-start-sm-0"><span className="fs-9 text-warning fa-solid fa-wifi"></span>
                                                <h5 className="text-body-tertiary mb-0 fw-normal">Free wifi</h5>
                                            </div>
                                        </div>
                                        <div className="col-sm-6 col-md-4">
                                            <div className="d-flex align-items-center gap-2 px-4 py-3 h-100 border-translucent border-end border-start border-start-md-0 border-top-md border-bottom"><span className="fs-9 text-warning fa-solid fa-utensils"></span>
                                                <h5 className="text-body-tertiary mb-0 fw-normal">Restaurant</h5>
                                            </div>
                                        </div>
                                        <div className="col-sm-6 col-md-4">
                                            <div className="d-flex align-items-center gap-2 px-4 py-3 h-100 border-translucent border-end border-start border-start-sm-0 border-start-md border-bottom"><span className="fs-9 text-warning fa-solid fa-smoking"></span>
                                                <h5 className="text-body-tertiary mb-0 fw-normal">Smoking zone</h5>
                                            </div>
                                        </div>
                                        <div className="col-sm-6 col-md-4">
                                            <div className="d-flex align-items-center gap-2 px-4 py-3 h-100 border-translucent border-bottom border-end border-start border-start-md-0"><span className="fs-9 text-warning fa-solid fa-user"></span>
                                                <h5 className="text-body-tertiary mb-0 fw-normal">Room service</h5>
                                            </div>
                                        </div>
                                        <div className="col-sm-6 col-md-4">
                                            <div className="d-flex align-items-center gap-2 px-4 py-3 h-100 border-translucent border-bottom border-end border-start border-start-sm-0"><span className="fs-9 text-warning fa-solid fa-dog"></span>
                                                <h5 className="text-body-tertiary mb-0 fw-normal">Pet-Friendly</h5>
                                            </div>
                                        </div>
                                        <div className="col-sm-6 col-md-4">
                                            <div className="d-flex align-items-center gap-2 px-4 py-3 h-100 border-translucent border-x border-bottom"><span className="fs-9 text-warning fa-solid fa-square-parking"></span>
                                                <h5 className="text-body-tertiary mb-0 fw-normal">Free parking</h5>
                                            </div>
                                        </div>
                                        <div className="col-sm-6 col-md-4">
                                            <div className="d-flex align-items-center gap-2 px-4 py-3 h-100 border-translucent border-bottom border-end border-start border-start-sm-0"><span className="fs-9 text-warning fa-solid fa-umbrella-beach"></span>
                                                <h5 className="text-body-tertiary mb-0 fw-normal">Beach-front</h5>
                                            </div>
                                        </div>
                                        <div className="col-sm-6 col-md-4">
                                            <div className="d-flex align-items-center gap-2 px-4 py-3 h-100 border-translucent border-bottom border-end border-start border-start-md-0"><span className="fs-9 text-warning fa-solid fa-wheelchair"></span>
                                                <h5 className="text-body-tertiary mb-0 fw-normal">Facilities for disabled guests</h5>
                                            </div>
                                        </div>
                                        <div className="col-sm-6 col-md-4">
                                            <div className="d-flex align-items-center gap-2 px-4 py-3 h-100 border-translucent border-x border-bottom border-start border-start-sm-0 border-start-md"><span className="fs-9 text-warning fa-solid fa-wine-glass"></span>
                                                <h5 className="text-body-tertiary mb-0 fw-normal">Bar</h5>
                                            </div>
                                        </div>
                                        <div className="col-sm-6 col-md-4">
                                            <div className="d-flex align-items-center gap-2 px-4 py-3 h-100 border-translucent border-bottom border-end border-start border-start-md-0"><span className="fs-9 text-warning fa-solid fa-utensils"></span>
                                                <h5 className="text-body-tertiary mb-0 fw-normal">Free Breakfast</h5>
                                            </div>
                                        </div>
                                        <div className="col-sm-6 col-md-4">
                                            <div className="d-flex align-items-center gap-2 px-4 py-3 h-100 border-translucent border-bottom border-end border-start border-start-sm-0"><span className="fs-9 text-warning fa-solid fa-bell-concierge"></span>
                                                <h5 className="text-body-tertiary mb-0 fw-normal">24-hour front desk</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 className="text-warning text-uppercase fw-normal my-5"><span className="me-2">*</span>ADDITIONAL CHARGES</h6>
                                    <div className="row g-3">
                                        <div className="col-auto col-md-4">
                                            <h5 className="mb-3"><span className="fs-9 me-2 fa-solid fa-bath"></span>Washroom</h5>
                                            <ul className="list-unstyled mb-5">
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Toilet</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Bath</li>
                                            </ul>
                                            <h5 className="mb-3"><span className="fs-9 me-2 fa-solid fa-tree"></span>Outdoors</h5>
                                            <ul className="list-unstyled mb-5">
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Beachfront</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>BBQ facilities</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Garden</li>
                                            </ul>
                                            <h5 className="mb-3"><span className="fs-9 me-2 fa-solid fa-bicycle"></span>Activities</h5>
                                            <ul className="list-unstyled mb-5">
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Bicycle rental</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Beach</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Water sport facilities</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Horse riding</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Wind surfing</li>
                                            </ul>
                                            <h5 className="mb-3"><span className="fs-9 me-2 fa-solid fa-utensils"></span>Food &amp; Drink</h5>
                                            <ul className="list-unstyled mb-5">
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Fruits</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Kid meals</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Snack bar</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Bar</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Restaurant</li>
                                            </ul>
                                            <h5 className="mb-3"><span className="fs-9 me-2 fa-solid fa-wifi"></span>Internet</h5>
                                            <ul className="list-unstyled mb-sm-0">
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>WiFi</li>
                                            </ul>
                                        </div>
                                        <div className="col-6 col-md-4">
                                            <h5 className="mb-3"><span className="fs-9 me-2 fa-solid fa-square-parking"></span>Parking</h5>
                                            <p className="mb-2 fs-9 text-body-tertiary">On-site, free private parking is possible (reservations are not needed).</p>
                                            <ul className="list-unstyled mb-5">
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Street Parking</li>
                                            </ul>
                                            <h5 className="mb-3"><span className="fs-9 me-2 fa-solid fa-bell-concierge"></span>Reception Service</h5>
                                            <ul className="list-unstyled mb-5">
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Luggage storage</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Tour desk</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>24-hour front desk</li>
                                            </ul>
                                            <h5 className="mb-3"><span className="fs-9 me-2 fa-solid fa-broom"></span>Cleaning service</h5>
                                            <ul className="list-unstyled mb-5">
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Daily housekeeping</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Trouser press</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Ironing service</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Dry cleaning</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Laundry</li>
                                            </ul>
                                            <h5 className="mb-3"><span className="fs-9 me-2 fa-solid fa-briefcase"></span>Business facilities</h5>
                                            <ul className="list-unstyled mb-5">
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Fax / photocopying</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Business centre</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Meeting / banquet facilities</li>
                                            </ul>
                                            <h5 className="mb-3"><span className="fs-9 me-2 fa-solid fa-briefcase"></span>Safety and security</h5>
                                            <ul className="list-unstyled mb-sm-0">
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>CCTV outside property</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>key card access</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Safety deposit box</li>
                                            </ul>
                                        </div>
                                        <div className="col-auto col-md-4">
                                            <h5 className="mb-3"><span className="fs-9 me-2 fa-solid fa-info-circle"></span>General</h5>
                                            <ul className="list-unstyled mb-5">
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Minimarket on site</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Shared lounge / TV area</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Designated smoking area</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Air conditioning</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Car hire</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Lift</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Barber / beauty shop</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Airport shuttle</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Non-smoking rooms</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Room service</li>
                                            </ul>
                                            <h5 className="mb-3"><span className="fs-9 me-2 fa-solid fa-wheelchair"></span>Accessibility</h5>
                                            <ul className="list-unstyled mb-5">
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Elevator access</li>
                                            </ul>
                                            <h5 className="mb-3"><span className="fs-9 me-2 fa-solid fa-earth"></span>Languages spoken</h5>
                                            <ul className="list-unstyled mb-5">
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Bangla</li>
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>English</li>
                                            </ul>
                                            <h5 className="mb-3"><span className="fs-9 me-2 fa-solid fa-ghost"></span>Ghosts haunting</h5>
                                            <ul className="list-unstyled mb-5">
                                                <li className="text-body-highlight"><span className="fa-solid fa-check fs-9 text-success me-2"></span>Not that much</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div className="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab" tabindex="0">
                                    <h3 className="mb-5">Reviews</h3>
                                    <div className="row gx-md-6 gx-xl-8 gy-2">
                                        <div className="col-md-6 col-lg-5">
                                            <div className="row align-items-center g-0">
                                                <div className="col-4">
                                                    <h5 className="mb-0 text-body text-nowrap">Staff</h5>
                                                </div>
                                                <div className="col-8">
                                                    <div className="d-flex align-items-center gap-2"> <span className="badge text-bg-primary fs-8">4.0</span>
                                                        <div className="progress w-100" role="progressbar" aria-label="review" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                            <div className="progress-bar rounded" style={{ width: '80%' }}></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="col-md-6 col-lg-5">
                                            <div className="row align-items-center g-0">
                                                <div className="col-4">
                                                    <h5 className="mb-0 text-body text-nowrap">Comfort</h5>
                                                </div>
                                                <div className="col-8">
                                                    <div className="d-flex align-items-center gap-2"> <span className="badge text-bg-primary fs-8">4.0</span>
                                                        <div className="progress w-100" role="progressbar" aria-label="review" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                            <div className="progress-bar rounded" style={{ width: '80%' }}></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="col-md-6 col-lg-5">
                                            <div className="row align-items-center g-0">
                                                <div className="col-4">
                                                    <h5 className="mb-0 text-body text-nowrap">Facilities</h5>
                                                </div>
                                                <div className="col-8">
                                                    <div className="d-flex align-items-center gap-2"> <span className="badge text-bg-primary fs-8">4.5</span>
                                                        <div className="progress w-100" role="progressbar" aria-label="review" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                            <div className="progress-bar rounded" style={{ width: '90%' }}></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="col-md-6 col-lg-5">
                                            <div className="row align-items-center g-0">
                                                <div className="col-4">
                                                    <h5 className="mb-0 text-body text-nowrap">Location</h5>
                                                </div>
                                                <div className="col-8">
                                                    <div className="d-flex align-items-center gap-2"> <span className="badge text-bg-primary fs-8">3.5</span>
                                                        <div className="progress w-100" role="progressbar" aria-label="review" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                            <div className="progress-bar rounded" style={{ width: '70%' }}></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="col-md-6 col-lg-5">
                                            <div className="row align-items-center g-0">
                                                <div className="col-4">
                                                    <h5 className="mb-0 text-body text-nowrap">Cleanliness</h5>
                                                </div>
                                                <div className="col-8">
                                                    <div className="d-flex align-items-center gap-2"> <span className="badge text-bg-primary fs-8">4.8</span>
                                                        <div className="progress w-100" role="progressbar" aria-label="review" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                            <div className="progress-bar rounded" style={{ width: '96%' }}></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="col-md-6 col-lg-5">
                                            <div className="row align-items-center g-0">
                                                <div className="col-4">
                                                    <h5 className="mb-0 text-body text-nowrap">Free WiFi</h5>
                                                </div>
                                                <div className="col-8">
                                                    <div className="d-flex align-items-center gap-2"> <span className="badge text-bg-primary fs-8">5.0</span>
                                                        <div className="progress w-100" role="progressbar" aria-label="review" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                            <div className="progress-bar rounded" style={{ width: '100%' }}></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr className="mt-5 mb-8" />
                                    <div className="d-flex align-items-center position-relative gap-2 mb-3">
                                        <div className="avatar avatar-s ">
                                            <img className="rounded-circle " src="../../../../assets/img/team/59.webp" alt="" />
                                        </div><a className="fw-semibold text-body-emphasis stretched-link" href="#!">Navina Koothrapali</a><img src="../../../../assets/img/country/india.png" alt="" />
                                    </div>
                                    <div className="d-flex align-items-center flex-wrap gap-5 mb-5">
                                        <div className="d-flex align-items-center gap-4">
                                            <div className="border-end pe-4"><span className="badge text-bg-primary fs-8">4.5</span></div><a className="text-body-tertiary" href="#!"><span className="fa-solid fa-bed me-2 fs-9"></span>Single Room with Private Bathroom</a>
                                        </div>
                                        <div className="d-flex align-items-center gap-5">
                                            <h5 className="fw-normal text-body-tertiary"><span className="fa-solid fa-calendar me-2 fs-9"></span>January, 2023</h5>
                                            <h5 className="fw-normal text-body-tertiary"><span className="fa-solid fa-user me-2 fs-9"></span>Solo traveler</h5>
                                        </div>
                                    </div>
                                    <div className="d-flex gap-3 mb-5"><span className="fa-solid fa-thumbs-up text-success" data-fa-transform="down-5"></span>
                                        <p className="mb-0"> The amazing facilities at this hotel just left me speechless. Modern and equipped with everything I needed to maintain my workout schedule while on vacation, the fitness center was state-of-the-art. Another highlight was the indoor pool, which had crystal-clear water and lots of lounge couches for relaxation.</p>
                                    </div>
                                    <div className="d-flex gap-3 mb-5"><span className="fa-solid fa-thumbs-down text-body-quaternary" data-fa-transform="down-5"></span>
                                        <p className="mb-0"> It is necessary to provide some amenities for guests, such as drinking water and toothpaste.</p>
                                    </div>
                                    <div className="card bg-body-highlight">
                                        <div className="card-body">
                                            <h6 className="mb-2 fw-bolder text-body-quaternary text-uppercase"><span className="fa-solid fa-reply me-2"></span>Hotel's Reply:</h6>
                                            <p className="mb-0">Thank you for choosing us. We will try to improve accordingly.</p>
                                        </div>
                                    </div>
                                    <hr className="mt-8 mb-8" />
                                    <div className="d-flex align-items-center position-relative gap-2 mb-3">
                                        <div className="avatar avatar-s ">
                                            <img className="rounded-circle " src="../../../../assets/img/team/58.webp" alt="" />
                                        </div><a className="fw-semibold text-body-emphasis stretched-link" href="#!">Weston Ryan</a><img src="../../../../assets/img/country/norway.png" alt="" />
                                    </div>
                                    <div className="d-flex align-items-center flex-wrap gap-5 mb-5">
                                        <div className="d-flex align-items-center gap-4">
                                            <div className="border-end pe-4"><span className="badge text-bg-primary fs-8">3.5</span></div><a className="text-body-tertiary" href="#!"><span className="fa-solid fa-bed me-2 fs-9"></span>Double Room with Private Bathroom</a>
                                        </div>
                                        <div className="d-flex align-items-center gap-5">
                                            <h5 className="fw-normal text-body-tertiary"><span className="fa-solid fa-calendar me-2 fs-9"></span>February, 2023</h5>
                                            <h5 className="fw-normal text-body-tertiary"><span className="fa-solid fa-user me-2 fs-9"></span>Couple traveler</h5>
                                        </div>
                                    </div>
                                    <div className="d-flex gap-3 mb-5"><span className="fa-solid fa-thumbs-up text-success" data-fa-transform="down-5"></span>
                                        <p className="mb-0"> The amenities at this hotel were excellent during my most recent time there. The gym was up-to-date and well-stocked, allowing me to continue my exercise regimen while I was away from home. The spa was another noteworthy aspect that offered a restful and revitalising experience.</p>
                                    </div>
                                    <div className="d-flex gap-3 mb-5"><span className="fa-solid fa-thumbs-down text-body-quaternary" data-fa-transform="down-5"></span>
                                        <p className="mb-0"> It was a letdown to stay at this motel. Small, out-of-date, and lacking in comforts, the room. The staff was unwelcoming.</p>
                                    </div>
                                    <div className="card bg-body-highlight">
                                        <div className="card-body">
                                            <h6 className="mb-2 fw-bolder text-body-quaternary text-uppercase"><span className="fa-solid fa-reply me-2"></span>Hotel's Reply:</h6>
                                            <p className="mb-0">Thank you for choosing us. We will try to improve accordingly.</p>
                                        </div>
                                    </div>
                                    <hr className="mt-8 mb-8" />
                                    <div className="d-flex align-items-center position-relative gap-2 mb-3">
                                        <div className="avatar avatar-s ">
                                            <img className="rounded-circle " src="../../../../assets/img//team/30.webp" alt="" />
                                        </div><a className="fw-semibold text-body-emphasis stretched-link" href="#!">Travis Adams</a><img src="../../../../assets/img/country/canada.png" alt="" />
                                    </div>
                                    <div className="d-flex align-items-center flex-wrap gap-5 mb-5">
                                        <div className="d-flex align-items-center gap-4">
                                            <div className="border-end pe-4"><span className="badge text-bg-primary fs-8">4.6</span></div><a className="text-body-tertiary" href="#!"><span className="fa-solid fa-bed me-2 fs-9"></span>Single Room with Private Bathroom</a>
                                        </div>
                                        <div className="d-flex align-items-center gap-5">
                                            <h5 className="fw-normal text-body-tertiary"><span className="fa-solid fa-calendar me-2 fs-9"></span>March, 2023</h5>
                                            <h5 className="fw-normal text-body-tertiary"><span className="fa-solid fa-user me-2 fs-9"></span>Solo traveler</h5>
                                        </div>
                                    </div>
                                    <div className="d-flex gap-3 mb-5"><span className="fa-solid fa-thumbs-up text-success" data-fa-transform="down-5"></span>
                                        <p className="mb-0"> At this hotel, I had a fantastic time! The amenities were excellent, including a lovely pool, a cutting-edge gym, and a soothing spa. Also, the staff went above and beyond to make sure my stay was nice. They were really friendly. My stay was made comfortable and enjoyable by the room's size, comfort, and facilities. Also, the on-site restaurant was outstanding, with delectable fare and first-rate service.</p>
                                    </div>
                                    <div className="d-flex gap-3 mb-5"><span className="fa-solid fa-thumbs-down text-body-quaternary" data-fa-transform="down-5"></span>
                                        <p className="mb-0"> Due to the uncleanliness and subpar treatment, I was quite dissatisfied with my stay at this hotel.</p>
                                    </div>
                                    <div className="card bg-body-highlight">
                                        <div className="card-body">
                                            <h6 className="mb-2 fw-bolder text-body-quaternary text-uppercase"><span className="fa-solid fa-reply me-2"></span>Hotel's Reply:</h6>
                                            <p className="mb-0">Sorry for the inconvenience. We'll investigate.</p>
                                        </div>
                                    </div>
                                    <hr className="mt-8 mb-0" /><button className="btn bg-body border-translucent text-body-quaternary fw-bolder mt-n4">Show 2 more replies</button>
                                </div>
                            </div>
                        </div>
                        <div className="col-xl-4">
                            <div className="card mt-3 mt-xl-0">
                                <div className="card-body">
                                    <h5 className="mb-3">Summary</h5>
                                    <div className="card mb-3">
                                        <div className="card-body"><button className="btn p-0 position-absolute end-0 fs-8 mt-n5 me-n2 text-body-tertiary"><span className="fa-solid fa-circle-xmark"></span></button>
                                            <div className="d-flex justify-content-between gap-3 mb-4">
                                                <div>
                                                    <h5 className="text-body-highlight">Room 1</h5>
                                                    <p className="mb-0 text-body-tertiary">King-Super deluxe</p>
                                                </div>
                                                <h4 className="mb-0">$2,056.75</h4>
                                            </div>
                                            <div className="row align-items-center g-0">
                                                <div className="col-3">
                                                    <h5 className="text-body text-nowrap mb-0">Check in</h5>
                                                </div>
                                                <div className="col-auto"><span className="px-2">:</span></div>
                                                <div className="col-auto"><span>25 January, 2023</span></div>
                                            </div>
                                            <div className="row align-items-center g-0 mb-4">
                                                <div className="col-3">
                                                    <h5 className="text-body text-nowrap mb-0">Check out</h5>
                                                </div>
                                                <div className="col-auto"><span className="px-2">:</span></div>
                                                <div className="col-auto"><span>27 January, 2023</span></div>
                                            </div>
                                            <div className="d-flex flex-wrap gap-2"><span className="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span className="fa-solid fa-bed fs-9 me-2"></span><span>Double bed</span></span><span className="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span className="fa-solid fa-user fs-9 me-2"></span><span>2 Adults</span></span><span className="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span className="fa-solid fa-moon fs-9 me-2"></span><span>2 Nights</span></span></div>
                                        </div>
                                    </div>
                                    <div className="card mb-3">
                                        <div className="card-body"><button className="btn p-0 position-absolute end-0 fs-8 mt-n5 me-n2 text-body-tertiary"><span className="fa-solid fa-circle-xmark"></span></button>
                                            <div className="d-flex justify-content-between gap-3 mb-4">
                                                <div>
                                                    <h5 className="text-body-highlight">Room 2</h5>
                                                    <p className="mb-0 text-body-tertiary">Standard double queen</p>
                                                </div>
                                                <h4 className="mb-0">$1,456.65</h4>
                                            </div>
                                            <div className="row align-items-center g-0">
                                                <div className="col-3">
                                                    <h5 className="text-body text-nowrap mb-0">Check in</h5>
                                                </div>
                                                <div className="col-auto"><span className="px-2">:</span></div>
                                                <div className="col-auto"><span>25 January, 2023</span></div>
                                            </div>
                                            <div className="row align-items-center g-0 mb-4">
                                                <div className="col-3">
                                                    <h5 className="text-body text-nowrap mb-0">Check out</h5>
                                                </div>
                                                <div className="col-auto"><span className="px-2">:</span></div>
                                                <div className="col-auto"><span>28 January, 2023</span></div>
                                            </div>
                                            <div className="d-flex flex-wrap gap-2"><span className="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span className="fa-solid fa-bed fs-9 me-2"></span><span>Double bed</span></span><span className="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span className="fa-solid fa-user fs-9 me-2"></span><span>2 Adults</span></span><span className="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span className="fa-solid fa-baby fs-9 me-2"></span><span>1 Childs</span></span><span className="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span className="fa-solid fa-moon fs-9 me-2"></span><span>3 Nights</span></span></div>
                                        </div>
                                    </div>
                                    <div className="px-4 py-3 bg-body-highlight rounded-2">
                                        <div className="d-flex flex-between-center mb-2">
                                            <h6 className="text-body-tertiary fw-semibold">Sub-total</h6>
                                            <h6 className="text-body-highlight fw-semibold">$3,513.40</h6>
                                        </div>
                                        <div className="d-flex flex-between-center">
                                            <h6 className="text-body-tertiary fw-semibold">Discount</h6>
                                            <h6 className="text-body-tertiary fw-semibold">-$50</h6>
                                        </div>
                                        <hr />
                                        <div className="d-flex flex-between-center">
                                            <h4 className="text-body">Total</h4>
                                            <h4 className="text-body">1,756.70</h4>
                                        </div>
                                    </div><a className="btn btn-primary mt-3 w-100" href="../../../../apps/travel-agency/hotel/customer/checkout.html">Proceed with booking</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> */}
            <div className="container mt-5 mb-5">
                <div className="card shadow-sm">
                    <div className="card-body p-lg-5">
                        <div className="row g-5">
                            {/* Cột ảnh */}
                            <div className="col-12 col-lg-6">
                                <img
                                    src={`${PATHS.ADMIN_DASHBOARD}storage/${product.img}`}
                                    alt={product.name}
                                    className="img-fluid rounded w-100"
                                    style={{ maxHeight: '500px', objectFit: 'cover' }}
                                />
                                {galleryImages.length > 0 && (
                                    <div className="d-flex flex-wrap gap-2 mt-3 justify-content-center">
                                        {galleryImages.map((img, idx) => (
                                            <img
                                                key={img.id || idx}
                                                src={`${PATHS.ADMIN_DASHBOARD}storage/${product.img}`}
                                                alt={`${product.name} ${idx + 1}`}
                                                className="img-thumbnail rounded"
                                                style={{ width: '100px', height: '100px', objectFit: 'cover' }}
                                            />
                                        ))}
                                    </div>
                                )}
                            </div>

                            {/* Cột nội dung */}
                            <div className="col-12 col-lg-6">
                                <h1 className="display-5 fw-bold text-dark mb-2">{product.name}</h1>
                                <p className="fs-7 text-secondary-emphasis">
                                    <span className="fa-solid fa-car-side me-2"></span>
                                    Danh mục:{' '}
                                    {product.categories?.map((cat) => cat.name).join(', ') || 'N/A'}
                                </p>
                                <div className="d-flex align-items-center gap-3 mb-3">
                                    <span className="badge badge-phoenix badge-phoenix-warning fs-8 fw-normal">
                                        <span className="fa-solid fa-star me-1 fs-9"></span>
                                        <span className="badge-label">3.8</span>
                                    </span>
                                    <h4 className="mb-0 text-dark fw-bold text-nowrap">
                                        {product.min_price ? `$${product.min_price}` : 'Giá liên hệ'}
                                        <span className="text-secondary-lighter fs-8 fw-normal"></span>
                                    </h4>
                                </div>

                                <p className="text-body-highlight">{product.description}</p>

                                <ul className="list-unstyled text-body-secondary mt-4 mb-4">
                                    {product.views && <li><span className="fa-solid fa-eye me-2"></span>Lượt xem: {product.views}</li>}
                                    {/* {product.sold && <li><span className="fa-solid fa-cart-shopping me-2"></span>Đã bán: {product.sold}</li>} */}
                                    {product.created_at && <li><span className="fa-solid fa-calendar-alt me-2"></span>Ngày đăng: {new Date(product.created_at).toLocaleDateString()}</li>}
                                    {/* {product.updated_at && <li><span className="fa-solid fa-edit me-2"></span>Cập nhật: {new Date(product.updated_at).toLocaleDateString()}</li>} */}
                                </ul>

                                <div className="d-flex flex-wrap gap-2">
                                    <button
                                        className="btn btn-warning d-flex align-items-center"
                                        onClick={() => setShowBookingModal(true)}
                                    >
                                        <span className="fa-solid fa-calendar-check me-2"></span> Đặt lịch
                                    </button>
                                    <button
                                        className="btn btn-outline-danger d-flex align-items-center"
                                        onClick={() => handleToggleFavorite(product.id)}
                                    >
                                        <span className={`fa-${product.is_favorited ? 'solid' : 'regular'} fa-heart me-2`}></span>
                                        {product.is_favorited ? 'Đã yêu thích' : 'Yêu thích'}
                                    </button>
                                    <button
                                        className="btn btn-outline-primary d-flex align-items-center"
                                        onClick={() => setShowCommentModal(true)}
                                    >
                                        <span className="fa-solid fa-comment-dots me-2"></span> Bình luận
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {/* Modal đặt lịch */}
                {showBookingModal && (
                    <BookingFormModal
                        productId={product.id}
                        onClose={() => setShowBookingModal(false)}
                    />
                )}

                {/* Modal bình luận */}
                {showCommentModal && (
                    <CommentFormModal
                        productId={product.id}
                        onClose={() => setShowCommentModal(false)}
                    />
                )}
            </div>

            <section className="py-0 mb-9">
                <div className="container-medium-md px-0 px-md-3">
                    <div className="p-5 p-sm-7 py-xl-12 px-xl-15 rounded-md-2 overflow-hidden position-relative">
                        <div className="bg-holder bg-holder overlay bg-opacity-85"
                        // style={{ backgroundImage:'url(../../../../assets/img/bg/43.png');background-position: center; background-size: cover}}
                        ></div>
                        <div className="row g-5 position-relative justify-content-between">
                            <div className="col-md-6 col-lg-3">
                                <h5 className="text-white mb-3">Discover</h5>
                                <div className="row g-3">
                                    <div className="col">
                                        <ul className="list-unstyled mb-0">
                                            <li className="mb-1"><a className="text-secondary-lighter" href="#!">Home</a></li>
                                            <li className="mb-1"><a className="text-secondary-lighter" href="#!">Terms</a></li>
                                            <li className="mb-1"><a className="text-secondary-lighter" href="#!">Talent &amp; culture</a></li>
                                            <li className="mb-1"><a className="text-secondary-lighter" href="#!">Destination</a></li>
                                            <li className="mb-1"><a className="text-secondary-lighter" href="#!">Sitemap</a></li>
                                        </ul>
                                    </div>
                                    <div className="col">
                                        <ul className="list-unstyled mb-0">
                                            <li className="mb-1"><a className="text-secondary-lighter" href="#!">Refund policy</a></li>
                                            <li className="mb-1"><a className="text-secondary-lighter" href="#!">EMI Policy</a></li>
                                            <li className="mb-1"><a className="text-secondary-lighter" href="#!">Privacy Policy</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div className="col-md-6 col-lg-3">
                                <h5 className="text-white mb-3">Contact</h5><a className="d-block text-secondary-lighter mb-1 text-nowrap" href="mailto:info@phoenixtravels.com"><span className="fa-solid fa-envelope me-2 me-lg-1 me-xl-2"></span>info@phoenixtravels.com</a><a className="d-block text-secondary-lighter mb-1" href="tel:+13134048290"><span className="fa-solid fa-phone me-2 me-lg-1 me-xl-2"> </span>+13134048290</a>
                            </div>
                            <div className="col-lg-5">
                                <h2 className="text-white mb-2 fw-semibold">Enjoy your trip to the fullest</h2>
                                <p className="mb-5 text-secondary-lighter">Sign up and get notified<br />about best deals immediately </p>
                                <div className="d-flex gap-2">
                                    <div className="form-icon-container flex-1"><input className="form-control form-icon-input" type="text" placeholder="Your email address" /><span className="fa-solid fa-envelope form-icon text-body fs-9" data-fa-transform="up-2"></span></div><button className="btn btn-primary rounded">Sign up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </>
    );
};

export default ProductDetailPage;
