<?php
include 'db_connection.php';
session_start();

$errorMsg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND role = 'Customer'");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['full_name'] = $user['full_name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = 'Customer';

                header("Location: customer_dashboard.php");
                exit();
            } else {
                $errorMsg = "Invalid email or password.";
            }
        } catch (PDOException $e) {
            $errorMsg = "Database error: " . $e->getMessage();
        }
    } else {
        $errorMsg = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Customer Login | FitZone</title>
    <link rel="stylesheet" href="css/login.css" />
</head>

<body>
    <?php include 'nav.php'; ?>
    <section class="login-section">
        <form method="POST" action="login.php">
            <h2>Login to FitZone</h2>

            <?php if (!empty($errorMsg)): ?>
                <p id="errorMsg" class="error-msg"><?= htmlspecialchars($errorMsg) ?></p>
            <?php endif; ?>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" />

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required />

            <button type="submit" class="btn">Login</button>
        </form>
    </section>
    <?php include 'footer.php'; ?>
</body>

</html>