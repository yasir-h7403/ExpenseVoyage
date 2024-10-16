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
                    <h4 class="mb-1">Add a new Destination</h4>
                  </div>
                </div>

                <div class="row">
                  <!-- First column-->
                  <div class="col-12 col-lg-12">
                    <!-- Product Information -->
                    <div class="card mb-6">
                      <div class="card-header">
                        <h5 class="card-tile mb-0">Destination information</h5>
                      </div>
                      <div class="card-body">
                        <form action="" method="post">
                        <div class="mb-6">
                          <label class="form-label" for="destination_name">Destination Name</label>
                          <input
                            type="text"
                            class="form-control"
                            id="destination_name"
                            placeholder="Destination Name"
                            name="destination_name"
                            aria-label="Destination Name" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="destination_description">Destination Description</label>
                          <input
                            type="text"
                            class="form-control"
                            id="destination_description"
                            placeholder="Destination Description"
                            name="destination_description"
                            aria-label="Destination Description" />
                        </div>
                        <button class="btn btn-primary" type="submit" name="adminDestination">Add Destination</button>
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