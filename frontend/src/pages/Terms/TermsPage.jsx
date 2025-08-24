import React from "react";
import styles from "./TermsPage.module.css";

const TermsPage = () => {
  return (
    <div className={styles.container}>
      <header className={styles.header}>
        <h1>Điều Khoản & Điều Kiện</h1>
        <p>Quy định khi sử dụng dịch vụ tại Văn Đại Car</p>
      </header>

      <main className={styles.main}>
        <section>
          <h2>1. Chấp Nhận Điều Khoản</h2>
          <p>
            Khi truy cập và sử dụng dịch vụ tại <strong>Văn Đại Car</strong>, 
            bạn đồng ý tuân thủ mọi điều khoản và điều kiện được quy định 
            trong trang này. Nếu không đồng ý, vui lòng ngừng sử dụng dịch vụ.
          </p>
        </section>

        <section>
          <h2>2. Quyền & Nghĩa Vụ Của Người Dùng</h2>
          <ul>
            <li>Được quyền tham khảo thông tin, đặt lịch và trải nghiệm xe.</li>
            <li>Cung cấp thông tin cá nhân trung thực, chính xác khi đặt lịch.</li>
            <li>Tuân thủ các quy định của pháp luật và quy định của Văn Đại Car.</li>
          </ul>
        </section>

        <section>
          <h2>3. Quyền & Nghĩa Vụ Của Văn Đại Car</h2>
          <ul>
            <li>Cung cấp dịch vụ đặt lịch và hỗ trợ khách hàng một cách tốt nhất.</li>
            <li>Bảo mật thông tin cá nhân của khách hàng, trừ khi có yêu cầu pháp luật.</li>
            <li>Có quyền từ chối phục vụ trong trường hợp phát hiện gian lận hoặc vi phạm.</li>
          </ul>
        </section>

        <section>
          <h2>4. Chính Sách Thanh Toán & Hủy Lịch</h2>
          <p>
            Việc thanh toán (nếu có) sẽ được thực hiện qua các phương thức hợp lệ. 
            Khách hàng có quyền hủy lịch xem xe trước giờ hẹn 24h. Văn Đại Car 
            có quyền điều chỉnh lịch hẹn trong trường hợp bất khả kháng.
          </p>
        </section>

        <section>
          <h2>5. Giới Hạn Trách Nhiệm</h2>
          <p>
            Văn Đại Car không chịu trách nhiệm với các sự cố phát sinh ngoài 
            phạm vi dịch vụ đặt lịch, bao gồm nhưng không giới hạn ở các vấn đề 
            kỹ thuật, sự cố đường truyền hoặc các hành động trái pháp luật từ phía người dùng.
          </p>
        </section>

        <section>
          <h2>6. Sửa Đổi & Cập Nhật</h2>
          <p>
            Văn Đại Car có quyền thay đổi, chỉnh sửa điều khoản khi cần thiết. 
            Các thay đổi sẽ được công bố công khai trên website và có hiệu lực ngay sau khi đăng tải.
          </p>
        </section>

        <section>
          <h2>7. Liên Hệ</h2>
          <p>
            Nếu bạn có bất kỳ câu hỏi nào liên quan đến điều khoản, vui lòng liên hệ qua email 
            <strong> Phungdung2708@gmail.com</strong> hoặc hotline <strong>+84 965.336.741</strong>.
          </p>
        </section>
      </main>
    </div>
  );
};

export default TermsPage;
