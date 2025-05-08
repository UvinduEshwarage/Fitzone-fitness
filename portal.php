<?php
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to MySQL
    $conn = new mysqli("localhost", "root", "", "fitzonedb");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get credentials from form (and sanitize)
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Check user in 'users' table
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if ($row['role'] == 'Admin') {
            header("Location: admin_dashboard.php");
            exit();
        } elseif ($row['role'] == 'Staff') {
            header("Location: staff_dashboard.php");
            exit();
        } else {
            $error = "Unauthorized role.";
        }
    } else {
        $error = "Invalid email or password.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>FitZone Login</title>
    <link rel="stylesheet" href="css/portal.css" />
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="center-box">


        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <form action="" method="POST">
            <h2>FitZone Login</h2>
            <label>Email:</label><br>
            <input type="email" name="email" required><br><br>

            <label>Password:</label><br>
            <input type="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>