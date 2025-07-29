import React, { useEffect } from 'react';
import { Link } from 'react-router-dom';
import { PATHS } from '../../../common/constants'; // Import PATHS
import { useDispatch, useSelector } from 'react-redux'; // Hoặc import { useAppDispatch, useAppSelector } from '../../../appRedux';
import { fetchBanners, selectFooterBackgroundBanner, selectLogoBanner } from '../../../modules/Banners/slice';

const Footer = () => {
    const dispatch = useDispatch(); // Hoặc useAppDispatch()
    const logoBanner = useSelector(selectLogoBanner); // Hook thứ ba
    const footerBanner = useSelector(selectFooterBackgroundBanner);
    const bannersLoading = useSelector(state => state.banners.loading); // Hook thứ tư

    // Lấy danh sách banners ở cấp cao nhất của component
    const allBanners = useSelector(state => state.banners.banners); // Đặt Hook này ở đây

    // Các useEffect cũng là Hooks, đặt sau các useState/useRef/useSelector/useDispatch
    useEffect(() => {
        // Bây giờ bạn có thể sử dụng allBanners mà không vi phạm quy tắc Hooks
        if (!bannersLoading && allBanners.length === 0) {
            dispatch(fetchBanners(2));
        }
    }, [dispatch, bannersLoading, allBanners.length]); // Thêm allBanners.length vào dependency array {{ backgroundImage: "url(../../assets/img/bg/bg-left-27.png)"}}
    return (
        <div className="container-medium">
            <div className="d-flex align-items-center justify-content-between mb-3">
                <Link to={PATHS.HOME} className="navbar-brand">
                    <div className="d-flex align-items-center">
                        {bannersLoading ? (
                            <span></span> // Hiển thị trạng thái tải
                        ) : logoBanner && logoBanner.image_path ? (
                            <img src={logoBanner.image_path} alt={logoBanner.title || "Logo BookingApp"} style={{ height: '40px', marginRight: '10px' }} />
                        ) : (
                            <img src="../../assets/img/icons/logo.png" alt="" style={{ height: '40px', marginRight: '10px' }} />
                        )}
                        {/* <h5 className="logo-text ms-2">phoenix</h5> */}
                    </div>
                </Link>
                <div className="dropdown"><button className="btn btn-sm p-0 d-md-none fs-8" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span className="fas fa-ellipsis-h"></span></button>
                    <ul className="dropdown-menu dropdown-menu-end" style={{ zIndex: 9999 }}>
                        <li><Link to={PATHS.HOME} className="dropdown-item">Home</Link></li>
                        <li><a className="dropdown-item" href="#!">Bài viết</a></li>
                        {/* <li><a className="dropdown-item" href="#!">Career</a></li> */}
                        <li><a className="dropdown-item" href="mailto:phungdung2708@gmail.com">Hỗ trợ</a></li>
                        <li><a className="dropdown-item" href="tel:+84965336741">+84.965.336.741</a></li>
                    </ul>
                </div>
                <ul className="d-none d-md-flex gap-5 list-unstyled mb-0">
                    <li><Link to={PATHS.HOME} className="lh-1 text-body-tertiary fw-semibold fs-9">Home</Link></li>
                    <li><a className="lh-1 text-body-tertiary fw-semibold fs-9" href="#!">Bài viết</a></li>
                    {/* <li><a className="lh-1 text-body-tertiary fw-semibold fs-9" href="#!">Career</a></li> */}
                    <li><a className="lh-1 text-body-tertiary fw-semibold fs-9" href="mailto:phungdung2708@gmail.com"> <span className="fa-regular fa-envelope me-2" data-fa-transform="down-1"></span>Hỗ Trợ</a></li>
                    <li><a className="lh-1 text-body-tertiary fw-semibold fs-9" href="tel:+84965336741"> <span className="fa-brands fa-whatsapp me-2"></span>+84.965.336.741</a></li>
                </ul>
            </div>
            <footer className="footer position-relative px-0">
                <div className="row g-0 justify-content-between align-items-center h-100">
                    <div className="col-12 col-sm-auto text-center">
                        <p className="mb-0 text-black">Developed & Designed by
                            <a className="mx-1" href="https://www.facebook.com/phung.ngoc.dung.164568">Phùng Ngọc Dũng</a>. All rights reserved
                            <span className="d-none d-sm-inline-block"></span>
                            <span className="d-none d-sm-inline-block mx-1">|</span><br className="d-sm-none" />2025 &copy;
                            <a className="mx-1" href="https://www.facebook.com/phung.ngoc.dung.164568"></a>
                        </p>
                    </div>
                    <div className="col-12 col-sm-auto text-center">
                        <p className="mb-0 text-body-tertiary text-opacity-85">v1.0.0</p>
                    </div>
                </div>
            </footer>
        </div>
    );
};
export default Footer;