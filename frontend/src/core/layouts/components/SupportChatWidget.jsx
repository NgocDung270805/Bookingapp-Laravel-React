// src/core/layouts/components/SupportChatWidget.jsx

import React, { useEffect, useRef, useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { sendGeminiMessage, fetchProducts } from '../../../modules/Products/slice';

// Import SimpleBar cho React và CSS của nó
import SimpleBar from 'simplebar-react';
import 'simplebar-react/dist/simplebar.min.css';

const SupportChatWidget = () => {
    // Refs
    // chatContainerRef: Không còn dùng để điều khiển display/opacity/visibility nữa,
    // mà chỉ dùng nếu cần truy cập phần tử DOM này cho mục đích khác (ví dụ: debug).
    // Nếu không dùng, có thể bỏ. Tôi sẽ giữ lại nhưng không dùng cho logic hiển thị.
    const chatContainerRef = useRef(null); 
    const chatDropdownRef = useRef(null); 
    const messagesEndRef = useRef(null); 
    const simplebarReactRef = useRef(null); // Ref cho SimpleBar component để truy cập instance của nó

    // State cho hiển thị widget (GIỮ NGUYÊN HOÀN TOÀN NHƯ YÊU CẦU CỦA BẠN)
    const [showChat, setShowChat] = useState(false); 

    // State cho CHAT LOGIC
    const [messages, setMessages] = useState([]); 
    const [inputValue, setInputValue] = useState(''); 

    // Redux Hook
    const dispatch = useDispatch(); 

    // Hàm xử lý khi nhấp vào nút "Chat demo" hoặc nút "Close Support" (GIỮ NGUYÊN HOÀN TOÀN)
    const handleChatToggle = (e) => {
        if (e) e.preventDefault(); 
        setShowChat(prev => !prev);
    };

    // Hàm tự động cuộn xuống cuối tin nhắn (sử dụng simplebar-react ref)
    const scrollToBottom = () => {
        if (simplebarReactRef.current && messagesEndRef.current) {
            const scrollElement = simplebarReactRef.current.getScrollElement();
            if (scrollElement) {
                scrollElement.scrollTop = scrollElement.scrollHeight;
            }
        }
    };

    // ===============================================
    // LOGIC CHAT VÀ TƯ VẤN AI
    // ===============================================

    // Xử lý gửi tin nhắn của người dùng
    const handleSendMessage = async (e) => {
        e.preventDefault(); 
        console.log("handleSendMessage triggered.");
        console.log("Current inputValue:", inputValue);
        if (inputValue.trim() === ''){
            console.log("Input value is empty, not sending.");
            return; 
        } 

        const userMessage = { type: 'user', text: inputValue };
        setMessages((prev) => [...prev, userMessage]); 
        setInputValue(''); 

        await getAIResponseFromGemini(userMessage.text);
    };

    // Hàm gọi AI Gemini và xử lý phản hồi, sau đó tìm kiếm sản phẩm
    const getAIResponseFromGemini = async (userText) => {
        setMessages((prev) => [...prev, { type: 'ai', text: 'Đang kết nối AI... Vui lòng đợi.' }]); 
        
        try {
            const geminiResultAction = await dispatch(sendGeminiMessage(userText)); 
            console.log("Gemini dispatch resultAction:", geminiResultAction);
            
            if (sendGeminiMessage.fulfilled.match(geminiResultAction)) {
                const { ai_response, suggested_products } = geminiResultAction.payload; 
                let finalAiText = ai_response;
                let productsToDisplay = [];

                if (suggested_products && suggested_products.length > 0) {
                    productsToDisplay = suggested_products;
                } else {
                    const lowerCaseUserText = userText.toLowerCase();
                    const productKeywords = ['sản phẩm', 'xe', 'tư vấn', 'tìm kiếm', 'muốn biết về', 'về'];
                    let searchQuery = '';

                    const regex = new RegExp(`(?:${productKeywords.join('|')})\\s*(.*)`, 'i');
                    const match = lowerCaseUserText.match(regex);
                    searchQuery = match && match[1] ? match[1].trim() : lowerCaseUserText;

                    const commonWords = ['tôi', 'bạn', 'là', 'có', 'cái', 'nào', 'gì', 'thế', 'này', 'đó', 'xin', 'chào', 'cảm ơn', 'hỏi', 'về'];
                    searchQuery = searchQuery.split(' ').filter(word => !commonWords.includes(word)).join(' ').trim();

                    if (searchQuery.length > 2) { 
                        const productsResultAction = await dispatch(fetchProducts(searchQuery));
                        if (fetchProducts.fulfilled.match(productsResultAction)) {
                            productsToDisplay = productsResultAction.payload;
                        } else {
                            console.error("Error fetching products for AI suggestion:", productsResultAction.payload);
                        }
                    }
                }

                if (productsToDisplay && productsToDisplay.length > 0) {
                    finalAiText += '\n\nCác sản phẩm gợi ý phù hợp:\n';
                    productsToDisplay.forEach(p => {
                        finalAiText += `- ${p.name} (ID: ${p.id})\n`;
                    });
                    finalAiText += '\nBạn muốn biết thêm chi tiết về sản phẩm nào?';
                } else if (userText.toLowerCase().includes('sản phẩm') || userText.toLowerCase().includes('xe')) {
                    finalAiText += '\n\nXin lỗi, tôi không tìm thấy sản phẩm nào phù hợp với yêu cầu của bạn trong hệ thống.';
                }

                setMessages((prev) => [...prev, { type: 'ai', text: finalAiText }]); 
            } else {
                setMessages((prev) => [...prev, { type: 'ai', text: 'Xin lỗi, có lỗi xảy ra khi nhận phản hồi từ AI.' }]);
                console.error("Error from AI dispatch (rejected):", geminiResultAction.payload);
            }
        } catch (error) {
            console.error("Error calling AI API:", error);
            setMessages((prev) => [...prev, { type: 'ai', text: 'Rất tiếc, không thể kết nối với dịch vụ AI.' }]);
        }
    };


    // ===============================================
    // USEEFFECTS CHO KHỞI TẠO THƯ VIỆN VÀ CUỘN TỰ ĐỘNG
    // ===============================================

    // useEffect đầu tiên: Khởi tạo các thư viện JS bên ngoài (Bootstrap Dropdown, Font Awesome)
    // Chạy MỘT LẦN khi component mount
    useEffect(() => {
        // Khởi tạo Bootstrap Dropdown (dùng ref)
        if (window.bootstrap && window.bootstrap.Dropdown && chatDropdownRef.current) {
            new window.bootstrap.Dropdown(chatDropdownRef.current);
        }
        // Khởi tạo Font Awesome (nếu các icon fa-solid chưa được hiển thị)
        if (window.FontAwesome && window.FontAwesome.dom) {
            window.FontAwesome.dom.i2svg();
        }
        // Cleanup function (nếu thư viện có phương thức destroy)
        return () => { /* ... */ };
    }, []); // Dependencies array rỗng để chỉ chạy một lần khi mount

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
                        <h5 className="mb-0 d-flex align-items-center gap-2">Chat trục tuyến<span
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
                        <SimpleBar className="d-flex flex-column-reverse scrollbar h-100 p-3" ref={simplebarReactRef}> {/* GẮN REF simplebarReactRef */}
                            {messages.map((msg, index) => (
                                <div key={index} style={{
                                    alignSelf: msg.type === 'user' ? 'flex-end' : 'flex-start', 
                                    marginBottom: '8px',
                                    maxWidth: '80%',
                                    wordWrap: 'break-word',
                                }}>
                                    <span style={{
                                        backgroundColor: msg.type === 'user' ? '#007bff' : '#e0e0e0',
                                        color: msg.type === 'user' ? 'white' : 'black',
                                        padding: '8px 12px',
                                        borderRadius: '15px',
                                        display: 'inline-block',
                                    }}>
                                        {msg.text}
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
                                    placeholder="Write message"
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
            {/* Nút "Chat Với AI" - GẮN ONCLICK */}
            <button className={`btn btn-support-chat p-0 border border-translucent ${showChat ? 'btn-chat-close' : ''}`} onClick={handleChatToggle}>
                <span className="fs-8 btn-text text-primary text-nowrap">Chat Với AI</span>
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
