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
        ├── README.md
        ├── Dockerfile
        ├── eslint.config.js
        ├── index.html
        ├── nginx.conf
        ├── package-lock.json
        ├── package.json
        ├── vite.config.js
        ├── .gitignore
        ├── public/
        └── src/
            ├── App.css
            ├── App.jsx
            ├── index.css
            ├── index.jsx
            ├── main.jsx
            ├── appRedux/
            │   ├── hooks.js
            │   ├── index.js
            │   └── store.js
            ├── common/
            │   ├── API.js
            │   └── constants.js
            ├── core/
            │   └── layouts/
            │       ├── AuthLayout/
            │       │   └── AuthLayout.jsx
            │       ├── components/
            │       │   ├── Footer.jsx
            │       │   ├── Header.jsx
            │       │   └── SupportChatWidget.jsx
            │       └── MainLayout/
            │           └── MainLayout.jsx
            ├── hoc/
            │   └── withAuth.jsx
            ├── hooks/
            │   └── useAuth.js
            ├── modules/
            │   ├── Auth/
            │   │   ├── api.js
            │   │   ├── index.js
            │   │   ├── slice.js
            │   │   └── containers/
            │   │       ├── LoginPage.jsx
            │   │       └── RegisterPage.jsx
            │   ├── Banners/
            │   │   ├── api.js
            │   │   └── slice.js
            │   ├── Categories/
            │   │   ├── api.js
            │   │   └── slice.js
            │   ├── Products/
            │   │   ├── api.js
            │   │   ├── slice.js
            │   │   ├── components/
            │   │   │   ├── BookingFormModal.jsx
            │   │   │   └── CommentFormModal.jsx
            │   │   └── containers/
            │   │       ├── ProductDetailPage.jsx
            │   │       ├── ProductsByCategoriesPage.jsx
            │   │       └── ProductsPage.jsx
            │   └── profile/
            │       ├── api.js
            │       ├── slice.js
            │       └── containers/
            │           └── ProfilePage.jsx
            └── pages/
                └── Home/
                    └── HomePage.jsx
