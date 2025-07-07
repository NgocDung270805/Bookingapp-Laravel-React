// src/core/layouts/components/SupportChatWidget.jsx

import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import { PATHS } from '../../../common/constants';

const SupportChatWidget = () => {
    // Sử dụng state để kiểm soát việc hiển thị chat widget
    const [showChat, setShowChat] = useState(false);

    // Hàm xử lý khi nhấp vào nút "Chat demo" hoặc nút "Close Support"
    const handleChatToggle = () => {
        setShowChat(prev => !prev);
    };

    // useEffect để khởi tạo SimpleBar khi chat được mở
    // hoặc đảm bảo SimpleBar được cập nhật khi kích thước thay đổi
    useEffect(() => {
        if (showChat) {
            // Tìm phần tử có lớp 'scrollbar' bên trong chat
            const scrollbarElement = document.querySelector('.support-chat .scrollbar');
            if (window.SimpleBar && scrollbarElement) {
                // Khởi tạo SimpleBar. Nếu nó đã được khởi tạo, nó sẽ được cập nhật.
                new window.SimpleBar(scrollbarElement);
            }
        }
        // Dependency array: chạy lại effect này khi showChat thay đổi
    }, [showChat]);

    return (
        <div className={`${showChat ? 'show' : ''}`}>
            {/* Thêm class 'show-chat' cho 'support-chat' để CSS có thể điều khiển hiển thị nội dung chat */}
            <div className={`container-fluid support-chat ${showChat ? 'show-chat' : ''}`}>
                <div className="card bg-body-emphasis">
                    <div className="card-header d-flex flex-between-center px-4 py-3 border-bottom border-translucent">
                        <h5 className="mb-0 d-flex align-items-center gap-2">Demo widget<span className="fa-solid fa-circle text-success fs-11"></span></h5>
                        <div className="btn-reveal-trigger">
                            <button className="btn btn-link p-0 dropdown-toggle dropdown-caret-none transition-none d-flex" type="button" id="support-chat-dropdown" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                <span className="fas fa-ellipsis-h text-body"></span>
                            </button>
                            <div className="dropdown-menu dropdown-menu-end py-2" aria-labelledby="support-chat-dropdown">
                                <a className="dropdown-item" href="#!">Request a callback</a>
                                <a className="dropdown-item" href="#!">Search in chat</a>
                                <a className="dropdown-item" href="#!">Show history</a>
                                <a className="dropdown-item" href="#!">Report to Admin</a>
                                {/* Thêm onClick để đóng chat khi nhấp vào "Close Support" */}
                                <a className="dropdown-item btn-support-chat" href="#!" onClick={handleChatToggle}>Close Support</a>
                            </div>
                        </div>
                    </div>
                    <div className="card-body chat p-0">
                        {/* Giữ nguyên class 'scrollbar' cho nội dung cuộn */}
                        <div className="d-flex flex-column-reverse scrollbar h-100 p-3">
                            <div className="text-end mt-6">
                                <Link className="mb-2 d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" to="#!">
                                    <p className="mb-0 fw-semibold fs-9">I need help with something</p><span className="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
                                </Link>
                                <Link className="mb-2 d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" to="#!">
                                    <p className="mb-0 fw-semibold fs-9">I can’t reorder a product I previously ordered</p><span className="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
                                </Link>
                                <Link className="mb-2 d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" to="#!">
                                    <p className="mb-0 fw-semibold fs-9">How do I place an order?</p><span className="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
                                </Link>
                                <Link className="false d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" to="#!">
                                    <p className="mb-0 fw-semibold fs-9">My payment method not working</p><span className="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
                                </Link>
                            </div>
                            <div className="text-center mt-auto">
                                <div className="avatar avatar-3xl status-online"><img className="rounded-circle border border-3 border-light-subtle" src="../../../../assets/img/team/30.webp" alt="" /></div>
                                <h5 className="mt-2 mb-3">Eric</h5>
                                <p className="text-center text-body-emphasis mb-0">Ask us anything – we’ll get back to you here or by email within 24 hours.</p>
                            </div>
                        </div>
                    </div>
                    <div className="card-footer d-flex align-items-center gap-2 border-top border-translucent ps-3 pe-4 py-3">
                        <div className="d-flex align-items-center flex-1 gap-3 border border-translucent rounded-pill px-4">
                            <input className="form-control outline-none border-0 flex-1 fs-9 px-0" type="text" placeholder="Write message" />
                            <label className="btn btn-link d-flex p-0 text-body-quaternary fs-9 border-0" htmlFor="supportChatPhotos"><span className="fa-solid fa-image"></span></label>
                            <input className="d-none" type="file" accept="image/*" id="supportChatPhotos" />
                            <label className="btn btn-link d-flex p-0 text-body-quaternary fs-9 border-0" htmlFor="supportChatAttachment"> <span className="fa-solid fa-paperclip"></span></label>
                            <input className="d-none" type="file" id="supportChatAttachment" />
                        </div>
                        <button className="btn p-0 border-0 send-btn"><span className="fa-solid fa-paper-plane fs-9"></span></button>
                    </div>
                </div>
            </div>
            {/* Nút "Chat demo" - Thêm onClick để bật/tắt chat */}
            <button className={`btn btn-support-chat p-0 border border-translucent ${showChat ? 'btn-chat-close' : ''}`} onClick={handleChatToggle}>
                <span className="fs-8 btn-text text-primary text-nowrap">Chat demo</span>
                <span className="ping-icon-wrapper mt-n4 ms-n6 mt-sm-0 ms-sm-2 position-absolute position-sm-relative">
                    <span className="ping-icon-bg"></span>
                    <span className="fa-solid fa-circle ping-icon"></span>
                </span>
                <span className="fa-solid fa-headset text-primary fs-8 d-sm-none"></span>
                <span className="fa-solid fa-chevron-down text-primary fs-7"></span>
            </button>
        </div>
    );
};

export default SupportChatWidget;