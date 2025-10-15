<!-- Slidebar -->
<nav class="navbar navbar-vertical navbar-expand-lg" style="display:none;">
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <!-- scrollbar removed-->
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item">
                    <!-- parent pages-->
                    <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-home"
                            role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="nv-home">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper"><span
                                        class="fas fa-caret-right dropdown-indicator-icon"></span></div><span
                                    class="nav-link-icon"><span data-feather="pie-chart"></span></span><span
                                    class="nav-link-text">Home</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent show" data-bs-parent="#navbarVerticalCollapse"
                                id="nv-home">
                                <li class="collapsed-nav-item-title d-none">Home</li>
                                <li class="nav-item"><a
                                        class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>"
                                        href="<?php echo e(route('home')); ?>">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text">Dashboard</span>
                                            <?php if(request()->routeIs('home') && isset($stats['new_bookings']) && $stats['new_bookings'] > 0): ?>
                                                <span class="badge ms-2 badge badge-phoenix badge-phoenix-warning">
                                                    new
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#!">
                                        <div class="d-flex align-items-center"><span class="nav-link-text">Quản lý dự
                                                án</span>
                                        </div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#!">
                                        <div class="d-flex align-items-center"><span class="nav-link-text">Quản lý quan
                                                hệ khách hàng</span>
                                        </div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#!">
                                        <div class="d-flex align-items-center"><span class="nav-link-text">Quản lý đại
                                                lý du lịch</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#!">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text">Quản lý kho</span>
                                            <span class="badge ms-2 badge badge-phoenix badge-phoenix-warning">
                                                new
                                            </span>
                                        </div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="
                                    
                                    apps/social/feed.html
                                    
                                    "
                                        >
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text">Nguồn cấp dữ liệu xã hội</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <p class="navbar-vertical-label">Apps</p>
                    <hr class="navbar-vertical-line" /><!-- parent pages-->
                    
                    <div class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1" href="#nv-acc" role="button"
                            data-bs-toggle="collapse"
                            aria-expanded="<?php echo e(request()->routeIs('users.*') || request()->routeIs('manager.*') ? 'true' : 'false'); ?>"
                            aria-controls="nv-acc">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper">
                                    <span class="fas fa-caret-right dropdown-indicator-icon"></span>
                                </div>
                                <span class="nav-link-icon">
                                    <span data-feather="users"></span>
                                </span>
                                <span class="nav-link-text">Account</span>
                            </div>
                        </a>

                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent <?php echo e(request()->routeIs('users.*') || request()->routeIs('manager.*') || request()->routeIs('admin.*') ? 'show' : ''); ?>"
                                data-bs-parent="#navbarVerticalCollapse" id="nv-acc">
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(request()->routeIs('users.index') ? 'active' : ''); ?>"
                                        href="<?php echo e(route('users.index')); ?>">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text">Users Manager</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(request()->routeIs('manager.index') ? 'active' : ''); ?>"
                                        href="<?php echo e(route('manager.index')); ?>">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text">Manager</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(request()->routeIs('admin.index') ? 'active' : ''); ?>"
                                        href="<?php echo e(route('admin.index')); ?>">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text">Admin Manager</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div><!-- parent pages-->
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 <?php echo e(request()->routeIs('category.index') ? 'active' : ''); ?>"
                            href="<?php echo e(route('category.index')); ?>" role="button" data-bs-toggle=""
                            aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span data-feather="layers"></span>
                                </span>
                                <span class="nav-link-text-wrapper"><span class="nav-link-text">Category</span></span>
                            </div>
                        </a>
                    </div><!-- parent pages-->
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 <?php echo e(request()->routeIs('tag.index') ? 'active' : ''); ?>"
                            href="<?php echo e(route('tag.index')); ?>" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span data-feather="tag"></span>
                                </span>
                                <span class="nav-link-text-wrapper"><span class="nav-link-text">Tag</span></span>
                            </div>
                        </a>
                    </div><!-- parent pages-->
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 <?php echo e(request()->routeIs('product.index') ? 'active' : ''); ?>"
                            href="<?php echo e(route('product.index')); ?>" role="button" data-bs-toggle=""
                            aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span data-feather="package"></span>
                                </span>
                                <span class="nav-link-text-wrapper"><span class="nav-link-text">Products</span></span>
                            </div>
                        </a>
                    </div><!-- parent pages-->
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 <?php echo e(request()->routeIs('banners.index') ? 'active' : ''); ?>"
                            href="<?php echo e(route('banners.index')); ?>" role="button" data-bs-toggle=""
                            aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span data-feather="image"></span>
                                </span>
                                <span class="nav-link-text-wrapper"><span class="nav-link-text">Banners</span></span>
                            </div>
                        </a>
                    </div><!-- parent pages-->

                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 <?php echo e(request()->routeIs('bookings.index') ? 'active' : ''); ?>"
                            href="<?php echo e(route('booking.index')); ?>" role="button" data-bs-toggle=""
                            aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span data-feather="calendar"></span>
                                </span>
                                <span class="nav-link-text-wrapper"><span class="nav-link-text">Bookings</span></span>
                            </div>
                        </a>
                    </div><!-- parent pages-->

                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 <?php echo e(request()->routeIs('videos.index') ? 'active' : ''); ?>"
                            href="<?php echo e(route('videos.index')); ?>" role="button" data-bs-toggle=""
                            aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span data-feather="video"></span>
                                </span>
                                <span class="nav-link-text-wrapper"><span class="nav-link-text">Video</span></span>
                            </div>
                        </a>
                        
                </li>
                
            </ul>
        </div>
    </div>
    <div class="navbar-vertical-footer">
        <button
            class="btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center"><span
                class="uil uil-left-arrow-to-left fs-8"></span><span
                class="uil uil-arrow-from-right fs-8"></span><span class="navbar-vertical-footer-text ms-2">Collapsed
                View</span>
        </button>
    </div>
</nav>
<!-- ========== END OF SIDEBAR ========== -->
<?php /**PATH C:\laragon\www\BookingApp–Laravel-React\backend\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>