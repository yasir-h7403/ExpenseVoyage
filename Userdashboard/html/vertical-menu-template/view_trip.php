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
                    <a href="add_trip.php"><button class="btn btn-primary">Add Trip</button></a>
                  </div>
                </div>
                <div class="card-datatable table-responsive">
                  <table class="datatables-products table">
                    <thead class="border-top">
                      <tr>
                        <th>Trip Name</th>
                        <th>Trip Start Date</th>
                        <th>Trip End Date</th>
                        <th>Trip Destination</th>
                        <th>Trip Budget</th>
                        <th>Edit Trip</th>
                        <th>Delete Trip</th>
                      </tr>
                    </thead>
                    <?php
                    $user_id = $_SESSION['expenseId'];                      
                    $query = $pdo->prepare("Select * from trips where User_id = :user_id");
                    $query->bindParam("user_id", $user_id, PDO::PARAM_INT);
                    $query->execute();
                    $alltrips = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($alltrips as $trips) {
                        ?>
                        <tr>
                            <td><?php echo $trips['Tirp_name']?></td>
                            <td><?php echo $trips['Start_date']?></td>
                            <td><?php echo $trips['End_date']?></td>
                            <td><?php echo $trips['destination']?></td>
                            <td><?php echo $trips['budget']?></td>
                            <td>
                                    <a href="update_trip.php?tripId=<?php echo urlencode($trips['Trip_id']); ?>">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                </td>
                                <td><a href="?delete_id=<?php echo $trips['Trip_id'] ?>" class="btn btn-danger text-light">Delete</a></td> 
                                        <?php
                                        if (isset($_GET['delete_id'])) {
                                            $delete_id = $_GET['delete_id'];
                                            $deleteQuery = $pdo->prepare("DELETE FROM trips WHERE Trip_id = :delete_id");
                                            $deleteQuery->bindParam(':delete_id', $delete_id);
                                            $deleteQuery->execute();
                                            echo "<script>alert('Expense deleted successfully');
                                            location.assign('view_expense.php');
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