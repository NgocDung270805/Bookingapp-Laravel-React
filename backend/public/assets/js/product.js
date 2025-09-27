// Product image handling functions
function previewMainImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            $('#currentProductImage')
                .attr('src', e.target.result)
                .css('display', 'block');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function previewMultipleImages(input) {
    $('#multipleImagesPreview').empty();
    if (input.files) {
        for (let i = 0; i < input.files.length; i++) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#multipleImagesPreview').append(`
                    <div class="position-relative">
                        <img src="${e.target.result}" class="img-thumbnail" style="height: 100px; width: 100px; object-fit: cover;">
                    </div>
                `);
            }
            reader.readAsDataURL(input.files[i]);
        }
    }
}

function loadExistingProductImages(images) {
    $('#multipleImagesPreview').empty();
    console.log('Loading existing images:', images);
    if (images && images.length > 0) {
        images.forEach(image => {
            $('#multipleImagesPreview').append(`
                <div class="position-relative">
                    <img src="/storage/${image.image_path}" class="img-thumbnail" style="height: 100px; width: 100px; object-fit: cover;">
                </div>
            `);
        });
    }
}

// Product form handling
// =========================================================================
// SỬA ĐỔI HANDLER SUBMIT AJAX CHO #productForm
// =========================================================================
// Hàm xử lý submit form sản phẩm
// Hàm xử lý submit form sản phẩm
$('#productForm').on('submit', function (e) {
    e.preventDefault();

    const productId = $('#productId').val();
    let url;
    const method = 'POST';

    // 1. CẤU HÌNH URL (TẠO MỚI/CẬP NHẬT)
    $(this).find('input[name="_method"]').remove(); // Xóa _method cũ
    if (productId) {
        url = `/product/${productId}`;
        $(this).append('<input type="hidden" name="_method" value="PUT">'); // Thêm _method=PUT
    } else {
        url = '/product';
    }

    // 2. XỬ LÝ DỮ LIỆU FORM (FIX LỖI ARRAY & TẠO FORM DATA)

    // Lấy giá trị. Mảng này có thể đang bị 'nested array' do thư viện hoặc cấu hình HTML
    let selectedCategoryIds = $('#category_ids').val() || [];
    const selectedTagIds = $('#tags').val() || [];

    // Tạo FormData sau khi đã thêm trường _method
    const formData = new FormData(this);

    // ==========================================================
    // ⭐ PHẦN SỬA LỖI CHÍNH ⭐
    // Đảm bảo Formdata không có các giá trị cũ.
    // Sau đó, làm phẳng mảng (flat) để loại bỏ array lồng nhau (ví dụ: [14, [8, 14]])
    // ==========================================================

    // Xử lý Category IDs
    // 1. Xóa tất cả các key category_ids (dù có [] hay không) mà FormData tự tạo
    formData.delete('category_ids');
    formData.delete('category_ids[]');

    // 2. Dùng Array.prototype.flat() để đảm bảo loại bỏ mọi mảng lồng
    if (Array.isArray(selectedCategoryIds)) {
        // .flat(Infinity) sẽ làm phẳng mọi cấp độ của mảng
        const flatCategoryIds = selectedCategoryIds.flat(Infinity);

        flatCategoryIds.forEach(id => {
            // Kiểm tra thêm: đảm bảo ID là hợp lệ (không phải null/undefined)
            if (id !== null && id !== undefined && id !== '') {
                formData.append('category_ids[]', id);
            }
        });
    }

    // Xử lý Tag IDs (Làm tương tự để đảm bảo tính nhất quán)
    formData.delete('tags');
    formData.delete('tags[]');
    if (Array.isArray(selectedTagIds)) {
        const flatTagIds = selectedTagIds.flat(Infinity);

        flatTagIds.forEach(id => {
            if (id !== null && id !== undefined && id !== '') {
                formData.append('tags[]', id);
            }
        });
    }

    // 3. LOG DỮ LIỆU ĐÃ FIX LỖI (Kiểm tra lại xem category_ids[] có xuất hiện không)
    console.log("--- START FORM DATA BEING SENT TO SERVER (FIXED) ---");
    for (let pair of formData.entries()) {
        const key = pair[0];
        const value = pair[1];
        if (value instanceof File) {
            console.log(key + ': ' + (value.name ? `[File: ${value.name}, Type: ${value.type}]` : ''));
        } else {
            console.log(key + ': ' + value);
        }
    }
    console.log("--- END FORM DATA (FIXED) ---");


    // 4. AJAX CALL & SWAL
    const isPendingAction = $(this).data('pending-action') === 'create_variant';
    $('.text-danger').text(''); // Reset lỗi

    Swal.fire({
        title: 'Đang lưu sản phẩm...',
        html: 'Vui lòng chờ...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: url,
        method: method,
        data: formData,
        processData: false,
        contentType: false,

        success: function (response) {
            Swal.close();

            const newProductId = response.product.id;
            const newProductName = response.product.name;

            $('#productId').val(newProductId);

            if (isPendingAction) {
                $('#productForm').removeData('pending-action');
                // FIX: Thay thế toastr.success bằng Swal.fire
                Swal.fire('Thành công!', 'Lưu sản phẩm thành công! Đang chuyển sang thêm biến thể.', 'success');
                $('#productModal').modal('hide');

                if (typeof setupCreateVariantModal === 'function') {
                    setupCreateVariantModal(newProductId, newProductName);
                    $('#createVariantQuickModal').modal('show');
                } else {
                    console.error("Hàm setupCreateVariantModal chưa được định nghĩa!");
                }
            } else {
                Swal.fire('Thành công!', response.success, 'success');
                if (!productId) {
                    $('#productModal').modal('hide');
                    // Reload table data if needed
                    if (typeof loadProducts === 'function') {
                        loadProducts();
                    }
                }
            }
        },

        error: function (xhr, status, error) {
            Swal.close();
            $('#productForm').removeData('pending-action');

            const errors = xhr.responseJSON ? xhr.responseJSON.errors : null;

            if (errors) {
                // HIỂN THỊ LỖI VALIDATION (Lỗi 422)
                $('.text-danger').text('');
                $.each(errors, function (key, value) {
                    // Xử lý key validation của Laravel (ví dụ: category_ids.0, category_ids.1)
                    $(`#${key.replace('.', '\\.').replace('[]', '')}Error`).text(value[0]);
                });
                console.error("LỖI VALIDATION (422) - Server Response:", errors);
                // Hiển thị message lỗi chi tiết hơn
                Swal.fire('Lỗi Validation!', 'Vui lòng kiểm tra lại các trường thông tin bắt buộc. Chi tiết lỗi xem trong Console.', 'error');
            } else {
                Swal.fire('Lỗi!', xhr.responseJSON?.message || 'Lưu sản phẩm không thành công do lỗi server.', 'error');
            }
        }
    });

    // QUAN TRỌNG: Xóa trường _method sau khi AJAX hoàn tất
    $(this).find('input[name="_method"]').remove();
});

// Handle "Edit Product" button click
$(document).on('click', '.edit-product-btn', function () {
    let id = $(this).data('id');
    currentEditingProductId = id;

    $('#productModalLabel').text('Edit Product');
    $('#productForm')[0].reset();
    $('#formMethod').val('PUT');
    $('#productId').val(id);
    $('.text-danger').text('');

    $.ajax({
        url: `/product/${id}/edit`,
        method: 'GET',
        success: function (response) {
            let product = response.product;
            let productCategoryIds = response.productCategoryIds;
            let productTagIds = response.productTagIds;

            $('#productName').val(product.name);
            $('#productDescription').val(product.description);
            $('#productStatus').prop('checked', product.status == 1);
            $('#productIsFeatured').prop('checked', product.is_featured == 1);

            if (product.img) {
                $('#currentProductImage').attr('src', `/storage/${product.img}`).show();
            } else {
                $('#currentProductImage').hide().attr('src', '');
            }

            // Load existing additional images
            loadExistingProductImages(product.images);

            loadCategoriesForProductModal(productCategoryIds, true);
            loadTagsForProductModal(productTagIds);

            $('#variantManagementSection').show();
            $('#productModal').modal('show');
        },
        error: function (xhr, status, error) {
            console.error("Error fetching product for edit:", error);
            console.error("Response Text:", xhr.responseText);
            Swal.fire('Error!', 'Failed to load product details. Check console for more info.', 'error');
        }
    });
});