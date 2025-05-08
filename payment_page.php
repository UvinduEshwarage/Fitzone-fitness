<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Customer') {
    header("Location: login.php");
    exit();
}

$user_id = $_GET['user_id'] ?? '';
$amount = $_GET['amount'] ?? '';
$plan = $_GET['plan'] ?? '';

if (!$user_id || !$amount || !$plan) {
    die("Missing payment information.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payment | FitZone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f1f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 40px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #28a745;
        }

        .info {
            margin-bottom: 30px;
            background: #f7f7f7;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .info p {
            margin: 8px 0;
            font-size: 16px;
            font-weight: 500;
        }

        .info p strong {
            color: #333;
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 14px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            color: #333;
            background-color: #f9f9f9;
        }

        input[type="text"]:focus,
        input[type="submit"]:hover {
            border-color: #28a745;
            background-color: #e9f9e4;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        label {
            font-weight: 600;
            margin-bottom: 8px;
            display: inline-block;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }

        .footer a {
            color: #28a745;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Confirm Your Payment</h2>
        <div class="info">
            <p><strong>Membership Plan:</strong> <?php echo ucfirst(htmlspecialchars($plan)); ?></p>
            <p><strong>Amount:</strong> Rs. <?php echo number_format($amount); ?></p>
        </div>

        <form action="process_payment.php" method="POST">
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
            <input type="hidden" name="amount" value="<?php echo htmlspecialchars($amount); ?>">

            <label for="card_holder">Card Holder Name</label>
            <input type="text" name="card_holder" id="card_holder" required>

            <label for="card_number">Card Number</label>
            <input type="text" name="card_number" id="card_number" maxlength="16" pattern="\d{16}" required>

            <label for="expiry">Expiry Date (MM/YY)</label>
            <input type="text" name="expiry" id="expiry" pattern="\d{2}/\d{2}" required>

            <label for="cvv">CVV</label>
            <input type="text" name="cvv" id="cvv" maxlength="4" pattern="\d{3,4}" required>

            <input type="submit" value="Pay Now">
        </form>

        <div class="footer">
            <p>By proceeding, you agree to our <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>.</p>
        </div>
    </div>

</body>

</html>