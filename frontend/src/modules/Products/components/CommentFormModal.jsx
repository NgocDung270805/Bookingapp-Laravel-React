// src/modules/Products/components/CommentFormModal.jsx

import React, { useState } from 'react';
import { useAppDispatch, useAppSelector } from '../../../appRedux';
import { addComment } from '../slice';

const CommentFormModal = ({ productId, onClose }) => {
  const dispatch = useAppDispatch();
  const { loading, error } = useAppSelector((state) => state.products);

  const [content, setContent] = useState('');
  const [rating, setRating] = useState(''); // Có thể là số hoặc string tùy theo input type

  const handleSubmit = async (e) => {
    e.preventDefault();
    const commentData = {
      content: content,
      rating: rating ? parseInt(rating) : null, // Chuyển đổi sang số nếu có
    };

    const resultAction = await dispatch(addComment({ productId, commentData }));

    if (addComment.fulfilled.match(resultAction)) {
      alert('Bình luận của bạn đã được gửi!'); // Giữ alert đơn giản hoặc thay bằng Toast
      onClose(); // Đóng modal sau khi gửi thành công
    } else {
      // Lỗi sẽ được hiển thị qua error state trong Redux slice hoặc từ payload
      alert(`Lỗi khi gửi bình luận: ${JSON.stringify(resultAction.payload)}`);
    }
  };

  return (
    <div style={modalOverlayStyle}>
      <div style={modalContentStyle}>
        <h3>Bình luận cho Sản phẩm #{productId}</h3>
        <form onSubmit={handleSubmit}>
          <div style={{ marginBottom: '10px' }}>
            <label htmlFor="commentContent" style={labelStyle}>Nội dung:</label>
            <textarea
              id="commentContent"
              value={content}
              onChange={(e) => setContent(e.target.value)}
              required
              rows="4"
              style={inputStyle}
            ></textarea>
          </div>
          <div style={{ marginBottom: '10px' }}>
            <label htmlFor="commentRating" style={labelStyle}>Đánh giá (1-5 sao):</label>
            <input
              type="number"
              id="commentRating"
              value={rating}
              onChange={(e) => setRating(e.target.value)}
              min="1"
              max="5"
              style={inputStyle}
            />
          </div>
          {error && <p style={{ color: 'red' }}>Lỗi: {error}</p>}
          <div style={{ display: 'flex', justifyContent: 'flex-end', gap: '10px' }}>
            <button type="button" onClick={onClose} style={cancelButtonStyle}>Hủy</button>
            <button type="submit" disabled={loading} style={submitButtonStyle}>
              {loading ? 'Đang gửi...' : 'Gửi bình luận'}
            </button>
          </div>
        </form>
      </div>
    </div>
  );
};

export default CommentFormModal;

// Basic inline styles for modal (should be moved to CSS file in production)
const modalOverlayStyle = {
  position: 'fixed',
  top: 0,
  left: 0,
  right: 0,
  bottom: 0,
  backgroundColor: 'rgba(0, 0, 0, 0.5)',
  display: 'flex',
  justifyContent: 'center',
  alignItems: 'center',
  zIndex: 1000,
};

const modalContentStyle = {
  backgroundColor: 'white',
  padding: '25px',
  borderRadius: '8px',
  width: '400px',
  maxWidth: '90%',
  boxShadow: '0 4px 10px rgba(0,0,0,0.2)',
};

const labelStyle = {
  display: 'block',
  marginBottom: '5px',
  fontWeight: 'bold',
};

const inputStyle = {
  width: 'calc(100% - 16px)', // Trừ padding
  padding: '8px',
  border: '1px solid #ccc',
  borderRadius: '4px',
};

const submitButtonStyle = {
  padding: '10px 15px',
  backgroundColor: '#007bff',
  color: 'white',
  border: 'none',
  borderRadius: '4px',
  cursor: 'pointer',
};

const cancelButtonStyle = {
  padding: '10px 15px',
  backgroundColor: '#6c757d',
  color: 'white',
  border: 'none',
  borderRadius: '4px',
  cursor: 'pointer',
};