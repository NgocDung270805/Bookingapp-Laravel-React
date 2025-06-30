// src/modules/Products/containers/ProductsPage.jsx

import React, { useEffect, useState } from 'react';
import { useAppDispatch, useAppSelector } from '../../../appRedux';
import {
  fetchProducts,
  toggleFavorite,
  // Bỏ các action CRUD sản phẩm không dùng ở đây
} from '../slice';

// Import các component Modal mới
import CommentFormModal from '../components/CommentFormModal';
import BookingFormModal from '../components/BookingFormModal';

const ProductsPage = () => {
  const dispatch = useAppDispatch();
  const { products, loading, error } = useAppSelector((state) => state.products);

  // States để quản lý hiển thị modal
  const [showCommentModal, setShowCommentModal] = useState(false);
  const [showBookingModal, setShowBookingModal] = useState(false);
  const [selectedProductIdForAction, setSelectedProductIdForAction] = useState(null); // Lưu ID sản phẩm được chọn cho hành động

  // Fetch products khi component mount
  useEffect(() => {
    dispatch(fetchProducts());
  }, [dispatch]);

  // ===========================================
  // HÀM XỬ LÝ CÁC NÚT HÀNH ĐỘNG
  // ===========================================

  const handleToggleFavorite = async (productId) => {
    const resultAction = await dispatch(toggleFavorite(productId));
    if (toggleFavorite.fulfilled.match(resultAction)) {
      alert(resultAction.payload.message);
    } else {
      alert(`Lỗi yêu thích: ${JSON.stringify(resultAction.payload)}`);
    }
  };

  const handleOpenCommentModal = (productId) => {
    setSelectedProductIdForAction(productId);
    setShowCommentModal(true);
  };

  const handleCloseCommentModal = () => {
    setShowCommentModal(false);
    setSelectedProductIdForAction(null);
  };

  const handleOpenBookingModal = (productId) => {
    setSelectedProductIdForAction(productId);
    setShowBookingModal(true);
  };

  const handleCloseBookingModal = () => {
    setShowBookingModal(false);
    setSelectedProductIdForAction(null);
  };

  // ===========================================
  // HIỂN THỊ UI
  // ===========================================

  if (loading) {
    return <div>Đang tải sản phẩm...</div>;
  }

  if (error) {
    return <div style={{ color: 'red' }}>Lỗi: {JSON.stringify(error)}</div>;
  }

  return (
    <div style={{ padding: '20px', maxWidth: '400px', margin: 'auto', border: '1px solid #ccc', borderRadius: '8px', color: '#000000'}}>
      <h2>Danh sách Sản phẩm</h2>

      <table style={{ width: '100%', borderCollapse: 'collapse', marginTop: '20px' }}>
        <thead>
          <tr style={{ backgroundColor: '#e2e6ea' }}>
            <th style={{ border: '1px solid #ddd', padding: '8px', textAlign: 'left' }}>ID</th>
            <th style={{ border: '1px solid #ddd', padding: '8px', textAlign: 'left' }}>Ảnh</th>
            <th style={{ border: '1px solid #ddd', padding: '8px', textAlign: 'left' }}>Tên</th>
            <th style={{ border: '1px solid #ddd', padding: '8px', textAlign: 'left' }}>Mô tả</th>
            <th style={{ border: '1px solid #ddd', padding: '8px', textAlign: 'left' }}>Trạng thái</th>
            <th style={{ border: '1px solid #ddd', padding: '8px', textAlign: 'left' }}>Nổi bật</th>
            <th style={{ border: '1px solid #ddd', padding: '8px', textAlign: 'left' }}>Lượt xem</th>
            <th style={{ border: '1px solid #ddd', padding: '8px', textAlign: 'left' }}>Đã bán</th>
            <th style={{ border: '1px solid #ddd', padding: '8px', textAlign: 'left' }}>Danh mục</th>
            <th style={{ border: '1px solid #ddd', padding: '8px', textAlign: 'left' }}>Tags</th>
            <th style={{ border: '1px solid #ddd', padding: '8px', textAlign: 'left' }}>Biến thể</th>
            <th style={{ border: '1px solid #ddd', padding: '8px', textAlign: 'left' }}>Cấu hình thuộc tính</th>
            <th style={{ border: '1px solid #ddd', padding: '8px', textAlign: 'left' }}>Hành động</th>
          </tr>
        </thead>
        <tbody>
          {products.map((product) => (
            <tr key={product.id}>
              <td style={{ border: '1px solid #ddd', padding: '8px' }}>{product.id}</td>
              <td style={{ border: '1px solid #ddd', padding: '8px' }}>
                {product.img ? (
                  <img src={`http://localhost:8000/storage/${product.img}`} alt={product.name} style={{ width: '50px', height: '50px', objectFit: 'cover' }} />
                ) : (
                  <span>N/A</span>
                )}
              </td>
              <td style={{ border: '1px solid #ddd', padding: '8px' }}>{product.name}</td>
              <td style={{ border: '1px solid #ddd', padding: '8px', fontSize: '12px' }}>
                {product.description ? `${product.description.substring(0, 100)}...` : 'N/A'}
              </td>
              <td style={{ border: '1px solid #ddd', padding: '8px' }}>{product.status ? 'Active' : 'Inactive'}</td>
              <td style={{ border: '1px solid #ddd', padding: '8px' }}>{product.is_featured ? 'Có' : 'Không'}</td>
              <td style={{ border: '1px solid #ddd', padding: '8px' }}>{product.views}</td>
              <td style={{ border: '1px solid #ddd', padding: '8px' }}>{product.sold}</td>
              <td style={{ border: '1px solid #ddd', padding: '8px', fontSize: '12px' }}>
                {product.categories && product.categories.length > 0
                  ? product.categories.map(cat => cat.name).join(', ')
                  : 'N/A'}
              </td>
              <td style={{ border: '1px solid #ddd', padding: '8px', fontSize: '12px' }}>
                {product.tags && product.tags.length > 0
                  ? product.tags.map(tag => tag.name).join(', ')
                  : 'N/A'}
              </td>
              <td style={{ border: '1px solid #ddd', padding: '8px', fontSize: '12px' }}>
                {product.variants && product.variants.length > 0 ? (
                  <ul>
                    {product.variants.map(variant => (
                      <li key={variant.id} style={{ listStyle: 'none', margin: 0, padding: 0 }}>
                        {variant.variant_name} ({variant.price ? `${parseFloat(variant.price).toLocaleString('vi-VN')} VND` : 'Báo giá'})
                      </li>
                    ))}
                  </ul>
                ) : 'N/A'}
              </td>
              <td style={{ border: '1px solid #ddd', padding: '8px', fontSize: '12px' }}>
                {product.productAttributeValueConfigs && product.productAttributeValueConfigs.length > 0 ? (
                  <ul>
                    {product.productAttributeValueConfigs.map(config => (
                      <li key={config.id} style={{ listStyle: 'none', margin: 0, padding: 0 }}>
                        {config.attribute_value?.value} ({config.price ? `${parseFloat(config.price).toLocaleString('vi-VN')} VND` : 'N/A'})
                      </li>
                    ))}
                  </ul>
                ) : 'N/A'}
              </td>
              <td style={{ border: '1px solid #ddd', padding: '8px', minWidth: '150px' }}>
                <button onClick={() => handleToggleFavorite(product.id)} style={{ marginRight: '5px', backgroundColor: '#ffc107', color: 'black', border: 'none' }}>Yêu thích</button>
                <button onClick={() => handleOpenCommentModal(product.id)} style={{ marginRight: '5px', backgroundColor: '#17a2b8', color: 'white', border: 'none' }}>Comment</button>
                <button onClick={() => handleOpenBookingModal(product.id)} style={{ backgroundColor: '#007bff', color: 'white', border: 'none' }}>Đặt lịch</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>

      {/* Hiển thị CommentFormModal nếu showCommentModal là true */}
      {showCommentModal && selectedProductIdForAction && (
        <CommentFormModal
          productId={selectedProductIdForAction}
          onClose={handleCloseCommentModal}
        />
      )}

      {/* Hiển thị BookingFormModal nếu showBookingModal là true */}
      {showBookingModal && selectedProductIdForAction && (
        <BookingFormModal
          productId={selectedProductIdForAction}
          onClose={handleCloseBookingModal}
        />
      )}
    </div>
  );
};

export default ProductsPage;