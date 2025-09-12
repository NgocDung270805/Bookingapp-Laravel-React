// Product image handling functions
function previewMainImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
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
            reader.onload = function(e) {
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
$('#productForm').on('submit', function(e) {
    e.preventDefault();
    console.log('Form submission started');

    // Clear previous errors
    $('.text-danger').text('');

    let formData = new FormData(this);

    // Remove any existing category_ids entries from formData
    if (formData.has('category_ids[]')) {
        formData.delete('category_ids[]');
    }

    // Parse the JSON string from the hidden input and append each ID
    let selectedCategoryIds = JSON.parse($('#selectedCategoryIdsHidden').val() || '[]');
    selectedCategoryIds.forEach(id => {
        formData.append('category_ids[]', id);
    });

    // Debug form data
    for (let pair of formData.entries()) {
        console.log(pair[0]+ ': ' + (pair[1] instanceof File ? pair[1].name : pair[1])); 
    }

    let productId = $('#productId').val();
    let method = $('#formMethod').val();
    let url = method === 'POST' ? productStoreUrl : `/product/${productId}`;

    $.ajax({
        url: url,
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log('Form submission response:', response);
            Swal.fire('Success!', response.success, 'success');
            
            // If this was an edit, update the preview panel with current images
            if (response.product) {
                console.log('Fresh product data:', response.product);
                if (response.product.images && response.product.images.length > 0) {
                    loadExistingProductImages(response.product.images);
                } else {
                    $('#multipleImagesPreview').empty();
                }
            }

            $('#productModal').modal('hide');
            updateProductTable(response.products);
        },
        error: function(xhr, status, error) {
            console.error("Error:", xhr.responseText);
            let errors = xhr.responseJSON.errors;
            if (errors) {
                for (let field in errors) {
                    let errorId = field.replace('.', '_') + 'Error';
                    if (field.startsWith('category_ids.')) {
                        $('#category_idsError').text(errors[field][0]);
                    } else {
                        $(`#${errorId}`).text(errors[field][0]);
                    }
                }
            } else {
                Swal.fire('Error!', xhr.responseJSON.error || 'Something went wrong.', 'error');
            }
        }
    });
});

// Handle "Edit Product" button click
$(document).on('click', '.edit-product-btn', function() {
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
        success: function(response) {
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
        error: function(xhr, status, error) {
            console.error("Error fetching product for edit:", error);
            console.error("Response Text:", xhr.responseText);
            Swal.fire('Error!', 'Failed to load product details. Check console for more info.', 'error');
        }
    });
});