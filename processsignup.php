<?php
session_start();
require_once 'db.php';
$tablename = "users";
if($_POST) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $password2 = mysqli_real_escape_string($con, $_POST['password2']);
    if($username != "" && $email != "" && $password != "") {
        if($password == $password2) {
            $sql = "SELECT * FROM $tablename WHERE username='$username'";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if($count == 0) {
                $sql = "SELECT * FROM $tablename WHERE email='$email'";
                $result = mysqli_query($con,$sql);
                $count = mysqli_num_rows($result);
                if($count == 0) {
                    $passwordhash = password_hash($password, PASSWORD_DEFAULT);
                    $sql="INSERT INTO $tablename (username, email, password, trendcoin, theme) VALUES ('$username', '$email', '$passwordhash', 1000, 'blue_grey-blue')";
                    $count=mysqli_query($con,$sql);
                    if($count != 0) {
                        $sql="SELECT * FROM $tablename WHERE username='$username'";
                        $result=mysqli_query($con,$sql);
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = mysqli_result($result, 0, 'id');
                        echo "1";
                    }
                    else {
                        echo "Error while signing up";
                    }
                }
                else {
                    echo "Email already being used";
                }
            }
            else {
                echo "Username already exists";
            }
        }
        else {
            echo "Passwords do not match";
        }
    }
    else {
        echo "All fields must be completed";
    }
}
?>
