<?php
include('headerpro.php');

if (!isset($_SESSION['adminId'])) {
    echo "<script>alert('Please login to update category.'); location.assign('login.php');</script>";
    exit;
}

$currencyId = '';
$currency = [];

if (isset($_GET['currencyId'])) {
    $currencyId = $_GET['currencyId'];
    $query = $pdo->prepare("SELECT * FROM currencies WHERE Id = :id");
    $query->bindParam(':id', $currencyId, PDO::PARAM_INT);
    $query->execute();
    $currency = $query->fetch(PDO::FETCH_ASSOC);
    
    if (!$currency) {
        echo "<script>alert('Currency not found or you do not have permission to edit this currency.'); location.assign('view_category.php');</script>";
        exit;
    }
} else {
    echo "<script>alert('No currency selected to update.'); location.assign('view_currency.php');</script>";
    exit;
}

if (isset($_POST['adminupdateCurrency'])) {
    $currency_name = isset($_POST['currency_name']) ? trim($_POST['currency_name']) : '';
    $currency_code = isset($_POST['currency_code']) ? trim($_POST['currency_code']) : '';
    $currency_exchange_rate = $_POST['currency_exchange_rate'];
    $currencyId = $_POST['currencyId'];

    if (empty($currency_name) || empty($currency_code)) {
        echo "<script>alert('Please fill in all required fields.');</script>";
    } else {
        try {
            $checkQuery = $pdo->prepare("SELECT COUNT(*) FROM currencies WHERE CurrencyCode = :currency_code AND Id != :id");
            $checkQuery->bindParam(':currency_code', $currency_code, PDO::PARAM_STR);
            $checkQuery->bindParam(':id', $currencyId, PDO::PARAM_INT);
            $checkQuery->execute();
            $duplicateCount = $checkQuery->fetchColumn();

            if ($duplicateCount > 0) {
                echo "<script>alert('Currency code already exists. Please choose a different code.');</script>";
            } else {
                $updateQuery = $pdo->prepare("
                    UPDATE currencies 
                    SET 
                        Currency_name = :currency_name,
                        CurrencyCode = :currency_code,
                        ExchangeRateToBase = :currency_exchange_rate
                    WHERE 
                        Id = :id
                ");

                $updateQuery->bindParam(':currency_name', $currency_name, PDO::PARAM_STR);
                $updateQuery->bindParam(':id', $currencyId, PDO::PARAM_INT);
                $updateQuery->bindParam(':currency_code', $currency_code, PDO::PARAM_STR);
                $updateQuery->bindParam(':currency_exchange_rate', $currency_exchange_rate, PDO::PARAM_STR);

                if ($updateQuery->execute()) {
                    echo "<script>
                            alert('Currency updated successfully!');
                            location.assign('view_currency.php');
                          </script>";
                    exit;
                } else {
                    echo "<script>alert('Failed to update the currency. Please try again.');</script>";
                }
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
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1">Update a Currency</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card mb-6">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Currency information</h5>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-6">
                                    <label class="form-label" for="currency_name">Currency Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="currency_name"
                                        placeholder="Currency Name"
                                        name="currency_name"
                                        aria-label="Currency Name"
                                        value="<?php echo htmlspecialchars($currency['Currency_name']); ?>" />
                                </div>
                                <div class="mb-6">
                                    <label class="form-label" for="currency_code">Currency Code</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="currency_code"
                                        placeholder="Currency Code"
                                        name="currency_code"
                                        aria-label="Currency Code"
                                        value="<?php echo htmlspecialchars($currency['CurrencyCode']); ?>" />
                                </div>
                                <div class="mb-6">
                                    <label class="form-label" for="currency_exchange_rate">Currency Exchange Rate</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="currency_exchange_rate"
                                        placeholder="Currency Exchange Rate"
                                        name="currency_exchange_rate"
                                        aria-label="Currency Exchange Rate"
                                        value="<?php echo htmlspecialchars($currency['ExchangeRateToBase']); ?>" />
                                </div>
                                <input type="hidden" name="currencyId" value="<?php echo htmlspecialchars($currency['Id']); ?>">
                                <button class="btn btn-primary" type="submit" name="adminupdateCurrency">Update Currency</button>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

<?php
include('footer.php');
?>
