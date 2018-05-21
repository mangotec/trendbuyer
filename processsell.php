<?php
session_start();
require_once 'db.php';
require_once 'googletrends.php';
$tablename = "inventory";
if($_POST) {
    $id=$_SESSION['id'];
    $kw = mysqli_real_escape_string($con, $_POST['trend']);
    error_log($kw);
    $sql="SELECT * FROM inventory WHERE userid='$id' AND keyword='$kw'";
    $result=mysqli_query($con,$sql);
    $count = mysqli_num_rows($result);
    if($count >= 1) {
        $value = 0;
        for ($x = 0; $x < $count; $x++) {
            $time = mysqli_result($result, $x, 'time');
            $amount = mysqli_result($result, $x, 'amount');
            $multiplier = getMultiplier($kw, $time);
            $value += $amount*$multiplier;
        }
        $sql="SELECT * FROM users WHERE id='$id'";
        $result=mysqli_query($con,$sql);
        $trendcoin=mysqli_result($result, 0, 'trendcoin');
        $trendcoin+=$value;
        $time = time();
        $sql="DELETE FROM inventory WHERE userid=$id AND keyword='$kw'";
        mysqli_query($con,$sql);
        $sql="UPDATE users SET trendcoin=$trendcoin WHERE id=$id";
        mysqli_query($con,$sql);
        echo "1";
    }
    else {
        echo "Trend doesn't exist";
    }
}
?>
