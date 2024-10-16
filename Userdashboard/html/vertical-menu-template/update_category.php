<?php
include('headerpro.php');

if (!isset($_SESSION['expenseId'])) {
  echo "<script>alert('Please login to update category.'); location.assign('login.php');</script>";
  exit;
}

$categoryId = '';
$category = [];

if (isset($_GET['categoryId'])) {
  $categoryId = $_GET['categoryId'];
  $query = $pdo->prepare("SELECT * FROM category WHERE Category_id = :id");
  $query->bindParam(':id', $categoryId, PDO::PARAM_INT);
  $query->execute();
  $category = $query->fetch(PDO::FETCH_ASSOC);

  if (!$category) {
    echo "<script>alert('Category not found or you do not have permission to edit this category.'); location.assign('view_category.php');</script>";
    exit;
  }
} else {
  echo "<script>alert('No category selected to update.'); location.assign('view_category.php');</script>";
  exit;
}

if (isset($_POST['updateCategory'])) {
  $category_name = isset($_POST['category_name']) ? trim($_POST['category_name']) : '';
  $userId = $_POST['cat_id'];

  if (empty($category_name)) {
    echo "<script>alert('Please fill in all required fields.');</script>";
  } else {
    try {
      $updateQuery = $pdo->prepare("
                  UPDATE category 
                  SET 
                      Category_name = :category_name
                  WHERE 
                      Category_id = :id
              ");

      $updateQuery->bindParam(':category_name', $category_name, PDO::PARAM_STR);
      $updateQuery->bindParam(':id', $userId, PDO::PARAM_INT);

      if ($updateQuery->execute()) {
        echo "<script>
                          alert('Category updated successfully!');
                          location.assign('view_category.php');
                        </script>";
        exit;
      } else {
        echo "<script>alert('Failed to update the category. Please try again.');</script>";
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
          <h4 class="mb-1">Update a Expense Category</h4>
        </div>
      </div>

      <div class="row">
        <!-- First column-->
        <div class="col-12 col-lg-12">
          <!-- Product Information -->
          <div class="card mb-6">
            <div class="card-header">
              <h5 class="card-tile mb-0">Category information</h5>
            </div>
            <div class="card-body">
              <form action="" method="post" id="itineraries">
                <div class="mb-6">
                  <label class="form-label" for="category_name">Category Name</label>
                  <input type="text" class="form-control" id="itinerary_activity" placeholder="Category Name"
                    name="category_name" aria-label="Category Name" value="<?php echo $category['Category_name'] ?>" />
                    <small class="text-danger"></small>
                </div>
                <input type="hidden" name="cat_id" value="<?php echo $category['Category_id'] ?>">
                <button class="btn btn-primary" type="submit" name="updateCategory">Update Category</button>
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