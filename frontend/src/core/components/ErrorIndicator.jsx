// src/core/components/ErrorIndicator.jsx

import React from 'react';
import { PATHS } from '../../common/constants';
import { Link } from 'react-router-dom';
import './ErrorIndicator.css'; // Import file CSS

const ErrorIndicator = () => {
    return (
        <section className="page_404">
            <div className="container d-flex justify-content-center align-items-center">
                <div className="row">
                    <div className="col-sm-12 ">
                        <div className="col-sm-10 col-sm-offset-1  text-center">
                            <div className="four_zero_four_bg">
                                <h1 class="text-center ">404</h1>

                            </div>

                            <div class="contant_box_404">
                                <h3 class="h2">
                                    Có vẻ như bạn bị lạc
                                </h3>

                                <p>trang bạn đang tìm kiếm không có sẵn!</p>

                                <Link to={PATHS.HOME} class="link_404">Về trang chủ</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
};

export default ErrorIndicator;