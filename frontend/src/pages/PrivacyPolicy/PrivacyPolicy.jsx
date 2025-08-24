import React from "react";
import styles from "./PrivacyPolicy.module.css";

const PrivacyPolicy = () => {
  return (
    <div className={styles.container}>
      <header className={styles.header}>
        <h1>Chính Sách Bảo Mật</h1>
        <p>Cam kết bảo mật thông tin của khách hàng tại Văn Đại Car</p>
      </header>

      <main className={styles.main}>
        <section>
          <h2>1. Mục Đích Thu Thập Thông Tin</h2>
          <p>
            Văn Đại Car chỉ thu thập thông tin cá nhân cần thiết để phục vụ cho việc
            đặt lịch, tư vấn, và hỗ trợ khách hàng. Mọi dữ liệu được sử dụng nhằm
            nâng cao trải nghiệm và chất lượng dịch vụ.
          </p>
        </section>

        <section>
          <h2>2. Phạm Vi Sử Dụng Thông Tin</h2>
          <p>
            Thông tin khách hàng được sử dụng cho các mục đích sau:
          </p>
          <ul>
            <li>Xác nhận và xử lý yêu cầu đặt lịch xem xe.</li>
            <li>Liên hệ tư vấn, chăm sóc khách hàng.</li>
            <li>Cung cấp ưu đãi, khuyến mãi phù hợp.</li>
          </ul>
        </section>

        <section>
          <h2>3. Bảo Mật Thông Tin</h2>
          <p>
            Chúng tôi cam kết bảo mật thông tin khách hàng bằng các biện pháp an
            toàn, không chia sẻ cho bên thứ ba khi chưa có sự đồng ý từ khách hàng,
            trừ khi pháp luật yêu cầu.
          </p>
        </section>

        <section>
          <h2>4. Quyền Lợi Của Khách Hàng</h2>
          <p>
            Khách hàng có quyền:
          </p>
          <ul>
            <li>Yêu cầu xem, chỉnh sửa thông tin cá nhân đã cung cấp.</li>
            <li>Yêu cầu xóa thông tin khỏi hệ thống của chúng tôi.</li>
            <li>Được giải đáp thắc mắc liên quan đến việc sử dụng dữ liệu.</li>
          </ul>
        </section>

        <section>
          <h2>5. Liên Hệ</h2>
          <p>
            Nếu bạn có bất kỳ câu hỏi hoặc thắc mắc nào về chính sách bảo mật, vui
            lòng liên hệ:
          </p>
          <p>
            📧 Email: Phungdung2708@gmail.com <br />
            ☎ Hotline: +84 965.336.741
          </p>
        </section>
      </main>
    </div>
  );
};

export default PrivacyPolicy;
