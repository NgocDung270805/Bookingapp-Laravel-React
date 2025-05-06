# React + Vite

This template provides a minimal setup to get React working in Vite with HMR and some ESLint rules.

Currently, two official plugins are available:

- [@vitejs/plugin-react](https://github.com/vitejs/vite-plugin-react/blob/main/packages/plugin-react) uses [Babel](https://babeljs.io/) for Fast Refresh
- [@vitejs/plugin-react-swc](https://github.com/vitejs/vite-plugin-react/blob/main/packages/plugin-react-swc) uses [SWC](https://swc.rs/) for Fast Refresh

## Expanding the ESLint configuration

If you are developing a production application, we recommend using TypeScript with type-aware lint rules enabled. Check out the [TS template](https://github.com/vitejs/vite/tree/main/packages/create-vite/template-react-ts) for information on how to integrate TypeScript and [`typescript-eslint`](https://typescript-eslint.io) in your project.

##### Cấu trúc dự án reactjs
my-react-app/
├── index.html               # File HTML chính của ứng dụng
├── package.json             # Thông tin dự án và các dependencies
├── public/                  # Chứa các tệp công khai như hình ảnh, favicon, v.v.
│   └── favicon.ico
├── src/                     # Chứa mã nguồn ứng dụng
│   ├── assets/              # Thư mục chứa các tài nguyên tĩnh như hình ảnh, CSS, v.v.
│   │   ├── images/          # Các hình ảnh và icon
│   │   └── styles/          # Các file CSS chung hoặc SASS
│   ├── vendor/              # Các tài nguyên bên ngoài (JS, CSS của bên thứ ba)
│   │   ├── js/              # Các thư viện JS từ bên ngoài
│   │   └── css/             # Các tệp CSS từ bên ngoài
│   ├── components/          # Thư mục chứa các component React
│   │   ├── Header.jsx
│   │   ├── Footer.jsx
│   │   └── Button.jsx
│   ├── contexts/            # Các context của React (nếu sử dụng Context API)
│   ├── hooks/               # Các custom hook
│   ├── pages/               # Các trang của ứng dụng (dùng cho Routing)
│   │   ├── Home.jsx
│   │   ├── About.jsx
│   │   └── Contact.jsx
│   ├── utils/               # Các tiện ích (helper functions)
│   ├── App.jsx              # Component gốc của ứng dụng
│   ├── main.jsx             # File chính để khởi động ứng dụng React
│   └── styles/              # Các file CSS hoặc SASS cho component, module, hoặc theme
├── .gitignore               # Các tệp cần bỏ qua khi sử dụng Git
├── vite.config.js           # Cấu hình của Vite
└── node_modules/            # Thư mục chứa các package node
