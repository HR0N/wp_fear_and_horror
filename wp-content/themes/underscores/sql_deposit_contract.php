<?php
/*
Template Name: SQL Deposit Contract
*/
$user = $_GET['data']['user'];
$contract = $_GET['data']['contract'];
$amount = $_GET['data']['amount'];
$end = $_GET['data']['end'];
function deposit_contract($user, $contract, $amount, $end){
    global $connect;
    $sql = "INSERT INTO `wp_user_contrcts`(`user`, `contract`, `amount`, `end`) 
            VALUES (".$user.", ".$contract.", ".$amount.", ".$end.")";
    $result = $connect->query($sql);
    return ($result);
}
deposit_contract($user, $contract, $amount, $end);