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
                  <h5 class="card-title">All Users</h5>
                  <div class="d-flex justify-content-between align-items-center row pt-4 gap-6 gap-md-0">
                    <div class="col-md-4 product_status"></div>
                    <div class="col-md-4 product_category"></div>
                    <div class="col-md-4 product_stock"></div>
                  </div>
                  <a href="add_user.php"><button class="btn btn-primary">Add Users</button></a>
                </div>
                <div class="card-datatable table-responsive">
                  <table class="datatables-products table">
                    <thead class="border-top">
                      <tr>
                        <th>User First Name</th>
                        <th>User Last Name</th>
                        <th>User Email</th>
                        <th>User Role Id</th>
                        <th>Edit User</th>
                        <th>Delete User</th>
                      </tr>
                    </thead>
                    <?php
                    $query = $pdo->query("Select * from users");
                    $allcategorys = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($allcategorys as $category) {
                        ?>
                        <tr>
                            <td><?php echo $category['First_Name']?></td>
                            <td><?php echo $category['Last_Name']?></td>
                            <td><?php echo $category['Email']?></td>
                            <td><?php echo $category['Role_Id']?></td>
                            <td>
                                    <a href="update_user.php?userId=<?php echo urlencode($category['User_id']); ?>">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                </td>
                                <td><a href="?delete_id=<?php echo $category['User_id'] ?>" class="btn btn-danger text-light">Delete</a></td> 
                                        <?php
                                        if (isset($_GET['delete_id'])) {
                                            $delete_id = $_GET['delete_id'];
                                            $deleteQuery = $pdo->prepare("DELETE FROM users WHERE User_id = :delete_id");
                                            $deleteQuery->bindParam(':delete_id', $delete_id);
                                            $deleteQuery->execute();
                                            echo "<script>alert('User deleted successfully');
                                            location.assign('view_user.php');
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