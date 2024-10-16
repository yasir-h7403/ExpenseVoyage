<?php
include('headerpro.php');

if (!isset($_SESSION['expenseId'])) {
  echo "<script>alert('Please login to update expenses.'); location.assign('login.php');</script>";
  exit;
}

$itineraryId = '';
$itinerary = [];

if (isset($_GET['itineraryId'])) {
  $itineraryId = $_GET['itineraryId'];
  $query = $pdo->prepare("SELECT * FROM itineraries WHERE Id = :id");
  $query->bindParam(':id', $itineraryId, PDO::PARAM_INT);
  $query->execute();
  $itinerary = $query->fetch(PDO::FETCH_ASSOC);

  if (!$itinerary) {
    echo "<script>alert('Itinerary not found or you do not have permission to edit this itinerary.'); location.assign('view_itineraries.php');</script>";
    exit;
  }
} else {
  echo "<script>alert('No itinerary selected to update.'); location.assign('view_itineraries.php');</script>";
  exit;
}

if (isset($_POST['updateitinerary'])) {
  $itinerary_activity = isset($_POST['itinerary_activity']) ? trim($_POST['itinerary_activity']) : '';
  $itinerary_activity_date = isset($_POST['itinerary_activity_date']) ? trim($_POST['itinerary_activity_date']) : '';
  $itinerary_description = isset($_POST['itinerary_description']) ? trim($_POST['itinerary_description']) : '';
  $currencyId = isset($_POST['Currency_id']) ? trim($_POST['Currency_id']) : '';
  $categoryId = isset($_POST['Cat_id']) ? trim($_POST['Cat_id']) : '';
  $tripId = isset($_POST['Trip_id']) ? trim($_POST['Trip_id']) : '';
  $itineraryId = $_GET['itineraryId'];

  if (empty($itinerary_activity) || empty($itinerary_activity_date) || empty($tripId)) {
    echo "<script>alert('Please fill in all required fields.');</script>";
  } else {
    try {
      $updateQuery = $pdo->prepare("
                  UPDATE itineraries 
                  SET 
                      Activity = :itinerary_activity, 
                      Activity_date = :itinerary_activity_date, 
                      Description = :itinerary_description, 
                      Trip_id = :Trip_id 
                  WHERE 
                      Id = :id
              ");

      $updateQuery->bindParam(':itinerary_activity', $itinerary_activity, PDO::PARAM_STR);
      $updateQuery->bindParam(':itinerary_activity_date', $itinerary_activity_date, PDO::PARAM_STR);
      $updateQuery->bindParam(':itinerary_description', $itinerary_description, PDO::PARAM_STR);
      $updateQuery->bindParam(':Trip_id', $tripId, PDO::PARAM_INT);
      $updateQuery->bindParam(':id', $itineraryId, PDO::PARAM_INT);

      if ($updateQuery->execute()) {
        echo "<script>
                          alert('Itinerary updated successfully!');
                          location.assign('view_itineraries.php');
                        </script>";
        exit;
      } else {
        echo "<script>alert('Failed to update the itinierary. Please try again.');</script>";
      }
    } catch (PDOException $e) {
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
          <h4 class="mb-1">Update a Itinerary</h4>
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
                    name="itinerary_activity" aria-label="Itinerary Activity"
                    value="<?php echo $itinerary['activity'] ?>" />
                </div>
                <div class="mb-6">
                  <label class="form-label" for="itinerary_activity_date">Itinerary Activity Date</label>
                  <input type="text" class="form-control" id="itinerary_activity_date"
                    placeholder="Itinerary Activity Date" name="itinerary_activity_date"
                    aria-label="Itinerary Activity Date" value="<?php echo $itinerary['Activity_date'] ?>" />
                </div>
                <div class="mb-6">
                  <label class="form-label" for="itinerary_description">Itinerary Description</label>
                  <input type="text" class="form-control" id="itinerary_description" placeholder="Itinerary Description"
                    name="itinerary_description" aria-label="Itinerary Description"
                    value="<?php echo $itinerary['Description'] ?>" />
                </div>
                <div class="mb-6">
                  <label class="form-label" for="expense_trip">Trip</label>
                  <select id="form-repeater-1-1" class="select2 form-select" name="Trip_id"
                    data-placeholder="Expense Trip">
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
                <button class="btn btn-primary" type="submit" name="updateitinerary">Update Itinerary</button>
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