<?php
    include('headerpro.php');

    if(!isset($_SESSION['adminId'])) {
      echo "<script>alert('Please login to update destination.'); location.assign('login.php');</script>";
      exit;
  }

  $destinationId = '';
  $destination = [];

  if(isset($_GET['destinationId'])){
      $destinationId = $_GET['destinationId'];
      $query = $pdo->prepare("SELECT * FROM destination WHERE id = :id");
      $query->bindParam(':id', $destinationId, PDO::PARAM_INT);
      $query->execute();
      $destination = $query->fetch(PDO::FETCH_ASSOC);
      
      if (!$destination) {
          echo "<script>alert('Destination not found or you do not have permission to edit this destination.'); location.assign('view_destination.php');</script>";
          exit;
      }
  } else {
      echo "<script>alert('No destination selected to update.'); location.assign('view_destination.php');</script>";
      exit;
  }

  if(isset($_POST['updateDestination'])){
      $destination_name = isset($_POST['destination_name']) ? trim($_POST['destination_name']) : '';
      $destination_description = isset($_POST['destination_description']) ? trim($_POST['destination_description']) : '';
      $destination_id = $_POST['destination_id'];

      if(empty($destination_name)) {
          echo "<script>alert('Please fill in all required fields.');</script>";
      } else {
          try {
              $updateQuery = $pdo->prepare("
                  UPDATE destination 
                  SET 
                      name = :destination_name,
                      description = :destination_description
                  WHERE 
                      id = :id
              ");

              $updateQuery->bindParam(':destination_name', $destination_name, PDO::PARAM_STR);
              $updateQuery->bindParam(':destination_description', $destination_description, PDO::PARAM_STR);
              $updateQuery->bindParam(':id', $destination_id, PDO::PARAM_INT);

              if($updateQuery->execute()){
                  echo "<script>
                          alert('Destination updated successfully!');
                          location.assign('view_destination.php');
                        </script>";
                  exit;
              } else {
                  echo "<script>alert('Failed to update the destination. Please try again.');</script>";
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
                    <h4 class="mb-1">Update a Destination</h4>
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
                            aria-label="Destination Name"
                            value="<?php echo $destination['name'] ?>" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="destination_description">Destination Description</label>
                          <input
                            type="text"
                            class="form-control"
                            id="destination_description"
                            placeholder="Destination Description"
                            name="destination_description"
                            aria-label="Destination Description"
                            value="<?php echo $destination['description'] ?>" />
                        </div>
                        <input type="hidden" name="destination_id" value="<?php echo $destination['id'] ?>">
                        <button class="btn btn-primary" type="submit" name="updateDestination">Update Destination</button>
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