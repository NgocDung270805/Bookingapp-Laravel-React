// src/core/layouts/components/SupportChatWidget.jsx

import React, { useEffect, useRef, useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { sendGeminiMessage, fetchProducts } from '../../../modules/Products/slice';

import SimpleBar from 'simplebar-react';
import 'simplebar-react/dist/simplebar.min.css';
import { DotLottieReact } from '@lottiefiles/dotlottie-react';

const SupportChatWidget = () => {
    // Refs
    const chatContainerRef = useRef(null);
    const chatDropdownRef = useRef(null);
    const messagesEndRef = useRef(null);
    const simplebarReactRef = useRef(null);

    // State
    const [showChat, setShowChat] = useState(false);
    const [messages, setMessages] = useState([]);
    const [inputValue, setInputValue] = useState('');

    // Redux Hook
    const dispatch = useDispatch();

    // Hàm xử lý khi nhấp vào nút "Chat demo" hoặc nút "Close Support"
    const handleChatToggle = (e) => {
        if (e) e.preventDefault();
        setShowChat(prev => !prev);
    };

    // Hàm tự động cuộn xuống cuối tin nhắn
    const scrollToBottom = () => {
        if (simplebarReactRef.current && simplebarReactRef.current.getScrollElement()) {
            const scrollElement = simplebarReactRef.current.getScrollElement();
            if (scrollElement) {
                scrollElement.scrollTop = scrollElement.scrollHeight;
            }
        }
    };

    // ===============================================
    // LOGIC CHAT VÀ TƯ VẤN AI (Đã sửa)
    // ===============================================

    // Xử lý gửi tin nhắn của người dùng
    const handleSendMessage = async (e) => {
        e.preventDefault();
        if (inputValue.trim() === '') {
            console.log("Input value is empty, not sending.");
            return;
        }

        const userMessage = { type: 'user', text: inputValue };
        setMessages((prev) => [...prev, userMessage]);
        setInputValue('');

        await getAIResponseFromGemini(userMessage.text);
    };

    // Hàm gọi AI Gemini và xử lý phản hồi, sau đó hiển thị sản phẩm từ backend
    const getAIResponseFromGemini = async (userText) => {
        // Thêm tin nhắn loading vào cuối mảng
        setMessages((prev) => [...prev, {
            type: 'ai',
            is_loading: true,
            component: <DotLottieReact
                src="https://lottie.host/d9f2bc14-4931-4460-8d34-99ae08ad0ee0/zjBnHhy8Q6.lottie"
                loop
                autoplay
            />
        }]);

        try {
            const resultAction = await dispatch(sendGeminiMessage(userText));

            if (sendGeminiMessage.fulfilled.match(resultAction)) {
                const { ai_response, suggested_products } = resultAction.payload;
                let finalAiText = ai_response;

                // Tạo phản hồi AI mới
                const newAiMessage = {
                    type: 'ai',
                    text: finalAiText,
                    products: suggested_products && suggested_products.length > 0 ? suggested_products.map(p => (
                        <div key={p.id} style={{
                            marginTop: '10px',
                            border: '1px solid #ddd',
                            padding: '8px',
                            borderRadius: '5px',
                            backgroundColor: '#f9f9f9',
                            display: 'flex',
                            alignItems: 'center',
                            textDecoration: 'none',
                            color: 'inherit'
                        }}>
                            {p.img && <img src={p.img} alt={p.name} style={{ width: '50px', height: '50px', marginRight: '10px', borderRadius: '3px', objectFit: 'cover' }} />}
                            <div>
                                <a href={`/products/${p.slug}`} target="_blank" rel="noopener noreferrer" style={{ fontWeight: 'bold', color: '#007bff', textDecoration: 'none' }}>
                                    {p.name}
                                </a>
                                <p style={{ margin: 0, fontSize: '0.8em', color: '#555' }}>Lượt xem: {p.views || 0}</p>
                            </div>
                        </div>
                    )) : null
                };

                // Cập nhật state bằng cách thay thế tin nhắn loading bằng phản hồi mới
                setMessages((prev) => {
                    const updatedMessages = [...prev];
                    updatedMessages.pop(); // Xóa tin nhắn loading cuối cùng
                    return [...updatedMessages, newAiMessage]; // Thêm tin nhắn mới
                });
            } else {
                // Cập nhật state khi có lỗi bằng cách thay thế tin nhắn loading
                setMessages((prev) => {
                    const updatedMessages = [...prev];
                    updatedMessages.pop();
                    return [...updatedMessages, { type: 'ai', text: 'Xin lỗi, có lỗi xảy ra khi nhận phản hồi từ AI.' }];
                });
                console.error("Error from AI dispatch (rejected):", resultAction.payload);
            }
        } catch (error) {
            console.error("Error calling AI API:", error);
            // Cập nhật state khi có lỗi bằng cách thay thế tin nhắn loading
            setMessages((prev) => {
                const updatedMessages = [...prev];
                updatedMessages.pop();
                return [...updatedMessages, { type: 'ai', text: 'Rất tiếc, không thể kết nối với dịch vụ AI.' }];
            });
        }
    };


    // ===============================================
    // USEEFFECTS CHO KHỞI TẠO THƯ VIỆN VÀ ĐIỀU KHIỂN HIỂN THỊ
    // ===============================================

    // useEffect đầu tiên: Khởi tạo các thư viện JS bên ngoài (Bootstrap Dropdown, Font Awesome)
    // Chạy MỘT LẦN khi component mount
    useEffect(() => {
        if (window.bootstrap && window.bootstrap.Dropdown && chatDropdownRef.current) {
            new window.bootstrap.Dropdown(chatDropdownRef.current);
        }
        if (window.FontAwesome && window.FontAwesome.dom) {
            window.FontAwesome.dom.i2svg();
        }
        return () => { /* ... */ };
    }, []);

    // useEffect thứ hai: Điều khiển hiển thị/ẩn widget dựa trên showChat
    // Chạy mỗi khi showChat thay đổi
    useEffect(() => {
        const contentElement = chatContainerRef.current;
        const toggleButtonElement = document.querySelector('.btn-support-chat-trigger');

        if (contentElement && toggleButtonElement) {
            contentElement.style.setProperty('position', 'fixed', 'important');
            contentElement.style.setProperty('bottom', '20px', 'important');
            contentElement.style.setProperty('right', '20px', 'important');
            contentElement.style.setProperty('z-index', '9999', 'important');
            contentElement.style.setProperty('width', '350px', 'important');
            contentElement.style.setProperty('height', '500px', 'important');
            contentElement.style.setProperty('box-shadow', '0 4px 10px rgba(0,0,0,0.2)', 'important');
            contentElement.style.setProperty('background-color', 'white', 'important');

            if (showChat) {
                contentElement.style.setProperty('display', 'block', 'important');
                contentElement.style.setProperty('opacity', '1', 'important');
                contentElement.style.setProperty('visibility', 'visible', 'important');

                toggleButtonElement.style.setProperty('display', 'none', 'important');

                if (simplebarReactRef.current) {
                    // simplebarReactRef.current.recalculate(); 
                }

            } else {
                contentElement.style.setProperty('display', 'none', 'important');
                contentElement.style.setProperty('opacity', '0', 'important');
                contentElement.style.setProperty('visibility', 'hidden', 'important');

                toggleButtonElement.style.setProperty('display', 'block', 'important');
            }
        }
    }, [showChat]);

    // useEffect để tự động cuộn xuống cuối tin nhắn mỗi khi messages thay đổi
    useEffect(() => {
        scrollToBottom();
    }, [messages]);
    return (
        // Container ngoài cùng. Class 'show' sẽ được thêm/bớt để điều khiển hiển thị
        // Vị trí cố định (fixed) của widget sẽ được điều khiển bởi CSS của template cho .support-chat-container
        <div className={`${showChat ? 'show' : ''}`} ref={chatContainerRef}> {/* Gắn ref cho div này */}
            {/* Thêm class 'show-chat' cho 'support-chat' để CSS có thể điều khiển hiển thị nội dung chat */}
            <div className={`container-fluid support-chat ${showChat ? 'show-chat' : ''}`}>
                <div className="card bg-body-emphasis">
                    <div className="card-header d-flex flex-between-center px-4 py-3 border-bottom border-translucent">
                        <h5 className="mb-0 d-flex align-items-center gap-2">Chat trực tuyến<span
                            className="fa-solid fa-circle text-success fs-11"></span></h5>
                        <div className="btn-reveal-trigger">
                            <button
                                className="btn btn-link p-0 dropdown-toggle dropdown-caret-none transition-none d-flex" type="button"
                                id="support-chat-dropdown" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                aria-expanded="false" data-bs-reference="parent" ref={chatDropdownRef}> {/* GẮN REF */}
                                <span className="fas fa-ellipsis-h text-body"></span>
                            </button>
                            <div className="dropdown-menu dropdown-menu-end py-2" aria-labelledby="support-chat-dropdown">
                                <a className="dropdown-item" href="#!">Yêu cầu gọi lại</a>
                                <a className="dropdown-item" href="#!">Tìm kiếm trong chat</a>
                                <a className="dropdown-item" href="#!">Hiển thị lịch sử</a>
                                <a className="dropdown-item" href="#!">Báo cáo cho Admin</a>
                                <a className="dropdown-item" href="#!" onClick={handleChatToggle}>Đóng hỗ trợ</a>
                            </div>
                        </div>
                    </div>
                    <div className="card-body chat p-0">
                        {/* KHUNG TIN NHẮN ĐƯỢC QUẢN LÝ BẰNG SimpleBar */}
                        <SimpleBar className="d-flex flex-column-reverse scrollbar h-100 p-3" ref={simplebarReactRef}>
                            <div className="text-center mt-auto">
                                <div className="avatar avatar-3xl status-online">
                                    {/* Cho nó to ra */}
                                    <DotLottieReact
                                        src="https://lottie.host/4442012d-4a38-4cb1-a90f-4e43bde28c29/25t0bF36LK.lottie"
                                        loop
                                        autoplay style={{ width: "250px", height: "150px ", marginLeft: "-90px", marginTop: "-40px" }}
                                    />
                                </div>
                                <h5 className="mt-2 mb-3">CSKH</h5>
                                <p className="text-center text-body-emphasis mb-0">"Tôi là trợ lý của bạn – online 24/24, trả lời mọi câu hỏi!"</p>
                            </div>
                            {messages.map((msg, index) => (
                                <div key={index} style={{
                                    alignSelf: msg.type === 'user' ? 'flex-end' : 'flex-start',
                                    marginBottom: '8px',
                                    maxWidth: '80%',
                                    wordWrap: 'break-word',
                                }}>
                                    <span style={{
                                        backgroundColor: msg.is_loading ? 'transparent' : (msg.type === 'user' ? '#007bff' : '#e0e0e0'),
                                        color: msg.type === 'user' ? 'white' : 'black',
                                        padding: '8px 12px',
                                        borderRadius: '15px',
                                        display: 'inline-block',
                                    }}>
                                        {/* Render text hoặc JSX products nếu có */}
                                        {msg.component && (
                                            <div style={{ width: '50px', height: '50px' }}>{/* Render component loading nếu có */}
                                                {msg.component}
                                            </div>
                                        )}
                                        {msg.text}
                                        {msg.products && msg.products.length > 0 && (
                                            <div style={{ marginTop: '10px' }}>
                                                {msg.products} {/* Render mảng JSX sản phẩm */}
                                            </div>
                                        )}
                                    </span>
                                </div>
                            ))}
                            <div ref={messagesEndRef} />
                        </SimpleBar>
                    </div>
                    <div className="card-footer d-flex align-items-center gap-2 border-top border-translucent ps-3 pe-4 py-3">
                        {/* Form gửi tin nhắn */}
                        <form onSubmit={handleSendMessage} style={{ display: 'flex', flex: 1, gap: '10px' }}>
                            <div className="d-flex align-items-center flex-1 gap-3 border border-translucent rounded-pill px-4">
                                <input
                                    className="form-control outline-none border-0 flex-1 fs-9 px-0"
                                    type="text"
                                    placeholder="Nhập tại đây......"
                                    value={inputValue}
                                    onChange={(e) => setInputValue(e.target.value)}
                                />
                                <label className="btn btn-link d-flex p-0 text-body-quaternary fs-9 border-0" htmlFor="supportChatPhotos">
                                    <span className="fa-solid fa-image"></span>
                                </label>
                                <input className="d-none" type="file" accept="image/*" id="supportChatPhotos" />
                                <label className="btn btn-link d-flex p-0 text-body-quaternary fs-9 border-0" htmlFor="supportChatAttachment">
                                    <span className="fa-solid fa-paperclip"></span>
                                </label>
                                <input className="d-none" type="file" id="supportChatAttachment" />
                            </div>
                            <button type="submit" className="btn p-0 border-0 send-btn">
                                <span className="fa-solid fa-paper-plane fs-9"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            {/* Nút "Chat Với AI" */}
            <button className={`btn btn-support-chat p-0 ${showChat ? 'btn-chat-close' : ''}`} onClick={handleChatToggle}>
                <span className="fs-8 btn-text text-primary text-nowrap" style={{ transform: "translateX(90px)" }}>
                    <DotLottieReact
                        src="https://lottie.host/b3c296b0-4ee3-44d5-af72-dd9091a410d4/6kxlNEK1rA.lottie"
                        loop
                        autoplay style={{ width: "250px", height: "150px ", marginLeft: "-200px", marginTop: "-40px" }}
                    />
                </span>

                <span className="ping-icon-wrapper mt-n4 ms-n6 mt-sm-0 ms-sm-2 position-absolute position-sm-relative">
                    <span className="ping-icon-bg"></span>
                    <span className="fa-solid fa-circle ping-icon"></span>
                </span>
                <span className="text-primary fs-8 d-sm-none" style={{ transform: "translateX(65px)" }} >
                    <DotLottieReact
                        src="https://lottie.host/b3c296b0-4ee3-44d5-af72-dd9091a410d4/6kxlNEK1rA.lottie"
                        loop
                        autoplay style={{ width: "150px", height: "150px ", marginLeft: "-115px" }}
                    />
                </span>
                <span className="fa-solid fa-chevron-down text-primary fs-7"></span>
            </button>
        </div>
    );
};

export default SupportChatWidget;
