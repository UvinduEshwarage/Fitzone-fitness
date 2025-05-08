<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard | FitZone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/admin_dashboard.css" />

</head>

<body>
    <?php include 'nav.php'; ?>

    <main class="dashboard">
        <header class="dashboard-header">
            <h1>Admin Dashboard</h1>
            <p class="subtext">Welcome! Use the options below to manage the FitZone system.</p>
        </header>

        <section class="dashboard-cards">
            <div class="card">
                <h2>User Management</h2>
                <p>Manage customer and staff profiles: view, edit, add, or delete.</p>
                <a href="usermng.php" class="card-btn">Manage Users</a>
            </div>

            <div class="card">
                <h2>Class Scheduling</h2>
                <p>Edit training classes, assign trainers, and manage timing conflicts.</p>
                <a href="classmng.php" class="card-btn">Manage Classes</a>
            </div>

            <div class="card">
                <h2>Staff Reports</h2>
                <p>Read staff feedback reports.</p>
                <a href="readreport.php" class="card-btn">Read Reports</a>
            </div>

        </section>

        <!-- Centered Logout Button -->
        <div class="logout-container">
            <a href="logoutstaff.php" class="logout-btn">Logout</a>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>