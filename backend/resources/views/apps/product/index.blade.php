@extends('layouts.app')
@section('title', 'Product')
@section('content')
    <div class="content">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
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
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#"><span>All </span><span
                                class="text-body-tertiary fw-semibold"
                                id="total-products">({{ count($products) }})</span></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><span>Published </span><span
                                class="text-body-tertiary fw-semibold">(70348)</span></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><span>Drafts </span><span
                                class="text-body-tertiary fw-semibold">(17)</span></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><span>On discount </span><span
                                class="text-body-tertiary fw-semibold">(810)</span></a></li>
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
                            {{-- Nút quản lý thuộc tính sản phẩm và giá trị thuộc tính --}}
                            <button class="btn btn-phoenix-secondary ms-2" id="manageAttributesBtn" data-bs-toggle="modal" data-bs-target="#attributesModal">
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
                                @foreach ($products as $product)
                                    <tr class="position-static">
                                        <td class="fs-9 align-middle">
                                            <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                    type="checkbox"
                                                    data-bulk-select-row='{"productId":{{ $product->id }}}' />
                                            </div>
                                        </td>
                                        <td class="align-middle white-space-nowrap py-0 product-img">
                                            @if ($product->img)
                                                <a class="d-block border border-translucent rounded-2" href="#">
                                                    <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->name }}" width="53" />
                                                </a>
                                            @else
                                                <div class="d-block border border-translucent rounded-2 text-center"
                                                    style="width:53px; height:53px; line-height:53px;">
                                                    <i class="fas fa-box text-body-secondary"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="product-name align-middle ps-4">
                                            <a class="fw-semibold line-clamp-3 mb-0" href="#">{{ $product->name }}</a>
                                        </td>
                                        <td class="product-categories align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                            @forelse($product->categories as $category)
                                                {{ $category->name }}
                                                @if ($loop->iteration < $loop->count)
                                                    ,
                                                @endif
                                            @empty
                                                N/A
                                            @endforelse
                                        </td>
                                        <td class="product-price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                                            @if($product->variants->isNotEmpty())
                                                ${{ number_format($product->variants->min('price'), 2) }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td class="product-tags align-middle review pb-2 ps-3" style="min-width:225px;">
                                            @forelse($product->tags as $tag)
                                                <a class="text-decoration-none" href="#!"><span class="badge badge-tag me-2 mb-2">{{ $tag->name }}</span></a>
                                            @empty
                                                <span>No Tags</span>
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
                                                        data-id="{{ $product->id }}">Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger delete-product-btn" href="#"
                                                        data-id="{{ $product->id }}">Remove</a>
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
                            <div id="productCategoriesCheckboxes" class="d-flex flex-wrap">
                                {{-- Categories checkboxes will be loaded via JavaScript --}}
                            </div>
                            <div class="text-danger" id="category_idsError"></div>
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

                        <div class="mb-3 mt-4" id="variantManagementSection" style="display: none;">
                            <button type="button" class="btn btn-info" id="openVariantModalBtn">
                                <span class="fas fa-cubes me-2"></span>Manage Product Variants
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

    {{-- Modal để quản lý biến thể sản phẩm (Thêm/Sửa/Xóa biến thể) --}}
    <div class="modal fade" id="variantsModal" tabindex="-1" aria-labelledby="variantsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="variantsModalLabel">Manage Variants for Product: <span id="variantProductName"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="currentProductIdForVariants">
                    <h6>Existing Variants:</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Price Type</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Featured</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="variantsTableBody">
                            {{-- Variants will be loaded here via JS --}}
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-success btn-sm mt-3" id="addVariantBtn">Add New Variant</button>
                    
                    <hr class="my-4">

                    <h6>Add/Edit Variant:</h6>
                    <form id="variantForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="variantFormMethod" value="POST">
                        <input type="hidden" name="variant_id" id="variantId">
                        <input type="hidden" name="product_id" id="variantProductIdField">

                        <div class="mb-3">
                            <label for="variantName" class="form-label">Variant Name</label>
                            <input type="text" class="form-control" id="variantName" name="variant_name" required>
                            <div class="text-danger" id="variant_nameError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="variantSku" class="form-label">SKU (Stock Keeping Unit)</label>
                            <input type="text" class="form-control" id="variantSku" name="sku">
                            <div class="text-danger" id="skuError"></div>
                        </div>

                        {{-- Thêm phần chọn loại giá --}}
                        <div class="mb-3">
                            <label class="form-label">Pricing Type</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pricing_type" id="pricingTypePublic" value="public_price" checked>
                                    <label class="form-check-label" for="pricingTypePublic">Public Price</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pricing_type" id="pricingTypeQuote" value="request_quote">
                                    <label class="form-check-label" for="pricingTypeQuote">Request Quote</label>
                                </div>
                            </div>
                            <div class="text-danger" id="pricing_typeError"></div>
                        </div>

                        {{-- Các trường giá, chỉ hiển thị khi pricing_type là public_price --}}
                        <div id="publicPriceFields">
                            <div class="mb-3">
                                <label for="variantPrice" class="form-label">Price</label>
                                <input type="number" step="0.01" class="form-control" id="variantPrice" name="price">
                                <div class="text-danger" id="priceError"></div>
                            </div>
                            <div class="mb-3">
                                <label for="variantDiscountPrice" class="form-label">Discount Price</label>
                                <input type="number" step="0.01" class="form-control" id="variantDiscountPrice" name="discount_price">
                                <div class="text-danger" id="discount_priceError"></div>
                            </div>
                            <div class="mb-3">
                                <label for="variantDiscountPercent" class="form-label">Discount Percent (%)</label>
                                <input type="number" class="form-control" id="variantDiscountPercent" name="discount_percent" min="0" max="100">
                                <div class="text-danger" id="discount_percentError"></div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="variantQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="variantQuantity" name="quantity" required min="0">
                            <div class="text-danger" id="quantityError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="variantImage" class="form-label">Variant Image</label>
                            <input class="form-control" type="file" id="variantImage" name="img">
                            <div class="text-danger" id="variant_imgError"></div>
                            <img id="currentVariantImage" src="" alt="Current Image" class="img-thumbnail mt-2" style="max-width: 80px; display: none;">
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="variantStatus" name="status" value="1" checked>
                            <label class="form-check-label" for="variantStatus">Active</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="variantIsFeatured" name="is_featured" value="1">
                            <label class="form-check-label" for="variantIsFeatured">Featured</label>
                        </div>

                        <button type="submit" class="btn btn-primary" id="saveVariantBtn">Save Variant</button>
                        <button type="button" class="btn btn-secondary" id="cancelEditVariantBtn" style="display: none;">Cancel Edit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal cho quản lý thuộc tính sản phẩm và giá trị thuộc tính --}}
    <div class="modal fade" id="attributesModal" tabindex="-1" aria-labelledby="attributesModalLabel" aria-hidden="true">
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
                                    {{-- Attribute Types will be loaded here via JS --}}
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-success btn-sm mt-3" id="addAttrTypeBtn">Add New Attribute Type</button>
                            <form id="attrTypeForm" class="mt-3">
                                @csrf
                                <input type="hidden" name="_method" id="attrTypeFormMethod" value="POST">
                                <input type="hidden" name="attr_type_id" id="attrTypeId">
                                <div class="mb-2">
                                    <label for="attrTypeName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="attrTypeName" name="name" required>
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
                                <button type="button" class="btn btn-secondary btn-sm" id="cancelAttrTypeEditBtn" style="display:none;">Cancel</button>
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
                                    {{-- Attribute Values will be loaded here via JS --}}
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-success btn-sm mt-3" id="addAttrValueBtn" style="display:none;">Add New Value</button>
                            <form id="attrValueForm" class="mt-3" style="display:none;">
                                @csrf
                                <input type="hidden" name="_method" id="attrValueFormMethod" value="POST">
                                <input type="hidden" name="attr_value_id" id="attrValueId">
                                <input type="hidden" name="current_attr_type_id" id="currentAttrTypeIdForValue">
                                <div class="mb-2">
                                    <label for="attrValueValue" class="form-label">Value</label>
                                    <input type="text" class="form-control" id="attrValueValue" name="value" required>
                                    <div class="text-danger" id="attr_value_valueError"></div>
                                </div>
                                <div class="mb-2" id="attrValueMetadataField" style="display:none;">
                                    <label for="attrValueMetadata" class="form-label">Metadata (JSON)</label>
                                    <input type="text" class="form-control" id="attrValueMetadata" name="metadata" placeholder='e.g. {"hex_code": "#FF0000"} for colors'>
                                    <div class="text-danger" id="attr_value_metadataError"></div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Save Attribute Value</button>
                                <button type="button" class="btn btn-secondary btn-sm" id="cancelAttrValueEditBtn" style="display:none;">Cancel</button>
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

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Biến toàn cục để lưu ID sản phẩm hiện đang được chỉnh sửa (trong modal Product chính)
            let currentEditingProductId = null;
            let currentManagingAttrTypeId = null; // Biến toàn cục để lưu loại thuộc tính đang quản lý giá trị

            // Hàm cập nhật bảng sản phẩm sau khi thao tác thành công
            function updateProductTable(products) {
                let tableBody = $('#products-table-body');
                tableBody.empty();
                let totalProducts = 0;

                products.forEach(product => {
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
                            tagsHtml += `<a class="text-decoration-none" href="#!"><span class="badge badge-tag me-2 mb-2">${tag.name}</span></a>`;
                        });
                    } else {
                        tagsHtml = `<span>No Tags</span>`;
                    }

                    // Giá min từ biến thể (nếu có)
                    let minPrice = 'N/A';
                    if (product.variants && product.variants.length > 0) {
                        let prices = product.variants
                                    .filter(v => v.pricing_type === 'public_price' && v.price !== null)
                                    .map(v => parseFloat(v.price));
                        if (prices.length > 0) {
                            minPrice = `$${Math.min(...prices).toFixed(2)}`;
                        } else {
                            minPrice = 'Quote'; // Tất cả biến thể là báo giá hoặc không có giá công khai
                        }
                    } else {
                        minPrice = 'No Variants';
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
                            <td class="product-price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                                ${minPrice}
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

            // Hàm tải các danh mục cho checkbox trong modal sản phẩm chính
            function loadCategoriesForProductModal(selectedCategoryIds = []) {
                $.ajax({
                    url: "{{ route('category.index') }}",
                    method: 'GET',
                    success: function(response) {
                        let categoriesCheckboxesDiv = $('#productCategoriesCheckboxes');
                        categoriesCheckboxesDiv.empty();
                        response.categories.forEach(cat => {
                            let checked = selectedCategoryIds.includes(cat.id) ? 'checked' : '';
                            let prefix = '';
                            if (cat.level > 0) {
                                prefix = '&nbsp;'.repeat(cat.level * 4) + '↳&nbsp;';
                            }
                            categoriesCheckboxesDiv.append(`
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="checkbox" name="category_ids[]" value="${cat.id}" id="category-${cat.id}" ${checked}>
                                    <label class="form-check-label" for="category-${cat.id}">${prefix}${cat.name}</label>
                                </div>
                            `);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading categories for product modal:", error);
                    }
                });
            }

            // Hàm tải các tags cho checkbox trong modal sản phẩm chính
            function loadTagsForProductModal(selectedTagIds = []) {
                $.ajax({
                    url: "{{ route('tag.index') }}",
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

            // Hàm tải và hiển thị danh sách biến thể cho một sản phẩm cụ thể
            function loadVariantsForProduct(productId) {
                $.ajax({
                    url: `/product/${productId}/variants`,
                    method: 'GET',
                    success: function(response) {
                        let variantsTableBody = $('#variantsTableBody');
                        variantsTableBody.empty();
                        if (response.variants.length === 0) {
                            variantsTableBody.append('<tr><td colspan="9" class="text-center">No variants found. Add a new one.</td></tr>');
                        } else {
                            response.variants.forEach(variant => {
                                let variantStatus = variant.status ? 'Active' : 'Inactive';
                                let variantFeatured = variant.is_featured ? 'Yes' : 'No';
                                let variantImageUrl = variant.img ? `/storage/${variant.img}` : '';
                                let variantImageHtml = variant.img ?
                                    `<img src="${variantImageUrl}" alt="${variant.variant_name}" width="50" class="img-thumbnail">` :
                                    `<i class="fas fa-image text-body-secondary"></i>`;
                                
                                let priceHtml;
                                if (variant.pricing_type === 'public_price') {
                                    priceHtml = `$${parseFloat(variant.price).toFixed(2)}`;
                                    if (variant.discount_price) {
                                        priceHtml += `<br><small class="text-danger">Disc: $${parseFloat(variant.discount_price).toFixed(2)}</small>`;
                                    }
                                } else {
                                    priceHtml = `Request Quote`;
                                }

                                // Hiển thị các thuộc tính biến thể của biến thể này
                                let variantAttrValuesHtml = '';
                                if(variant.attribute_values && variant.attribute_values.length > 0) {
                                    variant.attribute_values.forEach(attrValue => {
                                        let attrTypeName = attrValue.attribute_type ? attrValue.attribute_type.name + ': ' : '';
                                        variantAttrValuesHtml += `<span class="badge bg-secondary me-1 mb-1">${attrTypeName}${attrValue.value}</span>`;
                                    });
                                }

                                variantsTableBody.append(`
                                    <tr>
                                        <td>${variant.variant_name}</td>
                                        <td>${variant.sku || 'N/A'}</td>
                                        <td>${variant.pricing_type === 'public_price' ? 'Public Price' : 'Request Quote'}</td>
                                        <td>${priceHtml}</td>
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
                                        <td colspan="9" class="small text-muted ps-5">Attributes: ${variantAttrValuesHtml || 'None'}</td>
                                    </tr>
                                `);
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading variants:", error);
                        Swal.fire('Error!', 'Failed to load product variants.', 'error');
                    }
                });
            }

            // Reset form biến thể
            function resetVariantForm() {
                $('#variantForm')[0].reset();
                $('#variantFormMethod').val('POST');
                $('#variantId').val('');
                $('#variantProductIdField').val(currentEditingProductId);
                $('#currentVariantImage').hide().attr('src', '');
                $('#variantStatus').prop('checked', true);
                $('#variantIsFeatured').prop('checked', false);
                $('.text-danger').text('');
                $('#cancelEditVariantBtn').hide();
                $('#pricingTypePublic').prop('checked', true);
                $('#publicPriceFields').show();
                $('#bulkPriceInput').val('');
                $('#bulkDiscountPriceInput').val('');
                // Clear all attribute value checkboxes
                $('#variantAttributeValuesCheckboxes input[type="checkbox"]').prop('checked', false);
            }

            // Hàm tải các loại thuộc tính và giá trị của chúng cho modal Biến thể
            function loadAttributeTypesForVariantModal(selectedAttributeValueIds = []) {
                $.ajax({
                    url: "{{ route('product_attribute_type.index') }}",
                    method: 'GET',
                    success: function(response) {
                        let attributesContainer = $('#variantAttributeValuesCheckboxes');
                        attributesContainer.empty();

                        if (response.attributeTypes.length === 0) {
                            attributesContainer.append('<p class="text-muted small">No attribute types defined. Please add them via "Manage Attributes".</p>');
                            return;
                        }

                        response.attributeTypes.forEach(attrType => {
                            let attrTypeHtml = `
                                <div class="mb-3 border p-2 rounded">
                                    <strong>${attrType.name}:</strong>
                                    <button type="button" class="btn btn-link btn-sm float-end add-attr-value-from-variant-modal" data-attr-type-id="${attrType.id}" data-attr-type-name="${attrType.name}" data-bs-toggle="modal" data-bs-target="#attributesModal">
                                        <i class="fas fa-plus"></i> Add Value
                                    </button>
                                    <div class="d-flex flex-wrap mt-2" id="attr-values-for-type-${attrType.id}">
                            `;
                            if (attrType.values && attrType.values.length > 0) {
                                attrType.values.forEach(attrValue => {
                                    let checked = selectedAttributeValueIds.includes(attrValue.id) ? 'checked' : '';
                                    attrTypeHtml += `
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="checkbox" name="attribute_value_ids[]" value="${attrValue.id}" id="attr-value-${attrValue.id}" ${checked}>
                                            <label class="form-check-label" for="attr-value-${attrValue.id}">${attrValue.value}</label>
                                        </div>
                                    `;
                                });
                            } else {
                                attrTypeHtml += `<p class="text-muted small">No values defined for this attribute type.</p>`;
                            }
                            attrTypeHtml += `
                                    </div>
                                </div>
                            `;
                            attributesContainer.append(attrTypeHtml);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading attribute types and values for variant modal:", error);
                    }
                });
            }

            // Load attribute types and values for the main attribute modal
            function loadAttributeTypesForManageModal() {
                $.ajax({
                    url: "{{ route('product_attribute_type.index') }}",
                    method: 'GET',
                    success: function(response) {
                        let tableBody = $('#attributeTypesTableBody');
                        tableBody.empty();
                        if (response.attributeTypes.length === 0) {
                            tableBody.append('<tr><td colspan="3" class="text-center">No attribute types found.</td></tr>');
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

            // Load attribute values for a specific type in the main attribute modal
            function loadAttributeValuesForManageModal(attrTypeId) {
                $.ajax({
                    url: `/product-attribute-types/${attrTypeId}/values`, // Route to get attribute values for a type
                    method: 'GET',
                    success: function(response) {
                        let tableBody = $('#attributeValuesTableBody');
                        tableBody.empty();
                        if (response.attributeValues.length === 0) {
                            tableBody.append('<tr><td colspan="2" class="text-center">No values found.</td></tr>');
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
            // Product CRUD (Add/Edit/Save/Delete) - Đảm bảo đã có các handler này
            // ===============================================

            // Handle "Add Product" button click
            $('#addProductBtn').on('click', function() {
                $('#productModalLabel').text('Add New Product');
                $('#productForm')[0].reset();
                $('#formMethod').val('POST');
                $('#productId').val('');
                $('#currentProductImage').hide().attr('src', '');

                $('#productStatus').prop('checked', true);
                $('#productIsFeatured').prop('checked', false);

                loadCategoriesForProductModal([]);
                loadTagsForProductModal([]);

                $('.text-danger').text('');
                $('#variantManagementSection').hide(); // Ẩn phần quản lý biến thể khi thêm mới sản phẩm
                $('#productModal').modal('show');
            });

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
                            $('#currentProductImage').attr('src', `/storage/${product.img}`).show();
                        } else {
                            $('#currentProductImage').hide().attr('src', '');
                        }

                        loadCategoriesForProductModal(productCategoryIds);
                        loadTagsForProductModal(productTagIds);

                        $('#variantManagementSection').show(); // Hiện phần quản lý biến thể
                        $('#productModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching product for edit:", error);
                        console.error("Response Text:", xhr.responseText);
                        Swal.fire('Error!', 'Failed to load product details. Check console for more info.', 'error');
                    }
                });
            });

            // Handle form submission (Add/Edit Product)
            $('#productForm').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let productId = $('#productId').val();
                let method = $('#formMethod').val();
                let url = method === 'POST' ? "{{ route('product.store') }}" : `/product/${productId}`;

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
                                if (field.startsWith('category_ids.')) {
                                    $('#category_idsError').text(errors[field][0]);
                                } else if (field.startsWith('tags.')) {
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

            // ===============================================
            // Product Variants Logic
            // ===============================================

            // Khi người dùng click "Manage Variants" trong modal Product chính
            $('#openVariantModalBtn').on('click', function() {
                console.log("Manage Product Variants button clicked!"); // Kiểm tra xem dòng này có hiển thị không
                if (currentEditingProductId) {
                    $('#variantProductIdField').val(currentEditingProductId);
                    let productName = $('#productName').val(); // Lấy tên sản phẩm từ form chính
                    $('#variantProductName').text(productName);
                    
                    resetVariantForm();
                    loadVariantsForProduct(currentEditingProductId);
                    loadAttributeTypesForVariantModal([]); // Tải các thuộc tính cho biến thể
                    $('#variantsModal').modal('show');
                } else {
                    Swal.fire('Info', 'Please save the product first to manage variants.', 'info');
                }
            });

            // Handle "Add New Variant" button in Variants Modal
            $('#addVariantBtn').on('click', function() {
                resetVariantForm();
            });

            // Handle "Edit Variant" button in Variants Table
            $(document).on('click', '.edit-variant-btn', function() {
                let variantId = $(this).data('id');
                $.ajax({
                    url: `/product-variant/${variantId}/edit`,
                    method: 'GET',
                    success: function(response) {
                        let variant = response.variant;
                        $('#variantFormMethod').val('PUT');
                        $('#variantId').val(variant.id);
                        $('#variantName').val(variant.variant_name);
                        $('#variantSku').val(variant.sku);
                        $('#variantQuantity').val(variant.quantity);
                        $('#variantStatus').prop('checked', variant.status == 1);
                        $('#variantIsFeatured').prop('checked', variant.is_featured == 1);

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
                        $('#cancelEditVariantBtn').show();

                        // Tải thuộc tính biến thể và đánh dấu các giá trị đã chọn
                        let selectedAttributeValueIds = variant.attribute_values.map(av => av.id);
                        loadAttributeTypesForVariantModal(selectedAttributeValueIds);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching variant for edit:", error);
                        Swal.fire('Error!', 'Failed to load variant details.', 'error');
                    }
                });
            });
            
            // Handle "Cancel Edit Variant" button
            $('#cancelEditVariantBtn').on('click', function() {
                resetVariantForm();
            });

            // Lắng nghe sự kiện thay đổi radio button pricing_type
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

            // Handle form submission (Add/Edit Variant)
            $('#variantForm').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let variantId = $('#variantId').val();
                let productId = $('#variantProductIdField').val();
                let method = $('#variantFormMethod').val();
                let url = method === 'POST' ? `/product/${productId}/variants` : `/product-variant/${variantId}`;

                $('.text-danger').text('');

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire('Success!', response.success, 'success');
                        loadVariantsForProduct(productId);
                        resetVariantForm();
                        // Sau khi lưu biến thể, cập nhật lại bảng sản phẩm chính để phản ánh giá min
                        updateProductTable(response.products); // Controller phải trả về products cập nhật
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
                            Swal.fire('Error!', xhr.responseJSON.error || 'Something went wrong.', 'error');
                        }
                    }
                });
            });

            // Handle "Delete Variant" button
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
                            data: { _token: '{{ csrf_token() }}' },
                            success: function(response) {
                                Swal.fire('Deleted!', response.success, 'success');
                                loadVariantsForProduct(productId);
                                // Sau khi xóa biến thể, cập nhật lại bảng sản phẩm chính để phản ánh giá min mới
                                updateProductTable(response.products); // Controller phải trả về products cập nhật
                            },
                            error: function(xhr, status, error) {
                                console.error("Error deleting variant:", error);
                                Swal.fire('Error!', xhr.responseJSON.error || 'Failed to delete variant.', 'error');
                            }
                        });
                    }
                });
            });

            // ... (Các handle addProductBtn, edit-product-btn, productForm.submit, delete-product-btn không đổi) ...
            // (Đảm bảo đã thêm currentEditingProductId = id; vào edit-product-btn)

            // Handle "Manage Attributes" button click
            $('#manageAttributesBtn').on('click', function() {
                loadAttributeTypesForManageModal();
                $('#attrValueContext').show().text('Select an Attribute Type to manage its values.');
                $('#attributeValuesTable').hide();
                $('#addAttrValueBtn').hide();
                $('#attrValueForm').hide();
                resetAttrValueForm();
                $('#attributesModal').modal('show');
            });

            // Handle clicking on an attribute type name to manage its values
            $(document).on('click', '.select-attr-type-to-manage-values', function(e) {
                e.preventDefault();
                let typeId = $(this).data('id');
                let typeName = $(this).data('name');
                let displayType = $(this).data('display-type');
                currentManagingAttrTypeId = typeId; // Lưu loại thuộc tính đang quản lý

                $('#attrValueContext').hide();
                $('#attributeValuesTable').show();
                $('#addAttrValueBtn').show();
                $('#addAttrValueBtn').text(`Add New Value for ${typeName}`);
                loadAttributeValuesForManageModal(typeId);

                // Hiển thị/ẩn trường metadata tùy thuộc vào display_type
                if (displayType === 'color_picker') {
                    $('#attrValueMetadataField').show();
                } else {
                    $('#attrValueMetadataField').hide();
                }
            });

            // ===============================================
            // Logic cho Product Attribute Type CRUD
            // ===============================================

            $('#addAttrTypeBtn').on('click', function() {
                resetAttrTypeForm();
                $('#attrTypeForm').slideDown(); // Show the form if hidden
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
                $('#attrTypeForm').slideDown(); // Show the form if hidden

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
                let url = method === 'POST' ? "{{ route('product_attribute_type.store') }}" : `/product-attribute-types/${id}`;

                $('.text-danger').text('');

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire('Success!', response.success, 'success');
                        loadAttributeTypesForManageModal();
                        resetAttrTypeForm();
                    },
                    error: function(xhr, status, error) {
                        console.error("Error saving attribute type:", xhr.responseText);
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            for (let field in errors) {
                                $(`#attr_type_${field}Error`).text(errors[field][0]);
                            }
                        } else {
                            Swal.fire('Error!', xhr.responseJSON.error || 'Something went wrong.', 'error');
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
                            data: { _token: '{{ csrf_token() }}' },
                            success: function(response) {
                                Swal.fire('Deleted!', response.success, 'success');
                                loadAttributeTypesForManageModal();
                                // Hide value section if the type being managed was deleted
                                if (currentManagingAttrTypeId === id) {
                                    $('#attrValueContext').show().text('Select an Attribute Type to manage its values.');
                                    $('#attributeValuesTable').hide();
                                    $('#addAttrValueBtn').hide();
                                    $('#attrValueForm').hide();
                                    resetAttrValueForm();
                                }
                                // Optionally reload variants table if this change affects product display
                                // updateProductTable(response.products); // if controller returns products
                            },
                            error: function(xhr, status, error) {
                                console.error("Error deleting attribute type:", xhr.responseText);
                                Swal.fire('Error!', xhr.responseJSON.error || 'Failed to delete attribute type.', 'error');
                            }
                        });
                    }
                });
            });

            $('#cancelAttrTypeEditBtn').on('click', function() {
                resetAttrTypeForm();
                $('#attrTypeForm').slideUp();
            });


            // ===============================================
            // Logic cho Product Attribute Value CRUD
            // ===============================================

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
                $('#currentAttrTypeIdForValue').val(currentManagingAttrTypeId); // Ensure correct type ID
            }

            $(document).on('click', '.edit-attr-value-btn', function() {
                let id = $(this).data('id');
                let typeId = $(this).data('type-id');
                currentManagingAttrTypeId = typeId; // Update context
                
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
                let url = method === 'POST' ? `/product-attribute-types/${typeId}/values` : `/product-attribute-values/${id}`;

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
                        // Also reload attributes for variant modal if open
                        if ($('#variantsModal').hasClass('show')) { // Check if variant modal is open
                             loadAttributeTypesForVariantModal(
                                // Pass currently selected attribute values of the variant being edited, if any
                                $('#variantId').val() ? response.selectedVariantAttributeValues || [] : [] // You might need to return this from controller
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error saving attribute value:", xhr.responseText);
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            for (let field in errors) {
                                let errorId = field.replace('.', '_') + 'Error';
                                $(`#${errorId}`).text(errors[field][0]);
                            }
                        } else {
                            Swal.fire('Error!', xhr.responseJSON.error || 'Something went wrong.', 'error');
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
                            data: { _token: '{{ csrf_token() }}' },
                            success: function(response) {
                                Swal.fire('Deleted!', response.success, 'success');
                                loadAttributeValuesForManageModal(typeId);
                                // Reload attributes for variant modal if open
                                if ($('#variantsModal').hasClass('show')) {
                                     loadAttributeTypesForVariantModal(
                                        $('#variantId').val() ? response.selectedVariantAttributeValues || [] : [] // You might need to return this from controller
                                    );
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("Error deleting attribute value:", xhr.responseText);
                                Swal.fire('Error!', xhr.responseJSON.error || 'Failed to delete attribute value.', 'error');
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
            // Logic cho nhập giá hàng loạt (Bulk Price)
            // ===============================================

            $('#applyBulkPriceBtn').on('click', function() {
                let bulkPrice = parseFloat($('#bulkPriceInput').val());
                let bulkDiscountPrice = parseFloat($('#bulkDiscountPriceInput').val());

                // Clear previous errors
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
                            url: `/product/${currentEditingProductId}/variants/bulk-update-price`, // Bạn cần tạo route này và method trong ProductVariantController
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                price: bulkPrice,
                                discount_price: isNaN(bulkDiscountPrice) ? null : bulkDiscountPrice,
                                // pricing_type có thể được ngầm định là 'public_price'
                            },
                            success: function(response) {
                                Swal.fire('Success!', response.success, 'success');
                                loadVariantsForProduct(currentEditingProductId); // Tải lại danh sách biến thể
                            },
                            error: function(xhr, status, error) {
                                console.error("Error bulk updating prices:", xhr.responseText);
                                $('#bulk_price_error').text(xhr.responseJSON.error || 'Failed to bulk update prices.');
                                Swal.fire('Error!', xhr.responseJSON.error || 'Failed to bulk update prices.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
