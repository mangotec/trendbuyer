<?php
session_start();
require_once 'db.php';
require_once 'googletrends.php';
$tablename = "inventory";
if($_POST) {
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    $kw = mysqli_real_escape_string($con, $_POST['kw']);
    if($kw !== "") {
        $popularity = getPopularity($kw);
        if ($popularity !== 0) {
            $id=$_SESSION['id'];
            $sql="SELECT * FROM users WHERE id='$id'";
            $result=mysqli_query($con,$sql);
            $trendcoin=mysqli_result($result, 0, 'trendcoin');
            $trendcoin-=$amount;
            $time = time();
            $premium = mysqli_result($result, 0, 'premium');
            $sql="SELECT * FROM inventory WHERE userid='$id'";
            $result=mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if ($count <= 20 or $premium > time()) {
                if($trendcoin>=0 and $amount>0) {
                    $sql="INSERT INTO $tablename (userid, keyword, time, amount, value) VALUES ($id, '$kw', $time, $amount, $amount)";
                    $count=mysqli_query($con,$sql);
                    $sql="UPDATE users SET trendcoin=$trendcoin WHERE id=$id";
                    mysqli_query($con,$sql);
                    if($count != 0) {
                        echo "1";
                    }
                    else {
                        echo "Database error";
                    }
                }
                else {
                    echo "You do not have enough Trendcoin";
                }
            }
            else {
                echo "You do not have enough space in your inventory";
            }
        }
        else {
            echo "Sorry, you cannot buy a trend with a popularity of 0";
        }
    }
    else {
        echo "All fields must be filled in";
    }
}
?>
