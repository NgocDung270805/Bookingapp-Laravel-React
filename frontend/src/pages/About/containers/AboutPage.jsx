import React from "react";
import styles from "./AboutPage.module.css";

const AboutPage = () => {
  return (
    <div className={styles.container}>
      <header className={styles.header}>
        <h1>Về Văn Đại Car</h1>
        <p>
          Nơi khởi đầu cho mỗi hành trình – Sang trọng, tận tâm, đồng hành cùng bạn
        </p>
        {/* Ảnh đại diện bắt buộc */}
        <div className={styles.avatar}>
          <img
            src="https://scontent.fhan14-3.fna.fbcdn.net/v/t39.30808-1/500227458_1467197764652329_3635921440474229235_n.jpg?stp=dst-jpg_s160x160_tt6&_nc_cat=110&ccb=1-7&_nc_sid=1d2534&_nc_ohc=ftRDuEwiY4MQ7kNvwEsVibt&_nc_oc=Adn4ItdcgDgCGzVmuAAd4IiQeSxAzQlPuR_Fe3U-c9TBskrgIG5262stxz-g_6xpM3I&_nc_zt=24&_nc_ht=scontent.fhan14-3.fna&_nc_gid=kOCK2Z9_xCcaHp05ijwuGw&oh=00_Afczh_A8r2WRL8X9F_ldCxCWk5v953wdRfF2hOZN3jeV8w&oe=68F691DF"
            alt=""
          />
        </div>
      </header>

      <main className={styles.main}>
        <section>
          <h2>Tầm Nhìn & Sứ Mệnh</h2>
          <p>
            Tại <strong>Văn Đại Car</strong>, chúng tôi mong muốn trở thành nền
            tảng <em>đặt lịch xem xe uy tín số 1 Việt Nam</em>, nơi khách hàng có
            thể dễ dàng lựa chọn, trải nghiệm và sở hữu chiếc xe mơ ước.
          </p>
          <p>
            Sứ mệnh của chúng tôi là mang đến sự{" "}
            <strong>minh bạch – tiện lợi – an toàn</strong> trong quá trình mua
            xe, giúp khách hàng tự tin hơn trong mỗi quyết định quan trọng.
          </p>
        </section>

        <section style={{ marginTop: '-100px' }}>
          <h2>Giá Trị Cốt Lõi</h2>
          <ul>
            <li>
              <strong>Uy tín:</strong> Đặt lợi ích khách hàng lên hàng đầu.
            </li>
            <li>
              <strong>Minh bạch:</strong> Thông tin xe, giá cả, thủ tục đều rõ
              ràng.
            </li>
            <li>
              <strong>Đồng hành:</strong> Không chỉ là mua xe, mà là sự gắn bó
              lâu dài.
            </li>
          </ul>
        </section>

        <section style={{ marginTop: '-100px' }}>
          <h2>Đội Ngũ Nhân Sự</h2>
          <div className={styles.team}>
            <div className={styles.teamMember}>
              <img src="https://via.placeholder.com/100" alt="Nhân viên A" />
              <h3>Nguyễn Văn A</h3>
              <p>Tư vấn viên giàu kinh nghiệm</p>
            </div>
            <div className={styles.teamMember}>
              <img src="https://via.placeholder.com/100" alt="Nhân viên B" />
              <h3>Trần Thị B</h3>
              <p>Chuyên gia hỗ trợ khách hàng</p>
            </div>
            <div className={styles.teamMember}>
              <img src="https://via.placeholder.com/100" alt="Nhân viên C" />
              <h3>Lê Văn C</h3>
              <p>Kỹ thuật viên kiểm định xe</p>
            </div>
          </div>
        </section>

        <section style={{ marginTop: '-100px' }}>
          <h2>Thành Tựu & Đối Tác</h2>
          <p>
            Văn Đại Car đã vinh dự phục vụ hơn <strong>10,000 khách hàng</strong>{" "}
            trên toàn quốc, và trở thành đối tác tin cậy của nhiều hãng xe hàng
            đầu.
          </p>
          <div className={styles.partners}>
            <div className={styles.partnerLogo}>Toyota</div>
            <div className={styles.partnerLogo}>Honda</div>
            <div className={styles.partnerLogo}>Hyundai</div>
            <div className={styles.partnerLogo}>Mazda</div>
          </div>
        </section>
      </main>
    </div>
  );
};

export default AboutPage;
 