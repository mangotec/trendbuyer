<?php
session_start();
require_once 'db.php';
$tablename = "users";
if($_POST && $_SESSION) {
    $id = $_SESSION['id'];
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $password2 = mysqli_real_escape_string($con, $_POST['password2']);
    if($password != "") {
        if($password == $password2) {
            $sql = "SELECT * FROM $tablename WHERE id='$id'";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if($count == 1) {
                $passwordhash = password_hash($password, PASSWORD_DEFAULT);
                $sql="UPDATE $tablename SET password='$passwordhash' WHERE id=$id";
                $count=mysqli_query($con,$sql);
                if($count != 0) {
                    echo "1";
                }
                else {
                    echo "Error changing password";
                }
            }
            else {
                echo "User doesn't exist";
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
