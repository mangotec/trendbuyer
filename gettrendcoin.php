<?php
session_start();
if ($_SESSION) {
    include('db.php');
    $id=$_SESSION['id'];
    $sql="SELECT * FROM users WHERE id='$id'";
    $result=mysqli_query($con,$sql);
    $trendcoin=mysqli_result($result, 0, 'trendcoin');
    echo "$trendcoin";
}
?>
