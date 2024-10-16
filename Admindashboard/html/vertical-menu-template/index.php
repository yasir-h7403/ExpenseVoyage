<?php
include('headerpro.php')
  ?>
  <?php
  if(!isset($_SESSION['adminId'])){
    echo"<script>
    location.assign('../../../index.php');
    </script>";
  } 
 ?>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <?php
    try {


      // Get the user ID from the session
      $uId = $_SESSION['adminId'];
      // Prepare and execute the query to get the budget and total expenses
      $stmt = $pdo->prepare("
        SELECT t.budget, 
        (SELECT SUM(e.Amount) FROM expenses e WHERE e.User_id = :user_id) AS total_expenses 
        FROM trips t 
        WHERE t.User_id = :user_id
    ");
      $stmt->bindParam(':user_id', $uId);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      // Check if the result contains budget and expenses
      if ($result) {
        $budget = $result['budget'];
        $total_expenses = $result['total_expenses'];

        // If total expenses exceed the budget, set the message
        if ($total_expenses > $budget) {
          $message = "Your budget is not enough for more expenses.";
        }
      } else {
        // If no trip data is found, display this message
        $message = "Trip budget information not found.";
      }
    } catch (PDOException $e) {
      // Handle any errors during query execution
      $message = "Error fetching budget information: " . $e->getMessage();
    }
    ?>

    <!-- Recent Activity -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Messages</h5>

        <div class="activity">
          <?php if ($message): ?>
            <!-- Display the message if budget is exceeded or an error occurs -->
            <div class="alert <?php echo ($total_expenses > $budget) ? 'alert-danger' : 'alert-warning'; ?>">
              <?php echo $message; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div><!-- End Recent Activity -->
  </div>
</div>
<!-- / Content -->
<?php
include('footer.php')
  ?>