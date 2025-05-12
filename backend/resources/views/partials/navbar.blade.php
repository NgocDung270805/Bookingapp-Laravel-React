 <!-- NAVBAR -->
    <nav class="navbar navbar-top navbar-slim fixed-top navbar-expand" id="topNavSlim" style="display:none;">
      <div class="collapse navbar-collapse justify-content-between">
        <div class="navbar-logo">
          <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse"
            aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                class="toggle-line"></span></span></button>
          <a class="navbar-brand navbar-brand" href="index.html">phoenix <span
              class="text-body-highlight d-none d-sm-inline">slim</span></a>
        </div>
        <ul class="navbar-nav navbar-nav-icons flex-row">
          <li class="nav-item">
            <div class="theme-control-toggle fa-ion-wait pe-2 theme-control-toggle-slim"><input
                class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox"
                data-theme-control="phoenixTheme" value="dark" /><label
                class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span
                  class="d-none d-sm-flex flex-center" style="height:16px;width:16px;"><span class="me-1 icon"
                    data-feather="moon"></span></span><span class="fs-9 fw-bold">Dark</span></label><label
                class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span
                  class="d-none d-sm-flex flex-center" style="height:16px;width:16px;"><span class="me-1 icon"
                    data-feather="sun"></span></span><span class="fs-9 fw-bold">Light</span></label></div>
          </li>
          <li class="nav-item"> <a class="nav-link" href="#" data-bs-toggle="modal"
              data-bs-target="#searchBoxModal"><span class="d-inline-block" style="height:12px;width:12px;"><span
                  data-feather="search" style="height:12px;width:12px;"></span></span></a></li>
          <li class="nav-item dropdown">
            <a class="nav-link" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown"
              data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="d-inline-block"
                style="height:12px;width:12px;"><span data-feather="bell"
                  style="height:12px;width:12px;"></span></span></a>
            <div
              class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border navbar-dropdown-caret"
              id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
              <div class="card position-relative border-0">
                <div class="card-header p-2">
                  <div class="d-flex justify-content-between">
                    <h5 class="text-body-emphasis mb-0">Notifications</h5><button
                      class="btn btn-link p-0 fs-9 fw-normal" type="button">Mark all as read</button>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="scrollbar-overlay" style="height: 27rem;">
                    <div class="px-2 px-sm-3 py-3 notification-card position-relative read border-bottom">
                      <div class="d-flex align-items-center justify-content-between position-relative">
                        <div class="d-flex">
                          <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                              src="assets/img/team/40x40/30.webp" alt="" /></div>
                          <div class="flex-1 me-sm-3">
                            <h4 class="fs-9 text-body-emphasis">Jessie Samson</h4>
                            <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                class='me-1 fs-10'>💬</span>Mentioned you in a comment.<span
                                class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">10m</span></p>
                            <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                                class="fw-bold">10:41 AM </span>August 7,2021</p>
                          </div>
                        </div>
                        <div class="dropdown notification-dropdown"><button
                            class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                            data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                            data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                          <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                        </div>
                      </div>
                    </div>
                    <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                      <div class="d-flex align-items-center justify-content-between position-relative">
                        <div class="d-flex">
                          <div class="avatar avatar-m status-online me-3">
                            <div class="avatar-name rounded-circle"><span>J</span></div>
                          </div>
                          <div class="flex-1 me-sm-3">
                            <h4 class="fs-9 text-body-emphasis">Jane Foster</h4>
                            <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                class='me-1 fs-10'>📅</span>Created an event.<span
                                class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">20m</span></p>
                            <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                                class="fw-bold">10:20 AM </span>August 7,2021</p>
                          </div>
                        </div>
                        <div class="dropdown notification-dropdown"><button
                            class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                            data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                            data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                          <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                        </div>
                      </div>
                    </div>
                    <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                      <div class="d-flex align-items-center justify-content-between position-relative">
                        <div class="d-flex">
                          <div class="avatar avatar-m status-online me-3"><img class="rounded-circle avatar-placeholder"
                              src="assets/img/team/40x40/avatar.webp" alt="" /></div>
                          <div class="flex-1 me-sm-3">
                            <h4 class="fs-9 text-body-emphasis">Jessie Samson</h4>
                            <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                class='me-1 fs-10'>👍</span>Liked your comment.<span
                                class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">1h</span></p>
                            <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                                class="fw-bold">9:30 AM </span>August 7,2021</p>
                          </div>
                        </div>
                        <div class="dropdown notification-dropdown"><button
                            class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                            data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                            data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                          <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                        </div>
                      </div>
                    </div>
                    <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                      <div class="d-flex align-items-center justify-content-between position-relative">
                        <div class="d-flex">
                          <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                              src="assets/img/team/40x40/57.webp" alt="" /></div>
                          <div class="flex-1 me-sm-3">
                            <h4 class="fs-9 text-body-emphasis">Kiera Anderson</h4>
                            <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                class='me-1 fs-10'>💬</span>Mentioned you in a comment.<span
                                class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                            <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                                class="fw-bold">9:11 AM </span>August 7,2021</p>
                          </div>
                        </div>
                        <div class="dropdown notification-dropdown"><button
                            class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                            data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                            data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                          <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                        </div>
                      </div>
                    </div>
                    <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                      <div class="d-flex align-items-center justify-content-between position-relative">
                        <div class="d-flex">
                          <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                              src="assets/img/team/40x40/59.webp" alt="" /></div>
                          <div class="flex-1 me-sm-3">
                            <h4 class="fs-9 text-body-emphasis">Herman Carter</h4>
                            <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                class='me-1 fs-10'>👤</span>Tagged you in a comment.<span
                                class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                            <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                                class="fw-bold">10:58 PM </span>August 7,2021</p>
                          </div>
                        </div>
                        <div class="dropdown notification-dropdown"><button
                            class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                            data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                            data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                          <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                        </div>
                      </div>
                    </div>
                    <div class="px-2 px-sm-3 py-3 notification-card position-relative read ">
                      <div class="d-flex align-items-center justify-content-between position-relative">
                        <div class="d-flex">
                          <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                              src="assets/img/team/40x40/58.webp" alt="" /></div>
                          <div class="flex-1 me-sm-3">
                            <h4 class="fs-9 text-body-emphasis">Benjamin Button</h4>
                            <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                class='me-1 fs-10'>👍</span>Liked your comment.<span
                                class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                            <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                                class="fw-bold">10:18 AM </span>August 7,2021</p>
                          </div>
                        </div>
                        <div class="dropdown notification-dropdown"><button
                            class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                            data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                            data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                          <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer p-0 border-top border-translucent border-0">
                  <div class="my-2 text-center fw-bold fs-10 text-body-tertiary text-opactity-85"><a class="fw-bolder"
                      href="pages/notifications.html">Notification history</a></div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown"
              aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"><svg width="10" height="10"
                viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
              </svg></a>
            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nine-dots shadow border"
              aria-labelledby="navbarDropdownNindeDots">
              <div class="card bg-body-emphasis position-relative border-0">
                <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                  <div class="row text-center align-items-center gx-0 gy-0">
                    <div class="col-4"><a
                        class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                        href="#!"><img src="assets/img/nav-icons/behance.webp" alt="" width="30" />
                        <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Behance</p>
                      </a></div>
                    <div class="col-4"><a
                        class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                        href="#!"><img src="assets/img/nav-icons/google-cloud.webp" alt="" width="30" />
                        <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Cloud</p>
                      </a></div>
                    <div class="col-4"><a
                        class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                        href="#!"><img src="assets/img/nav-icons/slack.webp" alt="" width="30" />
                        <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Slack</p>
                      </a></div>
                    <div class="col-4"><a
                        class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                        href="#!"><img src="assets/img/nav-icons/gitlab.webp" alt="" width="30" />
                        <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Gitlab</p>
                      </a></div>
                    <div class="col-4"><a
                        class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                        href="#!"><img src="assets/img/nav-icons/bitbucket.webp" alt="" width="30" />
                        <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">BitBucket</p>
                      </a></div>
                    <div class="col-4"><a
                        class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                        href="#!"><img src="assets/img/nav-icons/google-drive.webp" alt="" width="30" />
                        <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Drive</p>
                      </a></div>
                    <div class="col-4"><a
                        class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                        href="#!"><img src="assets/img/nav-icons/trello.webp" alt="" width="30" />
                        <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Trello</p>
                      </a></div>
                    <div class="col-4"><a
                        class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                        href="#!"><img src="assets/img/nav-icons/figma.webp" alt="" width="20" />
                        <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Figma</p>
                      </a></div>
                    <div class="col-4"><a
                        class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                        href="#!"><img src="assets/img/nav-icons/twitter.webp" alt="" width="30" />
                        <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Twitter</p>
                      </a></div>
                    <div class="col-4"><a
                        class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                        href="#!"><img src="assets/img/nav-icons/pinterest.webp" alt="" width="30" />
                        <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Pinterest</p>
                      </a></div>
                    <div class="col-4"><a
                        class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                        href="#!"><img src="assets/img/nav-icons/ln.webp" alt="" width="30" />
                        <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Linkedin</p>
                      </a></div>
                    <div class="col-4"><a
                        class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                        href="#!"><img src="assets/img/nav-icons/google-maps.webp" alt="" width="30" />
                        <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Maps</p>
                      </a></div>
                    <div class="col-4"><a
                        class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                        href="#!"><img src="assets/img/nav-icons/google-photos.webp" alt="" width="30" />
                        <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Photos</p>
                      </a></div>
                    <div class="col-4"><a
                        class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                        href="#!"><img src="assets/img/nav-icons/spotify.webp" alt="" width="30" />
                        <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Spotify</p>
                      </a></div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0 white-space-nowrap" id="navbarDropdownUser"
              href="#!" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside"
              aria-expanded="false">Olivia <span class="d-inline-block" style="height:10.2px;width:10.2px;"><span
                  class="fa-solid fa-chevron-down fs-10"></span></span></a>
            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border"
              aria-labelledby="navbarDropdownUser">
              <div class="card position-relative border-0">
                <div class="card-body p-0">
                  <div class="text-center pt-4 pb-3">
                    <div class="avatar avatar-xl ">
                      <img class="rounded-circle " src="assets/img/team/72x72/57.webp" alt="" />
                    </div>
                    <h6 class="mt-2 text-body-emphasis">Jerry Seinfield</h6>
                  </div>
                  <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text"
                      placeholder="Update your status" /></div>
                </div>
                <div class="overflow-auto scrollbar" style="height: 10rem;">
                  <ul class="nav d-flex flex-column mb-2 pb-1">
                    <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                          class="me-2 text-body align-bottom" data-feather="user"></span><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"><span
                          class="me-2 text-body align-bottom" data-feather="pie-chart"></span>Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                          class="me-2 text-body align-bottom" data-feather="lock"></span>Posts &amp; Activity</a></li>
                    <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                          class="me-2 text-body align-bottom" data-feather="settings"></span>Settings &amp; Privacy </a>
                    </li>
                    <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                          class="me-2 text-body align-bottom" data-feather="help-circle"></span>Help Center</a></li>
                    <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                          class="me-2 text-body align-bottom" data-feather="globe"></span>Language</a></li>
                  </ul>
                </div>
                <div class="card-footer p-0 border-top border-translucent">
                  <ul class="nav d-flex flex-column my-3">
                    <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                          class="me-2 text-body align-bottom" data-feather="user-plus"></span>Add another account</a>
                    </li>
                  </ul>
                  <hr />
                  <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span
                        class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                  <div class="my-2 text-center fw-bold fs-10 text-body-quaternary"><a class="text-body-quaternary me-1"
                      href="#!">Privacy policy</a>&bull;<a class="text-body-quaternary mx-1" href="#!">Terms</a>&bull;<a
                      class="text-body-quaternary ms-1" href="#!">Cookies</a></div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- END OF NAVBAR -->


    <nav class="navbar navbar-top fixed-top navbar-expand-lg" id="navbarTop" style="display:none;">
      <div class="navbar-logo">
        <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
          data-bs-toggle="collapse" data-bs-target="#navbarTopCollapse" aria-controls="navbarTopCollapse"
          aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
              class="toggle-line"></span></span></button>
        <a class="navbar-brand me-1 me-sm-3" href="index.html">
          <div class="d-flex align-items-center">
            <div class="d-flex align-items-center"><img src="assets/img/icons/logo.png" alt="phoenix" width="27" />
              <h5 class="logo-text ms-2 d-none d-sm-block">phoenix</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="collapse navbar-collapse navbar-top-collapse order-1 order-lg-0 justify-content-center"
        id="navbarTopCollapse">
        <ul class="navbar-nav navbar-nav-top" data-dropdown-on-hover="data-dropdown-on-hover">
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-chart-pie"></span>Home</a>
            <ul class="dropdown-menu navbar-dropdown-caret">
              <li><a class="dropdown-item active" href="index.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="shopping-cart"></span>E
                    commerce</div>
                </a></li>
              <li><a class="dropdown-item" href="dashboard/project-management.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clipboard"></span>Project
                    management</div>
                </a></li>
              <li><a class="dropdown-item" href="dashboard/crm.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="phone"></span>CRM</div>
                </a></li>
              <li><a class="dropdown-item" href="dashboard/travel-agency.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="briefcase"></span>Travel
                    agency</div>
                </a></li>
              <li><a class="dropdown-item" href="dashboard/stock.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="briefcase"></span>Stock</div>
                </a></li>
              <li><a class="dropdown-item" href="apps/social/feed.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="share-2"></span>Social feed
                  </div>
                </a></li>
            </ul>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-cube"></span>Apps</a>
            <ul class="dropdown-menu navbar-dropdown-caret">
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="e-commerce" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="shopping-cart"></span>E commerce</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Admin</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/add-product.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add product</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/products.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/customers.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customers</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/customer-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customer details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/orders.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Orders</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/order-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/refund.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Refund</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Customer</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/homepage.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Product details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/products-filter.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products filter</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/cart.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Cart</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/checkout.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/shipping-info.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Shipping info</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/profile.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/favourite-stores.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Favourite stores</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/wishlist.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Wishlist</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/order-tracking.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order tracking</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/invoice.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Invoice</div>
                        </a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="CRM" href="#" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="phone"></span>CRM</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/crm/analytics.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Analytics</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/deals.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deals</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/deal-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deal details</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/leads.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Leads</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/lead-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lead details</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/reports.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/report-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Report details</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/add-contact.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add contact</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="project-management" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="clipboard"></span>Project management</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/project-management/create-new.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create new</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/project-list-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project list view</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/project-card-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project card view</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/project-board-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project board view</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/todo-list.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Todo list</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/project-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project details</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="travel-agency" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="briefcase"></span>Travel agency</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/travel-agency/landing.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Landing</div>
                    </a></li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="hotel" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Hotel</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#"
                          data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="dropdown-item-wrapper"><span
                              class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                class="me-2 uil"></span>Admin</span></div>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/add-property.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add property</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/add-room.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add room</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/room-listing.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Room listing</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/room-search.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Search room</div>
                            </a></li>
                        </ul>
                      </li>
                      <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#"
                          data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="dropdown-item-wrapper"><span
                              class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                class="me-2 uil"></span>Customer</span></div>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/homepage.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/hotel-details.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Hotel details</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/hotel-compare.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Hotel compare</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/checkout.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/payment.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Payment</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/gallery.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery</div>
                            </a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="flight" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Flight</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="apps/travel-agency/flight/homepage.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/travel-agency/flight/booking.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Booking</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/travel-agency/flight/payment.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Payment</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="trip" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Trip</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="apps/travel-agency/trip/homepage.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/travel-agency/trip/trip-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Trip details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/travel-agency/trip/checkout.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                        </a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="stock" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="dollar-sign"></span>Stock</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/stock/stock-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Stock details</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/stock/portfolio.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Portfolio</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/stock/watchlist.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Watchlist</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="apps/chat.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="message-square"></span>Chat
                  </div>
                </a></li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="email" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="mail"></span>Email</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/email/inbox.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Inbox</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/email/email-detail.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Email detail</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/email/compose.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Compose</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="events" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="bookmark"></span>Events</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/events/create-an-event.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create an event</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/events/event-detail.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Event detail</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="kanban" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="trello"></span>Kanban</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/kanban/kanban.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Kanban</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/kanban/boards.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Boards</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/kanban/create-kanban-board.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create board</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="apps/gantt-chart.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 fa-solid fa-chart-gantt "></span>Gantt chart
                  </div>
                </a></li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="social" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="share-2"></span>Social</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/social/profile.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/social/settings.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Settings</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="gallery" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="image"></span>Gallery</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/gallery/album.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Album</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/gallery-column.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery column</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/gallery-grid.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery grid</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/grid-with-title.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Grid with title</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/gallery-masonry.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery masonry</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/gallery-slider.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery slider</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="file-manager" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="folder"></span>File manager</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/file-manager/grid-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Grid view</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/file-manager/list-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>List view</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="apps/calendar.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="calendar"></span>Calendar
                  </div>
                </a></li>
            </ul>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-files-landscapes-alt"></span>Pages</a>
            <ul class="dropdown-menu navbar-dropdown-caret">
              <li><a class="dropdown-item" href="pages/starter.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="compass"></span>Starter</div>
                </a></li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="faq" href="#" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="help-circle"></span>Faq</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="pages/faq/faq-accordion.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq accordion</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/faq/faq-tab.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq tab</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="landing" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="globe"></span>Landing</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="pages/landing/default.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Default</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/landing/alternate.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Alternate</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="pricing" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="tag"></span>Pricing</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="pages/pricing/pricing-column.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing column</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/pricing/pricing-grid.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing grid</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="pages/notifications.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="bell"></span>Notifications
                  </div>
                </a></li>
              <li><a class="dropdown-item" href="pages/members.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="users"></span>Members</div>
                </a></li>
              <li><a class="dropdown-item" href="pages/timeline.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clock"></span>Timeline</div>
                </a></li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="errors" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="alert-triangle"></span>Errors</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="pages/errors/404.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>404</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/errors/403.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>403</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/errors/500.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>500</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="authentication" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="lock"></span>Authentication</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="simple" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Simple</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="pages/authentication/simple/sign-in.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/sign-up.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/sign-out.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/forgot-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/reset-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/lock-screen.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/2FA.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="split" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Split</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="pages/authentication/split/sign-in.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/sign-up.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/sign-out.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/forgot-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/reset-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/lock-screen.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/2FA.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="Card" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Card</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="pages/authentication/card/sign-in.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/sign-up.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/sign-out.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/forgot-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/reset-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/lock-screen.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/2FA.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                        </a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="layouts" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="layout"></span>Layouts</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="demo/vertical-sidenav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical sidenav</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/dark-mode.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/sidenav-collapse.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sidenav collapse</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/darknav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Darknav</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/topnav-slim.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Topnav slim</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/navbar-horizontal.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar horizontal</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/horizontal-slim.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal slim</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/combo-nav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/combo-nav-slim.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav slim</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/dual-nav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                    </a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-puzzle-piece"></span>Modules</a>
            <ul class="dropdown-menu navbar-dropdown-caret dropdown-menu-card py-0">
              <div class="border-0 scrollbar" style="max-height: 60vh;">
                <div class="px-3 pt-4 pb-3 img-dropdown">
                  <div class="row gx-4 gy-5">
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="dropdown-item-group"><span class="me-2" data-feather="file-text"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Forms</h6>
                      </div><a class="dropdown-link" href="modules/forms/basic/form-control.html">Form control</a><a
                        class="dropdown-link" href="modules/forms/basic/input-group.html">Input group</a><a
                        class="dropdown-link" href="modules/forms/basic/select.html">Select</a><a class="dropdown-link"
                        href="modules/forms/basic/checks.html">Checks</a><a class="dropdown-link"
                        href="modules/forms/basic/range.html">Range</a><a class="dropdown-link"
                        href="modules/forms/basic/floating-labels.html">Floating labels</a><a class="dropdown-link"
                        href="modules/forms/basic/layout.html">Layout</a><a class="dropdown-link"
                        href="modules/forms/advance/advance-select.html">Advance select</a><a class="dropdown-link"
                        href="modules/forms/advance/date-picker.html">Date picker</a><a class="dropdown-link"
                        href="modules/forms/advance/editor.html">Editor</a><a class="dropdown-link"
                        href="modules/forms/advance/file-uploader.html">File uploader</a><a class="dropdown-link"
                        href="modules/forms/advance/range.html">Range</a><a class="dropdown-link"
                        href="modules/forms/advance/rating.html">Rating</a><a class="dropdown-link"
                        href="modules/forms/advance/emoji-button.html">Emoji button</a><a class="dropdown-link"
                        href="modules/forms/validation.html">Validation</a><a class="dropdown-link"
                        href="modules/forms/wizard.html">Wizard</a>
                      <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="grid"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Icons</h6>
                      </div><a class="dropdown-link" href="modules/icons/feather.html">Feather</a><a
                        class="dropdown-link" href="modules/icons/font-awesome.html">Font awesome</a><a
                        class="dropdown-link" href="modules/icons/unicons.html">Unicons</a>
                      <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="bar-chart-2"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">ECharts</h6>
                      </div><a class="dropdown-link" href="modules/echarts/line-charts.html">Line charts</a><a
                        class="dropdown-link" href="modules/echarts/bar-charts.html">Bar charts</a><a
                        class="dropdown-link" href="modules/echarts/candlestick-charts.html">Candlestick charts</a><a
                        class="dropdown-link" href="modules/echarts/geo-map.html">Geo map</a><a class="dropdown-link"
                        href="modules/echarts/scatter-charts.html">Scatter charts</a><a class="dropdown-link"
                        href="modules/echarts/pie-charts.html">Pie charts</a><a class="dropdown-link"
                        href="modules/echarts/gauge-chart.html">Gauge chart</a><a class="dropdown-link"
                        href="modules/echarts/radar-charts.html">Radar charts</a><a class="dropdown-link"
                        href="modules/echarts/heatmap-charts.html">Heatmap charts</a><a class="dropdown-link"
                        href="modules/echarts/how-to-use.html">How to use</a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="dropdown-item-group"><span class="me-2" data-feather="package"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Components</h6>
                      </div><a class="dropdown-link" href="modules/components/accordion.html">Accordion</a><a
                        class="dropdown-link" href="modules/components/avatar.html">Avatar</a><a class="dropdown-link"
                        href="modules/components/alerts.html">Alerts</a><a class="dropdown-link"
                        href="modules/components/badge.html">Badge</a><a class="dropdown-link"
                        href="modules/components/breadcrumb.html">Breadcrumb</a><a class="dropdown-link"
                        href="modules/components/button.html">Buttons</a><a class="dropdown-link"
                        href="modules/components/calendar.html">Calendar</a><a class="dropdown-link"
                        href="modules/components/card.html">Card</a><a class="dropdown-link"
                        href="modules/components/carousel/bootstrap.html">Bootstrap</a><a class="dropdown-link"
                        href="modules/components/carousel/swiper.html">Swiper</a><a class="dropdown-link"
                        href="modules/components/collapse.html">Collapse</a><a class="dropdown-link"
                        href="modules/components/dropdown.html">Dropdown</a><a class="dropdown-link"
                        href="modules/components/dhtmlx-gantt.html">Dhtmlx gantt</a><a class="dropdown-link"
                        href="modules/components/list-group.html">List group</a><a class="dropdown-link"
                        href="modules/components/modal.html">Modals</a><a class="dropdown-link"
                        href="modules/components/navs-and-tabs/navs.html">Navs</a><a class="dropdown-link"
                        href="modules/components/navs-and-tabs/navbar.html">Navbar</a><a class="dropdown-link"
                        href="modules/components/navs-and-tabs/tabs.html">Tabs</a><a class="dropdown-link"
                        href="modules/components/offcanvas.html">Offcanvas</a><a class="dropdown-link"
                        href="modules/components/progress-bar.html">Progress bar</a><a class="dropdown-link"
                        href="modules/components/placeholder.html">Placeholder</a><a class="dropdown-link"
                        href="modules/components/pagination.html">Pagination</a><a class="dropdown-link"
                        href="modules/components/popovers.html">Popovers</a><a class="dropdown-link"
                        href="modules/components/scrollspy.html">Scrollspy</a><a class="dropdown-link"
                        href="modules/components/sortable.html">Sortable</a><a class="dropdown-link"
                        href="modules/components/spinners.html">Spinners</a><a class="dropdown-link"
                        href="modules/components/toast.html">Toast</a><a class="dropdown-link"
                        href="modules/components/tooltips.html">Tooltips</a><a class="dropdown-link"
                        href="modules/components/typed-text.html">Typed text</a><a class="dropdown-link"
                        href="modules/components/chat-widget.html">Chat widget</a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="dropdown-item-group"><span class="me-2" data-feather="columns"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Tables</h6>
                      </div><a class="dropdown-link" href="modules/tables/basic-tables.html">Basic tables</a><a
                        class="dropdown-link" href="modules/tables/advance-tables.html">Advance tables</a><a
                        class="dropdown-link" href="modules/tables/bulk-select.html">Bulk Select</a>
                      <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="tool"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Utilities</h6>
                      </div><a class="dropdown-link" href="modules/utilities/background.html">Background</a><a
                        class="dropdown-link" href="modules/utilities/borders.html">Borders</a><a class="dropdown-link"
                        href="modules/utilities/colors.html">Colors</a><a class="dropdown-link"
                        href="modules/utilities/display.html">Display</a><a class="dropdown-link"
                        href="modules/utilities/flex.html">Flex</a><a class="dropdown-link"
                        href="modules/utilities/stacks.html">Stacks</a><a class="dropdown-link"
                        href="modules/utilities/float.html">Float</a><a class="dropdown-link"
                        href="modules/utilities/grid.html">Grid</a><a class="dropdown-link"
                        href="modules/utilities/interactions.html">Interactions</a><a class="dropdown-link"
                        href="modules/utilities/opacity.html">Opacity</a><a class="dropdown-link"
                        href="modules/utilities/overflow.html">Overflow</a><a class="dropdown-link"
                        href="modules/utilities/position.html">Position</a><a class="dropdown-link"
                        href="modules/utilities/shadows.html">Shadows</a><a class="dropdown-link"
                        href="modules/utilities/sizing.html">Sizing</a><a class="dropdown-link"
                        href="modules/utilities/spacing.html">Spacing</a><a class="dropdown-link"
                        href="modules/utilities/typography.html">Typography</a><a class="dropdown-link"
                        href="modules/utilities/vertical-align.html">Vertical align</a><a class="dropdown-link"
                        href="modules/utilities/visibility.html">Visibility</a>
                    </div>
                  </div>
                </div>
              </div>
            </ul>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-document-layout-right"></span>Documentation</a>
            <ul class="dropdown-menu navbar-dropdown-caret">
              <li><a class="dropdown-item" href="documentation/getting-started.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="life-buoy"></span>Getting
                    started</div>
                </a></li>
              <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="customization" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="settings"></span>Customization</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="documentation/customization/configuration.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Configuration</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/customization/styling.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Styling</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/customization/color.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Color</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/customization/dark-mode.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/customization/plugin.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Plugin</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="layouts-doc" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="table"></span>Layouts doc</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="documentation/layouts/vertical-navbar.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical navbar</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/layouts/horizontal-navbar.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal navbar</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/layouts/combo-navbar.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo navbar</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/layouts/dual-nav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="documentation/gulp.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 fa-brands fa-gulp ms-1 me-1 fa-lg"></span>Gulp
                  </div>
                </a></li>
              <li><a class="dropdown-item" href="documentation/design-file.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="figma"></span>Design file
                  </div>
                </a></li>
              <li><a class="dropdown-item" href="changelog.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="git-merge"></span>Changelog
                  </div>
                </a></li>
              <li><a class="dropdown-item" href="showcase.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="monitor"></span>Showcase</div>
                </a></li>
            </ul>
          </li>
        </ul>
      </div>
      <ul class="navbar-nav navbar-nav-icons flex-row">
        <li class="nav-item">
          <div class="theme-control-toggle fa-icon-wait px-2"><input
              class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme"
              value="dark" id="themeControlToggle" /><label
              class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
              data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme"
              style="height:32px;width:32px;"><span class="icon" data-feather="moon"></span></label><label
              class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
              data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme"
              style="height:32px;width:32px;"><span class="icon" data-feather="sun"></span></label></div>
        </li>
        <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#searchBoxModal"><span
              data-feather="search" style="height:19px;width:19px;margin-bottom: 2px;"></span></a></li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" style="min-width: 2.25rem" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside"><span class="d-block"
              style="height:20px;width:20px;"><span data-feather="bell"
                style="height:20px;width:20px;"></span></span></a>
          <div
            class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border navbar-dropdown-caret"
            id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
            <div class="card position-relative border-0">
              <div class="card-header p-2">
                <div class="d-flex justify-content-between">
                  <h5 class="text-body-emphasis mb-0">Notifications</h5><button class="btn btn-link p-0 fs-9 fw-normal"
                    type="button">Mark all as read</button>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="scrollbar-overlay" style="height: 27rem;">
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative read border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                            src="assets/img/team/40x40/30.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Jessie Samson</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>💬</span>Mentioned you in a comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">10m</span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">10:41 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3">
                          <div class="avatar-name rounded-circle"><span>J</span></div>
                        </div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Jane Foster</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>📅</span>Created an event.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">20m</span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">10:20 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle avatar-placeholder"
                            src="assets/img/team/40x40/avatar.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Jessie Samson</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>👍</span>Liked your comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">1h</span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">9:30 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                            src="assets/img/team/40x40/57.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Kiera Anderson</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>💬</span>Mentioned you in a comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">9:11 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                            src="assets/img/team/40x40/59.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Herman Carter</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>👤</span>Tagged you in a comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">10:58 PM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative read ">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                            src="assets/img/team/40x40/58.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Benjamin Button</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>👍</span>Liked your comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">10:18 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer p-0 border-top border-translucent border-0">
                <div class="my-2 text-center fw-bold fs-10 text-body-tertiary text-opactity-85"><a class="fw-bolder"
                    href="pages/notifications.html">Notification history</a></div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"><svg width="16" height="16"
              viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
              <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
              <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
              <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
              <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
              <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
              <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
              <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
              <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
            </svg></a>
          <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nine-dots shadow border"
            aria-labelledby="navbarDropdownNindeDots">
            <div class="card bg-body-emphasis position-relative border-0">
              <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                <div class="row text-center align-items-center gx-0 gy-0">
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/behance.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Behance</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/google-cloud.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Cloud</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/slack.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Slack</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/gitlab.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Gitlab</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/bitbucket.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">BitBucket</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/google-drive.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Drive</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/trello.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Trello</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/figma.webp" alt="" width="20" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Figma</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/twitter.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Twitter</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/pinterest.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Pinterest</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/ln.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Linkedin</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/google-maps.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Maps</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/google-photos.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Photos</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/spotify.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Spotify</p>
                    </a></div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button"
            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
            <div class="avatar avatar-l ">
              <img class="rounded-circle " src="assets/img/team/40x40/57.webp" alt="" />
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border"
            aria-labelledby="navbarDropdownUser">
            <div class="card position-relative border-0">
              <div class="card-body p-0">
                <div class="text-center pt-4 pb-3">
                  <div class="avatar avatar-xl ">
                    <img class="rounded-circle " src="assets/img/team/72x72/57.webp" alt="" />
                  </div>
                  <h6 class="mt-2 text-body-emphasis">Jerry Seinfield</h6>
                </div>
                <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text"
                    placeholder="Update your status" /></div>
              </div>
              <div class="overflow-auto scrollbar" style="height: 10rem;">
                <ul class="nav d-flex flex-column mb-2 pb-1">
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="user"></span><span>Profile</span></a></li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"><span
                        class="me-2 text-body align-bottom" data-feather="pie-chart"></span>Dashboard</a></li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="lock"></span>Posts &amp; Activity</a></li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="settings"></span>Settings &amp; Privacy </a>
                  </li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="help-circle"></span>Help Center</a></li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="globe"></span>Language</a></li>
                </ul>
              </div>
              <div class="card-footer p-0 border-top border-translucent">
                <ul class="nav d-flex flex-column my-3">
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="user-plus"></span>Add another account</a></li>
                </ul>
                <hr />
                <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span
                      class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                <div class="my-2 text-center fw-bold fs-10 text-body-quaternary"><a class="text-body-quaternary me-1"
                    href="#!">Privacy policy</a>&bull;<a class="text-body-quaternary mx-1" href="#!">Terms</a>&bull;<a
                    class="text-body-quaternary ms-1" href="#!">Cookies</a></div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </nav>
    <nav class="navbar navbar-top navbar-slim justify-content-between fixed-top navbar-expand-lg" id="navbarTopSlim"
      style="display:none;">
      <div class="navbar-logo">
        <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
          data-bs-toggle="collapse" data-bs-target="#navbarTopCollapse" aria-controls="navbarTopCollapse"
          aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
              class="toggle-line"></span></span></button>
        <a class="navbar-brand navbar-brand" href="index.html">phoenix <span
            class="text-body-highlight d-none d-sm-inline">slim</span></a>
      </div>
      <div class="collapse navbar-collapse navbar-top-collapse order-1 order-lg-0 justify-content-center"
        id="navbarTopCollapse">
        <ul class="navbar-nav navbar-nav-top" data-dropdown-on-hover="data-dropdown-on-hover">
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-chart-pie"></span>Home</a>
            <ul class="dropdown-menu navbar-dropdown-caret">
              <li><a class="dropdown-item active" href="index.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="shopping-cart"></span>E
                    commerce</div>
                </a></li>
              <li><a class="dropdown-item" href="dashboard/project-management.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clipboard"></span>Project
                    management</div>
                </a></li>
              <li><a class="dropdown-item" href="dashboard/crm.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="phone"></span>CRM</div>
                </a></li>
              <li><a class="dropdown-item" href="dashboard/travel-agency.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="briefcase"></span>Travel
                    agency</div>
                </a></li>
              <li><a class="dropdown-item" href="dashboard/stock.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="briefcase"></span>Stock</div>
                </a></li>
              <li><a class="dropdown-item" href="apps/social/feed.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="share-2"></span>Social feed
                  </div>
                </a></li>
            </ul>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-cube"></span>Apps</a>
            <ul class="dropdown-menu navbar-dropdown-caret">
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="e-commerce" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="shopping-cart"></span>E commerce</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Admin</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/add-product.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add product</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/products.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/customers.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customers</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/customer-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customer details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/orders.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Orders</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/order-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/refund.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Refund</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Customer</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/homepage.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Product details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/products-filter.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products filter</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/cart.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Cart</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/checkout.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/shipping-info.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Shipping info</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/profile.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/favourite-stores.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Favourite stores</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/wishlist.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Wishlist</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/order-tracking.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order tracking</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/invoice.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Invoice</div>
                        </a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="CRM" href="#" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="phone"></span>CRM</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/crm/analytics.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Analytics</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/deals.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deals</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/deal-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deal details</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/leads.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Leads</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/lead-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lead details</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/reports.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/report-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Report details</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/add-contact.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add contact</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="project-management" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="clipboard"></span>Project management</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/project-management/create-new.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create new</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/project-list-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project list view</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/project-card-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project card view</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/project-board-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project board view</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/todo-list.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Todo list</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/project-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project details</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="travel-agency" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="briefcase"></span>Travel agency</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/travel-agency/landing.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Landing</div>
                    </a></li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="hotel" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Hotel</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#"
                          data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="dropdown-item-wrapper"><span
                              class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                class="me-2 uil"></span>Admin</span></div>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/add-property.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add property</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/add-room.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add room</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/room-listing.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Room listing</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/room-search.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Search room</div>
                            </a></li>
                        </ul>
                      </li>
                      <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#"
                          data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="dropdown-item-wrapper"><span
                              class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                class="me-2 uil"></span>Customer</span></div>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/homepage.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/hotel-details.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Hotel details</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/hotel-compare.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Hotel compare</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/checkout.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/payment.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Payment</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/gallery.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery</div>
                            </a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="flight" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Flight</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="apps/travel-agency/flight/homepage.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/travel-agency/flight/booking.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Booking</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/travel-agency/flight/payment.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Payment</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="trip" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Trip</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="apps/travel-agency/trip/homepage.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/travel-agency/trip/trip-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Trip details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/travel-agency/trip/checkout.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                        </a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="stock" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="dollar-sign"></span>Stock</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/stock/stock-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Stock details</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/stock/portfolio.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Portfolio</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/stock/watchlist.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Watchlist</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="apps/chat.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="message-square"></span>Chat
                  </div>
                </a></li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="email" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="mail"></span>Email</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/email/inbox.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Inbox</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/email/email-detail.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Email detail</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/email/compose.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Compose</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="events" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="bookmark"></span>Events</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/events/create-an-event.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create an event</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/events/event-detail.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Event detail</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="kanban" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="trello"></span>Kanban</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/kanban/kanban.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Kanban</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/kanban/boards.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Boards</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/kanban/create-kanban-board.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create board</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="apps/gantt-chart.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 fa-solid fa-chart-gantt "></span>Gantt chart
                  </div>
                </a></li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="social" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="share-2"></span>Social</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/social/profile.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/social/settings.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Settings</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="gallery" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="image"></span>Gallery</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/gallery/album.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Album</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/gallery-column.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery column</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/gallery-grid.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery grid</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/grid-with-title.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Grid with title</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/gallery-masonry.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery masonry</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/gallery-slider.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery slider</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="file-manager" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="folder"></span>File manager</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/file-manager/grid-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Grid view</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/file-manager/list-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>List view</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="apps/calendar.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="calendar"></span>Calendar
                  </div>
                </a></li>
            </ul>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-files-landscapes-alt"></span>Pages</a>
            <ul class="dropdown-menu navbar-dropdown-caret">
              <li><a class="dropdown-item" href="pages/starter.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="compass"></span>Starter</div>
                </a></li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="faq" href="#" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="help-circle"></span>Faq</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="pages/faq/faq-accordion.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq accordion</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/faq/faq-tab.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq tab</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="landing" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="globe"></span>Landing</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="pages/landing/default.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Default</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/landing/alternate.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Alternate</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="pricing" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="tag"></span>Pricing</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="pages/pricing/pricing-column.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing column</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/pricing/pricing-grid.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing grid</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="pages/notifications.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="bell"></span>Notifications
                  </div>
                </a></li>
              <li><a class="dropdown-item" href="pages/members.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="users"></span>Members</div>
                </a></li>
              <li><a class="dropdown-item" href="pages/timeline.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clock"></span>Timeline</div>
                </a></li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="errors" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="alert-triangle"></span>Errors</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="pages/errors/404.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>404</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/errors/403.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>403</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/errors/500.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>500</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="authentication" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="lock"></span>Authentication</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="simple" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Simple</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="pages/authentication/simple/sign-in.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/sign-up.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/sign-out.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/forgot-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/reset-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/lock-screen.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/2FA.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="split" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Split</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="pages/authentication/split/sign-in.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/sign-up.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/sign-out.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/forgot-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/reset-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/lock-screen.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/2FA.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="Card" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Card</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="pages/authentication/card/sign-in.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/sign-up.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/sign-out.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/forgot-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/reset-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/lock-screen.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/2FA.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                        </a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="layouts" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="layout"></span>Layouts</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="demo/vertical-sidenav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical sidenav</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/dark-mode.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/sidenav-collapse.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sidenav collapse</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/darknav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Darknav</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/topnav-slim.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Topnav slim</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/navbar-horizontal.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar horizontal</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/horizontal-slim.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal slim</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/combo-nav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/combo-nav-slim.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav slim</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/dual-nav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                    </a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-puzzle-piece"></span>Modules</a>
            <ul class="dropdown-menu navbar-dropdown-caret dropdown-menu-card py-0">
              <div class="border-0 scrollbar" style="max-height: 60vh;">
                <div class="px-3 pt-4 pb-3 img-dropdown">
                  <div class="row gx-4 gy-5">
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="dropdown-item-group"><span class="me-2" data-feather="file-text"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Forms</h6>
                      </div><a class="dropdown-link" href="modules/forms/basic/form-control.html">Form control</a><a
                        class="dropdown-link" href="modules/forms/basic/input-group.html">Input group</a><a
                        class="dropdown-link" href="modules/forms/basic/select.html">Select</a><a class="dropdown-link"
                        href="modules/forms/basic/checks.html">Checks</a><a class="dropdown-link"
                        href="modules/forms/basic/range.html">Range</a><a class="dropdown-link"
                        href="modules/forms/basic/floating-labels.html">Floating labels</a><a class="dropdown-link"
                        href="modules/forms/basic/layout.html">Layout</a><a class="dropdown-link"
                        href="modules/forms/advance/advance-select.html">Advance select</a><a class="dropdown-link"
                        href="modules/forms/advance/date-picker.html">Date picker</a><a class="dropdown-link"
                        href="modules/forms/advance/editor.html">Editor</a><a class="dropdown-link"
                        href="modules/forms/advance/file-uploader.html">File uploader</a><a class="dropdown-link"
                        href="modules/forms/advance/range.html">Range</a><a class="dropdown-link"
                        href="modules/forms/advance/rating.html">Rating</a><a class="dropdown-link"
                        href="modules/forms/advance/emoji-button.html">Emoji button</a><a class="dropdown-link"
                        href="modules/forms/validation.html">Validation</a><a class="dropdown-link"
                        href="modules/forms/wizard.html">Wizard</a>
                      <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="grid"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Icons</h6>
                      </div><a class="dropdown-link" href="modules/icons/feather.html">Feather</a><a
                        class="dropdown-link" href="modules/icons/font-awesome.html">Font awesome</a><a
                        class="dropdown-link" href="modules/icons/unicons.html">Unicons</a>
                      <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="bar-chart-2"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">ECharts</h6>
                      </div><a class="dropdown-link" href="modules/echarts/line-charts.html">Line charts</a><a
                        class="dropdown-link" href="modules/echarts/bar-charts.html">Bar charts</a><a
                        class="dropdown-link" href="modules/echarts/candlestick-charts.html">Candlestick charts</a><a
                        class="dropdown-link" href="modules/echarts/geo-map.html">Geo map</a><a class="dropdown-link"
                        href="modules/echarts/scatter-charts.html">Scatter charts</a><a class="dropdown-link"
                        href="modules/echarts/pie-charts.html">Pie charts</a><a class="dropdown-link"
                        href="modules/echarts/gauge-chart.html">Gauge chart</a><a class="dropdown-link"
                        href="modules/echarts/radar-charts.html">Radar charts</a><a class="dropdown-link"
                        href="modules/echarts/heatmap-charts.html">Heatmap charts</a><a class="dropdown-link"
                        href="modules/echarts/how-to-use.html">How to use</a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="dropdown-item-group"><span class="me-2" data-feather="package"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Components</h6>
                      </div><a class="dropdown-link" href="modules/components/accordion.html">Accordion</a><a
                        class="dropdown-link" href="modules/components/avatar.html">Avatar</a><a class="dropdown-link"
                        href="modules/components/alerts.html">Alerts</a><a class="dropdown-link"
                        href="modules/components/badge.html">Badge</a><a class="dropdown-link"
                        href="modules/components/breadcrumb.html">Breadcrumb</a><a class="dropdown-link"
                        href="modules/components/button.html">Buttons</a><a class="dropdown-link"
                        href="modules/components/calendar.html">Calendar</a><a class="dropdown-link"
                        href="modules/components/card.html">Card</a><a class="dropdown-link"
                        href="modules/components/carousel/bootstrap.html">Bootstrap</a><a class="dropdown-link"
                        href="modules/components/carousel/swiper.html">Swiper</a><a class="dropdown-link"
                        href="modules/components/collapse.html">Collapse</a><a class="dropdown-link"
                        href="modules/components/dropdown.html">Dropdown</a><a class="dropdown-link"
                        href="modules/components/dhtmlx-gantt.html">Dhtmlx gantt</a><a class="dropdown-link"
                        href="modules/components/list-group.html">List group</a><a class="dropdown-link"
                        href="modules/components/modal.html">Modals</a><a class="dropdown-link"
                        href="modules/components/navs-and-tabs/navs.html">Navs</a><a class="dropdown-link"
                        href="modules/components/navs-and-tabs/navbar.html">Navbar</a><a class="dropdown-link"
                        href="modules/components/navs-and-tabs/tabs.html">Tabs</a><a class="dropdown-link"
                        href="modules/components/offcanvas.html">Offcanvas</a><a class="dropdown-link"
                        href="modules/components/progress-bar.html">Progress bar</a><a class="dropdown-link"
                        href="modules/components/placeholder.html">Placeholder</a><a class="dropdown-link"
                        href="modules/components/pagination.html">Pagination</a><a class="dropdown-link"
                        href="modules/components/popovers.html">Popovers</a><a class="dropdown-link"
                        href="modules/components/scrollspy.html">Scrollspy</a><a class="dropdown-link"
                        href="modules/components/sortable.html">Sortable</a><a class="dropdown-link"
                        href="modules/components/spinners.html">Spinners</a><a class="dropdown-link"
                        href="modules/components/toast.html">Toast</a><a class="dropdown-link"
                        href="modules/components/tooltips.html">Tooltips</a><a class="dropdown-link"
                        href="modules/components/typed-text.html">Typed text</a><a class="dropdown-link"
                        href="modules/components/chat-widget.html">Chat widget</a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="dropdown-item-group"><span class="me-2" data-feather="columns"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Tables</h6>
                      </div><a class="dropdown-link" href="modules/tables/basic-tables.html">Basic tables</a><a
                        class="dropdown-link" href="modules/tables/advance-tables.html">Advance tables</a><a
                        class="dropdown-link" href="modules/tables/bulk-select.html">Bulk Select</a>
                      <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="tool"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Utilities</h6>
                      </div><a class="dropdown-link" href="modules/utilities/background.html">Background</a><a
                        class="dropdown-link" href="modules/utilities/borders.html">Borders</a><a class="dropdown-link"
                        href="modules/utilities/colors.html">Colors</a><a class="dropdown-link"
                        href="modules/utilities/display.html">Display</a><a class="dropdown-link"
                        href="modules/utilities/flex.html">Flex</a><a class="dropdown-link"
                        href="modules/utilities/stacks.html">Stacks</a><a class="dropdown-link"
                        href="modules/utilities/float.html">Float</a><a class="dropdown-link"
                        href="modules/utilities/grid.html">Grid</a><a class="dropdown-link"
                        href="modules/utilities/interactions.html">Interactions</a><a class="dropdown-link"
                        href="modules/utilities/opacity.html">Opacity</a><a class="dropdown-link"
                        href="modules/utilities/overflow.html">Overflow</a><a class="dropdown-link"
                        href="modules/utilities/position.html">Position</a><a class="dropdown-link"
                        href="modules/utilities/shadows.html">Shadows</a><a class="dropdown-link"
                        href="modules/utilities/sizing.html">Sizing</a><a class="dropdown-link"
                        href="modules/utilities/spacing.html">Spacing</a><a class="dropdown-link"
                        href="modules/utilities/typography.html">Typography</a><a class="dropdown-link"
                        href="modules/utilities/vertical-align.html">Vertical align</a><a class="dropdown-link"
                        href="modules/utilities/visibility.html">Visibility</a>
                    </div>
                  </div>
                </div>
              </div>
            </ul>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-document-layout-right"></span>Documentation</a>
            <ul class="dropdown-menu navbar-dropdown-caret">
              <li><a class="dropdown-item" href="documentation/getting-started.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="life-buoy"></span>Getting
                    started</div>
                </a></li>
              <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="customization" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="settings"></span>Customization</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="documentation/customization/configuration.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Configuration</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/customization/styling.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Styling</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/customization/color.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Color</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/customization/dark-mode.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/customization/plugin.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Plugin</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="layouts-doc" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="table"></span>Layouts doc</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="documentation/layouts/vertical-navbar.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical navbar</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/layouts/horizontal-navbar.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal navbar</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/layouts/combo-navbar.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo navbar</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/layouts/dual-nav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="documentation/gulp.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 fa-brands fa-gulp ms-1 me-1 fa-lg"></span>Gulp
                  </div>
                </a></li>
              <li><a class="dropdown-item" href="documentation/design-file.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="figma"></span>Design file
                  </div>
                </a></li>
              <li><a class="dropdown-item" href="changelog.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="git-merge"></span>Changelog
                  </div>
                </a></li>
              <li><a class="dropdown-item" href="showcase.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="monitor"></span>Showcase</div>
                </a></li>
            </ul>
          </li>
        </ul>
      </div>
      <ul class="navbar-nav navbar-nav-icons flex-row">
        <li class="nav-item">
          <div class="theme-control-toggle fa-ion-wait pe-2 theme-control-toggle-slim"><input
              class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox"
              data-theme-control="phoenixTheme" value="dark" /><label
              class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
              data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span
                class="d-none d-sm-flex flex-center" style="height:16px;width:16px;"><span class="me-1 icon"
                  data-feather="moon"></span></span><span class="fs-9 fw-bold">Dark</span></label><label
              class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
              data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span
                class="d-none d-sm-flex flex-center" style="height:16px;width:16px;"><span class="me-1 icon"
                  data-feather="sun"></span></span><span class="fs-9 fw-bold">Light</span></label></div>
        </li>
        <li class="nav-item"> <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#searchBoxModal"><span
              class="d-inline-block" style="height:12px;width:12px;"><span data-feather="search"
                style="height:12px;width:12px;"></span></span></a></li>
        <li class="nav-item dropdown">
          <a class="nav-link" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown"
            data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="d-inline-block"
              style="height:12px;width:12px;"><span data-feather="bell"
                style="height:12px;width:12px;"></span></span></a>
          <div
            class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border navbar-dropdown-caret"
            id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
            <div class="card position-relative border-0">
              <div class="card-header p-2">
                <div class="d-flex justify-content-between">
                  <h5 class="text-body-emphasis mb-0">Notifications</h5><button class="btn btn-link p-0 fs-9 fw-normal"
                    type="button">Mark all as read</button>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="scrollbar-overlay" style="height: 27rem;">
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative read border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                            src="assets/img/team/40x40/30.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Jessie Samson</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>💬</span>Mentioned you in a comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">10m</span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">10:41 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3">
                          <div class="avatar-name rounded-circle"><span>J</span></div>
                        </div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Jane Foster</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>📅</span>Created an event.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">20m</span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">10:20 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle avatar-placeholder"
                            src="assets/img/team/40x40/avatar.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Jessie Samson</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>👍</span>Liked your comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">1h</span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">9:30 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                            src="assets/img/team/40x40/57.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Kiera Anderson</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>💬</span>Mentioned you in a comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">9:11 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                            src="assets/img/team/40x40/59.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Herman Carter</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>👤</span>Tagged you in a comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">10:58 PM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative read ">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                            src="assets/img/team/40x40/58.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Benjamin Button</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>👍</span>Liked your comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">10:18 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer p-0 border-top border-translucent border-0">
                <div class="my-2 text-center fw-bold fs-10 text-body-tertiary text-opactity-85"><a class="fw-bolder"
                    href="pages/notifications.html">Notification history</a></div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"><svg width="10" height="10"
              viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
              <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
              <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
              <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
              <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
              <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
              <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
              <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
              <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
            </svg></a>
          <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nine-dots shadow border"
            aria-labelledby="navbarDropdownNindeDots">
            <div class="card bg-body-emphasis position-relative border-0">
              <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                <div class="row text-center align-items-center gx-0 gy-0">
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/behance.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Behance</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/google-cloud.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Cloud</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/slack.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Slack</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/gitlab.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Gitlab</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/bitbucket.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">BitBucket</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/google-drive.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Drive</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/trello.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Trello</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/figma.webp" alt="" width="20" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Figma</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/twitter.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Twitter</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/pinterest.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Pinterest</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/ln.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Linkedin</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/google-maps.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Maps</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/google-photos.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Photos</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/spotify.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Spotify</p>
                    </a></div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0 white-space-nowrap" id="navbarDropdownUser" href="#!"
            role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside"
            aria-expanded="false">Olivia <span class="d-inline-block" style="height:10.2px;width:10.2px;"><span
                class="fa-solid fa-chevron-down fs-10"></span></span></a>
          <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border"
            aria-labelledby="navbarDropdownUser">
            <div class="card position-relative border-0">
              <div class="card-body p-0">
                <div class="text-center pt-4 pb-3">
                  <div class="avatar avatar-xl ">
                    <img class="rounded-circle " src="assets/img/team/72x72/57.webp" alt="" />
                  </div>
                  <h6 class="mt-2 text-body-emphasis">Jerry Seinfield</h6>
                </div>
                <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text"
                    placeholder="Update your status" /></div>
              </div>
              <div class="overflow-auto scrollbar" style="height: 10rem;">
                <ul class="nav d-flex flex-column mb-2 pb-1">
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="user"></span><span>Profile</span></a></li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"><span
                        class="me-2 text-body align-bottom" data-feather="pie-chart"></span>Dashboard</a></li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="lock"></span>Posts &amp; Activity</a></li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="settings"></span>Settings &amp; Privacy </a>
                  </li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="help-circle"></span>Help Center</a></li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="globe"></span>Language</a></li>
                </ul>
              </div>
              <div class="card-footer p-0 border-top border-translucent">
                <ul class="nav d-flex flex-column my-3">
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="user-plus"></span>Add another account</a></li>
                </ul>
                <hr />
                <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span
                      class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                <div class="my-2 text-center fw-bold fs-10 text-body-quaternary"><a class="text-body-quaternary me-1"
                    href="#!">Privacy policy</a>&bull;<a class="text-body-quaternary mx-1" href="#!">Terms</a>&bull;<a
                    class="text-body-quaternary ms-1" href="#!">Cookies</a></div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </nav>
    <nav class="navbar navbar-top fixed-top navbar-expand-lg" id="navbarCombo" data-navbar-top="combo"
      data-move-target="#navbarVerticalNav" style="display:none;">
      <div class="navbar-logo">
        <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
          data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse"
          aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
              class="toggle-line"></span></span></button>
        <a class="navbar-brand me-1 me-sm-3" href="index.html">
          <div class="d-flex align-items-center">
            <div class="d-flex align-items-center"><img src="assets/img/icons/logo.png" alt="phoenix" width="27" />
              <h5 class="logo-text ms-2 d-none d-sm-block">phoenix</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="collapse navbar-collapse navbar-top-collapse order-1 order-lg-0 justify-content-center"
        id="navbarTopCollapse">
        <ul class="navbar-nav navbar-nav-top" data-dropdown-on-hover="data-dropdown-on-hover">
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-chart-pie"></span>Home</a>
            <ul class="dropdown-menu navbar-dropdown-caret">
              <li><a class="dropdown-item active" href="index.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="shopping-cart"></span>E
                    commerce</div>
                </a></li>
              <li><a class="dropdown-item" href="dashboard/project-management.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clipboard"></span>Project
                    management</div>
                </a></li>
              <li><a class="dropdown-item" href="dashboard/crm.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="phone"></span>CRM</div>
                </a></li>
              <li><a class="dropdown-item" href="dashboard/travel-agency.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="briefcase"></span>Travel
                    agency</div>
                </a></li>
              <li><a class="dropdown-item" href="dashboard/stock.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="briefcase"></span>Stock</div>
                </a></li>
              <li><a class="dropdown-item" href="apps/social/feed.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="share-2"></span>Social feed
                  </div>
                </a></li>
            </ul>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-cube"></span>Apps</a>
            <ul class="dropdown-menu navbar-dropdown-caret">
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="e-commerce" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="shopping-cart"></span>E commerce</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Admin</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/add-product.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add product</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/products.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/customers.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customers</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/customer-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customer details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/orders.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Orders</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/order-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/refund.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Refund</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Customer</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/homepage.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Product details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/products-filter.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products filter</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/cart.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Cart</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/checkout.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/shipping-info.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Shipping info</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/profile.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/favourite-stores.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Favourite stores</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/wishlist.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Wishlist</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/order-tracking.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order tracking</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/invoice.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Invoice</div>
                        </a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="CRM" href="#" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="phone"></span>CRM</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/crm/analytics.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Analytics</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/deals.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deals</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/deal-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deal details</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/leads.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Leads</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/lead-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lead details</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/reports.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/report-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Report details</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/add-contact.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add contact</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="project-management" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="clipboard"></span>Project management</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/project-management/create-new.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create new</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/project-list-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project list view</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/project-card-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project card view</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/project-board-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project board view</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/todo-list.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Todo list</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/project-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project details</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="travel-agency" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="briefcase"></span>Travel agency</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/travel-agency/landing.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Landing</div>
                    </a></li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="hotel" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Hotel</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#"
                          data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="dropdown-item-wrapper"><span
                              class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                class="me-2 uil"></span>Admin</span></div>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/add-property.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add property</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/add-room.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add room</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/room-listing.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Room listing</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/room-search.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Search room</div>
                            </a></li>
                        </ul>
                      </li>
                      <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#"
                          data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="dropdown-item-wrapper"><span
                              class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                class="me-2 uil"></span>Customer</span></div>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/homepage.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/hotel-details.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Hotel details</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/hotel-compare.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Hotel compare</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/checkout.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/payment.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Payment</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/gallery.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery</div>
                            </a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="flight" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Flight</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="apps/travel-agency/flight/homepage.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/travel-agency/flight/booking.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Booking</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/travel-agency/flight/payment.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Payment</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="trip" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Trip</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="apps/travel-agency/trip/homepage.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/travel-agency/trip/trip-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Trip details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/travel-agency/trip/checkout.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                        </a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="stock" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="dollar-sign"></span>Stock</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/stock/stock-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Stock details</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/stock/portfolio.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Portfolio</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/stock/watchlist.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Watchlist</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="apps/chat.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="message-square"></span>Chat
                  </div>
                </a></li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="email" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="mail"></span>Email</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/email/inbox.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Inbox</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/email/email-detail.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Email detail</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/email/compose.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Compose</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="events" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="bookmark"></span>Events</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/events/create-an-event.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create an event</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/events/event-detail.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Event detail</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="kanban" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="trello"></span>Kanban</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/kanban/kanban.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Kanban</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/kanban/boards.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Boards</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/kanban/create-kanban-board.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create board</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="apps/gantt-chart.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 fa-solid fa-chart-gantt "></span>Gantt chart
                  </div>
                </a></li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="social" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="share-2"></span>Social</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/social/profile.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/social/settings.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Settings</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="gallery" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="image"></span>Gallery</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/gallery/album.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Album</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/gallery-column.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery column</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/gallery-grid.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery grid</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/grid-with-title.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Grid with title</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/gallery-masonry.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery masonry</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/gallery-slider.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery slider</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="file-manager" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="folder"></span>File manager</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/file-manager/grid-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Grid view</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/file-manager/list-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>List view</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="apps/calendar.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="calendar"></span>Calendar
                  </div>
                </a></li>
            </ul>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-files-landscapes-alt"></span>Pages</a>
            <ul class="dropdown-menu navbar-dropdown-caret">
              <li><a class="dropdown-item" href="pages/starter.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="compass"></span>Starter</div>
                </a></li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="faq" href="#" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="help-circle"></span>Faq</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="pages/faq/faq-accordion.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq accordion</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/faq/faq-tab.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq tab</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="landing" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="globe"></span>Landing</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="pages/landing/default.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Default</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/landing/alternate.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Alternate</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="pricing" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="tag"></span>Pricing</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="pages/pricing/pricing-column.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing column</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/pricing/pricing-grid.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing grid</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="pages/notifications.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="bell"></span>Notifications
                  </div>
                </a></li>
              <li><a class="dropdown-item" href="pages/members.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="users"></span>Members</div>
                </a></li>
              <li><a class="dropdown-item" href="pages/timeline.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clock"></span>Timeline</div>
                </a></li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="errors" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="alert-triangle"></span>Errors</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="pages/errors/404.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>404</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/errors/403.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>403</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/errors/500.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>500</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="authentication" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="lock"></span>Authentication</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="simple" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Simple</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="pages/authentication/simple/sign-in.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/sign-up.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/sign-out.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/forgot-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/reset-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/lock-screen.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/2FA.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="split" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Split</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="pages/authentication/split/sign-in.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/sign-up.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/sign-out.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/forgot-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/reset-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/lock-screen.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/2FA.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="Card" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Card</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="pages/authentication/card/sign-in.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/sign-up.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/sign-out.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/forgot-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/reset-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/lock-screen.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/2FA.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                        </a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="layouts" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="layout"></span>Layouts</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="demo/vertical-sidenav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical sidenav</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/dark-mode.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/sidenav-collapse.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sidenav collapse</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/darknav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Darknav</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/topnav-slim.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Topnav slim</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/navbar-horizontal.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar horizontal</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/horizontal-slim.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal slim</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/combo-nav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/combo-nav-slim.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav slim</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/dual-nav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                    </a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-puzzle-piece"></span>Modules</a>
            <ul class="dropdown-menu navbar-dropdown-caret dropdown-menu-card py-0">
              <div class="border-0 scrollbar" style="max-height: 60vh;">
                <div class="px-3 pt-4 pb-3 img-dropdown">
                  <div class="row gx-4 gy-5">
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="dropdown-item-group"><span class="me-2" data-feather="file-text"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Forms</h6>
                      </div><a class="dropdown-link" href="modules/forms/basic/form-control.html">Form control</a><a
                        class="dropdown-link" href="modules/forms/basic/input-group.html">Input group</a><a
                        class="dropdown-link" href="modules/forms/basic/select.html">Select</a><a class="dropdown-link"
                        href="modules/forms/basic/checks.html">Checks</a><a class="dropdown-link"
                        href="modules/forms/basic/range.html">Range</a><a class="dropdown-link"
                        href="modules/forms/basic/floating-labels.html">Floating labels</a><a class="dropdown-link"
                        href="modules/forms/basic/layout.html">Layout</a><a class="dropdown-link"
                        href="modules/forms/advance/advance-select.html">Advance select</a><a class="dropdown-link"
                        href="modules/forms/advance/date-picker.html">Date picker</a><a class="dropdown-link"
                        href="modules/forms/advance/editor.html">Editor</a><a class="dropdown-link"
                        href="modules/forms/advance/file-uploader.html">File uploader</a><a class="dropdown-link"
                        href="modules/forms/advance/range.html">Range</a><a class="dropdown-link"
                        href="modules/forms/advance/rating.html">Rating</a><a class="dropdown-link"
                        href="modules/forms/advance/emoji-button.html">Emoji button</a><a class="dropdown-link"
                        href="modules/forms/validation.html">Validation</a><a class="dropdown-link"
                        href="modules/forms/wizard.html">Wizard</a>
                      <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="grid"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Icons</h6>
                      </div><a class="dropdown-link" href="modules/icons/feather.html">Feather</a><a
                        class="dropdown-link" href="modules/icons/font-awesome.html">Font awesome</a><a
                        class="dropdown-link" href="modules/icons/unicons.html">Unicons</a>
                      <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="bar-chart-2"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">ECharts</h6>
                      </div><a class="dropdown-link" href="modules/echarts/line-charts.html">Line charts</a><a
                        class="dropdown-link" href="modules/echarts/bar-charts.html">Bar charts</a><a
                        class="dropdown-link" href="modules/echarts/candlestick-charts.html">Candlestick charts</a><a
                        class="dropdown-link" href="modules/echarts/geo-map.html">Geo map</a><a class="dropdown-link"
                        href="modules/echarts/scatter-charts.html">Scatter charts</a><a class="dropdown-link"
                        href="modules/echarts/pie-charts.html">Pie charts</a><a class="dropdown-link"
                        href="modules/echarts/gauge-chart.html">Gauge chart</a><a class="dropdown-link"
                        href="modules/echarts/radar-charts.html">Radar charts</a><a class="dropdown-link"
                        href="modules/echarts/heatmap-charts.html">Heatmap charts</a><a class="dropdown-link"
                        href="modules/echarts/how-to-use.html">How to use</a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="dropdown-item-group"><span class="me-2" data-feather="package"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Components</h6>
                      </div><a class="dropdown-link" href="modules/components/accordion.html">Accordion</a><a
                        class="dropdown-link" href="modules/components/avatar.html">Avatar</a><a class="dropdown-link"
                        href="modules/components/alerts.html">Alerts</a><a class="dropdown-link"
                        href="modules/components/badge.html">Badge</a><a class="dropdown-link"
                        href="modules/components/breadcrumb.html">Breadcrumb</a><a class="dropdown-link"
                        href="modules/components/button.html">Buttons</a><a class="dropdown-link"
                        href="modules/components/calendar.html">Calendar</a><a class="dropdown-link"
                        href="modules/components/card.html">Card</a><a class="dropdown-link"
                        href="modules/components/carousel/bootstrap.html">Bootstrap</a><a class="dropdown-link"
                        href="modules/components/carousel/swiper.html">Swiper</a><a class="dropdown-link"
                        href="modules/components/collapse.html">Collapse</a><a class="dropdown-link"
                        href="modules/components/dropdown.html">Dropdown</a><a class="dropdown-link"
                        href="modules/components/dhtmlx-gantt.html">Dhtmlx gantt</a><a class="dropdown-link"
                        href="modules/components/list-group.html">List group</a><a class="dropdown-link"
                        href="modules/components/modal.html">Modals</a><a class="dropdown-link"
                        href="modules/components/navs-and-tabs/navs.html">Navs</a><a class="dropdown-link"
                        href="modules/components/navs-and-tabs/navbar.html">Navbar</a><a class="dropdown-link"
                        href="modules/components/navs-and-tabs/tabs.html">Tabs</a><a class="dropdown-link"
                        href="modules/components/offcanvas.html">Offcanvas</a><a class="dropdown-link"
                        href="modules/components/progress-bar.html">Progress bar</a><a class="dropdown-link"
                        href="modules/components/placeholder.html">Placeholder</a><a class="dropdown-link"
                        href="modules/components/pagination.html">Pagination</a><a class="dropdown-link"
                        href="modules/components/popovers.html">Popovers</a><a class="dropdown-link"
                        href="modules/components/scrollspy.html">Scrollspy</a><a class="dropdown-link"
                        href="modules/components/sortable.html">Sortable</a><a class="dropdown-link"
                        href="modules/components/spinners.html">Spinners</a><a class="dropdown-link"
                        href="modules/components/toast.html">Toast</a><a class="dropdown-link"
                        href="modules/components/tooltips.html">Tooltips</a><a class="dropdown-link"
                        href="modules/components/typed-text.html">Typed text</a><a class="dropdown-link"
                        href="modules/components/chat-widget.html">Chat widget</a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="dropdown-item-group"><span class="me-2" data-feather="columns"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Tables</h6>
                      </div><a class="dropdown-link" href="modules/tables/basic-tables.html">Basic tables</a><a
                        class="dropdown-link" href="modules/tables/advance-tables.html">Advance tables</a><a
                        class="dropdown-link" href="modules/tables/bulk-select.html">Bulk Select</a>
                      <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="tool"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Utilities</h6>
                      </div><a class="dropdown-link" href="modules/utilities/background.html">Background</a><a
                        class="dropdown-link" href="modules/utilities/borders.html">Borders</a><a class="dropdown-link"
                        href="modules/utilities/colors.html">Colors</a><a class="dropdown-link"
                        href="modules/utilities/display.html">Display</a><a class="dropdown-link"
                        href="modules/utilities/flex.html">Flex</a><a class="dropdown-link"
                        href="modules/utilities/stacks.html">Stacks</a><a class="dropdown-link"
                        href="modules/utilities/float.html">Float</a><a class="dropdown-link"
                        href="modules/utilities/grid.html">Grid</a><a class="dropdown-link"
                        href="modules/utilities/interactions.html">Interactions</a><a class="dropdown-link"
                        href="modules/utilities/opacity.html">Opacity</a><a class="dropdown-link"
                        href="modules/utilities/overflow.html">Overflow</a><a class="dropdown-link"
                        href="modules/utilities/position.html">Position</a><a class="dropdown-link"
                        href="modules/utilities/shadows.html">Shadows</a><a class="dropdown-link"
                        href="modules/utilities/sizing.html">Sizing</a><a class="dropdown-link"
                        href="modules/utilities/spacing.html">Spacing</a><a class="dropdown-link"
                        href="modules/utilities/typography.html">Typography</a><a class="dropdown-link"
                        href="modules/utilities/vertical-align.html">Vertical align</a><a class="dropdown-link"
                        href="modules/utilities/visibility.html">Visibility</a>
                    </div>
                  </div>
                </div>
              </div>
            </ul>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-document-layout-right"></span>Documentation</a>
            <ul class="dropdown-menu navbar-dropdown-caret">
              <li><a class="dropdown-item" href="documentation/getting-started.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="life-buoy"></span>Getting
                    started</div>
                </a></li>
              <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="customization" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="settings"></span>Customization</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="documentation/customization/configuration.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Configuration</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/customization/styling.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Styling</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/customization/color.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Color</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/customization/dark-mode.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/customization/plugin.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Plugin</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="layouts-doc" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="table"></span>Layouts doc</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="documentation/layouts/vertical-navbar.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical navbar</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/layouts/horizontal-navbar.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal navbar</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/layouts/combo-navbar.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo navbar</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/layouts/dual-nav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="documentation/gulp.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 fa-brands fa-gulp ms-1 me-1 fa-lg"></span>Gulp
                  </div>
                </a></li>
              <li><a class="dropdown-item" href="documentation/design-file.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="figma"></span>Design file
                  </div>
                </a></li>
              <li><a class="dropdown-item" href="changelog.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="git-merge"></span>Changelog
                  </div>
                </a></li>
              <li><a class="dropdown-item" href="showcase.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="monitor"></span>Showcase</div>
                </a></li>
            </ul>
          </li>
        </ul>
      </div>
      <ul class="navbar-nav navbar-nav-icons flex-row">
        <li class="nav-item">
          <div class="theme-control-toggle fa-icon-wait px-2"><input
              class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme"
              value="dark" id="themeControlToggle" /><label
              class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
              data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme"
              style="height:32px;width:32px;"><span class="icon" data-feather="moon"></span></label><label
              class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
              data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme"
              style="height:32px;width:32px;"><span class="icon" data-feather="sun"></span></label></div>
        </li>
        <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#searchBoxModal"><span
              data-feather="search" style="height:19px;width:19px;margin-bottom: 2px;"></span></a></li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" style="min-width: 2.25rem" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside"><span class="d-block"
              style="height:20px;width:20px;"><span data-feather="bell"
                style="height:20px;width:20px;"></span></span></a>
          <div
            class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border navbar-dropdown-caret"
            id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
            <div class="card position-relative border-0">
              <div class="card-header p-2">
                <div class="d-flex justify-content-between">
                  <h5 class="text-body-emphasis mb-0">Notifications</h5><button class="btn btn-link p-0 fs-9 fw-normal"
                    type="button">Mark all as read</button>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="scrollbar-overlay" style="height: 27rem;">
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative read border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                            src="assets/img/team/40x40/30.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Jessie Samson</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>💬</span>Mentioned you in a comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">10m</span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">10:41 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3">
                          <div class="avatar-name rounded-circle"><span>J</span></div>
                        </div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Jane Foster</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>📅</span>Created an event.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">20m</span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">10:20 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle avatar-placeholder"
                            src="assets/img/team/40x40/avatar.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Jessie Samson</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>👍</span>Liked your comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">1h</span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">9:30 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                            src="assets/img/team/40x40/57.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Kiera Anderson</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>💬</span>Mentioned you in a comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">9:11 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                            src="assets/img/team/40x40/59.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Herman Carter</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>👤</span>Tagged you in a comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">10:58 PM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative read ">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                            src="assets/img/team/40x40/58.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Benjamin Button</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>👍</span>Liked your comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">10:18 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer p-0 border-top border-translucent border-0">
                <div class="my-2 text-center fw-bold fs-10 text-body-tertiary text-opactity-85"><a class="fw-bolder"
                    href="pages/notifications.html">Notification history</a></div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"><svg width="16" height="16"
              viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
              <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
              <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
              <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
              <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
              <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
              <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
              <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
              <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
            </svg></a>
          <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nine-dots shadow border"
            aria-labelledby="navbarDropdownNindeDots">
            <div class="card bg-body-emphasis position-relative border-0">
              <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                <div class="row text-center align-items-center gx-0 gy-0">
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/behance.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Behance</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/google-cloud.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Cloud</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/slack.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Slack</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/gitlab.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Gitlab</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/bitbucket.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">BitBucket</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/google-drive.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Drive</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/trello.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Trello</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/figma.webp" alt="" width="20" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Figma</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/twitter.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Twitter</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/pinterest.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Pinterest</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/ln.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Linkedin</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/google-maps.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Maps</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/google-photos.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Photos</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/spotify.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Spotify</p>
                    </a></div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button"
            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
            <div class="avatar avatar-l ">
              <img class="rounded-circle " src="assets/img/team/40x40/57.webp" alt="" />
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border"
            aria-labelledby="navbarDropdownUser">
            <div class="card position-relative border-0">
              <div class="card-body p-0">
                <div class="text-center pt-4 pb-3">
                  <div class="avatar avatar-xl ">
                    <img class="rounded-circle " src="assets/img/team/72x72/57.webp" alt="" />
                  </div>
                  <h6 class="mt-2 text-body-emphasis">Jerry Seinfield</h6>
                </div>
                <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text"
                    placeholder="Update your status" /></div>
              </div>
              <div class="overflow-auto scrollbar" style="height: 10rem;">
                <ul class="nav d-flex flex-column mb-2 pb-1">
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="user"></span><span>Profile</span></a></li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"><span
                        class="me-2 text-body align-bottom" data-feather="pie-chart"></span>Dashboard</a></li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="lock"></span>Posts &amp; Activity</a></li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="settings"></span>Settings &amp; Privacy </a>
                  </li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="help-circle"></span>Help Center</a></li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="globe"></span>Language</a></li>
                </ul>
              </div>
              <div class="card-footer p-0 border-top border-translucent">
                <ul class="nav d-flex flex-column my-3">
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="user-plus"></span>Add another account</a></li>
                </ul>
                <hr />
                <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span
                      class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                <div class="my-2 text-center fw-bold fs-10 text-body-quaternary"><a class="text-body-quaternary me-1"
                    href="#!">Privacy policy</a>&bull;<a class="text-body-quaternary mx-1" href="#!">Terms</a>&bull;<a
                    class="text-body-quaternary ms-1" href="#!">Cookies</a></div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </nav>
    <nav class="navbar navbar-top fixed-top navbar-slim justify-content-between navbar-expand-lg" id="navbarComboSlim"
      data-navbar-top="combo" data-move-target="#navbarVerticalNav" style="display:none;">
      <div class="navbar-logo">
        <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
          data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse"
          aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
              class="toggle-line"></span></span></button>
        <a class="navbar-brand navbar-brand" href="index.html">phoenix <span
            class="text-body-highlight d-none d-sm-inline">slim</span></a>
      </div>
      <div class="collapse navbar-collapse navbar-top-collapse order-1 order-lg-0 justify-content-center"
        id="navbarTopCollapse">
        <ul class="navbar-nav navbar-nav-top" data-dropdown-on-hover="data-dropdown-on-hover">
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-chart-pie"></span>Home</a>
            <ul class="dropdown-menu navbar-dropdown-caret">
              <li><a class="dropdown-item active" href="index.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="shopping-cart"></span>E
                    commerce</div>
                </a></li>
              <li><a class="dropdown-item" href="dashboard/project-management.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clipboard"></span>Project
                    management</div>
                </a></li>
              <li><a class="dropdown-item" href="dashboard/crm.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="phone"></span>CRM</div>
                </a></li>
              <li><a class="dropdown-item" href="dashboard/travel-agency.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="briefcase"></span>Travel
                    agency</div>
                </a></li>
              <li><a class="dropdown-item" href="dashboard/stock.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="briefcase"></span>Stock</div>
                </a></li>
              <li><a class="dropdown-item" href="apps/social/feed.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="share-2"></span>Social feed
                  </div>
                </a></li>
            </ul>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-cube"></span>Apps</a>
            <ul class="dropdown-menu navbar-dropdown-caret">
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="e-commerce" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="shopping-cart"></span>E commerce</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Admin</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/add-product.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add product</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/products.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/customers.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customers</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/customer-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customer details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/orders.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Orders</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/order-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/admin/refund.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Refund</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Customer</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/homepage.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Product details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/products-filter.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products filter</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/cart.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Cart</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/checkout.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/shipping-info.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Shipping info</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/profile.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/favourite-stores.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Favourite stores</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/wishlist.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Wishlist</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/order-tracking.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order tracking</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/e-commerce/landing/invoice.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Invoice</div>
                        </a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="CRM" href="#" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="phone"></span>CRM</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/crm/analytics.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Analytics</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/deals.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deals</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/deal-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deal details</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/leads.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Leads</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/lead-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lead details</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/reports.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/report-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Report details</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/crm/add-contact.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add contact</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="project-management" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="clipboard"></span>Project management</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/project-management/create-new.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create new</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/project-list-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project list view</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/project-card-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project card view</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/project-board-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project board view</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/todo-list.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Todo list</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/project-management/project-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project details</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="travel-agency" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="briefcase"></span>Travel agency</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/travel-agency/landing.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Landing</div>
                    </a></li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="hotel" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Hotel</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#"
                          data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="dropdown-item-wrapper"><span
                              class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                class="me-2 uil"></span>Admin</span></div>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/add-property.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add property</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/add-room.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add room</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/room-listing.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Room listing</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/room-search.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Search room</div>
                            </a></li>
                        </ul>
                      </li>
                      <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#"
                          data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="dropdown-item-wrapper"><span
                              class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                class="me-2 uil"></span>Customer</span></div>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/homepage.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/hotel-details.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Hotel details</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/hotel-compare.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Hotel compare</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/checkout.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/payment.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Payment</div>
                            </a></li>
                          <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/gallery.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery</div>
                            </a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="flight" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Flight</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="apps/travel-agency/flight/homepage.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/travel-agency/flight/booking.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Booking</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/travel-agency/flight/payment.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Payment</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="trip" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Trip</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="apps/travel-agency/trip/homepage.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/travel-agency/trip/trip-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Trip details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="apps/travel-agency/trip/checkout.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                        </a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="stock" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="dollar-sign"></span>Stock</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/stock/stock-details.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Stock details</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/stock/portfolio.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Portfolio</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/stock/watchlist.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Watchlist</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="apps/chat.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="message-square"></span>Chat
                  </div>
                </a></li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="email" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="mail"></span>Email</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/email/inbox.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Inbox</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/email/email-detail.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Email detail</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/email/compose.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Compose</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="events" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="bookmark"></span>Events</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/events/create-an-event.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create an event</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/events/event-detail.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Event detail</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="kanban" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="trello"></span>Kanban</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/kanban/kanban.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Kanban</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/kanban/boards.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Boards</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/kanban/create-kanban-board.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create board</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="apps/gantt-chart.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 fa-solid fa-chart-gantt "></span>Gantt chart
                  </div>
                </a></li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="social" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="share-2"></span>Social</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/social/profile.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/social/settings.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Settings</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="gallery" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="image"></span>Gallery</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/gallery/album.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Album</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/gallery-column.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery column</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/gallery-grid.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery grid</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/grid-with-title.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Grid with title</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/gallery-masonry.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery masonry</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/gallery/gallery-slider.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery slider</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="file-manager" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="folder"></span>File manager</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="apps/file-manager/grid-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Grid view</div>
                    </a></li>
                  <li><a class="dropdown-item" href="apps/file-manager/list-view.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>List view</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="apps/calendar.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="calendar"></span>Calendar
                  </div>
                </a></li>
            </ul>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-files-landscapes-alt"></span>Pages</a>
            <ul class="dropdown-menu navbar-dropdown-caret">
              <li><a class="dropdown-item" href="pages/starter.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="compass"></span>Starter</div>
                </a></li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="faq" href="#" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="help-circle"></span>Faq</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="pages/faq/faq-accordion.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq accordion</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/faq/faq-tab.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq tab</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="landing" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="globe"></span>Landing</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="pages/landing/default.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Default</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/landing/alternate.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Alternate</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="pricing" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="tag"></span>Pricing</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="pages/pricing/pricing-column.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing column</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/pricing/pricing-grid.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing grid</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="pages/notifications.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="bell"></span>Notifications
                  </div>
                </a></li>
              <li><a class="dropdown-item" href="pages/members.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="users"></span>Members</div>
                </a></li>
              <li><a class="dropdown-item" href="pages/timeline.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clock"></span>Timeline</div>
                </a></li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="errors" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="alert-triangle"></span>Errors</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="pages/errors/404.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>404</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/errors/403.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>403</div>
                    </a></li>
                  <li><a class="dropdown-item" href="pages/errors/500.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>500</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="authentication" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="lock"></span>Authentication</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="simple" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Simple</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="pages/authentication/simple/sign-in.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/sign-up.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/sign-out.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/forgot-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/reset-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/lock-screen.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/simple/2FA.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="split" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Split</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="pages/authentication/split/sign-in.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/sign-up.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/sign-out.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/forgot-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/reset-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/lock-screen.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/split/2FA.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="Card" href="#"
                      data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span
                          class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                            class="me-2 uil"></span>Card</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="pages/authentication/card/sign-in.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/sign-up.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/sign-out.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/forgot-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/reset-password.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/lock-screen.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pages/authentication/card/2FA.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                        </a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="layouts" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="layout"></span>Layouts</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="demo/vertical-sidenav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical sidenav</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/dark-mode.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/sidenav-collapse.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sidenav collapse</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/darknav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Darknav</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/topnav-slim.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Topnav slim</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/navbar-horizontal.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar horizontal</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/horizontal-slim.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal slim</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/combo-nav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/combo-nav-slim.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav slim</div>
                    </a></li>
                  <li><a class="dropdown-item" href="demo/dual-nav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                    </a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-puzzle-piece"></span>Modules</a>
            <ul class="dropdown-menu navbar-dropdown-caret dropdown-menu-card py-0">
              <div class="border-0 scrollbar" style="max-height: 60vh;">
                <div class="px-3 pt-4 pb-3 img-dropdown">
                  <div class="row gx-4 gy-5">
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="dropdown-item-group"><span class="me-2" data-feather="file-text"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Forms</h6>
                      </div><a class="dropdown-link" href="modules/forms/basic/form-control.html">Form control</a><a
                        class="dropdown-link" href="modules/forms/basic/input-group.html">Input group</a><a
                        class="dropdown-link" href="modules/forms/basic/select.html">Select</a><a class="dropdown-link"
                        href="modules/forms/basic/checks.html">Checks</a><a class="dropdown-link"
                        href="modules/forms/basic/range.html">Range</a><a class="dropdown-link"
                        href="modules/forms/basic/floating-labels.html">Floating labels</a><a class="dropdown-link"
                        href="modules/forms/basic/layout.html">Layout</a><a class="dropdown-link"
                        href="modules/forms/advance/advance-select.html">Advance select</a><a class="dropdown-link"
                        href="modules/forms/advance/date-picker.html">Date picker</a><a class="dropdown-link"
                        href="modules/forms/advance/editor.html">Editor</a><a class="dropdown-link"
                        href="modules/forms/advance/file-uploader.html">File uploader</a><a class="dropdown-link"
                        href="modules/forms/advance/range.html">Range</a><a class="dropdown-link"
                        href="modules/forms/advance/rating.html">Rating</a><a class="dropdown-link"
                        href="modules/forms/advance/emoji-button.html">Emoji button</a><a class="dropdown-link"
                        href="modules/forms/validation.html">Validation</a><a class="dropdown-link"
                        href="modules/forms/wizard.html">Wizard</a>
                      <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="grid"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Icons</h6>
                      </div><a class="dropdown-link" href="modules/icons/feather.html">Feather</a><a
                        class="dropdown-link" href="modules/icons/font-awesome.html">Font awesome</a><a
                        class="dropdown-link" href="modules/icons/unicons.html">Unicons</a>
                      <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="bar-chart-2"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">ECharts</h6>
                      </div><a class="dropdown-link" href="modules/echarts/line-charts.html">Line charts</a><a
                        class="dropdown-link" href="modules/echarts/bar-charts.html">Bar charts</a><a
                        class="dropdown-link" href="modules/echarts/candlestick-charts.html">Candlestick charts</a><a
                        class="dropdown-link" href="modules/echarts/geo-map.html">Geo map</a><a class="dropdown-link"
                        href="modules/echarts/scatter-charts.html">Scatter charts</a><a class="dropdown-link"
                        href="modules/echarts/pie-charts.html">Pie charts</a><a class="dropdown-link"
                        href="modules/echarts/gauge-chart.html">Gauge chart</a><a class="dropdown-link"
                        href="modules/echarts/radar-charts.html">Radar charts</a><a class="dropdown-link"
                        href="modules/echarts/heatmap-charts.html">Heatmap charts</a><a class="dropdown-link"
                        href="modules/echarts/how-to-use.html">How to use</a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="dropdown-item-group"><span class="me-2" data-feather="package"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Components</h6>
                      </div><a class="dropdown-link" href="modules/components/accordion.html">Accordion</a><a
                        class="dropdown-link" href="modules/components/avatar.html">Avatar</a><a class="dropdown-link"
                        href="modules/components/alerts.html">Alerts</a><a class="dropdown-link"
                        href="modules/components/badge.html">Badge</a><a class="dropdown-link"
                        href="modules/components/breadcrumb.html">Breadcrumb</a><a class="dropdown-link"
                        href="modules/components/button.html">Buttons</a><a class="dropdown-link"
                        href="modules/components/calendar.html">Calendar</a><a class="dropdown-link"
                        href="modules/components/card.html">Card</a><a class="dropdown-link"
                        href="modules/components/carousel/bootstrap.html">Bootstrap</a><a class="dropdown-link"
                        href="modules/components/carousel/swiper.html">Swiper</a><a class="dropdown-link"
                        href="modules/components/collapse.html">Collapse</a><a class="dropdown-link"
                        href="modules/components/dropdown.html">Dropdown</a><a class="dropdown-link"
                        href="modules/components/dhtmlx-gantt.html">Dhtmlx gantt</a><a class="dropdown-link"
                        href="modules/components/list-group.html">List group</a><a class="dropdown-link"
                        href="modules/components/modal.html">Modals</a><a class="dropdown-link"
                        href="modules/components/navs-and-tabs/navs.html">Navs</a><a class="dropdown-link"
                        href="modules/components/navs-and-tabs/navbar.html">Navbar</a><a class="dropdown-link"
                        href="modules/components/navs-and-tabs/tabs.html">Tabs</a><a class="dropdown-link"
                        href="modules/components/offcanvas.html">Offcanvas</a><a class="dropdown-link"
                        href="modules/components/progress-bar.html">Progress bar</a><a class="dropdown-link"
                        href="modules/components/placeholder.html">Placeholder</a><a class="dropdown-link"
                        href="modules/components/pagination.html">Pagination</a><a class="dropdown-link"
                        href="modules/components/popovers.html">Popovers</a><a class="dropdown-link"
                        href="modules/components/scrollspy.html">Scrollspy</a><a class="dropdown-link"
                        href="modules/components/sortable.html">Sortable</a><a class="dropdown-link"
                        href="modules/components/spinners.html">Spinners</a><a class="dropdown-link"
                        href="modules/components/toast.html">Toast</a><a class="dropdown-link"
                        href="modules/components/tooltips.html">Tooltips</a><a class="dropdown-link"
                        href="modules/components/typed-text.html">Typed text</a><a class="dropdown-link"
                        href="modules/components/chat-widget.html">Chat widget</a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="dropdown-item-group"><span class="me-2" data-feather="columns"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Tables</h6>
                      </div><a class="dropdown-link" href="modules/tables/basic-tables.html">Basic tables</a><a
                        class="dropdown-link" href="modules/tables/advance-tables.html">Advance tables</a><a
                        class="dropdown-link" href="modules/tables/bulk-select.html">Bulk Select</a>
                      <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="tool"
                          style="stroke-width:2;"></span>
                        <h6 class="dropdown-item-title">Utilities</h6>
                      </div><a class="dropdown-link" href="modules/utilities/background.html">Background</a><a
                        class="dropdown-link" href="modules/utilities/borders.html">Borders</a><a class="dropdown-link"
                        href="modules/utilities/colors.html">Colors</a><a class="dropdown-link"
                        href="modules/utilities/display.html">Display</a><a class="dropdown-link"
                        href="modules/utilities/flex.html">Flex</a><a class="dropdown-link"
                        href="modules/utilities/stacks.html">Stacks</a><a class="dropdown-link"
                        href="modules/utilities/float.html">Float</a><a class="dropdown-link"
                        href="modules/utilities/grid.html">Grid</a><a class="dropdown-link"
                        href="modules/utilities/interactions.html">Interactions</a><a class="dropdown-link"
                        href="modules/utilities/opacity.html">Opacity</a><a class="dropdown-link"
                        href="modules/utilities/overflow.html">Overflow</a><a class="dropdown-link"
                        href="modules/utilities/position.html">Position</a><a class="dropdown-link"
                        href="modules/utilities/shadows.html">Shadows</a><a class="dropdown-link"
                        href="modules/utilities/sizing.html">Sizing</a><a class="dropdown-link"
                        href="modules/utilities/spacing.html">Spacing</a><a class="dropdown-link"
                        href="modules/utilities/typography.html">Typography</a><a class="dropdown-link"
                        href="modules/utilities/vertical-align.html">Vertical align</a><a class="dropdown-link"
                        href="modules/utilities/visibility.html">Visibility</a>
                    </div>
                  </div>
                </div>
              </div>
            </ul>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
              data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                class="uil fs-8 me-2 uil-document-layout-right"></span>Documentation</a>
            <ul class="dropdown-menu navbar-dropdown-caret">
              <li><a class="dropdown-item" href="documentation/getting-started.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="life-buoy"></span>Getting
                    started</div>
                </a></li>
              <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="customization" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="settings"></span>Customization</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="documentation/customization/configuration.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Configuration</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/customization/styling.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Styling</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/customization/color.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Color</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/customization/dark-mode.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/customization/plugin.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Plugin</div>
                    </a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="layouts-doc" href="#"
                  data-bs-toggle="dropdown" data-bs-auto-close="outside">
                  <div class="dropdown-item-wrapper"><span
                      class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"
                        data-feather="table"></span>Layouts doc</span></div>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="documentation/layouts/vertical-navbar.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical navbar</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/layouts/horizontal-navbar.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal navbar</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/layouts/combo-navbar.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo navbar</div>
                    </a></li>
                  <li><a class="dropdown-item" href="documentation/layouts/dual-nav.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                    </a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="documentation/gulp.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 fa-brands fa-gulp ms-1 me-1 fa-lg"></span>Gulp
                  </div>
                </a></li>
              <li><a class="dropdown-item" href="documentation/design-file.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="figma"></span>Design file
                  </div>
                </a></li>
              <li><a class="dropdown-item" href="changelog.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="git-merge"></span>Changelog
                  </div>
                </a></li>
              <li><a class="dropdown-item" href="showcase.html">
                  <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="monitor"></span>Showcase</div>
                </a></li>
            </ul>
          </li>
        </ul>
      </div>
      <ul class="navbar-nav navbar-nav-icons flex-row">
        <li class="nav-item">
          <div class="theme-control-toggle fa-ion-wait pe-2 theme-control-toggle-slim"><input
              class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox"
              data-theme-control="phoenixTheme" value="dark" /><label
              class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
              data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span
                class="d-none d-sm-flex flex-center" style="height:16px;width:16px;"><span class="me-1 icon"
                  data-feather="moon"></span></span><span class="fs-9 fw-bold">Dark</span></label><label
              class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
              data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span
                class="d-none d-sm-flex flex-center" style="height:16px;width:16px;"><span class="me-1 icon"
                  data-feather="sun"></span></span><span class="fs-9 fw-bold">Light</span></label></div>
        </li>
        <li class="nav-item"> <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#searchBoxModal"><span
              class="d-inline-block" style="height:12px;width:12px;"><span data-feather="search"
                style="height:12px;width:12px;"></span></span></a></li>
        <li class="nav-item dropdown">
          <a class="nav-link" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown"
            data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="d-inline-block"
              style="height:12px;width:12px;"><span data-feather="bell"
                style="height:12px;width:12px;"></span></span></a>
          <div
            class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border navbar-dropdown-caret"
            id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
            <div class="card position-relative border-0">
              <div class="card-header p-2">
                <div class="d-flex justify-content-between">
                  <h5 class="text-body-emphasis mb-0">Notifications</h5><button class="btn btn-link p-0 fs-9 fw-normal"
                    type="button">Mark all as read</button>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="scrollbar-overlay" style="height: 27rem;">
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative read border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                            src="assets/img/team/40x40/30.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Jessie Samson</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>💬</span>Mentioned you in a comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">10m</span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">10:41 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3">
                          <div class="avatar-name rounded-circle"><span>J</span></div>
                        </div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Jane Foster</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>📅</span>Created an event.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">20m</span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">10:20 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle avatar-placeholder"
                            src="assets/img/team/40x40/avatar.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Jessie Samson</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>👍</span>Liked your comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">1h</span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">9:30 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                            src="assets/img/team/40x40/57.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Kiera Anderson</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>💬</span>Mentioned you in a comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">9:11 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                            src="assets/img/team/40x40/59.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Herman Carter</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>👤</span>Tagged you in a comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">10:58 PM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative read ">
                    <div class="d-flex align-items-center justify-content-between position-relative">
                      <div class="d-flex">
                        <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                            src="assets/img/team/40x40/58.webp" alt="" /></div>
                        <div class="flex-1 me-sm-3">
                          <h4 class="fs-9 text-body-emphasis">Benjamin Button</h4>
                          <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                              class='me-1 fs-10'>👍</span>Liked your comment.<span
                              class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                          <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                              class="fw-bold">10:18 AM </span>August 7,2021</p>
                        </div>
                      </div>
                      <div class="dropdown notification-dropdown"><button
                          class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                          data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"
                          data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                        <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer p-0 border-top border-translucent border-0">
                <div class="my-2 text-center fw-bold fs-10 text-body-tertiary text-opactity-85"><a class="fw-bolder"
                    href="pages/notifications.html">Notification history</a></div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"><svg width="10" height="10"
              viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
              <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
              <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
              <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
              <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
              <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
              <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
              <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
              <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
            </svg></a>
          <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nine-dots shadow border"
            aria-labelledby="navbarDropdownNindeDots">
            <div class="card bg-body-emphasis position-relative border-0">
              <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                <div class="row text-center align-items-center gx-0 gy-0">
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/behance.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Behance</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/google-cloud.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Cloud</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/slack.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Slack</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/gitlab.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Gitlab</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/bitbucket.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">BitBucket</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/google-drive.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Drive</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/trello.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Trello</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/figma.webp" alt="" width="20" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Figma</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/twitter.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Twitter</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/pinterest.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Pinterest</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/ln.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Linkedin</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/google-maps.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Maps</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/google-photos.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Photos</p>
                    </a></div>
                  <div class="col-4"><a
                      class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                      href="#!"><img src="assets/img/nav-icons/spotify.webp" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Spotify</p>
                    </a></div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0 white-space-nowrap" id="navbarDropdownUser" href="#!"
            role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside"
            aria-expanded="false">Olivia <span class="d-inline-block" style="height:10.2px;width:10.2px;"><span
                class="fa-solid fa-chevron-down fs-10"></span></span></a>
          <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border"
            aria-labelledby="navbarDropdownUser">
            <div class="card position-relative border-0">
              <div class="card-body p-0">
                <div class="text-center pt-4 pb-3">
                  <div class="avatar avatar-xl ">
                    <img class="rounded-circle " src="assets/img/team/72x72/57.webp" alt="" />
                  </div>
                  <h6 class="mt-2 text-body-emphasis">Jerry Seinfield</h6>
                </div>
                <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text"
                    placeholder="Update your status" /></div>
              </div>
              <div class="overflow-auto scrollbar" style="height: 10rem;">
                <ul class="nav d-flex flex-column mb-2 pb-1">
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="user"></span><span>Profile</span></a></li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"><span
                        class="me-2 text-body align-bottom" data-feather="pie-chart"></span>Dashboard</a></li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="lock"></span>Posts &amp; Activity</a></li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="settings"></span>Settings &amp; Privacy </a>
                  </li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="help-circle"></span>Help Center</a></li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="globe"></span>Language</a></li>
                </ul>
              </div>
              <div class="card-footer p-0 border-top border-translucent">
                <ul class="nav d-flex flex-column my-3">
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                        class="me-2 text-body align-bottom" data-feather="user-plus"></span>Add another account</a></li>
                </ul>
                <hr />
                <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span
                      class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                <div class="my-2 text-center fw-bold fs-10 text-body-quaternary"><a class="text-body-quaternary me-1"
                    href="#!">Privacy policy</a>&bull;<a class="text-body-quaternary mx-1" href="#!">Terms</a>&bull;<a
                    class="text-body-quaternary ms-1" href="#!">Cookies</a></div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </nav>
    <nav class="navbar navbar-top fixed-top navbar-expand-lg" id="dualNav" style="display:none;">
      <div class="w-100">
        <div class="d-flex flex-between-center dual-nav-first-layer">
          <div class="navbar-logo">
            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
              data-bs-toggle="collapse" data-bs-target="#navbarTopCollapse" aria-controls="navbarTopCollapse"
              aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                  class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="index.html">
              <div class="d-flex align-items-center">
                <div class="d-flex align-items-center"><img src="assets/img/icons/logo.png" alt="phoenix" width="27" />
                  <h5 class="logo-text ms-2 d-none d-sm-block">phoenix</h5>
                </div>
              </div>
            </a>
          </div>
          <div class="search-box navbar-top-search-box d-none d-lg-block" data-list='{"valueNames":["title"]}'
            style="width:25rem;">
            <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input
                class="form-control search-input fuzzy-search rounded-pill form-control-sm" type="search"
                placeholder="Search..." aria-label="Search" />
              <span class="fas fa-search search-box-icon"></span>
            </form>
            <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none"
              data-bs-dismiss="search"><button class="btn btn-link p-0" aria-label="Close"></button></div>
            <div class="dropdown-menu border start-0 py-0 overflow-hidden w-100">
              <div class="scrollbar-overlay" style="max-height: 30rem;">
                <div class="list pb-3">
                  <h6 class="dropdown-header text-body-highlight fs-10 py-2">24 <span
                      class="text-body-quaternary">results</span></h6>
                  <hr class="my-0" />
                  <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                    Recently Searched </h6>
                  <div class="py-2"><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-body-highlight title"><span class="fa-solid fa-clock-rotate-left"
                            data-fa-transform="shrink-2"></span> Store Macbook</div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-body-highlight title"> <span class="fa-solid fa-clock-rotate-left"
                            data-fa-transform="shrink-2"></span> MacBook Air - 13″</div>
                      </div>
                    </a>
                  </div>
                  <hr class="my-0" />
                  <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                    Products</h6>
                  <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center"
                      href="apps/e-commerce/landing/product-details.html">
                      <div class="file-thumbnail me-2"><img class="h-100 w-100 object-fit-cover rounded-3"
                          src="assets/img/products/60x60/3.png" alt="" /></div>
                      <div class="flex-1">
                        <h6 class="mb-0 text-body-highlight title">MacBook Air - 13″</h6>
                        <p class="fs-10 mb-0 d-flex text-body-tertiary"><span
                            class="fw-medium text-body-tertiary text-opactity-85">8GB Memory - 1.6GHz - 128GB
                            Storage</span></p>
                      </div>
                    </a>
                    <a class="dropdown-item py-2 d-flex align-items-center"
                      href="apps/e-commerce/landing/product-details.html">
                      <div class="file-thumbnail me-2"><img class="img-fluid" src="assets/img/products/60x60/3.png"
                          alt="" /></div>
                      <div class="flex-1">
                        <h6 class="mb-0 text-body-highlight title">MacBook Pro - 13″</h6>
                        <p class="fs-10 mb-0 d-flex text-body-tertiary"><span
                            class="fw-medium text-body-tertiary text-opactity-85">30 Sep at 12:30 PM</span></p>
                      </div>
                    </a>
                  </div>
                  <hr class="my-0" />
                  <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">Quick
                    Links</h6>
                  <div class="py-2"><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-body-highlight title"><span class="fa-solid fa-link text-body"
                            data-fa-transform="shrink-2"></span> Support MacBook House</div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-body-highlight title"> <span class="fa-solid fa-link text-body"
                            data-fa-transform="shrink-2"></span> Store MacBook″</div>
                      </div>
                    </a>
                  </div>
                  <hr class="my-0" />
                  <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">Files
                  </h6>
                  <div class="py-2"><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-body-highlight title"><span class="fa-solid fa-file-zipper text-body"
                            data-fa-transform="shrink-2"></span> Library MacBook folder.rar</div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-body-highlight title"> <span class="fa-solid fa-file-lines text-body"
                            data-fa-transform="shrink-2"></span> Feature MacBook extensions.txt</div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-body-highlight title"> <span class="fa-solid fa-image text-body"
                            data-fa-transform="shrink-2"></span> MacBook Pro_13.jpg</div>
                      </div>
                    </a>
                  </div>
                  <hr class="my-0" />
                  <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                    Members</h6>
                  <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center" href="pages/members.html">
                      <div class="avatar avatar-l status-online  me-2 text-body">
                        <img class="rounded-circle " src="assets/img/team/40x40/10.webp" alt="" />
                      </div>
                      <div class="flex-1">
                        <h6 class="mb-0 text-body-highlight title">Carry Anna</h6>
                        <p class="fs-10 mb-0 d-flex text-body-tertiary">anna@technext.it</p>
                      </div>
                    </a>
                    <a class="dropdown-item py-2 d-flex align-items-center" href="pages/members.html">
                      <div class="avatar avatar-l  me-2 text-body">
                        <img class="rounded-circle " src="assets/img/team/40x40/12.webp" alt="" />
                      </div>
                      <div class="flex-1">
                        <h6 class="mb-0 text-body-highlight title">John Smith</h6>
                        <p class="fs-10 mb-0 d-flex text-body-tertiary">smith@technext.it</p>
                      </div>
                    </a>
                  </div>
                  <hr class="my-0" />
                  <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                    Related Searches</h6>
                  <div class="py-2"><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-body-highlight title"><span
                            class="fa-brands fa-firefox-browser text-body" data-fa-transform="shrink-2"></span> Search
                          in the Web MacBook</div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-body-highlight title"> <span class="fa-brands fa-chrome text-body"
                            data-fa-transform="shrink-2"></span> Store MacBook″</div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="text-center">
                  <p class="fallback fw-bold fs-7 d-none">No Result Found.</p>
                </div>
              </div>
            </div>
          </div>
          <ul class="navbar-nav navbar-nav-icons flex-row">
            <li class="nav-item">
              <div class="theme-control-toggle fa-icon-wait px-2"><input
                  class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                  data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" /><label
                  class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                  data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme"
                  style="height:32px;width:32px;"><span class="icon" data-feather="moon"></span></label><label
                  class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                  data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme"
                  style="height:32px;width:32px;"><span class="icon" data-feather="sun"></span></label></div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" style="min-width: 2.25rem" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside"><span class="d-block"
                  style="height:20px;width:20px;"><span data-feather="bell"
                    style="height:20px;width:20px;"></span></span></a>
              <div
                class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border navbar-dropdown-caret"
                id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                <div class="card position-relative border-0">
                  <div class="card-header p-2">
                    <div class="d-flex justify-content-between">
                      <h5 class="text-body-emphasis mb-0">Notifications</h5><button
                        class="btn btn-link p-0 fs-9 fw-normal" type="button">Mark all as read</button>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="scrollbar-overlay" style="height: 27rem;">
                      <div class="px-2 px-sm-3 py-3 notification-card position-relative read border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                                src="assets/img/team/40x40/30.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs-9 text-body-emphasis">Jessie Samson</h4>
                              <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                  class='me-1 fs-10'>💬</span>Mentioned you in a comment.<span
                                  class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">10m</span></p>
                              <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                                  class="fw-bold">10:41 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="dropdown notification-dropdown"><button
                              class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                              data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                              aria-expanded="false" data-bs-reference="parent"><span
                                class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                            <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3">
                              <div class="avatar-name rounded-circle"><span>J</span></div>
                            </div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs-9 text-body-emphasis">Jane Foster</h4>
                              <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                  class='me-1 fs-10'>📅</span>Created an event.<span
                                  class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">20m</span></p>
                              <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                                  class="fw-bold">10:20 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="dropdown notification-dropdown"><button
                              class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                              data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                              aria-expanded="false" data-bs-reference="parent"><span
                                class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                            <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img
                                class="rounded-circle avatar-placeholder" src="assets/img/team/40x40/avatar.webp"
                                alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs-9 text-body-emphasis">Jessie Samson</h4>
                              <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                  class='me-1 fs-10'>👍</span>Liked your comment.<span
                                  class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">1h</span></p>
                              <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                                  class="fw-bold">9:30 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="dropdown notification-dropdown"><button
                              class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                              data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                              aria-expanded="false" data-bs-reference="parent"><span
                                class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                            <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                                src="assets/img/team/40x40/57.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs-9 text-body-emphasis">Kiera Anderson</h4>
                              <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                  class='me-1 fs-10'>💬</span>Mentioned you in a comment.<span
                                  class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                              <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                                  class="fw-bold">9:11 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="dropdown notification-dropdown"><button
                              class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                              data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                              aria-expanded="false" data-bs-reference="parent"><span
                                class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                            <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                                src="assets/img/team/40x40/59.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs-9 text-body-emphasis">Herman Carter</h4>
                              <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                  class='me-1 fs-10'>👤</span>Tagged you in a comment.<span
                                  class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                              <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                                  class="fw-bold">10:58 PM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="dropdown notification-dropdown"><button
                              class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                              data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                              aria-expanded="false" data-bs-reference="parent"><span
                                class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                            <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 notification-card position-relative read ">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                                src="assets/img/team/40x40/58.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs-9 text-body-emphasis">Benjamin Button</h4>
                              <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                  class='me-1 fs-10'>👍</span>Liked your comment.<span
                                  class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span></p>
                              <p class="text-body-secondary fs-9 mb-0"><span class="me-1 fas fa-clock"></span><span
                                  class="fw-bold">10:18 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="dropdown notification-dropdown"><button
                              class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button"
                              data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                              aria-expanded="false" data-bs-reference="parent"><span
                                class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                            <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer p-0 border-top border-translucent border-0">
                    <div class="my-2 text-center fw-bold fs-10 text-body-tertiary text-opactity-85"><a class="fw-bolder"
                        href="pages/notifications.html">Notification history</a></div>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"><svg width="16" height="16"
                  viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                  <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                  <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                  <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                  <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                  <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                  <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                  <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                  <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
                </svg></a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nine-dots shadow border"
                aria-labelledby="navbarDropdownNindeDots">
                <div class="card bg-body-emphasis position-relative border-0">
                  <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                    <div class="row text-center align-items-center gx-0 gy-0">
                      <div class="col-4"><a
                          class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                          href="#!"><img src="assets/img/nav-icons/behance.webp" alt="" width="30" />
                          <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Behance</p>
                        </a></div>
                      <div class="col-4"><a
                          class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                          href="#!"><img src="assets/img/nav-icons/google-cloud.webp" alt="" width="30" />
                          <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Cloud</p>
                        </a></div>
                      <div class="col-4"><a
                          class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                          href="#!"><img src="assets/img/nav-icons/slack.webp" alt="" width="30" />
                          <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Slack</p>
                        </a></div>
                      <div class="col-4"><a
                          class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                          href="#!"><img src="assets/img/nav-icons/gitlab.webp" alt="" width="30" />
                          <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Gitlab</p>
                        </a></div>
                      <div class="col-4"><a
                          class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                          href="#!"><img src="assets/img/nav-icons/bitbucket.webp" alt="" width="30" />
                          <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">BitBucket</p>
                        </a></div>
                      <div class="col-4"><a
                          class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                          href="#!"><img src="assets/img/nav-icons/google-drive.webp" alt="" width="30" />
                          <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Drive</p>
                        </a></div>
                      <div class="col-4"><a
                          class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                          href="#!"><img src="assets/img/nav-icons/trello.webp" alt="" width="30" />
                          <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Trello</p>
                        </a></div>
                      <div class="col-4"><a
                          class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                          href="#!"><img src="assets/img/nav-icons/figma.webp" alt="" width="20" />
                          <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Figma</p>
                        </a></div>
                      <div class="col-4"><a
                          class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                          href="#!"><img src="assets/img/nav-icons/twitter.webp" alt="" width="30" />
                          <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Twitter</p>
                        </a></div>
                      <div class="col-4"><a
                          class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                          href="#!"><img src="assets/img/nav-icons/pinterest.webp" alt="" width="30" />
                          <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Pinterest</p>
                        </a></div>
                      <div class="col-4"><a
                          class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                          href="#!"><img src="assets/img/nav-icons/ln.webp" alt="" width="30" />
                          <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Linkedin</p>
                        </a></div>
                      <div class="col-4"><a
                          class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                          href="#!"><img src="assets/img/nav-icons/google-maps.webp" alt="" width="30" />
                          <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Maps</p>
                        </a></div>
                      <div class="col-4"><a
                          class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                          href="#!"><img src="assets/img/nav-icons/google-photos.webp" alt="" width="30" />
                          <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Photos</p>
                        </a></div>
                      <div class="col-4"><a
                          class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                          href="#!"><img src="assets/img/nav-icons/spotify.webp" alt="" width="30" />
                          <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Spotify</p>
                        </a></div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button"
                data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-l ">
                  <img class="rounded-circle " src="assets/img/team/40x40/57.webp" alt="" />
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border"
                aria-labelledby="navbarDropdownUser">
                <div class="card position-relative border-0">
                  <div class="card-body p-0">
                    <div class="text-center pt-4 pb-3">
                      <div class="avatar avatar-xl ">
                        <img class="rounded-circle " src="assets/img/team/72x72/57.webp" alt="" />
                      </div>
                      <h6 class="mt-2 text-body-emphasis">Jerry Seinfield</h6>
                    </div>
                    <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput"
                        type="text" placeholder="Update your status" /></div>
                  </div>
                  <div class="overflow-auto scrollbar" style="height: 10rem;">
                    <ul class="nav d-flex flex-column mb-2 pb-1">
                      <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                            class="me-2 text-body align-bottom" data-feather="user"></span><span>Profile</span></a></li>
                      <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"><span
                            class="me-2 text-body align-bottom" data-feather="pie-chart"></span>Dashboard</a></li>
                      <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                            class="me-2 text-body align-bottom" data-feather="lock"></span>Posts &amp; Activity</a></li>
                      <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                            class="me-2 text-body align-bottom" data-feather="settings"></span>Settings &amp; Privacy
                        </a></li>
                      <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                            class="me-2 text-body align-bottom" data-feather="help-circle"></span>Help Center</a></li>
                      <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                            class="me-2 text-body align-bottom" data-feather="globe"></span>Language</a></li>
                    </ul>
                  </div>
                  <div class="card-footer p-0 border-top border-translucent">
                    <ul class="nav d-flex flex-column my-3">
                      <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                            class="me-2 text-body align-bottom" data-feather="user-plus"></span>Add another account</a>
                      </li>
                    </ul>
                    <hr />
                    <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span
                          class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                    <div class="my-2 text-center fw-bold fs-10 text-body-quaternary"><a
                        class="text-body-quaternary me-1" href="#!">Privacy policy</a>&bull;<a
                        class="text-body-quaternary mx-1" href="#!">Terms</a>&bull;<a class="text-body-quaternary ms-1"
                        href="#!">Cookies</a></div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="collapse navbar-collapse navbar-top-collapse justify-content-center" id="navbarTopCollapse">
          <ul class="navbar-nav navbar-nav-top" data-dropdown-on-hover="data-dropdown-on-hover">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                  class="uil fs-8 me-2 uil-chart-pie"></span>Home</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li><a class="dropdown-item active" href="index.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="shopping-cart"></span>E
                      commerce</div>
                  </a></li>
                <li><a class="dropdown-item" href="dashboard/project-management.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clipboard"></span>Project
                      management</div>
                  </a></li>
                <li><a class="dropdown-item" href="dashboard/crm.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="phone"></span>CRM</div>
                  </a></li>
                <li><a class="dropdown-item" href="dashboard/travel-agency.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="briefcase"></span>Travel
                      agency</div>
                  </a></li>
                <li><a class="dropdown-item" href="dashboard/stock.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="briefcase"></span>Stock
                    </div>
                  </a></li>
                <li><a class="dropdown-item" href="apps/social/feed.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="share-2"></span>Social feed
                    </div>
                  </a></li>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                  class="uil fs-8 me-2 uil-cube"></span>Apps</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="e-commerce" href="#"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="shopping-cart"></span>E commerce</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span
                            class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                              class="me-2 uil"></span>Admin</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="apps/e-commerce/admin/add-product.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add product</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/e-commerce/admin/products.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/e-commerce/admin/customers.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customers</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/e-commerce/admin/customer-details.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customer details</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/e-commerce/admin/orders.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Orders</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/e-commerce/admin/order-details.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order details</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/e-commerce/admin/refund.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Refund</div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span
                            class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                              class="me-2 uil"></span>Customer</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="apps/e-commerce/landing/homepage.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Product details</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/e-commerce/landing/products-filter.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products filter</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/e-commerce/landing/cart.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Cart</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/e-commerce/landing/checkout.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/e-commerce/landing/shipping-info.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Shipping info</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/e-commerce/landing/profile.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/e-commerce/landing/favourite-stores.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Favourite stores</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/e-commerce/landing/wishlist.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Wishlist</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/e-commerce/landing/order-tracking.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order tracking</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/e-commerce/landing/invoice.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Invoice</div>
                          </a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="CRM" href="#"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="phone"></span>CRM</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="apps/crm/analytics.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Analytics</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/crm/deals.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deals</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/crm/deal-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deal details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/crm/leads.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Leads</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/crm/lead-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lead details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/crm/reports.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/crm/report-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Report details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/crm/add-contact.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add contact</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="project-management" href="#"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="clipboard"></span>Project management</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="apps/project-management/create-new.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create new</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/project-management/project-list-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project list view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/project-management/project-card-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project card view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/project-management/project-board-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project board view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/project-management/todo-list.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Todo list</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/project-management/project-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project details</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="travel-agency" href="#"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="briefcase"></span>Travel agency</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="apps/travel-agency/landing.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Landing</div>
                      </a></li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="hotel" href="#"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span
                            class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                              class="me-2 uil"></span>Hotel</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside">
                            <div class="dropdown-item-wrapper"><span
                                class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                  class="me-2 uil"></span>Admin</span></div>
                          </a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/add-property.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add property</div>
                              </a></li>
                            <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/add-room.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add room</div>
                              </a></li>
                            <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/room-listing.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Room listing</div>
                              </a></li>
                            <li><a class="dropdown-item" href="apps/travel-agency/hotel/admin/room-search.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Search room</div>
                              </a></li>
                          </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside">
                            <div class="dropdown-item-wrapper"><span
                                class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                  class="me-2 uil"></span>Customer</span></div>
                          </a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/homepage.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                              </a></li>
                            <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/hotel-details.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Hotel details</div>
                              </a></li>
                            <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/hotel-compare.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Hotel compare</div>
                              </a></li>
                            <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/checkout.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                              </a></li>
                            <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/payment.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Payment</div>
                              </a></li>
                            <li><a class="dropdown-item" href="apps/travel-agency/hotel/customer/gallery.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery</div>
                              </a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="flight" href="#"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span
                            class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                              class="me-2 uil"></span>Flight</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="apps/travel-agency/flight/homepage.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/travel-agency/flight/booking.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Booking</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/travel-agency/flight/payment.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Payment</div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="trip" href="#"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span
                            class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                              class="me-2 uil"></span>Trip</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="apps/travel-agency/trip/homepage.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/travel-agency/trip/trip-details.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Trip details</div>
                          </a></li>
                        <li><a class="dropdown-item" href="apps/travel-agency/trip/checkout.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                          </a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="stock" href="#"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="dollar-sign"></span>Stock</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="apps/stock/stock-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Stock details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/stock/portfolio.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Portfolio</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/stock/watchlist.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Watchlist</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="apps/chat.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="message-square"></span>Chat
                    </div>
                  </a></li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="email" href="#"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="mail"></span>Email</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="apps/email/inbox.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Inbox</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/email/email-detail.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Email detail</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/email/compose.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Compose</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="events" href="#"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="bookmark"></span>Events</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="apps/events/create-an-event.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create an event</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/events/event-detail.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Event detail</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="kanban" href="#"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="trello"></span>Kanban</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="apps/kanban/kanban.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Kanban</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/kanban/boards.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Boards</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/kanban/create-kanban-board.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create board</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="apps/gantt-chart.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 fa-solid fa-chart-gantt "></span>Gantt chart
                    </div>
                  </a></li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="social" href="#"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="share-2"></span>Social</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="apps/social/profile.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/social/settings.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Settings</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="gallery" href="#"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="image"></span>Gallery</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="apps/gallery/album.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Album</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/gallery/gallery-column.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery column</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/gallery/gallery-grid.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery grid</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/gallery/grid-with-title.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Grid with title</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/gallery/gallery-masonry.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery masonry</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/gallery/gallery-slider.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Gallery slider</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="file-manager" href="#"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="folder"></span>File manager</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="apps/file-manager/grid-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Grid view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="apps/file-manager/list-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>List view</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="apps/calendar.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="calendar"></span>Calendar
                    </div>
                  </a></li>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                  class="uil fs-8 me-2 uil-files-landscapes-alt"></span>Pages</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li><a class="dropdown-item" href="pages/starter.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="compass"></span>Starter
                    </div>
                  </a></li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="faq" href="#"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="help-circle"></span>Faq</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="pages/faq/faq-accordion.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq accordion</div>
                      </a></li>
                    <li><a class="dropdown-item" href="pages/faq/faq-tab.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq tab</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="landing" href="#"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="globe"></span>Landing</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="pages/landing/default.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Default</div>
                      </a></li>
                    <li><a class="dropdown-item" href="pages/landing/alternate.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Alternate</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="pricing" href="#"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="tag"></span>Pricing</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="pages/pricing/pricing-column.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing column</div>
                      </a></li>
                    <li><a class="dropdown-item" href="pages/pricing/pricing-grid.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing grid</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="pages/notifications.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="bell"></span>Notifications
                    </div>
                  </a></li>
                <li><a class="dropdown-item" href="pages/members.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="users"></span>Members</div>
                  </a></li>
                <li><a class="dropdown-item" href="pages/timeline.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clock"></span>Timeline</div>
                  </a></li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="errors" href="#"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="alert-triangle"></span>Errors</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="pages/errors/404.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>404</div>
                      </a></li>
                    <li><a class="dropdown-item" href="pages/errors/403.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>403</div>
                      </a></li>
                    <li><a class="dropdown-item" href="pages/errors/500.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>500</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="authentication" href="#"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="lock"></span>Authentication</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="simple" href="#"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span
                            class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                              class="me-2 uil"></span>Simple</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="pages/authentication/simple/sign-in.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                          </a></li>
                        <li><a class="dropdown-item" href="pages/authentication/simple/sign-up.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                          </a></li>
                        <li><a class="dropdown-item" href="pages/authentication/simple/sign-out.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                          </a></li>
                        <li><a class="dropdown-item" href="pages/authentication/simple/forgot-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="pages/authentication/simple/reset-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="pages/authentication/simple/lock-screen.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                          </a></li>
                        <li><a class="dropdown-item" href="pages/authentication/simple/2FA.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="split" href="#"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span
                            class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                              class="me-2 uil"></span>Split</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="pages/authentication/split/sign-in.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                          </a></li>
                        <li><a class="dropdown-item" href="pages/authentication/split/sign-up.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                          </a></li>
                        <li><a class="dropdown-item" href="pages/authentication/split/sign-out.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                          </a></li>
                        <li><a class="dropdown-item" href="pages/authentication/split/forgot-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="pages/authentication/split/reset-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="pages/authentication/split/lock-screen.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                          </a></li>
                        <li><a class="dropdown-item" href="pages/authentication/split/2FA.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="Card" href="#"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span
                            class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                              class="me-2 uil"></span>Card</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="pages/authentication/card/sign-in.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                          </a></li>
                        <li><a class="dropdown-item" href="pages/authentication/card/sign-up.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                          </a></li>
                        <li><a class="dropdown-item" href="pages/authentication/card/sign-out.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                          </a></li>
                        <li><a class="dropdown-item" href="pages/authentication/card/forgot-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="pages/authentication/card/reset-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="pages/authentication/card/lock-screen.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                          </a></li>
                        <li><a class="dropdown-item" href="pages/authentication/card/2FA.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                          </a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="layouts" href="#"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="layout"></span>Layouts</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="demo/vertical-sidenav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical sidenav</div>
                      </a></li>
                    <li><a class="dropdown-item" href="demo/dark-mode.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                      </a></li>
                    <li><a class="dropdown-item" href="demo/sidenav-collapse.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sidenav collapse</div>
                      </a></li>
                    <li><a class="dropdown-item" href="demo/darknav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Darknav</div>
                      </a></li>
                    <li><a class="dropdown-item" href="demo/topnav-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Topnav slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="demo/navbar-horizontal.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar horizontal</div>
                      </a></li>
                    <li><a class="dropdown-item" href="demo/horizontal-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="demo/combo-nav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav</div>
                      </a></li>
                    <li><a class="dropdown-item" href="demo/combo-nav-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="demo/dual-nav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                      </a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                  class="uil fs-8 me-2 uil-puzzle-piece"></span>Modules</a>
              <ul class="dropdown-menu navbar-dropdown-caret dropdown-menu-card py-0">
                <div class="border-0 scrollbar" style="max-height: 60vh;">
                  <div class="px-3 pt-4 pb-3 img-dropdown">
                    <div class="row gx-4 gy-5">
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="dropdown-item-group"><span class="me-2" data-feather="file-text"
                            style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Forms</h6>
                        </div><a class="dropdown-link" href="modules/forms/basic/form-control.html">Form control</a><a
                          class="dropdown-link" href="modules/forms/basic/input-group.html">Input group</a><a
                          class="dropdown-link" href="modules/forms/basic/select.html">Select</a><a
                          class="dropdown-link" href="modules/forms/basic/checks.html">Checks</a><a
                          class="dropdown-link" href="modules/forms/basic/range.html">Range</a><a class="dropdown-link"
                          href="modules/forms/basic/floating-labels.html">Floating labels</a><a class="dropdown-link"
                          href="modules/forms/basic/layout.html">Layout</a><a class="dropdown-link"
                          href="modules/forms/advance/advance-select.html">Advance select</a><a class="dropdown-link"
                          href="modules/forms/advance/date-picker.html">Date picker</a><a class="dropdown-link"
                          href="modules/forms/advance/editor.html">Editor</a><a class="dropdown-link"
                          href="modules/forms/advance/file-uploader.html">File uploader</a><a class="dropdown-link"
                          href="modules/forms/advance/range.html">Range</a><a class="dropdown-link"
                          href="modules/forms/advance/rating.html">Rating</a><a class="dropdown-link"
                          href="modules/forms/advance/emoji-button.html">Emoji button</a><a class="dropdown-link"
                          href="modules/forms/validation.html">Validation</a><a class="dropdown-link"
                          href="modules/forms/wizard.html">Wizard</a>
                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="grid"
                            style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Icons</h6>
                        </div><a class="dropdown-link" href="modules/icons/feather.html">Feather</a><a
                          class="dropdown-link" href="modules/icons/font-awesome.html">Font awesome</a><a
                          class="dropdown-link" href="modules/icons/unicons.html">Unicons</a>
                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="bar-chart-2"
                            style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">ECharts</h6>
                        </div><a class="dropdown-link" href="modules/echarts/line-charts.html">Line charts</a><a
                          class="dropdown-link" href="modules/echarts/bar-charts.html">Bar charts</a><a
                          class="dropdown-link" href="modules/echarts/candlestick-charts.html">Candlestick charts</a><a
                          class="dropdown-link" href="modules/echarts/geo-map.html">Geo map</a><a class="dropdown-link"
                          href="modules/echarts/scatter-charts.html">Scatter charts</a><a class="dropdown-link"
                          href="modules/echarts/pie-charts.html">Pie charts</a><a class="dropdown-link"
                          href="modules/echarts/gauge-chart.html">Gauge chart</a><a class="dropdown-link"
                          href="modules/echarts/radar-charts.html">Radar charts</a><a class="dropdown-link"
                          href="modules/echarts/heatmap-charts.html">Heatmap charts</a><a class="dropdown-link"
                          href="modules/echarts/how-to-use.html">How to use</a>
                      </div>
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="dropdown-item-group"><span class="me-2" data-feather="package"
                            style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Components</h6>
                        </div><a class="dropdown-link" href="modules/components/accordion.html">Accordion</a><a
                          class="dropdown-link" href="modules/components/avatar.html">Avatar</a><a class="dropdown-link"
                          href="modules/components/alerts.html">Alerts</a><a class="dropdown-link"
                          href="modules/components/badge.html">Badge</a><a class="dropdown-link"
                          href="modules/components/breadcrumb.html">Breadcrumb</a><a class="dropdown-link"
                          href="modules/components/button.html">Buttons</a><a class="dropdown-link"
                          href="modules/components/calendar.html">Calendar</a><a class="dropdown-link"
                          href="modules/components/card.html">Card</a><a class="dropdown-link"
                          href="modules/components/carousel/bootstrap.html">Bootstrap</a><a class="dropdown-link"
                          href="modules/components/carousel/swiper.html">Swiper</a><a class="dropdown-link"
                          href="modules/components/collapse.html">Collapse</a><a class="dropdown-link"
                          href="modules/components/dropdown.html">Dropdown</a><a class="dropdown-link"
                          href="modules/components/dhtmlx-gantt.html">Dhtmlx gantt</a><a class="dropdown-link"
                          href="modules/components/list-group.html">List group</a><a class="dropdown-link"
                          href="modules/components/modal.html">Modals</a><a class="dropdown-link"
                          href="modules/components/navs-and-tabs/navs.html">Navs</a><a class="dropdown-link"
                          href="modules/components/navs-and-tabs/navbar.html">Navbar</a><a class="dropdown-link"
                          href="modules/components/navs-and-tabs/tabs.html">Tabs</a><a class="dropdown-link"
                          href="modules/components/offcanvas.html">Offcanvas</a><a class="dropdown-link"
                          href="modules/components/progress-bar.html">Progress bar</a><a class="dropdown-link"
                          href="modules/components/placeholder.html">Placeholder</a><a class="dropdown-link"
                          href="modules/components/pagination.html">Pagination</a><a class="dropdown-link"
                          href="modules/components/popovers.html">Popovers</a><a class="dropdown-link"
                          href="modules/components/scrollspy.html">Scrollspy</a><a class="dropdown-link"
                          href="modules/components/sortable.html">Sortable</a><a class="dropdown-link"
                          href="modules/components/spinners.html">Spinners</a><a class="dropdown-link"
                          href="modules/components/toast.html">Toast</a><a class="dropdown-link"
                          href="modules/components/tooltips.html">Tooltips</a><a class="dropdown-link"
                          href="modules/components/typed-text.html">Typed text</a><a class="dropdown-link"
                          href="modules/components/chat-widget.html">Chat widget</a>
                      </div>
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="dropdown-item-group"><span class="me-2" data-feather="columns"
                            style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Tables</h6>
                        </div><a class="dropdown-link" href="modules/tables/basic-tables.html">Basic tables</a><a
                          class="dropdown-link" href="modules/tables/advance-tables.html">Advance tables</a><a
                          class="dropdown-link" href="modules/tables/bulk-select.html">Bulk Select</a>
                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="tool"
                            style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Utilities</h6>
                        </div><a class="dropdown-link" href="modules/utilities/background.html">Background</a><a
                          class="dropdown-link" href="modules/utilities/borders.html">Borders</a><a
                          class="dropdown-link" href="modules/utilities/colors.html">Colors</a><a class="dropdown-link"
                          href="modules/utilities/display.html">Display</a><a class="dropdown-link"
                          href="modules/utilities/flex.html">Flex</a><a class="dropdown-link"
                          href="modules/utilities/stacks.html">Stacks</a><a class="dropdown-link"
                          href="modules/utilities/float.html">Float</a><a class="dropdown-link"
                          href="modules/utilities/grid.html">Grid</a><a class="dropdown-link"
                          href="modules/utilities/interactions.html">Interactions</a><a class="dropdown-link"
                          href="modules/utilities/opacity.html">Opacity</a><a class="dropdown-link"
                          href="modules/utilities/overflow.html">Overflow</a><a class="dropdown-link"
                          href="modules/utilities/position.html">Position</a><a class="dropdown-link"
                          href="modules/utilities/shadows.html">Shadows</a><a class="dropdown-link"
                          href="modules/utilities/sizing.html">Sizing</a><a class="dropdown-link"
                          href="modules/utilities/spacing.html">Spacing</a><a class="dropdown-link"
                          href="modules/utilities/typography.html">Typography</a><a class="dropdown-link"
                          href="modules/utilities/vertical-align.html">Vertical align</a><a class="dropdown-link"
                          href="modules/utilities/visibility.html">Visibility</a>
                      </div>
                    </div>
                  </div>
                </div>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                  class="uil fs-8 me-2 uil-document-layout-right"></span>Documentation</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li><a class="dropdown-item" href="documentation/getting-started.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="life-buoy"></span>Getting
                      started</div>
                  </a></li>
                <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="customization"
                    href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="settings"></span>Customization</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="documentation/customization/configuration.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Configuration</div>
                      </a></li>
                    <li><a class="dropdown-item" href="documentation/customization/styling.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Styling</div>
                      </a></li>
                    <li><a class="dropdown-item" href="documentation/customization/color.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Color</div>
                      </a></li>
                    <li><a class="dropdown-item" href="documentation/customization/dark-mode.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                      </a></li>
                    <li><a class="dropdown-item" href="documentation/customization/plugin.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Plugin</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="layouts-doc" href="#"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span
                        class="uil fs-8 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                          class="me-2 uil" data-feather="table"></span>Layouts doc</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="documentation/layouts/vertical-navbar.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical navbar</div>
                      </a></li>
                    <li><a class="dropdown-item" href="documentation/layouts/horizontal-navbar.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal navbar</div>
                      </a></li>
                    <li><a class="dropdown-item" href="documentation/layouts/combo-navbar.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo navbar</div>
                      </a></li>
                    <li><a class="dropdown-item" href="documentation/layouts/dual-nav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="documentation/gulp.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 fa-brands fa-gulp ms-1 me-1 fa-lg"></span>Gulp
                    </div>
                  </a></li>
                <li><a class="dropdown-item" href="documentation/design-file.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="figma"></span>Design file
                    </div>
                  </a></li>
                <li><a class="dropdown-item" href="changelog.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="git-merge"></span>Changelog
                    </div>
                  </a></li>
                <li><a class="dropdown-item" href="showcase.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="monitor"></span>Showcase
                    </div>
                  </a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <script>
      var navbarTopShape = window.config.config.phoenixNavbarTopShape;
      var navbarPosition = window.config.config.phoenixNavbarPosition;
      var body = document.querySelector('body');
      var navbarDefault = document.querySelector('#navbarDefault');
      var navbarTop = document.querySelector('#navbarTop');
      var topNavSlim = document.querySelector('#topNavSlim');
      var navbarTopSlim = document.querySelector('#navbarTopSlim');
      var navbarCombo = document.querySelector('#navbarCombo');
      var navbarComboSlim = document.querySelector('#navbarComboSlim');
      var dualNav = document.querySelector('#dualNav');

      var documentElement = document.documentElement;
      var navbarVertical = document.querySelector('.navbar-vertical');

      if (navbarPosition === 'dual-nav') {
        topNavSlim?.remove();
        navbarTop?.remove();
        navbarTopSlim?.remove();
        navbarCombo?.remove();
        navbarComboSlim?.remove();
        navbarDefault?.remove();
        navbarVertical?.remove();
        dualNav.removeAttribute('style');
        document.documentElement.setAttribute('data-navigation-type', 'dual');

      } else if (navbarTopShape === 'slim' && navbarPosition === 'vertical') {
        navbarDefault?.remove();
        navbarTop?.remove();
        navbarTopSlim?.remove();
        navbarCombo?.remove();
        navbarComboSlim?.remove();
        topNavSlim.style.display = 'block';
        navbarVertical.style.display = 'inline-block';
        document.documentElement.setAttribute('data-navbar-horizontal-shape', 'slim');

      } else if (navbarTopShape === 'slim' && navbarPosition === 'horizontal') {
        navbarDefault?.remove();
        navbarVertical?.remove();
        navbarTop?.remove();
        topNavSlim?.remove();
        navbarCombo?.remove();
        navbarComboSlim?.remove();
        dualNav?.remove();
        navbarTopSlim.removeAttribute('style');
        document.documentElement.setAttribute('data-navbar-horizontal-shape', 'slim');
      } else if (navbarTopShape === 'slim' && navbarPosition === 'combo') {
        navbarDefault?.remove();
        navbarTop?.remove();
        topNavSlim?.remove();
        navbarCombo?.remove();
        navbarTopSlim?.remove();
        dualNav?.remove();
        navbarComboSlim.removeAttribute('style');
        navbarVertical.removeAttribute('style');
        document.documentElement.setAttribute('data-navbar-horizontal-shape', 'slim');
      } else if (navbarTopShape === 'default' && navbarPosition === 'horizontal') {
        navbarDefault?.remove();
        topNavSlim?.remove();
        navbarVertical?.remove();
        navbarTopSlim?.remove();
        navbarCombo?.remove();
        navbarComboSlim?.remove();
        dualNav?.remove();
        navbarTop.removeAttribute('style');
        document.documentElement.setAttribute('data-navigation-type', 'horizontal');
      } else if (navbarTopShape === 'default' && navbarPosition === 'combo') {
        topNavSlim?.remove();
        navbarTop?.remove();
        navbarTopSlim?.remove();
        navbarDefault?.remove();
        navbarComboSlim?.remove();
        dualNav?.remove();
        navbarCombo.removeAttribute('style');
        navbarVertical.removeAttribute('style');
        document.documentElement.setAttribute('data-navigation-type', 'combo');
      } else {
        topNavSlim?.remove();
        navbarTop?.remove();
        navbarTopSlim?.remove();
        navbarCombo?.remove();
        navbarComboSlim?.remove();
        dualNav?.remove();
        navbarDefault.removeAttribute('style');
        navbarVertical.removeAttribute('style');
      }

      var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
      var navbarTop = document.querySelector('.navbar-top');
      if (navbarTopStyle === 'darker') {
        navbarTop.setAttribute('data-navbar-appearance', 'darker');
      }

      var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
      var navbarVertical = document.querySelector('.navbar-vertical');
      if (navbarVerticalStyle === 'darker') {
        navbarVertical.setAttribute('data-navbar-appearance', 'darker');
      }
    </script>