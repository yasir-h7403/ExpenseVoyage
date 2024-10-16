<?php
include('headerpro.php');


if (!isset($_SESSION['expenseId'])) {
    echo "<script>alert('Please login to update expenses.'); location.assign('login.php');</script>";
    exit;
}

$expenseId = '';
$expense = [];

if (isset($_GET['expenseId'])) {
    $expenseId = $_GET['expenseId'];

    $query = $pdo->prepare("SELECT * FROM expenses WHERE Expense_id = :id AND User_id = :user_id");
    $query->bindParam(':id', $expenseId, PDO::PARAM_INT);
    $query->bindParam(':user_id', $_SESSION['expenseId'], PDO::PARAM_INT);
    $query->execute();
    $expense = $query->fetch(PDO::FETCH_ASSOC);

    if (!$expense) {
        echo "<script>alert('Expense not found or you do not have permission to edit this expense.'); location.assign('view_expense.php');</script>";
        exit;
    }
} else {
    echo "<script>alert('No expense selected to update.'); location.assign('view_expense.php');</script>";
    exit;
}

if (isset($_POST['updateExpense'])) {
    $expenseAmount = isset($_POST['expense_amount']) ? trim($_POST['expense_amount']) : '';
    $expenseDate = isset($_POST['expense_date']) ? trim($_POST['expense_date']) : '';
    $expenseDescription = isset($_POST['expense_description']) ? trim($_POST['expense_description']) : '';
    $currencyId = isset($_POST['Currency_id']) ? trim($_POST['Currency_id']) : '';
    $categoryId = isset($_POST['Cat_id']) ? trim($_POST['Cat_id']) : '';
    $tripId = isset($_POST['Trip_id']) ? trim($_POST['Trip_id']) : '';
    $userId = $_POST['user_id'];
    $expenseId = $_GET['expenseId'];

    if (empty($expenseAmount) || empty($expenseDate) || empty($currencyId) || empty($categoryId) || empty($tripId)) {
        echo "<script>alert('Please fill in all required fields.');</script>";
    } else {
        try {
            $updateQuery = $pdo->prepare("
                    UPDATE expenses 
                    SET 
                        Amount = :expense_amount, 
                        Expense_date = :expense_date, 
                        Notes = :expense_description, 
                        Currency_id = :Currency_id, 
                        Category_id = :Cat_id, 
                        Trip_id = :Trip_id 
                    WHERE 
                        Expense_id = :id AND 
                        User_id = :user_id
                ");

            $updateQuery->bindParam(':expense_amount', $expenseAmount, PDO::PARAM_STR);
            $updateQuery->bindParam(':expense_date', $expenseDate, PDO::PARAM_STR);
            $updateQuery->bindParam(':expense_description', $expenseDescription, PDO::PARAM_STR);
            $updateQuery->bindParam(':Currency_id', $currencyId, PDO::PARAM_INT);
            $updateQuery->bindParam(':Cat_id', $categoryId, PDO::PARAM_INT);
            $updateQuery->bindParam(':Trip_id', $tripId, PDO::PARAM_INT);
            $updateQuery->bindParam(':id', $expenseId, PDO::PARAM_INT);
            $updateQuery->bindParam(':user_id', $userId, PDO::PARAM_INT);

            if ($updateQuery->execute()) {
                echo "<script>
                            alert('Expense updated successfully!');
                            location.assign('view_expense.php');
                          </script>";
                exit;
            } else {
                echo "<script>alert('Failed to update the expense. Please try again.');</script>";
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
            <!-- Update Expense Header -->
            <div
                class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1">Update Expense</h4>
                </div>
            </div>

            <!-- Update Expense Form -->
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card mb-6">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Expense Information</h5>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" id="expenseform">
                                <!-- Expense Amount -->
                                <div class="mb-6">
                                    <label class="form-label" for="expense_amount">Expense Amount <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="expense_amount" name="expense_amount"
                                        value="<?php echo htmlspecialchars($expense['Amount']); ?>"
                                        placeholder="Expense Amount" required />
                                        <small class="text-danger"></small>
                                </div>

                                <!-- Expense Date -->
                                <div class="mb-6">
                                    <label class="form-label" for="expense_date">Expense Date <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="expense_date" name="expense_date"
                                        value="<?php echo htmlspecialchars($expense['Expense_date']); ?>" required />
                                        <small class="text-danger"></small>
                                </div>

                                <!-- Expense Description -->
                                <div class="mb-6">
                                    <label class="form-label" for="expense_description">Expense Description</label>
                                    <input type="text" class="form-control" id="expense_description"
                                        name="expense_description"
                                        value="<?php echo htmlspecialchars($expense['Notes']); ?>"
                                        placeholder="Expense Description" />
                                        <small class="text-danger"></small>
                                </div>

                                <!-- Expense Currency -->
                                <div class="mb-6">
                                    <label class="form-label" for="expense_currency">Expense Currency <span
                                            class="text-danger">*</span></label>
                                    <select id="expense_currency" class="select2 form-select" name="Currency_id"
                                        required>
                                        <option value="">Select Currency</option>
                                        <?php
                                        $currencyQuery = $pdo->query("SELECT * FROM currencies");
                                        $currencies = $currencyQuery->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($currencies as $currency) {
                                            $selected = ($expense['Currency_id'] == $currency['Id']) ? 'selected' : '';
                                            echo "<option value='" . htmlspecialchars($currency['Id']) . "' $selected>" . htmlspecialchars($currency['Currency_name']) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- Expense Category -->
                                <div class="mb-6">
                                    <label class="form-label" for="expense_category">Expense Category <span
                                            class="text-danger">*</span></label>
                                    <select id="expense_category" class="select2 form-select" name="Cat_id" required>
                                        <option value="">Select Category</option>
                                        <?php
                                        $categoryQuery = $pdo->query("SELECT * FROM category");
                                        $categories = $categoryQuery->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($categories as $category) {
                                            $selected = ($expense['Category_id'] == $category['Category_id']) ? 'selected' : '';
                                            echo "<option value='" . htmlspecialchars($category['Category_id']) . "' $selected>" . htmlspecialchars($category['Category_name']) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- Expense Trip -->
                                <div class="mb-6">
                                    <label class="form-label" for="expense_trip">Expense Trip <span
                                            class="text-danger">*</span></label>
                                    <select id="expense_trip" class="select2 form-select" name="Trip_id" required>
                                        <option value="">Select Trip</option>
                                        <?php
                                        $tripStmt = $pdo->prepare("SELECT * FROM trips WHERE User_id = :user_id");
                                        $tripStmt->bindParam(':user_id', $_SESSION['expenseId'], PDO::PARAM_INT);
                                        $tripStmt->execute();
                                        $trips = $tripStmt->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($trips as $trip) {
                                            $selected = ($expense['Trip_id'] == $trip['Trip_id']) ? 'selected' : '';
                                            echo "<option value='" . htmlspecialchars($trip['Trip_id']) . "' $selected>" . htmlspecialchars($trip['Tirp_name']) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- Hidden User ID -->
                                <input type="hidden" name="user_id"
                                    value="<?php echo htmlspecialchars($_SESSION['expenseId']); ?>">

                                <!-- Submit Button -->
                                <button class="btn btn-primary" type="submit" name="updateExpense">Update
                                    Expense</button>
                            </form>
                        </div>
                    </div>
                    <!-- /Expense Information -->
                </div>
            </div>
        </div>
    </div>
    <!-- /Content -->
</div>

<?php
  include('footer.php');
  ?>