<?php
// Start session
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "fitzone_db"); // ✅ Corrected DB name

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select all users
$sql = "SELECT id, full_name, email, role FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>User Management | FitZone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/admin_dashboard.css" />
    <link rel="stylesheet" href="css/usermng.css" />

</head>

<body>
    <?php include 'nav.php'; ?>

    <main class="dashboard">
        <header class="dashboard-header">
            <h1>User Management</h1>
            <p class="subtext">View, add, update, or remove customer and staff profiles.</p>
        </header>

        <section class="dashboard-cards">
            <h2>All Users</h2>
            <?php
            if ($result->num_rows > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['id']) . "</td>
                            <td>" . htmlspecialchars($row['full_name']) . "</td>
                            <td>" . htmlspecialchars($row['email']) . "</td>
                            <td>" . htmlspecialchars($row['role']) . "</td>
                            <td>
                                <a href='edit_user.php?id=" . $row['id'] . "'>Edit</a> | 
                                <a href='delete_user.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a>
                            </td>
                        </tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No users found.</p>";
            }

            $conn->close();
            ?>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>