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
