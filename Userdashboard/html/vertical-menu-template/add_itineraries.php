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
          <h4 class="mb-1">Add a new Itinerary</h4>
        </div>
      </div>

      <div class="row">
        <!-- First column-->
        <div class="col-12 col-lg-12">
          <!-- Product Information --> 
          <div class="card mb-6">
            <div class="card-header">
              <h5 class="card-tile mb-0">Itinerary information</h5>
            </div>
            <div class="card-body">
              <form action="" method="post" id="itineraries">
                <div class="mb-6">
                  <label class="form-label" for="itinerary_activity">Itinerary Activity</label>
                  <input type="text" class="form-control" id="itinerary_activity" placeholder="Itinerary Activity"
                    name="itinerary_activity" aria-label="Itinerary Activity" required />
                    <small class="text-danger"></small>
                </div>
                <div class="mb-6">
                  <label class="form-label" for="itinerary_activity_date">Itinerary Activity Date</label>
                  <input type="date" class="form-control" id="itinerary_activity_date"
                    placeholder="Itinerary Activity Date" name="itinerary_activity_date"
                    aria-label="Itinerary Activity Date" required />
                </div>
                <div class="mb-6">
                  <label class="form-label" for="itinerary_description">Itinerary Description</label>
                  <input type="text" class="form-control" id="itinerary_description" placeholder="Itinerary Description"
                    name="itinerary_description" aria-label="Itinerary Description" required />
                    <small class="text-danger"></small>
                </div>
                <div class="mb-6">
                  <label class="form-label" for="expense_trip">Trip</label>
                  <select id="form-repeater-1-1" class="select2 form-select" name="Trip_id"
                    data-placeholder="Expense Trip" required>
                    <option value="">Trip</option>
                    <?php
                    $query = $pdo->query("Select * from trips");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($res as $cat) {
                      ?>
                      <option value="<?php echo $cat['Trip_id'] ?>"><?php echo $cat['Tirp_name'] ?></option>

                      <?php
                    }
                    ?>
                  </select>
                </div>
                <button class="btn btn-primary" type="submit" name="additinerary">Add Itinerary</button>
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