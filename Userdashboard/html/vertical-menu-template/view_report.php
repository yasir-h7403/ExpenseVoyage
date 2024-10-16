<?php
    include('headerpro.php');
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
                  <a href="add_report.php"><button class="btn btn-primary">Add Report</button></a>
                </div>
                <div class="card-datatable table-responsive">
                  <table class="datatables-products table">
                    <thead class="border-top">
                      <tr>
                        <th>Description</th>
                        <th>Submitted At</th>
                        <th>Trip</th>
                        <th>Edit Report</th>
                        <th>Delete Report</th>
                      </tr>
                    </thead>
                    <?php
                    $query = $pdo->query("Select reports.*, trips.Tirp_name as 'Trip Name' from reports inner join trips on reports.TripId = trips.Trip_id");
                    $allreports = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($allreports as $reports) {
                        ?>
                        <tr>
                            <td><?php echo $reports['ReportData']?></td>
                            <td><?php echo $reports['GeneratedAt']?></td>
                            <td><?php echo $reports['Trip Name']?></td>
                            <td>
                                    <a href="update_report.php?reportId=<?php echo urlencode($reports['Id']); ?>">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                </td>
                                <td><a href="?delete_id=<?php echo $reports['Id'] ?>" class="btn btn-danger text-light">Delete</a></td> 
                                        <?php
                                        if (isset($_GET['delete_id'])) {
                                            $delete_id = $_GET['delete_id'];
                                            $deleteQuery = $pdo->prepare("DELETE FROM reports WHERE Id = :delete_id");
                                            $deleteQuery->bindParam(':delete_id', $delete_id);
                                            $deleteQuery->execute();
                                            echo "<script>alert('Report deleted successfully');
                                            location.assign('view_report.php');
                                            </script>";

                                        }
                                        ?>
                        </tr>
                        <?php
                    }
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- / Content -->

<?php
    include('footer.php');
?>