// src/modules/Products/components/BookingFormModal.jsx

import React, { useState } from 'react';
import { useAppDispatch, useAppSelector } from '../../../appRedux';
import { createBooking } from '../slice';

const BookingFormModal = ({ productId, onClose }) => {
  const dispatch = useAppDispatch();
  const { loading, error } = useAppSelector((state) => state.products);

  const [bookingDate, setBookingDate] = useState('');
  const [bookingTime, setBookingTime] = useState('');
  const [notes, setNotes] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();
    const bookingData = {
      booking_date: bookingDate,
      booking_time: bookingTime || null, // Gửi null nếu không nhập
      notes: notes || null,
      // total_price: X, // Bạn có thể thêm trường này nếu muốn người dùng nhập hoặc tính toán
    };

    const resultAction = await dispatch(createBooking({ productId, bookingData }));

    if (createBooking.fulfilled.match(resultAction)) {
      alert('Đặt lịch thành công!'); // Giữ alert đơn giản hoặc thay bằng Toast
      onClose(); // Đóng modal sau khi gửi thành công
    } else {
      alert(`Lỗi khi đặt lịch: ${JSON.stringify(resultAction.payload)}`);
    }
  };

  return (
    <div style={modalOverlayStyle}>
      <div style={modalContentStyle}>
        <h3>Đặt lịch cho Sản phẩm #{productId}</h3>
        <form onSubmit={handleSubmit}>
          <div style={{ marginBottom: '10px' }}>
            <label htmlFor="bookingDate" style={labelStyle}>Ngày đặt lịch:</label>
            <input
              type="date"
              id="bookingDate"
              value={bookingDate}
              onChange={(e) => setBookingDate(e.target.value)}
              required
              style={inputStyle}
            />
          </div>
          <div style={{ marginBottom: '10px' }}>
            <label htmlFor="bookingTime" style={labelStyle}>Giờ đặt lịch (HH:MM):</label>
            <input
              type="time"
              id="bookingTime"
              value={bookingTime}
              onChange={(e) => setBookingTime(e.target.value)}
              style={inputStyle}
            />
          </div>
          <div style={{ marginBottom: '10px' }}>
            <label htmlFor="bookingNotes" style={labelStyle}>Ghi chú:</label>
            <textarea
              id="bookingNotes"
              value={notes}
              onChange={(e) => setNotes(e.target.value)}
              rows="3"
              style={inputStyle}
            ></textarea>
          </div>
          {error && <p style={{ color: 'red' }}>Lỗi: {error}</p>}
          <div style={{ display: 'flex', justifyContent: 'flex-end', gap: '10px' }}>
            <button type="button" onClick={onClose} style={cancelButtonStyle}>Hủy</button>
            <button type="submit" disabled={loading} style={submitButtonStyle}>
              {loading ? 'Đang gửi...' : 'Đặt lịch'}
            </button>
          </div>
        </form>
      </div>
    </div>
  );
};

export default BookingFormModal;

// Reuse the same basic inline styles for modal components
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