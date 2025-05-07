import './bootstrap';
import Turbo from "@hotwired/turbo"
window.Turbo = Turbo

// ✅ Hàm xóa class layout bị sai do Turbo hoặc layout template tự thêm
function fixBodyClass() {
    const classesToRemove = [
        "sidebar-collapsed", // Hoặc class khác tùy theme bạn dùng
        "aside-collapsed",
        "layout-fixed"
    ];

    console.log("🔧 Body class before fix:", document.body.className);

    classesToRemove.forEach(cls => {
        document.body.classList.remove(cls);
    });

    console.log("✅ Body class after fix:", document.body.className);
}

// ✅ Hàm khởi tạo lại layout nếu cần
function initLayout() {
    // Nếu bạn dùng template như AdminLTE, bạn có thể cần gọi hàm re-init layout
    // Ví dụ: AdminLTE.init(); hoặc custom init lại sidebar, menu...
    console.log("✅ initLayout() called");
    // Gọi script init layout ở đây nếu có
}

// ✅ Sự kiện Turbo: xử lý sau khi DOM load xong
document.addEventListener("turbo:load", () => {
    console.log("✅ Turbo load triggered");

    // Các sự kiện có thể cần passive: true để tăng hiệu suất
    window.addEventListener('scroll', (event) => {
        // Code xử lý scroll
    }, { passive: true });

    requestAnimationFrame(() => {
        setTimeout(() => {
            console.log("✅ Delayed fixBodyClass");
            fixBodyClass();
            initLayout();
            loadScripts();
        }, 50);
    });

    setTimeout(() => {
        console.log("🚨 Body class after 500ms:", document.body.className);
    }, 1000);
});
function loadScripts() {
    // Ví dụ về việc khởi động lại AdminLTE nếu bạn đang sử dụng nó
    if (typeof AdminLTE !== 'undefined' && AdminLTE) {
        AdminLTE.init();  // Khởi tạo lại AdminLTE
    }
}
