
<?php $__env->startSection('title', 'Product'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('product.index')); ?>">Product</a></li>
                <li class="breadcrumb-item active">List Product</li>
            </ol>
        </nav>
        <div class="mb-9">
            <div class="row g-3 mb-4">
                <div class="col-auto">
                    <h2 class="mb-0">Products</h2>
                </div>
            </div>
            <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo e(route('product.index')); ?>">
                        <span>All </span>
                        <span class="text-body-tertiary fw-semibold" id="total-products">(<?php echo e(count($products)); ?>)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span>Đã xuất bản </span>
                        <span class="text-body-tertiary fw-semibold">(70348)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span>
                            Bản nháp </span>
                        <span class="text-body-tertiary fw-semibold">(17)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span>Giảm giá </span><span class="text-body-tertiary fw-semibold">(810)</span>
                    </a>
                </li>
            </ul>
            <div id="products-list"
                data-list='{"valueNames":["product-name","product-categories","product-price","product-tags"],"page":10,"pagination":true}'>
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
                                data-bs-target="#productModal">
                                <span class="fas fa-plus me-2"></span>Add Product
                            </button>
                            <button class="btn btn-phoenix-secondary ms-2" id="manageVariantsBtn" style="display: none;">
                                <span class="fas fa-cubes me-2"></span>Manage Variants
                            </button>
                            
                            <button class="btn btn-phoenix-secondary ms-2" id="manageAttributesBtn" data-bs-toggle="modal"
                                data-bs-target="#attributesModal">
                                <span class="fas fa-tags me-2"></span>Manage Attributes
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
                                        style="width:350px;" data-sort="product-name">PRODUCT NAME</th>
                                    <th class="sort align-middle ps-4" scope="col" data-sort="product-categories"
                                        style="width:150px;">CATEGORIES</th>
                                    <th class="sort align-middle ps-4" scope="col" data-sort="product-price"
                                        style="width:150px;">PRICE (min)</th>
                                    <th class="sort align-middle ps-3" scope="col" data-sort="product-tags"
                                        style="width:250px;">TAGS</th>
                                    <th class="sort text-end align-middle pe-0 ps-4" scope="col">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="products-table-body">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="position-static">
                                        <td class="fs-9 align-middle">
                                            <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                    type="checkbox"
                                                    data-bulk-select-row='{"productId":<?php echo e($product->id); ?>}' />
                                            </div>
                                        </td>
                                        <td class="align-middle white-space-nowrap py-0 product-img">
                                            <?php if($product->img): ?>
                                                <a class="d-block border border-translucent rounded-2" href="#">
                                                    <img src="<?php echo e(asset('storage/' . $product->img)); ?>"
                                                        alt="<?php echo e($product->name); ?>" width="53" />
                                                </a>
                                            <?php else: ?>
                                                <div class="d-block border border-translucent rounded-2 text-center"
                                                    style="width:53px; height:53px; line-height:53px;">
                                                    <i class="fas fa-box text-body-secondary"></i>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td class="product-name align-middle ps-4">
                                            <a class="fw-semibold line-clamp-3 mb-0"
                                                href="#"><?php echo e($product->name); ?></a>
                                        </td>
                                        <td
                                            class="product-categories align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                            <?php $__empty_1 = true; $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <?php echo e($category->name); ?>

                                                <?php if($loop->iteration < $loop->count): ?>
                                                    ,
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                N/A
                                            <?php endif; ?>
                                        </td>
                                        <td
                                            class="product-price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                                            <?php if($product->variants->isNotEmpty()): ?>
                                                <?php
                                                    $variant = $product->variants->sortBy('price')->first();
                                                ?>

                                                <?php if($variant->pricing_type === 'public_price'): ?>
                                                    <?php if($variant->discount_price): ?>
                                                        <span><?php echo e(number_format($variant->discount_price, 0, ',', '.')); ?>

                                                            VNĐ</span>
                                                        <br>
                                                        <small class="text-muted" style="text-decoration: line-through;">
                                                            <?php echo e(number_format($variant->price, 0, ',', '.')); ?> VNĐ
                                                        </small>
                                                    <?php else: ?>
                                                        <?php echo e(number_format($variant->price, 0, ',', '.')); ?> VNĐ
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <p>Sản phẩm yêu cầu báo giá!</p>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                Chưa có biến thể
                                            <?php endif; ?>
                                        </td>
                                        <td class="product-tags align-middle review pb-2 ps-3" style="min-width:225px;">
                                            <?php $__empty_1 = true; $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <a class="text-decoration-none" href="#!"><span
                                                        class="badge badge-tag me-2 mb-2"><?php echo e($tag->name); ?></span></a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <span>No Tags</span>
                                            <?php endif; ?>
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
                                                        data-id="<?php echo e($product->id); ?>">Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger delete-product-btn" href="#"
                                                        data-id="<?php echo e($product->id); ?>">Remove</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="productForm" enctype="multipart/form-data" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="product_id" id="productId">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productModalLabel">Add New Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="name" required>
                            <div class="text-danger" id="nameError"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Categories</label>
                            <div id="parentCategoriesDropdownContainer">
                                <select class="form-select mb-2" id="parentCategorySelect" name="parent_category_id">
                                    <option value="">Select Parent Category</option>
                                    
                                </select>
                            </div>
                            <div id="childCategoriesCheckboxesContainer" class="d-flex flex-wrap" style="display: none;">
                                
                                
                            </div>
                            <div class="text-danger" id="category_idsError"></div>
                            <input type="hidden" name="category_ids[]" id="selectedCategoryIdsHidden">
                        </div>
                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="productDescription" name="description" rows="3"></textarea>
                            <div class="text-danger" id="descriptionError"></div>
                        </div>

                        <div class="mb-3">
                            <label for="productImage" class="form-label">Product General Image</label>
                            <input class="form-control" type="file" id="productImage" name="img">
                            <div class="text-danger" id="imgError"></div>
                            <img id="currentProductImage" src="" alt="Current Image" class="img-thumbnail mt-2"
                                style="max-width: 100px; display: none;">
                        </div>

                        <!-- Additional Product Images -->
                        <div class="mb-3">
                            <label for="productImages" class="form-label">Additional Product Images</label>
                            <input type="file" class="form-control" id="productImages" name="images[]" multiple>
                            <div id="multipleImagesPreview" class="mt-2 d-flex flex-wrap gap-2"></div>
                            <div class="text-danger" id="imagesError"></div>
                        </div>

                        <!-- Existing Product Images -->
                        <div id="existingImages" class="mb-3 d-flex flex-wrap gap-2">
                            <!-- Existing images will be loaded here via JavaScript -->
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tags</label>
                            <div id="productTagsCheckboxes" class="d-flex flex-wrap">
                                
                            </div>
                            <div class="text-danger" id="tagsError"></div>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="productStatus" name="status"
                                value="1" checked>
                            <label class="form-check-label" for="productStatus">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="productIsFeatured" name="is_featured"
                                value="1">
                            <label class="form-check-label" for="productIsFeatured">
                                Featured
                            </label>
                        </div>

                        <div class="mb-3 mt-4" id="variantManagementSection" style="display: none;">
                            <button type="button" class="btn btn-info" id="openVariantModalBtn">
                                <span class="fas fa-cubes me-2"></span>Manage Product Variants
                            </button>
                        </div>

                        <div class="mb-3 mt-4" id="createVariantBtnContainer" style="display: none;">
                            <button type="button" class="btn btn-success" id="createVariantBtn">
                                <span class="fas fa-plus me-2"></span>Create Variant
                            </button>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveProductBtn">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="createVariantQuickModal" tabindex="-1" aria-labelledby="createVariantQuickModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                
                <form id="createVariantForm" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="product_id" id="quickVariantProductIdField">
                    <input type="hidden" name="is_new_variant" value="1"> 
                    <div class="modal-header">
                        <h5 class="modal-title" id="createVariantQuickModalLabel">Thêm Biến thể mới cho sản phẩm: <span
                                id="quickVariantProductName"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="mb-3 border p-3 rounded">
                            <label class="form-label d-block">THUỘC TÍNH BIẾN THỂ
                                <button type="button" class="btn btn-link btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#attributesModal">
                                    <i class="fas fa-plus"></i> Thêm mới thuộc tính
                                </button>
                            </label>
                            <div id="quickVariantAttributesSelectionContainer">
                                <p class="text-muted small">Đang tải thuộc tính...</p><br>
                                
                            </div>
                            <input type="hidden" name="attribute_value_ids" id="quickAttributeValueIdsInput">
                            <div class="text-danger" id="quick_attribute_value_idsError"></div>
                        </div>

                        <hr class="my-4">
                        <h6>Thông tin biến thể:</h6>
                        
                        <div class="mb-3">
                            <label for="quickVariantNameDisplay" class="form-label">TÊN BIẾN THỂ</label>
                            <input type="text" class="form-control" id="quickVariantNameDisplay" readonly>
                            <input type="hidden" name="variant_name" id="quickVariantNameHidden">
                        </div>
                        <div class="mb-3">
                            <label for="quickVariantSkuDisplay" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="quickVariantSkuDisplay" readonly>
                            <input type="hidden" name="sku" id="quickVariantSkuHidden">
                        </div>

                        <div class="mb-3">
                            <label for="quickVariantPrice" class="form-label">GIÁ</label>
                            <input type="number" step="0.01" class="form-control" id="quickVariantPrice"
                                name="price">
                            <div class="text-danger" id="quick_priceError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="quickVariantQuantity" class="form-label">SỐ LƯỢNG</label>
                            <input type="number" class="form-control" id="quickVariantQuantity" name="quantity"
                                required min="0">
                            <div class="text-danger" id="quick_quantityError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="quickVariantImage" class="form-label">HÌNH ẢNH BIẾN THỂ</label>
                            <input class="form-control" type="file" id="quickVariantImage" name="img">
                            <div class="text-danger" id="quick_imgError"></div>
                            <img id="currentQuickVariantImage" src="" alt="Hình ảnh hiện tại"
                                class="img-thumbnail mt-2" style="max-width: 80px; display: none;">
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="quickVariantStatus" name="status"
                                value="1" checked>
                            <label class="form-check-label" for="quickVariantStatus">Hoạt động</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary" id="saveQuickVariantBtn">Lưu biến thể mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="variantsModal" tabindex="-1" aria-labelledby="variantsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="variantsModalLabel">Quản lý biến thể cho sản phẩm: <span
                            id="variantProductName"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="currentProductIdForVariants">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6>Các biến thể hiện có:</h6>
                        <div id="noVariantsMessage" style="display: none;">
                            <button type="button" class="btn btn-primary" id="addNewVariantBtn">
                                <i class="fas fa-plus me-2"></i>Thêm biến thể mới
                            </button>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>SKU</th>
                                <th>Loại giá</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Hình ảnh</th>
                                <th>Trạng thái</th>
                                <th>Nổi bật</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="variantsTableBody">
                            
                        </tbody>
                    </table>

                    <hr class="my-4">

                    <h6>Sửa biến thể:</h6>
                    
                    <form id="variantForm" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="_method" id="variantFormMethod" value="POST">
                        <input type="hidden" name="variant_id" id="variantId">
                        <input type="hidden" name="product_id" id="variantProductIdField">

                        
                        <div class="mb-3 border p-3 rounded">
                            <label class="form-label d-block">THUỘC TÍNH BIẾN THỂ
                                <button type="button" class="btn btn-link btn-sm"id="manageAttributesBtn"
                                    data-bs-toggle="modal" data-bs-target="#attributesModal">
                                    <i class="fas fa-plus"></i> Thêm mới thuộc tính
                                </button>
                            </label>
                            <div id="variantAttributesSelectionContainer">
                                
                                
                                <p class="text-muted small">Đang tải thuộc tính...</p><br>
                            </div>
                            
                            <input type="hidden" name="attribute_value_ids" id="attributeValueIdsInput">
                            <div class="text-danger" id="attribute_value_idsError"></div>
                        </div>

                        <hr class="my-4">
                        <h6>Thông tin biến thể tổng hợp (được tạo từ các thuộc tính trên):</h6>

                        
                        <div class="mb-3">
                            <label for="variantNameDisplay" class="form-label">TÊN BIẾN THỂ</label>
                            <input type="text" class="form-control" id="variantNameDisplay" readonly>
                            <input type="hidden" name="variant_name" id="variantNameHidden">
                        </div>
                        <div class="mb-3">
                            <label for="variantSkuDisplay" class="form-label">SKU (MÃ GIỮ KHO)</label>
                            <input type="text" class="form-control" id="variantSkuDisplay" readonly>
                            <input type="hidden" name="sku" id="variantSkuHidden">
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label">LOẠI GIÁ (Biến thể tổng hợp)</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pricing_type"
                                        id="pricingTypePublic" value="public_price" checked>
                                    <label class="form-check-label" for="pricingTypePublic">Giá công khai</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pricing_type"
                                        id="pricingTypeQuote" value="request_quote">
                                    <label class="form-check-label" for="pricingTypeQuote">Yêu cầu báo giá</label>
                                </div>
                            </div>
                            <div class="text-danger" id="pricing_typeError"></div>
                        </div>

                        
                        <div id="publicPriceFields">
                            <div class="mb-3">
                                <label for="variantPrice" class="form-label">GIÁ (Biến thể tổng hợp)</label>
                                <input type="number" step="0.01" class="form-control" id="variantPrice"
                                    name="price">
                                <div class="text-danger" id="priceError"></div>
                            </div>
                            <div class="mb-3">
                                <label for="variantDiscountPrice" class="form-label">GIÁ GIẢM (Biến thể tổng hợp)</label>
                                <input type="number" step="0.01" class="form-control" id="variantDiscountPrice"
                                    name="discount_price">
                                <div class="text-danger" id="discount_priceError"></div>
                            </div>
                            <div class="mb-3">
                                <label for="variantDiscountPercent" class="form-label">PHẦN TRĂM GIẢM GIÁ (%) (Biến thể
                                    tổng hợp)</label>
                                <input type="number" class="form-control" id="variantDiscountPercent"
                                    name="discount_percent" min="0" max="100">
                                <div class="text-danger" id="discount_percentError"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="variantQuantity" class="form-label">SỐ LƯỢNG (Biến thể tổng hợp)</label>
                            <input type="number" class="form-control" id="variantQuantity" name="quantity" required
                                min="0">
                            <div class="text-danger" id="quantityError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="variantImage" class="form-label">HÌNH ẢNH BIẾN THỂ (Biến thể tổng hợp)</label>
                            <input class="form-control" type="file" id="variantImage" name="img">
                            <div class="text-danger" id="variant_imgError"></div>
                            <img id="currentVariantImage" src="" alt="Hình ảnh hiện tại"
                                class="img-thumbnail mt-2" style="max-width: 80px; display: none;">
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="variantStatus" name="status"
                                value="1" checked>
                            <label class="form-check-label" for="variantStatus">Hoạt động (Biến thể tổng hợp)</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="variantIsFeatured" name="is_featured"
                                value="1">
                            <label class="form-check-label" for="variantIsFeatured">Nổi bật (Biến thể tổng hợp)</label>
                        </div>

                        <button type="submit" class="btn btn-primary" id="saveVariantBtn">Lưu biến thể</button>
                        <button type="button" class="btn btn-secondary" id="cancelEditVariantBtn">Hủy chỉnh sửa</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Xong</button>
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="attributesModal" tabindex="-1" aria-labelledby="attributesModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="attributesModalLabel">Manage Product Attributes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Attribute Types:</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Display Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="attributeTypesTableBody">
                                    
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-success btn-sm mt-3" id="addAttrTypeBtn">Add New
                                Attribute Type</button>
                            <form id="attrTypeForm" class="mt-3">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="_method" id="attrTypeFormMethod" value="POST">
                                <input type="hidden" name="attr_type_id" id="attrTypeId">
                                <div class="mb-2">
                                    <label for="attrTypeName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="attrTypeName" name="name"
                                        required>
                                    <div class="text-danger" id="attr_type_nameError"></div>
                                </div>
                                <div class="mb-2">
                                    <label for="attrTypeDisplayType" class="form-label">Display Type</label>
                                    <select class="form-select" id="attrTypeDisplayType" name="display_type" required>
                                        <option value="text">Text</option>
                                        <option value="color_picker">Color Picker</option>
                                        <option value="dropdown">Dropdown</option>
                                        <option value="radio">Radio Buttons</option>
                                        <option value="checkbox">Checkboxes</option>
                                    </select>
                                    <div class="text-danger" id="attr_type_display_typeError"></div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Save Attribute Type</button>
                                <button type="button" class="btn btn-secondary btn-sm" id="cancelAttrTypeEditBtn"
                                    style="display:none;">Cancel</button>
                            </form>
                        </div>

                        <div class="col-md-6">
                            <h6>Attribute Values:</h6>
                            <p class="text-muted" id="attrValueContext">Select an Attribute Type to manage its values.</p>
                            <table class="table table-bordered" id="attributeValuesTable" style="display:none;">
                                <thead>
                                    <tr>
                                        <th>Value</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="attributeValuesTableBody">
                                    
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-success btn-sm mt-3" id="addAttrValueBtn"
                                style="display:none;">Add New Value</button>
                            <form id="attrValueForm" class="mt-3" style="display:none;">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="_method" id="attrValueFormMethod" value="POST">
                                <input type="hidden" name="attr_value_id" id="attrValueId">
                                <input type="hidden" name="current_attr_type_id" id="currentAttrTypeIdForValue">
                                <div class="mb-2">
                                    <label for="attrValueValue" class="form-label">Value</label>
                                    <input type="text" class="form-control" id="attrValueValue" name="value"
                                        required>
                                    <div class="text-danger" id="attr_value_valueError"></div>
                                </div>
                                <div class="mb-2" id="attrValueMetadataField" style="display:none;">
                                    <label for="attrValueMetadata" class="form-label">Metadata (JSON)</label>
                                    <input type="text" class="form-control" id="attrValueMetadata" name="metadata"
                                        placeholder='e.g. {"hex_code": "#FF0000"} for colors'>
                                    <div class="text-danger" id="attr_value_metadataError"></div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Save Attribute Value</button>
                                <button type="button" class="btn btn-secondary btn-sm" id="cancelAttrValueEditBtn"
                                    style="display:none;">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="quickAddAttrValueModal" tabindex="-1" aria-labelledby="quickAddAttrValueModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form id="quickAddAttrValueForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="attribute_type_id" id="quickAddAttrTypeId">
                    <div class="modal-header">
                        <h5 class="modal-title" id="quickAddAttrValueModalLabel">Thêm giá trị cho: <span
                                id="quickAddAttrTypeName"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="quickAttrValueValue" class="form-label">Giá trị</label>
                            <input type="text" class="form-control" id="quickAttrValueValue" name="value" required>
                            <div class="text-danger" id="quick_attr_value_valueError"></div>
                        </div>
                        <div class="mb-3" id="quickAttrValueMetadataField" style="display:none;">
                            <label for="quickAttrValueMetadata" class="form-label">Metadata (JSON)</label>
                            <input type="text" class="form-control" id="quickAttrValueMetadata" name="metadata"
                                placeholder='e.g. {"hex_code": "#FF0000"}'>
                            <div class="text-danger" id="quick_attr_value_metadataError"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const variantStoreUrl = "<?php echo e(route('product.variants.store', ['product' => ':product'])); ?>";
        const productStoreUrl = "<?php echo e(route('product.store')); ?>";
        const categoryIndexUrl = "<?php echo e(route('category.index')); ?>";
        const tagIndexUrl = "<?php echo e(route('tag.index')); ?>";
        const attributeTypeIndexUrl = "<?php echo e(route('product_attribute_type.store')); ?>";
        const csrfToken = "<?php echo e(csrf_token()); ?>";

        // Get current URL function
        function getCurrentUrl() {
            return window.location.href.split('?')[0];
        }
        const currentUrl = getCurrentUrl();

        // Hàm sử lý cho hiển thị ảnh sản phẩm chính
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

        // Hàm sử lý cho hiển thị nhiều ảnh
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

        // Hàm sử lý cho hiển thị ảnh sản phẩm đã có
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

        // Tải ảnh sản phẩm đã có
        function loadExistingImages(product) {
            $('#existingImages').empty();
            if (product.images && product.images.length > 0) {
                product.images.forEach(image => {
                    $('#existingImages').append(`
                        <div class="position-relative" data-image-id="${image.id}">
                            <img src="/storage/${image.image_path}" 
                                 class="img-thumbnail" 
                                 style="height: 100px; width: 100px; object-fit: cover;">
                            <button type="button" 
                                    class="btn btn-danger btn-sm position-absolute top-0 end-0"
                                    onclick="deleteProductImage(${image.id})">
                                <i class="fas fa-times"></i>
                            </button>
                            <input type="hidden" name="deleted_image_ids[]" value="${image.id}" disabled>
                        </div>
                    `);
                });
            }
        }

        // Delete product image
        function deleteProductImage(imageId) {
            const imageDiv = $(`#existingImages div[data-image-id="${imageId}"]`);
            imageDiv.addClass('opacity-50');
            imageDiv.find('input[name="deleted_image_ids[]"]').prop('disabled', false);
        }

        // Hàm thiết lập Modal Tạo Biến thể Nhanh
        function setupCreateVariantModal(productId, productName) {
            $('#createVariantForm').trigger('reset');
            $('#createVariantForm').find('.text-danger').text('');
            $('#currentQuickVariantImage').attr('src', '').hide();

            $('#quickVariantProductIdField').val(productId);
            $('#quickVariantProductName').text(productName);

            // GỌI HÀM TẢI THUỘC TÍNH: Bạn cần triển khai hàm này
            loadAttributesForQuickVariantForm(productId);
            $('#quickVariantAttributesSelectionContainer').html(
                '<p class="text-info small">Đang tải cấu hình thuộc tính...</p>');
        }

        function loadAttributesForQuickVariantForm(productId) {
            // Giả định bạn có một endpoint để lấy tất cả thuộc tính/giá trị có thể có
            // hoặc các thuộc tính đã được gán cho sản phẩm đang chỉnh sửa.
            // Tạm thời hiển thị thông báo:
            $('#quickVariantAttributesSelectionContainer').html(
                '<p class="text-info small">Đang tải cấu hình thuộc tính...</p>');

            // **Ví dụ AJAX (Bạn cần điều chỉnh URL và logic xử lý)**
            /*
            $.ajax({
                url: `/api/product-attributes/${productId}`, // Thay thế bằng URL lấy thuộc tính thực tế
                method: 'GET',
                success: function(data) {
                    let html = '';
                    // Logic tạo HTML cho các checkbox/radio/select dựa trên data
                    // Ví dụ: html += generateAttributeHtml(data);
                    $('#quickVariantAttributesSelectionContainer').html(html);
                },
                error: function() {
                    $('#quickVariantAttributesSelectionContainer').html('<p class="text-danger small">Không thể tải cấu hình thuộc tính.</p>');
                }
            });
            */
        }

        function updateQuickVariantDetails() {
            // Logic để kết hợp các giá trị thuộc tính đã chọn thành TÊN và SKU
            let variantName = [];
            let variantSku = $('#quickVariantProductIdField').val() + '-';

            // Ví dụ: Lặp qua các checkbox/radio đã chọn trong #quickVariantAttributesSelectionContainer
            $('#quickVariantAttributesSelectionContainer input:checked').each(function() {
                variantName.push($(this).data('attribute-value-name')); // Giả định có data attribute
                variantSku += $(this).val() + '-'; // Giả định value là ID thuộc tính
            });

            const finalName = variantName.join(' / ');
            const finalSku = variantSku.slice(0, -1); // Xóa dấu '-' cuối cùng

            $('#quickVariantNameDisplay').val(finalName);
            $('#quickVariantNameHidden').val(finalName);
            $('#quickVariantSkuDisplay').val(finalSku);
            $('#quickVariantSkuHidden').val(finalSku);

            // Cập nhật input ẩn chứa các ID giá trị thuộc tính đã chọn
            const selectedAttributeValueIds = $('#quickVariantAttributesSelectionContainer input:checked').map(function() {
                return $(this).val();
            }).get().join(',');
            $('#quickAttributeValueIdsInput').val(selectedAttributeValueIds);
        }

        // Phần xử lý tải và hiển thị danh sách sản phẩm
        $(document).ready(function() {
            // Hình ảnh sản phẩm chính
            $('#productImage').on('change', function() {
                previewMainImage(this);
            });

            // Nhiều hình ảnh sản phẩm
            $('#productImages').on('change', function() {
                previewMultipleImages(this);
            });

            let currentEditingProductId = null;
            let currentProductName = '';
            let allProductVariants = []; // Lưu trữ tất cả biến thể của sản phẩm hiện tại để tìm kiếm
            let currentProductAttributeValueConfigs = [];
            let
                selectedVariantAttrValues = []; // Global array to store selected attribute value IDs for the variant form
            let currentManagingAttrTypeId = null; // Để biết loại thuộc tính nào đang được quản lý trong modal chính

            function updateProductTable(products) {
                // Nếu không có dữ liệu products hợp lệ, load lại products từ server
                if (!products || !Array.isArray(products)) {
                    $.ajax({
                        url: '/product',
                        method: 'GET',
                        success: function(response) {
                            if (response.products) {
                                updateProductTable(response.products);
                                // Nếu đang thêm mới (không có currentEditingProductId)
                                // thì mở modal edit cho sản phẩm vừa thêm
                                if (!currentEditingProductId && response.products.length > 0) {
                                    const latestProduct = response.products[0];
                                    $('.edit-product-btn[data-id="' + latestProduct.id + '"]').click();
                                }
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error loading products:", error);
                        }
                    });
                    return;
                }

                let tableBody = $('#products-table-body');
                tableBody.empty();
                let totalProducts = 0;

                products.forEach(product => {
                    console.log('Processing product:', product); // Debug log
                    totalProducts++;
                    let generalStatus = product.status ? 'Active' : 'Inactive';
                    let generalFeatured = product.is_featured ? 'Yes' : 'No';

                    let imageUrl = product.img ? `/storage/${product.img}` : ``;
                    let imageHtml = product.img ?
                        `<a class="d-block border border-translucent rounded-2" href="#"><img src="${imageUrl}" alt="${product.name}" width="53" /></a>` :
                        `<div class="d-block border border-translucent rounded-2 text-center" style="width:53px; height:53px; line-height:53px;"><i class="fas fa-box text-body-secondary"></i></div>`;

                    let categoriesHtml = '';
                    if (product.categories && product.categories.length > 0) {
                        product.categories.forEach((cat, index) => {
                            categoriesHtml += cat.name;
                            if (index < product.categories.length - 1) {
                                categoriesHtml += ', ';
                            }
                        });
                    } else {
                        categoriesHtml = 'N/A';
                    }

                    let tagsHtml = '';
                    if (product.tags && product.tags.length > 0) {
                        product.tags.forEach(tag => {
                            tagsHtml +=
                                `<a class="text-decoration-none" href="#!"><span class="badge badge-tag me-2 mb-2">${tag.name}</span></a>`;
                        });
                    } else {
                        tagsHtml = `<span>No Tags</span>`;
                    }

                    let priceDisplay = 'N/A';
                    if (product.variants && product.variants.length > 0) {
                        let publicPriceVariants = product.variants.filter(v =>
                            v.pricing_type === 'public_price' && v.price !== null
                        );

                        if (publicPriceVariants.length > 0) {
                            // Sort by price to get min price variant
                            let minPriceVariant = publicPriceVariants.reduce((min, current) =>
                                parseFloat(current.price) < parseFloat(min.price) ? current : min
                            );

                            let formatter = new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND',
                                minimumFractionDigits: 0
                            });

                            if (minPriceVariant.discount_price) {
                                priceDisplay =
                                    `<span>${formatter.format(minPriceVariant.discount_price)}</span><br>
                                              <small class="text-decoration-line-through text-muted">${formatter.format(minPriceVariant.price)}</small>`;
                            } else {
                                priceDisplay = formatter.format(minPriceVariant.price);
                            }
                        } else {
                            priceDisplay = 'Sản phẩm yêu cầu báo giá!';
                        }
                    } else {
                        priceDisplay = 'Chưa có biến thể';
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
                            <td class="product-categories align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                ${categoriesHtml}
                            </td>
                            <td class="product-price align-middle white-space-nowrap text-end fw-bold text-info ps-4">
                                ${priceDisplay}
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

            /**
             * Loads categories for the product modal, showing parent categories in a dropdown
             * and child categories as checkboxes based on the selected parent.
             *
             * @param {Array} selectedProductCategoryIds - Array of category IDs currently associated with the product.
             * @param {boolean} isEditMode - True if the modal is in edit mode, false for add mode.
             */
            // Cập nhật cách gọi `updateHiddenCategoryIds` trong `loadCategoriesForProductModal`
            function loadCategoriesForProductModal(selectedProductCategoryIds = [], isEditMode = false) {
                const parentCategorySelect = $('#parentCategorySelect');
                const childCategoriesCheckboxesContainer = $('#childCategoriesCheckboxesContainer');
                parentCategorySelect.empty().append('<option value="">Select Parent Category</option>');
                childCategoriesCheckboxesContainer.empty().hide();

                // Clear the hidden input for category IDs on fresh load
                $('#selectedCategoryIdsHidden').val('');

                $.ajax({
                    url: "<?php echo e(route('category.index')); ?>",
                    method: 'GET',
                    success: function(response) {
                        const categories = response.categories; // Lưu trữ tất cả categories
                        let parentCategories = categories.filter(cat => cat.parent_id === null);

                        parentCategories.forEach(cat => {
                            parentCategorySelect.append(
                                `<option value="${cat.id}">${cat.name}</option>`
                            );
                        });

                        // If in edit mode, pre-select the correct parent and load its children
                        if (isEditMode && selectedProductCategoryIds.length > 0) {
                            let actualSelectedCategory = null;
                            // Ưu tiên tìm category được chọn có parent_id (là child)
                            actualSelectedCategory = categories.find(cat =>
                                selectedProductCategoryIds.includes(cat.id) && cat.parent_id !==
                                null
                            );

                            if (actualSelectedCategory) {
                                parentCategorySelect.val(actualSelectedCategory.parent_id);
                                // Khi chỉnh sửa, cần truyền `selectedProductCategoryIds` để hàm `loadChildCategories` biết những child nào đang được chọn
                                loadChildCategories(actualSelectedCategory.parent_id, categories,
                                    selectedProductCategoryIds);
                                childCategoriesCheckboxesContainer.show();
                            } else {
                                // Nếu không có child nào được chọn, kiểm tra xem có parent nào được chọn trực tiếp không
                                actualSelectedCategory = categories.find(cat =>
                                    selectedProductCategoryIds.includes(cat.id) && cat.parent_id ===
                                    null
                                );
                                if (actualSelectedCategory) {
                                    parentCategorySelect.val(actualSelectedCategory.id);
                                    // Dù là parent được chọn trực tiếp, vẫn có thể có children ẩn, nên vẫn gọi loadChildCategories
                                    loadChildCategories(actualSelectedCategory.id, categories,
                                        selectedProductCategoryIds);
                                    childCategoriesCheckboxesContainer.show();
                                }
                            }
                        }

                        // Event listener for parent category dropdown change
                        parentCategorySelect.off('change').on('change', function() {
                            const selectedParentId = $(this).val();
                            childCategoriesCheckboxesContainer.empty();
                            $('#category_idsError').text('');

                            // Luôn xóa tất cả các ID đã chọn trong hidden input khi thay đổi parent mới
                            // Sau đó, chúng ta sẽ thêm lại các ID tương ứng
                            updateHiddenCategoryIds(null, false, categories); // Clear all

                            if (selectedParentId) {
                                // Nếu parent được chọn trực tiếp, thêm nó vào hidden input
                                if (selectedProductCategoryIds.includes(parseInt(
                                        selectedParentId))) {
                                    updateHiddenCategoryIds(parseInt(selectedParentId), true,
                                        categories);
                                }
                                loadChildCategories(selectedParentId, categories,
                                    selectedProductCategoryIds);
                                childCategoriesCheckboxesContainer.show();
                            } else {
                                childCategoriesCheckboxesContainer.hide();
                                // Khi không chọn parent nào, đảm bảo hidden input rỗng
                                updateHiddenCategoryIds(null, false, categories);
                            }
                        });

                        // Ban đầu, sau khi load categories, populate hidden input with existing selections
                        // Điều này là cần thiết để đảm bảo các category đã chọn ban đầu (khi edit) được ghi nhận
                        selectedProductCategoryIds.forEach(id => {
                            updateHiddenCategoryIds(id, true, categories);
                        });

                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading categories for product modal:", error);
                    }
                });
            }

            /**
             * Loads child categories as checkboxes for a given parent ID.
             *
             * @param {number} parentId - The ID of the parent category.
             * @param {Array} allCategories - All categories fetched from the backend.
             * @param {Array} selectedProductCategoryIds - Category IDs currently associated with the product.
             */
            // Cập nhật cách gọi `updateHiddenCategoryIds` trong `loadChildCategories`
            function loadChildCategories(parentId, allCategoriesData, selectedProductCategoryIds = []) {
                const childCategoriesCheckboxesContainer = $('#childCategoriesCheckboxesContainer');
                childCategoriesCheckboxesContainer.empty();

                const childCategories = allCategoriesData.filter(cat => cat.parent_id == parentId);

                if (childCategories.length > 0) {
                    childCategories.forEach(cat => {
                        const isChecked = selectedProductCategoryIds.includes(cat.id) ? 'checked' : '';
                        childCategoriesCheckboxesContainer.append(`
                            <div class="form-check me-2">
                                <input class="form-check-input category-checkbox" type="checkbox" name="category_ids[]" value="${cat.id}" id="category-${cat.id}" ${isChecked}>
                                <label class="form-check-label" for="category-${cat.id}">${cat.name}</label>
                            </div>
                        `);
                        // Khi load child categories, nếu nó đã được chọn, hãy đảm bảo parent của nó cũng được thêm
                        if (isChecked) {
                            updateHiddenCategoryIds(cat.id, true, allCategoriesData);
                        }
                    });
                } else {
                    childCategoriesCheckboxesContainer.append(
                        '<p class="text-muted small mt-2">No subcategories for this parent.</p>');
                }

                // Đảm bảo rằng nếu parent category được chọn trực tiếp và không có children
                const isParentCategorySelectedDirectlyAndNoChildren = selectedProductCategoryIds.includes(parseInt(
                    parentId)) && childCategories.length === 0;
                if (isParentCategorySelectedDirectlyAndNoChildren) {
                    updateHiddenCategoryIds(parseInt(parentId), true, allCategoriesData);
                }

                // Attach change listener to newly added child checkboxes
                childCategoriesCheckboxesContainer.off('change', '.category-checkbox').on('change',
                    '.category-checkbox',
                    function() {
                        const categoryId = parseInt($(this).val());
                        if ($(this).is(':checked')) {
                            updateHiddenCategoryIds(categoryId, true,
                                allCategoriesData); // Pass allCategoriesData
                        } else {
                            updateHiddenCategoryIds(categoryId, false,
                                allCategoriesData); // Pass allCategoriesData
                        }
                    });
            }

            /**
             * Updates the hidden input field that holds all selected category IDs.
             * This function is crucial to ensure all selected categories (parent and children)
             * are sent correctly with the form.
             *
             * @param {number|null} categoryId - The ID of the category to add/remove. If null, clear all.
             * @param {boolean} add - True to add, false to remove.
             */
            function updateHiddenCategoryIds(categoryId, add, allCategoriesData) {
                let currentSelectedIds = $('#selectedCategoryIdsHidden').val();
                let selectedIdsArray = currentSelectedIds ? JSON.parse(currentSelectedIds) : [];

                if (categoryId !== null) {
                    if (add) {
                        // Add the current category if it's not already there
                        if (!selectedIdsArray.includes(categoryId)) {
                            selectedIdsArray.push(categoryId);
                        }

                        // Also add its parent if it's a child category and its parent is not already in the list
                        const category = allCategoriesData.find(cat => cat.id === categoryId);
                        if (category && category.parent_id !== null && !selectedIdsArray.includes(category
                                .parent_id)) {
                            selectedIdsArray.push(category.parent_id);
                        }
                    } else {
                        // Remove the current category
                        selectedIdsArray = selectedIdsArray.filter(id => id !== categoryId);

                        // Optional advanced logic: If a parent is deselected, also deselect its children.
                        // This can be complex depending on how you manage multi-selection.
                        // For now, we assume deselecting a child just removes that child.
                        // If you need to remove parent on child deselect, consider if other children are still selected.
                    }
                } else { // If categoryId is null, clear all
                    selectedIdsArray = [];
                }

                // Remove duplicates and sort for consistency (optional)
                selectedIdsArray = [...new Set(selectedIdsArray)].sort((a, b) => a - b);

                $('#selectedCategoryIdsHidden').val(JSON.stringify(selectedIdsArray));
            }

            function loadTagsForProductModal(selectedTagIds = []) {
                $.ajax({
                    url: "<?php echo e(route('tag.index')); ?>",
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

            function loadVariantsForProduct(productId) {
                return $.ajax({ // Return the AJAX promise
                    url: `/product/${productId}/variants`,
                    method: 'GET',
                    success: function(response) {
                        allProductVariants = response.variants; // Store variants globally
                        let variantsTableBody = $('#variantsTableBody');
                        variantsTableBody.empty();

                        // Show/hide the "Add New Variant" button based on variants existence
                        if (response.variants.length === 0) {
                            $('#noVariantsMessage').show();
                            variantsTableBody.append(
                                '<tr><td colspan="9" class="text-center">No variants found. Add a new one.</td></tr>'
                            );
                        } else {
                            $('#noVariantsMessage').hide();
                            response.variants.forEach(variant => {
                                let variantStatus = variant.status ? 'Active' : 'Inactive';
                                let variantFeatured = variant.is_featured ? 'Yes' : 'No';
                                let variantImageUrl = variant.img ? `/storage/${variant.img}` :
                                    '';
                                let variantImageHtml = variant.img ?
                                    `<img src="${variantImageUrl}" alt="${variant.variant_name}" width="50" class="img-thumbnail">` :
                                    `<i class="fas fa-image text-body-secondary"></i>`;

                                let priceHtml;
                                if (variant.pricing_type === 'public_price') {
                                    priceHtml =
                                        `${parseFloat(variant.price).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}`;
                                    if (variant.discount_price) {
                                        priceHtml +=
                                            `<br><small class="text-danger">Giảm: ${parseFloat(variant.discount_price).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</small>`;
                                    }
                                } else {
                                    priceHtml = `Request Quote`;
                                }

                                let variantAttrValuesHtml = '';
                                if (variant.attribute_values && variant.attribute_values
                                    .length > 0) {
                                    variant.attribute_values.forEach(attrValue => {
                                        let attrTypeName = attrValue.attribute_type ?
                                            attrValue.attribute_type.name + ': ' : '';
                                        variantAttrValuesHtml +=
                                            `<span class="badge bg-secondary me-1 mb-1">${attrTypeName}${attrValue.value}</span>`;
                                    });
                                }

                                variantsTableBody.append(`
                                    <tr>
                                        <td>${variant.variant_name}</td>
                                        <td>${variant.sku || 'N/A'}</td>
                                        <td>${variant.pricing_type === 'public_price' ? 'Public Price' : 'Request Quote'}</td>
                                        <td class="text-info">${priceHtml}</td>
                                        <td>${variant.quantity}</td>
                                        <td>${variantImageHtml}</td>
                                        <td>${variantStatus}</td>
                                        <td>${variantFeatured}</td>
                                        <td>
                                            <button class="btn btn-sm btn-info edit-variant-btn" data-id="${variant.id}">Edit</button>
                                            <button class="btn btn-sm btn-danger delete-variant-btn" data-id="${variant.id}">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="9" class="small text-muted ps-5">Biến thể: ${variantAttrValuesHtml || 'None'}</td>
                                    </tr>
                                `);
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading variants:", error);
                        Swal.fire('Error!', 'Failed to load product variants.', 'error');
                        allProductVariants = []; // Reset on error
                    }
                });
            }

            // Tải các cấu hình giá trị thuộc tính cho sản phẩm hiện tại
            function loadProductAttributeValueConfigs(productId) {
                // Return the AJAX promise so .done() can be chained
                return $.ajax({
                    url: `/product/${productId}/attribute-value-configs`, // Route này cần tạo ở backend (đã tạo)
                    method: 'GET',
                    success: function(response) {
                        currentProductAttributeValueConfigs = response.configs; // Lưu trữ các cấu hình
                        console.log("Loaded Attribute Value Configs:",
                            currentProductAttributeValueConfigs);
                    },
                    error: function(xhr, status, error) {
                        console.error("Lỗi khi tải cấu hình giá trị thuộc tính:", error);
                        Swal.fire('Lỗi!', 'Không thể tải cấu hình thuộc tính.', 'error');
                        currentProductAttributeValueConfigs = []; // Đặt lại mảng nếu có lỗi
                    }
                });
            }

            // Hàm mới để kiểm tra và ẩn/hiện các trường chi tiết của biến thể
            function toggleVariantDetailsFields() {
                // Hiển thị các trường chi tiết nếu có ít nhất một thuộc tính được chọn
                if (selectedVariantAttrValues.length > 0) {
                    $('#toggleVariantDetailsBtn').show(); // Hiển thị nút đóng/mở
                    // Nếu đang ở chế độ chỉnh sửa hoặc người dùng đã mở, thì hiển thị nội dung
                    if ($('#variantFormMethod').val() === 'PUT' || $('#variantDetailsFields').is(':visible')) {
                        $('#variantDetailsFields').slideDown();
                    }
                } else {
                    $('#variantDetailsFields').slideUp(); // Ẩn hoàn toàn nếu không có thuộc tính nào được chọn
                    $('#toggleVariantDetailsBtn').hide(); // Ẩn nút đóng/mở
                }
            }


            // =======================================================================
            // NEW LOGIC FOR SHOW/HIDE VARIANT FORM & ATTRIBUTE SELECTION
            // =======================================================================

            // Đặt lại và ẩn biểu mẫu biến thể
            function resetAndHideVariantForm() {
                $('#variantForm').slideUp();
                resetVariantForm();
                $('#saveVariantBtn').text('Lưu biến thể');
            }

            // Đặt lại toàn bộ biểu mẫu biến thể
            function resetVariantForm() {
                // Reset chỉ các lựa chọn thuộc tính và form cấu hình của chúng
                selectedVariantAttrValues = []; // Đảm bảo không có thuộc tính nào được chọn
                $('#attributeValueIdsInput').val(''); // Xóa input ẩn chứa IDs thuộc tính

                // Tải lại các loại thuộc tính nhưng giữ nguyên giá trị form
                loadAttributeTypesForVariantModal([]);

                // Đặt lại ID và phương thức form
                $('#variantFormMethod').val('POST');
                $('#variantId').val('');

                // Xóa lỗi hiển thị
                $('.text-danger').text('');
                $('#cancelEditVariantBtn').hide();
                $('#saveVariantBtn').text('Lưu biến thể mới');

                // KHÔNG reset các trường giá trị, số lượng và trạng thái
            }

            // Điền dữ liệu vào form chi tiết biến thể hoặc reset nếu không tìm thấy
            function populateVariantDetailsForm(variant = null) {
                if (variant) {
                    $('#variantFormMethod').val('PUT');
                    $('#variantId').val(variant.id);
                    $('#variantNameDisplay').val(variant.variant_name);
                    $('#variantNameHidden').val(variant.variant_name);
                    $('#variantSkuDisplay').val(variant.sku);
                    $('#variantSkuHidden').val(variant.sku);
                    $('#variantQuantity').val(variant.quantity);
                    $('#variantStatus').prop('checked', variant.status == 1);
                    $('#variantIsFeatured').prop('checked', variant.is_featured == 1);
                    $('#saveVariantBtn').text('Cập nhật biến thể');

                    if (variant.pricing_type === 'public_price') {
                        $('#pricingTypePublic').prop('checked', true);
                        $('#publicPriceFields').show();
                        $('#variantPrice').val(variant.price);
                        $('#variantDiscountPrice').val(variant.discount_price);
                        $('#variantDiscountPercent').val(variant.discount_percent);
                    } else {
                        $('#pricingTypeQuote').prop('checked', true);
                        $('#publicPriceFields').hide();
                        $('#variantPrice').val('');
                        $('#variantDiscountPrice').val('');
                        $('#variantDiscountPercent').val('');
                    }

                    if (variant.img) {
                        $('#currentVariantImage').attr('src', `/storage/${variant.img}`).show();
                    } else {
                        $('#currentVariantImage').hide().attr('src', '');
                    }
                } else {
                    // Nếu không có biến thể nào khớp hoặc form được reset
                    $('#variantFormMethod').val('POST');
                    $('#variantId').val(''); // Đảm bảo không có ID biến thể cũ

                    // Chỉ reset các giá trị nếu đây là lần đầu mở form
                    if (!$('#variantQuantity').val()) {
                        $('#variantQuantity').val(0);
                        $('#variantStatus').prop('checked', true);
                        $('#variantIsFeatured').prop('checked', false);
                        $('#pricingTypePublic').prop('checked', true);
                        $('#publicPriceFields').show();
                        $('#variantPrice').val('');
                        $('#variantDiscountPrice').val('');
                        $('#variantDiscountPercent').val('');
                    }

                    $('#currentVariantImage').hide().attr('src', '');
                    $('#saveVariantBtn').text('Lưu biến thể mới');
                }
            }

            // Hàm cập nhật giá trị từ biến thể tổng hợp xuống các config
            function updateConfigsFromMasterVariant() {
                // Lấy giá trị từ form tổng hợp
                const price = $('#variantPrice').val() || '';
                const discountPrice = $('#variantDiscountPrice').val() || '';
                const discountPercent = $('#variantDiscountPercent').val() || '';
                const quantity = $('#variantQuantity').val() || '0';
                const isActive = $('#variantStatus').is(':checked');
                const isFeatured = $('#variantIsFeatured').is(':checked');

                // Lấy file hình ảnh từ input file của biến thể tổng hợp
                const masterImageFile = $('#variantImage')[0].files[0];
                const masterImageUrl = $('#currentVariantImage').attr('src');

                // Cập nhật giá trị cho tất cả các config đang hiển thị
                $('.variant-attribute-checkbox:checked').each(function() {
                    const valueId = $(this).val();
                    const configBlock = $(`#config-fields-${valueId}`);

                    if (configBlock.length) {
                        configBlock.find('input[name*="[price]"]').val(price);
                        configBlock.find('input[name*="[discount_price]"]').val(discountPrice);
                        configBlock.find('input[name*="[discount_percent]"]').val(discountPercent);
                        configBlock.find('input[name*="[quantity]"]').val(quantity);
                        configBlock.find('input[name*="[is_active]"]').prop('checked', isActive);
                        configBlock.find('input[name*="[is_featured]"]').prop('checked', isFeatured);

                        // Nếu có file ảnh mới được chọn ở biến thể tổng hợp
                        if (masterImageFile) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                // Cập nhật preview ảnh và xóa ảnh cũ
                                const imgPreview = configBlock.find('img.img-thumbnail');
                                if (imgPreview.length) {
                                    imgPreview.attr('src', e.target.result);
                                } else {
                                    configBlock.find('label[for*="config-image-"]').after(
                                        `<img src="${e.target.result}" alt="Preview" class="img-thumbnail mt-2" style="max-width: 60px;">`
                                    );
                                }
                                // Reset file input và xóa đường dẫn ảnh cũ
                                configBlock.find('input[name*="[current_image_path]"]').val('');
                            };
                            reader.readAsDataURL(masterImageFile);
                        }
                        // Nếu có URL ảnh từ biến thể tổng hợp (khi edit)
                        else if (masterImageUrl && masterImageUrl !== 'undefined') {
                            const imgPreview = configBlock.find('img.img-thumbnail');
                            if (imgPreview.length) {
                                imgPreview.attr('src', masterImageUrl);
                            } else {
                                configBlock.find('label[for*="config-image-"]').after(
                                    `<img src="${masterImageUrl}" alt="Preview" class="img-thumbnail mt-2" style="max-width: 60px;">`
                                );
                            }
                            configBlock.find('input[name*="[current_image_path]"]').val(
                                masterImageUrl.replace('/storage/', '')
                            );
                        }
                    }
                });
            }

            // Tự động tạo Tên biến thể và SKU và tìm biến thể khớp
            function updateVariantNameAndSku() {
                let baseName = currentProductName;
                let selectedAttrValueNames = [];
                let selectedAttrValueSlugs = [];
                let
                    currentSelectedValueIds = []; // Mảng ID của các giá trị thuộc tính hiện đang được chọn                // Lấy các giá trị thuộc tính đã chọn từ các checkbox
                $('#variantAttributesSelectionContainer .variant-attribute-checkbox:checked').each(function() {
                    let valueId = parseInt($(this).val());
                    let valueName = $(this).data('value-name');

                    currentSelectedValueIds.push(valueId);
                    selectedAttrValueNames.push(valueName);
                    selectedAttrValueSlugs.push(valueName.toLowerCase().replace(/\s+/g, '-'));
                });

                // Cập nhật selectedVariantAttrValues toàn cục
                selectedVariantAttrValues = currentSelectedValueIds;
                $('#attributeValueIdsInput').val(JSON.stringify(selectedVariantAttrValues));

                // Kiểm tra xem có phải đang chỉnh sửa biến thể hay không
                const isEditing = $('#variantFormMethod').val() === 'PUT';
                if (isEditing) {
                    // Nếu đang chỉnh sửa, giữ nguyên ID biến thể hiện tại
                    return;
                }

                if (!baseName || selectedAttrValueNames.length === 0) {
                    $('#variantNameDisplay').val('');
                    $('#variantNameHidden').val('');
                    $('#variantSkuDisplay').val('');
                    $('#variantSkuHidden').val('');
                    populateVariantDetailsForm(null); // Reset form chi tiết nếu không có thuộc tính được chọn
                    return;
                }

                selectedAttrValueNames.sort();
                selectedAttrValueSlugs.sort();

                let variantName = baseName;
                if (selectedAttrValueNames.length > 0) {
                    variantName += ' - ' + selectedAttrValueNames.join(', ');
                }

                let sku = baseName.toLowerCase().replace(/\s+/g, '-');
                if (selectedAttrValueSlugs.length > 0) {
                    sku += '-' + selectedAttrValueSlugs.join('-');
                }
                sku = sku.substring(0, 250);

                $('#variantNameDisplay').val(variantName);
                $('#variantNameHidden').val(variantName);
                $('#variantSkuDisplay').val(sku);
                $('#variantSkuHidden').val(sku);

                // --- LOGIC: TÌM KIẾM BIẾN THỂ KHỚP VÀ CẬP NHẬT FORM ---
                // Sắp xếp ID để so sánh chính xác
                const sortedSelectedValueIds = [...currentSelectedValueIds].sort((a, b) => a - b);

                let matchedVariant = null;
                if (allProductVariants.length > 0 && sortedSelectedValueIds.length > 0) {
                    matchedVariant = allProductVariants.find(v => {
                        // Lấy các thuộc tính của biến thể từ DB, sắp xếp để so sánh
                        const variantAttributeValueIds = v.attribute_values.map(av => av.id).sort((a, b) =>
                            a - b);
                        return JSON.stringify(sortedSelectedValueIds) === JSON.stringify(
                            variantAttributeValueIds);
                    });
                }
                // CHỈ GỌI populateVariantDetailsForm TẠI ĐÂY ĐỂ ĐIỀN CÁC TRƯỜNG GIÁ/SỐ LƯỢNG/HÌNH ẢNH CỦA BIẾN THỂ TỔNG HỢP
                // Dựa trên biến thể tìm được (hoặc reset nếu không tìm thấy)
                populateVariantDetailsForm(matchedVariant);

                // --- LOẠI BỎ LOGIC ƯỚC TÍNH GIÁ/SỐ LƯỢNG/HÌNH ẢNH BIẾN THỂ TỔNG HỢP TRỰC TIẾP TẠY ĐÂY ---
                // Logic này sẽ được quản lý hoàn toàn bởi populateVariantDetailsForm(matchedVariant)
                // để tránh ghi đè lên các giá trị thực của biến thể khi chỉnh sửa.
            }

            // Tải các loại thuộc tính và giá trị cho phần chọn thuộc tính của biến thể (Cập nhật)
            function loadAttributeTypesForVariantModal(initialSelectedAttributeValueIds = []) {
                selectedVariantAttrValues = initialSelectedAttributeValueIds;

                $.ajax({
                    url: "<?php echo e(route('product_attribute_type.index')); ?>",
                    method: 'GET',
                    success: function(response) {
                        let attributesContainer = $('#variantAttributesSelectionContainer');
                        attributesContainer.empty();

                        if (response.attributeTypes.length === 0) {
                            attributesContainer.append(
                                '<p class="text-muted small">Chưa có loại thuộc tính nào được định nghĩa. Vui lòng thêm chúng qua modal "Quản lý thuộc tính".</p>'
                            );
                            return;
                        }

                        const allAttributeTypesAndValues = response.attributeTypes;

                        allAttributeTypesAndValues.forEach(attrType => {
                            let attrTypeHtml = `
                                <div class="mb-3 border p-3 rounded">
                                    <div class="d-flex align-items-center mb-2">
                                        <strong class="me-2">${attrType.name}:</strong>
                                        <button type="button" class="btn btn-link btn-sm ms-auto add-attr-value-from-variant-modal" 
                                            data-attr-type-id="${attrType.id}" 
                                            data-attr-type-name="${attrType.name}"
                                            data-attr-display-type="${attrType.display_type}">
                                            <i class="fas fa-plus"></i> Thêm giá trị
                                        </button>
                                    </div>
                                    <div class="d-flex flex-wrap mt-2" data-attribute-type-id="${attrType.id}">
                            `;
                            if (attrType.values && attrType.values.length > 0) {
                                attrType.values.forEach(attrValue => {
                                    let isChecked = initialSelectedAttributeValueIds
                                        .includes(attrValue.id) ? 'checked' : '';
                                    let attrValueName = attrValue.value ? attrValue
                                        .value : 'Giá trị không xác định';

                                    // Tìm dữ liệu cấu hình hiện có cho giá trị thuộc tính này và sản phẩm hiện tại
                                    // currentProductAttributeValueConfigs phải được tải trước khi gọi hàm này
                                    const configData =
                                        currentProductAttributeValueConfigs.find(
                                            config => config
                                            .product_attribute_value_id === attrValue
                                            .id &&
                                            config.product_id ===
                                            currentEditingProductId
                                        );

                                    // Tạo HTML cho checkbox/radio
                                    attrTypeHtml += `
                                        <div class="form-check form-check-inline me-3">
                                            <input class="form-check-input variant-attribute-checkbox" type="checkbox"
                                                value="${attrValue.id}" id="select-attr-value-${attrValue.id}" ${isChecked}
                                                data-value-name="${attrValueName}" data-type-id="${attrType.id}">
                                            <label class="form-check-label" for="select-attr-value-${attrValue.id}">${attrValueName}</label>
                                        </div>
                                    `;
                                    // Chèn khối config ngay sau checkbox/label (cùng div cha)
                                    attrTypeHtml += `
                                        <div id="config-wrapper-${attrValue.id}" style="${isChecked ? '' : 'display:none;'}">
                                            ${renderAttributeValueConfigFields(attrValue, configData)}
                                        </div>
                                    `;
                                });
                            } else {
                                attrTypeHtml +=
                                    `<p class="text-muted small">Không có giá trị nào được định nghĩa cho loại thuộc tính này.</p>`;
                            }
                            attrTypeHtml += `
                                    </div>
                                </div>
                            `;
                            attributesContainer.append(attrTypeHtml);
                        });

                        // Gắn trình nghe thay đổi cho các checkbox của thuộc tính biến thể
                        attributesContainer.off('change', '.variant-attribute-checkbox').on('change',
                            '.variant-attribute-checkbox',
                            function() {
                                let selectedValueId = parseInt($(this).val());
                                let attributeTypeId = parseInt($(this).data('type-id'));

                                // Hiển thị/ẩn khối cấu hình riêng cho checkbox này
                                $(`#config-wrapper-${selectedValueId}`).slideToggle();

                                if ($(this).is(':checked')) {
                                    // Bỏ chọn tất cả các checkbox khác cùng loại thuộc tính
                                    // $(`div[data-attribute-type-id="${attributeTypeId}"] .variant-attribute-checkbox`)
                                    //     .not(this).prop('checked', false);
                                    // Ẩn các khối cấu hình của các checkbox vừa bị bỏ chọn
                                    // $(`div[data-attribute-type-id="${attributeTypeId}"] .variant-attribute-checkbox`)
                                    //     .not(this).each(function() {
                                    //         $(`#config-wrapper-${$(this).val()}`).slideUp();
                                    //     });

                                    $(`#config-wrapper-${selectedValueId}`).slideDown();


                                    // Cập nhật `selectedVariantAttrValues`: loại bỏ giá trị cũ của loại thuộc tính này (nếu có)
                                    selectedVariantAttrValues = selectedVariantAttrValues.filter(
                                        valId => {
                                            const valObj = allAttributeTypesAndValues.flatMap(
                                                type => type.values).find(v => v.id ===
                                                valId);
                                            return !valObj || (valObj.attribute_type && valObj
                                                .attribute_type.id !== attributeTypeId
                                            ); // Kiểm tra an toàn
                                        });
                                    selectedVariantAttrValues.push(
                                        selectedValueId); // Thêm giá trị mới được chọn
                                } else {
                                    $(`#config-wrapper-${selectedValueId}`).slideUp();
                                    // Nếu bỏ chọn, chỉ loại bỏ giá trị đó khỏi mảng
                                    selectedVariantAttrValues = selectedVariantAttrValues.filter(
                                        val => val !== selectedValueId);
                                }

                                // Cập nhật input ẩn và tên/SKU biến thể (sẽ trigger tìm kiếm biến thể khớp và điền form)
                                $('#attributeValueIdsInput').val(JSON.stringify(
                                    selectedVariantAttrValues));
                                updateVariantNameAndSku();
                            });

                        updateVariantNameAndSku(); // Cập nhật tên/SKU lần đầu sau khi tải thuộc tính
                    },
                    error: function(xhr, status, error) {
                        console.error("Lỗi khi tải các loại thuộc tính và giá trị cho modal biến thể:",
                            error);
                        Swal.fire('Lỗi!', 'Không thể tải thuộc tính biến thể.', 'error');
                    }
                });
            }

            // Function to update the display of selected attributes in the main variant form
            function updateSelectedAttributesDisplay() {
                let container = $('#selectedVariantAttributesContainer');
                container.empty();
                $('#noAttrsSelectedText').remove();

                if (selectedVariantAttrValues.length === 0) {
                    container.append(
                        '<p class="text-muted small" id="noAttrsSelectedText">No attributes selected.</p>');
                    $('#attributeValueIdsInput').val('');
                    updateVariantNameAndSku();
                    return;
                }

                let uniqueSelectedIds = [...new Set(selectedVariantAttrValues)];

                $.ajax({
                    url: `/product-attribute-values/get-by-ids`,
                    method: 'POST',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        ids: uniqueSelectedIds
                    },
                    success: function(response) {
                        if (response.attributeValues.length > 0) {
                            response.attributeValues.forEach(attrValue => {
                                let attrTypeName = attrValue.attribute_type ? attrValue
                                    .attribute_type.name + ': ' : '';
                                container.append(
                                    `<span class="badge bg-primary me-1 mb-1">${attrTypeName}${attrValue.value}</span>`
                                );
                            });
                        } else {
                            container.append(
                                '<p class="text-muted small" id="noAttrsSelectedText">No attributes selected.</p>'
                            );
                        }
                        $('#attributeValueIdsInput').val(JSON.stringify(uniqueSelectedIds));
                        updateVariantNameAndSku();
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading selected attribute details for display:", error);
                        container.append(
                            `<span class="badge bg-danger me-1 mb-1">Error loading attributes</span>`
                        );
                        $('#attributeValueIdsInput').val(''); // Clear on error
                        updateVariantNameAndSku();
                    }
                });
            }

            // Load attribute values for a specific type in the main attribute modal
            function loadAttributeValuesForManageModal(attrTypeId) {
                $.ajax({
                    url: `/product-attribute-types/${attrTypeId}/values`, // Route to get attribute values for a type
                    method: 'GET',
                    success: function(response) {
                        let tableBody = $('#attributeValuesTableBody');
                        tableBody.empty();
                        if (response.attributeValues.length === 0) {
                            tableBody.append(
                                '<tr><td colspan="2" class="text-center">No values found.</td></tr>'
                            );
                        } else {
                            response.attributeValues.forEach(value => {
                                tableBody.append(`
                                    <tr>
                                        <td>${value.value}</td>
                                        <td>
                                            <button class="btn btn-sm btn-info edit-attr-value-btn" data-id="${value.id}" data-type-id="${value.attribute_type_id}">Edit</button>
                                            <button class="btn btn-sm btn-danger delete-attr-value-btn" data-id="${value.id}" data-type-id="${value.attribute_type_id}">Delete</button>
                                        </td>
                                    </tr>
                                `);
                            });
                        }
                        // Reset form
                        $('#attrValueForm')[0].reset();
                        $('#attrValueFormMethod').val('POST');
                        $('#attrValueId').val('');
                        $('#currentAttrTypeIdForValue').val(attrTypeId);
                        $('#cancelAttrValueEditBtn').hide();
                        $('.text-danger').text('');
                        $('#attrValueForm').hide(); // Hide form initially
                        $('#addAttrValueBtn').show(); // Show add button
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading attribute values for manage modal:", error);
                    }
                });
            }

            // ===============================================
            // Product CRUD (Add/Edit/Save/Delete)
            // ===============================================

            // Handle "Add Product" button click
            $('#addProductBtn').on('click', function() {
                // Reset form và trạng thái
                $('#productModalLabel').text('Add New Product');
                $('#productForm')[0].reset();
                $('#formMethod').val('POST');
                $('#productId').val('');
                $('#currentProductImage').hide().attr('src', '');

                // Clear all preview images
                $('#multipleImagesPreview').empty();
                $('#existingImages').empty();

                // Reset hidden inputs
                $('#selectedCategoryIdsHidden').val('[]');

                // Set default values
                $('#productStatus').prop('checked', true);
                $('#productIsFeatured').prop('checked', false);

                // Reset các phần động
                loadCategoriesForProductModal([], false);
                loadTagsForProductModal([]);

                // Clear all error messages
                $('.text-danger').text('');

                // Hide variant management section for new product
                $('#variantManagementSection').hide();
                currentEditingProductId = null;

                // Reset các biến global liên quan
                allProductVariants = [];
                currentProductAttributeValueConfigs = [];
                selectedVariantAttrValues = [];

                // Show modal
                $('#productModal').modal('show');
            });

            // THÊM: Xử lý sự kiện khi click nút "Create Variant"
            $('#createVariantBtn').on('click', function() {
                let productId = $('#productId').val();
                const productName = $('#productName').val();

                if (!productId) {
                    // 🌟 Xử lý khi chưa có ID sản phẩm (Thêm mới)

                    // Đặt cờ trạng thái chờ vào form sản phẩm
                    $('#productForm').data('pending-action', 'create_variant');

                    // Hiển thị loading và tự động submit
                    Swal.fire({
                        title: 'Đang lưu sản phẩm...',
                        text: 'Hệ thống đang lưu thông tin sản phẩm cơ bản để tạo biến thể.',
                        icon: 'info',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        willOpen: () => {
                            Swal.showLoading(); // Hiệu ứng loading
                            // 🌟 Tự động submit form sản phẩm cơ bản, form submit này sẽ bị chặn bởi AJAX handler ở bước 2
                            $('#productForm').submit();
                        }
                    });

                    return;
                }

                // Xử lý khi đã có ID sản phẩm (Chỉnh sửa)
                $('#productModal').modal('hide');
                // Đảm bảo hàm này đã được định nghĩa
                if (typeof setupCreateVariantModal === 'function') {
                    setupCreateVariantModal(productId, productName);
                    $('#createVariantQuickModal').modal('show');
                }
            });

            $('#productForm').on('submit', function(e) {
                e.preventDefault();

                const isPendingAction = $(this).data('pending-action') === 'create_variant';
                const id = $('#productId').val();
                const formMethod = id ? 'PUT' : 'POST'; // Sử dụng PUT cho update, POST cho create
                const url = id ? `/product/${id}` : '/product';
                console.log('Submit URL:', url, 'Method:', formMethod);

                const formData = new FormData(this);

                // Set correct HTTP method for updates
                if (id) {
                    formData.append('_method', 'PUT'); // Use PUT for updates
                }

                // Always include status and is_featured
                formData.append('status', $('#productStatus').is(':checked') ? '1' : '0');
                formData.append('is_featured', $('#productIsFeatured').is(':checked') ? '1' : '0');

                // Nếu không phải trạng thái chờ, hiển thị loading bình thường
                if (!isPendingAction) {
                    Swal.fire({
                        title: 'Đang xử lý...',
                        text: 'Vui lòng chờ',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading()
                        }
                    });
                }

                // Xóa tất cả thông báo lỗi cũ 
                $('.text-danger').text('');

                // Thu thập tất cả category IDs
                const selectedCategoryIds = [];

                // 1. Lấy parent category nếu được chọn
                const parentCategoryId = $('#parentCategorySelect').val();
                if (parentCategoryId) {
                    selectedCategoryIds.push(parseInt(parentCategoryId));
                    console.log('Selected parent category:', parentCategoryId);
                }

                // 2. Lấy child categories đã chọn
                $('.category-checkbox:checked').each(function() {
                    selectedCategoryIds.push(parseInt($(this).val()));
                });
                console.log('All selected categories:', selectedCategoryIds);

                // Xóa category_ids cũ nếu có
                formData.delete('category_ids[]');

                // Thêm tất cả category IDs vào formData
                selectedCategoryIds.forEach(id => {
                    formData.append('category_ids[]', id);
                });

                // Log formData để debug
                console.log('FormData categories:');
                for (var pair of formData.entries()) {
                    if (pair[0].includes('category')) {
                        console.log(pair[0] + ': ' + pair[1]);
                    }
                }

                // Lấy selected tags từ checkboxes
                const selectedTags = $('input[name="tags[]"]:checked').map(function() {
                    return $(this).val();
                }).get();
                // Xóa tags cũ nếu có
                formData.delete('tags[]');
                // Thêm từng tag ID vào formData
                selectedTags.forEach(tagId => {
                    formData.append('tags[]', tagId);
                });

                $.ajax({
                    url: url, // Sử dụng url đã tạo ở trên thay vì currentUrl
                    method: 'POST', // Vẫn giữ POST vì đang dùng FormData với _method
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(response) {
                        Swal.close(); // Đóng loading (cả loading tự động và loading chờ)

                        // 🌟 LOGIC QUAN TRỌNG ĐÃ CÓ TRONG PHÂN TÍCH TRƯỚC:
                        const newProductId = response.product_id;
                        const newProductName = response.name || $('#productName')
                            .val(); // Lấy tên nếu server không trả về

                        // Cập nhật ID mới (chuyển sang chế độ chỉnh sửa)
                        $('#productId').val(newProductId);

                        if (isPendingAction) {
                            // Xử lý tự động mở Modal Biến thể sau khi lưu thành công
                            $('#productForm').removeData('pending-action');
                            toastr.success(
                                'Lưu sản phẩm thành công! Đang chuyển sang thêm biến thể.');

                            $('#productModal').modal('hide');
                            setupCreateVariantModal(newProductId, newProductName);
                            $('#productModal').modal('show');
                        } else {
                            // Xử lý lưu bình thường và chờ user xác nhận trước khi tắt modal
                            Swal.fire({
                                title: 'Thành công!',
                                text: response.success,
                                icon: 'success',
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $('#productModal').modal('hide');
                                    updateProductTable(response.products);
                                }
                            });
                        }
                    },

                    error: function(xhr) {
                        Swal.close(); // Đóng loading
                        $('#productForm').removeData('pending-action');
                        // ... Logic xử lý hiển thị lỗi validation ...
                        Swal.fire('Lỗi!',
                            'Lưu sản phẩm không thành công. Vui lòng kiểm tra các trường bắt buộc.',
                            'error');
                    }
                });
            });

            $(document).on('change', '#quickVariantAttributesSelectionContainer input', function() {
                updateQuickVariantDetails();
            });

            // Xử lý sự kiện khi submit form tạo biến thể nhanh
            $('#createVariantForm').on('submit', function(e) {
                e.preventDefault();

                const productId = $('#quickVariantProductIdField').val();
                const url = variantStoreUrl.replace(':product', productId);
                const formData = new FormData(this);
                const $btn = $('#saveQuickVariantBtn');

                $btn.prop('disabled', true).html(
                    '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>Đang lưu...'
                );
                $('#createVariantForm').find('.text-danger').text('');

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $btn.prop('disabled', false).html('Lưu biến thể mới');
                        $('#createVariantQuickModal').modal('hide');
                        Swal.fire('Thành công!', response.success, 'success');

                        // Sau khi tạo biến thể thành công, mở lại productModal và tải lại variants
                        $('#productModal').modal('show');
                        if (typeof loadVariantsForProduct === 'function') {
                            loadVariantsForProduct(productId);
                        }
                    },
                    error: function(xhr) {
                        $btn.prop('disabled', false).html('Lưu biến thể mới');
                        const errors = xhr.responseJSON.errors;
                        if (errors) {
                            $.each(errors, function(key, value) {
                                $(`#quick_${key}Error`).text(value[0]);
                            });
                        } else {
                            Swal.fire('Lỗi!', xhr.responseJSON.error ||
                                'Đã xảy ra lỗi khi lưu biến thể.', 'error');
                        }
                    }
                });
            });

            // THÊM: Xử lý sự kiện hiển thị ảnh biến thể nhanh
            $('#quickVariantImage').on('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#currentQuickVariantImage')
                            .attr('src', e.target.result)
                            .css('display', 'block');
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            // THÊM: Xử lý logic hiển thị/ẩn trường giá theo loại giá cho form quick
            $('input[name="pricing_type"]').on('change', function() {
                if ($('#quickPricingTypePublic').is(':checked')) {
                    $('#quickPublicPriceFields').show();
                } else {
                    $('#quickPublicPriceFields').hide();
                }
            }).trigger('change'); // Kích hoạt lần đầu để thiết lập trạng thái ban đầu

            // Handle "Edit Product" button click
            $(document).on('click', '.edit-product-btn', function() {
                let id = $(this).data('id');
                currentEditingProductId = id; // Lưu ID sản phẩm đang chỉnh sửa

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
                            $('#currentProductImage').attr('src', `/storage/${product.img}`)
                                .show();
                        } else {
                            $('#currentProductImage').hide().attr('src', '');
                        }

                        // Truyền tham số `true` cho chế độ chỉnh sửa
                        loadCategoriesForProductModal(productCategoryIds, true);
                        loadTagsForProductModal(productTagIds);

                        $('#variantManagementSection').show(); // Hiện phần quản lý biến thể
                        $('#createVariantBtnContainer').hide();
                        $('#productModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching product for edit:", error);
                        console.error("Response Text:", xhr.responseText);
                        Swal.fire('Error!',
                            'Failed to load product details. Check console for more info.',
                            'error');
                    }
                });
            });

            // Handle form submission (Add/Edit Variant)
            $('#variantForm').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let variantId = $('#variantId').val();
                let productId = $('#variantProductIdField').val();
                let method = $('#variantFormMethod').val();
                let url = method === 'POST' ? `/product/${productId}/variants` :
                    `/product-variant/${variantId}`;

                $('.text-danger').text('');

                // SỬA ĐOẠN NÀY ĐỂ attribute_value_ids ĐƯỢC GỬI DƯỚI DẠNG MẢNG ĐÚNG CÁCH
                // Xóa trường attribute_value_ids cũ nếu đã tồn tại trong formData
                if (formData.has('attribute_value_ids')) {
                    formData.delete('attribute_value_ids');
                }
                // Thêm từng ID riêng lẻ vào formData dưới dạng mảng
                // Laravel sẽ parse 'attribute_value_ids[]' thành một mảng
                selectedVariantAttrValues.forEach(function(id) {
                    formData.append('attribute_value_ids[]', id);
                });
                // Nếu mảng rỗng, không append gì cả, Laravel sẽ coi đó là mảng rỗng hợp lệ (hoặc nullable)

                // Hoặc nếu bạn muốn luôn gửi nó là một mảng JSON string,
                // bạn cần Laravel giải mã nó ở backend.
                // formData.set('attribute_value_ids', JSON.stringify(selectedVariantAttrValues)); // <-- CÁCH CŨ GÂY LỖI

                // Nếu là PUT, cần đảm bảo _method là PUT (đã có)
                // formData.append('_method', method); // Không cần nếu đã có <input type="hidden" name="_method">

                $.ajax({
                    url: url,
                    method: 'POST', // Luôn là POST với FormData, Laravel sẽ xử lý _method
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire('Success!', response.success, 'success');
                        loadVariantsForProduct(productId);
                        resetVariantForm();
                        updateProductTable(response.products);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", xhr.responseText);
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            for (let field in errors) {
                                let errorId = field.replace('.', '_') + 'Error';
                                $(`#${errorId}`).text(errors[field][0]);
                            }
                        } else {
                            Swal.fire('Error!', xhr.responseJSON.error ||
                                'Something went wrong.', 'error');
                        }
                    }
                });
            });

            // Handle "Delete Product" button click
            $(document).on('click', '.delete-product-btn', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this! All variants of this product will also be deleted.",
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
                                _token: '<?php echo e(csrf_token()); ?>'
                            },
                            success: function(response) {
                                Swal.fire('Deleted!', response.success, 'success');
                                updateProductTable(response
                                    .products); // Cập nhật lại bảng sản phẩm
                            },
                            error: function(xhr, status, error) {
                                console.error("Error deleting product:", error);
                                Swal.fire('Error!', xhr.responseJSON.error ||
                                    'Failed to delete product.', 'error');
                            }
                        });
                    }
                });
            });

            // Hàm tạo HTML cho các trường nhập liệu cấu hình của một giá trị thuộc tính
            function renderAttributeValueConfigFields(attributeValue, configData = null) {
                const configBlockId = `config-fields-${attributeValue.id}`;

                let configId = configData ? configData.id : '';
                let price = configData ? (configData.price || '') : '';
                let discountPrice = configData ? (configData.discount_price || '') : '';
                let discountPercent = configData ? (configData.discount_percent || '') : '';
                let quantity = configData ? (configData.quantity || 0) : 0;
                let imagePath = configData ? (configData.img_path || '') : ''; // Sử dụng img_path từ DB
                let isActive = configData ? (configData.is_active == 1 ? 'checked' : '') : 'checked';
                let isFeatured = configData ? (configData.is_featured == 1 ? 'checked' : '') : '';

                let currentImageHtml = imagePath ?
                    `<img src="/storage/${imagePath}" alt="Ảnh hiện tại" class="img-thumbnail mt-2" style="max-width: 60px;">` :
                    '';

                // Thêm kiểm tra an toàn cho attribute_type.name
                const attributeTypeName = attributeValue.attribute_type ? attributeValue.attribute_type.name : '';

                return `
                    <div class="attribute-value-config-fields p-3 mt-2 border rounded" id="${configBlockId}">
                        <h6>Cấu hình giá trị " ${attributeValue.value} " ${attributeTypeName}</h6>
                        <input type="hidden" name="configs[${attributeValue.id}][id]" value="${configId}">
                        <input type="hidden" name="configs[${attributeValue.id}][product_attribute_value_id]" value="${attributeValue.id}">
                        <input type="hidden" name="configs[${attributeValue.id}][product_id]" value="${currentEditingProductId}">
                        
                        <div class="mb-2">
                            <label for="config-price-${attributeValue.id}" class="form-label small">Giá</label>
                            <input type="number" step="0.01" class="form-control form-control-sm" id="config-price-${attributeValue.id}" name="configs[${attributeValue.id}][price]" value="${price}" placeholder="Vui lòng nhập giá gốc sản phẩm">
                            <div class="text-danger" id="config-price-error-${attributeValue.id}"></div>
                        </div>
                        <div class="mb-2">
                            <label for="config-discount-price-${attributeValue.id}" class="form-label small">Giá giảm</label>
                            <input type="number" step="0.01" class="form-control form-control-sm" id="config-discount-price-${attributeValue.id}" name="configs[${attributeValue.id}][discount_price]" value="${discountPrice}" placeholder="Vui lòng nhập giá giảm sản phẩm">
                            <div class="text-danger" id="config-discount-price-error-${attributeValue.id}"></div>
                        </div>
                        <div class="mb-2">
                            <label for="config-discount-percent-${attributeValue.id}" class="form-label small">Phần trăm giảm (%)</label>
                            <input type="number" class="form-control form-control-sm" id="config-discount-percent-${attributeValue.id}" name="configs[${attributeValue.id}][discount_percent]" value="${discountPercent}" min="0" max="100" placeholder="Vui lòng nhập phần trăm giảm">
                            <div class="text-danger" id="config-discount-percent-error-${attributeValue.id}"></div>
                        </div>
                        <div class="mb-2">
                            <label for="config-quantity-${attributeValue.id}" class="form-label small">Số lượng</label>
                            <input type="number" class="form-control form-control-sm" id="config-quantity-${attributeValue.id}" name="configs[${attributeValue.id}][quantity]" value="${quantity}" min="0">
                            <div class="text-danger" id="config-quantity-error-${attributeValue.id}"></div>
                        </div>
                        <div class="mb-2">
                            <label for="config-image-${attributeValue.id}" class="form-label small">Hình ảnh</label>
                            <input type="file" class="form-control-sm form-control" id="config-image-${attributeValue.id}" name="configs[${attributeValue.id}][image_file]">
                            ${currentImageHtml}
                            <input type="hidden" name="configs[${attributeValue.id}][current_image_path]" value="${imagePath}">
                            <div class="text-danger" id="config-image-error-${attributeValue.id}"></div>
                        </div>
                        <div class="form-check form-check-inline mb-1">
                            <input class="form-check-input" type="checkbox" id="config-active-${attributeValue.id}" name="configs[${attributeValue.id}][is_active]" value="1" ${isActive}>
                            <label class="form-check-label small" for="config-active-${attributeValue.id}">Hoạt động</label>
                        </div>
                        <div class="form-check form-check-inline mb-1">
                            <input class="form-check-input" type="checkbox" id="config-featured-${attributeValue.id}" name="configs[${attributeValue.id}][is_featured]" value="1" ${isFeatured}>
                            <label class="form-check-label small" for="config-featured-${attributeValue.id}">Nổi bật</label>
                        </div>
                    </div>
                `;
            }

            // Tải các loại thuộc tính và giá trị, tạo các khối nhập liệu riêng cho từng giá trị
            function loadAttributeTypesForVariantModal(initialSelectedAttributeValueIds = []) {
                // selectedVariantAttrValues sẽ được cập nhật bởi sự kiện change
                // currentProductAttributeValueConfigs phải được tải trước khi gọi hàm này

                $.ajax({
                    url: "<?php echo e(route('product_attribute_type.index')); ?>", // Route này cần trả về attributeTypes kèm theo values của chúng
                    method: 'GET',
                    success: function(response) {
                        let attributesContainer = $('#variantAttributesSelectionContainer');
                        attributesContainer.empty();

                        if (response.attributeTypes.length === 0) {
                            attributesContainer.append(
                                '<p class="text-muted small">Chưa có loại thuộc tính nào được định nghĩa. Vui lòng thêm chúng qua modal "Quản lý thuộc tính".</p>'
                            );
                            return;
                        }

                        const allAttributeTypesAndValues = response.attributeTypes;

                        allAttributeTypesAndValues.forEach(attrType => {
                            let attrTypeHtml = `
                                <div class="mb-3 border p-3 rounded">
                                    <div class="d-flex align-items-center mb-2">
                                        <strong class="me-2">${attrType.name}:</strong>
                                        <button type="button" class="btn btn-link btn-sm ms-auto add-attr-value-from-variant-modal" 
                                            data-attr-type-id="${attrType.id}" 
                                            data-attr-type-name="${attrType.name}"
                                            data-attr-display-type="${attrType.display_type}">
                                            <i class="fas fa-plus"></i> Thêm giá trị
                                        </button>
                                    </div>
                                    <div class="d-flex flex-wrap mt-2" data-attribute-type-id="${attrType.id}">
                            `;
                            if (attrType.values && attrType.values.length > 0) {
                                attrType.values.forEach(attrValue => {
                                    let isChecked = initialSelectedAttributeValueIds
                                        .includes(attrValue.id) ? 'checked' : '';
                                    let attrValueName = attrValue.value ? attrValue
                                        .value : 'Giá trị không xác định';

                                    // Tìm dữ liệu cấu hình hiện có cho giá trị thuộc tính này và sản phẩm hiện tại
                                    // currentProductAttributeValueConfigs phải được tải trước khi gọi hàm này
                                    const configData =
                                        currentProductAttributeValueConfigs.find(
                                            config => config
                                            .product_attribute_value_id === attrValue
                                            .id &&
                                            config.product_id ===
                                            currentEditingProductId
                                        );

                                    // Tạo HTML cho checkbox/radio
                                    attrTypeHtml += `
                                        <div class="form-check form-check-inline me-3">
                                            <input class="form-check-input variant-attribute-checkbox" type="checkbox"
                                                value="${attrValue.id}" id="select-attr-value-${attrValue.id}" ${isChecked}
                                                data-value-name="${attrValueName}" data-type-id="${attrType.id}">
                                            <label class="form-check-label" for="select-attr-value-${attrValue.id}">${attrValueName}</label>
                                        </div>
                                    `;
                                    // Chèn khối config ngay sau checkbox/label (cùng div cha)
                                    attrTypeHtml += `
                                        <div id="config-wrapper-${attrValue.id}" style="${isChecked ? '' : 'display:none;'}">
                                            ${renderAttributeValueConfigFields(attrValue, configData)}
                                        </div>
                                    `;
                                });
                            } else {
                                attrTypeHtml +=
                                    `<p class="text-muted small">Không có giá trị nào được định nghĩa cho loại thuộc tính này.</p>`;
                            }
                            attrTypeHtml += `
                                    </div>
                                </div>
                            `;
                            attributesContainer.append(attrTypeHtml);
                        });

                        // Gắn trình nghe thay đổi cho các checkbox của thuộc tính biến thể
                        attributesContainer.off('change', '.variant-attribute-checkbox').on('change',
                            '.variant-attribute-checkbox',
                            function() {
                                let selectedValueId = parseInt($(this).val());
                                let attributeTypeId = parseInt($(this).data('type-id'));

                                // Hiển thị/ẩn khối cấu hình riêng cho checkbox này
                                $(`#config-wrapper-${selectedValueId}`).slideToggle();

                                if ($(this).is(':checked')) {
                                    // Bỏ chọn tất cả các checkbox khác cùng loại thuộc tính
                                    // $(`div[data-attribute-type-id="${attributeTypeId}"] .variant-attribute-checkbox`)
                                    //     .not(this).prop('checked', false);
                                    // Ẩn các khối cấu hình của các checkbox vừa bị bỏ chọn
                                    // $(`div[data-attribute-type-id="${attributeTypeId}"] .variant-attribute-checkbox`)
                                    //     .not(this).each(function() {
                                    //         $(`#config-wrapper-${$(this).val()}`).slideUp();
                                    //     });

                                    $(`#config-wrapper-${selectedValueId}`).slideDown();

                                    // Cập nhật `selectedVariantAttrValues`: loại bỏ giá trị cũ của loại thuộc tính này (nếu có)
                                    selectedVariantAttrValues = selectedVariantAttrValues.filter(
                                        valId => {
                                            const valObj = allAttributeTypesAndValues.flatMap(
                                                type => type.values).find(v => v.id ===
                                                valId);
                                            return !valObj || (valObj.attribute_type && valObj
                                                .attribute_type.id !== attributeTypeId
                                            ); // Kiểm tra an toàn
                                        });
                                    selectedVariantAttrValues.push(
                                        selectedValueId); // Thêm giá trị mới được chọn
                                } else {
                                    $(`#config-wrapper-${selectedValueId}`).slideUp();
                                    // Nếu bỏ chọn, chỉ loại bỏ giá trị đó khỏi mảng
                                    selectedVariantAttrValues = selectedVariantAttrValues.filter(
                                        val => val !== selectedValueId);
                                }

                                // Cập nhật input ẩn và tên/SKU biến thể (sẽ trigger tìm kiếm biến thể khớp và điền form)
                                $('#attributeValueIdsInput').val(JSON.stringify(
                                    selectedVariantAttrValues));
                                updateVariantNameAndSku();
                            });

                        updateVariantNameAndSku(); // Cập nhật tên/SKU lần đầu sau khi tải thuộc tính
                    },
                    error: function(xhr, status, error) {
                        console.error("Lỗi khi tải các loại thuộc tính và giá trị cho modal biến thể:",
                            error);
                        Swal.fire('Lỗi!', 'Không thể tải thuộc tính biến thể.', 'error');
                    }
                });
            }

            // Function to update the display of selected attributes in the main variant form
            function updateSelectedAttributesDisplay() {
                let container = $('#selectedVariantAttributesContainer');
                container.empty();
                $('#noAttrsSelectedText').remove();

                if (selectedVariantAttrValues.length === 0) {
                    container.append(
                        '<p class="text-muted small" id="noAttrsSelectedText">No attributes selected.</p>');
                    $('#attributeValueIdsInput').val('');
                    updateVariantNameAndSku();
                    return;
                }

                let uniqueSelectedIds = [...new Set(selectedVariantAttrValues)];

                $.ajax({
                    url: `/product-attribute-values/get-by-ids`,
                    method: 'POST',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        ids: uniqueSelectedIds
                    },
                    success: function(response) {
                        if (response.attributeValues.length > 0) {
                            response.attributeValues.forEach(attrValue => {
                                let attrTypeName = attrValue.attribute_type ? attrValue
                                    .attribute_type.name + ': ' : '';
                                container.append(
                                    `<span class="badge bg-primary me-1 mb-1">${attrTypeName}${attrValue.value}</span>`
                                );
                            });
                        } else {
                            container.append(
                                '<p class="text-muted small" id="noAttrsSelectedText">No attributes selected.</p>'
                            );
                        }
                        $('#attributeValueIdsInput').val(JSON.stringify(uniqueSelectedIds));
                        updateVariantNameAndSku();
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading selected attribute details for display:", error);
                        container.append(
                            `<span class="badge bg-danger me-1 mb-1">Error loading attributes</span>`
                        );
                        $('#attributeValueIdsInput').val(''); // Clear on error
                        updateVariantNameAndSku();
                    }
                });
            }


            // Load attribute types and values for the main attribute modal
            function loadAttributeTypesForManageModal() {
                $.ajax({
                    url: "<?php echo e(route('product_attribute_type.index')); ?>",
                    method: 'GET',
                    success: function(response) {
                        let tableBody = $('#attributeTypesTableBody');
                        tableBody.empty();
                        if (response.attributeTypes.length === 0) {
                            tableBody.append(
                                '<tr><td colspan="3" class="text-center">No attribute types found.</td></tr>'
                            );
                        } else {
                            response.attributeTypes.forEach(type => {
                                tableBody.append(`
                                    <tr>
                                        <td><a href="#" class="select-attr-type-to-manage-values" data-id="${type.id}" data-name="${type.name}" data-display-type="${type.display_type}">${type.name}</a></td>
                                        <td>${type.display_type}</td>
                                        <td>
                                            <button class="btn btn-sm btn-info edit-attr-type-btn" data-id="${type.id}">Edit</button>
                                            <button class="btn btn-sm btn-danger delete-attr-type-btn" data-id="${type.id}">Delete</button>
                                        </td>
                                    </tr>
                                `);
                            });
                        }
                        // Reset form
                        $('#attrTypeForm')[0].reset();
                        $('#attrTypeFormMethod').val('POST');
                        $('#attrTypeId').val('');
                        $('#cancelAttrTypeEditBtn').hide();
                        $('.text-danger').text('');
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading attribute types for manage modal:", error);
                    }
                });
            }

            // ===============================================
            // Product Variants Logic
            // ===============================================

            $('#openVariantModalBtn').on('click', function() {
                if (currentEditingProductId) {
                    $('#variantProductIdField').val(currentEditingProductId);
                    currentProductName = $('#productName').val();
                    $('#variantProductName').text(currentProductName);

                    // Tải cả biến thể và cấu hình thuộc tính giá trị
                    $.when(
                        loadVariantsForProduct(
                            currentEditingProductId), // Tải và lưu trữ các biến thể hiện có
                        loadProductAttributeValueConfigs(
                            currentEditingProductId) // Tải cấu hình thuộc tính giá trị
                    ).done(function() {
                        resetAndHideVariantForm(); // Sẽ gọi loadAttributeTypesForVariantModal
                        $('#variantsModal').modal('show');
                    }).fail(function() {
                        Swal.fire('Lỗi!', 'Không thể tải dữ liệu biến thể/cấu hình.', 'error');
                    });
                } else {
                    Swal.fire('Thông tin', 'Vui lòng lưu sản phẩm trước để quản lý biến thể.', 'info');
                }
            });

            $('#addNewVariantBtn').on('click', function() {
                resetVariantForm(); // Reset form và load attributes
                loadAttributeTypesForVariantModal([]); // Load attributes without any pre-selection
                $('#variantForm').slideDown();
                // Scroll to the form
                $('html, body').animate({
                    scrollTop: $('#variantForm').offset().top - 100
                }, 500);
            });

            $(document).on('click', '.edit-variant-btn', function() {
                let variantId = $(this).data('id');
                $('#saveVariantBtn').text('Cập nhật biến thể');
                $('.text-danger').text('');

                $.ajax({
                    url: `/product-variant/${variantId}/edit`,
                    method: 'GET',
                    success: function(response) {
                        let variant = response.variant;
                        let variantAttributeValueIds = variant.attribute_values.map(av => av
                            .id);

                        // Cập nhật selectedVariantAttrValues để loadAttributeTypesForVariantModal có thể chọn đúng checkbox
                        selectedVariantAttrValues = variantAttributeValueIds;

                        // Tải cấu hình giá trị thuộc tính cho sản phẩm, sau đó điền form
                        loadProductAttributeValueConfigs(variant.product_id).done(function() {
                            populateVariantDetailsForm(
                                variant); // Điền dữ liệu biến thể tổng hợp
                            loadAttributeTypesForVariantModal(
                                selectedVariantAttrValues
                            ); // Tải thuộc tính và chọn checkbox/hiện config
                            $('#variantForm')
                                .slideDown(); // Hiển thị biểu mẫu để chỉnh sửa
                        }).fail(function() {
                            Swal.fire('Lỗi!',
                                'Không thể tải cấu hình thuộc tính cho chỉnh sửa.',
                                'error');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Lỗi khi tìm nạp biến thể để chỉnh sửa:", error);
                        Swal.fire('Lỗi!', 'Không thể tải chi tiết biến thể.', 'error');
                    }
                });
            });

            $('#cancelEditVariantBtn').on('click', function() {
                resetAndHideVariantForm();
            });

            $('input[name="pricing_type"]').on('change', function() {
                if (this.value === 'public_price') {
                    $('#publicPriceFields').slideDown();
                } else {
                    $('#publicPriceFields').slideUp();
                    $('#variantPrice').val('');
                    $('#variantDiscountPrice').val('');
                    $('#variantDiscountPercent').val('');
                }
            });


            // Lắng nghe sự kiện input và change ở biến thể tổng hợp để cập nhật ngay lập tức
            $('#variantPrice, #variantDiscountPrice, #variantDiscountPercent, #variantQuantity').on('input change',
                function() {
                    setTimeout(updateConfigsFromMasterVariant,
                        0); // Thực thi ngay sau khi giá trị được cập nhật
                });
            $('#variantStatus, #variantIsFeatured').on('click change', function() {
                setTimeout(updateConfigsFromMasterVariant, 0);
            });

            // Tự động cập nhật khi form được hiển thị
            $('#variantForm').on('shown.bs.modal', function() {
                updateConfigsFromMasterVariant();
            });

            // Lắng nghe sự kiện input trên Variant Name để tự động cập nhật SKU
            $('#variantName').on('input', updateVariantNameAndSku);
            // Lắng nghe sự kiện thay đổi checkbox thuộc tính biến thể để tự động cập nhật tên biến thể và SKU
            // Sự kiện này được gán lại mỗi khi loadAttributeTypesForVariantModal chạy
            $(document).on('change', '#variantAttributesSelectionContainer .variant-attribute-checkbox',
                function() {
                    updateVariantNameAndSku();
                    updateConfigsFromMasterVariant(); // Cập nhật giá trị cho biến thể mới được chọn
                });


            // Xử lý submit form biến thể (Cập nhật để gửi cả dữ liệu cấu hình)
            $('#variantForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                // Thu thập dữ liệu từ các khối cấu hình giá trị thuộc tính đang hiển thị
                let attributeConfigsData = [];
                // Chỉ thu thập từ các khối mà checkbox của nó ĐANG ĐƯỢC CHỌN
                $('#variantAttributesSelectionContainer .variant-attribute-checkbox:checked').each(
                    function() {
                        let attrValueId = $(this).val();
                        let $configBlock = $(`#config-fields-${attrValueId}`);

                        if ($configBlock.length) { // Đảm bảo khối config tồn tại
                            let configId = $configBlock.find('input[name*="[id]"]').val();
                            let price = $configBlock.find('input[name*="[price]"]').val();
                            let discountPrice = $configBlock.find('input[name*="[discount_price]"]')
                                .val();
                            let discountPercent = $configBlock.find('input[name*="[discount_percent]"]')
                                .val();
                            let quantity = $configBlock.find('input[name*="[quantity]"]').val();
                            let isActive = $configBlock.find('input[name*="[is_active]"]').is(
                                ':checked') ? 1 : 0;
                            let isFeatured = $configBlock.find('input[name*="[is_featured]"]').is(
                                ':checked') ? 1 : 0;
                            let currentImagePath = $configBlock.find(
                                'input[name*="[current_image_path]"]').val();
                            let imageFile = $configBlock.find(
                                'input[type="file"][name*="[image_file]"]')[0].files[0];

                            attributeConfigsData.push({
                                id: configId,
                                product_id: currentEditingProductId,
                                product_attribute_value_id: attrValueId,
                                price: price,
                                discount_price: discountPrice,
                                discount_percent: discountPercent,
                                quantity: quantity,
                                is_active: isActive,
                                is_featured: isFeatured,
                                image_file: imageFile,
                                current_image_path: currentImagePath
                            });
                        }
                    });

                // Xóa các trường `configs[...]` cũ khỏi formData (nếu có) và thêm lại
                formData.delete('attribute_value_configs');
                attributeConfigsData.forEach((config, index) => {
                    formData.append(`attribute_value_configs[${index}][id]`, config.id);
                    formData.append(`attribute_value_configs[${index}][product_id]`, config
                        .product_id);
                    formData.append(`attribute_value_configs[${index}][product_attribute_value_id]`,
                        config.product_attribute_value_id);
                    formData.append(`attribute_value_configs[${index}][price]`, config.price);
                    formData.append(`attribute_value_configs[${index}][discount_price]`, config
                        .discount_price);
                    formData.append(`attribute_value_configs[${index}][discount_percent]`, config
                        .discount_percent);
                    formData.append(`attribute_value_configs[${index}][quantity]`, config.quantity);
                    formData.append(`attribute_value_configs[${index}][is_active]`, config
                        .is_active);
                    formData.append(`attribute_value_configs[${index}][is_featured]`, config
                        .is_featured);

                    if (config.image_file) {
                        formData.append(`attribute_value_configs[${index}][image_file]`, config
                            .image_file);
                    } else if (config.current_image_path) {
                        formData.append(`attribute_value_configs[${index}][current_image_path]`,
                            config.current_image_path);
                    }
                });

                // Kiểm tra nếu không có thuộc tính nào được chọn cho biến thể tổng hợp
                if (selectedVariantAttrValues.length === 0) {
                    $('#attribute_value_idsError').text(
                        'Vui lòng chọn ít nhất một thuộc tính cho biến thể.');
                    return;
                }
                // Thêm các IDs thuộc tính đã chọn cho biến thể tổng hợp
                formData.delete('attribute_value_ids[]'); // Xóa bản cũ để tránh trùng lặp
                selectedVariantAttrValues.forEach(id => {
                    formData.append('attribute_value_ids[]', id);
                });

                let variantId = $('#variantId').val();
                let productId = $('#variantProductIdField').val();
                let method = $('#variantFormMethod').val();
                let url = method === 'POST' ? `/product/${productId}/variants` :
                    `/product-variant/${variantId}`;

                $('.text-danger').text('');

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire('Thành công!', response.success, 'success');
                        loadVariantsForProduct(productId);
                        resetAndHideVariantForm();
                        updateProductTable(response.products);
                    },
                    error: function(xhr, status, error) {
                        console.error("Lỗi:", xhr.responseText);
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            for (let field in errors) {
                                let errorId = field.replace('.', '_') + 'Error';
                                // Xử lý lỗi cho các trường configs[...]
                                if (field.startsWith('attribute_value_configs.')) {
                                    // Tìm chỉ số và tên trường thực tế
                                    const match = field.match(
                                        /attribute_value_configs\.(\d+)\.(.+)/);
                                    if (match) {
                                        const configIndex = match[1];
                                        const configField = match[2];
                                        // Cần tìm ID giá trị thuộc tính tương ứng với configIndex để hiển thị lỗi đúng chỗ
                                        // Ví dụ: dựa vào attributeConfigsData[configIndex].product_attribute_value_id
                                        const attrValueIdForError = attributeConfigsData[
                                                configIndex] ? attributeConfigsData[configIndex]
                                            .product_attribute_value_id : 'unknown';
                                        $(`#config-${configField}-error-${attrValueIdForError}`)
                                            .text(errors[field][0]);
                                        console.error(
                                            `Lỗi cấu hình thuộc tính: ${field} - ${errors[field][0]}`
                                        );
                                    }
                                } else {
                                    $(`#${errorId}`).text(errors[field][0]);
                                }
                            }
                        } else {
                            Swal.fire('Lỗi!', xhr.responseJSON.error ||
                                'Đã xảy ra lỗi.', 'error');
                        }
                    }
                });
            });

            $(document).on('click', '.delete-variant-btn', function() {
                let variantId = $(this).data('id');
                let productId = $('#variantProductIdField').val();

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
                            url: `/product-variant/${variantId}`,
                            method: 'DELETE',
                            data: {
                                _token: '<?php echo e(csrf_token()); ?>'
                            },
                            success: function(response) {
                                Swal.fire('Deleted!', response.success, 'success');
                                loadVariantsForProduct(productId);
                                updateProductTable(response.products);
                            },
                            error: function(xhr, status, error) {
                                console.error("Error deleting variant:", error);
                                Swal.fire('Error!', xhr.responseJSON.error ||
                                    'Failed to delete variant.', 'error');
                            }
                        });
                    }
                });
            });

            $('#toggleVariantDetailsBtn').on('click', function() {
                $('#variantDetailsFields').slideToggle();
            });

            // ===============================================
            // Product Attributes (Types & Values) Logic
            // ===============================================

            $('#manageAttributesBtn').on('click', function() {
                loadAttributeTypesForManageModal();
                $('#attrValueContext').show().text('Select an Attribute Type to manage its values.');
                $('#attributeValuesTable').hide();
                $('#addAttrValueBtn').hide();
                $('#attrValueForm').hide();
                resetAttrValueForm();
                $('#attributesModal').modal('show');
            });

            $(document).on('click', '.select-attr-type-to-manage-values', function(e) {
                e.preventDefault();
                let typeId = $(this).data('id');
                let typeName = $(this).data('name');
                let displayType = $(this).data('display-type');
                currentManagingAttrTypeId = typeId;

                $('#attrValueContext').hide();
                $('#attributeValuesTable').show();
                $('#addAttrValueBtn').show();
                $('#addAttrValueBtn').text(`Add New Value for ${typeName}`);
                loadAttributeValuesForManageModal(typeId);

                if (displayType === 'color_picker') {
                    $('#attrValueMetadataField').show();
                } else {
                    $('#attrValueMetadataField').hide();
                }
            });

            // Product Attribute Type CRUD
            $('#addAttrTypeBtn').on('click', function() {
                resetAttrTypeForm();
                $('#attrTypeForm').slideDown();
            });

            function resetAttrTypeForm() {
                $('#attrTypeForm')[0].reset();
                $('#attrTypeFormMethod').val('POST');
                $('#attrTypeId').val('');
                $('#cancelAttrTypeEditBtn').hide();
                $('.text-danger').text('');
            }

            $(document).on('click', '.edit-attr-type-btn', function() {
                let id = $(this).data('id');
                $('#attrTypeForm').slideDown();

                $.ajax({
                    url: `/product-attribute-types/${id}/edit`,
                    method: 'GET',
                    success: function(response) {
                        let type = response.attributeType;
                        $('#attrTypeFormMethod').val('PUT');
                        $('#attrTypeId').val(type.id);
                        $('#attrTypeName').val(type.name);
                        $('#attrTypeDisplayType').val(type.display_type);
                        $('#cancelAttrTypeEditBtn').show();
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching attribute type:", error);
                        Swal.fire('Error!', 'Failed to load attribute type details.', 'error');
                    }
                });
            });

            $('#attrTypeForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let id = $('#attrTypeId').val();
                let method = $('#attrTypeFormMethod').val();
                let url = method === 'POST' ? "<?php echo e(route('product_attribute_type.store')); ?>" :
                    `/product-attribute-types/${id}`;

                $('.text-danger').text('');

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire('Thành công!', response.success, 'success');
                        loadAttributeTypesForManageModal();
                        resetAttrTypeForm();
                        // Cập nhật lại danh sách thuộc tính và config trong modal biến thể nếu đang mở
                        if ($('#variantsModal').hasClass('show') && currentEditingProductId) {
                            // Tải lại configs sau khi thay đổi attribute type/value
                            loadProductAttributeValueConfigs(currentEditingProductId).done(
                                function() {
                                    loadAttributeTypesForVariantModal(
                                        selectedVariantAttrValues); // Sau đó cập nhật UI
                                });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Lỗi khi lưu loại thuộc tính:", xhr.responseText);
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            for (let field in errors) {
                                $(`#attr_type_${field}Error`).text(errors[field][0]);
                            }
                        } else {
                            Swal.fire('Lỗi!', xhr.responseJSON.error ||
                                'Đã xảy ra lỗi.', 'error');
                        }
                    }
                });
            });

            $(document).on('click', '.delete-attr-type-btn', function() {
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Deleting this attribute type will also delete all its values and remove them from any variants! You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/product-attribute-types/${id}`,
                            method: 'DELETE',
                            data: {
                                _token: '<?php echo e(csrf_token()); ?>'
                            },
                            success: function(response) {
                                Swal.fire('Deleted!', response.success, 'success');
                                loadAttributeTypesForManageModal();
                                // Cập nhật lại danh sách thuộc tính và config trong modal biến thể nếu đang mở
                                if ($('#variantsModal').hasClass('show') &&
                                    currentEditingProductId) {
                                    loadProductAttributeValueConfigs(
                                        currentEditingProductId).done(function() {
                                        loadAttributeTypesForVariantModal(
                                            selectedVariantAttrValues);
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("Error deleting attribute type:", xhr
                                    .responseText);
                                Swal.fire('Error!', xhr.responseJSON.error ||
                                    'Failed to delete attribute type.', 'error');
                            }
                        });
                    }
                });
            });

            $('#cancelAttrTypeEditBtn').on('click', function() {
                resetAttrTypeForm();
                $('#attrTypeForm').slideUp();
            });


            // Product Attribute Value CRUD
            $('#addAttrValueBtn').on('click', function() {
                resetAttrValueForm();
                $('#attrValueForm').slideDown();
            });

            function resetAttrValueForm() {
                $('#attrValueForm')[0].reset();
                $('#attrValueFormMethod').val('POST');
                $('#attrValueId').val('');
                $('#attrValueValue').val('');
                $('#attrValueMetadata').val('');
                $('#cancelAttrValueEditBtn').hide();
                $('.text-danger').text('');
                $('#currentAttrTypeIdForValue').val(currentManagingAttrTypeId);
            }

            $(document).on('click', '.edit-attr-value-btn', function() {
                let id = $(this).data('id');
                let typeId = $(this).data('type-id');
                currentManagingAttrTypeId = typeId;

                $('#attrValueForm').slideDown();

                $.ajax({
                    url: `/product-attribute-values/${id}/edit`,
                    method: 'GET',
                    success: function(response) {
                        let value = response.attributeValue;
                        $('#attrValueFormMethod').val('PUT');
                        $('#attrValueId').val(value.id);
                        $('#attrValueValue').val(value.value);
                        $('#currentAttrTypeIdForValue').val(value.attribute_type_id);
                        if (value.metadata) {
                            $('#attrValueMetadata').val(JSON.stringify(value.metadata));
                        } else {
                            $('#attrValueMetadata').val('');
                        }
                        $('#cancelAttrValueEditBtn').show();
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching attribute value:", error);
                        Swal.fire('Error!', 'Failed to load attribute value details.', 'error');
                    }
                });
            });

            $('#attrValueForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let id = $('#attrValueId').val();
                let typeId = $('#currentAttrTypeIdForValue').val();
                let method = $('#attrValueFormMethod').val();
                let url = method === 'POST' ? `/product-attribute-types/${typeId}/values` :
                    `/product-attribute-values/${id}`;

                $('.text-danger').text('');

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire('Success!', response.success, 'success');
                        loadAttributeValuesForManageModal(typeId);
                        resetAttrValueForm();
                        // Cập nhật lại danh sách thuộc tính và config trong modal biến thể nếu đang mở
                        if ($('#variantsModal').hasClass('show') && currentEditingProductId) {
                            loadProductAttributeValueConfigs(currentEditingProductId).done(
                                function() {
                                    loadAttributeTypesForVariantModal(
                                        selectedVariantAttrValues);
                                });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Lỗi khi lưu giá trị thuộc tính:", xhr.responseText);
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            for (let field in errors) {
                                let errorId = field.replace('.', '_') + 'Error';
                                $(`#${errorId}`).text(errors[field][0]);
                            }
                        } else {
                            Swal.fire('Lỗi!', xhr.responseJSON.error ||
                                'Đã xảy ra lỗi.', 'error');
                        }
                    }
                });
            });

            $(document).on('click', '.delete-attr-value-btn', function() {
                let id = $(this).data('id');
                let typeId = $(this).data('type-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Deleting this value will remove it from any variants that use it! You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/product-attribute-values/${id}`,
                            method: 'DELETE',
                            data: {
                                _token: '<?php echo e(csrf_token()); ?>'
                            },
                            success: function(response) {
                                Swal.fire('Deleted!', response.success, 'success');
                                loadAttributeValuesForManageModal(typeId);
                                // Cập nhật lại danh sách thuộc tính và config trong modal biến thể nếu đang mở
                                if ($('#variantsModal').hasClass('show') &&
                                    currentEditingProductId) {
                                    loadProductAttributeValueConfigs(
                                        currentEditingProductId).done(function() {
                                        loadAttributeTypesForVariantModal(
                                            selectedVariantAttrValues);
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("Error deleting attribute value:", xhr
                                    .responseText);
                                Swal.fire('Error!', xhr.responseJSON.error ||
                                    'Failed to delete attribute value.', 'error');
                            }
                        });
                    }
                });
            });

            $('#cancelAttrValueEditBtn').on('click', function() {
                resetAttrValueForm();
                $('#attrValueForm').slideUp();
            });

            // ===============================================
            // Quick Add Attribute Value Logic
            // ===============================================

            // Handle click on "Thêm giá trị" button in variant modal
            $(document).on('click', '.add-attr-value-from-variant-modal', function() {
                let attrTypeId = $(this).data('attr-type-id');
                let attrTypeName = $(this).data('attr-type-name');
                let attrDisplayType = $(this).data('attr-display-type');

                $('#quickAddAttrTypeId').val(attrTypeId);
                $('#quickAddAttrTypeName').text(attrTypeName);
                $('#quickAttrValueValue').val('');
                $('#quickAttrValueMetadata').val('');
                $('#quick_attr_value_valueError').text('');
                $('#quick_attr_value_metadataError').text('');

                if (attrDisplayType === 'color_picker') {
                    $('#quickAttrValueMetadataField').show();
                } else {
                    $('#quickAttrValueMetadataField').hide();
                }

                $('#quickAddAttrValueModal').modal('show');
            });

            // Handle submission of quick add attribute value form
            $('#quickAddAttrValueForm').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let attrTypeId = $('#quickAddAttrTypeId').val();

                $('#quick_attr_value_valueError').text('');
                $('#quick_attr_value_metadataError').text('');

                $.ajax({
                    url: `/product-attribute-types/${attrTypeId}/values`, // Sử dụng cùng route store value
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire('Thành công!', response.success, 'success');
                        $('#quickAddAttrValueModal').modal('hide');
                        // Tải lại các thuộc tính trong modal biến thể để hiển thị giá trị mới
                        loadAttributeTypesForVariantModal(selectedVariantAttrValues);
                    },
                    error: function(xhr, status, error) {
                        console.error("Lỗi khi thêm nhanh giá trị thuộc tính:", xhr
                            .responseText);
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            if (errors.value) {
                                $('#quick_attr_value_valueError').text(errors.value[0]);
                            }
                            if (errors.metadata) {
                                $('#quick_attr_value_metadataError').text(errors.metadata[0]);
                            }
                        } else {
                            Swal.fire('Lỗi!', xhr.responseJSON.error ||
                                'Đã xảy ra lỗi khi thêm giá trị.', 'error');
                        }
                    }
                });
            });


            // ===============================================
            // Logic cho nhập giá hàng loạt (Bulk Price)
            // ===============================================

            $('#applyBulkPriceBtn').on('click', function() {
                let bulkPrice = parseFloat($('#bulkPriceInput').val());
                let bulkDiscountPrice = parseFloat($('#bulkDiscountPriceInput').val());

                $('#bulk_price_error').text('');

                if (isNaN(bulkPrice) || bulkPrice < 0) {
                    $('#bulk_price_error').text('Please enter a valid price for bulk update.');
                    return;
                }

                Swal.fire({
                    title: 'Apply to all variants?',
                    text: "This will update prices (and optionally discount prices) for ALL existing 'Public Price' variants of this product. Are you sure?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, update all!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/product/${currentEditingProductId}/variants/bulk-update-price`,
                            method: 'POST',
                            data: {
                                _token: '<?php echo e(csrf_token()); ?>',
                                price: bulkPrice,
                                discount_price: isNaN(bulkDiscountPrice) ? null :
                                    bulkDiscountPrice,
                            },
                            success: function(response) {
                                Swal.fire('Success!', response.success, 'success');
                                loadVariantsForProduct(currentEditingProductId);
                            },
                            error: function(xhr, status, error) {
                                console.error("Error bulk updating prices:", xhr
                                    .responseText);
                                $('#bulk_price_error').text(xhr.responseJSON.error ||
                                    'Failed to bulk update prices.');
                                Swal.fire('Error!', xhr.responseJSON.error ||
                                    'Failed to bulk update prices.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\BookingApp–Laravel-React\backend\resources\views/apps/product/index.blade.php ENDPATH**/ ?>