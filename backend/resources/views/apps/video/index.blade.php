@extends('layouts.app')
@section('title', 'Videos Management')
@section('content')
    <div class="content">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            </ol>
        </nav>
        <div class="mb-9">
            <div class="row g-3 mb-4">
                <div class="col-auto">
                    <h2 class="mb-0">Videos</h2>
                </div>
            </div>
            <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#"><span>All </span><span
                            class="text-body-tertiary fw-semibold" id="total-videos">({{ count($videos) }})</span></a></li>
            </ul>
            <div id="videos-list"
                data-list='{"valueNames":["video-name","video-link","video-status"],"page":10,"pagination":true}'>
                <div class="mb-4">
                    <div class="d-flex flex-wrap gap-3">
                        <div class="search-box">
                            <form class="position-relative"><input class="form-control search-input search" type="search"
                                    placeholder="Search videos" aria-label="Search" />
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                        </div>
                        <div class="ms-xxl-auto">
                            <button class="btn btn-primary" id="addVideoBtn" data-bs-toggle="modal"
                                data-bs-target="#videoModal">
                                <span class="fas fa-plus me-2"></span>Add Video
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
                                                id="checkbox-bulk-banners-select" type="checkbox"
                                                data-bulk-select='{"body":"banners-table-body"}' /></div>
                                    </th>
                                    <th class="sort white-space-nowrap align-middle ps-4" scope="col"
                                        style="width:200px;" data-sort="video-name">Video</th>
                                    <th class="sort white-space-nowrap align-middle ps-4" scope="col"
                                        style="width:200px;" data-sort="video-name">TITLE</th>
                                    <th class="sort align-middle ps-4" scope="col" style="width:150px;">CATEGORIES</th>
                                    <th class="sort align-middle ps-4" scope="col" style="width:250px;">DESCRIPTION</th>
                                    <th class="sort align-middle ps-4" scope="col" style="width:100px;">STATUS</th>
                                    <th class="sort text-end align-middle pe-0 ps-4" scope="col">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="videos-table-body">
                                @if (isset($videos) && count($videos) > 0)
                                    @foreach ($videos as $video)
                                        <tr class="position-static">
                                            <td class="fs-9 align-middle">
                                                <div class="form-check mb-0 fs-8">
                                                    <input class="form-check-input" type="checkbox"
                                                        data-bulk-select-row='{"videoId":{{ $video->id }}}' />
                                                </div>
                                            </td>
                                            <td class="align-middle white-space-nowrap py-0 video-thumb">
                                                <div class="position-relative" style="width: 160px; height: 90px;">
                                                    @if ($video->img_banner)
                                                        <img src="{{ asset('storage/' . $video->img_banner) }}"
                                                            alt=""
                                                            class="w-100 h-100 object-fit-cover rounded cursor-pointer"
                                                            onclick="playVideo('{{ $video->video }}', '{{ $video->name }}')" />
                                                    @else
                                                        <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light rounded cursor-pointer"
                                                            onclick="playVideo('{{ $video->video }}', '{{ $video->name }}')">
                                                            <i class="fas fa-play fa-2x text-primary"></i>
                                                        </div>
                                                    @endif
                                                    <div class="position-absolute bottom-0 end-0 p-2">
                                                        <i class="fas fa-play-circle text-white fa-lg"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="video-name align-middle ps-4">
                                                <a class="fw-semibold text-truncate mb-0" href="#"
                                                    onclick="playVideo('{{ $video->video }}')">
                                                    {{ $video->name }}
                                                </a>
                                            </td>
                                            <td class="video-categories align-middle ps-4">
                                                @if ($video->categories->count() > 0)
                                                    @foreach ($video->categories as $category)
                                                        <span class="badge bg-info me-1">{{ $category->name }}</span>
                                                    @endforeach
                                                @else
                                                    <span class="text-muted">Chào bán xe tại showroom</span>
                                                @endif
                                            </td>
                                            <td class="video-description align-middle ps-4">
                                                {{ Str::limit($video->description, 100) ?? 'No description' }}
                                            </td>
                                            <td class="video-status align-middle text-center ps-4">
                                                <div class="form-check form-switch d-flex justify-content-center">
                                                    <input class="form-check-input toggle-status" type="checkbox"
                                                        data-id="{{ $video->id }}"
                                                        {{ $video->status ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td class="align-middle text-end pe-0 ps-4">
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-falcon-default btn-sm dropdown-toggle dropdown-caret-none"
                                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item edit-video-btn" href="#"
                                                            data-id="{{ $video->id }}">
                                                            <i class="fas fa-edit me-1"></i>Edit
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">No videos found.</td>
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

        {{-- Modal để thêm/sửa video --}}
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="videoForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="formMethod" value="POST">
                        <input type="hidden" name="video_id" id="videoId">
                        <div class="modal-header">
                            <h5 class="modal-title" id="videoModalLabel">Add New Video</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="videoName" class="form-label">Title</label>
                                <input type="text" class="form-control" id="videoName" name="name" required>
                                <div class="text-danger" id="nameError"></div>
                            </div>
                            <div class="mb-3">
                                <label for="videoFile" class="form-label">Video File</label>
                                <input type="file" class="form-control" id="videoFile" name="video_file"
                                    accept="video/*" required>
                                <div class="text-danger" id="video_fileError"></div>
                                <div id="currentVideo" class="mt-2" style="display: none;">
                                    <video controls style="max-width: 100%; max-height: 200px;">
                                        <source src="" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="videoBanner" class="form-label">Banner Image</label>
                                <input class="form-control" type="file" id="videoBanner" name="img_banner">
                                <div class="text-danger" id="img_bannerError"></div>
                                <img id="currentVideoBanner" src="" alt="Current Banner"
                                    class="img-thumbnail mt-2" style="max-width: 100px; display: none;">
                            </div>
                            <div class="mb-3">
                                <label for="videoCategories" class="form-label">Categories</label>
                                <select class="form-select" id="videoCategories" name="categories[]" multiple>
                                    <option value="">Chào bán xe tại showroom</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <small class="text-warning">*Chọn "Chào bán xe tại showroom" nếu video này dành cho mọi danh mục</small>
                                <div class="text-danger" id="categoriesError"></div>
                            </div>
                            <div class="mb-3">
                                <label for="videoDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="videoDescription" name="description" rows="3"></textarea>
                                <div class="text-danger" id="descriptionError"></div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="videoStatus" name="status"
                                    value="1" checked>
                                <label class="form-check-label" for="videoStatus">
                                    Active
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="saveVideoBtn">Save Video</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Video Player Modal --}}
        <div class="modal fade" id="videoPlayerModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-dark">
                    <div class="modal-header border-0">
                        <h5 class="modal-title text-white" id="videoPlayerTitle"></h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <video id="videoPlayer" class="w-100" controls style="max-height: calc(100vh - 200px);">
                            <source src="" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            let videoPlayerModal;
            let videoPlayer;

            function playVideo(videoUrl, title) {
                if (!videoPlayerModal) {
                    videoPlayerModal = new bootstrap.Modal(document.getElementById('videoPlayerModal'));
                }

                videoPlayer = document.getElementById('videoPlayer');
                document.getElementById('videoPlayerTitle').textContent = title;

                // Set video source and load it
                videoPlayer.src = '/storage/' + videoUrl;
                videoPlayer.load(); // Show modal
                videoPlayerModal.show();

                // Play video when modal is shown
                document.getElementById('videoPlayerModal').addEventListener('shown.bs.modal', function() {
                    videoPlayer.play();
                });

                // Pause video when modal is hidden
                document.getElementById('videoPlayerModal').addEventListener('hide.bs.modal', function() {
                    videoPlayer.pause();
                });
            }

            // Close video player when clicking outside
            $(document).on('click', function(e) {
                if ($(e.target).closest('.modal-content').length === 0) {
                    videoPlayerModal?.hide();
                }
            });

            $(document).ready(function() {
                // Hàm cập nhật bảng video sau khi thêm/sửa/xóa thành công
                function updateVideoTable(videos) {
                    let tableBody = $('#videos-table-body');
                    tableBody.empty(); // Xóa các hàng hiện có

                    // Kiểm tra nếu videos là một mảng và có dữ liệu
                    if (Array.isArray(videos) && videos.length > 0) {

                        videos.forEach(video => {
                            let statusBadge = video.status ?
                                '<span class="badge bg-success">Active</span>' :
                                '<span class="badge bg-secondary">Inactive</span>';

                            let imageHtml = video.img_banner ?
                                `<a class="d-block border border-translucent rounded-2" href="/storage/${video.img_banner}" target="_blank"><img src="/storage/${video.img_banner}" alt="${video.name}" width="100%" /></a>` :
                                `<div class="d-block border border-translucent rounded-2 text-center" style="width:53px; height:53px; line-height:53px;"><i class="fas fa-video text-body-secondary"></i></div>`;

                            let videoHtml = video.video ?
                                `<a href="${video.video}" target="_blank" class="text-primary" onclick="playVideo(event, '${video.video}')">Play Video</a>` :
                                'N/A';

                            tableBody.append(`
                            <tr class="position-static">
                                <td class="fs-9 align-middle">
                                    <div class="form-check mb-0 fs-8">
                                        <input class="form-check-input" type="checkbox" data-bulk-select-row='{"videoId":${video.id}}' />
                                    </div>
                                </td>
                                <td class="align-middle white-space-nowrap py-0 video-thumb">
                                    <div class="position-relative" style="width: 160px; height: 90px;">
                                        ${imageHtml}
                                        <div class="position-absolute bottom-0 end-0 p-2">
                                            <i class="fas fa-play-circle text-white fa-lg"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="video-name align-middle ps-4">
                                    <a class="fw-semibold text-truncate mb-0" href="#" onclick="playVideo('${video.video}', '${video.name}')">
                                        ${video.name}
                                    </a>
                                </td>
                                <td class="video-categories align-middle ps-4">
                                    ${video.categories && video.categories.length > 0 ? 
                                        video.categories.map(category => `<span class="badge bg-info me-1">${category.name}</span>`).join('') 
                                        : '<span class="text-muted">Chào bán xe tại showroom</span>'}
                                </td>
                                <td class="video-description align-middle ps-4">
                                    ${video.description || 'No description'}
                                </td>
                                <td class="video-status align-middle text-center ps-4">
                                    <div class="form-check form-switch d-flex justify-content-center">
                                        <input class="form-check-input toggle-status" type="checkbox" data-id="${video.id}" ${video.status ? 'checked' : ''}>
                                    </div>
                                </td>
                                <td class="align-middle text-end pe-0 ps-4">
                                    <div class="btn-group">
                                        <button class="btn btn-falcon-default btn-sm dropdown-toggle dropdown-caret-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item edit-video-btn" href="#" data-id="${video.id}">
                                                <i class="fas fa-edit me-1"></i>Edit
                                            </a>
                                            <div class="dropdown-divider"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `);
                        });
                    } else {
                        tableBody.append('<tr><td colspan="7" class="text-center">No banners found.</td></tr>');
                    }
                    $('#total-videos').text(`(${videos.length})`); // Cập nhật tổng số videos
                }

                // Handle "Add Video" button click
                $('#addVideoBtn').on('click', function() {
                    $('#videoModalLabel').text('Add New Video');
                    $('#videoForm')[0].reset(); // Reset form fields
                    $('#formMethod').val('POST'); // Set method to POST for creating
                    $('#videoId').val(''); // Clear video ID
                    $('#currentVideoBanner').hide().attr('src', ''); // Hide and clear banner preview
                    $('#videoStatus').prop('checked', true); // Default status to active
                    $('.text-danger').text(''); // Clear previous validation errors
                    $('#videoModal').modal('show');
                });

                // Handle "Edit" button click
                $(document).on('click', '.edit-video-btn', function(e) {
                    e.preventDefault();
                    let id = $(this).data('id');

                    $('#videoModalLabel').text('Edit Video');
                    $('#videoForm')[0].reset(); // Reset form fields
                    $('#formMethod').val('PUT'); // Set method to PUT for updating
                    $('#videoId').val(id); // Set video ID
                    $('.text-danger').text(''); // Clear previous validation errors

                    $.ajax({
                        url: `/videos/${id}/edit`,
                        method: 'GET',
                        success: function(response) {
                            let video = response.video;
                            $('#videoName').val(video.name);
                            $('#videoDescription').val(video.description);
                            $('#videoStatus').prop('checked', video.status);

                            // Set selected categories
                            if (video.categories && video.categories.length > 0) {
                                let selectedCategories = video.categories.map(cat => cat.id);
                                $('#videoCategories').val(selectedCategories);
                            } else {
                                // Nếu không có categories, chọn option "Chào bán xe tại showroom"
                                $('#videoCategories').val(['']);
                            }

                            // Show current video if exists
                            if (video.video) {
                                $('#currentVideo').show();
                                $('#currentVideo video source').attr('src', '/storage/' + video
                                    .video);
                                $('#currentVideo video')[0].load();
                                $('#videoFile').removeAttr('required');
                            }

                            // Show current banner if exists
                            if (video.img_banner) {
                                $('#currentVideoBanner').attr('src', '/storage/' + video.img_banner)
                                    .show();
                            }

                            $('#videoModal').modal('show');
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching video for edit:", error);
                            Swal.fire('Error!',
                                'Failed to load video details. Check console for more info.',
                                'error');
                        }
                    });
                });

                // Handle form submission (Add/Edit)
                $('#videoForm').on('submit', function(e) {
                    e.preventDefault();

                    let formData = new FormData(this);
                    let videoId = $('#videoId').val();
                    let method = $('#formMethod').val(); // POST or PUT
                    let url = method === 'POST' ? "{{ route('videos.store') }}" : `/videos/${videoId}`;

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
                            $('#videoModal').modal('hide');
                            updateVideoTable(response
                                .videos); // Cập nhật bảng với dữ liệu mới từ response
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
                $(document).on('click', '.delete-video-btn', function() {
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
                                url: `/videos/${id}`,
                                method: 'DELETE',
                                data: {
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    Swal.fire('Deleted!', response.success, 'success');
                                    updateVideoTable(response
                                        .videos
                                    ); // Cập nhật bảng với dữ liệu mới từ response
                                },
                                error: function(xhr, status, error) {
                                    console.error("Error deleting video:", error);
                                    Swal.fire('Error!', xhr.responseJSON.error ||
                                        'Failed to delete video.', 'error');
                                }
                            });
                        }
                    });
                });

                // Handle toggle status
                $(document).on('change', '.toggle-status', function() {
                    let id = $(this).data('id');
                    let status = $(this).is(':checked');

                    $.ajax({
                        url: `/videos/${id}/toggle-status`,
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            status: status
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Status Updated',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        },
                        error: function(xhr) {
                            Swal.fire('Error!', 'Failed to update status', 'error');
                            // Revert checkbox state on error
                            $(this).prop('checked', !status);
                        }
                    });
                });
                // Handle select change for categories
                $('#videoCategories').on('change', function() {
                    let selectedValues = $(this).val();
                    if (selectedValues && selectedValues.includes('')) {
                        // Nếu "Chào bán xe tại showroom" được chọn, bỏ chọn các option khác
                        $(this).val(['']);
                    }
                });
            });
        </script>
    @endpush
