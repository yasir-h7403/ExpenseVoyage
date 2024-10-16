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

<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

              <!-- Product List Table -->
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Filter</h5>
                  <div class="d-flex justify-content-between align-items-center row pt-4 gap-6 gap-md-0">
                    <div class="col-md-4 product_status"></div>
                    <div class="col-md-4 product_category"></div>
                    <div class="col-md-4 product_stock"></div>
                  </div>
                  <a href="add_itineraries.php"><button class="btn btn-primary">Add Itinerary</button></a>
                </div>
                <div class="card-datatable table-responsive">
                  <table class="datatables-products table">
                    <thead class="border-top">
                      <tr>
                        <th>Activity</th>
                        <th>Activity Date</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Trip</th>
                        <th>Edit Itinerary</th>
                        <th>Delete Itinerary</th>
                      </tr>
                    </thead>
                    <?php
                    $query = $pdo->query("Select itineraries.*, trips.Tirp_name as 'Trip Name' from itineraries inner join trips on itineraries.Trip_Id = trips.Trip_id");
                    $allitineraries = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($allitineraries as $itineraries) {
                        ?>
                        <tr>
                            <td><?php echo $itineraries['activity']?></td>
                            <td><?php echo $itineraries['Activity_date']?></td>
                            <td><?php echo $itineraries['Description']?></td>
                            <td><?php echo $itineraries['CreatedAt']?></td>
                            <td><?php echo $itineraries['Trip Name']?></td>
                            <td>
                                    <a href="update_itineraries.php?itineraryId=<?php echo urlencode($itineraries['Id']); ?>">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                </td>
                                <td><a href="?delete_id=<?php echo $itineraries['Id'] ?>" class="btn btn-danger text-light">Delete</a></td> 
                                        <?php
                                        if (isset($_GET['delete_id'])) {
                                            $delete_id = $_GET['delete_id'];
                                            $deleteQuery = $pdo->prepare("DELETE FROM itineraries WHERE Id = :delete_id");
                                            $deleteQuery->bindParam(':delete_id', $delete_id);
                                            $deleteQuery->execute();
                                            echo "<script>alert('Itinerary deleted successfully');
                                            location.assign('view_itineraries.php');
                                            </script>";

                                        }
                                        ?>
                        </tr>
                        <?php
                    }
                        ?>
                  </table>
                </div>
              </div>
            </div>
            <!-- / Content -->

<?php
    include('footer.php');
?>