<?php
session_start();
include 'db_connection.php'; // Ensure this connects using PDO

// Redirect if not logged in or not a customer
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Customer') {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

try {
    // Get user details
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        throw new Exception("User not found.");
    }

    // Determine fee based on plan
    $membership_plan = strtolower($user['membership_plan']);
    switch ($membership_plan) {
        case 'basic':
            $amount = 3000;
            break;
        case 'pro':
            $amount = 5000;
            break;
        case 'elite':
            $amount = 8000;
            break;
        default:
            $amount = 0;
    }

    // Get last payment
    $stmt = $pdo->prepare("SELECT amount, payment_date FROM payments WHERE user_id = ? ORDER BY payment_date DESC LIMIT 1");
    $stmt->execute([$user_id]);
    $lastPayment = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Dashboard | FitZone</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/customer_dashboard.css">
</head>

<body>
    <?php include 'nav.php'; ?>

    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Welcome, <?php echo htmlspecialchars($user['full_name']); ?>!</h1>
            <p>Your personalized dashboard for FitZone Fitness Center.</p>
        </div>

        <div class="dashboard-info">
            <div class="membership-details">
                <h2>Your Membership Details</h2>
                <div class="info-item">
                    <span>Email:</span>
                    <p><?php echo htmlspecialchars($user['email']); ?></p>
                </div>
                <div class="info-item">
                    <span>Phone:</span>
                    <p><?php echo htmlspecialchars($user['phone']); ?></p>
                </div>
                <div class="info-item">
                    <span>Membership Plan:</span>
                    <p><?php echo ucfirst(htmlspecialchars($user['membership_plan'])); ?></p>
                </div>
                <div class="info-item">
                    <span>Monthly Fee:</span>
                    <p>Rs. <?php echo number_format($amount); ?></p>
                </div>
            </div>

            <div class="payment-status">
                <h2>Payment Status</h2>
                <?php if ($lastPayment): ?>
                    <div class="payment-info">
                        <span>Last Payment:</span>
                        <p>Rs. <?php echo number_format($lastPayment['amount']); ?> on <?php echo date("F d, Y", strtotime($lastPayment['payment_date'])); ?></p>
                    </div>
                    <div class="payment-info">
                        <span>Next Due:</span>
                        <p><?php echo date("F d, Y", strtotime($lastPayment['payment_date'] . " +30 days")); ?></p>
                    </div>
                <?php else: ?>
                    <p>You haven't made a payment yet.</p>
                    <div class="payment-info">
                        <span>Next Due:</span>
                        <p>As soon as you complete your first payment</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="payment-action">
            <form method="get" action="payment_page.php">
                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                <input type="hidden" name="plan" value="<?php echo htmlspecialchars($user['membership_plan']); ?>">
                <button type="submit" class="do-payment-btn">Do Payment</button>
            </form>
        </div>

        <div class="logout-action">
            <form method="post" action="logout.php">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>