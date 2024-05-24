<?php include('database.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Occasion Countdown</title>
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <h1 class="my-4">Upcoming Special Occasions</h1>
        <a href="add_occasion.php" class="btn btn-primary mb-4">Add New Occasion</a>
        <div class="list-group">
            <?php
            $sql = "SELECT * FROM occasions WHERE date >= CURDATE() ORDER BY date ASC";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $time_left = strtotime($row['date']) - time();
                    $days_left = floor($time_left / (60 * 60 * 24));
                    $hours_left = floor(($time_left % (60 * 60 * 24)) / (60 * 60));
                    $minutes_left = floor(($time_left % (60 * 60)) / 60);
                    $seconds_left = $time_left % 60;
            
                    echo "<div class='list-group-item' id='countdown-{$row['id']}'>";
                    echo "<h5>{$row['name']} - ";
                    if ($days_left > 0) {
                        echo $days_left . " days, " . $hours_left . " hours, " . $minutes_left . " minutes, and " . $seconds_left . " seconds left</h5>";
                    } else {
                        echo $hours_left . " hours, " . $minutes_left . " minutes, and " . $seconds_left . " seconds left</h5>";
                    }
                    echo "<p>Date: {$row['date']}</p>";
                    echo "<p>{$row['description']}</p>";
                    echo "<a href='edit_occasion.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a> ";
                    echo "<a href='delete_occasion.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this occasion?\");'>Delete</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No upcoming occasions.</p>";
            }
            ?>
        </div>

        <h2 class="my-4">Past Occasions</h2>
        <div class="list-group">
            <?php
            $sql = "SELECT * FROM occasions WHERE date < CURDATE() ORDER BY date DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='list-group-item'>";
                    echo "<h5>{$row['name']} - Celebrated on {$row['date']}</h5>";
                    echo "<p>{$row['description']}</p>";
                    echo "<a href='edit_occasion.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a> ";
                    echo "<a href='delete_occasion.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this occasion?\");'>Delete</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No past occasions.</p>";
            }
            ?>
        </div>
    </div>

    <script>
        // Function to fetch and update upcoming occasions
        function updateUpcomingOccasions() {
            fetch("get_upcoming_occasions.php")
                .then(response => response.text())
                .then(data => {
                    document.getElementById('upcoming-occasions').innerHTML = data;
                });
        }

        // Call the function initially and every 5 seconds
        updateUpcomingOccasions();
        setInterval(updateUpcomingOccasions, 5000);
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>