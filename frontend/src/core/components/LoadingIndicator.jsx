// src/core/components/LoadingIndicator.jsx

import { DotLottieReact } from '@lottiefiles/dotlottie-react';
import React from 'react';

const LoadingIndicator = () => {
  return (
    <div style={{
      display: "flex",
      flexDirection: "column",
      justifyContent: "center",
      alignItems: "center",
      height: "100vh"
    }}>
      <DotLottieReact
        src="https://lottie.host/608b8683-91ff-4555-80c2-03569d2366b1/FmKyBN3nRD.lottie"
        loop
        autoplay
        style={{ width: "300px", height: "300px" }}
      />
    </div>
  );
};

export default LoadingIndicator;