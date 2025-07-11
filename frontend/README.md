# React + Vite

This template provides a minimal setup to get React working in Vite with HMR and some ESLint rules.

Currently, two official plugins are available:

- [@vitejs/plugin-react](https://github.com/vitejs/vite-plugin-react/blob/main/packages/plugin-react) uses [Babel](https://babeljs.io/) for Fast Refresh
- [@vitejs/plugin-react-swc](https://github.com/vitejs/vite-plugin-react/blob/main/packages/plugin-react-swc) uses [SWC](https://swc.rs/) for Fast Refresh

## Expanding the ESLint configuration

If you are developing a production application, we recommend using TypeScript with type-aware lint rules enabled. Check out the [TS template](https://github.com/vitejs/vite/tree/main/packages/create-vite/template-react-ts) for information on how to integrate TypeScript and [`typescript-eslint`](https://typescript-eslint.io) in your project.

##### Cấu trúc dự án reactjs
my-react-app/
├── src/                               # Nơi chứa mã nguồn chính
│   ├── main.jsx                       # Điểm khởi động React (ReactDOM)
│   ├── App.jsx                        # Root App component chứa layout/route
│
│   ├── assets/                        # Tài nguyên tĩnh: ảnh, font, CSS
│   │   ├── images/                    # Ảnh và icon
│   │   └── styles/                    # Biến SCSS, reset.css, global.css,...
│   │       ├── _variables.scss
│   │       └── global.scss
│
│   ├── vendor/                        # Thư viện ngoài (jQuery, toastify css,...)
│   │   ├── js/
│   │   └── css/
│
│   ├── components/                    # Component tái sử dụng toàn app
│   │   ├── Header.jsx
│   │   ├── Footer.jsx
│   │   └── Button.jsx
│
│   ├── layouts/                       # Layouts chính (nhiều layout nếu cần)
│   │   └── MainLayout.jsx
│
│   ├── router/                        # Cấu hình router
│   │   └── index.jsx
│
│   ├── pages/                         # Các trang chính
│   │   ├── Home.jsx
│   │   ├── About.jsx
│   │   ├── Contact.jsx
│   │   └── NotFound.jsx
│
│   ├── features/                      # Module tách biệt: user, auth, product,...
│   │   └── users/
│   │       ├── pages/                 # Trang liên quan đến user (UserList, UserForm)
│   │       ├── components/           # Component phụ chỉ cho user
│   │       ├── userApi.js            # Gọi API (axios)
│   │       ├── userSlice.js          # Redux slice hoặc Zustand store
│   │       └── validation.js         # Yup schema / rule validate riêng
│
│   ├── services/                      # Gọi API tập trung (axios client, interceptors)
│   │   └── axiosClient.js
│
│   ├── hooks/                         # Custom hooks dùng lại (useDebounce, useAuth,...)
│   │   └── useUserForm.js
│
│   ├── utils/                         # Hàm tiện ích (formatDate, validateEmail,...)
│   │   └── helpers.js
│
│   ├── contexts/                      # Context API (Theme, Auth, Language,...)
│   │   └── AuthContext.jsx
│
│   └── store/                         # Redux hoặc Zustand (global state)
│       ├── index.js                   # Cấu hình store
│       └── rootReducer.js            # Kết hợp reducer nếu dùng Redux
├── index.html                         # File HTML chính của app
├── package.json                       # Thông tin project + dependencies
├── vite.config.js                     # Cấu hình cho Vite
├── .gitignore                         # Bỏ qua thư mục/tập tin khi dùng Git
├── public/                            # Chứa favicon, robots.txt, ảnh công khai
│   └── favicon.ico
│
<!--  -->
Directory structure:
└── ngocdung270805-bookingapp-laravel-react/
    ├── docker-compose.yml
    ├── backend/
    │   ├── README.md
    │   ├── artisan
    │   ├── CHANGELOG.md
    │   ├── composer.json
    │   ├── composer.lock
    │   ├── Dockerfile
    │   ├── package.json
    │   ├── phpunit.xml
    │   ├── vite.config.js
    │   ├── .editorconfig
    │   ├── .env.example
    │   ├── .gitattributes
    │   ├── .gitignore
    │   ├── .styleci.yml
    │   ├── app/
    │   │   ├── Http/
    │   │   │   └── Controllers/
    │   │   │       ├── CategoriesController.php
    │   │   │       ├── Controller.php
    │   │   │       ├── HomeController.php
    │   │   │       ├── ProductsController.php
    │   │   │       ├── UserDetailsController.php
    │   │   │       ├── UsersProfilesController.php
    │   │   │       ├── Api/
    │   │   │       │   ├── ProductController.php
    │   │   │       │   ├── Auth/
    │   │   │       │   │   ├── LoginController.php
    │   │   │       │   │   ├── LogoutController.php
    │   │   │       │   │   ├── ProfileController.php
    │   │   │       │   │   └── RegisterController.php
    │   │   │       │   └── ProductActions/
    │   │   │       │       ├── BookingController.php
    │   │   │       │       ├── CommentController.php
    │   │   │       │       └── FavoriteController.php
    │   │   │       ├── Auth/
    │   │   │       │   └── LoginController.php
    │   │   │       └── Web/
    │   │   │           ├── ProductAttributeTypeController.php
    │   │   │           ├── ProductAttributeValueConfigController.php
    │   │   │           ├── ProductAttributeValueController.php
    │   │   │           ├── ProductController.php
    │   │   │           ├── ProductVariantController.php
    │   │   │           └── TagController.php
    │   │   ├── Models/
    │   │   │   ├── Booking.php
    │   │   │   ├── Category.php
    │   │   │   ├── Comment.php
    │   │   │   ├── Product.php
    │   │   │   ├── ProductAttributeType.php
    │   │   │   ├── ProductAttributeValue.php
    │   │   │   ├── ProductAttributeValueConfig.php
    │   │   │   ├── ProductFavorite.php
    │   │   │   ├── ProductImage.php
    │   │   │   ├── ProductVariant.php
    │   │   │   ├── Tag.php
    │   │   │   ├── User.php
    │   │   │   ├── User_details.php
    │   │   │   └── Users_profiles.php
    │   │   └── Providers/
    │   ├── bootstrap/
    │   ├── config/
    │   ├── database/
    │   │   ├── factories/
    │   │   │   ├── CategoriesFactory.php
    │   │   │   ├── ProductsFactory.php
    │   │   │   ├── UserDetailsFactory.php
    │   │   │   ├── UserFactory.php
    │   │   │   └── UsersProfilesFactory.php
    │   │   ├── migrations/
    │   │   │   ├── 0001_01_01_000000_create_users_table.php
    │   │   │   ├── 0001_01_01_000001_create_cache_table.php
    │   │   │   ├── 0001_01_01_000002_create_jobs_table.php
    │   │   │   ├── 2025_05_15_155515_create_permission_tables.php
    │   │   │   ├── 2025_05_23_072204_create_users_profiles_table.php
    │   │   │   ├── 2025_05_23_073645_create_user_details_table.php
    │   │   │   ├── 2025_05_23_160448_create_categories_table.php
    │   │   │   ├── 2025_05_23_161217_create_products_table.php
    │   │   │   ├── 2025_06_18_070550_create_tags_table.php
    │   │   │   ├── 2025_06_18_070640_create_category_tag_table.php
    │   │   │   ├── 2025_06_18_095645_create_product_tag_table.php
    │   │   │   ├── 2025_06_19_064231_create_product_variants_table.php
    │   │   │   ├── 2025_06_19_064739_create_product_images_table.php
    │   │   │   ├── 2025_06_19_071932_create_product_category_table.php
    │   │   │   ├── 2025_06_19_154535_create_product_attribute_types_table.php
    │   │   │   ├── 2025_06_19_154548_create_product_attribute_values_table.php
    │   │   │   ├── 2025_06_19_154559_create_product_variant_attribute_value_table.php
    │   │   │   ├── 2025_06_24_080241_create_product_attribute_value_configs_table.php
    │   │   │   ├── 2025_06_29_072232_create_personal_access_tokens_table.php
    │   │   │   ├── 2025_06_30_073330_create_product_favorites_table.php
    │   │   │   ├── 2025_06_30_073347_create_bookings_table.php
    │   │   │   └── 2025_06_30_073354_create_comments_table.php
    │   │   └── seeders/
    │   │       ├── CategoriesSeeder.php
    │   │       ├── DatabaseSeeder.php
    │   │       ├── ProductsSeeder.php
    │   │       ├── UserDetailsSeeder.php
    │   │       └── UsersProfilesSeeder.php
    │   ├── public/
    │   ├── resources/
    │   │   ├── css/
    │   │   │   └── app.css
    │   │   ├── js/
    │   │   │   ├── app.js
    │   │   │   └── bootstrap.js
    │   │   └── views/
    │   │       ├── index.blade.php
    │   │       ├── welcome.blade.php
    │   │       ├── apps/
    │   │       │   ├── category/
    │   │       │   │   └── index.blade.php
    │   │       │   ├── product/
    │   │       │   │   └── index.blade.php
    │   │       │   └── tag/
    │   │       │       └── index.blade.php
    │   │       ├── layouts/
    │   │       │   └── app.blade.php
    │   │       ├── pages/
    │   │       │   └── authentication/
    │   │       │       └── card/
    │   │       │           └── sign-in.blade.php
    │   │       └── partials/
    │   │           ├── footer.blade.php
    │   │           ├── header.blade.php
    │   │           └── sidebar.blade.php
    │   ├── routes/
    │   │   ├── api.php
    │   │   ├── console.php
    │   │   └── web.php
    │   ├── storage/
    │   └── .github/
    └── frontend/
        ├── README.md                 # File README của dự án frontend (hướng dẫn cài đặt, chạy, deploy)
        ├── Dockerfile                # Cấu hình Docker cho ứng dụng frontend
        ├── eslint.config.js          # Cấu hình ESLint để kiểm tra và định dạng code
        ├── index.html                # File HTML gốc duy nhất mà ứng dụng React sẽ được gắn (mount) vào.
                                      # Chứa các thẻ <link> và <script> cho tài nguyên global/CDN/legacy JS/CSS.
        ├── nginx.conf                # Cấu hình Nginx (thường dùng trong môi trường production/Docker) để phục vụ React app
        ├── package-lock.json         # Ghi lại phiên bản chính xác của các dependencies đã cài đặt
        ├── package.json              # Chứa thông tin dự án, scripts, và danh sách các dependencies
        ├── vite.config.js            # Cấu hình Vite (công cụ build) cho dự án React
        ├── .gitignore                # Danh sách các file/thư mục bị bỏ qua bởi Git (ví dụ: node_modules, build output)
        
        ├── public/                   # Thư mục chứa các tài nguyên tĩnh được phục vụ trực tiếp (không qua xử lý của bundler)
        │   ├── assets/               # Các tài nguyên tĩnh nội bộ (ảnh, font) được nhúng trực tiếp trong index.html
        │   │   ├── img/              # Hình ảnh (gallery, background, icons)
        │   │   └── js/               # Các file JS nội bộ template không phải ES Module (ví dụ: config.js, phoenix.js)
        │   └── vendors/              # Các thư viện bên thứ ba (vendor) không phải ES Module
        │       ├── simplebar/        # Ví dụ: Thư viện cuộn tùy chỉnh
        │       ├── bootstrap/        # Ví dụ: CSS/JS của Bootstrap
        │       ├── fontawesome/      # Ví dụ: CSS/JS của Font Awesome
        │       ├── swiper/           # Ví dụ: CSS/JS của Swiper
        │       └── ...               # Các thư viện vendor khác
        
        └── src/                      # Toàn bộ mã nguồn chính của ứng dụng React
            ├── App.css               # File CSS toàn cục cho App (nếu có)
            ├── App.jsx               # Component gốc của ứng dụng, nơi cấu hình React Router và Provider của Redux
            ├── index.css             # File CSS chính để import các style toàn cục hoặc reset CSS
            ├── index.jsx             # Điểm khởi tạo ứng dụng React (React DOM mount), nơi import CSS toàn cục từ assets
            ├── main.jsx              # (Có thể trùng lặp với index.jsx nếu dùng Vite mặc định) Điểm khởi tạo chính của Vite
                                    # Nếu index.jsx là file chính, main.jsx có thể được bỏ qua hoặc là alias
            
            ├── appRedux/             # Cấu hình Redux Toolkit và các custom hooks cho Redux
            │   ├── hooks.js          # Custom hooks (useAppDispatch, useAppSelector) để tương tác với Redux store
            │   ├── index.js          # File tổng hợp export hooks và store
            │   └── store.js          # Nơi cấu hình Redux store và kết hợp các reducers
            
            ├── common/               # Các hàm tiện ích, hằng số, và cấu hình dùng chung toàn ứng dụng
            │   ├── API.js            # Cấu hình Axios instance, interceptors (thêm token, xử lý lỗi 401)
            │   └── constants.js      # Các hằng số (API base URL, keys local storage, PATHS frontend, enum)
            
            ├── core/                 # Chứa các thành phần cốt lõi, nền tảng của ứng dụng
            │   └── layouts/          # Các component bố cục tổng thể cho các nhóm trang
            │       ├── AuthLayout/   # Bố cục cho các trang xác thực (Login, Register)
            │       │   └── AuthLayout.jsx
            │       ├── components/   # Các component UI nhỏ dùng chung trong các layouts
            │       │   ├── Footer.jsx
            │       │   └── Header.jsx
            │       └── MainLayout/   # Bố cục chính cho các trang nội dung (có Header, Sidebar, Footer)
            │           └── MainLayout.jsx
            
            ├── hoc/                  # Higher-Order Components (HOCs) cho các logic xuyên suốt (cross-cutting concerns)
            │   └── withAuth.jsx      # HOC để bảo vệ các route/component cần xác thực (kiểm tra token)
            
            ├── hooks/                # Các custom React Hooks để tái sử dụng logic có stateful
            │   └── useAuth.js        # Hook để quản lý trạng thái xác thực và hàm logout
            
            ├── modules/              # Các module/tính năng độc lập của ứng dụng (được phân chia theo tính năng)
            │   ├── Auth/             # Module cho các chức năng xác thực
            │   │   ├── api.js        # Các hàm gọi API liên quan đến xác thực (login, register, logout)
            │   │   ├── index.js      # File tổng hợp export api và slice của Auth
            │   │   ├── slice.js      # Redux slice quản lý trạng thái xác thực (token, user info)
            │   │   └── containers/   # Smart components (pages) của module Auth
            │   │       ├── LoginPage.jsx
            │   │       └── RegisterPage.jsx
            │   |
            │   ├── Products/         # Module cho các chức năng quản lý sản phẩm
            │   │   ├── api.js        # Các hàm gọi API liên quan đến sản phẩm (CRUD, yêu thích, đặt lịch, bình luận)
            │   │   ├── slice.js      # Redux slice quản lý trạng thái sản phẩm (danh sách, sản phẩm chọn)
            │   │   ├── components/   # Các component UI nhỏ dùng trong module Products
            │   │   │   ├── BookingFormModal.jsx
            │   │   │   └── CommentFormModal.jsx
            │   │   └── containers/   # Smart components (pages) của module Products
            │   │       └── ProductsPage.jsx
            │   |
            │   └── profile/          # Module cho chức năng quản lý hồ sơ người dùng
            │       ├── api.js        # Các hàm gọi API liên quan đến hồ sơ (fetch, update profile)
            │       ├── slice.js      # Redux slice quản lý trạng thái hồ sơ người dùng
            │       └── containers/   # Smart components (pages) của module Profile
            │           └── ProfilePage.jsx
            |
            └── pages/                # Các trang chính của ứng dụng (thường là các "views" lớn)
                                    # Có thể được chia nhỏ thành các component con nếu trang quá lớn
                ├── Home/             # Trang chủ
                │   └── HomePage.jsx  # Chứa các phần lớn của trang chủ (ví dụ: Gallery Isotope, Swiper Slider)
                └── Products/         # (Có vẻ như đây là một thư mục không dùng đến nếu ProductsPage nằm trong modules/Products)
                    └── ProductsPage.jsx # (Có thể bị trùng với modules/Products/containers/ProductsPage.jsx)
                                        # Nếu ProductsPage là container chính, thư mục này có thể xóa.