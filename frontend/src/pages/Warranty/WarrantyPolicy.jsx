import React from "react";
import styles from "./WarrantyPolicy.module.css";

const WarrantyPolicy = () => {
  return (
    <div className={styles.container}>
      <header className={styles.header}>
        <h1>Chính Sách Bảo Hành</h1>
        <p>Cam kết mang lại sự an tâm tuyệt đối cho khách hàng</p>
      </header>

      <main className={styles.main}>
        <section>
          <h2>1. Thời Gian Bảo Hành</h2>
          <p>
            Văn Đại Car cung cấp chính sách bảo hành <strong>12 – 36 tháng </strong> 
            tùy theo dòng xe và điều kiện sử dụng. Thời gian bảo hành được tính 
            kể từ ngày khách hàng nhận xe.
          </p>
        </section>

        <section style={{ marginTop: '-100px' }} >
          <h2>2. Phạm Vi Bảo Hành</h2>
          <ul>
            <li>Động cơ, hộp số và các bộ phận truyền động chính.</li>
            <li>Hệ thống điện, điều hòa và các trang thiết bị an toàn.</li>
            <li>Các lỗi kỹ thuật do nhà sản xuất.</li>
          </ul>
        </section>

        <section style={{ marginTop: '-100px' }} >
          <h2>3. Điều Kiện Bảo Hành</h2>
          <p>
            Xe cần được bảo dưỡng định kỳ tại các trung tâm dịch vụ chính hãng 
            của Văn Đại Car hoặc các đối tác ủy quyền. Việc bảo dưỡng ngoài hệ 
            thống có thể ảnh hưởng đến hiệu lực bảo hành.
          </p>
        </section>

        <section style={{ marginTop: '-100px' }} >
          <h2>4. Trường Hợp Không Được Bảo Hành</h2>
          <ul>
            <li>Hư hỏng do tai nạn, thiên tai hoặc va chạm ngoài ý muốn.</li>
            <li>Hư hỏng do sửa chữa, thay thế ngoài trung tâm ủy quyền.</li>
            <li>Xe bị thay đổi kết cấu, độ chế trái phép.</li>
            <li>Hao mòn tự nhiên của vật tư, phụ tùng (lốp, dầu nhớt, ắc quy...).</li>
          </ul>
        </section>

        <section style={{ marginTop: '-100px' }} >
          <h2>5. Quy Trình Bảo Hành</h2>
          <ol>
            <li>Khách hàng liên hệ hotline hỗ trợ: <strong>+84 965.336.741</strong>.</li>
            <li>Đưa xe đến trung tâm dịch vụ gần nhất.</li>
            <li>Kỹ thuật viên kiểm tra, xác nhận và tiến hành bảo hành.</li>
          </ol>
        </section>

        <section style={{ marginTop: '-100px' }} >
          <h2>6. Cam Kết Của Văn Đại Car</h2>
          <p>
            Chúng tôi luôn đặt <strong>uy tín và sự an tâm của khách hàng </strong> 
            lên hàng đầu. Mọi dịch vụ bảo hành được thực hiện nhanh chóng, minh bạch 
            và chuyên nghiệp, giúp khách hàng yên tâm đồng hành cùng chiếc xe của mình.
          </p>
        </section>
      </main>
    </div>
  );
};

export default WarrantyPolicy;
