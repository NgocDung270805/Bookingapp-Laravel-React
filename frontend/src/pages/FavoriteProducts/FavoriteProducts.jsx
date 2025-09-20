// src/pages/FavoriteProducts/FavoriteProducts.jsx
import React, { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { useNavigate } from 'react-router-dom';
import { Card, Empty, Spin, message } from 'antd';
import { HeartFilled, DeleteOutlined } from '@ant-design/icons';
import { formatCurrency } from '../../utils/format';
import { getFavoriteProducts, toggleFavorite } from '../../appRedux/slices/favoritesSlice';
import './FavoriteProducts.css';
import { PATHS } from '../../common/constants';
import LoadingIndicator from '../../core/components/LoadingIndicator';
import ErrorIndicator from '../../core/components/ErrorIndicator';

const FavoriteProducts = () => {
    const dispatch = useDispatch();
    const navigate = useNavigate();
    const { favoriteProducts, loading, error } = useSelector((state) => state.favorites);
    const { isAuthenticated } = useSelector((state) => state.auth);

    useEffect(() => {
        if (!isAuthenticated) {
            navigate('/login');
            return;
        }
        dispatch(getFavoriteProducts());
    }, [dispatch, isAuthenticated, navigate]);

    const handleToggleFavorite = async (productId) => {
        try {
            const result = await dispatch(toggleFavorite(productId)).unwrap();
            if (result.isFavorited) {
                message.success('Đã thêm vào danh sách yêu thích');
            } else {
                message.success('Đã xóa khỏi danh sách yêu thích');
                // Refresh danh sách sau khi xóa
                dispatch(getFavoriteProducts());
            }
        } catch (error) {
            message.error('Không thể thực hiện thao tác');
        }
    };

    const handleProductClick = (productId) => {
        navigate(`/product/${productId}`);
    };

    if (loading) {
        return <LoadingIndicator />;
    }

    if (error) {
        return <ErrorIndicator message="Đã xảy ra lỗi khi tải sản phẩm yêu thích." />;
    }

    return (
        <div className="favorite-products-container">
            <h1 className="favorite-products-title">Sản phẩm yêu thích</h1>
            {favoriteProducts && favoriteProducts.length > 0 ? (
                <div className="favorite-products-grid">
                    {favoriteProducts.map((product) => product && (
                        <Card
                            key={product.id}
                            hoverable
                            className="favorite-product-card"
                            cover={
                                <img
                                    alt="Văn Đại Car"
                                    src={`${PATHS.ADMIN_DASHBOARD}storage/${product.img}`}
                                    onClick={() => handleProductClick(product.id)}
                                />
                            }
                            actions={[
                                <HeartFilled
                                    key="favorite"
                                    style={{ color: '#ff4d4f' }}
                                />,
                                <DeleteOutlined
                                    key="delete"
                                    onClick={() => handleToggleFavorite(product.id)}
                                />
                            ]}
                        >
                            <Card.Meta
                                title={product.name}
                                description={
                                    <div>
                                        <div className="product-category">
                                            {product.category?.name}
                                        </div>
                                        <div className="product-price">
                                            {product.variants?.[0]?.pricing_type === 'public_price' ? (
                                                <div className="d-flex align-items-center gap-2 mt-2">
                                                    <p className="me-2 text-body text-decoration-line-through mb-0">
                                                        {product.variants[0].discount_price && (
                                                            new Intl.NumberFormat('vi-VN', {
                                                                style: 'currency',
                                                                currency: 'VND'
                                                            }).format(product.variants[0].price)
                                                        )}
                                                    </p><br />
                                                    <h5 className="text-body-emphasis mb-0">
                                                        {new Intl.NumberFormat('vi-VN', {
                                                            style: 'currency',
                                                            currency: 'VND'
                                                        }).format(product.variants[0].discount_price || product.variants[0].price)}
                                                    </h5>
                                                </div>
                                            ) : (
                                                <span className="badge bg-info bg-opacity-10 text-info mt-2">
                                                    Liên hệ báo giá
                                                </span>
                                            )}
                                        </div>
                                    </div>
                                }
                            />
                        </Card>
                    ))}
                </div>
            ) : (
                <Empty
                    description="Bạn chưa có sản phẩm yêu thích nào"
                    className="favorite-products-empty"
                />
            )}
        </div>
    );
};

export default FavoriteProducts;