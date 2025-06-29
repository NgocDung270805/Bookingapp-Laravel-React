// src/index.js

import React from 'react';
import { createRoot } from 'react-dom/client';
import App from './App';
// import './styles/global.css'; // Nếu bạn có file CSS toàn cục

const container = document.getElementById('root');
if (!container) throw new Error('Failed to find the root element');
const root = createRoot(container);

root.render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
);