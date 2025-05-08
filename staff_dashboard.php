<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Staff Dashboard | FitZone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="css/staff_dashboard.css" />

</head>

<body>
    <?php include 'nav.php'; ?>

    <main class="dashboard">
        <header class="dashboard-header">
            <h1>Welcome, Gym Staff!</h1>
            <p class="subtext">Your tasks and responsibilities at a glance.</p>
        </header>

        <section class="dashboard-cards">
            <div class="card">
                <h3>My Schedule</h3>
                <p>View your upcoming shifts and class assignments.</p>
                <a href="vschedule.php">View Schedule</a>
            </div>

            <div class="card">
                <h3>Manage Members</h3>
                <p>Track attendance and assist registered members.</p>
                <a href="usermng.php">User Management</a>
            </div>

            <div class="card">
                <h3>Submit Reports</h3>
                <p>Report daily activities, issues, and feedback to admin.</p>
                <a href="reports_admin.php">Submit Report</a>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>

</body>

</html>