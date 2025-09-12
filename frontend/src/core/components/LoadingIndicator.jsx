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
        src="https://lottie.host/3722dbdc-d3e0-407e-bf0b-5b6805db01ba/duMhR6ttZz.lottie"
        loop
        autoplay
        style={{ width: "300px", height: "300px" }}
      />
    </div>
  );
};

export default LoadingIndicator;