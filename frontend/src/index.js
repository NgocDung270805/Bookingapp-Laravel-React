// src/index.js

import React from 'react';
import { createRoot } from 'react-dom/client';
import App from './App';
// import './styles/global.css'; // Nếu bạn có file CSS toàn cục
// <!--    Favicons-->
// <!-- ===============================================-->
import './assets/img/favicons/apple-touch-icon.png';
import './assets/img/favicons/favicon-32x32.png';
import './assets/img/favicons/favicon-16x16.png';
import './assets/img/favicons/favicon.ico';
import './assets/img/favicons/manifest.json';
import './assets/img/favicons/mstile-150x150.png';
{/* <meta name="theme-color" content="#ffffff';
{/* <script src="../../vendors/simplebar/simplebar.min.js"></script> */ }
{/* <script src="../../assets/js/config.js"></script> */ }

{/* <!-- ===============================================--> */ }
{/* <!--    Stylesheets--> */ }
{/* <!-- ===============================================--> */ }
{/* <link rel="preconnect" href="https://fonts.googleapis.com"> */ }
{/* <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""> */ }
{/* <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet"> */ }
{/* <link href="../../vendors/simplebar/simplebar.min.css" rel="stylesheet"> */ }
{/* <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css"> */ }
import './assets/css/theme-rtl.min.css';
{/* <link href="../../assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default"> */ }
{/* <link href="../../assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl"> */ }
{/* <link href="../../assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default"> */ }
{/* <script>
      var phoenixIsRTL = window.config.config.phoenixIsRTL;
      if (phoenixIsRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script> */}
{/* <link href="../../vendors/swiper/swiper-bundle.min.css" rel="stylesheet"></link> */ }

const container = document.getElementById('root');
if (!container) throw new Error('Failed to find the root element');
const root = createRoot(container);

root.render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
);