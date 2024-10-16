<?php
include('headerpro.php');
?>

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Expense List Table -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">View Expenses</h5>
                <div class="d-flex justify-content-between align-items-center row pt-4 gap-6 gap-md-0">
                    <div class="col-md-4 product_status"></div>
                    <div class="col-md-4 product_category"></div>
                    <div class="col-md-4 product_stock"></div>
                </div>
                <a href="add_expense.php"><button class="btn btn-primary">Add Expense</button></a>
            </div>
            <div class="card-datatable table-responsive">
                <table class="datatables-products table">
                    <thead class="border-top">
                        <tr>
                            <th>Expense Amount</th>
                            <th>Expense Date</th>
                            <th>Notes</th>
                            <th>Created At</th>
                            <th>Category</th>
                            <th>Trip</th>
                            <th>Edit Expense</th>
                            <th>Delete Expense</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = $pdo->prepare("
                            SELECT expenses.*, category.Category_name, trips.Tirp_name
                            FROM expenses 
                            LEFT JOIN category ON expenses.Category_id = category.Category_id 
                            LEFT JOIN trips ON expenses.Trip_id = trips.Trip_id
                            WHERE expenses.User_id = :user_id
                        ");
                        $query->bindParam(':user_id', $_SESSION['expenseId'], PDO::PARAM_INT);
                        $query->execute();
                        $allexpenses = $query->fetchAll(PDO::FETCH_ASSOC);
                        
                        foreach ($allexpenses as $expense) {
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($expense['Amount']); ?></td>
                                <td><?php echo htmlspecialchars($expense['Expense_date']); ?></td>
                                <td><?php echo htmlspecialchars($expense['Notes']); ?></td>
                                <td><?php echo htmlspecialchars($expense['CreatedAt']); ?></td>
                                <td><?php echo htmlspecialchars($expense['Category_name']); ?></td>
                                <td><?php echo htmlspecialchars($expense['Tirp_name']); ?></td>
                                <td>
                                    <a href="update_expense.php?expenseId=<?php echo urlencode($expense['Expense_id']); ?>">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                </td>
                                <td><a href="?delete_id=<?php echo $expense['Expense_id'] ?>" class="btn btn-danger text-light">Delete</a></td> 
                                        <?php
                                        if (isset($_GET['delete_id'])) {
                                            $delete_id = $_GET['delete_id'];
                                            $deleteQuery = $pdo->prepare("DELETE FROM expenses WHERE Expense_id = :delete_id");
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
</div>

<?php
include('footer.php');
?>
