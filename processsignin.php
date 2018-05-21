<?php
session_start();
require_once 'db.php';
$tablename = "users";
if($_POST) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    if($username != "" && $password != "") {
        $sql = "SELECT * FROM $tablename WHERE username='$username'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if ($count==1) {
            if(password_verify($password, mysqli_result($result, 0, 'password'))) {
                $_SESSION["username"] = mysqli_result($result, 0, 'username');
                $_SESSION["id"] = mysqli_result($result, 0, 'id');
                echo "1";
            }
            else {
                echo "Invalid username or password";
            }
        }
        else {
            echo "Invalid username or password";
        }
    }
    else {
        echo "All fields must be completed";
    }
}
?>
