// src/modules/Products/components/BookingFormModal.jsx

import React, { useState } from 'react';
import { useAppDispatch, useAppSelector } from '../../../appRedux';
import { createBooking } from '../slice';
import { toast } from 'react-toastify';

const BookingFormModal = ({ productId, onClose, onBooked }) => {
  const dispatch = useAppDispatch();
  const { loading, error } = useAppSelector((state) => state.products);

  const [bookingDate, setBookingDate] = useState('');
  const [bookingTime, setBookingTime] = useState('');
  const [notes, setNotes] = useState('');

  // Lấy ngày hiện tại để giới hạn không cho chọn ngày trong quá khứ
  // Chuyển đổi sang múi giờ VN (+7)
  const getVNTime = () => {
    const now = new Date();
    // Lấy offset của múi giờ hiện tại (đơn vị là phút)
    const offset = now.getTimezoneOffset();
    // Chuyển về múi giờ UTC+7
    return new Date(now.getTime() + (offset * 60 * 1000) + (7 * 60 * 60 * 1000));
  };

  const vnTime = getVNTime();
  const today = vnTime.toLocaleDateString('en-CA'); // Format YYYY-MM-DD
  const currentHour = vnTime.getHours();
  const currentMinute = vnTime.getMinutes();

  // Danh sách khung giờ làm việc buổi sáng và chiều
  const morningSlots = ['07:00', '08:00', '09:00', '10:00', '11:00', '12:00'];
  const afternoonSlots = ['13:30', '14:30', '15:30', '16:30', '17:30', '18:30', '19:30'];
  
  // Hàm lọc thời gian hợp lệ
  const filterTimeSlots = (slots) => {
    if (bookingDate !== today) return slots;
    
    return slots.filter(time => {
      const [slotHours, slotMinutes] = time.split(':').map(Number);
      
      // Nếu giờ slot lớn hơn giờ hiện tại, cho phép đặt
      if (slotHours > currentHour) return true;
      
      // Nếu cùng giờ, kiểm tra phút
      if (slotHours === currentHour) {
        // Cho phép đặt slot tiếp theo nếu thời gian hiện tại + 15 phút
        const bookingMinute = currentMinute + 15;
        return slotMinutes > bookingMinute;
      }
      
      return false;
    });
  };

  // Lọc các khung giờ hợp lệ
  const availableMorningSlots = filterTimeSlots(morningSlots);
  const availableAfternoonSlots = filterTimeSlots(afternoonSlots);
  
  // Gộp tất cả các khung giờ hợp lệ
  const availableTimeSlots = [...availableMorningSlots, ...availableAfternoonSlots];

  const handleSubmit = async (e) => {
    e.preventDefault();

    // Validate dữ liệu
    if (!bookingDate) {
      toast.error('Vui lòng chọn ngày đặt lịch!');
      return;
    }

    if (!bookingTime) {
      toast.error('Vui lòng chọn giờ đặt lịch!');
      return;
    }

    // Kiểm tra thời gian đặt lịch có hợp lệ
    if (bookingDate === today) {
      const [hours, minutes] = bookingTime.split(':').map(Number);
      if (hours < currentHour || (hours === currentHour && minutes <= currentMinute)) {
        toast.error('Vui lòng chọn thời gian sau thời điểm hiện tại!');
        return;
      }
    }

    const bookingData = {
      booking_date: bookingDate,
      booking_time: bookingTime,
      notes: notes.trim() || null,
    };

    try {
      const resultAction = await dispatch(createBooking({ productId, bookingData }));

      if (createBooking.fulfilled.match(resultAction)) {
        onBooked(resultAction.payload);
        onClose();
      } else {
        toast.error(`❌ Lỗi khi đặt lịch: ${resultAction.payload?.message || 'Đã có lỗi xảy ra'}`, {
          position: "top-right",
          autoClose: 5000,
          hideProgressBar: false,
          closeOnClick: true,
          pauseOnHover: true,
          draggable: true,
        });
      }
    } catch (error) {
      toast.error('❌ Đã có lỗi xảy ra khi xử lý yêu cầu!');
    }
  };

  return (
    <div className="modal fade show" style={{ display: 'block' }} tabIndex="-1">
      <div className="modal-dialog modal-dialog-centered">
        <div className="modal-content">
          <div className="modal-header">
            <h5 className="modal-title">Đặt lịch xem xe</h5>
            <button 
              type="button" 
              className="btn-close" 
              onClick={onClose}
              aria-label="Close"
            ></button>
          </div>
          
          <div className="modal-body">
            <form onSubmit={handleSubmit}>
              <div className="mb-3">
                <label htmlFor="bookingDate" className="form-label">
                  Ngày xem xe <span className="text-danger">*</span>
                </label>
                <input
                  type="date"
                  className="form-control"
                  id="bookingDate"
                  min={today}
                  value={bookingDate}
                  onChange={(e) => setBookingDate(e.target.value)}
                  required
                />
              </div>

              <div className="mb-3">
                <label htmlFor="bookingTime" className="form-label">
                  Thời gian <span className="text-danger">*</span>
                </label>
                <select
                  className="form-select"
                  id="bookingTime"
                  value={bookingTime}
                  onChange={(e) => setBookingTime(e.target.value)}
                  required
                >
                  <option value="">Chọn thời gian</option>
                  {availableMorningSlots.length > 0 && (
                    <optgroup label="Buổi sáng">
                      {availableMorningSlots.map((time) => (
                        <option key={time} value={time}>
                          {time}
                        </option>
                      ))}
                    </optgroup>
                  )}
                  {availableAfternoonSlots.length > 0 && (
                    <optgroup label="Buổi chiều">
                      {availableAfternoonSlots.map((time) => (
                        <option key={time} value={time}>
                          {time}
                        </option>
                      ))}
                    </optgroup>
                  )}
                </select>
                <small className="text-muted">
                  Vui lòng chọn thời gian trong giờ làm việc
                </small>
              </div>

              <div className="mb-3">
                <label htmlFor="notes" className="form-label">
                  Ghi chú
                </label>
                <textarea
                  className="form-control"
                  id="notes"
                  rows="3"
                  placeholder="Nhập yêu cầu đặc biệt nếu có..."
                  value={notes}
                  onChange={(e) => setNotes(e.target.value)}
                ></textarea>
              </div>

              {error && (
                <div className="alert alert-danger" role="alert">
                  {error}
                </div>
              )}

              <div className="modal-footer px-0 pb-0">
                <button
                  type="button"
                  className="btn btn-secondary"
                  onClick={onClose}
                >
                  Hủy
                </button>
                <button
                  type="submit"
                  className="btn btn-warning"
                  disabled={loading}
                >
                  {loading ? (
                    <>
                      <span className="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                      Đang xử lý...
                    </>
                  ) : (
                    'Đặt lịch'
                  )}
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  );
};

export default BookingFormModal;