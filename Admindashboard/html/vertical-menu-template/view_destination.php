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
                  <h5 class="card-title">All Destinations</h5>
                  <div class="d-flex justify-content-between align-items-center row pt-4 gap-6 gap-md-0">
                    <div class="col-md-4 product_status"></div>
                    <div class="col-md-4 product_category"></div>
                    <div class="col-md-4 product_stock"></div>
                  </div>
                  <a href="add_destination.php"><button class="btn btn-primary">Add Destination</button></a>
                </div>
                <div class="card-datatable table-responsive">
                  <table class="datatables-products table">
                    <thead class="border-top">
                      <tr>
                        <th>Destination Id</th>
                        <th>Destination Name</th>
                        <th>Destination Description</th>
                        <th>Edit Destination</th>
                        <th>Delete Destination</th>
                      </tr>
                    </thead>
                    <?php
                    $query = $pdo->query("Select * from destination");
                    $allcategorys = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($allcategorys as $category) {
                        ?>
                        <tr>
                            <td><?php echo $category['id']?></td>
                            <td><?php echo $category['name']?></td>
                            <td><?php echo $category['description']?></td>
                            <td>
                                    <a href="update_destination.php?destinationId=<?php echo urlencode($category['id']); ?>">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                </td>
                                <td><a href="?delete_id=<?php echo $category['id'] ?>" class="btn btn-danger text-light">Delete</a></td> 
                                        <?php
                                        if (isset($_GET['delete_id'])) {
                                            $delete_id = $_GET['delete_id'];
                                            $deleteQuery = $pdo->prepare("DELETE FROM destination WHERE id = :delete_id");
                                            $deleteQuery->bindParam(':delete_id', $delete_id);
                                            $deleteQuery->execute();
                                            echo "<script>alert('Destination deleted successfully');
                                            location.assign('view_destination.php');
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