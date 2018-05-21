<?php
session_start();
require_once 'db.php';
if($_SESSION) {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($con,$sql);
    $count = mysqli_num_rows($result);
    if($count == 1) {
        $sql="DELETE FROM inventory WHERE userid=$id";
        mysqli_query($con,$sql);
        $sql="DELETE FROM users WHERE id=$id";
        mysqli_query($con,$sql);
        echo "1";
    }
    else {
        echo "User doesn't exist";
    }
}
?>
