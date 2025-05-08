<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FitZone Fitness Center</title>
    <link rel="stylesheet" href="css/style.css" />


</head>

<body>
    <?php include 'nav.php'; ?>

    <!-- Hero -->
    <section class="hero">
        <div class="hero-content">
            <h2>Unlock Your Potential with FitZone</h2>
            <p>Push limits. Gain strength. Live fit.</p>
            <p>Welcome to FitZone Fitness Center, where your transformation begins! Whether you're aiming to build strength, boost endurance, or simply lead a healthier lifestyle, FitZone provides the perfect environment with top-tier equipment, expert trainers, and a variety of fitness programs tailored to your goals. Join our vibrant community and take the first step toward becoming the best version of yourself!</p>
        </div>
    </section>

    <!-- Programs -->
    <section class="programs">
        <h2>Our Fitness Programs</h2>
        <div class="program-cards">
            <div class="program-card">
                <img src="images/cardio.jpg" alt="Cardio Program">
                <h3>Cardio</h3>
                <p>Boost your heart health and endurance with high-energy workouts.</p>
            </div>
            <div class="program-card">
                <img src="images/yoga.jpg" alt="Yoga Program">
                <h3>Yoga</h3>
                <p>Improve flexibility and mental clarity with calming yoga sessions.</p>
            </div>
            <div class="program-card">
                <img src="images/strength.jpg" alt="Strength Training">
                <h3>Strength</h3>
                <p>Build lean muscle and improve your power with guided strength training.</p>
            </div>
        </div>
    </section>

    <!-- Trainers -->
    <section class="trainers">
        <h2>Our Trainers</h2>
        <div class="trainer-grid">
            <div class="trainer-card">
                <img src="images/amal.jpg" alt="Trainer 1">
                <h3>Amal Silva</h3>
                <p>Strength & Conditioning</p>
            </div>
            <div class="trainer-card">
                <img src="images/kamal.jpg" alt="Trainer 2">
                <h3>kamal liyanaarachchi</h3>
                <p>HIIT & Weight Loss</p>
            </div>
            <div class="trainer-card">
                <img src="images/ruvini.jpg" alt="Trainer 3">
                <h3>Ruvini Perera</h3>
                <p>Yoga & Flexibility</p>
            </div>

        </div>
    </section>

    <!-- Membership Plans -->
    <section class="membership">
        <h2>Chooese your package</h2>
        <div class="plan-cards">
            <div class="plan-card basic">
                <h3>Fitlight</h3>
                <p>Gym Access only</p>
                <p><strong>Rs. 4000/month</strong></p>
            </div>
            <div class="plan-card pro">
                <h3>FitPro</h3>
                <p>Gym Access + group classes</p>
                <p><strong>Rs. 7000/month</strong></p>
            </div>
            <div class="plan-card elite">
                <h3>FitPrime</h3>
                <p>Gym Access + group classes + personal trainer</p>
                <p><strong>Rs. 9000/month</strong></p>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>




    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("startButton").addEventListener("click", function() {
                alert("Redirecting you to the registration page!");
                window.location.href = "joinnow.php";
            });

            const scrollTopBtn = document.getElementById("scrollTopBtn");
            window.onscroll = function() {
                scrollTopBtn.style.display = window.scrollY > 200 ? "block" : "none";
            };
            scrollTopBtn.onclick = () => window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>

</html>