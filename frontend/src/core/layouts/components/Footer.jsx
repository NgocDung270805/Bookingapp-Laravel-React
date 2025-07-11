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
        <section className="booking-footer pb-6 pb-md-11 pt-15" style={{
            backgroundImage: footerBanner?.image_path
            ? `url(${footerBanner.image_path})`
            : 'none',
        }}>
            <div className="container-medium">
                <div className="row gy-3 justify-content-between align-items-center">
                    <div className="col-auto">
                        <a href="#!">
                            {bannersLoading ? (
                                <span></span> // Hiển thị trạng thái tải
                            ) : logoBanner && logoBanner.image_path ? (
                                <img src={logoBanner.image_path} alt={logoBanner.title || "Logo BookingApp"} style={{ height: '40px', marginRight: '10px' }} />
                            ) : (
                                <img src="../../assets/img/icons/logo.png" alt="" style={{ height: '40px', marginRight: '10px' }} />
                            )}
                        </a>
                    </div>
                    <div className="col-auto">
                        <ul className="mb-0 list-unstyled d-flex flex-wrap">
                            <li className="me-3 me-sm-5"><a className="fs-8 fw-bold text-white" href="#!">Home</a></li>
                            <li className="me-3 me-sm-5"><a className="fs-8 fw-bold text-white" href="#!">About</a></li>
                            <li className="me-3 me-sm-5"><a className="fs-8 fw-bold text-white" href="#!">Contact</a></li>
                            <li className="me-3 me-sm-5"><a className="fs-8 fw-bold text-white" href="#!">FAQ</a></li>
                            <li><a className="fs-8 fw-bold text-white" href="#!">Gallery</a></li>
                        </ul>
                    </div>
                </div>
                <hr className="my-4" />
                <div className="row gy-3 justify-content-between">
                    <div className="col-auto">
                        <a className="text-white me-4" href="#!">
                            <span className="fa-brands fa-facebook-f"> </span>
                        </a>
                        <a className="text-white me-4" href="#!">
                            <span className="fa-brands fa-twitter"></span>
                        </a>
                        <a className="text-white me-4" href="#!">
                            <span className="fa-brands fa-linkedin-in"></span>
                        </a>
                        <a className="text-white" href="#!">
                            <span className="fa-brands fa-behance"></span>
                        </a>
                    </div>
                    <div className="col-auto">
                        <p className="mb-0 text-white">Developed & Designed by
                            <a className="mx-1" href="https://www.facebook.com/phung.ngoc.dung.164568">Phùng Ngọc Dũng</a>. All rights reserved
                            <span className="d-none d-sm-inline-block"></span>
                            <span className="d-none d-sm-inline-block mx-1">|</span><br className="d-sm-none" />2025 &copy;
                            <a className="mx-1" href="https://www.facebook.com/phung.ngoc.dung.164568"></a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    );
};
export default Footer;