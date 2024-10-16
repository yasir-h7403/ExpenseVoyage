<?php
    include('headerpro.php');

    if(!isset($_SESSION['expenseId'])) {
      echo "<script>alert('Please login to update expenses.'); location.assign('login.php');</script>";
      exit;
  }

  $reportId = '';
  $report = [];

  if(isset($_GET['reportId'])){
      $reportId = $_GET['reportId'];

      $query = $pdo->prepare("SELECT * FROM reports WHERE Id = :id");
      $query->bindParam(':id', $reportId, PDO::PARAM_INT);
      $query->execute();
      $report = $query->fetch(PDO::FETCH_ASSOC);
      
      if (!$report) {
          echo "<script>alert('Report not found or you do not have permission to edit this report.'); location.assign('view_report.php');</script>";
          exit;
      }
  } else {
      echo "<script>alert('No report selected to update.'); location.assign('view_report.php');</script>";
      exit;
  }

  if(isset($_POST['updateReport'])){
      $report_description = isset($_POST['report_description']) ? trim($_POST['report_description']) : '';
      $tripId = isset($_POST['Trip_id']) ? trim($_POST['Trip_id']) : '';
      $report_id = $_POST['report_id'];

      if(empty($report_description)) {
          echo "<script>alert('Please fill in all required fields.');</script>";
      } else {
          try {
              $updateQuery = $pdo->prepare("
                  UPDATE reports 
                  SET 
                      ReportData = :report_description, 
                      Tripid = :Trip_id 
                  WHERE
                      Id = :id
              ");

              $updateQuery->bindParam(':report_description', $report_description, PDO::PARAM_STR);
              $updateQuery->bindParam(':Trip_id', $tripId, PDO::PARAM_INT);
              $updateQuery->bindParam(':id', $report_id, PDO::PARAM_INT);

              if($updateQuery->execute()){
                  echo "<script>
                          alert('Report updated successfully!');
                          location.assign('view_report.php');
                        </script>";
                  exit;
              } else {
                  echo "<script>alert('Failed to update the report. Please try again.');</script>";
              }
          } catch(PDOException $e) {
              echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
          }
      }
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
                    <h4 class="mb-1">Update a Trip Report</h4>
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
                            aria-label="Report Description"
                            value="<?php echo $report['ReportData'] ?>" />
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
                        <input type="hidden" name="report_id" value="<?php echo $report['Id'] ?>">
                        <button class="btn btn-primary" type="submit" name="updateReport">Update Report</button>
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