<?php
// Start session
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "fitzone_db");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select all classes
$sql = "SELECT id, title, instructor, schedule, capacity FROM classes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Class Management | FitZone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/classmng.css" />
</head>

<body>
    <?php include 'nav.php'; ?>

    <main class="classmng-container">
        <header class="classmng-header">
            <h1>Class Management</h1>
            <p class="subtext">Manage fitness class schedules, trainers, and descriptions.</p>
        </header>

        <section class="class-actions">
            <a href="add_class.php" class="btn btn-primary add-class-btn">➕ Add New Class</a>
        </section>

        <section class="class-table-section">
            <?php
            if ($result->num_rows > 0) {
                echo "<table class='class-table'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Class Name</th>
                                <th>Trainer</th>
                                <th>Schedule</th>
                                <th>Capacity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['id']) . "</td>
                            <td>" . htmlspecialchars($row['title']) . "</td>
                            <td>" . htmlspecialchars($row['instructor']) . "</td>
                            <td>" . htmlspecialchars($row['schedule']) . "</td>
                            <td>" . htmlspecialchars($row['capacity']) . "</td>
                            <td>
                                <a href='edit_class.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>
                                <a href='delete_class.php?id=" . $row['id'] . "' class='btn btn-delete' onclick=\"return confirm('Are you sure you want to delete this class?');\">Delete</a>
                            </td>
                        </tr>";
                }

                echo "</tbody></table>";
            } else {
                echo "<p>No classes found.</p>";
            }

            $conn->close();
            ?>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>