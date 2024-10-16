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
                    <h4 class="mb-1">Add a new Trip</h4>
                  </div>
                </div>

                <div class="row">
                  <!-- First column-->
                  <div class="col-12 col-lg-12">
                    <!-- Product Information -->
                    <div class="card mb-6">
                      <div class="card-header">
                        <h5 class="card-tile mb-0">Trip information</h5>
                      </div>
                      <div class="card-body">
                        <form action="" method="post">
                        <div class="mb-6">
                          <label class="form-label" for="trip_name">Trip Name</label>
                          <input
                            type="text"
                            class="form-control"
                            id="trip_name"
                            placeholder="Trip Name"
                            name="trip_name"
                            aria-label="Trip Name" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="trip_start_date">Trip Start Date</label>
                          <input
                            type="date"
                            class="form-control"
                            id="trip_start_date"
                            placeholder="Trip Start Date"
                            name="trip_start_date"
                            aria-label="Trip Start Date" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="trip_end_date">Trip End Date</label>
                          <input
                            type="date"
                            class="form-control"
                            id="trip_end_date"
                            placeholder="Trip End Date"
                            name="trip_end_date"
                            aria-label="Trip End Date" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="trip_destination">Trip Destination</label>
                          <input
                            type="text"
                            class="form-control"
                            id="trip_destination"
                            placeholder="Trip Destination"
                            name="trip_destination"
                            aria-label="Trip Destination" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="trip_budget">Trip Budget</label>
                          <input
                            type="number"
                            class="form-control"
                            id="trip_budget"
                            placeholder="Trip Budget"
                            name="trip_budget"
                            aria-label="Trip Budget" />
                        </div>
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['adminId'] ?>">
                        <button class="btn btn-primary" type="submit" name="adminTrip">Add Trip</button>
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