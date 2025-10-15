
<?php $__env->startSection('title', 'Quản lý tài khoản hệ thống'); ?>
<?php $__env->startSection('content'); ?>

    <head>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
            integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            toastr.options = {
                "position": 'top-right',
                "autoClose": 3000,
                "hideProgressBar": false,
                "closeOnClick": true,
                "pauseOnHover": true,
                "draggable": true,
                "progress": undefined
            };
        </script>
    </head>
    <div class="content">
        <h2 class="mb-2 lh-sm">Accounts Manager</h2>
        <p class="text-body-tertiary lead mb-2">Quản lý tất cả tài khoản của hệ thống & cấp quyền truy cập</p>
        <div class="mt-4">
            <div class="row g-4">
                <div class="col-12 col-xl-12 order-1 order-xl-0">
                    <div class="mb-9">
                        <div class="card shadow-none border mb-3" data-component-card="data-component-card">
                            <div class="card-header p-4 border-bottom bg-body">
                                <div class="row g-3 justify-content-between align-items-center">
                                    <div class="col-12 col-md">
                                        <h4 class="text-body mb-0" data-anchor="data-anchor">Accounts</h4>
                                    </div>
                                    <div class="col col-md-auto">
                                        <nav class="nav justify-content-end doc-tab-nav align-items-center" role="tablist">
                                            <button class="btn btn-link px-2 text-body copy-code-btn" type="button"><span
                                                    class="fas fa-copy me-1"></span>Copy
                                                Code</button><a class="btn btn-sm btn-phoenix-primary code-btn ms-2"
                                                data-bs-toggle="collapse" href="#example-code" role="button"
                                                aria-controls="example-code" aria-expanded="false"> <span class="me-2"
                                                    data-feather="code"></span>Phân quyền</a><a
                                                class="btn btn-sm btn-phoenix-primary preview-btn ms-2"><span class="me-2"
                                                    data-feather="eye"></span>Ẩn</a>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="collapse code-collapse" id="example-code">
                                    <pre class="scrollbar" style="max-height:420px">
                                        <code class="language-html">1234
                                        </code>
                                    </pre>
                                </div>
                                <div class="p-4 code-to-copy">
                                    <div class="d-flex align-items-center justify-content-end my-3">
                                        <div id="bulk-select-replace-element">
                                            <button class="btn btn-phoenix-success btn-sm" type="button">
                                                <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                                                <span class="ms-1">New</span>
                                            </button>
                                        </div>
                                        <div class="d-none ms-3" id="bulk-select-actions">
                                            <div class="d-flex">
                                                <select class="form-select form-select-sm" aria-label="Bulk actions">
                                                    <option selected="selected">Bulk actions</option>
                                                    <option value="Delete">Delete</option>
                                                    <option value="Archive">Archive</option>
                                                </select>
                                                <button class="btn btn-phoenix-danger btn-sm ms-2"
                                                    type="button">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tableExample"
                                        data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                                        <div class="table-responsive mx-n1 px-1">
                                            <table class="table table-sm border-top border-translucent fs-9 mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="white-space-nowrap fs-9 align-middle ps-0"
                                                            style="max-width:20px; width:18px;">
                                                            <div class="form-check mb-0 fs-8"><input
                                                                    class="form-check-input" id="bulk-select-example"
                                                                    type="checkbox"
                                                                    data-bulk-select='{"body":"bulk-select-body","actions":"bulk-select-actions","replacedElement":"bulk-select-replace-element"}' />
                                                            </div>
                                                        </th>
                                                        <th class="sort align-middle ps-3" data-sort="name">Name
                                                        </th>
                                                        <th class="sort align-middle" data-sort="email">Email</th>
                                                        <th class="sort align-middle" data-sort="age">Role</th>
                                                        <th class="sort text-end align-middle pe-0" scope="col">
                                                            ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list" id="bulk-select-body">
                                                    <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr data-user-id="<?php echo e($admin->id); ?>">
                                                            <td class="fs-9 align-middle">
                                                                <div class="form-check mb-0 fs-8">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        data-bulk-select-row="{&quot;name&quot;:&quot;Anna&quot;,&quot;email&quot;:&quot;anna@example.com&quot;,&quot;age&quot;:18}" />
                                                                </div>
                                                            </td>
                                                            <td class="align-middle ps-3 name"><?php echo e($admin->name); ?></td>
                                                            <td class="align-middle email"><?php echo e($admin->email); ?></td>
                                                            <td class="align-middle age">
                                                                <?php echo e($admin->roles->pluck('name')->implode(', ')); ?></td>
                                                            </td>
                                                            <td class="align-middle white-space-nowrap text-end pe-0">
                                                                <div class="btn-reveal-trigger position-static"><button
                                                                        class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                                                        type="button" data-bs-toggle="dropdown"
                                                                        data-boundary="window" aria-haspopup="true"
                                                                        aria-expanded="false"
                                                                        data-bs-reference="parent"><span
                                                                            class="fas fa-ellipsis-h fs-10"></span></button>
                                                                    <div class="dropdown-menu dropdown-menu-end py-2">
                                                                        
                                                                        
                                                                        <a class="dropdown-item edit-account-btn"
                                                                            href="#">Chỉnh sửa tài khoản</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item text-danger"
                                                                            href="#!">Xóa</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex flex-between-center pt-3 mb-3">
                                            <div class="pagination d-none"></div>
                                            <p class="mb-0 fs-9">
                                                <span class="d-none d-sm-inline-block"
                                                    data-list-info="data-list-info"></span>
                                                <span class="d-none d-sm-inline-block"> &mdash; </span>
                                                <a class="fw-semibold" href="#!" data-list-view="*">
                                                    View all
                                                    <span class="fas fa-angle-right ms-1"
                                                        data-fa-transform="down-1"></span>
                                                </a>
                                                <a class="fw-semibold d-none" href="#!" data-list-view="less">
                                                    View Less
                                                    <span class="fas fa-angle-right ms-1"
                                                        data-fa-transform="down-1"></span>
                                                </a>
                                            </p>
                                            <div class="d-flex">
                                                <button class="btn btn-sm btn-primary" type="button"
                                                    data-list-pagination="prev"><span>Previous</span></button>
                                                <button class="btn btn-sm btn-primary px-4 ms-2" type="button"
                                                    data-list-pagination="next"><span>Next</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050">
            <div class="toast align-items-center text-white bg-dark border-0" id="icon-copied-toast" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex" data-bs-theme="dark">
                    <div class="toast-body p-3"></div><button class="btn-close me-2 m-auto" type="button"
                        data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Chỉnh sửa Thông tin Người dùng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm">
                        <input type="hidden" id="editUserId" name="user_id">
                        <?php echo csrf_field(); ?> 

                        <ul class="nav nav-tabs mb-3" id="editUserTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="user-tab" data-bs-toggle="tab"
                                    data-bs-target="#user-pane" type="button" role="tab" aria-controls="user-pane"
                                    aria-selected="true">Thông tin Cơ bản</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-pane" type="button" role="tab"
                                    aria-controls="profile-pane" aria-selected="false">Hồ sơ Cá nhân</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                    data-bs-target="#details-pane" type="button" role="tab"
                                    aria-controls="details-pane" aria-selected="false">Chi tiết Bổ sung</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="roles-tab" data-bs-toggle="tab"
                                    data-bs-target="#roles-pane" type="button" role="tab"
                                    aria-controls="roles-pane" aria-selected="false">Phân quyền</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="editUserTabsContent">
                            <div class="tab-pane fade show active" id="user-pane" role="tabpanel"
                                aria-labelledby="user-tab">
                                <div class="mb-3">
                                    <label for="editUserName" class="form-label">Tên</label>
                                    <input type="text" class="form-control" id="editUserName" name="name"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="editUserEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="editUserEmail" name="email"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="editUserPassword" class="form-label">Mật khẩu (Để trống nếu không muốn
                                        thay đổi)</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="editUserPassword"
                                            name="password">
                                        <button class="btn btn-outline-secondary toggle-password" type="button"
                                            data-target="editUserPassword">
                                            <i class="fas fa-eye"></i> </button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="editUserPasswordConfirmation" class="form-label">Xác nhận Mật khẩu</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="editUserPasswordConfirmation"
                                            name="password_confirmation">
                                        <button class="btn btn-outline-secondary toggle-password" type="button"
                                            data-target="editUserPasswordConfirmation">
                                            <i class="fas fa-eye"></i> </button>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="profile-pane" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="editProfilePhone" class="form-label">Số điện thoại</label>
                                        <input type="text" class="form-control" id="editProfilePhone" name="phone">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="editProfileAddress" class="form-label">Địa chỉ</label>
                                        <input type="text" class="form-control" id="editProfileAddress"
                                            name="address">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="editProfileCity" class="form-label">Tỉnh/Thành phố</label>
                                        <input type="text" class="form-control" id="editProfileCity" name="city">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="editProfileDistrict" class="form-label">Quận/Huyện</label>
                                        <input type="text" class="form-control" id="editProfileDistrict"
                                            name="district">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="editProfileWard" class="form-label">Phường/Xã</label>
                                        <input type="text" class="form-control" id="editProfileWard" name="ward">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="editProfileCountry" class="form-label">Quốc gia</label>
                                        <input type="text" class="form-control" id="editProfileCountry"
                                            name="country">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="editProfileBirthday" class="form-label">Ngày sinh</label>
                                        <input type="date" class="form-control" id="editProfileBirthday"
                                            name="birthday">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="editProfileGender" class="form-label">Giới tính</label>
                                    <select class="form-select" id="editProfileGender" name="gender">
                                        <option value="">Chọn giới tính</option>
                                        <option value="nam">Nam</option>
                                        <option value="nu">Nữ</option>
                                        <option value="khac">Khác</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="editProfileFacebook" class="form-label">Link Facebook</label>
                                    <input type="url" class="form-control" id="editProfileFacebook"
                                        name="facebook_url">
                                </div>
                                <div class="mb-3">
                                    <label for="editProfileZalo" class="form-label">Zalo (Số điện thoại hoặc link)</label>
                                    <input type="text" class="form-control" id="editProfileZalo" name="zalo">
                                </div>
                                <div class="mb-3">
                                    <label for="editProfileBio" class="form-label">Tiểu sử</label>
                                    <textarea class="form-control" id="editProfileBio" name="bio" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="editProfileJobTitle" class="form-label">Chức danh/Nghề nghiệp</label>
                                    <input type="text" class="form-control" id="editProfileJobTitle"
                                        name="job_title">
                                </div>
                                <div class="mb-3">
                                    <label for="editProfileAvatar" class="form-label">URL Avatar</label>
                                    <input type="text" class="form-control" id="editProfileAvatar" name="avatar">
                                    <small class="form-text text-muted">Nhập URL cho ảnh đại diện.</small>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="details-pane" role="tabpanel" aria-labelledby="details-tab">
                                <div class="mb-3">
                                    <label for="editDetailIdNumber" class="form-label">Số CCCD/CMND</label>
                                    <input type="text" class="form-control" id="editDetailIdNumber" name="id_number">
                                </div>
                                <div class="mb-3">
                                    <label for="editDetailIdIssuedDate" class="form-label">Ngày cấp CCCD/CMND</label>
                                    <input type="date" class="form-control" id="editDetailIdIssuedDate"
                                        name="id_issued_date">
                                </div>
                                <div class="mb-3">
                                    <label for="editDetailIdIssuedPlace" class="form-label">Nơi cấp CCCD/CMND</label>
                                    <input type="text" class="form-control" id="editDetailIdIssuedPlace"
                                        name="id_issued_place">
                                </div>
                                <div class="mb-3">
                                    <label for="editDetailMaritalStatus" class="form-label">Tình trạng hôn nhân</label>
                                    <input type="text" class="form-control" id="editDetailMaritalStatus"
                                        name="marital_status">
                                </div>
                                <div class="mb-3">
                                    <label for="editDetailNationality" class="form-label">Quốc tịch</label>
                                    <input type="text" class="form-control" id="editDetailNationality"
                                        name="nationality">
                                </div>
                                <div class="mb-3">
                                    <label for="editDetailInstagramUrl" class="form-label">Link Instagram</label>
                                    <input type="url" class="form-control" id="editDetailInstagramUrl"
                                        name="instagram_url">
                                </div>
                                <div class="mb-3">
                                    <label for="editDetailLinkedinUrl" class="form-label">Link LinkedIn</label>
                                    <input type="url" class="form-control" id="editDetailLinkedinUrl"
                                        name="linkedin_url">
                                </div>
                                <div class="mb-3">
                                    <label for="editDetailTiktokUrl" class="form-label">Link TikTok</label>
                                    <input type="text" class="form-control" id="editDetailTiktokUrl"
                                        name="tiktok_url">
                                </div>
                                <div class="mb-3">
                                    <label for="editDetailCompanyName" class="form-label">Tên công ty</label>
                                    <input type="text" class="form-control" id="editDetailCompanyName"
                                        name="company_name">
                                </div>
                                <div class="mb-3">
                                    <label for="editDetailCompanyAddress" class="form-label">Địa chỉ công ty</label>
                                    <input type="text" class="form-control" id="editDetailCompanyAddress"
                                        name="company_address">
                                </div>
                                <div class="mb-3">
                                    <label for="editDetailWorkingStatus" class="form-label">Tình trạng việc làm</label>
                                    <input type="text" class="form-control" id="editDetailWorkingStatus"
                                        name="working_status">
                                </div>
                                <div class="mb-3">
                                    <label for="editDetailShippingNote" class="form-label">Ghi chú giao hàng</label>
                                    <textarea class="form-control" id="editDetailShippingNote" name="shipping_note" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="editDetailPreferredPayment" class="form-label">Phương thức thanh toán ưa
                                        thích</label>
                                    <input type="text" class="form-control" id="editDetailPreferredPayment"
                                        name="preferred_payment">
                                </div>
                                <div class="mb-3">
                                    <label for="editDetailPoints" class="form-label">Điểm tích lũy</label>
                                    <input type="number" class="form-control" id="editDetailPoints" name="points">
                                </div>
                                <div class="mb-3">
                                    <label for="editDetailSlug" class="form-label">Slug URL cá nhân hóa hồ sơ</label>
                                    <input type="text" class="form-control" id="editDetailSlug" name="slug">
                                </div>
                                <div class="mb-3">
                                    <label for="editDetailStatus" class="form-label">Trạng thái tài khoản</label>
                                    <input type="text" class="form-control" id="editDetailStatus" name="status">
                                </div>
                                <div class="mb-3">
                                    <label for="editDetailLastLoginAt" class="form-label">Lần đăng nhập gần nhất</label>
                                    <input type="datetime-local" class="form-control" id="editDetailLastLoginAt"
                                        name="last_login_at">
                                </div>
                                <div class="mb-3">
                                    <label for="editDetailDeviceInfo" class="form-label">Thông tin thiết bị</label>
                                    <textarea class="form-control" id="editDetailDeviceInfo" name="device_info" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="roles-pane" role="tabpanel" aria-labelledby="roles-tab">
                                <p class="mb-3">Chọn (các) vai trò cho người dùng này:</p>
                                <div id="rolesCheckboxes">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Helper function for notifications
        function showNotification(message, type = 'success') {
            if (type === 'success') {
                toastr.success(message);
            } else {
                toastr.error(message);
            }
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            const editUserModal = new bootstrap.Modal(document.getElementById('editUserModal'));
            const editUserForm = document.getElementById('editUserForm');
            const rolesCheckboxesDiv = document.getElementById('rolesCheckboxes');

            // Xử lý nút hiển thị/ẩn mật khẩu
            document.querySelectorAll('.toggle-password').forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.dataset.target; // Lấy ID của trường input từ data-target
                    const passwordInput = document.getElementById(targetId);
                    const icon = this.querySelector('i'); // Lấy icon bên trong nút

                    // Chuyển đổi loại của trường input và thay đổi icon
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash'); // Icon mắt bị gạch ngang
                    } else {
                        passwordInput.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye'); // Icon mắt
                    }
                });
            });

            // Trình lắng nghe sự kiện cho nút "Chỉnh sửa tài khoản"
            document.querySelectorAll('.edit-account-btn').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const userId = this.closest('tr').dataset.userId;

                    if (!userId) {
                        console.error('Không tìm thấy ID người dùng để chỉnh sửa.');
                        alert('Lỗi: Không tìm thấy ID người dùng.');
                        return;
                    }

                    // Lấy dữ liệu người dùng qua AJAX
                    fetch(`/admin/edit/${userId}`)
                        .then(response => {
                            if (!response.ok) {
                                return response.text().then(text => {
                                    console.error('Phản hồi không phải JSON:', text);
                                    try {
                                        const errorJson = JSON.parse(text);
                                        throw errorJson;
                                    } catch (e) {
                                        throw new Error(text);
                                    }
                                });
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Điền dữ liệu vào form users
                            document.getElementById('editUserId').value = data.id;
                            document.getElementById('editUserName').value = data.name;
                            document.getElementById('editUserEmail').value = data.email;
                            document.getElementById('editUserPassword').value = '';
                            document.getElementById('editUserPasswordConfirmation').value = '';

                            // Điền dữ liệu vào form users_profiles
                            if (data.user_profile) {
                                document.getElementById('editProfilePhone').value = data
                                    .user_profile.phone || '';
                                document.getElementById('editProfileAddress').value = data
                                    .user_profile.address || '';
                                document.getElementById('editProfileCity').value = data
                                    .user_profile.city || '';
                                document.getElementById('editProfileDistrict').value = data
                                    .user_profile.district || '';
                                document.getElementById('editProfileWard').value = data
                                    .user_profile.ward || '';
                                document.getElementById('editProfileCountry').value = data
                                    .user_profile.country || '';
                                document.getElementById('editProfileBirthday').value = data
                                    .user_profile.birthday ? new Date(data.user_profile
                                        .birthday).toISOString().split('T')[0] : '';
                                document.getElementById('editProfileGender').value = data
                                    .user_profile.gender || '';
                                document.getElementById('editProfileFacebook').value = data
                                    .user_profile.facebook_url || '';
                                document.getElementById('editProfileZalo').value = data
                                    .user_profile.zalo || '';
                                document.getElementById('editProfileBio').value = data
                                    .user_profile.bio || '';
                                document.getElementById('editProfileJobTitle').value = data
                                    .user_profile.job_title || '';
                                document.getElementById('editProfileAvatar').value = data
                                    .user_profile.avatar || '';
                            } else {
                                editUserForm.querySelectorAll(
                                    '#profile-pane input, #profile-pane textarea, #profile-pane select'
                                ).forEach(el => el.value = '');
                            }

                            // Điền dữ liệu vào form user_details
                            if (data.user_detail) {
                                document.getElementById('editDetailIdNumber').value = data
                                    .user_detail.id_number || '';
                                document.getElementById('editDetailIdIssuedDate').value = data
                                    .user_detail.id_issued_date ? new Date(data.user_detail
                                        .id_issued_date).toISOString().split('T')[0] : '';
                                document.getElementById('editDetailIdIssuedPlace').value = data
                                    .user_detail.id_issued_place || '';
                                document.getElementById('editDetailMaritalStatus').value = data
                                    .user_detail.marital_status || '';
                                document.getElementById('editDetailNationality').value = data
                                    .user_detail.nationality || '';
                                document.getElementById('editDetailInstagramUrl').value = data
                                    .user_detail.instagram_url || '';
                                document.getElementById('editDetailLinkedinUrl').value = data
                                    .user_detail.linkedin_url || '';
                                document.getElementById('editDetailTiktokUrl').value = data
                                    .user_detail.tiktok_url || '';
                                document.getElementById('editDetailCompanyName').value = data
                                    .user_detail.company_name || '';
                                document.getElementById('editDetailCompanyAddress').value = data
                                    .user_detail.company_address || '';
                                document.getElementById('editDetailWorkingStatus').value = data
                                    .user_detail.working_status || '';
                                document.getElementById('editDetailShippingNote').value = data
                                    .user_detail.shipping_note || '';
                                document.getElementById('editDetailPreferredPayment').value =
                                    data.user_detail.preferred_payment || '';
                                // Đảm bảo points luôn là số, nếu null hoặc rỗng thì mặc định là 0
                                document.getElementById('editDetailPoints').value = data
                                    .user_detail.points !== null ? data.user_detail.points : 0;
                                document.getElementById('editDetailSlug').value = data
                                    .user_detail.slug || '';
                                document.getElementById('editDetailStatus').value = data
                                    .user_detail.status || '';
                                if (data.user_detail.last_login_at) {
                                    const lastLoginDate = new Date(data.user_detail
                                        .last_login_at);
                                    const formattedDate = lastLoginDate.toISOString().slice(0,
                                        16);
                                    document.getElementById('editDetailLastLoginAt').value =
                                        formattedDate;
                                } else {
                                    document.getElementById('editDetailLastLoginAt').value = '';
                                }
                                document.getElementById('editDetailDeviceInfo').value = data
                                    .user_detail.device_info || '';
                            } else {
                                editUserForm.querySelectorAll(
                                    '#details-pane input, #details-pane textarea, #details-pane select'
                                ).forEach(el => el.value = '');
                            }

                            // Điền và chọn các vai trò trong tab "Phân quyền"
                            rolesCheckboxesDiv.innerHTML = ''; // Xóa các checkbox cũ
                            if (data.all_roles && data.all_roles.length > 0) {
                                data.all_roles.forEach(role => {
                                    const div = document.createElement('div');
                                    div.classList.add('form-check');
                                    const input = document.createElement('input');
                                    input.type = 'radio';
                                    input.classList.add('form-check-input');
                                    input.id = `role-${role.name}`;
                                    input.name =
                                        `roles[]`; // Tên mảng để Laravel nhận mảng các vai trò
                                    input.value = role.name; // Giá trị là tên vai trò

                                    // Kiểm tra xem người dùng hiện tại có vai trò này không
                                    if (data.roles.some(userRole => userRole.name ===
                                            role.name)) {
                                        input.checked = true;
                                    }

                                    const label = document.createElement('label');
                                    label.classList.add('form-check-label');
                                    label.htmlFor = `role-${role.name}`;
                                    label.textContent = role.name;

                                    div.appendChild(input);
                                    div.appendChild(label);
                                    rolesCheckboxesDiv.appendChild(div);
                                });
                            } else {
                                rolesCheckboxesDiv.innerHTML =
                                    '<p>Không có vai trò nào được định nghĩa.</p>';
                            }


                            editUserModal.show();
                        })
                        .catch(error => {
                            console.error(
                                'Lỗi khi tìm nạp dữ liệu người dùng (edit button catch):',
                                error);
                            let errorMessage =
                                'Không thể tải dữ liệu người dùng. Vui lòng thử lại.';
                            if (error.message && typeof error.message === 'string') {
                                errorMessage = error.message;
                            }
                            toastr.error(errorMessage);
                        });
                });
            });

            // Xử lý gửi biểu mẫu
            editUserForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const userId = document.getElementById('editUserId').value;
                const formData = new FormData(this);
                const jsonData = {};

                // Thu thập tất cả dữ liệu từ form, bao gồm cả các checkbox vai trò
                formData.forEach((value, key) => {
                    // Xử lý các trường ngày/giờ rỗng hoặc không hợp lệ để gửi null
                    if ((key === 'birthday' || key === 'id_issued_date') && value === '') {
                        jsonData[key] = null;
                    } else if (key === 'last_login_at') {
                        jsonData[key] = value ? new Date(value).toISOString() : null;
                    } else {
                        jsonData[key] = value;
                    }
                });

                // Xử lý riêng các vai trò được chọn từ checkboxes
                const selectedRoles = [];
                document.querySelectorAll('#rolesCheckboxes input[name="roles[]"]:checked').forEach(
                    checkbox => {
                        selectedRoles.push(checkbox.value);
                    });
                jsonData.roles = selectedRoles; // Thêm mảng vai trò vào jsonData

                console.log('Dữ liệu gửi đi:', jsonData);

                fetch(`/admin/update/${userId}`, {
                        method: 'POST', // Đảm bảo phương thức là POST
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: JSON.stringify(jsonData)
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.text().then(text => {
                                console.error('Phản hồi không phải JSON:', text);
                                try {
                                    const errorJson = JSON.parse(text);
                                    throw errorJson;
                                } catch (e) {
                                    throw new Error(text);
                                }
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        showNotification(data.message, 'success');
                        editUserModal.hide();
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    })
                    .catch(error => {
                        console.error('Lỗi khi cập nhật người dùng (catch block):', error);
                        let errorMessage = 'Đã xảy ra lỗi khi cập nhật dữ liệu.';

                        if (error && typeof error === 'object' && error.errors) {
                            errorMessage = 'Lỗi xác thực:\n' + Object.values(error.errors).map(e => e
                                .join(', ')).join('\n');
                        } else if (error && typeof error === 'object' && error.message) {
                            errorMessage = error.message;
                        } else if (typeof error === 'string') {
                            errorMessage = 'Phản hồi không mong muốn từ máy chủ:\n' + error.substring(0,
                                Math.min(error.length, 200)) + '...';
                        } else {
                            errorMessage = 'Lỗi không xác định xảy ra.';
                        }
                        toastr.error(errorMessage);
                    });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\BookingApp–Laravel-React\backend\resources\views/apps/account/admin/index.blade.php ENDPATH**/ ?>