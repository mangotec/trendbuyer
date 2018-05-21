<?php
require_once 'db.php';
require_once 'googletrends.php';
$sql="SELECT * FROM inventory";
$result=mysqli_query($con,$sql);
$count = mysqli_num_rows($result);
$inventory = array();
for ($x = 0; $x < $count; $x++) {
    $id = mysqli_result($result, $x, 'id');
    $kw = mysqli_result($result, $x, 'keyword');
    $time = mysqli_result($result, $x, 'time');
    $amount = mysqli_result($result, $x, 'amount');
    $multiplier = getMultiplier($kw, $time);
    error_log($multiplier);
    $value = $amount*$multiplier;
    $sql = "UPDATE inventory SET value='$value' WHERE id='$id'";
    mysqli_query($con, $sql);
}
?>
