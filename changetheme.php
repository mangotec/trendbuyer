<?php
session_start();
require_once 'db.php';
$tablename = "users";
if($_POST && $_SESSION) {
    $id = $_SESSION["id"];
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $colour1 = mysqli_real_escape_string($con, $_POST['colour1']);
        $colour2 = mysqli_real_escape_string($con, $_POST['colour2']);
        $colours = array("deep_orange", "red", "pink", "purple", "deep_purple", "indigo", "blue", "light_blue", "cyan", "teal", "green", "light_green", "lime", "yellow", "amber", "orange", "brown", "blue_grey", "grey");
        if (in_array($colour1, $colours) and in_array($colour2, array_slice($colours, 0, 16)) and $colour1 != $colour2) {
            $theme = $colour1 . "-" . $colour2;
            $sql="UPDATE $tablename SET theme='$theme' WHERE id=$id";
            $count=mysqli_query($con,$sql);
            if($count != 0) {
                echo "1";
            }
            else {
                echo "Error changing theme";
            }
        }
        else {
            echo "Invalid theme";
        }
    }
}
?>
