@extends('layouts.app')
@section('title', 'Tag') {{-- Đổi tiêu đề thành Tag --}}
@section('content')
    <div class="content">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('tag.index') }}">Tag</a></li> {{-- Đổi category thành tag --}}
                <li class="breadcrumb-item active">List Tag</li> {{-- Đổi Category thành Tag --}}
            </ol>
        </nav>
        <div class="mb-9">
            <div class="row g-3 mb-4">
                <div class="col-auto">
                    <h2 class="mb-0">Tags</h2> {{-- Đổi Categories thành Tags --}}
                </div>
            </div>
            <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#"><span>All </span><span
                                class="text-body-tertiary fw-semibold"
                                id="total-tags">({{ count($tags) }})</span></a></li> {{-- Đổi total-categories thành total-tags, categories thành tags --}}
                {{-- Giữ các tab này nếu bạn vẫn muốn dùng, nhưng không liên quan trực tiếp đến chức năng Tag CRUD hiện tại --}}
                <li class="nav-item"><a class="nav-link" href="#"><span>Published </span><span
                                class="text-body-tertiary fw-semibold">(70348)</span></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><span>Drafts </span><span
                                class="text-body-tertiary fw-semibold">(17)</span></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><span>On discount </span><span
                                class="text-body-tertiary fw-semibold">(810)</span></a></li>
            </ul>
            <div id="tags-list" {{-- Đổi products thành tags-list --}}
                data-list='{"valueNames":["tag-name","tag-slug"],"page":10,"pagination":true}'> {{-- Cập nhật valueNames cho List.js --}}
                <div class="mb-4">
                    <div class="d-flex flex-wrap gap-3">
                        <div class="search-box">
                            <form class="position-relative"><input class="form-control search-input search" type="search"
                                    placeholder="Search tags" aria-label="Search" /> {{-- placeholder đổi thành tags --}}
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                        </div>
                        <div class="scrollbar overflow-hidden-y">
                            <div class="btn-group position-static" role="group">
                                {{-- Các filter Category và Vendor có thể không cần cho Tags, bạn có thể loại bỏ hoặc để lại tùy ý --}}
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
                            <button class="btn btn-primary" id="addTagBtn" data-bs-toggle="modal"
                                data-bs-target="#tagModal"> {{-- Thay đổi ID và data-bs-target --}}
                                <span class="fas fa-plus me-2"></span>Add Tag {{-- Thay đổi text --}}
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
                                                data-bulk-select='{"body":"tags-table-body"}' /></div> {{-- Đổi products-table-body thành tags-table-body --}}
                                    </th>
                                    {{-- Cột Image không cần thiết cho Tags, có thể xóa hoặc thay đổi --}}
                                    {{-- <th class="sort white-space-nowrap align-middle fs-10" scope="col"
                                        style="width:70px;">Image</th> --}}
                                    <th class="sort white-space-nowrap align-middle ps-4" scope="col"
                                        style="width:350px;" data-sort="tag-name">TAG NAME</th> {{-- Đổi CATEGORY NAME thành TAG NAME --}}
                                    <th class="sort align-middle ps-4" scope="col" data-sort="tag-slug"
                                        style="width:150px;">SLUG</th> {{-- Thay PARENT CATEGORY bằng SLUG --}}
                                    {{-- Các cột STATUS, DESCRIPTION không cần thiết cho Tags, bạn có thể loại bỏ --}}
                                    {{-- <th class="sort align-middle ps-4" scope="col" data-sort="status"
                                        style="width:150px;">STATUS</th>
                                    <th class="sort align-middle ps-3" scope="col" data-sort="description"
                                        style="width:250px;">DESCRIPTION</th> --}}
                                    <th class="sort text-end align-middle pe-0 ps-4" scope="col">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="tags-table-body"> {{-- Đổi products-table-body thành tags-table-body --}}
                                @foreach ($tags as $tag)
                                    <tr class="position-static">
                                        <td class="fs-9 align-middle">
                                            <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                    type="checkbox"
                                                    data-bulk-select-row='{"tagId":{{ $tag->id }}}' />
                                            </div>
                                        </td>
                                        {{-- Cột Image không cần thiết cho Tags --}}
                                        {{-- <td class="align-middle white-space-nowrap py-0 tag-img">
                                            <div class="d-block border border-translucent rounded-2 text-center"
                                                style="width:53px; height:53px; line-height:53px;">
                                                <i class="fas fa-tag text-body-secondary"></i>
                                            </div>
                                        </td> --}}
                                        <td class="tag-name align-middle ps-4">
                                            <a class="fw-semibold line-clamp-3 mb-0"
                                                href="#">{{ $tag->name }}</a>
                                        </td>
                                        <td class="tag-slug align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                            {{ $tag->slug }}
                                        </td>
                                        {{-- Các cột STATUS, DESCRIPTION không cần thiết cho Tags --}}
                                        {{-- <td
                                            class="status align-middle white-space-nowrap text-body-quaternary fs-9 ps-4 fw-semibold">
                                            <span class="badge bg-success">Active</span>
                                        </td>
                                        <td class="description align-middle review pb-2 ps-3" style="min-width:225px;">
                                            N/A
                                        </td> --}}
                                        <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                            <div class="btn-reveal-trigger position-static">
                                                <button
                                                    class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs-10"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2">
                                                    <a class="dropdown-item edit-tag-btn" href="#"
                                                        data-id="{{ $tag->id }}">Edit</a> {{-- Thay edit-category-btn thành edit-tag-btn --}}
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger delete-tag-btn" href="#"
                                                        data-id="{{ $tag->id }}">Remove</a> {{-- Thay delete-category-btn thành delete-tag-btn --}}
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

    <div class="modal fade" id="tagModal" tabindex="-1" aria-labelledby="tagModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="tagForm"> {{-- Xóa enctype="multipart/form-data" vì không có file upload --}}
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" name="tag_id" id="tagId"> {{-- Đổi category_id thành tag_id --}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="tagModalLabel">Add New Tag</h5> {{-- Đổi Category thành Tag --}}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tagName" class="form-label">Tag Name</label> {{-- Đổi Category Name thành Tag Name --}}
                            <input type="text" class="form-control" id="tagName" name="name" required> {{-- Đổi categoryName thành tagName --}}
                            <div class="text-danger" id="nameError"></div>
                        </div>
                        {{-- Loại bỏ các trường Parent Category, Description, Image, Status vì không có trong bảng tags --}}
                        {{-- <div class="mb-3">
                            <label for="tagParent" class="form-label">Parent Tag</label>
                            <select class="form-select" id="tagParent" name="parent_id">
                                <option value="">-- No Parent --</option>
                            </select>
                            <div class="text-danger" id="parent_idError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="tagDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="tagDescription" name="description" rows="3"></textarea>
                            <div class="text-danger" id="descriptionError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="tagImage" class="form-label">Image</label>
                            <input class="form-control" type="file" id="tagImage" name="img">
                            <div class="text-danger" id="imgError"></div>
                            <img id="currentTagImage" src="" alt="Current Image" class="img-thumbnail mt-2"
                                style="max-width: 100px; display: none;">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="tagStatus" name="status"
                                value="1" checked>
                            <label class="form-check-label" for="tagStatus">
                                Active
                            </label>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveTagBtn">Save Tag</button> {{-- Đổi saveCategoryBtn thành saveTagBtn --}}
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
            // Hàm cập nhật bảng tag sau khi thêm/sửa/xóa thành công
            function updateTagTable(tags) {
                let tableBody = $('#tags-table-body'); // Sử dụng ID tags-table-body
                tableBody.empty();
                let totalTags = 0;

                tags.forEach(tag => {
                    totalTags++;
                    // Không cần indent hay status badge cho tag nếu không có trường đó

                    tableBody.append(`
                        <tr class="position-static">
                            <td class="fs-9 align-middle">
                                <div class="form-check mb-0 fs-8">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"tagId":${tag.id}}' />
                                </div>
                            </td>
                            {{-- Cột Image không cần cho tag --}}
                            {{-- <td class="align-middle white-space-nowrap py-0 tag-img">
                                <div class="d-block border border-translucent rounded-2 text-center" style="width:53px; height:53px; line-height:53px;"><i class="fas fa-tag text-body-secondary"></i></div>
                            </td> --}}
                            <td class="tag-name align-middle ps-4">
                                <a class="fw-semibold line-clamp-3 mb-0" href="#">${tag.name}</a>
                            </td>
                            <td class="tag-slug align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                ${tag.slug}
                            </td>
                            {{-- Các cột Status, Description không cần cho tag --}}
                            {{-- <td class="status align-middle white-space-nowrap text-body-quaternary fs-9 ps-4 fw-semibold">
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td class="description align-middle review pb-2 ps-3" style="min-width:225px;">
                                N/A
                            </td> --}}
                            <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                <div class="btn-reveal-trigger position-static">
                                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                            type="button" data-bs-toggle="dropdown" data-boundary="window"
                                            aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                        <span class="fas fa-ellipsis-h fs-10"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end py-2">
                                        <a class="dropdown-item edit-tag-btn" href="#" data-id="${tag.id}">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger delete-tag-btn" href="#" data-id="${tag.id}">Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `);
                });
                $('#total-tags').text(`(${totalTags})`);
            }

            // Handle "Add Tag" button click
            $('#addTagBtn').on('click', function() {
                $('#tagModalLabel').text('Add New Tag');
                $('#tagForm')[0].reset(); // Reset form fields
                $('#formMethod').val('POST'); // Set method to POST for creating
                $('#tagId').val(''); // Clear tag ID
                // Không có image hay parent category cho tags
                // $('#currentTagImage').hide().attr('src', '');
                // $('#tagStatus').prop('checked', true);

                // Clear previous validation errors
                $('.text-danger').text('');
                $('#tagModal').modal('show');
            });

            // Handle "Edit" button click
            $(document).on('click', '.edit-tag-btn', function() {
                let id = $(this).data('id');
                console.log("Edit tag button clicked for ID:", id); // Thêm log để debug
                $('#tagModalLabel').text('Edit Tag');
                $('#tagForm')[0].reset(); // Reset form fields
                $('#formMethod').val('PUT'); // Set method to PUT for updating
                $('#tagId').val(id); // Set tag ID
                $('.text-danger').text(''); // Clear previous validation errors

                $.ajax({
                    url: `/tag/${id}/edit`, // Sử dụng route tag
                    method: 'GET',
                    success: function(response) {
                        console.log("Ajax success for edit tag:", response); // Thêm log
                        let tag = response.tag;

                        $('#tagName').val(tag.name);
                        // Không có description, img, status, parent_id cho tags

                        $('#tagModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching tag for edit:", error);
                        console.error("Response Text:", xhr.responseText);
                        Swal.fire('Error!', 'Failed to load tag details. Check console for more info.', 'error');
                    }
                });
            });

            // Handle form submission (Add/Edit)
            $('#tagForm').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let tagId = $('#tagId').val();
                let method = $('#formMethod').val(); // POST or PUT
                let url = method === 'POST' ? "{{ route('tag.store') }}" : `/tag/${tagId}`; // Sử dụng route tag

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
                        $('#tagModal').modal('hide');
                        updateTagTable(response.tags); // Cập nhật bảng với dữ liệu mới từ response
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", xhr.responseText);
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            for (let field in errors) {
                                $(`#${field}Error`).text(errors[field][0]);
                            }
                        } else {
                            Swal.fire('Error!', xhr.responseJSON.error || 'Something went wrong.', 'error');
                        }
                    }
                });
            });

            // Handle "Delete" button click
            $(document).on('click', '.delete-tag-btn', function() {
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
                            url: `/tag/${id}`, // Sử dụng route tag
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire('Deleted!', response.success, 'success');
                                updateTagTable(response.tags); // Cập nhật bảng với dữ liệu mới từ response
                            },
                            error: function(xhr, status, error) {
                                console.error("Error deleting tag:", error);
                                Swal.fire('Error!', xhr.responseJSON.error || 'Failed to delete tag.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush