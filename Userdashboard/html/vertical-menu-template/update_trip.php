<?php
include('headerpro.php');

if (!isset($_SESSION['expenseId'])) {
  echo "<script>alert('Please login to update expenses.'); location.assign('login.php');</script>";
  exit;
}

$tripId = '';
$trip = [];

if (isset($_GET['tripId'])) {
  $tripId = $_GET['tripId'];

  $query = $pdo->prepare("SELECT * FROM trips WHERE Trip_id = :id AND User_id = :user_id");
  $query->bindParam(':id', $tripId, PDO::PARAM_INT);
  $query->bindParam(':user_id', $_SESSION['expenseId'], PDO::PARAM_INT);
  $query->execute();
  $trip = $query->fetch(PDO::FETCH_ASSOC);

  if (!$trip) {
    echo "<script>alert('Trip not found or you do not have permission to edit this expense.'); location.assign('view_trip.php');</script>";
    exit;
  }
} else {
  echo "<script>alert('No trip selected to update.'); location.assign('view_trip.php');</script>";
  exit;
}

if (isset($_POST['updateTrip'])) {
  $trip_name = isset($_POST['trip_name']) ? trim($_POST['trip_name']) : '';
  $trip_start_date = isset($_POST['trip_start_date']) ? trim($_POST['trip_start_date']) : '';
  $trip_end_date = isset($_POST['trip_end_date']) ? trim($_POST['trip_end_date']) : '';
  $trip_destination = isset($_POST['trip_destination']) ? trim($_POST['trip_destination']) : '';
  $trip_budget = isset($_POST['trip_budget']) ? trim($_POST['trip_budget']) : '';
  $tripId = isset($_POST['trip_id']) ? trim($_POST['trip_id']) : '';
  $userId = $_SESSION['expenseId'];

  if (empty($trip_name) || empty($trip_start_date) || empty($trip_end_date) || empty($trip_destination) || empty($trip_budget)) {
    echo "<script>alert('Please fill in all required fields.');</script>";
  } else {
    try {
      $updateQuery = $pdo->prepare("
                  UPDATE trips 
                  SET 
                      Tirp_name = :trip_name, 
                      Start_date = :trip_start_date, 
                      End_date = :trip_end_date, 
                      Destination = :trip_destination, 
                      Budget = :trip_budget
                  WHERE 
                      Trip_id = :Trip_id AND 
                      User_id = :user_id
              ");

      $updateQuery->bindParam(':trip_name', $trip_name, PDO::PARAM_STR);
      $updateQuery->bindParam(':trip_start_date', $trip_start_date, PDO::PARAM_STR);
      $updateQuery->bindParam(':trip_end_date', $trip_end_date, PDO::PARAM_STR);
      $updateQuery->bindParam(':trip_destination', $trip_destination, PDO::PARAM_STR);
      $updateQuery->bindParam(':trip_budget', $trip_budget, PDO::PARAM_INT);
      $updateQuery->bindParam(':Trip_id', $tripId, PDO::PARAM_INT);
      $updateQuery->bindParam(':user_id', $userId, PDO::PARAM_INT);

      if ($updateQuery->execute()) {
        echo "<script>
                          alert('Trip updated successfully!');
                          location.assign('view_trip.php');
                        </script>";
        exit;
      } else {
        echo "<script>alert('Failed to update the trip. Please try again.');</script>";
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
          <h4 class="mb-1">Update a Trip</h4>
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
              <form action="" method="post" id="tripform">
                <div class="mb-6">
                  <label class="form-label" for="trip_name">Trip Name</label>
                  <input type="text" class="form-control" id="trip_name" placeholder="Trip Name" name="trip_name"
                    aria-label="Trip Name" value="<?php echo $trip['Tirp_name'] ?>" />
                    <small class="text-danger"></small>
                </div>
                <div class="mb-6">
                  <label class="form-label" for="trip_start_date">Trip Start Date</label>
                  <input type="date" class="form-control" id="trip_start_date" placeholder="Trip Start Date"
                    name="trip_start_date" aria-label="Trip Start Date" value="<?php echo $trip['Start_date'] ?>" />
                    <small class="text-danger"></small>
                </div>
                <div class="mb-6">
                  <label class="form-label" for="trip_end_date">Trip End Date</label>
                  <input type="date" class="form-control" id="trip_end_date" placeholder="Trip End Date"
                    name="trip_end_date" aria-label="Trip End Date" value="<?php echo $trip['End_date'] ?>" />
                    <small class="text-danger"></small>
                </div>
                <div class="mb-6">
                  <label class="form-label" for="trip_destination">Trip Destination</label>
                  <input type="text" class="form-control" id="trip_destination" placeholder="Trip Destination"
                    name="trip_destination" aria-label="Trip Destination" value="<?php echo $trip['destination'] ?>" />
                    <small class="text-danger"></small>
                </div>
                <div class="mb-6">
                  <label class="form-label" for="trip_budget">Trip Budget</label>
                  <input type="number" class="form-control" id="trip_budget" placeholder="Trip Budget"
                    name="trip_budget" aria-label="Trip Budget" value="<?php echo $trip['budget'] ?>" />
                    <small class="text-danger"></small>
                </div>
                <input type="hidden" name="trip_id" value="<?php echo $trip['Trip_id'] ?>">
                <button class="btn btn-primary" type="submit" name="updateTrip">Update Trip</button>
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