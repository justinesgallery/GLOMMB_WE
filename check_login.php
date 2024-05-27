<?php
include "database.php";

session_start();

if (isset($_POST["submit"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $pass = ($_POST["pass"]);
    $staff_id = ($_POST["staff_id"]);
    
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$pass' AND staff_id = '$staff_id'";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);
        if ($row['password'] == $pass) {
            $_SESSION['username'] = $row["username"];
           echo "<script>alert('Login Successful!'); window.location='occasion_countdown.php';</script>";
           exit();
        } else {
            $error[] = 'Incorrect username, password, or staff Id!';
            echo "<script>alert('Incorrect username, password, or staff Id!'); window.location='login_screen.php';</script>";
        }
      } else {
          $error[] = 'Incorrect username, password, or staff Id!';
          echo "<script>alert('Incorrect username, password, or staff Id!'); window.location='login_screen.php';</script>";
      }

}