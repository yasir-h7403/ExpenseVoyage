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
                  <a href="add_category.php"><button class="btn btn-primary">Add Category</button></a>
                </div>
                <div class="card-datatable table-responsive">
                  <table class="datatables-products table">
                    <thead class="border-top">
                      <tr>
                        <th>Category Id</th>
                        <th>Category Name</th>
                        <th>Edit Category</th>
                        <th>Delete Category</th>
                      </tr>
                    </thead>
                    <?php
                    $query = $pdo->query("Select * from category");
                    $allcategorys = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($allcategorys as $category) {
                        ?>
                        <tr>
                            <td><?php echo $category['Category_id']?></td>
                            <td><?php echo $category['Category_name']?></td>
                            <td>
                                    <a href="update_category.php?categoryId=<?php echo urlencode($category['Category_id']); ?>">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                </td>
                                <td><a href="?delete_id=<?php echo $category['Category_id'] ?>" class="btn btn-danger text-light">Delete</a></td> 
                                        <?php
                                        if (isset($_GET['delete_id'])) {
                                            $delete_id = $_GET['delete_id'];
                                            $deleteQuery = $pdo->prepare("DELETE FROM category WHERE Category_id = :delete_id");
                                            $deleteQuery->bindParam(':delete_id', $delete_id);
                                            $deleteQuery->execute();
                                            echo "<script>alert('Category deleted successfully');
                                            location.assign('view_category.php');
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