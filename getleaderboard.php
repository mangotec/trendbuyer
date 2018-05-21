<?php
session_start();
if ($_SESSION) {
    include('db.php');
    $sql="SELECT * FROM users";
    $result=mysqli_query($con,$sql);
    $count = mysqli_num_rows($result);
    $leaderboard = array();
    for ($x = 0; $x < $count; $x++) {
        $userid = mysqli_result($result, $x, 'id');
        $username = mysqli_result($result, $x, 'username');
        $trendcoin = mysqli_result($result, $x, 'trendcoin');
        $premium = (mysqli_result($result, $x, 'premium') > time());
        $sql="SELECT * FROM inventory WHERE userid=$userid";
        $result2=mysqli_query($con,$sql);
        $count2 = mysqli_num_rows($result2);
        for ($y = 0; $y < $count2; $y++) {
            $value = mysqli_result($result2, $y, 'value');
            $trendcoin += $value;
        }
        $leaderboard[$x] = array();
        $leaderboard[$x]['username'] = $username;
        $leaderboard[$x]['trendcoin'] = $trendcoin;
        $leaderboard[$x]['premium'] = $premium;
    }
    function cmp($a, $b) {
        if ($a['trendcoin'] == $b['trendcoin']) {
            return 0;
        }
        return ($a['trendcoin'] > $b['trendcoin']) ? -1 : 1;
    }
    usort($leaderboard, "cmp");
    $leaderboard = array_slice($leaderboard, 0, 10);
    $output = json_encode($leaderboard);
    echo $output;
}
?>
