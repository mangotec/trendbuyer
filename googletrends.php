<?php
require 'vendor/autoload.php';
use Google\GTrends;
function getMultiplier($kw, $timeBought) {
    $options = [
            'hl'  => 'en-GB',
            'tz'  => 0,
            'geo' => 'GB',
        ];
    $gt = new GTrends();
    $timeNow = time();
    $multiplier = 1;
    if (($timeNow - $timeBought) > 7200) {
        if (($timeNow - $timeBought) < 684000) {
            $ttimeNow = date("Y\-m\-d\TH", $timeNow);
            $ttimeBought = date("Y\-m\-d\TH", $timeBought);
        }
        else {
            $ttimeNow = date("Y\-m\-d", $timeNow);
            $ttimeBought = date("Y\-m\-d", $timeBought);
        }
        $tf = $ttimeBought." ".$ttimeNow;
        $trends = $gt->interestOverTime($kw, 0, $tf);
        $popularity1 = $trends[0]['value'][0];
        $popularity2 = $trends[count($trends)-1]['value'][0];
        error_log($popularity1);
        error_log($popularity2);
        if ($popularity1 == 0) {
            $popularity1 = 0.5;
        }
        $multiplier = ($popularity2/$popularity1)**(1/2);
        error_log($multiplier);
    }
    return $multiplier;
}
function getGraph($kw, $tf) {
    $options = [
            'hl'  => 'en-GB',
            'tz'  => 0,
            'geo' => 'GB',
        ];
    $gt = new GTrends();
    $trends = $gt->interestOverTime($kw, 0, $tf);
    $trendslist = array();
    $count = count($trends);
    for ($x=0; $x<$count; $x++) {
        array_push($trendslist, $trends[$x]['value'][0]);
    }
    return $trendslist;
}
function getPopularity($kw) {
    $options = [
            'hl'  => 'en-GB',
            'tz'  => 0,
            'geo' => 'GB',
        ];
    $gt = new GTrends();
    $tf = 'now 1-d';
    $trends = $gt->interestOverTime($kw, 0, $tf);
    $popularity = $trends[count($trends)-1]['value'][0];
    return $popularity;
}
?>
