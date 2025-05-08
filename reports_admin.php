<?php
// Start session (if needed)
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "fitzone_db");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data and sanitize it
    $reportType = mysqli_real_escape_string($conn, $_POST['reportType']);
    $reportTitle = mysqli_real_escape_string($conn, $_POST['reportTitle']);
    $reportDetails = mysqli_real_escape_string($conn, $_POST['reportDetails']);
    $submittedBy = 1; // Example user ID, this should be dynamically set based on logged-in user

    // Query to insert report data into the 'reports' table
    $sql = "INSERT INTO reports (submitted_by, report_type, title, details)
            VALUES ('$submittedBy', '$reportType', '$reportTitle', '$reportDetails')";

    if ($conn->query($sql) === TRUE) {
        // Show alert and reload the page after submission
        echo "<script>alert('Report submitted successfully!'); window.location.href = window.location.href;</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Submit Report | FitZone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/reports_admin.css" />
</head>

<body>
    <?php include 'nav.php'; ?>

    <section class="report-section">
        <h1>Submit Report to Admin</h1>
        <p>Please fill out the form below to submit a report or feedback to the admin team.</p>

        <!-- The form that submits the report data -->
        <form action="" method="POST" class="report-form">
            <label for="reportType">Report Type</label>
            <select id="reportType" name="reportType" required>
                <option value="">-- Select Report Type --</option>
                <option value="Incident">Incident Report</option>
                <option value="Maintenance">Maintenance Request</option>
                <option value="Feedback">Feedback</option>
                <option value="Other">Other</option>
            </select>
            <br><br>
            <label for="reportTitle">Title</label>
            <input type="text" id="reportTitle" name="reportTitle" placeholder="Enter report title" required />
            <br><br>
            <label for="reportDetails">Details</label>
            <textarea id="reportDetails" name="reportDetails" rows="6" placeholder="Describe the issue or feedback..." required></textarea>
            <br><br>
            <button type="submit" class="btn">Submit Report</button>
        </form>
    </section>

    <?php include 'footer.php'; ?>
</body>

</html>