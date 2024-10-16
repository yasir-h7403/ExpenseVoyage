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
          <h4 class="mb-1">Add a new Expense</h4>
          <p class="mb-0">It is for any expense that is done on a trip.</p>
        </div>
      </div>

      <div class="row">
        <!-- First column-->
        <div class="col-12 col-lg-12">
          <!-- Product Information -->
          <div class="card mb-6">
            <div class="card-header">
              <h5 class="card-tile mb-0">Expense information</h5>
            </div>
            <div class="card-body">
              <form action="" method="post" id="expenseform">
                <div class="mb-6">
                  <label class="form-label" for="expense_amount">Expense Amount</label>
                  <input type="number" class="form-control" id="expense_amount" placeholder="Expense Amount"
                    name="expense_amount" aria-label="Expense Amount"  required/>
                    <small class="text-danger"></small>
                </div>
                <div class="mb-6">
                  <label class="form-label" for="expense_date">Expense Date</label>
                  <input type="date" class="form-control" id="expense_date" placeholder="Expense Date"
                    name="expense_date" aria-label="Expense Date" required />
                </div>
                <div class="mb-6">
                  <label class="form-label" for="expense_description">Expense Description</label>
                  <input type="text" class="form-control" id="expense_description" placeholder="Expense Description"
                    name="expense_description" aria-label="Expense Description" required />
                    <small class="text-danger"></small>
                </div>
                <div class="mb-6">
                  <label class="form-label" for="expense_currency">Expense Currency</label>
                  <select id="form-repeater-1-1" class="select2 form-select" name="Currency_id"
                    data-placeholder="Expense Currency" required>
                    <option value="">Expense Currency</option>
                    <?php
                    $query = $pdo->query("Select * from currencies");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($res as $cat) {
                      ?>
                      <option value="<?php echo $cat['Id'] ?>"><?php echo $cat['Currency_name'] ?></option>

                      <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="mb-6">
                  <label class="form-label" for="expense_amount">Expense Category</label>
                  <select id="form-repeater-1-1" class="select2 form-select" name="Cat_id"
                    data-placeholder="Expense Category" required>
                    <option value="">Expense Category</option>
                    <?php
                    $query = $pdo->query("Select * from category");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($res as $cat) {
                      ?>
                      <option value="<?php echo $cat['Category_id'] ?>"><?php echo $cat['Category_name'] ?></option>

                      <?php
                    }
                    ?>
                  </select> 
                </div>
                <div class="mb-6">
                  <label class="form-label" for="expense_trip">Expense Trip</label>
                  <select id="form-repeater-1-1" class="select2 form-select" name="Trip_id"
                    data-placeholder="Expense Trip" required>
                    <option value="">Expense Trip</option>
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
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['expenseId'] ?>">
                <button class="btn btn-primary" type="submit" name="addExpense">Add Expense</button>
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