@extends('layouts.app')
@section('title', 'Product') {{-- Đổi tiêu đề --}}
@section('content')
    <div class="content">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li> {{-- Đổi category thành product --}}
                <li class="breadcrumb-item active">List Product</li> {{-- Đổi Category thành Product --}}
            </ol>
        </nav>
        <div class="mb-9">
            <div class="row g-3 mb-4">
                <div class="col-auto">
                    <h2 class="mb-0">Products</h2>
                </div>
            </div>
            <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#"><span>All </span><span
                                class="text-body-tertiary fw-semibold"
                                id="total-products">({{ count($products) }})</span></a></li> {{-- Đổi total-categories thành total-products, categories thành products --}}
                <li class="nav-item"><a class="nav-link" href="#"><span>Published </span><span
                                class="text-body-tertiary fw-semibold">(70348)</span></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><span>Drafts </span><span
                                class="text-body-tertiary fw-semibold">(17)</span></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><span>On discount </span><span
                                class="text-body-tertiary fw-semibold">(810)</span></a></li>
            </ul>
            <div id="products-list" {{-- Giữ ID là "products-list" hoặc "products" --}}
                data-list='{"valueNames":["product-name","product-category","product-price","product-tags"],"page":10,"pagination":true}'> {{-- Cập nhật valueNames --}}
                <div class="mb-4">
                    <div class="d-flex flex-wrap gap-3">
                        <div class="search-box">
                            <form class="position-relative"><input class="form-control search-input search" type="search"
                                    placeholder="Search products" aria-label="Search" />
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                        </div>
                        <div class="scrollbar overflow-hidden-y">
                            <div class="btn-group position-static" role="group">
                                {{-- Giữ các filter Category và Vendor nếu cần --}}
                                <div class="btn-group position-static text-nowrap"><button
                                            class="btn btn-phoenix-secondary px-7 flex-shrink-0" type="button"
                                            data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                            aria-expanded="false" data-bs-reference="parent"> Category<span
                                                class="fas fa-angle-down ms-2"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group position-static text-nowrap"><button
                                            class="btn btn-sm btn-phoenix-secondary px-7 flex-shrink-0" type="button"
                                            data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                            aria-expanded="false" data-bs-reference="parent"> Vendor<span
                                                class="fas fa-angle-down ms-2"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    </ul>
                                </div><button class="btn btn-sm btn-phoenix-secondary px-7 flex-shrink-0">More
                                    filters</button>
                            </div>
                        </div>
                        <div class="ms-xxl-auto"><button class="btn btn-link text-body me-4 px-0"><span
                                        class="fa-solid fa-file-export fs-9 me-2"></span>Export</button>
                            <button class="btn btn-primary" id="addProductBtn" data-bs-toggle="modal"
                                data-bs-target="#productModal"> {{-- Đổi id và data-bs-target --}}
                                <span class="fas fa-plus me-2"></span>Add Product {{-- Đổi text --}}
                            </button>
                        </div>
                    </div>
                </div>
                <div
                    class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis border-top border-bottom border-translucent position-relative top-1">
                    <div class="table-responsive scrollbar mx-n1 px-1">
                        <table class="table fs-9 mb-0">
                            <thead>
                                <tr>
                                    <th class="white-space-nowrap fs-9 align-middle ps-0"
                                        style="max-width:20px; width:18px;">
                                        <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                id="checkbox-bulk-products-select" type="checkbox"
                                                data-bulk-select='{"body":"products-table-body"}' /></div>
                                    </th>
                                    <th class="sort white-space-nowrap align-middle fs-10" scope="col"
                                        style="width:70px;">Image</th>
                                    <th class="sort white-space-nowrap align-middle ps-4" scope="col"
                                        style="width:350px;" data-sort="product-name">PRODUCT NAME</th> {{-- Đổi category-name thành product-name --}}
                                    <th class="sort align-middle ps-4" scope="col" data-sort="product-category"
                                        style="width:150px;">CATEGORY</th> {{-- Đổi parent-category thành category --}}
                                    <th class="sort align-middle ps-4" scope="col" data-sort="product-price"
                                        style="width:150px;">PRICE</th> {{-- Thêm cột Price --}}
                                    <th class="sort align-middle ps-3" scope="col" data-sort="product-tags"
                                        style="width:250px;">TAGS</th> {{-- Đổi description thành tags --}}
                                    <th class="sort text-end align-middle pe-0 ps-4" scope="col">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="products-table-body">
                                @foreach ($products as $product)
                                    <tr class="position-static">
                                        <td class="fs-9 align-middle">
                                            <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                    type="checkbox"
                                                    data-bulk-select-row='{"productId":{{ $product->id }}}' /> {{-- Đổi categoryId thành productId --}}
                                            </div>
                                        </td>
                                        <td class="align-middle white-space-nowrap py-0 product-img">
                                            @if ($product->img)
                                                <a class="d-block border border-translucent rounded-2" href="#">
                                                    <img src="{{ asset('storage/' . $product->img) }}" alt="" width="53" />
                                                </a>
                                            @else
                                                <div class="d-block border border-translucent rounded-2 text-center"
                                                    style="width:53px; height:53px; line-height:53px;">
                                                    <i class="fas fa-box text-body-secondary"></i> {{-- Icon placeholder --}}
                                                </div>
                                            @endif
                                        </td>
                                        <td class="product-name align-middle ps-4">
                                            <a class="fw-semibold line-clamp-3 mb-0" href="#">{{ $product->name }}</a>
                                        </td>
                                        <td class="product-category align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                            {{ $product->category ? $product->category->name : 'N/A' }}
                                        </td>
                                        <td class="product-price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                                            ${{ number_format($product->price, 2) }} {{-- Định dạng giá tiền --}}
                                        </td>
                                        <td class="product-tags align-middle review pb-2 ps-3" style="min-width:225px;">
                                            @forelse($product->tags as $tag) {{-- Lặp qua các tags của sản phẩm --}}
                                                <a class="text-decoration-none" href="#!"><span class="badge badge-tag me-2 mb-2">{{ $tag->name }}</span></a>
                                            @empty
                                                <span>--</span>
                                            @endforelse
                                        </td>
                                        <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                            <div class="btn-reveal-trigger position-static">
                                                <button
                                                    class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs-10"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2">
                                                    <a class="dropdown-item edit-product-btn" href="#"
                                                        data-id="{{ $product->id }}">Edit</a> {{-- Đổi edit-category-btn thành edit-product-btn --}}
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger delete-product-btn" href="#"
                                                        data-id="{{ $product->id }}">Remove</a> {{-- Đổi delete-category-btn thành delete-product-btn --}}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row align-items-center justify-content-between py-2 pe-0 fs-9">
                        <div class="col-auto d-flex">
                            <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info">
                            </p><a class="fw-semibold" href="#!" data-list-view="*">View all<span
                                        class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a
                                class="fw-semibold d-none" href="#!" data-list-view="less">View Less<span
                                        class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                        <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span
                                        class="fas fa-chevron-left"></span></button>
                            <ul class="mb-0 pagination"></ul><button class="page-link pe-0"
                                data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')
    </div>

    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="productForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" name="product_id" id="productId"> {{-- Đổi category_id thành product_id --}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="productModalLabel">Add New Product</h5> {{-- Đổi Category thành Product --}}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label> {{-- Đổi Category Name thành Product Name --}}
                            <input type="text" class="form-control" id="productName" name="name" required> {{-- Đổi categoryName thành productName --}}
                            <div class="text-danger" id="nameError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="productCategory" class="form-label">Category</label> {{-- Đổi Parent Category thành Category --}}
                            <select class="form-select" id="productCategory" name="category_id" required> {{-- Đổi categoryParent thành productCategory, name=category_id --}}
                                <option value="">-- Select Category --</option>
                                {{-- Options will be loaded via JavaScript --}}
                            </select>
                            <div class="text-danger" id="category_idError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="productDescription" name="description" rows="3"></textarea>
                            <div class="text-danger" id="descriptionError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control" id="productPrice" name="price" required>
                            <div class="text-danger" id="priceError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="productDiscountPrice" class="form-label">Discount Price</label>
                            <input type="number" step="0.01" class="form-control" id="productDiscountPrice" name="discount_price">
                            <div class="text-danger" id="discount_priceError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="productDiscountPercent" class="form-label">Discount Percent (%)</label>
                            <input type="number" class="form-control" id="productDiscountPercent" name="discount_percent" min="0" max="100">
                            <div class="text-danger" id="discount_percentError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="productQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="productQuantity" name="quantity" required min="0">
                            <div class="text-danger" id="quantityError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Image</label>
                            <input class="form-control" type="file" id="productImage" name="img">
                            <div class="text-danger" id="imgError"></div>
                            <img id="currentProductImage" src="" alt="Current Image" class="img-thumbnail mt-2"
                                style="max-width: 100px; display: none;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tags</label>
                            <div id="productTagsCheckboxes" class="d-flex flex-wrap">
                                {{-- Tags checkboxes will be loaded via JavaScript --}}
                            </div>
                            <div class="text-danger" id="tagsError"></div>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="productStatus" name="status" value="1" checked>
                            <label class="form-check-label" for="productStatus">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="productIsFeatured" name="is_featured" value="1">
                            <label class="form-check-label" for="productIsFeatured">
                                Featured
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveProductBtn">Save Product</button> {{-- Đổi saveCategoryBtn thành saveProductBtn --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Hàm cập nhật bảng sản phẩm sau khi thêm/sửa/xóa thành công
            function updateProductTable(products) {
                let tableBody = $('#products-table-body'); // Giữ nguyên ID gốc của bạn
                tableBody.empty();
                let totalProducts = 0;

                products.forEach(product => {
                    totalProducts++;
                    let statusBadge = product.status ?
                        '<span class="badge bg-success">Active</span>' :
                        '<span class="badge bg-secondary">Inactive</span>';

                    let imageUrl = product.img ? `/storage/${product.img}` : ``;
                    let imageHtml = product.img ?
                        `<a class="d-block border border-translucent rounded-2" href="#"><img src="${imageUrl}" alt="${product.name}" width="53" /></a>` :
                        `<div class="d-block border border-translucent rounded-2 text-center" style="width:53px; height:53px; line-height:53px;"><i class="fas fa-box text-body-secondary"></i></div>`;

                    let tagsHtml = '';
                    if (product.tags && product.tags.length > 0) {
                        product.tags.forEach(tag => {
                            tagsHtml += `<a class="text-decoration-none" href="#!"><span class="badge badge-tag me-2 mb-2">${tag.name}</span></a>`;
                        });
                    } else {
                        tagsHtml = `<span>No Tags</span>`;
                    }

                    tableBody.append(`
                        <tr class="position-static">
                            <td class="fs-9 align-middle">
                                <div class="form-check mb-0 fs-8">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"productId":${product.id}}' />
                                </div>
                            </td>
                            <td class="align-middle white-space-nowrap py-0 product-img">
                                ${imageHtml}
                            </td>
                            <td class="product-name align-middle ps-4">
                                <a class="fw-semibold line-clamp-3 mb-0" href="#">${product.name}</a>
                            </td>
                            <td class="product-category align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                ${product.category ? product.category.name : 'N/A'}
                            </td>
                            <td class="product-price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                                $${parseFloat(product.price).toFixed(2)}
                            </td>
                            <td class="product-tags align-middle review pb-2 ps-3" style="min-width:225px;">
                                ${tagsHtml}
                            </td>
                            <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                <div class="btn-reveal-trigger position-static">
                                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                            type="button" data-bs-toggle="dropdown" data-boundary="window"
                                            aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                        <span class="fas fa-ellipsis-h fs-10"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end py-2">
                                        <a class="dropdown-item edit-product-btn" href="#" data-id="${product.id}">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger delete-product-btn" href="#" data-id="${product.id}">Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `);
                });
                $('#total-products').text(`(${totalProducts})`);
            }

            // Hàm tải các danh mục cho dropdown trong modal sản phẩm
            function loadCategoriesForProductModal(selectedCategoryId = null) {
                $.ajax({
                    url: "{{ route('category.index') }}", // Lấy tất cả danh mục
                    method: 'GET',
                    success: function(response) {
                        let categorySelect = $('#productCategory');
                        categorySelect.empty().append('<option value="">-- Select Category --</option>');
                        response.categories.forEach(cat => {
                            // Không cần thụt lề cho product category dropdown
                            categorySelect.append(`<option value="${cat.id}">${cat.name}</option>`);
                        });
                        if (selectedCategoryId) {
                            categorySelect.val(selectedCategoryId);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading categories for product modal:", error);
                    }
                });
            }

            // Hàm tải các tags cho checkbox trong modal sản phẩm
            function loadTagsForProductModal(selectedTagIds = []) {
                $.ajax({
                    url: "{{ route('tag.index') }}", // Lấy tất cả tags
                    method: 'GET',
                    success: function(response) {
                        let tagsCheckboxesDiv = $('#productTagsCheckboxes');
                        tagsCheckboxesDiv.empty();
                        response.tags.forEach(tag => {
                            let checked = selectedTagIds.includes(tag.id) ? 'checked' : '';
                            tagsCheckboxesDiv.append(`
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="checkbox" name="tags[]" value="${tag.id}" id="tag-${tag.id}" ${checked}>
                                    <label class="form-check-label" for="tag-${tag.id}">${tag.name}</label>
                                </div>
                            `);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading tags for product modal:", error);
                    }
                });
            }


            // Handle "Add Product" button click
            $('#addProductBtn').on('click', function() {
                $('#productModalLabel').text('Add New Product');
                $('#productForm')[0].reset();
                $('#formMethod').val('POST');
                $('#productId').val('');
                $('#currentProductImage').hide().attr('src', '');

                // Reset checkbox và radio
                $('#productStatus').prop('checked', true);
                $('#productIsFeatured').prop('checked', false);

                // Tải categories và tags cho modal
                loadCategoriesForProductModal();
                loadTagsForProductModal([]); // Mảng rỗng vì là thêm mới

                // Clear validation errors
                $('.text-danger').text('');
                $('#productModal').modal('show');
            });

            // Handle "Edit" button click
            $(document).on('click', '.edit-product-btn', function() {
                let id = $(this).data('id');
                console.log("Edit product button clicked for ID:", id);
                $('#productModalLabel').text('Edit Product');
                $('#productForm')[0].reset();
                $('#formMethod').val('PUT');
                $('#productId').val(id);
                $('.text-danger').text('');

                $.ajax({
                    url: `/product/${id}/edit`,
                    method: 'GET',
                    success: function(response) {
                        console.log("Ajax success for edit product:", response);
                        let product = response.product;
                        let categories = response.categories;
                        let allTags = response.allTags; // Danh sách tất cả tags
                        let productTags = product.tags.map(tag => tag.id); // Lấy ID của tags hiện có

                        $('#productName').val(product.name);
                        $('#productDescription').val(product.description);
                        $('#productPrice').val(product.price);
                        $('#productDiscountPrice').val(product.discount_price);
                        $('#productDiscountPercent').val(product.discount_percent);
                        $('#productQuantity').val(product.quantity);
                        $('#productStatus').prop('checked', product.status == 1);
                        $('#productIsFeatured').prop('checked', product.is_featured == 1);

                        if (product.img) {
                            $('#currentProductImage').attr('src', `/storage/${product.img}`).show();
                        } else {
                            $('#currentProductImage').hide().attr('src', '');
                        }

                        // Tải categories và chọn category hiện tại
                        loadCategoriesForProductModal(product.category_id);
                        // Tải tags và đánh dấu các tags đã chọn
                        loadTagsForProductModal(productTags);

                        $('#productModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching product for edit:", error);
                        console.error("Response Text:", xhr.responseText);
                        Swal.fire('Error!', 'Failed to load product details. Check console for more info.', 'error');
                    }
                });
            });

            // Handle form submission (Add/Edit)
            $('#productForm').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let productId = $('#productId').val();
                let method = $('#formMethod').val();
                let url = method === 'POST' ? "{{ route('product.store') }}" : `/product/${productId}`;

                // Clear previous errors
                $('.text-danger').text('');

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire('Success!', response.success, 'success');
                        $('#productModal').modal('hide');
                        updateProductTable(response.products);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", xhr.responseText);
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            for (let field in errors) {
                                // Xử lý lỗi cho mảng tags
                                if (field.startsWith('tags.')) {
                                    $('#tagsError').text(errors[field][0]);
                                } else {
                                    $(`#${field}Error`).text(errors[field][0]);
                                }
                            }
                        } else {
                            Swal.fire('Error!', xhr.responseJSON.error || 'Something went wrong.', 'error');
                        }
                    }
                });
            });

            // Handle "Delete" button click
            $(document).on('click', '.delete-product-btn', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/product/${id}`,
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire('Deleted!', response.success, 'success');
                                updateProductTable(response.products);
                            },
                            error: function(xhr, status, error) {
                                console.error("Error deleting product:", error);
                                Swal.fire('Error!', xhr.responseJSON.error || 'Failed to delete product.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush