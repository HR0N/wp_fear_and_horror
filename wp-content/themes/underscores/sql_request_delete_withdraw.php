<?php
/*
Template Name: SQL Request Delete Withdraw
*/
$reqid = $_GET['data']['reqid'];

function top_up($reqid){
    global $connect;
    $sql = "DELETE FROM `wp_user_withdraw` WHERE `id`=".$reqid;
    $result = $connect->query($sql);
    return ($result);
}
top_up($reqid);