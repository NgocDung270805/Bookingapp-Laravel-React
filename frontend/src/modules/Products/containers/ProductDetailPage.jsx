import React, { useEffect, useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { useParams } from 'react-router-dom';
import {
  fetchProductBySlug,
  toggleFavorite,
  selectProductsLoading,
  selectProductsError,
  clearSelectedProduct
} from '../slice';
import { BASE_URL_ADMIN } from '../../../common/constants';
import BookingFormModal from '../components/BookingFormModal';
import CommentFormModal from '../components/CommentFormModal';

const ProductDetailPage = () => {
  const dispatch = useDispatch();
  const { productSlug } = useParams();

  const selectedProduct = useSelector((state) => state.products.selectedProduct);
  const loading = useSelector(selectProductsLoading);
  const error = useSelector(selectProductsError);

  const [showBookingModal, setShowBookingModal] = useState(false);
  const [showCommentModal, setShowCommentModal] = useState(false);

  useEffect(() => {
    if (productSlug) {
      dispatch(fetchProductBySlug(productSlug));
      document.title = `Chi tiết sản phẩm - ${productSlug.replace(/-/g, ' ').toUpperCase()}`;
    }
    return () => {
      dispatch(clearSelectedProduct());
    };
  }, [dispatch, productSlug]);

  const handleToggleFavorite = async (productId) => {
    const resultAction = await dispatch(toggleFavorite(productId));
    if (toggleFavorite.fulfilled.match(resultAction)) {
      alert(resultAction.payload.message);
    } else {
      alert(`Lỗi yêu thích: ${JSON.stringify(resultAction.payload)}`);
    }
  };

  if (loading) {
    return (
      <div className="container mt-5 text-center">
        <div className="spinner-border text-info" role="status"></div>
        <p className="mt-2 text-info">Đang tải chi tiết sản phẩm...</p>
      </div>
    );
  }

  if (error) {
    return (
      <div className="container mt-5 text-center">
        <div className="alert alert-danger">Lỗi khi tải sản phẩm: {error}</div>
        <p className="text-secondary">Vui lòng thử lại sau.</p>
      </div>
    );
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
  const mainImageUrl = product.img ? `${BASE_URL_ADMIN}/${product.img}` : '';
  const galleryImages = product.images || [];

  return (
    <div className="container mt-5 mb-5">
      <div className="card shadow-sm">
        <div className="card-body p-lg-5">
          <div className="row g-5">
            {/* Cột ảnh */}
            <div className="col-12 col-lg-6">
              <img
                src={mainImageUrl}
                alt={product.name}
                className="img-fluid rounded w-100"
                style={{ maxHeight: '500px', objectFit: 'cover' }}
              />
              {galleryImages.length > 0 && (
                <div className="d-flex flex-wrap gap-2 mt-3 justify-content-center">
                  {galleryImages.map((img, idx) => (
                    <img
                      key={img.id || idx}
                      src={`${BASE_URL_ADMIN}/${img.image_path}`}
                      alt={`${product.name} ${idx + 1}`}
                      className="img-thumbnail rounded"
                      style={{ width: '100px', height: '100px', objectFit: 'cover' }}
                    />
                  ))}
                </div>
              )}
            </div>

            {/* Cột nội dung */}
            <div className="col-12 col-lg-6">
              <h1 className="display-5 fw-bold text-dark mb-2">{product.name}</h1>
              <p className="fs-7 text-secondary-emphasis">
                <span className="fa-solid fa-car-side me-2"></span>
                Danh mục:{' '}
                {product.categories?.map((cat) => cat.name).join(', ') || 'N/A'}
              </p>
              <div className="d-flex align-items-center gap-3 mb-3">
                <span className="badge badge-phoenix badge-phoenix-warning fs-8 fw-normal">
                  <span className="fa-solid fa-star me-1 fs-9"></span>
                  <span className="badge-label">3.8</span>
                </span>
                <h4 className="mb-0 text-dark fw-bold text-nowrap">
                  {product.min_price ? `$${product.min_price}` : 'Giá liên hệ'}
                  <span className="text-secondary-lighter fs-8 fw-normal"> / sản phẩm</span>
                </h4>
              </div>

              <p className="text-body-highlight">{product.description}</p>

              <ul className="list-unstyled text-body-secondary mt-4 mb-4">
                {product.views && <li><span className="fa-solid fa-eye me-2"></span>Lượt xem: {product.views}</li>}
                {product.sold && <li><span className="fa-solid fa-cart-shopping me-2"></span>Đã bán: {product.sold}</li>}
                {product.created_at && <li><span className="fa-solid fa-calendar-alt me-2"></span>Ngày đăng: {new Date(product.created_at).toLocaleDateString()}</li>}
                {product.updated_at && <li><span className="fa-solid fa-edit me-2"></span>Cập nhật: {new Date(product.updated_at).toLocaleDateString()}</li>}
              </ul>

              <div className="d-flex flex-wrap gap-2">
                <button
                  className="btn btn-warning d-flex align-items-center"
                  onClick={() => setShowBookingModal(true)}
                >
                  <span className="fa-solid fa-calendar-check me-2"></span> Đặt lịch
                </button>
                <button
                  className="btn btn-outline-danger d-flex align-items-center"
                 onClick={() => handleToggleFavorite(product.id)}
                >
                  <span className={`fa-${product.is_favorited ? 'solid' : 'regular'} fa-heart me-2`}></span>
                  {product.is_favorited ? 'Đã yêu thích' : 'Yêu thích'}
                </button>
                <button
                  className="btn btn-outline-primary d-flex align-items-center"
                  onClick={() => setShowCommentModal(true)}
                >
                  <span className="fa-solid fa-comment-dots me-2"></span> Bình luận
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      {/* Modal đặt lịch */}
      {showBookingModal && (
        <BookingFormModal
          productId={product.id}
          onClose={() => setShowBookingModal(false)}
        />
      )}

      {/* Modal bình luận */}
      {showCommentModal && (
        <CommentFormModal
          productId={product.id}
          onClose={() => setShowCommentModal(false)}
        />
      )}
    </div>
  );
};

export default ProductDetailPage;
