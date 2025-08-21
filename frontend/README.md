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
    │   │   │       ├── Api/
    │   │   │       │   ├── BannerController.php
    │   │   │       │   ├── CategoryController.php
    │   │   │       │   ├── ChatController.php
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
    │   │   │       │   ├── LoginController.php
    │   │   │       │   └── SocialiteController.php
    │   │   │       └── Web/
    │   │   │           ├── BannerController.php
    │   │   │           ├── ProductAttributeTypeController.php
    │   │   │           ├── ProductAttributeValueConfigController.php
    │   │   │           ├── ProductAttributeValueController.php
    │   │   │           ├── ProductController.php
    │   │   │           ├── ProductVariantController.php
    │   │   │           ├── TagController.php
    │   │   │           └── Accounts/
    │   │   │               └── AdminController.php
    │   │   ├── Models/
    │   │   │   ├── Banner.php
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
    │   │       └── AppServiceProvider.php
    │   ├── bootstrap/
    │   │   ├── app.php
    │   │   ├── providers.php
    │   │   └── cache/
    │   │       └── .gitignore
    │   ├── config/
    │   │   ├── app.php
    │   │   ├── auth.php
    │   │   ├── cache.php
    │   │   ├── database.php
    │   │   ├── filesystems.php
    │   │   ├── logging.php
    │   │   ├── mail.php
    │   │   ├── queue.php
    │   │   ├── sanctum.php
    │   │   ├── services.php
    │   │   └── session.php
    │   ├── database/
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
    │   │       │   ├── account/
    │   │       │   │   ├── admin/
    │   │       │   │   │   └── index.blade.php
    │   │       │   │   ├── manager/
    │   │       │   │   │   └── index.blade.php
    │   │       │   │   └── users/
    │   │       │   │       └── index.blade.php
    │   │       │   ├── banners/
    │   │       │   │   └── index.blade.php
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
    │   │   ├── backup.php
    │   │   ├── console.php
    │   │   └── web.php
    │   ├── storage/
    │   ├── tests/
    │   └── .github/
    └── frontend/
        ├── README.md
        ├── Dockerfile
        ├── eslint.config.js
        ├── index.html
        ├── nginx.conf
        ├── package-lock.json
        ├── package.json
        ├── vercel.json
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
                ├── About/
                │   └── containers/
                │       ├── AboutPage.jsx
                │       └── AboutUs.module.css
                └── Home/
                    └── containers/
                        ├── CategorySlider.module.css
                        ├── CustomerSlider.module.css
                        └── HomePage.jsx