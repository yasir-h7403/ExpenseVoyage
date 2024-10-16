<?php
    include('headerpro.php');
?>
<?php
  if(!isset($_SESSION['adminId'])){
    echo"<script>
    location.assign('../../../index.php');
    </script>";
  } 
 ?>

<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="app-ecommerce">
                <!-- Add Product -->
                <div
                  class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
                  <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1">Update a User</h4>
                  </div>
                </div>

                <div class="row">
                  <!-- First column-->
                  <div class="col-12 col-lg-12">
                    <!-- Product Information -->
                    <div class="card mb-6">
                      <div class="card-header">
                        <h5 class="card-tile mb-0">User information</h5>
                      </div>
                      <div class="card-body">
                        <form action="" method="post">
                        <div class="mb-6">
                          <label class="form-label" for="user_first_name">User First Name</label>
                          <input
                            type="text"
                            class="form-control"
                            id="user_first_name"
                            placeholder="User First Name"
                            name="user_first_name"
                            aria-label="User First Name" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="user_last_name">User Last Name</label>
                          <input
                            type="text"
                            class="form-control"
                            id="user_last_name"
                            placeholder="User Last Name"
                            name="user_last_name"
                            aria-label="User Last Name" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="user_email">User Email</label>
                          <input
                            type="text"
                            class="form-control"
                            id="user_email"
                            placeholder="User Email"
                            name="user_email"
                            aria-label="User Email" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="user_password">User Password</label>
                          <input
                            type="password"
                            class="form-control"
                            id="user_password"
                            placeholder="User Password"
                            name="user_password"
                            aria-label="User Password" />
                        </div>
                        <button class="btn btn-primary" type="submit" name="adminuser">Add User</button>
                        </form>  
                      </div>
                    </div>
                    <!-- /Product Information -->
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

<?php
    include('footer.php');
?>