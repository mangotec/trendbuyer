<?php
session_start();
require_once 'db.php';
$tablename = "users";
if($_POST && $_SESSION) {
    $id = $_SESSION['id'];
    $email = mysqli_real_escape_string($con, $_POST['email']);
    if($email != "") {
        $sql = "SELECT * FROM $tablename WHERE id='$id'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if($count == 1) {
            $sql="UPDATE $tablename SET email='$email' WHERE id=$id";
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
        echo "All fields must be completed";
    }
}
?>
