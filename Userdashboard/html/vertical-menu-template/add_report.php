<?php
    include('headerpro.php');
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
                    <h4 class="mb-1">Add a new Trip Report</h4>
                    <p class="mb-0">It is to share report of trip you made.</p>
                  </div>
                </div>

                <div class="row">
                  <!-- First column-->
                  <div class="col-12 col-lg-12">
                    <!-- Product Information -->
                    <div class="card mb-6">
                      <div class="card-header">
                        <h5 class="card-tile mb-0">Report information</h5>
                      </div>
                      <div class="card-body">
                        <form action="" method="post">
                        <div class="mb-6">
                          <label class="form-label" for="report_description">Report Description</label>
                          <input
                            type="text"
                            class="form-control"
                            id="report_description"
                            placeholder="Report Description"
                            name="report_description"
                            aria-label="Report Description" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="expense_trip">Trip</label>
                          <select id="form-repeater-1-1" class="select2 form-select" name="Trip_id" data-placeholder="Expense Trip">
                                    <option value="">Trip</option>
                                    <?php
                                    $query = $pdo->query("Select * from trips");
                                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($res as $cat){
                                        ?>
                                       <option value="<?php echo $cat ['Trip_id'] ?>" ><?php echo $cat ['Tirp_name'] ?></option>
                                   
                                    <?php
                                    }
                                    ?>
                                  </select>
                        </div>
                        <button class="btn btn-primary" type="submit" name="addReport">Add Report</button>
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