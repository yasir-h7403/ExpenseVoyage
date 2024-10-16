<?php
include('headerpro.php');

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
              <img src="<?php echo isset($userProfile['profile_image']) ? 'img/' . htmlspecialchars($userProfile['profile_image']) : '../../assets/img/avatars/1.png' ?>" alt="user image" class="d-block h-auto ms-0 ms-sm-6 rounded user-profile-img" />
            </div>
            <div class="flex-grow-1 mt-3 mt-lg-5">
              <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                <div class="user-profile-info">
                  <h4 class="mb-2 mt-lg-6"><?php echo isset($userProfile['full_name']) ? htmlspecialchars($userProfile['full_name']) : 'N/A'; ?></h4>
                  <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 my-2">
                    <li class="list-inline-item d-flex gap-2 align-items-center">
                      <i class="ti ti-palette ti-lg"></i><span class="fw-medium">UX Designer</span>
                    </li>
                    <li class="list-inline-item d-flex gap-2 align-items-center">
                      <i class="ti ti-map-pin ti-lg"></i><span class="fw-medium">Vatican City</span>
                    </li>
                    <li class="list-inline-item d-flex gap-2 align-items-center">
                      <i class="ti ti-calendar ti-lg"></i><span class="fw-medium"> Joined April 2021</span>
                    </li>
                  </ul>
                </div>
                <a href="javascript:void(0)" class="btn btn-primary mb-1">
                  <i class="ti ti-user-check ti-xs me-2"></i>Connected
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
              <!--/ Header -->     

              <!-- Navbar pills -->
              <div class="row">
                <div class="col-md-12">
                  <div class="nav-align-top">
                    <ul class="nav nav-pills flex-column flex-sm-row mb-6 gap-2 gap-lg-0">
                      <li class="nav-item">
                        <a class="nav-link" href="pages-profile-user.php"
                          ><i class="ti ti-user-check me-1_5 ti-sm"></i> Profile</a
                        >
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"
                          ><i class="ti ti-reload ti-lg"></i> Update</a
                        >
                      </li>
                
                   
                    </ul>
                  </div>
                </div>
              </div>
              <!--/ Navbar pills -->

              <!-- Teams Cards -->
             
                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="card">
                    <div class="card-body">
                    <div class="row">
                    <form action="pages-profile-teams.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-12">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo htmlspecialchars($userProfile['full_name']); ?>" disabled>
                </div>

                <div class="form-group col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($userProfile['email']); ?>" disabled>
                </div>
        <div class="form-group col-12">
            <label>Phone Number*</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" required="required" value="<?php echo isset($userProfile['phone_number']) ? htmlspecialchars($userProfile['phone_number']) : ''; ?>">
        </div>

        <div class="form-group col-12">
            <label for="date_of_birth">Date Of Birth*</label>
            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" required="required" value="<?php echo isset($userProfile['date_of_birth']) ? htmlspecialchars($userProfile['date_of_birth']) : ''; ?>">
        </div>

        <div class="form-group col-12">
            <label for="city">City*</label>
            <input type="text" class="form-control" name="city" id="city" required="required" value="<?php echo isset($userProfile['city']) ? htmlspecialchars($userProfile['city']) : ''; ?>">
        </div>

        <div class="form-group col-12">
            <label for="travel_preference">Travel Preference*</label>
            <input type="text" class="form-control" name="travel_preferences" id="travel_preferences" required="required" value="<?php echo isset($userProfile['travel_preferences']) ? htmlspecialchars($userProfile['travel_preferences']) : ''; ?>">
        </div>
        <div class="form-group col-12">
        <label for="profile_image" class="form-label">Profile Image</label>
        <input type="file" class="form-control" name="profile_image" id="profile_image" accept="image/*">
        <span><?php echo isset($userProfile['profile_image']) ? htmlspecialchars($userProfile['profile_image']) : ''; ?></span>
      
    </div>

    <div class="form-group col-12">
        <label for="banner_image" class="form-label">Banner Image</label>
        <input type="file" class="form-control" name="banner_image" id="banner_image" accept="image/*">
        <span><?php echo isset($userProfile['banner_image']) ? htmlspecialchars($userProfile['banner_image']) : ''; ?></span>
       
    </div>  

        <div class="form-btn mt-20 col-12">
            <button class="th-btn btn-fw th-radius2" type="submit" name="updateProfile">Update Profile</button>
        </div>
</form>
      </div>
              </div>
              </div>
       
              </div>
              <!--/ Teams Cards -->
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
                    , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="footer-link">Pixinvent</a>
                  </div>
                  <div class="d-none d-lg-inline-block">
                    <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank"
                      >License</a
                    >
                    <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4"
                      >More Themes</a
                    >

                    <a
                      href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/"
                      target="_blank"
                      class="footer-link me-4"
                      >Documentation</a
                    >

                    <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block"
                      >Support</a
                    >
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

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
  </body>
</html>
