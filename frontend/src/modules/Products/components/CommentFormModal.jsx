// src/modules/Products/components/CommentFormModal.jsx

import React, { useState } from 'react';
import { useAppDispatch, useAppSelector } from '../../../appRedux';
import { addComment } from '../slice';
import { toast } from 'react-toastify';

const CommentFormModal = ({ productId, onClose }) => {
  const dispatch = useAppDispatch();
  const { loading, error } = useAppSelector((state) => state.products);

  const [content, setContent] = useState('');
  const [rating, setRating] = useState(5); // Mặc định 5 sao
  const [hoveredRating, setHoveredRating] = useState(0);

  const handleSubmit = async (e) => {
    e.preventDefault();
    const commentData = {
      content: content,
      rating: rating,
    };

    try {
      await dispatch(addComment({ productId, commentData })).unwrap();
      onClose(); // Đóng modal sau khi thành công
    } catch (error) {
      toast.error(`Lỗi khi gửi bình luận: ${error.message}`);
    }
  };

  const handleStarHover = (star) => {
    setHoveredRating(star);
  };

  const handleStarLeave = () => {
    setHoveredRating(0);
  };

  return (
    <div style={modalOverlayStyle}>
      <div style={modalContentStyle}>
        <div style={modalHeaderStyle}>
          <h3 style={titleStyle}>Viết bình luận</h3>
          <button onClick={onClose} style={closeButtonStyle}>×</button>
        </div>

        <form onSubmit={handleSubmit}>
          {/* <div style={formGroupStyle}>
            <label htmlFor="rating" style={labelStyle}>Đánh giá của bạn:</label>
            <div style={ratingContainerStyle}>
              {[1, 2, 3, 4, 5].map((star) => (
                <span
                  key={star}
                  onClick={() => setRating(star)}
                  onMouseEnter={() => handleStarHover(star)}
                  onMouseLeave={handleStarLeave}
                  style={starStyle}
                >
                  <i
                    className={`fa${(hoveredRating || rating) >= star ? 's' : 'r'} fa-star`}
                    style={{
                      color: (hoveredRating || rating) >= star ? '#ffc107' : '#ccc',
                      cursor: 'pointer',
                      fontSize: '24px'
                    }}
                  ></i>
                </span>
              ))}
            </div>
          </div> */}

          <div style={formGroupStyle}>
            <label htmlFor="commentContent" style={labelStyle}>Nội dung bình luận:</label>
            <textarea
              id="commentContent"
              value={content}
              onChange={(e) => setContent(e.target.value)}
              required
              placeholder="Vui lòng viết bình luận của bạn..."
              rows="4"
              style={textareaStyle}
            ></textarea>
          </div>

          {error && <p style={errorStyle}>Lỗi: {error}</p>}

          <div style={buttonContainerStyle}>
            <button type="button" onClick={onClose} style={cancelButtonStyle}>
              Hủy
            </button>
            <button
              type="submit"
              disabled={loading}
              style={{
                ...submitButtonStyle,
                opacity: loading ? 0.7 : 1,
                cursor: loading ? 'not-allowed' : 'pointer'
              }}
            >
              {loading ? 'Đang gửi...' : 'Gửi bình luận'}
            </button>
          </div>
        </form>
      </div>
    </div>
  );
};

// Styles
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
  borderRadius: '12px',
  width: '500px',
  maxWidth: '95%',
  boxShadow: '0 5px 15px rgba(0,0,0,0.2)',
  overflow: 'hidden',
};

const modalHeaderStyle = {
  padding: '20px 25px',
  borderBottom: '1px solid #eee',
  display: 'flex',
  justifyContent: 'space-between',
  alignItems: 'center',
  backgroundColor: '#f8f9fa',
};

const titleStyle = {
  margin: 0,
  fontSize: '1.25rem',
  color: '#333',
  fontWeight: '600',
};

const closeButtonStyle = {
  background: 'none',
  border: 'none',
  fontSize: '24px',
  color: '#666',
  cursor: 'pointer',
  padding: '0 5px',
};

const formGroupStyle = {
  padding: '15px 25px',
};

const labelStyle = {
  display: 'block',
  marginBottom: '8px',
  color: '#555',
  fontWeight: '500',
  fontSize: '0.95rem',
};

const ratingContainerStyle = {
  display: 'flex',
  gap: '8px',
  marginBottom: '10px',
};

const starStyle = {
  display: 'inline-flex',
  alignItems: 'center',
  transition: 'transform 0.2s',
  ':hover': {
    transform: 'scale(1.2)',
  },
};

const textareaStyle = {
  width: '100%',
  padding: '12px',
  border: '1px solid #ddd',
  borderRadius: '8px',
  resize: 'vertical',
  minHeight: '120px',
  fontSize: '0.95rem',
  lineHeight: '1.5',
  transition: 'border-color 0.3s',
  ':focus': {
    borderColor: '#007bff',
    outline: 'none',
  },
};

const buttonContainerStyle = {
  padding: '15px 25px',
  borderTop: '1px solid #eee',
  display: 'flex',
  justifyContent: 'flex-end',
  gap: '12px',
  backgroundColor: '#f8f9fa',
};

const buttonBaseStyle = {
  padding: '10px 20px',
  border: 'none',
  borderRadius: '6px',
  fontSize: '0.95rem',
  fontWeight: '500',
  cursor: 'pointer',
  transition: 'all 0.2s',
};

const cancelButtonStyle = {
  ...buttonBaseStyle,
  backgroundColor: '#e9ecef',
  color: '#495057',
  ':hover': {
    backgroundColor: '#dee2e6',
  },
};

const submitButtonStyle = {
  ...buttonBaseStyle,
  backgroundColor: '#ffc107',
  color: '#000',
  ':hover': {
    backgroundColor: '#ffca2c',
  },
};

const errorStyle = {
  color: '#dc3545',
  padding: '0 25px',
  margin: '10px 0',
  fontSize: '0.9rem',
};

export default CommentFormModal;