@extends('layouts.app')
@section('title', 'Notifications')
@section('content')
    <div class="content">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('notifications.index') }}">Notifications</a></li>
                <li class="breadcrumb-item active">List Notifications</li>
            </ol>
        </nav>

        <div class="mb-9">
            <div class="row g-3 mb-4">
                <div class="col-auto">
                    <h2 class="mb-0">Notifications</h2>
                </div>
                <div class="col-auto ms-auto">
                    <a href="#" id="addNotificationBtn" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#notificationModal">
                        <span class="fas fa-plus me-2"></span> Add Notification
                    </a>
                </div>
            </div>

            {{-- <div class="table-responsive">
                <table class="table table-sm align-middle">
                    <thead>
                        <tr>
                            <th style="width:30px;"><input type="checkbox" /></th>
                            <th>Type</th>
                            <th>Title</th>
                            <th>Message</th>
                            <th>Audience</th>
                            <th>Channel</th>
                            <th>Priority</th>
                            <th>Expires</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($notifications ?? [] as $notification)
                            <tr id="notification-row-{{ $notification->id }}"
                                data-id="{{ $notification->id }}"
                                data-type="{{ $notification->type }}"
                                data-notifiable-type="{{ $notification->notifiable_type }}"
                                data-notifiable-id="{{ $notification->notifiable_id }}"
                                data-title="{{ e($notification->title) }}"
                                data-message="{{ e($notification->message) }}"
                                data-audience="{{ $notification->audience }}"
                                data-channel="{{ $notification->channel }}"
                                data-priority="{{ $notification->priority }}"
                                data-is-active="{{ $notification->is_active }}"
                                data-is-banner="{{ $notification->is_banner }}"
                                data-is-sent="{{ $notification->is_sent }}"
                                data-sent-by="{{ $notification->sent_by }}"
                                data-read-at="{{ $notification->read_at }}"
                                data-category="{{ $notification->category }}"
                                data-action-url="{{ $notification->action_url }}"
                                data-expires-at="{{ $notification->expires_at }}"
                                data-data='@json($notification->data)'
                            >
                                <td><input type="checkbox" /></td>
                                <td class="fw-semibold">{{ $notification->title }}</td>
                                <td style="max-width:300px; overflow:hidden; text-overflow:ellipsis;">{{ Str::limit($notification->message, 120) }}</td>
                                <td>{{ ucfirst($notification->audience) }}</td>
                                <td>{{ ucfirst($notification->channel) }}</td>
                                <td>
                                    @if ($notification->priority == 1)
                                        <span class="badge bg-danger">High</span>
                                    @elseif($notification->priority == 2)
                                        <span class="badge bg-secondary">Normal</span>
                                    @else
                                        <span class="badge bg-light text-dark">Low</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($notification->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item edit-notification-btn" href="#">Edit</a>
                                            <form method="POST" action="{{ route('notifications.toggle-active', ['id' => $notification->id]) }}" class="px-3 py-1">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-primary w-100">Toggle Active</button>
                                            </form>
                                            <div class="dropdown-divider"></div>
                                            <form method="POST" action="{{ route('notifications.destroy', ['id' => $notification->id]) }}" class="px-3 py-1 delete-notification-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger w-100">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Không có thông báo nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div> --}}
            <div
                class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis border-top border-bottom border-translucent position-relative top-1">
                <div class="table-responsive scrollbar mx-n1 px-1">
                    <table class="table fs-9 mb-0">
                        <thead>
                            <tr>
                                <th class="white-space-nowrap fs-9 align-middle ps-0" style="max-width:20px; width:18px;">
                                    <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                            id="checkbox-bulk-products-select" type="checkbox"
                                            data-bulk-select='{"body":"tags-table-body"}' /></div>
                                </th>
                                <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:350px;"
                                    data-sort="tag-name">TIÊU ĐỀ</th>
                                <th class="sort align-middle ps-4" scope="col" data-sort="tag-slug" style="width:150px;">
                                    NỘI DUNG</th>
                                <th class="sort align-middle ps-4" scope="col" data-sort="status" style="width:150px;">
                                    MỨC ĐỘ ƯU TIÊN</th>
                                <th class="sort align-middle ps-3" scope="col" data-sort="description"
                                    style="width:250px;">HOẠT ĐỘNG</th>
                                <th class="sort align-middle ps-3" scope="col" data-sort="description"
                                    style="width:250px;">POPUP</th>
                                <th class="sort align-middle ps-3" scope="col" data-sort="description"
                                    style="width:250px;">TRANG</th>
                                <th class="sort align-middle ps-3" scope="col" data-sort="description"
                                    style="width:250px;">ĐỐI TƯỢNG NHẬN THÔNG BÁO</th>
                                <th class="sort align-middle ps-3" scope="col" data-sort="description"
                                    style="width:250px;">KÊNH NHẬN THÔNG BÁO</th>
                                <th class="sort align-middle ps-3" scope="col" data-sort="description"
                                    style="width:250px;">DANH MỤC</th>
                                <th class="sort align-middle ps-3" scope="col" data-sort="description"
                                    style="width:250px;">NGÀY HẾT HẠN</th>
                                <th class="sort align-middle ps-3" scope="col" data-sort="description"
                                    style="width:250px;">ĐÃ GỬI</th>
                                <th class="sort text-end align-middle pe-0 ps-4" scope="col"></th>
                                <th class="sort text-end align-middle pe-0 ps-4" scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="tags-table-body">
                            @forelse($notifications ?? [] as $notification)
                                <tr class="position-static" id="notification-row-{{ $notification->id }}"
                                    data-id="{{ $notification->id }}" data-type="{{ $notification->type }}"
                                    data-notifiable-type="{{ $notification->notifiable_type }}"
                                    data-notifiable-id="{{ $notification->notifiable_id }}"
                                    data-title="{{ e($notification->title) }}"
                                    data-message="{{ e($notification->message) }}"
                                    data-audience="{{ $notification->audience }}"
                                    data-channel="{{ $notification->channel }}"
                                    data-priority="{{ $notification->priority }}"
                                    data-is-active="{{ $notification->is_active }}"
                                    data-is-banner="{{ $notification->is_banner }}"
                                    data-is-sent="{{ $notification->is_sent }}"
                                    data-sent-by="{{ $notification->sent_by }}"
                                    data-read-at="{{ $notification->read_at }}"
                                    data-category="{{ $notification->category }}"
                                    data-action-url="{{ $notification->action_url }}"
                                    data-expires-at="{{ $notification->expires_at }}"
                                    data-data='@json($notification->data)'>
                                    <td class="fs-9 align-middle">
                                        <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox"
                                                data-bulk-select-row='{"tagId":{{ $notification->id }}}' />
                                        </div>
                                    </td>
                                    <td
                                        class="tag-slug align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                        {{ $notification->title }}
                                    </td>
                                    <td
                                        class="tag-slug align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                        {{ $notification->message }}
                                    </td>
                                    <td
                                        class="tag-slug align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                        @if ($notification->priority == 1)
                                            <span class="badge text-danger">Cao</span>
                                        @elseif($notification->priority == 2)
                                            <span class="badge text-white">Bình thường</span>
                                        @else
                                            <span class="badge text-light text-dark">Thấp</span>
                                        @endif
                                    </td>
                                    <td
                                        class="tag-slug align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                        @if ($notification->is_active == 1)
                                            <span class="badge text-success">Hoạt động</span>
                                        @else
                                            <span class="badge text-white">Không hoạt động</span>
                                        @endif
                                    </td>
                                    <td
                                        class="tag-slug align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                        @if ($notification->is_popup == 1)
                                            <span class="badge text-success">Hoạt động</span>
                                        @else
                                            <span class="badge bg-secondary">Không hoạt động</span>
                                        @endif
                                    </td>
                                    <td
                                        class="tag-slug align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                        {{ $notification->is_displayed }}
                                    </td>
                                    <td
                                        class="tag-slug align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                        @if ($notification->audience == 'admin')
                                            <span class="badge">Quản trị</span>
                                        @elseif($notification->audience == 'user')
                                            <span class="badge">Người dùng</span>
                                        @else
                                            <span class="badge">Cả hệ thống</span>
                                        @endif
                                    </td>
                                    <td
                                        class="tag-slug align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                        {{ $notification->channel }}
                                    </td>
                                    <td
                                        class="tag-slug align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                        {{ $notification->category }}
                                    </td>
                                    <td
                                        class="status align-middle white-space-nowrap text-body-quaternary fs-9 ps-4 fw-semibold">
                                        {{ \Carbon\Carbon::parse($notification->expires_at)->format('d/m/Y') }}
                                    </td>
                                    <td
                                        class="tag-slug align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 fw-semibold">
                                        @if ($notification->is_sent == 1)
                                            <span class="badge bg-success">Đã gửi</span>
                                        @else
                                            <span class="badge bg-secondary">Chưa gửi</span>
                                        @endif
                                    </td>
                                    <td class="video-status align-middle text-center ps-4">
                                        <div class="form-check form-switch">
                                            <form method="POST" action="{{ route('notifications.toggle-active', ['id' => $notification->id]) }}" class="toggle-form">
                                                @csrf
                                                <input class="form-check-input toggle-status" type="checkbox" name="is_active" 
                                                    onchange="this.form.submit()" 
                                                    {{ $notification->is_active ? 'checked' : '' }}>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                        <div class="btn-reveal-trigger position-static">
                                            <button
                                                class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                                type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false"
                                                data-bs-reference="parent"><span
                                                    class="fas fa-ellipsis-h fs-10"></span></button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item edit-notification-btn" href="#">Edit</a>
                                                
                                                <div class="dropdown-divider"></div>
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
                        <ul class="mb-0 pagination"></ul><button class="page-link pe-0" data-list-pagination="next"><span
                                class="fas fa-chevron-right"></span></button>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                @if (method_exists($notifications, 'links'))
                    {{ $notifications->links() }}
                @endif
            </div>
        </div>

        @include('partials.footer')
    </div>

    <!-- Modal -->
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="notificationForm" method="POST" action="{{ route('notifications.store') }}">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" name="notification_id" id="notificationId">

                    <div class="modal-header">
                        <h5 class="modal-title" id="notificationModalLabel">Add Notification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Tiêu đề</label>
                                <input type="text" name="title" id="notificationTitle" class="form-control"
                                    required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Nội dung</label>
                                <textarea name="message" id="notificationMessage" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Đối tượng</label>
                                <select name="audience" id="notificationAudience" class="form-select">
                                    <option value="user">Người dùng</option>
                                    <option value="admin">Quản trị viên</option>
                                    <option value="both">Cả hai</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Kênh nhận thông báo</label>
                                <select name="channel" id="notificationChannel" class="form-select">
                                    <option value="mail">Mail</option>
                                    <option value="database">Cơ sở dữ liệu</option>
                                    <option value="push">Đẩy</option>
                                    <option value="broadcast">Phát sóng</option>
                                    <option value="system">Hệ thống</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Mức độ ưu tiên</label>
                                <select name="priority" id="notificationPriority" class="form-select">
                                    <option value="2">Bình thường</option>
                                    <option value="1">Cao</option>
                                    <option value="3">Thấp</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Danh mục</label>
                                <select name="category" id="notificationCategory" class="form-select">
                                    <option value="">-- Chọn danh mục --</option>
                                    <option value="Tính năng mới">Tính năng mới</option>
                                    <option value="Cập nhật">Cập nhật</option>
                                    <option value="Xóa">Xóa</option>
                                    <option value="Thông báo khẩn(gấp)">🔴 Thông báo khẩn (gấp)</option>
                                    <option value="Ngừng hỗ trợ">Ngừng hỗ trợ</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">URL hành động</label>
                                <input type="url" name="action_url" id="notificationActionUrl" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Hết hạn vào</label>
                                <input type="datetime-local" name="expires_at" id="notificationExpiresAt"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" id="notificationIsActive"
                                        name="is_active" value="1" checked>
                                    <label class="form-check-label">Kích hoạt</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" id="notificationIsPopup"
                                        name="is_popup" value="1">
                                    <label class="form-check-label">Popup</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" id="notificationIsBanner"
                                        name="is_banner" value="1">
                                    <label class="form-check-label">Banner</label>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Trang hiển thị</label>
                                    <select name="is_displayed" id="notificationDisplayPage" class="form-select"
                                        required>
                                        <option value="">-- Chọn trang hiển thị --</option>
                                        <optgroup label="Trang người dùng">
                                            @foreach ($displayPages['user'] as $value => $label)
                                                <option value="{{ $value }}">{{ $label }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Trang quản trị">
                                            @foreach ($displayPages['admin'] as $value => $label)
                                                <option value="{{ $value }}">{{ $label }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="notificationIsSent"
                                        name="is_sent" value="1">
                                    <label class="form-check-label">Mark as Sent</label>
                                </div>
                            </div>

                            <!-- Extra data input removed — data is auto-generated server-side from type/title/message -->

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveNotificationBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            // Open modal for creating
            $('#addNotificationBtn').on('click', function(e) {
                $('#notificationModalLabel').text('Add Notification');
                $('#notificationForm').attr('action', '{{ route('notifications.store') }}');
                $('#formMethod').val('POST');
                $('#notificationId').val('');
                $('#notificationForm')[0].reset();
                // defaults
                $('#notificationIsActive').prop('checked', true);
                $('#notificationIsDisplayed').prop('checked', true);
                $('#notificationIsPopup').prop('checked', false);
                $('#notificationIsBanner').prop('checked', false);
                $('#notificationIsSent').prop('checked', false);
            });

            // Open modal for editing
            $(document).on('click', '.edit-notification-btn', function(e) {
                e.preventDefault();
                const row = $(this).closest('tr');
                const id = row.data('id');
                $('#notificationModalLabel').text('Edit Notification');
                $('#notificationForm').attr('action', '/notifications/' + id);
                $('#formMethod').val('PUT');
                $('#notificationId').val(id);

                $('#notificationType').val(row.data('type'));
                $('#notificationNotifiableType').val(row.data('notifiable-type'));
                $('#notificationNotifiableId').val(row.data('notifiable-id'));
                $('#notificationTitle').val(row.data('title'));
                $('#notificationMessage').val(row.data('message'));
                $('#notificationAudience').val(row.data('audience'));
                $('#notificationChannel').val(row.data('channel'));
                $('#notificationPriority').val(row.data('priority'));
                $('#notificationCategory').val(row.data('category'));
                $('#notificationActionUrl').val(row.data('action-url') || row.data('actionUrl') || row.data(
                    'action_url'));
                $('#notificationSentBy').val(row.data('sent-by'));

                if (row.data('expires-at')) {
                    // try to convert to datetime-local format
                    const dt = new Date(row.data('expires-at'));
                    const iso = dt.toISOString().slice(0, 16);
                    $('#notificationExpiresAt').val(iso);
                }

                $('#notificationIsActive').prop('checked', !!row.data('is-active'));
                $('#notificationIsPopup').prop('checked', !!row.data('is-popup'));
                $('#notificationIsBanner').prop('checked', !!row.data('is-banner'));
                $('#notificationDisplayPage').val(row.data('display-page'));
                $('#notificationIsSent').prop('checked', !!row.data('is-sent'));

                $('#notificationModal').modal('show');
            });

            // Confirm delete
            $(document).on('submit', '.delete-notification-form', function(e) {
                if (!confirm('Are you sure you want to delete this notification?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endpush
