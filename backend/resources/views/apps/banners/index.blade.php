@extends('layouts.app') {{-- Đảm bảo bạn có layout 'app' --}}
@section('title', 'Banners Management')
@section('content')
    <div class="content">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Banners</li>
            </ol>
        </nav>
        <div class="mb-9">
            <div class="row g-3 mb-4">
                <div class="col-auto">
                    <h2 class="mb-0">Banners</h2>
                </div>
            </div>
            <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#"><span>All </span><span
                                class="text-body-tertiary fw-semibold"
                                id="total-banners">({{ count($banners) }})</span></a></li>
            </ul>
            <div id="banners-list"
                data-list='{"valueNames":["banner-title","banner-type","banner-link","banner-status"],"page":10,"pagination":true}'>
                <div class="mb-4">
                    <div class="d-flex flex-wrap gap-3">
                        <div class="search-box">
                            <form class="position-relative"><input class="form-control search-input search" type="search"
                                    placeholder="Search banners" aria-label="Search" />
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                        </div>
                        <div class="ms-xxl-auto">
                            <button class="btn btn-primary" id="addBannerBtn" data-bs-toggle="modal"
                                data-bs-target="#bannerModal">
                                <span class="fas fa-plus me-2"></span>Add Banner
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
                                    <th class="white-space-nowrap fs-9 align-middle ps-0" style="max-width:20px; width:18px;">
                                        <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                id="checkbox-bulk-banners-select" type="checkbox"
                                                data-bulk-select='{"body":"banners-table-body"}' /></div>
                                    </th>
                                    <th class="sort white-space-nowrap align-middle fs-10" scope="col" style="width:70px;">Image</th>
                                    <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:200px;" data-sort="banner-title">TITLE</th>
                                    <th class="sort align-middle ps-4" scope="col" style="width:150px;">TYPE</th>
                                    <th class="sort align-middle ps-4" scope="col" style="width:250px;">LINK</th>
                                    <th class="sort align-middle ps-4" scope="col" style="width:100px;">STATUS</th>
                                    <th class="sort text-end align-middle pe-0 ps-4" scope="col">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="banners-table-body"> {{-- Dữ liệu ban đầu được đổ bằng Blade --}}
                                @if (isset($banners) && count($banners) > 0)
                                    @foreach ($banners as $banner)
                                        <tr class="position-static">
                                            <td class="fs-9 align-middle">
                                                <div class="form-check mb-0 fs-8">
                                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"bannerId":{{ $banner->id }}}' />
                                                </div>
                                            </td>
                                            <td class="align-middle white-space-nowrap py-0 banner-img">
                                                @if ($banner->image_path)
                                                    <a class="d-block border border-translucent rounded-2" href="{{ asset('storage/' . $banner->image_path) }}" target="_blank">
                                                        <img src="{{ asset('storage/' . $banner->image_path) }}" alt="{{ $banner->title }}" width="53" />
                                                    </a>
                                                @else
                                                    <div class="d-block border border-translucent rounded-2 text-center" style="width:53px; height:53px; line-height:53px;">
                                                        <i class="fas fa-image text-body-secondary"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="banner-title align-middle ps-4">
                                                <a class="fw-semibold line-clamp-3 mb-0" href="#">{{ $banner->title ?? 'N/A' }}</a>
                                            </td>
                                            <td class="banner-type align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                                {{-- Sử dụng PHP để map type sang mô tả --}}
                                                @php
                                                    $bannerTypeMap = [
                                                        1 => 'Logo',
                                                        2 => 'Ảnh nền footer',
                                                        3 => 'Banner trang chủ',
                                                        4 => 'Ảnh slider',
                                                        5 => 'Banner sản phẩm',
                                                        6 => 'Khách hàng đã mua',
                                                        7 => 'Địa điểm đã giao xe',
                                                    ];
                                                @endphp
                                                {{ $bannerTypeMap[$banner->type] ?? 'Unknown' }}
                                            </td>
                                            <td class="banner-link align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                                                @if ($banner->link)
                                                    <a href="{{ $banner->link }}" target="_blank" class="text-primary">View Link</a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td class="banner-status align-middle white-space-nowrap text-body-quaternary fs-9 ps-4 fw-semibold">
                                                @if ($banner->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
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
                                                        <a class="dropdown-item edit-banner-btn" href="#"
                                                            data-id="{{ $banner->id }}">Edit</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item text-danger delete-banner-btn"
                                                            href="#" data-id="{{ $banner->id }}">Remove</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">No banners found.</td>
                                    </tr>
                                @endif
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

    {{-- Modal để thêm/sửa banner --}}
    <div class="modal fade" id="bannerModal" tabindex="-1" aria-labelledby="bannerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="bannerForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" name="banner_id" id="bannerId">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bannerModalLabel">Add New Banner</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="bannerType" class="form-label">Banner Type</label>
                            <select class="form-select" id="bannerType" name="type" required>
                                <option value="">-- Select Type --</option>
                                <option value="1">Logo</option>
                                <option value="2">Footer Background</option>
                                <option value="3">Homepage Banner</option>
                                <option value="4">Slider Image</option>
                                <option value="5">Product Banner</option>
                                <option value="6">Khách hàng đã mua</option>
                                <option value="7">Địa điểm đã giao xe</option>
                            </select>
                            <div class="text-danger" id="typeError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="bannerTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="bannerTitle" name="title">
                            <div class="text-danger" id="titleError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="bannerImage" class="form-label">Image File</label>
                            <input class="form-control" type="file" id="bannerImage" name="image_file">
                            <div class="text-danger" id="image_fileError"></div>
                            <img id="currentBannerImage" src="" alt="Current Image" class="img-thumbnail mt-2" style="max-width: 100px; display: none;">
                            <input type="hidden" name="current_image_path" id="currentImagePath"> {{-- Hidden field to hold current image path --}}
                        </div>
                        <div class="mb-3"> {{-- Thêm div cho Link --}}
                            <label for="bannerLink" class="form-label">Link (URL)</label>
                            <input type="url" class="form-control" id="bannerLink" name="link"> {{-- Input cho link --}}
                            <div class="text-danger" id="linkError"></div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="bannerStatus" name="is_active" value="1" checked>
                            <label class="form-check-label" for="bannerStatus">
                                Active
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveBannerBtn">Save Banner</button>
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
            // Hàm cập nhật bảng banner sau khi thêm/sửa/xóa thành công
            function updateBannerTable(banners) {
                let tableBody = $('#banners-table-body');
                tableBody.empty(); // Xóa các hàng hiện có

                // Kiểm tra nếu banners là một mảng và có dữ liệu
                if (Array.isArray(banners) && banners.length > 0) {
                    const BANNER_TYPES_MAP = {
                        1: 'Logo',
                        2: 'Ảnh nền footer',
                        3: 'Banner trang chủ',
                        4: 'Ảnh slider',
                        5: 'Banner sản phẩm',
                        6: 'Khách hàng đã mua',
                        7: 'Địa điểm đã giao xe',
                    };

                    banners.forEach(banner => {
                        let statusBadge = banner.is_active ?
                            '<span class="badge bg-success">Active</span>' :
                            '<span class="badge bg-secondary">Inactive</span>';

                        let imageHtml = banner.image_path ?
                            `<a class="d-block border border-translucent rounded-2" href="${banner.image_path}" target="_blank"><img src="${banner.image_path}" alt="${banner.title}" width="53" /></a>` :
                            `<div class="d-block border border-translucent rounded-2 text-center" style="width:53px; height:53px; line-height:53px;"><i class="fas fa-image text-body-secondary"></i></div>`;

                        let linkHtml = banner.link ?
                            `<a href="${banner.link}" target="_blank" class="text-primary">View Link</a>` :
                            'N/A';
                        
                        tableBody.append(`
                            <tr class="position-static">
                                <td class="fs-9 align-middle">
                                    <div class="form-check mb-0 fs-8">
                                        <input class="form-check-input" type="checkbox" data-bulk-select-row='{"bannerId":${banner.id}}' />
                                    </div>
                                </td>
                                <td class="align-middle white-space-nowrap py-0 banner-img">
                                    ${imageHtml}
                                </td>
                                <td class="banner-title align-middle ps-4">
                                    <a class="fw-semibold line-clamp-3 mb-0" href="#">${banner.title || 'N/A'}</a>
                                </td>
                                <td class="banner-type align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                    ${BANNER_TYPES_MAP[banner.type] || 'Unknown'}
                                </td>
                                <td class="banner-link align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                                    ${linkHtml}
                                </td>
                                <td class="banner-status align-middle white-space-nowrap text-body-quaternary fs-9 ps-4 fw-semibold">
                                    ${statusBadge}
                                </td>
                                <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                    <div class="btn-reveal-trigger position-static">
                                        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                                type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                            <span class="fas fa-ellipsis-h fs-10"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end py-2">
                                            <a class="dropdown-item edit-banner-btn" href="#" data-id="${banner.id}">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger delete-banner-btn" href="#" data-id="${banner.id}">Remove</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `);
                    });
                } else {
                    tableBody.append('<tr><td colspan="7" class="text-center">No banners found.</td></tr>');
                }
                $('#total-banners').text(`(${banners.length})`); // Cập nhật tổng số banners
            }

            // Handle "Add Banner" button click
            $('#addBannerBtn').on('click', function() {
                $('#bannerModalLabel').text('Add New Banner');
                $('#bannerForm')[0].reset(); // Reset form fields
                $('#formMethod').val('POST'); // Set method to POST for creating
                $('#bannerId').val(''); // Clear banner ID
                $('#currentBannerImage').hide().attr('src', ''); // Hide and clear image preview
                $('#bannerStatus').prop('checked', true); // Default status to active
                $('#currentImagePath').val(''); // Clear hidden image path
                $('.text-danger').text(''); // Clear previous validation errors
                $('#bannerModal').modal('show');
            });

            // Handle "Edit" button click
            $(document).on('click', '.edit-banner-btn', function() {
                let id = $(this).data('id');

                $('#bannerModalLabel').text('Edit Banner');
                $('#bannerForm')[0].reset(); // Reset form fields
                $('#formMethod').val('PUT'); // Set method to PUT for updating
                $('#bannerId').val(id); // Set banner ID
                $('.text-danger').text(''); // Clear previous validation errors

                $.ajax({
                    url: `/banners/${id}/edit`, // Route để lấy chi tiết banner
                    method: 'GET',
                    success: function(response) {
                        let banner = response.banner;
                        $('#bannerType').val(banner.type);
                        $('#bannerTitle').val(banner.title);
                        $('#bannerLink').val(banner.link); // Đảm bảo có input #bannerLink
                        $('#bannerStatus').prop('checked', banner.is_active == 1);

                        if (banner.image_path) {
                            $('#currentBannerImage').attr('src', banner.image_path).show();
                            $('#currentImagePath').val(banner.image_path); // Lưu đường dẫn ảnh đầy đủ vào hidden field
                        } else {
                            $('#currentBannerImage').hide().attr('src', '');
                            $('#currentImagePath').val('');
                        }

                        $('#bannerModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching banner for edit:", error);
                        Swal.fire('Error!', 'Failed to load banner details. Check console for more info.', 'error');
                    }
                });
            });

            // Handle form submission (Add/Edit)
            $('#bannerForm').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let bannerId = $('#bannerId').val();
                let method = $('#formMethod').val(); // POST or PUT
                let url = method === 'POST' ? "{{ route('banners.store') }}" : `/banners/${bannerId}`;

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
                        $('#bannerModal').modal('hide');
                        updateBannerTable(response.banners); // Cập nhật bảng với dữ liệu mới từ response
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
            $(document).on('click', '.delete-banner-btn', function() {
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
                            url: `/banners/${id}`,
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire('Deleted!', response.success, 'success');
                                updateBannerTable(response.banners); // Cập nhật bảng với dữ liệu mới từ response
                            },
                            error: function(xhr, status, error) {
                                console.error("Error deleting banner:", error);
                                Swal.fire('Error!', xhr.responseJSON.error ||
                                    'Failed to delete banner.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush