import React, { useEffect, useState, useRef } from 'react';
import { useMediaQuery } from 'react-responsive';
import { useDispatch, useSelector } from 'react-redux';
import { Link, useParams } from 'react-router-dom';
import { fetchProductBySlug, toggleFavorite, selectProductsLoading, selectProductsError, clearSelectedProduct, addComment, fetchProductComments, selectProductComments } from '../slice';
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import { PATHS, BASE_URL_ADMIN } from '../../../common/constants';
import BookingFormModal from '../components/BookingFormModal';
import CommentFormModal from '../components/CommentFormModal';
import LoadingIndicator from '../../../core/components/LoadingIndicator';
import ErrorIndicator from '../../../core/components/ErrorIndicator';
import VerifiedBadge from '../../../core/components/VerifiedBadge';
import { Swiper, SwiperSlide } from "swiper/react";
import { Thumbs, Navigation, Pagination, Controller, A11y, FreeMode } from "swiper/modules";
import "swiper/css";
import "swiper/css/thumbs";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/free-mode";
import { fetchBookingsApi } from '../api'; // Đảm bảo đã import

const ProductDetailPage = () => {
    const dispatch = useDispatch();
    const isDesktop = useMediaQuery({ minWidth: 1024 });
    const isMobile = useMediaQuery({ maxWidth: 767 });
    const { productSlug } = useParams();

    // Lấy thông tin user hiện tại từ auth slice
    const currentUser = useSelector((state) => state.auth.user);

    const selectedProduct = useSelector((state) => state.products.selectedProduct);
    const comments = useSelector(selectProductComments);
    const loading = useSelector(selectProductsLoading);
    const error = useSelector(selectProductsError);

    const [showBookingModal, setShowBookingModal] = useState(false);
    const [showCommentModal, setShowCommentModal] = useState(false);
    const [commentSort, setCommentSort] = useState('newest'); // newest, oldest
    const [ratingFilter, setRatingFilter] = useState(0); // 0 = all, 1-5 = filter by stars
    const [replyTo, setReplyTo] = useState(null); // Comment đang được trả lời
    const [replyContent, setReplyContent] = useState(''); // Nội dung trả lời
    const [showReplyForm, setShowReplyForm] = useState(false); // Hiển thị form trả lời
    const [userBooking, setUserBooking] = useState(null);

    // Xử lý sắp xếp và lọc comments
    const getFilteredAndSortedComments = (comments) => {
        if (!comments) return [];

        // Tách comments cha và con
        const parentComments = comments.filter(comment => !comment.parent_id);
        const childComments = comments.filter(comment => comment.parent_id);

        // Lọc theo rating cho comments cha
        let filteredParents = parentComments;
        if (ratingFilter > 0) {
            filteredParents = parentComments.filter(comment => comment.rating === ratingFilter);
        }

        // Sắp xếp comments cha theo thời gian
        const sortedParents = [...filteredParents].sort((a, b) => {
            const dateA = new Date(a.created_at);
            const dateB = new Date(b.created_at);
            return commentSort === 'newest' ? dateB - dateA : dateA - dateB;
        });

        // Gắn các replies vào comment cha tương ứng
        return sortedParents.map(parent => ({
            ...parent,
            replies: childComments
                .filter(child => child.parent_id === parent.id)
                .sort((a, b) => new Date(a.created_at) - new Date(b.created_at))
        }));
    };

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

    // Hàm xử lý yêu thích
    const handleToggleFavorite = async (e, productId) => {
        e.preventDefault();
        try {
            const result = await dispatch(toggleFavorite(productId)).unwrap();
            toast.success(result.message, ToastConfig);
            // Không cần fetch lại dữ liệu vì reducer đã cập nhật state
        } catch (error) {
            toast.error(error || 'Có lỗi xảy ra khi thay đổi trạng thái yêu thích', ToastConfig);
        }
    };

    // Xử lý khi click nút trả lời
    const handleReplyClick = (comment) => {
        if (!currentUser) {
            toast.error('Vui lòng đăng nhập để trả lời bình luận');
            return;
        }
        setReplyTo(comment);
        setShowReplyForm(true);
    };

    // Xử lý khi gửi trả lời
    const handleSubmitReply = async (e) => {
        e.preventDefault(); // Ngăn form reload trang

        if (!replyContent.trim()) {
            toast.error('Vui lòng nhập nội dung bình luận!');
            return;
        }

        if (!replyTo) {
            toast.error('Không tìm thấy bình luận để trả lời');
            return;
        }

        try {
            const commentData = {
                content: replyContent,
                parent_id: replyTo.id
            };

            await dispatch(addComment({
                productId: product.id,
                commentData
            })).unwrap();

            // Đợi fetchProductComments hoàn thành trước khi reset form
            await dispatch(fetchProductComments(product.id)).unwrap();

            // Reset form sau khi đã cập nhật comments thành công
            setReplyContent('');
            setReplyTo(null);
            setShowReplyForm(false);

            toast.success('Đã gửi phản hồi thành công!');
        } catch (error) {
            console.error('Error:', error);
            toast.error(error.message || 'Có lỗi xảy ra khi gửi phản hồi');
        }
    };

    useEffect(() => {
        const fetchUserBooking = async () => {
            try {
                const res = await fetchBookingsApi();
                // Nếu API trả về mảng bookings
                if (res && Array.isArray(res.bookings)) {
                    const booking = res.bookings.find(b => b.product_id === selectedProduct.id);
                    if (booking) {
                        setUserBooking(booking);
                    }
                }
            } catch (err) {

            }
        };
        if (selectedProduct && selectedProduct.id && currentUser) {
            fetchUserBooking();
        }
    }, [selectedProduct, currentUser]);

    if (loading) {
        return <LoadingIndicator />;
    }

    if (error) {
        return <ErrorIndicator />;
    }

    // Cấu hình Toast thông báo 
    const ToastConfig = {
        position: "top-right",
        autoClose: 3000,
        hideProgressBar: false,
        closeOnClick: true,
        pauseOnHover: true,
        draggable: true,
        progress: undefined,
    };

    // Kiểm tra xem sản phẩm có được yêu thích bởi user hiện tại không
    const isProductFavorited = (product) => {
        // Kiểm tra nếu product hoặc favorited_by_users không tồn tại
        if (!product || !product.favorited_by_users) {
            return false;
        }

        // Kiểm tra xem user hiện tại có trong danh sách favorited_by_users không
        const isFavorited = product.favorited_by_users.some(user => user.id === currentUser?.id);
        return isFavorited;
    };

    if (!selectedProduct) {
        return (
            <div className="container mt-5 text-center">
                <div className="alert alert-warning">Không tìm thấy sản phẩm này.</div>
                <p className="text-secondary">Có thể sản phẩm không tồn tại hoặc đã bị xóa.</p>
            </div>
        );
    }

    const product = selectedProduct;
    const isFavorited = isProductFavorited(product);
    const originalPrice = currentPrice;// Giá gốc
    const discountedPrice = currentDiscountPrice;// Giá đã giảm
    const discountAmount = originalPrice - discountedPrice;// Số tiền giảm
    const discountPercent = discountedPrice > 0 ? Number(((discountAmount / originalPrice) * 100).toFixed(2)) : 0;// Tỷ lệ giảm
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
                                        <Swiper className="swiper-products-thumb" onSwiper={setThumbsSwiper} direction={isMobile ? "horizontal" : "vertical"} slidesPerView={3} spaceBetween={16} watchSlidesProgress modules={[Thumbs]} style={isDesktop ? { height: "300px" } : {}} >
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
                                        <div className="d-flex align-items-center  rounded-3 text-center position-relative">
                                            <Swiper style={{ '--swiper-navigation-color': '#fff', '--swiper-pagination-color': '#fff', }} slidesPerView={1} spaceBetween={16} navigation={true} pagination={{ clickable: true, }} thumbs={{ swiper: thumbsSwiper && !thumbsSwiper.destroyed ? thumbsSwiper : null }} modules={[Navigation, Pagination, Thumbs]} onSwiper={setMainSwiper}>
                                                {images.map((src, i) => (
                                                    <SwiperSlide key={`slide-${i}`}>
                                                        <img src={src} alt={`slide-${i}`} style={{ width: '1000px', height: '290px', objectFit: 'cover' }} />
                                                    </SwiperSlide>
                                                ))}
                                            </Swiper>
                                            <button className={`btn btn-lg btn-favorite position-absolute top-0 end-0 m-3 ${isFavorited ? 'btn-warning' : 'btn-outline-warning'} rounded-circle shadow`}
                                                style={{ zIndex: 2, width: '48px', height: '48px', display: 'flex', alignItems: 'center', justifyContent: 'center', fontSize: '1.3rem' }}
                                                onClick={(e) => handleToggleFavorite(e, product.id)}>
                                                <span className={`fa${isFavorited ? 's' : 'r'} fa-heart`}></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div className="d-flex">
                                    {userBooking ? (
                                        <div className="w-100 d-flex flex-column align-items-center justify-content-center bg-success bg-opacity-10 rounded-4 py-3 px-2">
                                            <span className="text-success fw-bold mb-1">
                                                <span className="fas fa-check-circle me-2"></span>Bạn đã có lịch hẹn!
                                            </span>
                                            <span className="text-dark fw-semibold">
                                                <span className="fas fa-calendar-alt me-2"></span>
                                                {userBooking.booking_date && userBooking.booking_time
                                                    ? `${new Date(userBooking.booking_date).toLocaleDateString('vi-VN')} lúc ${userBooking.booking_time}`
                                                    : 'Thời gian chưa xác định'}
                                            </span>
                                        </div>
                                    ) : (
                                        <button className="btn btn-lg btn-warning rounded-pill w-100 fs-9 fs-sm-8" onClick={() => setShowBookingModal(true)}>
                                            <span className="fas fa-calendar-alt me-2"></span>Đặt lịch xem xe
                                        </button>
                                    )}
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
                                            {currentVariant?.pricing_type === 'public_price' ? (
                                                <>
                                                    <h1 className="me-3">
                                                        {new Intl.NumberFormat('vi-VN', {
                                                            style: 'currency',
                                                            currency: 'VND'
                                                        }).format(currentDiscountPrice)}
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
                                                </>
                                            ) : (
                                                // <button className="btn btn-lg btn-warning rounded-pill w-100 fs-9 fs-sm-8" onClick={() => setShowBookingModal(true)}>
                                                    // <span className="fas fa-calendar-alt me-2"></span>Nhận báo giá
                                                // </button>
                                                <span className="badge bg-info bg-opacity-10 text-info fs-6 rounded-pill fw-semibold">
                                                    <Link to={PATHS.CONTACT} className="">Liên hệ</Link> để nhận báo giá
                                                </span>
                                            )}
                                            <hr />
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
                                    aria-selected="false">Bình luận</a>
                            </li>
                        </ul>

                        <div className="row gx-3 gy-7">
                            <div className="col-12 col-lg-7 col-xl-8">
                                <div className="tab-content" id="productTabContent">
                                    <div className="tab-pane pe-lg-6 pe-xl-12 fade show active text-body-emphasis"
                                        id="tab-description" role="tabpanel" aria-labelledby="description-tab">
                                        <p className="mb-5" style={{ whiteSpace: 'pre-wrap' }}>{product.description}</p>
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
                                                                Dòng xe
                                                            </h6>
                                                        </td>
                                                        <td className="px-5 mb-0">
                                                            {product.categories?.map((cat, index) => (
                                                                <span key={cat.id}>
                                                                    {cat.name}
                                                                    {index < product.categories.length - 1 && " , "}
                                                                </span>
                                                            ))}
                                                        </td>
                                                    </tr>
                                                    {product.variants?.map((variant, index) => (
                                                        variant.attribute_values.map(attr => (
                                                            <tr>
                                                                <td className="bg-body-highlight align-middle">
                                                                    <h6 className="mb-0 text-body text-uppercase fw-bolder px-4 fs-9 lh-sm">
                                                                        {attr.attribute_type.name}
                                                                    </h6>
                                                                </td>
                                                                <td className="px-5 mb-0">
                                                                    {attr.value}
                                                                </td>
                                                            </tr>
                                                        ))
                                                    ))}
                                                </tbody>
                                            </table>
                                        )}
                                    </div>
                                    <div
                                        className="tab-pane pe-lg-6 pe-xl-12 fade"
                                        id="tab-reviews"
                                        role="tabpanel"
                                        aria-labelledby="reviews-tab"
                                    >
                                        <div className="d-flex justify-content-between align-items-center mb-4">
                                            <h3 className="mb-0 fw-bold">Bình luận</h3>
                                            <button
                                                className="btn btn-warning"
                                                onClick={() => setShowCommentModal(true)}
                                            >
                                                <i className="fas fa-comment-alt me-2"></i>
                                                Viết bình luận
                                            </button>
                                        </div>

                                        {/* Phần lọc và sắp xếp */}
                                        <div className="mb-4">
                                            <div className="row g-3">
                                                <div className="col-12 col-sm-6">
                                                    <select
                                                        className="form-select"
                                                        value={commentSort}
                                                        onChange={(e) => setCommentSort(e.target.value)}
                                                    >
                                                        <option value="newest">Mới nhất</option>
                                                        <option value="oldest">Cũ nhất</option>
                                                    </select>
                                                </div>
                                                <div className="col-12 col-sm-6">
                                                    <select
                                                        className="form-select"
                                                        value={ratingFilter}
                                                        onChange={(e) => setRatingFilter(Number(e.target.value))}
                                                    >
                                                        <option value="0">Tất cả đánh giá</option>
                                                        <option value="5">5 sao</option>
                                                        <option value="4">4 sao</option>
                                                        <option value="3">3 sao</option>
                                                        <option value="2">2 sao</option>
                                                        <option value="1">1 sao</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        {comments && comments.length > 0 ? (
                                            <div className="comments-list">
                                                {getFilteredAndSortedComments(comments).map((comment) => (
                                                    <div key={comment.id} className="comment-item border-bottom py-4">
                                                        <div className="d-flex justify-content-between mb-2">
                                                            <div className="d-flex align-items-center">
                                                                <div className="avatar avatar-m me-2">
                                                                    {comment.user?.profile?.avatar ? (
                                                                        <img src={`${BASE_URL_ADMIN}storage/${comment.user?.profile?.avatar}`} alt="" className="rounded-circle" />
                                                                    ) : (
                                                                        <div className="avatar-name rounded-circle bg-primary text-white">
                                                                            <span>{comment.user?.name?.charAt(0)?.toUpperCase() || '?'}</span>
                                                                        </div>
                                                                    )}
                                                                </div>
                                                                <div>
                                                                    <h6 className="mb-1 fw-bold">{comment.user?.name}{comment.user?.is_verified === 1 && <VerifiedBadge />}</h6>
                                                                    {/* Hiển thị sao nếu không phải là reply */}
                                                                    {/* {!comment.parent_id && (
                                                                        <div className="text-warning">
                                                                            {[...Array(5)].map((_, index) => (
                                                                                <i key={index}
                                                                                    className={`fa${index < comment.rating ? 's' : 'r'} fa-star`}
                                                                                ></i>
                                                                            ))}
                                                                        </div>
                                                                    )} */}
                                                                </div>
                                                            </div>
                                                            <small className="text-muted">
                                                                {new Date(comment.created_at).toLocaleDateString('vi-VN')}
                                                            </small>
                                                        </div>
                                                        <p className="mb-3">{comment.content}</p>

                                                        {/* Nút trả lời */}
                                                        <div className="d-flex align-items-center mb-3">
                                                            <button
                                                                className="btn btn-sm btn-light"
                                                                onClick={() => handleReplyClick(comment)}
                                                            >
                                                                <i className="fas fa-reply me-1"></i>
                                                                Trả lời
                                                            </button>
                                                        </div>

                                                        {/* Form trả lời */}
                                                        {showReplyForm && replyTo?.id === comment.id && (
                                                            <div className="reply-form mb-3">
                                                                <form onSubmit={handleSubmitReply} className="d-flex">
                                                                    <div className="flex-grow-1">
                                                                        <textarea
                                                                            className="form-control"
                                                                            rows="2"
                                                                            placeholder="Viết trả lời của bạn..."
                                                                            value={replyContent}
                                                                            onChange={(e) => setReplyContent(e.target.value)}
                                                                            required
                                                                        ></textarea>
                                                                    </div>
                                                                    <div className="ms-2">
                                                                        <button
                                                                            type="submit"
                                                                            className="btn btn-primary mb-2"
                                                                            disabled={!replyContent.trim()}
                                                                        >
                                                                            Gửi
                                                                        </button>
                                                                        <button
                                                                            type="button"
                                                                            className="btn btn-light"
                                                                            onClick={() => {
                                                                                setShowReplyForm(false);
                                                                                setReplyTo(null);
                                                                                setReplyContent('');
                                                                            }}
                                                                        >
                                                                            Hủy
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        )}

                                                        {/* Hiển thị các reply */}
                                                        {comment.replies && comment.replies.length > 0 && (
                                                            <div className="replies-list ms-4 mt-3">
                                                                {comment.replies.map(reply => (
                                                                    <div key={reply.id} className="reply-item py-3 border-top">
                                                                        <div className="d-flex justify-content-between mb-2">
                                                                            <div className="d-flex align-items-center">
                                                                                <div className="avatar avatar-s me-2">
                                                                                    {reply.user?.profile?.avatar ? (
                                                                                        <img src={`${BASE_URL_ADMIN}storage/${reply.user?.profile?.avatar}`} alt="" className="rounded-circle" />
                                                                                    ) : (
                                                                                        <div className="avatar-name rounded-circle bg-primary text-white">
                                                                                            <span>{reply.user?.name?.charAt(0)?.toUpperCase() || '?'}</span>
                                                                                        </div>
                                                                                    )}
                                                                                </div>
                                                                                <div>
                                                                                    <h6 className="mb-1 fw-bold">{reply.user?.name}{reply.user?.is_verified === 1 && <VerifiedBadge />}</h6>
                                                                                </div>
                                                                            </div>
                                                                            <small className="text-muted">
                                                                                {new Date(reply.created_at).toLocaleDateString('vi-VN')}
                                                                            </small>
                                                                        </div>
                                                                        <p className="mb-0">{reply.content}</p>
                                                                    </div>
                                                                ))}
                                                            </div>
                                                        )}
                                                    </div>
                                                ))}
                                            </div>
                                        ) : (
                                            <div className="text-center py-5">
                                                <div className="mb-3">
                                                    <i className="far fa-comments fa-3x text-muted"></i>
                                                </div>
                                                <p className="text-muted">Chưa có đánh giá nào cho sản phẩm này</p>
                                                <button
                                                    className="btn btn-warning"
                                                    onClick={() => setShowCommentModal(true)}
                                                >
                                                    Trở thành người đầu tiên đánh giá
                                                </button>
                                            </div>
                                        )}

                                        {showCommentModal && (
                                            <CommentFormModal
                                                productId={product.id}
                                                onClose={() => setShowCommentModal(false)}
                                            />
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

            {/* SHOW POPUP Booking */}
            {showBookingModal && (
                <BookingFormModal
                    productId={product.id}
                    onClose={() => setShowBookingModal(false)}
                    onBooked={(bookingInfo) => {
                        setUserBooking(bookingInfo);
                        setShowBookingModal(false);
                    }}
                />
            )}
        </>
    );
};

export default ProductDetailPage;