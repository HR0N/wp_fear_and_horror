<?php
/*
Template Name: SQL Request Top Up
*/
$user = $_GET['data']['user'];
$requisites = $_GET['data']['requisites'];
$amount = $_GET['data']['amount'];
function top_up($user, $requisites, $amount){
    global $connect;
    $sql = "INSERT INTO `wp_user_topup`(`user`, `requisites`, `amount`) 
                VALUES (".$user.", \"".$requisites."\", ".$amount.")";
    $result = $connect->query($sql);
    echo $result;
    return ($result);
}
top_up($user, $requisites, $amount);