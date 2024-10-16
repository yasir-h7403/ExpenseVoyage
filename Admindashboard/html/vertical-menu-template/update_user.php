<?php
    include('headerpro.php');

    if(!isset($_SESSION['adminId'])) {
        echo "<script>alert('Please login to update category.'); location.assign('login.php');</script>";
        exit;
    }
  
    $userId = '';
    $user = [];
  
    if(isset($_GET['userId'])){
        $userId = $_GET['userId'];
        $query = $pdo->prepare("SELECT * FROM users WHERE User_Id = :id");
        $query->bindParam(':id', $userId, PDO::PARAM_INT);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        
        if (!$user) {
            echo "<script>alert('User not found or you do not have permission to edit this user.'); location.assign('view_user.php');</script>";
            exit;
        }
    } else {
        echo "<script>alert('No user selected to update.'); location.assign('view_user.php');</script>";
        exit;
    }
  
    if(isset($_POST['updateuser'])){
        $user_first_name = isset($_POST['user_first_name']) ? trim($_POST['user_first_name']) : '';
        $user_last_name = isset($_POST['user_last_name']) ? trim($_POST['user_last_name']) : '';
        $user_email = isset($_POST['user_email']) ? trim($_POST['user_email']) : '';
        $user_password = isset($_POST['user_password']) ? trim($_POST['user_password']) : '';
        $userId = $_POST['userId'];
  
        if(empty($user_first_name)) {
            echo "<script>alert('Please fill in all required fields.');</script>";
        } else {
            try {
                $updateQuery = $pdo->prepare("
                    UPDATE users 
                    SET 
                        First_Name = :user_first_name,
                        Last_Name = :user_last_name,
                        Email = :user_email,
                        Password = :user_password
                    WHERE 
                        User_id = :id
                ");
  
                $updateQuery->bindParam(':user_first_name', $user_first_name, PDO::PARAM_STR);
                $updateQuery->bindParam(':user_last_name', $user_last_name, PDO::PARAM_STR);
                $updateQuery->bindParam(':user_email', $user_email, PDO::PARAM_STR);
                $updateQuery->bindParam(':user_password', $user_password, PDO::PARAM_STR);
                $updateQuery->bindParam(':id', $userId, PDO::PARAM_INT);
  
                if($updateQuery->execute()){
                    echo "<script>
                            alert('User updated successfully!');
                            location.assign('view_user.php');
                          </script>";
                    exit;
                } else {
                    echo "<script>alert('Failed to update the user. Please try again.');</script>";
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
                    <h4 class="mb-1">Update a User</h4>
                  </div>
                </div>

                <div class="row">
                  <!-- First column-->
                  <div class="col-12 col-lg-12">
                    <!-- Product Information -->
                    <div class="card mb-6">
                      <div class="card-header">
                        <h5 class="card-tile mb-0">User information</h5>
                      </div>
                      <div class="card-body">
                        <form action="" method="post">
                        <div class="mb-6">
                          <label class="form-label" for="user_first_name">User First Name</label>
                          <input
                            type="text"
                            class="form-control"
                            id="user_first_name"
                            placeholder="User First Name"
                            name="user_first_name"
                            aria-label="User First Name"
                            value="<?php echo $user['First_Name'] ?>" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="user_last_name">User Last Name</label>
                          <input
                            type="text"
                            class="form-control"
                            id="user_last_name"
                            placeholder="User Last Name"
                            name="user_last_name"
                            aria-label="User Last Name"
                            value="<?php echo $user['Last_Name'] ?>"  />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="user_email">User Email</label>
                          <input
                            type="text"
                            class="form-control"
                            id="user_email"
                            placeholder="User Email"
                            name="user_email"
                            aria-label="User Email"
                            value="<?php echo $user['Email'] ?>"  />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="user_password">User Password</label>
                          <input
                            type="password"
                            class="form-control"
                            id="user_password"
                            placeholder="User Password"
                            name="user_password"
                            aria-label="User Password"
                            value="<?php echo $user['Password'] ?>"  />
                        </div>
                        <input type="hidden" name="userId" value="<?php echo $user['User_id'] ?>">
                        <button class="btn btn-primary" type="submit" name="updateuser">Update User</button>
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