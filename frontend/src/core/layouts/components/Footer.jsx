import React from 'react';
import { Link } from 'react-router-dom';
import { PATHS } from '../../../common/constants'; // Import PATHS

const Footer = () => {
    return (
        <section className="booking-footer pb-6 pb-md-11 pt-15">
            <div className="container-medium">
                <div className="row gy-3 justify-content-between align-items-center">
                    <div className="col-auto">
                        <a href="#!"><img src="../../assets/img/icons/logo-1.png" alt="" /></a>
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
                    <div className="col-auto"> <a className="text-white me-4" href="#!"><span className="fa-brands fa-facebook-f"> </span></a><a className="text-white me-4" href="#!"><span className="fa-brands fa-twitter"></span></a><a className="text-white me-4" href="#!"><span className="fa-brands fa-linkedin-in"></span></a><a className="text-white" href="#!"><span className="fa-brands fa-behance"></span></a></div>
                    <div className="col-auto">
                        <p className="mb-0 text-white">Developed & Designed by <a class="mx-1" href="https://www.facebook.com/phung.ngoc.dung.164568">Phùng Ngọc Dũng</a>. All rights reserved<span
                            class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br
                                class="d-sm-none" />2025 &copy;<a class="mx-1" href="https://www.facebook.com/phung.ngoc.dung.164568"></a></p>
                    </div>
                </div>
            </div>
        </section>
    );
};
export default Footer;