<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Membership Plans | FitZone Fitness Center</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/membership.css" />
</head>

<body>
    <?php include 'nav.php'; ?>

    <section class="page-hero">
        <div class="overlay">
            <h2>Our Membership Plans</h2>
            <p>Select a plan that suits your fitness goals and lifestyle</p>
        </div>
    </section>

    <section class="membership-plans">
        <div class="plan-cards">

            <div class="plan-card basic">
                <h3>Fitlight Plan</h3>
                <p>Gym Access Only </p>
                <p class="price">Rs. 4,000 / month</p>
                <button onclick="joinPlan('Basic')">Join Now</button>
            </div>

            <div class="plan-card pro">
                <h3>FItPro Plan</h3>
                <p>Gym Access + group classes</p>
                <p class="price">Rs. 7,000 / month</p>
                <button onclick="joinPlan('Pro')">Join Now</button>
            </div>

            <div class="plan-card elite">
                <h3>FitPrime plan</h3>
                <p>Gym Access + group classes + personal trainer</p>
                <p class="price">Rs. 9,000 / month</p>
                <button onclick="joinPlan('Elite')">Join Now</button>
            </div>

        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script>
        function joinPlan(plan) {
            alert(`Redirecting to registration...`);
            window.location.href = "joinnow.php";
        }
    </script>
</body>

</html>