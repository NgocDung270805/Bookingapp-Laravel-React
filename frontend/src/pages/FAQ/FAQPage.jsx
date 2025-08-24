import React, { useState } from "react";
import styles from "./FAQPage.module.css";

const faqs = [
  {
    question: "Làm sao để đặt lịch xem xe trên Văn Đại Car?",
    answer:
      "Bạn chỉ cần chọn mẫu xe mong muốn, chọn thời gian phù hợp và nhấn nút 'Đặt lịch'. Hệ thống sẽ xác nhận lịch hẹn qua email hoặc số điện thoại của bạn."
  },
  {
    question: "Tôi có thể hủy hoặc thay đổi lịch hẹn không?",
    answer:
      "Có. Bạn có thể hủy hoặc thay đổi lịch hẹn tối thiểu 24 giờ trước thời gian đã chọn. Nếu cần gấp, vui lòng liên hệ trực tiếp với nhân viên hỗ trợ."
  },
  {
    question: "Dịch vụ đặt lịch có mất phí không?",
    answer:
      "Hoàn toàn miễn phí. Bạn chỉ cần đăng ký lịch hẹn, chúng tôi sẽ chuẩn bị xe sẵn sàng để bạn trải nghiệm."
  },
  {
    question: "Thông tin cá nhân của tôi có được bảo mật không?",
    answer:
      "Chắc chắn rồi. Văn Đại Car cam kết bảo mật thông tin khách hàng theo Chính Sách Bảo Mật."
  },
  {
    question: "Tôi có thể đặt lịch cho nhiều xe trong cùng một lần không?",
    answer:
      "Hoàn toàn có thể. Bạn có thể đặt lịch cho nhiều xe khác nhau và hệ thống sẽ gửi xác nhận riêng cho từng xe."
  }
];

const FAQPage = () => {
  const [activeIndex, setActiveIndex] = useState(null);

  const toggleFAQ = (index) => {
    setActiveIndex(activeIndex === index ? null : index);
  };

  return (
    <div className={styles.container}>
      <header className={styles.header}>
        <h1>Câu Hỏi Thường Gặp</h1>
        <p>Giải đáp nhanh những thắc mắc của khách hàng về Văn Đại Car</p>
      </header>

      <main className={styles.main}>
        {faqs.map((faq, index) => (
          <div
            key={index}
            className={`${styles.faqItem} ${
              activeIndex === index ? styles.active : ""
            }`}
          >
            <div
              className={styles.question}
              onClick={() => toggleFAQ(index)}
            >
              {faq.question}
              <span className={styles.icon}>
                {activeIndex === index ? "−" : "+"}
              </span>
            </div>
            {activeIndex === index && (
              <div className={styles.answer}>{faq.answer}</div>
            )}
          </div>
        ))}
      </main>
    </div>
  );
};

export default FAQPage;
