<?php
$host=getenv('RDS_HOSTNAME') . ":" . getenv('RDS_PORT');
$username=getenv('RDS_USERNAME');
$password=getenv('RDS_PASSWORD');
$db_name="trendbuyer";

error_log($host);
error_log($username);

$con=mysqli_connect("$host", "$username", "$password", "$db_name")or die("Cannot connect: " . mysqli_connect_error());
mysqli_select_db($con,"$db_name")or die("Cannot select DB");
mysqli_query($con,"SET NAMES 'utf8';");

if (!function_exists('mysqli_result')) {
    function mysqli_result($res, $row, $field=0) {
        $res->data_seek($row);
        $datarow = $res->fetch_array();
        return $datarow[$field];
    }
}
?>
