<?php
include('headerpro.php')
  ?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content --> 

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Header -->
              <div class="row">
                <div class="col-12">
                  <div class="card mb-6">
                    <div class="user-profile-header-banner">
                      <img src="<?php echo isset($userProfile['banner_image']) ? 'img/' . htmlspecialchars($userProfile['banner_image']) : '../../assets/img/pages/profile-banner.png'; ?>" alt="Banner image" class="rounded-top" />
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-5">
                      <div class="flex-shrink-0 pt-10 mt-n2 mx-sm-0 mx-auto">
                        <img
                          src="<?php echo isset($userProfile['profile_image']) ? 'img/' . htmlspecialchars($userProfile['profile_image']) : '../../assets/img/avatars/1.png' ?>"
                          alt="user image"
                          class="d-block h-auto ms-0 ms-sm-6 rounded user-profile-img" />
                      </div>
                      <div class="flex-grow-1 mt-3 mt-lg-5">
                        <div
                          class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                          <div class="user-profile-info">
                            <h4 class="mb-2 mt-lg-6"><?php echo isset($userProfile['full_name']) ? htmlspecialchars($userProfile['full_name']) : 'N/A'; ?></h4>
                            <ul
                              class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 my-2">
                              <li class="list-inline-item d-flex gap-2 align-items-center">
                                <i class="ti ti-map-pin ti-lg"></i>
                                <span class="fw-medium"><?php echo isset($userProfile['city']) ? htmlspecialchars($userProfile['city']) : ''; ?></span>
                              </li>
                            </ul>
                          </div>
                          <a href="javascript:void(0)" class="btn btn-primary mb-1">
                            <i class="ti ti-user-check ti-xs me-2"></i>Online
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Header -->

              <!-- Navbar pills -->
              <div class="row">
                <div class="col-md-12">
                <div class="nav-align-top">
  <ul class="nav nav-pills flex-column flex-sm-row mb-6 gap-2 gap-lg-0">
    <li class="nav-item">
      <a class="nav-link active" href="javascript:void(0);" id="profile-link">
        <i class="ti-sm ti ti-user-check me-1_5"></i> Profile
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages-profile-teams.php" id="update-link">
        <i class="ti ti-reload ti-lg"></i> Update
      </a>
    </li>
  </ul>
</div>

                    
                     
                
                    </ul>
                  </div>
                </div>
              </div>
              <!--/ Navbar pills -->

              <!-- User Profile Content -->
              <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                  <!-- About User -->
                  <div class="card mb-6">
                    <div class="card-body">
                      <small class="card-text text-uppercase text-muted small">About</small>
                      <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-4">
                          <i class="ti ti-user ti-lg"></i><span class="fw-medium mx-2">Full Name:</span>
                          <span><?php echo isset($userProfile['full_name']) ? htmlspecialchars($userProfile['full_name']) : 'N/A'; ?></span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                        <i class="ti ti-mail ti-lg"></i><span class="fw-medium mx-2">Email:</span>
                          <span><?php echo isset($userProfile['email']) ? htmlspecialchars($userProfile['email']) : 'N/A'; ?></span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                          <i class="ti ti-phone-call ti-lg"></i><span class="fw-medium mx-2">Phone:</span>
                          <span><?php echo isset($userProfile['phone_number']) ? htmlspecialchars($userProfile['phone_number']) : 'N/A'; ?></span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                        <i class="ti ti-calendar ti-lg"></i><span class="fw-medium mx-2">Date Of Birth:</span>
                         <span><?php echo isset($userProfile['date_of_birth']) ? htmlspecialchars($userProfile['date_of_birth']) : 'N/A'; ?></span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                        <i class="ti ti-world ti-lg"></i><span class="fw-medium mx-2">Travel Preference:</span>
                         <span><?php echo isset($userProfile['travel_preferences']) ? htmlspecialchars($userProfile['travel_preferences']) : 'N/A'; ?></span>
                        </li>
                   
                      </ul>
              
                    </div>
                  </div>
                  <!--/ About User -->
                  <!-- Profile Overview -->
                  <!-- <div class="card mb-6">
                    <div class="card-body">
                      <small class="card-text text-uppercase text-muted small">Overview</small>
                      <ul class="list-unstyled mb-0 mt-3 pt-1">
                        <li class="d-flex align-items-end mb-4">
                          <i class="ti ti-check ti-lg"></i><span class="fw-medium mx-2">Task Compiled:</span>
                          <span>13.5k</span>
                        </li>
                        <li class="d-flex align-items-end mb-4">
                          <i class="ti ti-layout-grid ti-lg"></i><span class="fw-medium mx-2">Projects Compiled:</span>
                          <span>146</span>
                        </li>
                        <li class="d-flex align-items-end">
                          <i class="ti ti-users ti-lg"></i><span class="fw-medium mx-2">Connections:</span>
                          <span>897</span>
                        </li>
                      </ul>
                    </div>
                  </div> -->
                  <!--/ Profile Overview -->
                </div>
                <div class="col-xl-8 col-lg-7 col-md-7">
                  <!-- Activity Timeline -->
                  <!-- <div class="card card-action mb-6">
                    <div class="card-header align-items-center">
                      <h5 class="card-action-title mb-0">
                        <i class="ti ti-chart-bar ti-lg text-body me-4"></i>Activity Timeline
                      </h5>
                    </div>
                    <div class="card-body pt-3">
                      <ul class="timeline mb-0">
                        <li class="timeline-item timeline-item-transparent">
                          <span class="timeline-point timeline-point-primary"></span>
                          <div class="timeline-event">
                            <div class="timeline-header mb-3">
                              <h6 class="mb-0">12 Invoices have been paid</h6>
                              <small class="text-muted">12 min ago</small>
                            </div>
                            <p class="mb-2">Invoices have been paid to the company</p>
                            <div class="d-flex align-items-center mb-2">
                              <div class="badge bg-lighter rounded d-flex align-items-center">
                                <img src="../../assets//img/icons/misc/pdf.png" alt="img" width="15" class="me-2" />
                                <span class="h6 mb-0 text-body">invoices.pdf</span>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent">
                          <span class="timeline-point timeline-point-success"></span>
                          <div class="timeline-event">
                            <div class="timeline-header mb-3">
                              <h6 class="mb-0">Client Meeting</h6>
                              <small class="text-muted">45 min ago</small>
                            </div>
                            <p class="mb-2">Project meeting with john @10:15am</p>
                            <div class="d-flex justify-content-between flex-wrap gap-2 mb-2">
                              <div class="d-flex flex-wrap align-items-center mb-50">
                                <div class="avatar avatar-sm me-3">
                                  <img src="../../assets/img/avatars/1.png" alt="Avatar" class="rounded-circle" />
                                </div>
                                <div>
                                  <p class="mb-0 small fw-medium">Lester McCarthy (Client)</p>
                                  <small>CEO of Pixinvent</small>
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent">
                          <span class="timeline-point timeline-point-info"></span>
                          <div class="timeline-event">
                            <div class="timeline-header mb-3">
                              <h6 class="mb-0">Create a new project for client</h6>
                              <small class="text-muted">2 Day Ago</small>
                            </div>
                            <p class="mb-2">6 team members in a project</p>
                            <ul class="list-group list-group-flush">
                              <li
                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-top-0 p-0">
                                <div class="d-flex flex-wrap align-items-center">
                                  <ul class="list-unstyled users-list d-flex align-items-center avatar-group m-0 me-2">
                                    <li
                                      data-bs-toggle="tooltip"
                                      data-popup="tooltip-custom"
                                      data-bs-placement="top"
                                      title="Vinnie Mostowy"
                                      class="avatar pull-up">
                                      <img class="rounded-circle" src="../../assets/img/avatars/1.png" alt="Avatar" />
                                    </li>
                                    <li
                                      data-bs-toggle="tooltip"
                                      data-popup="tooltip-custom"
                                      data-bs-placement="top"
                                      title="Allen Rieske"
                                      class="avatar pull-up">
                                      <img class="rounded-circle" src="../../assets/img/avatars/4.png" alt="Avatar" />
                                    </li>
                                    <li
                                      data-bs-toggle="tooltip"
                                      data-popup="tooltip-custom"
                                      data-bs-placement="top"
                                      title="Julee Rossignol"
                                      class="avatar pull-up">
                                      <img class="rounded-circle" src="../../assets/img/avatars/2.png" alt="Avatar" />
                                    </li>
                                    <li class="avatar">
                                      <span
                                        class="avatar-initial rounded-circle pull-up text-heading"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="bottom"
                                        title="3 more"
                                        >+3</span
                                      >
                                    </li>
                                  </ul>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div> -->
                  <!--/ Activity Timeline -->
                
                 
                </div>
              </div>
              <!--/ User Profile Content -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                  <div class="text-body">
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by <a href="index.php" target="_blank" class="footer-link">Expense Voyage</a>
                  </div>
                  
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/pages-profile.js"></script>
  </body>
</html>
