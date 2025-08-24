import React from "react";
import styles from "./BookingPolicy.module.css";

const BookingPolicy = () => {
  return (
    <div className={styles.container}>
      <header className={styles.header}>
        <h1>Chính Sách Đặt Lịch</h1>
        <p>Quy định và cam kết khi khách hàng đặt lịch tại Văn Đại Car</p>
      </header>

      <main className={styles.main}>
        <section>
          <h2>1. Hình Thức Đặt Lịch</h2>
          <p>
            Khách hàng có thể đặt lịch xem xe trực tuyến qua website{" "}
            <strong>Văn Đại Car</strong>, hoặc liên hệ trực tiếp với đội ngũ tư
            vấn để được hỗ trợ.
          </p>
        </section>

        <section>
          <h2>2. Xác Nhận Đặt Lịch</h2>
          <p>
            Sau khi hoàn tất đặt lịch, hệ thống sẽ gửi thông báo xác nhận qua
            email hoặc số điện thoại mà khách hàng đã cung cấp. Vui lòng kiểm tra
            thông tin để tránh sai sót.
          </p>
        </section>

        <section>
          <h2>3. Thay Đổi / Hủy Lịch</h2>
          <ul>
            <li>
              Khách hàng có thể thay đổi hoặc hủy lịch tối thiểu{" "}
              <strong>24 giờ trước</strong> thời gian hẹn.
            </li>
            <li>
              Trường hợp thay đổi trong vòng 24 giờ, vui lòng liên hệ trực tiếp
              với nhân viên hỗ trợ để được xử lý nhanh chóng.
            </li>
          </ul>
        </section>

        <section>
          <h2>4. Trách Nhiệm Của Văn Đại Car</h2>
          <p>
            Chúng tôi cam kết đảm bảo lịch hẹn chính xác, nhân viên tư vấn và xe
            luôn sẵn sàng để phục vụ khách hàng đúng giờ và chu đáo.
          </p>
        </section>

        <section>
          <h2>5. Quyền Lợi Của Khách Hàng</h2>
          <ul>
            <li>Được lựa chọn thời gian đặt lịch linh hoạt.</li>
            <li>Được thông báo nếu có sự thay đổi từ phía showroom.</li>
            <li>Được hỗ trợ nhanh chóng nếu phát sinh vấn đề.</li>
          </ul>
        </section>

        <section>
          <h2>6. Liên Hệ</h2>
          <p>
            📧 Email: Phungdung2708@gmail.com <br />
            ☎ Hotline: +84 965.336.741
          </p>
        </section>
      </main>
    </div>
  );
};

export default BookingPolicy;
