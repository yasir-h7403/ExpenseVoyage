<?php
include('headerpro.php');
?>
<?php
if (!isset($_SESSION['adminId'])) {
  echo "<script>
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
          <h4 class="mb-1">Add a new Currency</h4>
        </div>
      </div>

      <div class="row">
        <!-- First column-->
        <div class="col-12 col-lg-12">
          <!-- Product Information -->
          <div class="card mb-6">
            <div class="card-header">
              <h5 class="card-tile mb-0">Currency information</h5>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="mb-6">
                  <label class="form-label" for="currency_name">Currency Name</label>
                  <input type="text" class="form-control" id="currency_name" placeholder="Currency Name"
                    name="currency_name" aria-label="Currency Name" />
                </div>
                <div class="mb-6">
                  <label class="form-label" for="currency_code">Currency Code</label>
                  <input type="text" class="form-control" id="currency_code" placeholder="Currency Code"
                    name="currency_code" aria-label="Currency Code" />
                </div>
                <div class="mb-6">
                  <label class="form-label" for="currency_exchange_rate">Currency Exchange Rate</label>
                  <input type="number" class="form-control" id="currency_exchange_rate"
                    placeholder="Currency Exchange Rate" name="currency_exchange_rate"
                    aria-label="Currency Exchange Rate" />
                </div>
                <button class="btn btn-primary" type="submit" name="adminCurrency">Add Currency</button>
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