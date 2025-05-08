<?php
include 'db_connection.php';

$responseMsg = "";
$color = "red";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['fullName']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $plan = $_POST['plan'];

    if ($fullName && $email && $phone && $password && $plan) {
        try {
            // Check if email already exists
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->rowCount() > 0) {
                $responseMsg = "This email is already registered.";
            } else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insert full data into users table
                $stmt = $pdo->prepare("INSERT INTO users (full_name, email, phone, password, membership_plan, role) VALUES (?, ?, ?, ?, ?, 'Customer')");
                $stmt->execute([$fullName, $email, $phone, $hashedPassword, $plan]);

                $responseMsg = "Thank you, $fullName! You’ve successfully joined the $plan Plan.";
                $color = "green";
            }
        } catch (PDOException $e) {
            $responseMsg = "Error: " . $e->getMessage();
        }
    } else {
        $responseMsg = "Please fill in all fields correctly.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Join Now | FitZone Fitness Center</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/joinnow.css" />
</head>

<body>
    <?php include 'nav.php'; ?>

    <section class="page-hero">
        <div class="overlay">
            <h2>Join FitZone</h2>
            <p>Fill out the form to become a member today!</p>
        </div>
    </section>

    <div class="form-container">
        <section class="join-form-section">
            <form method="POST" action="">
                <h3>Membership Registration</h3>

                <label for="fullName">Full Name</label>
                <input type="text" id="fullName" name="fullName" required />

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required />

                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required />

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required />

                <label for="plan">Select Membership Plan</label>
                <select id="plan" name="plan" required>
                    <option value="">-- Select Plan --</option>
                    <option value="Basic">Basic - Rs. 3,000/month</option>
                    <option value="Pro">Pro - Rs. 5,000/month</option>
                    <option value="Elite">Elite - Rs. 8,000/month</option>
                </select>

                <button type="submit" class="btn">Join Now</button>
                <?php if (!empty($responseMsg)) : ?>
                    <p style="color: <?= $color ?>"><?= htmlspecialchars($responseMsg) ?></p>
                <?php endif; ?>
            </form>
        </section>
    </div>
    <?php if (!empty($responseMsg)) : ?>
        <script>
            alert("<?= addslashes($responseMsg) ?>");
        </script>
    <?php endif; ?>
    <?php include 'footer.php'; ?>
</body>

</html>