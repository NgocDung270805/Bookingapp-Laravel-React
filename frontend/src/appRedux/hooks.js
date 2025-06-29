// src/appRedux/hooks.js

import { useDispatch, useSelector } from 'react-redux';

// Sử dụng các hooks này trong toàn bộ ứng dụng thay vì useDispatch và useSelector trực tiếp
export const useAppDispatch = () => useDispatch();
export const useAppSelector = useSelector;