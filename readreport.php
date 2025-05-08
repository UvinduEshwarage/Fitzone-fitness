<?php
// Include the database connection file
include('db_connection.php');

// SQL query to fetch all records from the reports table
$sql = "SELECT * FROM reports";

// Prepare the statement
$stmt = $pdo->prepare($sql);

// Execute the query
$stmt->execute();

// Fetch all the results
$reports = $stmt->fetchAll();

// Check if there are any reports
if ($reports) {
    echo "<h2 class='report-heading'>Reports List</h2>";
    echo "<table class='report-table'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Submitted By</th>
                    <th>Report Type</th>
                    <th>Title</th>
                    <th>Details</th>
                    <th>Submitted At</th>
                </tr>
            </thead>
            <tbody>";

    // Loop through each report and display its details in a table
    foreach ($reports as $report) {
        echo "<tr>
                <td>" . htmlspecialchars($report['id']) . "</td>
                <td>" . htmlspecialchars($report['submitted_by']) . "</td>
                <td>" . htmlspecialchars($report['report_type']) . "</td>
                <td>" . htmlspecialchars($report['title']) . "</td>
                <td>" . nl2br(htmlspecialchars($report['details'])) . "</td>
                <td>" . htmlspecialchars($report['submitted_at']) . "</td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p class='no-reports'>No reports found.</p>";
}
?>

<!-- Add some CSS styling to make it look professional -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    .report-heading {
        text-align: center;
        color: #333;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .report-table {
        width: 100%;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .report-table th,
    .report-table td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .report-table th {
        background-color: #4CAF50;
        color: white;
    }

    .report-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .report-table tr:hover {
        background-color: #ddd;
    }

    .no-reports {
        text-align: center;
        color: #888;
    }
</style>