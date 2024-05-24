<?php include('database.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Occasion</title>
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="my-4">Add New Occasion</h1>
        <form method="POST" action="add_occasion.php">
    <div class="form-group">
        <label for="name">Project Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="current_date">Current Date</label>
        <input type="date" class="form-control" id="current_date" name="current_date" required>
    </div>
    <div class="form-group">
        <label for="due_date">Project Due Date</label>
        <input type="date" class="form-control" id="due_date" name="due_date" required>
    </div>
    <div class="form-group">
        <label for="description">Project Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    <div class="form-group">
        <label for="status">Project Status</label>
        <select class="form-control" id="status" name="status">
            <option value="On Hold">On Hold</option>
            <option value="Ongoing">Ongoing</option>
            <option value="Done">Done</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Add Project</button>
</form>
        <?php
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $assigned_date = $_POST['current_date'];
        $due_date = $_POST['due_date'];
        $status = $_POST['status'];
    
        $sql = "INSERT INTO occasions (name, description, date, assigned_date, due_date, status) VALUES ('$name', '$description', '$due_date', '$assigned_date', '$due_date', '$status')";
    
        if ($conn->query($sql) === TRUE) {
            header("Location: occasion_countdown.php");
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
        ?>
    </div>
</body>

</html>