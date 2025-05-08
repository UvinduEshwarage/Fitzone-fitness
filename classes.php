<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Classes | FitZone Fitness Center</title>
    <link rel="stylesheet" href="css/classes.css">

</head>

<body>
    <?php include 'nav.php'; ?>

    <header class="hero">
        <div class="overlay">
            <h1>Find Your Fitness Flow</h1>
            <p>Start your fitness journey — move with purpose, train with passion, conquer with confidence.</p>
        </div>
    </header>

    <section class="filters">
        <button class="filter-btn active" onclick="filterClasses('all')">All</button>
        <button class="filter-btn" onclick="filterClasses('cardio')">Cardio</button>
        <button class="filter-btn" onclick="filterClasses('strength')">Strength</button>
        <button class="filter-btn" onclick="filterClasses('yoga')">Yoga</button>
        <button class="filter-btn" onclick="filterClasses('dance')">Dance</button>
    </section>

    <section class="class-grid" id="classList">
        <div class="class-card cardio">
            <img src="images/cardio.jpg" alt="Cardio Blast" />
            <h3>Cardio Blast</h3>
            <p>High-energy workouts to improve stamina and burn fat.</p>
            <button onclick="joinClass('Cardio Blast')">Join</button>
        </div>

        <div class="class-card strength">
            <img src="images/strength.jpg" alt="Strength Training" />
            <h3>Strength Training</h3>
            <p>Build muscle and increase your power with expert guidance.</p>
            <button onclick="joinClass('Strength Training')">Join</button>
        </div>

        <div class="class-card yoga">
            <img src="images/yoga.jpg" alt="Yoga Class" />
            <h3>Yoga & Flexibility</h3>
            <p>Calm your mind and stretch your body in peaceful sessions.</p>
            <button onclick="joinClass('Yoga & Flexibility')">Join</button>
        </div>

        <div class="class-card dance">
            <img src="images/dancefit.jpg" alt="Dance Fitness" />
            <h3>DanceFit</h3>
            <p>Fun and energetic dance moves to keep you fit and happy.</p>
            <button onclick="joinClass('DanceFit')">Join</button>
        </div>
    </section>

    <div class="btn-container">
        <a href="portal.php" class="btn-secondary">Login to the Staff Portal</a>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        function filterClasses(category) {
            const cards = document.querySelectorAll('.class-card');
            const buttons = document.querySelectorAll('.filter-btn');

            cards.forEach(card => {
                const isMatch = card.classList.contains(category) || category === 'all';
                card.style.display = isMatch ? 'block' : 'none';
            });

            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
        }

        function joinClass(className) {
            if (confirm(`Do you want to join the "${className}" class?`)) {
                window.location.href = `joinnow.php?class=${encodeURIComponent(className)}`;
            }
        }
    </script>
</body>

</html>