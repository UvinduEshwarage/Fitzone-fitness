<?php
// create_users.php (run this only once)

include 'db_connection.php';

// Check if the users already exist
$stmt = $pdo->prepare("SELECT COUNT(*) FROM user");
$stmt->execute();
$userCount = $stmt->fetchColumn();

if ($userCount == 0) {
    // Insert users if the table is empty
    $users = [
        ['email' => 'admin@fitzone.com', 'password' => password_hash('admin123', PASSWORD_DEFAULT), 'role' => 'Admin'],
        ['email' => 'staff@fitzone.com', 'password' => password_hash('staff123', PASSWORD_DEFAULT), 'role' => 'Staff']
    ];

    foreach ($users as $user) {
        $stmt = $pdo->prepare("INSERT INTO user (email, password, role) VALUES (?, ?, ?)");
        $stmt->execute([$user['email'], $user['password'], $user['role']]);
    }

    echo "Users inserted successfully!";
} else {
    echo "Users already exist in the database!";
}
