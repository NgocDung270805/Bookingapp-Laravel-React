import React, { useState } from "react";
import styles from "./ContactPage.module.css";

const ContactPage = () => {
  const [formData, setFormData] = useState({
    name: "",
    email: "",
    message: "",
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prev) => ({ ...prev, [name]: value }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    alert("Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất.");
    setFormData({ name: "", email: "", message: "" });
  };

  return (
    <div className={styles.container}>
      <header className={styles.header}>
        <h1>Liên Hệ</h1>
        <p>Chúng tôi luôn sẵn sàng đồng hành cùng bạn trên mọi hành trình</p>
      </header>

      <main className={styles.main}>
        {/* Thông tin liên hệ */}
        <section className={styles.info}>
          <h2>Thông Tin Liên Hệ</h2>
          <ul>
            <li><strong>Địa chỉ:</strong> 43 Vườn Cam, Phú Đô, Hà Nội, Việt Nam</li>
            <li><strong>Điện thoại:</strong> +84 965.336.741</li>
            <li><strong>Email:</strong> Phungdung2708@gmail.com</li>
            <li><strong>Giờ làm việc:</strong> 08:00 – 18:00 (Thứ 2 – Chủ nhật)</li>
          </ul>
        </section>

        {/* Form liên hệ */}
        <section className={styles.formSection}>
          <h2>Gửi Tin Nhắn Cho Chúng Tôi</h2>
          <form onSubmit={handleSubmit} className={styles.form}>
            <input
              type="text"
              name="name"
              placeholder="Họ và tên"
              value={formData.name}
              onChange={handleChange}
              required
            />
            <input
              type="email"
              name="email"
              placeholder="Email"
              value={formData.email}
              onChange={handleChange}
              required
            />
            <textarea
              name="message"
              placeholder="Nội dung"
              rows="5"
              value={formData.message}
              onChange={handleChange}
              required
            ></textarea>
            <button type="submit">Gửi Liên Hệ</button>
          </form>
        </section>

        {/* Google Maps */}
        <section className={styles.map}>
          <h2>Bản Đồ</h2>
          <iframe
            title="map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.7645610032832!2d105.73877477597709!3d21.04210448731861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab00713f6785%3A0xbaad47184212b8a9!2zVOG7qSBRdcO9IEF1dG8!5e0!3m2!1svi!2s!4v1756021429321!5m2!1svi!2s"
            width="100%"
            height="350"
            allowFullScreen=""
            loading="lazy"
          ></iframe>
        </section>
      </main>
    </div>
  );
};

export default ContactPage;
