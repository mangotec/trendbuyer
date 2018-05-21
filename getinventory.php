<?php
session_start();
if ($_SESSION) {
    include('db.php');
    $id=$_SESSION['id'];
    $sql="SELECT * FROM inventory WHERE userid='$id'";
    $result=mysqli_query($con,$sql);
    $count = mysqli_num_rows($result);
    $inventory = array();
    for ($x = 0; $x < $count; $x++) {
        $kw = mysqli_result($result, $x, 'keyword');
        $time = mysqli_result($result, $x, 'time');
        $amount = mysqli_result($result, $x, 'amount');
        $value = mysqli_result($result, $x, 'value');
        if (isset($inventory[$kw])) {
            $inventory[$kw]['amount'] += $amount;
            $inventory[$kw]['value'] += $value;
        }
        else {
            $inventory[$kw] = array();
            $inventory[$kw]['amount'] = $amount;
            $inventory[$kw]['value'] = $value;
        }
    }
    $output = json_encode($inventory);
    echo $output;
}
?>
