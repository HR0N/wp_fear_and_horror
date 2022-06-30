<?php
/*
Template Name: SQL Request Withdraw
*/
$user = $_GET['data']['user'];
$requisites = $_GET['data']['requisites'];
$amount = $_GET['data']['amount'];
function top_up($user, $requisites, $amount){
    global $connect;
    $sql = "INSERT INTO `wp_user_withdraw`(`user`, `requisites`, `amount`) 
                VALUES (".$user.", \"".$requisites."\", ".$amount.")";
    $result = $connect->query($sql);
    return ($result);
}
top_up($user, $requisites, $amount);