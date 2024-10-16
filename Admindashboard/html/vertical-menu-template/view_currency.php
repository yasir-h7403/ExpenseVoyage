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
                  <h5 class="card-title">All Currencies</h5>
                  <div class="d-flex justify-content-between align-items-center row pt-4 gap-6 gap-md-0">
                    <div class="col-md-4 product_status"></div>
                    <div class="col-md-4 product_category"></div>
                    <div class="col-md-4 product_stock"></div>
                  </div>
                  <a href="add_currency.php"><button class="btn btn-primary">Add Currency</button></a>
                </div>
                <div class="card-datatable table-responsive">
                  <table class="datatables-products table">
                    <thead class="border-top">
                      <tr>
                        <th>Currency Id</th>
                        <th>Currency Name</th>
                        <th>Currency Code</th>
                        <th>Currency Exchange Rate</th>
                        <th>Edit Currency</th>
                        <th>Delete Currency</th>
                      </tr>
                    </thead>
                    <?php
                    $query = $pdo->query("Select * from currencies");
                    $allcategorys = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($allcategorys as $category) {
                        ?>
                        <tr>
                            <td><?php echo $category['Id']?></td>
                            <td><?php echo $category['Currency_name']?></td>
                            <td><?php echo $category['CurrencyCode']?></td>
                            <td><?php echo $category['ExchangeRateToBase']?></td>
                            <td>
                                    <a href="update_currency.php?currencyId=<?php echo urlencode($category['Id']); ?>">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                </td>
                                <td><a href="?delete_id=<?php echo $category['Id'] ?>" class="btn btn-danger text-light">Delete</a></td> 
                                        <?php
                                        if (isset($_GET['delete_id'])) {
                                            $delete_id = $_GET['delete_id'];
                                            $deleteQuery = $pdo->prepare("DELETE FROM currencies WHERE Id = :delete_id");
                                            $deleteQuery->bindParam(':delete_id', $delete_id);
                                            $deleteQuery->execute();
                                            echo "<script>alert('Currency deleted successfully');
                                            location.assign('view_currency.php');
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