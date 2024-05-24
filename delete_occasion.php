<?php
include('database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM occasions WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: occasion_countdown.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    header("Location: occasion_countdown.php");
}
?>
