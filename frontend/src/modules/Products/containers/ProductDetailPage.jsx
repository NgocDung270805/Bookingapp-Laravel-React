import React, { useEffect, useState, useRef } from 'react';
import { useMediaQuery } from 'react-responsive';
import { useDispatch, useSelector } from 'react-redux';
import { Link, useParams } from 'react-router-dom';
import { fetchProductBySlug, toggleFavorite, selectProductsLoading, selectProductsError, clearSelectedProduct } from '../slice';
import { PATHS, BASE_URL_ADMIN } from '../../../common/constants';
import BookingFormModal from '../components/BookingFormModal';
import CommentFormModal from '../components/CommentFormModal';
import LoadingIndicator from '../../../core/components/LoadingIndicator';
import ErrorIndicator from '../../../core/components/ErrorIndicator';

import { Swiper, SwiperSlide } from "swiper/react";
import { Thumbs, Controller, A11y } from "swiper/modules";
import "swiper/css";
import "swiper/css/thumbs";

const ProductDetailPage = () => {
    const dispatch = useDispatch();
    const isDesktop = useMediaQuery({ minWidth: 1024 });
    const isMobile = useMediaQuery({ maxWidth: 767 });
    const { productSlug } = useParams();

    const selectedProduct = useSelector((state) => state.products.selectedProduct);
    const loading = useSelector(selectProductsLoading);
    const error = useSelector(selectProductsError);

    const [showBookingModal, setShowBookingModal] = useState(false);
    const [showCommentModal, setShowCommentModal] = useState(false);

    // ===============================================
    // States cho Swiper và variant management
    // ===============================================
    const [thumbsSwiper, setThumbsSwiper] = useState(null);
    const [mainSwiper, setMainSwiper] = useState(null);
    const [images, setImages] = useState([]);
    const [activeVariant, setActiveVariant] = useState(null);
    const [selectedAttributes, setSelectedAttributes] = useState({});
    const [currentVariant, setCurrentVariant] = useState(null);
    const [currentPrice, setCurrentPrice] = useState(0);
    const [currentDiscountPrice, setCurrentDiscountPrice] = useState(0);
    const [quantity, setQuantity] = useState(1);

    // ===============================================
    // useEffect để fetch dữ liệu khi productSlug thay đổi
    // ===============================================
    useEffect(() => {
        if (productSlug) {
            dispatch(fetchProductBySlug(productSlug));
            document.title = `${productSlug.replace(/-/g, ' ').toUpperCase()}`;
        }
        return () => {
            dispatch(clearSelectedProduct());
        };
    }, [dispatch, productSlug]);

    // ===============================================
    // useEffect để xử lý dữ liệu khi product được load
    // ===============================================
    useEffect(() => {
        if (selectedProduct) {
            // Set variant mặc định (variant đầu tiên)
            if (selectedProduct.variants && selectedProduct.variants.length > 0) {
                const defaultVariant = selectedProduct.variants[0];
                setCurrentVariant(defaultVariant);
                setCurrentPrice(parseFloat(defaultVariant.price));
                setCurrentDiscountPrice(parseFloat(defaultVariant.discount_price || 0));

                // Set selected attributes từ variant mặc định
                const defaultAttributes = {};
                defaultVariant.attribute_values.forEach(attr => {
                    defaultAttributes[attr.attribute_type.slug] = {
                        id: attr.id,
                        value: attr.value,
                        type: attr.attribute_type
                    };
                });
                setSelectedAttributes(defaultAttributes);
            }

            // Set ảnh mặc định từ variant hoặc product
            if (selectedProduct.images && selectedProduct.images.length > 0) {
                const productImages = selectedProduct.images.map(img =>
                    `${BASE_URL_ADMIN}storage/${img.image_path}`
                );
                setImages(productImages);
            } else if (selectedProduct.img) {
                setImages([`${BASE_URL_ADMIN}storage/${selectedProduct.img}`]);
            }
        }
    }, [selectedProduct]);

    // ===============================================
    // Xử lý khi chọn attribute value
    // ===============================================
    const handleAttributeChange = (attributeType, attributeValue) => {
        const newSelectedAttributes = {
            ...selectedAttributes,
            [attributeType.slug]: {
                id: attributeValue.id,
                value: attributeValue.value,
                type: attributeType
            }
        };
        setSelectedAttributes(newSelectedAttributes);

        // Tìm variant phù hợp với các attributes đã chọn
        const matchingVariant = findMatchingVariant(newSelectedAttributes);
        if (matchingVariant) {
            setCurrentVariant(matchingVariant);
            setCurrentPrice(parseFloat(matchingVariant.price));
            setCurrentDiscountPrice(parseFloat(matchingVariant.discount_price || 0));

            // Cập nhật ảnh nếu variant có ảnh riêng
            if (matchingVariant.img) {
                setImages([`${BASE_URL_ADMIN}storage/${matchingVariant.img}`]);
            }
        }

        // Cập nhật ảnh từ attribute config nếu có
        const attributeConfig = selectedProduct.attribute_value_configs.find(
            config => config.product_attribute_value_id === attributeValue.id
        );
        if (attributeConfig && attributeConfig.img_path) {
            setImages([`${BASE_URL_ADMIN}storage/${attributeConfig.img_path}`]);
        }
    };

    // ===============================================
    // Tìm variant phù hợp với attributes đã chọn
    // ===============================================
    const findMatchingVariant = (attributes) => {
        return selectedProduct.variants.find(variant => {
            return variant.attribute_values.every(variantAttr => {
                const selectedAttr = attributes[variantAttr.attribute_type.slug];
                return selectedAttr && selectedAttr.id === variantAttr.id;
            });
        });
    };

    // ===============================================
    // Render attribute controls
    // ===============================================
    const renderAttributeControls = () => {
        if (!selectedProduct.variants || selectedProduct.variants.length === 0) return null;

        // Lấy tất cả attribute types từ variants
        const attributeTypes = {};
        selectedProduct.variants.forEach(variant => {
            variant.attribute_values.forEach(attr => {
                if (!attributeTypes[attr.attribute_type.slug]) {
                    attributeTypes[attr.attribute_type.slug] = {
                        type: attr.attribute_type,
                        values: new Set()
                    };
                }
                attributeTypes[attr.attribute_type.slug].values.add(JSON.stringify({
                    id: attr.id,
                    value: attr.value,
                    metadata: attr.metadata
                }));
            });
        });

        // Hiển thị các nhóm thuộc tính thành hàng ngang
        return (
            <div className="d-flex flex-row flex-wrap gap-3 mb-3">
                {Object.entries(attributeTypes).map(([slug, data]) => {
                    const { type, values } = data;
                    const valueArray = Array.from(values).map(v => JSON.parse(v));

                    return (
                        <div key={slug}>
                            <p className="fw-semibold mb-2 text-body">
                                {type.name}: {selectedAttributes[slug] && (
                                    <span className="text-body-emphasis">{selectedAttributes[slug].value}</span>
                                )}
                            </p>

                            {(type.display_type === 'color_picker' ||
                              type.display_type === 'dropdown' ||
                              type.display_type === 'radio' ||
                              type.display_type === 'text') && (
                                <div className="d-flex flex-row flex-wrap product-color-variants">
                                    {valueArray.map(attr => {
                                        // Chỉ biến thể được chọn mới active
                                        const isActive = selectedAttributes[slug]?.id === attr.id;
                                        const config = selectedProduct.attribute_value_configs.find(
                                            c => c.product_attribute_value_id === attr.id
                                        );

                                        return (
                                            <div
                                                key={attr.id}
                                                className={`rounded-1 border border-translucent me-2 ${isActive ? "active border-primary" : ""}`}
                                                onClick={() => handleAttributeChange(type, attr)}
                                                style={{
                                                    cursor: "pointer",
                                                    backgroundColor: attr.metadata?.hex_code || '#ccc'
                                                }}
                                            >
                                                {config?.img_path ? (
                                                    <img
                                                        src={`${BASE_URL_ADMIN}storage/${config.img_path}`}
                                                        alt={attr.value}
                                                        width="38"
                                                        height="38"
                                                        className="rounded"
                                                    />
                                                ) : (
                                                    <div
                                                        style={{
                                                            width: '38px',
                                                            height: '38px',
                                                            backgroundColor: attr.metadata?.hex_code || '#ccc',
                                                            borderRadius: '4px'
                                                        }}
                                                    ></div>
                                                )}
                                            </div>
                                        );
                                    })}
                                </div>
                            )}
                        </div>
                    );
                })}
            </div>
        );
    };

    // ===============================================
    // Xử lý quantity
    // ===============================================
    const handleQuantityChange = (type) => {
        if (type === 'plus') {
            setQuantity(prev => prev + 1);
        } else if (type === 'minus' && quantity > 1) {
            setQuantity(prev => prev - 1);
        }
    };

    const handleToggleFavorite = async (productId) => {
        const resultAction = await dispatch(toggleFavorite(productId));
        if (toggleFavorite.fulfilled.match(resultAction)) {
            alert(resultAction.payload.message);
        } else {
            alert(`Lỗi yêu thích: ${JSON.stringify(resultAction.payload)}`);
        }
    };

    if (loading) {
        return <LoadingIndicator />;
    }

    if (error) {
        return <ErrorIndicator />;
    }

    if (!selectedProduct) {
        return (
            <div className="container mt-5 text-center">
                <div className="alert alert-warning">Không tìm thấy sản phẩm này.</div>
                <p className="text-secondary">Có thể sản phẩm không tồn tại hoặc đã bị xóa.</p>
            </div>
        );
    }

    const product = selectedProduct;
    const discountPercent = currentDiscountPrice > 0 ? Math.round((currentDiscountPrice / currentPrice) * 100) : 0;

    return (
        <>
            <div className="pt-5 pb-9">
                <section className="py-0">
                    <div className="container-small">
                        <nav className="mb-3" aria-label="breadcrumb">
                            <ol className="breadcrumb mb-0">
                                <li className="breadcrumb-item"><Link to={PATHS.HOME}>Home</Link></li>
                                <li className="breadcrumb-item">
                                    {product.categories?.map((cat, index) => (
                                        <span key={cat.id}>
                                            <Link to={`${PATHS.PRODUCTS_BY_CATEGORY_SLUG}${cat.slug}`}>
                                                {cat.name}
                                            </Link>
                                            {index < product.categories.length - 1 && " › "}
                                        </span>
                                    ))}
                                </li>
                                <li className="breadcrumb-item active" aria-current="page">{product.name}</li>
                            </ol>
                        </nav>

                        <div className="row g-5 mb-5 mb-lg-8" data-product-details="data-product-details">
                            <div className="col-12 col-lg-6">
                                <div className="row g-3 mb-3">
                                    <div className="col-12 col-md-2 col-lg-12 col-xl-2">
                                        <Swiper
                                            className="swiper-products-thumb"
                                            onSwiper={setThumbsSwiper}
                                            direction={isMobile ? "horizontal" : "vertical"}
                                            slidesPerView={3}
                                            spaceBetween={16}
                                            watchSlidesProgress
                                            modules={[Thumbs]}
                                            style={isDesktop ? { height: "300px" } : {}}
                                        >
                                            {images.map((src, i) => (
                                                <SwiperSlide key={`thumb-${i}`}>
                                                    <div className="product-thumb-container p-2 p-sm-3 p-xl-2">
                                                        <img src={src} alt={`thumb-${i}`} className="img-fluid" />
                                                    </div>
                                                </SwiperSlide>
                                            ))}
                                        </Swiper>
                                    </div>
                                    <div className="col-12 col-md-10 col-lg-12 col-xl-10">
                                        <div className="d-flex align-items-center border border-translucent rounded-3 text-center p-5 h-100">
                                            <Swiper
                                                slidesPerView={1}
                                                spaceBetween={16}
                                                thumbs={{ swiper: thumbsSwiper }}
                                                modules={[Thumbs, Controller, A11y]}
                                                className="swiper theme-slider swiper-initialized swiper-horizontal swiper-backface-hidden"
                                                onSwiper={setMainSwiper}
                                            >
                                                {images.map((src, i) => (
                                                    <SwiperSlide key={`slide-${i}`} className="swiper-slide">
                                                        <img className="w-100" src={src} alt={`slide-${i}`} />
                                                    </SwiperSlide>
                                                ))}
                                            </Swiper>
                                        </div>
                                    </div>
                                </div>
                                <div className="d-flex">
                                    <button
                                        className="btn btn-lg btn-outline-warning rounded-pill w-100 me-3 px-2 px-sm-4 fs-9 fs-sm-8"
                                        onClick={() => handleToggleFavorite(product.id)}
                                    >
                                        <span className="me-2 far fa-heart"></span>Thêm vào yêu thích
                                    </button>
                                    <button className="btn btn-lg btn-warning rounded-pill w-100 fs-9 fs-sm-8">
                                        <span className="fas fa-shopping-cart me-2"></span>Thêm vào giỏ
                                    </button>
                                </div>
                            </div>

                            <div className="col-12 col-lg-6">
                                <div className="d-flex flex-column justify-content-between h-100">
                                    <div>
                                        <div className="d-flex flex-wrap">
                                            <div className="me-2">
                                                {[...Array(5)].map((_, i) => (
                                                    <span key={i} className="fa fa-star text-warning"></span>
                                                ))}
                                            </div>
                                            <p className="text-primary fw-semibold mb-2">
                                                {product.views} lượt xem • {product.sold || 0} đã bán
                                            </p>
                                        </div>
                                        <h3 className="mb-3 lh-sm">{product.name}</h3>

                                        {product.tags && product.tags.length > 0 && (
                                            <div className="d-flex flex-wrap align-items-start mb-3">
                                                {product.tags.map(tag => (
                                                    <span key={tag.id} className="badge text-bg-success fs-9 rounded-pill me-2 fw-semibold">
                                                        {tag.name}
                                                    </span>
                                                ))}
                                            </div>
                                        )}

                                        <div className="d-flex flex-wrap align-items-center">
                                            <h1 className="me-3">
                                                {new Intl.NumberFormat('vi-VN', {
                                                    style: 'currency',
                                                    currency: 'VND'
                                                }).format(currentPrice - currentDiscountPrice)}
                                            </h1>
                                            {currentDiscountPrice > 0 && (
                                                <>
                                                    <p className="text-body-quaternary text-decoration-line-through fs-6 mb-0 me-3">
                                                        {new Intl.NumberFormat('vi-VN', {
                                                            style: 'currency',
                                                            currency: 'VND'
                                                        }).format(currentPrice)}
                                                    </p>
                                                    <p className="text-warning fw-bolder fs-6 mb-0">
                                                        -{discountPercent}%
                                                    </p>
                                                </>
                                            )}
                                        </div>

                                        <p className="text-success fw-semibold fs-7 mb-2">
                                            {currentVariant?.quantity > 0 ? 'Còn hàng' : 'Hết hàng'}
                                        </p>
                                        <p className="text-danger-dark fw-bold mb-5 mb-lg-0">
                                            Số lượng: {currentVariant?.quantity || 0}
                                        </p>
                                    </div>

                                    <div>
                                        {/* Render attribute controls */}
                                        {/* {renderAttributeControls()} */}

                                        <div className="row g-3 g-sm-5 align-items-end">
                                            <div className="col-12 col-sm">
                                                <p className="fw-semibold mb-2 text-body">Số lượng:</p>
                                                <div className="d-flex justify-content-between align-items-end">
                                                    <div className="d-flex flex-between-center" data-quantity="data-quantity">
                                                        <button
                                                            className="btn btn-phoenix-primary px-3"
                                                            onClick={() => handleQuantityChange('minus')}
                                                            disabled={quantity <= 1}
                                                        >
                                                            <span className="fas fa-minus"></span>
                                                        </button>
                                                        <input
                                                            className="form-control text-center input-spin-none bg-transparent border-0 outline-none"
                                                            style={{ width: "50px" }}
                                                            type="number"
                                                            min="1"
                                                            value={quantity}
                                                            onChange={(e) => setQuantity(parseInt(e.target.value) || 1)}
                                                        />
                                                        <button
                                                            className="btn btn-phoenix-primary px-3"
                                                            onClick={() => handleQuantityChange('plus')}
                                                        >
                                                            <span className="fas fa-plus"></span>
                                                        </button>
                                                    </div>
                                                    <button className="btn btn-phoenix-primary px-3 border-0">
                                                        <span className="fas fa-share-alt fs-7"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section>
                    <div className="container-small">
                        <ul className="nav nav-underline fs-9 mb-4" id="productTab" role="tablist">
                            <li className="nav-item">
                                <a className="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    href="#tab-description" role="tab" aria-controls="tab-description"
                                    aria-selected="true">Mô tả</a>
                            </li>
                            <li className="nav-item">
                                <a className="nav-link" id="specification-tab" data-bs-toggle="tab"
                                    href="#tab-specification" role="tab" aria-controls="tab-specification"
                                    aria-selected="false">Thông số kỹ thuật</a>
                            </li>
                            <li className="nav-item">
                                <a className="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                    href="#tab-reviews" role="tab" aria-controls="tab-reviews"
                                    aria-selected="false">Đánh giá</a>
                            </li>
                        </ul>

                        <div className="row gx-3 gy-7">
                            <div className="col-12 col-lg-7 col-xl-8">
                                <div className="tab-content" id="productTabContent">
                                    <div className="tab-pane pe-lg-6 pe-xl-12 fade show active text-body-emphasis"
                                        id="tab-description" role="tabpanel" aria-labelledby="description-tab">
                                        <p className="mb-5">{product.description}</p>
                                    </div>
                                    <div className="tab-pane pe-lg-6 pe-xl-12 fade" id="tab-specification" role="tabpanel"
                                        aria-labelledby="specification-tab">
                                        <h3 className="mb-3 fw-bold">Thông số kỹ thuật</h3>
                                        {currentVariant && (
                                            <table className="table">
                                                <tbody>
                                                    <tr>
                                                        <td className="bg-body-highlight align-middle">
                                                            <h6 className="mb-0 text-body text-uppercase fw-bolder px-4 fs-9 lh-sm">
                                                                SKU
                                                            </h6>
                                                        </td>
                                                        <td className="px-5 mb-0">{currentVariant.sku}</td>
                                                    </tr>
                                                    <tr>
                                                        <td className="bg-body-highlight align-middle">
                                                            <h6 className="mb-0 text-body text-uppercase fw-bolder px-4 fs-9 lh-sm">
                                                                Giá
                                                            </h6>
                                                        </td>
                                                        <td className="px-5 mb-0">
                                                            {new Intl.NumberFormat('vi-VN', {
                                                                style: 'currency',
                                                                currency: 'VND'
                                                            }).format(currentVariant.price)}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td className="bg-body-highlight align-middle">
                                                            <h6 className="mb-0 text-body text-uppercase fw-bolder px-4 fs-9 lh-sm">
                                                                Số lượng
                                                            </h6>
                                                        </td>
                                                        <td className="px-5 mb-0">{currentVariant.quantity}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        )}
                                    </div>
                                </div>
                            </div>

                            <div className="col-12 col-lg-5 col-xl-4">
                                <div className="card">
                                    <div className="card-body">
                                        <h5 className="text-body-emphasis">Thông tin sản phẩm</h5>
                                        <div className="border-dashed border-y border-translucent py-4">
                                            <p><strong>Danh mục:</strong>
                                                {product.categories?.map(cat => cat.name).join(', ')}
                                            </p>
                                            <p><strong>Tags:</strong>
                                                {product.tags?.map(tag => tag.name).join(', ')}
                                            </p>
                                            <p><strong>Lượt xem:</strong> {product.views}</p>
                                            <p><strong>Đã bán:</strong> {product.sold || 0}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </>
    );
};

export default ProductDetailPage;