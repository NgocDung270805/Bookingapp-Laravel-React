
<?php $__env->startSection('title', 'Category'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('category.index')); ?>">Category</a></li>
                <li class="breadcrumb-item active">List Category</li>
            </ol>
        </nav>
        <div class="mb-9">
            <div class="row g-3 mb-4">
                <div class="col-auto">
                    <h2 class="mb-0">Categories</h2> 
                </div>
            </div>
            <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#"><span>All </span><span
                            class="text-body-tertiary fw-semibold"
                            id="total-categories">(<?php echo e(count($categories)); ?>)</span></a></li>
                
                <li class="nav-item"><a class="nav-link" href="#"><span>Published </span><span
                            class="text-body-tertiary fw-semibold">(70348)</span></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><span>Drafts </span><span
                            class="text-body-tertiary fw-semibold">(17)</span></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><span>On discount </span><span
                            class="text-body-tertiary fw-semibold">(810)</span></a></li>
            </ul>
            <div id="products" 
                data-list='{"valueNames":["category-name","parent-category","status","description","category-img"],"page":10,"pagination":true}'>
                
                <div class="mb-4">
                    <div class="d-flex flex-wrap gap-3">
                        <div class="search-box">
                            <form class="position-relative"><input class="form-control search-input search" type="search"
                                    placeholder="Search categories" aria-label="Search" /> 
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
                            <button class="btn btn-primary" id="addCategoryBtn" data-bs-toggle="modal"
                                data-bs-target="#categoryModal"> 
                                <span class="fas fa-plus me-2"></span>Add Category 
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
                                        style="width:350px;" data-sort="category-name">CATEGORY NAME</th>
                                    
                                    <th class="sort align-middle ps-4" scope="col" data-sort="parent-category"
                                        style="width:150px;">PARENT CATEGORY</th> 
                                    <th class="sort align-middle ps-4" scope="col" data-sort="status"
                                        style="width:150px;">STATUS</th> 
                                    <th class="sort align-middle ps-3" scope="col" data-sort="description"
                                        style="width:250px;">DESCRIPTION</th> 
                                    <th class="sort text-end align-middle pe-0 ps-4" scope="col">ACTIONS</th>
                                    
                                    
                                    
                                    
                                </tr>
                            </thead>
                            <tbody class="list" id="products-table-body"> 
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="position-static">
                                        <td class="fs-9 align-middle">
                                            <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                    type="checkbox"
                                                    data-bulk-select-row='{"categoryId":<?php echo e($category->id); ?>}' />
                                            </div>
                                        </td>
                                        <td class="align-middle white-space-nowrap py-0 category-img">
                                            <div style="padding-left: <?php echo e($category->level * 30); ?>px;">
                                                <?php if($category->img): ?>
                                                    <a class="d-block border border-translucent rounded-2" href="#">
                                                        <img src="<?php echo e(asset('storage/' . $category->img)); ?>" alt=""
                                                            width="53" />
                                                    </a>
                                                <?php else: ?>
                                                    <div class="d-block border border-translucent rounded-2 text-center"
                                                        style="width:53px; height:53px; line-height:53px;">
                                                        <i class="fas fa-image text-body-secondary"></i>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </td>

                                        <td class="category-name align-middle ps-4">
                                            <div style="padding-left: <?php echo e($category->level * 30); ?>px;">
                                                
                                                <a class="fw-semibold line-clamp-3 mb-0"
                                                    href="#"><?php echo e($category->name); ?></a>
                                            </div>
                                        </td>
                                        <td
                                            class="parent-category align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                                            <?php echo e($category->parent ? $category->parent->name : '---'); ?>

                                        </td>
                                        <td
                                            class="status align-middle white-space-nowrap text-body-quaternary fs-9 ps-4 fw-semibold">
                                            <?php if($category->status): ?>
                                                <span class="badge bg-success">Active</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="description align-middle review pb-2 ps-3" style="min-width:225px;">
                                            <?php echo e(Str::limit($category->description, 50)); ?> 
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
                                                    <a class="dropdown-item edit-category-btn" href="#"
                                                        data-id="<?php echo e($category->id); ?>">Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger delete-category-btn"
                                                        href="#" data-id="<?php echo e($category->id); ?>">Remove</a>
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

    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="categoryForm" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" name="category_id" id="categoryId">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryModalLabel">Add New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="categoryName" name="name" required>
                            <div class="text-danger" id="nameError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="categoryParent" class="form-label">Parent Category</label>
                            <select class="form-select" id="categoryParent" name="parent_id">
                                <option value="">-- No Parent --</option>
                                
                            </select>
                            <div class="text-danger" id="parent_idError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="categoryDescription" name="description" rows="3"></textarea>
                            <div class="text-danger" id="descriptionError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="categoryImage" class="form-label">Image</label>
                            <input class="form-control" type="file" id="categoryImage" name="img">
                            <div class="text-danger" id="imgError"></div>
                            <img id="currentCategoryImage" src="" alt="Current Image" class="img-thumbnail mt-2"
                                style="max-width: 100px; display: none;">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="categoryStatus" name="status"
                                value="1" checked>
                            <label class="form-check-label" for="categoryStatus">
                                Active
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveCategoryBtn">Save Category</button>
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
        $(document).ready(function() {
            // Hàm cập nhật bảng danh mục sau khi thêm/sửa/xóa thành công
            function updateCategoryTable(categories) {
                let tableBody = $('#products-table-body'); // Giữ nguyên ID gốc của bạn
                tableBody.empty();
                let totalCategories = 0;

                function buildCategoryRows(categoriesData) {
                    categoriesData.forEach(category => {
                        totalCategories++;
                        let indent = '&nbsp;'.repeat(category.level * 4); // 4 spaces per level
                        let statusBadge = category.status ?
                            '<span class="badge bg-success">Active</span>' :
                            '<span class="badge bg-secondary">Inactive</span>';

                        // let imageUrl = category.img ? `<?php echo e(asset('uploads/categories')); ?>/${category.img}` :
                        //     ``; // Blade asset() here for initial render

                        // // Fix: The asset function cannot be used directly inside backticks (``) in JavaScript
                        // // when the script is generated once by Blade.
                        // // We need to pass the base path from Blade to JS.
                        // // Or, ensure category.img is a full URL or relative path handled by the server.
                        // // Given the 404, the path is likely incorrect or file missing.
                        // // For dynamic JS updates, we must rely on client-side path construction.
                        // // Let's assume asset() base path is available via a global JS var.
                        // // For now, I'll update the imageHtml construction for reliability.

                        // let imageHtml = category.img ?
                        //     `<a class="d-block border border-translucent rounded-2" href="#"><img src="/uploads/categories/${category.img}" alt="${category.name}" width="53" /></a>` : // Simplified for JS
                        //     `<div class="d-block border border-translucent rounded-2 text-center" style="width:53px; height:53px; line-height:53px;"><i class="fas fa-image text-body-secondary"></i></div>`;

                        // Trong hàm updateCategoryTable:
                        let imageHtml = category.img ?
                            `<a class="d-block border border-translucent rounded-2" href="#"><img src="/storage/${category.img}" alt="${category.name}" width="53" /></a>` :
                            `<div class="d-block border border-translucent rounded-2 text-center" style="width:53px; height:53px; line-height:53px;"><i class="fas fa-image text-body-secondary"></i></div>`;

                        // Trong phần Ajax success của Edit modal:
                        if (category.img) {
                            $('#currentCategoryImage').attr('src', `/storage/${category.img}`).show();
                        } else {
                            $('#currentCategoryImage').hide().attr('src', '');
                        }
                        tableBody.append(`
                        <tr class="position-static">
                            <td class="fs-9 align-middle">
                                <div class="form-check mb-0 fs-8">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"categoryId":${category.id}}' />
                                </div>
                            </td>
                            <td class="align-middle white-space-nowrap py-0 category-img">
                                ${imageHtml}
                            </td>
                            <td class="category-name align-middle ps-4">
                                <div style="padding-left: ${category.level * 20}px;">
                                    <a class="fw-semibold line-clamp-3 mb-0" href="#">${category.name}</a>
                                </div>
                            </td>
                            <td class="parent-category align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                                ${category.parent ? category.parent.name : 'None'}
                            </td>
                            <td class="status align-middle white-space-nowrap text-body-quaternary fs-9 ps-4 fw-semibold">
                                ${statusBadge}
                            </td>
                            <td class="description align-middle review pb-2 ps-3" style="min-width:225px;">
                                ${category.description ? category.description.substring(0, 50) + (category.description.length > 50 ? '...' : '') : 'N/A'}
                            </td>
                            <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                <div class="btn-reveal-trigger position-static">
                                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                            type="button" data-bs-toggle="dropdown" data-boundary="window"
                                            aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                        <span class="fas fa-ellipsis-h fs-10"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end py-2">
                                        <a class="dropdown-item edit-category-btn" href="#" data-id="${category.id}">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger delete-category-btn" href="#" data-id="${category.id}">Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `);
                    });
                }
                buildCategoryRows(categories);
                $('#total-categories').text(`(${totalCategories})`);
            }

            // Lấy danh sách danh mục cha cho dropdown trong modal
            function loadParentCategories(selectedParentId = null, excludeId = null) {
                $.ajax({
                    url: "<?php echo e(route('category.index')); ?>", // Tải lại tất cả danh mục để có thể chọn làm cha
                    method: 'GET',
                    success: function(response) {
                        let parentSelect = $('#categoryParent');
                        parentSelect.empty().append('<option value="">-- No Parent --</option>');

                        let categoriesForParent = response
                            .categories; // Controller index trả về categories đã sắp xếp dạng cây

                        categoriesForParent.forEach(cat => {
                            // Loại bỏ danh mục đang sửa và các danh mục con của nó khỏi danh sách cha tiềm năng
                            if (excludeId !== null && (cat.id ==
                                    excludeId
                                )) { // Không cần check isDescendant ở đây vì backend đã lọc
                                return; // Bỏ qua danh mục này
                            }
                            let prefix = '&nbsp;'.repeat(cat.level * 4); // Thụt lề để dễ nhìn
                            parentSelect.append(
                                `<option value="${cat.id}">${prefix}${cat.name}</option>`);
                        });

                        if (selectedParentId) {
                            parentSelect.val(selectedParentId);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading parent categories:", error);
                    }
                });
            }

            // Handle "Add Category" button click
            $('#addCategoryBtn').on('click', function() {
                $('#categoryModalLabel').text('Add New Category');
                $('#categoryForm')[0].reset(); // Reset form fields
                $('#formMethod').val('POST'); // Set method to POST for creating
                $('#categoryId').val(''); // Clear category ID
                $('#currentCategoryImage').hide().attr('src', ''); // Hide and clear image preview
                $('#categoryStatus').prop('checked', true); // Default status to active

                loadParentCategories(); // Load parent categories for adding (không loại trừ id nào)

                // Clear previous validation errors
                $('.text-danger').text('');
                $('#categoryModal').modal('show');
            });

            // Handle "Edit" button click
            $(document).on('click', '.edit-category-btn', function() {
                // console.log("Edit button clicked!"); // Log to check if event is fired
                let id = $(this).data('id');
                // console.log("Category ID for edit:", id); // Log the ID

                $('#categoryModalLabel').text('Edit Category');
                $('#categoryForm')[0].reset(); // Reset form fields
                $('#formMethod').val('PUT'); // Set method to PUT for updating
                $('#categoryId').val(id); // Set category ID
                $('.text-danger').text(''); // Clear previous validation errors

                $.ajax({
                    url: `/category/${id}/edit`, // Using template literal for URL
                    method: 'GET',
                    success: function(response) {
                        console.log("Ajax success:", response); // Log success response
                        let category = response.category;
                        let availableParents = response.availableParents;

                        $('#categoryName').val(category.name);
                        $('#categoryDescription').val(category.description);
                        $('#categoryStatus').prop('checked', category.status == 1);

                        if (category.img) {
                            // Cập nhật đường dẫn hình ảnh cho modal
                            $('#currentCategoryImage').attr('src',
                                `/uploads/categories/${category.img}`).show();
                        } else {
                            $('#currentCategoryImage').hide().attr('src', '');
                        }

                        // Populate parent category dropdown
                        let parentSelect = $('#categoryParent');
                        parentSelect.empty().append(
                            '<option value="">-- No Parent --</option>');

                        // Thêm các danh mục cha có sẵn
                        availableParents.forEach(parent => {
                            parentSelect.append(
                                `<option value="${parent.id}">${parent.name}</option>`
                            );
                        });

                        // Chọn parent_id hiện tại của danh mục
                        if (category.parent_id) {
                            parentSelect.val(category.parent_id);
                        }

                        $('#categoryModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching category for edit:", error);
                        console.error("Response Text:", xhr.responseText);
                        Swal.fire('Error!',
                            'Failed to load category details. Check console for more info.',
                            'error');
                    }
                });
            });

            // Handle form submission (Add/Edit)
            $('#categoryForm').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let categoryId = $('#categoryId').val();
                let method = $('#formMethod').val(); // POST or PUT
                let url = method === 'POST' ? "<?php echo e(route('category.store')); ?>" : `/category/${categoryId}`;

                // Clear previous errors
                $('.text-danger').text('');

                $.ajax({
                    url: url,
                    method: 'POST', // Luôn là POST với FormData, Laravel sẽ xử lý _method
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire('Success!', response.success, 'success');
                        $('#categoryModal').modal('hide');
                        updateCategoryTable(response
                            .categories); // Cập nhật bảng với dữ liệu mới từ response
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", xhr.responseText);
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            for (let field in errors) {
                                $(`#${field}Error`).text(errors[field][0]);
                            }
                        } else {
                            Swal.fire('Error!', xhr.responseJSON.error ||
                                'Something went wrong.', 'error');
                        }
                    }
                });
            });

            // Handle "Delete" button click
            $(document).on('click', '.delete-category-btn', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this! If this category has subcategories, it cannot be deleted.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/category/${id}`,
                            method: 'DELETE',
                            data: {
                                _token: '<?php echo e(csrf_token()); ?>'
                            },
                            success: function(response) {
                                Swal.fire('Deleted!', response.success, 'success');
                                updateCategoryTable(response
                                    .categories
                                ); // Cập nhật bảng với dữ liệu mới từ response
                            },
                            error: function(xhr, status, error) {
                                console.error("Error deleting category:", error);
                                Swal.fire('Error!', xhr.responseJSON.error ||
                                    'Failed to delete category.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\BookingApp–Laravel-React\backend\resources\views/apps/category/index.blade.php ENDPATH**/ ?>